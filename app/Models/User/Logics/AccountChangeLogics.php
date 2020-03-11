<?php

namespace App\Models\User\Logics;

use App\Models\User\FrontendUser;
use App\Models\User\FrontendUsersAccountsReport;
use App\Models\User\FrontendUsersAccountsType;
use App\Models\User\FrontendUsersAudit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * 帐变主逻辑
 * trait AccountChangeLogics
 * @package App\Lib\Logic
 */
trait AccountChangeLogics
{

    /**
     * @param array  $inputDatas 接收的数据.
     * @param string $typeSign   帐变类型.
     * @param array  $params     参数.
     * @throws \Exception Exception.
     * @return mixed
     */
    public function doChange(array $inputDatas, string $typeSign, array $params)
    {
        $user = $this->frontendUser;
        if (!$user) {
            throw new \Exception('100206');
        }
        $typeConfig = FrontendUsersAccountsType::getTypeBySign($typeSign);
        //　1. 获取帐变配置
        $paramsValidator = FrontendUsersAccountsType::getParamToTransmit($typeSign);
        // 2. 参数检测
        $validator = Validator::make($params, $paramsValidator);
        if ($validator->fails()) {
            DB::rollback();
            throw new \Exception('100201');
        }
        // 3. 检测金额
        $amount = abs($inputDatas['amount']);
        if ((bool) $amount === false) {
            return true;
        }
        // 冻结类型 1 冻结自己金额 2 冻结退还
        // 资金增减. 需要检测对应
        $beforeBalance = $this->balance;
        $beforeFrozen  = $this->frozen;
        $amount        = (float) $amount;
        // 根据冻结类型处理
        $return = $this->_handleFrozen($typeConfig, $amount);
        if ($return !== true) {
            DB::rollback();
            throw new \Exception('100202');
        }
        // 修改数据
        $saveData = $this->_saveData(
            $inputDatas,
            $params,
            $typeConfig,
            $user,
            $beforeBalance,
            $beforeFrozen,
            $amount,
        );
        //稽核处理
        $this->_auditHandle($user, $typeConfig, $amount);
        return $saveData;
    }

    /**
     * 根据冻结类型处理
     * @param  array $typeConfig 帐变类型Arr.
     * @param  float $amount     金额.
     * @return mixed
     */
    private function _handleFrozen(array $typeConfig, float $amount)
    {
        switch ($typeConfig['frozen_type']) {
            case self::FROZEN_STATUS_OUT:
                $return = $this->frozen($amount);
                break;
            case self::FROZEN_STATUS_BACK:
                $return = $this->unFrozen($amount);
                break;
            case self::FROZEN_STATUS_TO_SYSTEM:
                $return = $this->costFrozen($amount);
                break;
            default:
                if ($typeConfig['in_out'] === 1) {
                    $return = $this->doAdd($amount);
                } else {
                    $return = $this->cost($amount);
                }
        }
        return $return;
    }

    /**
     * 资金增加
     * @param float $money 金额.
     * @return boolean
     */
    public function doAdd(float $money): bool
    {
        $this->fresh();
        $this->balance += $money;
        $save                    = $this->save();
        return $save;
    }

    /**
     * 消耗资金
     * @param float $money 金额.
     * @throws \Exception Exception.
     * @return boolean
     */
    public function cost(float $money): bool
    {
        $this->fresh();
        if ($money > $this->balance) {
            DB::rollback();
            throw new \Exception('100203');
        }
        $this->balance -= $money;
        $save                    = $this->save();
        return $save;
    }

    /**
     * 冻结资金
     * @param float $money 金额.
     * @throws \Exception Exception.
     * @return boolean
     */
    public function frozen(float $money): bool
    {
        $this->fresh();
        if ($money > $this->balance) {
            DB::rollback();
            throw new \Exception('100203');
        }
        $this->balance -= $money;
        $this->frozen  += $money;
        $save                    = $this->save();
        return $save;
    }

    /**
     * 解冻
     * @param float $money 金额.
     * @return boolean
     */
    public function unFrozen(float $money): bool
    {
        $this->balance += $money;
        $this->frozen  -= $money;
        $save                    = $this->save();
        return $save;
    }

    /**
     * 消耗冻结资金
     * @param float $money 金额.
     * @throws \Exception Exception.
     * @return boolean
     */
    public function costFrozen(float $money): bool
    {
        if ($money > $this->frozen) {
            DB::rollback();
            throw new \Exception('100205');
        }
        $this->frozen -= $money;
        $save                   = $this->save();
        return $save;
    }

    /**
     *
     * @param  array        $inputDatas    接收的数据.
     * @param  array        $params        参数.
     * @param  array        $typeConfig    帐变类型.
     * @param  FrontendUser $user          用户Eloq.
     * @param  float        $beforeBalance 帐变前金额.
     * @param  float        $beforeFrozen  帐变前冻结金额.
     * @param  float        $amount        金额.
     * @return boolean
     */
    private function _saveData(
        array $inputDatas,
        array $params,
        array $typeConfig,
        FrontendUser $user,
        float $beforeBalance,
        float $beforeFrozen,
        float $amount
    ): bool {
        // 保存帐变记录
        $report = [
                   'user_id'               => $user->id,
                   'parent_id'             => $user->parent_id,
                   'serial_number'         => $this->_getSerialNumber(),
                   'activity_sign'         => $inputDatas['activity_sign'] ?? 0,
                   'desc'                  => $inputDatas['desc'] ?? 0,
                   'frozen_type'           => $typeConfig['frozen_type'],
                   'process_time'          => time(),
                   'platform_sign'         => $user->platform_sign,
                   'top_id'                => $user->top_id,
                   'type_name'             => $typeConfig['name'],
                   'type_sign'             => $typeConfig['sign'],
                   'in_out'                => $typeConfig['in_out'],
                   'username'              => $user->specificInfo->nickname ?? null,
                   'before_balance'        => $beforeBalance,
                   'balance'               => $this->balance,
                   'frozen_balance'        => $this->frozen,
                   'before_frozen_balance' => $beforeFrozen,
                   'params'                => json_encode($params),
                   'amount'                => $amount,
                  ];

        $accountsReport = new FrontendUsersAccountsReport();
        $accountsReport->fill($report);
        $save = $accountsReport->save();
        return $save;
    }

    /**
     * 生成帐变编号
     * @return string
     */
    private function _getSerialNumber(): string
    {
        $sign         = $this->_getCurrentPlatformSign();
        $serialNumber = $sign . Str::orderedUuid()->getNodeHex();
        return $serialNumber;
    }

    /**
     * 获取平台Sign
     * @return string
     */
    private function _getCurrentPlatformSign(): string
    {
        $currentPlatform = Request::get('current_platform_eloq');
        if ($currentPlatform) {
            return $currentPlatform->sign;
        }
        return 'JHHY';
    }

    /**
     * 稽核处理
     * @param  FrontendUser $user   用户Eloq.
     * @param  array        $type   账变类型Arr.
     * @param  float        $amount 金额.
     * @return void
     */
    private function _auditHandle(FrontendUser $user, array $type, float $amount): void
    {
        $sign      = $this->_getCurrentPlatformSign();
        $userAudit = new FrontendUsersAudit();
        if (in_array($type['sign'], $this->rechargeTypes)) {
            $demandBet = $this->_getDemandBet($sign, $amount, 'recharge_audit_times');
            $userAudit->createAudit($user, $type, $amount, $demandBet);
        } elseif (in_array($type['sign'], $this->activityTypes)) {
            $demandBet = $this->_getDemandBet($sign, $amount, 'activity_audit_times');
            $userAudit->createAudit($user, $type, $amount, $demandBet);
        }
    }

    /**
     * @param  string $platformSign 平台标识.
     * @param  float  $amount       金额.
     * @param  string $configSign   系统配置标识.
     * @return float
     */
    private function _getDemandBet(string $platformSign, float $amount, string $configSign): float
    {
        $auditTimes = configure($platformSign, $configSign);
        $demandBet  = $amount * $auditTimes;
        return $demandBet;
    }
}
