<?php

namespace App\Http\SingleActions\Frontend\H5\Recharge;

use App\Models\Finance\SystemFinanceOfflineInfo;
use App\Models\Finance\SystemFinanceOnlineInfo;
use App\Models\Finance\SystemFinanceType;
use App\Models\User\FrontendUser;
use App\Models\User\UsersRechargeOrder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class RechargeAction
 * @package App\Http\SingleActions\Frontend\H5\Recharge
 */
class RechargeAction extends BaseAction
{

    public const STATUS_NO = 0;

    /**
     * @var array $inputData
     */
    protected $inputData;

    /**
     * @var mixed $model
     */
    protected $model;

    /**
     * @var array $order
     */
    protected $order;

    /**
     * @param array $inputData InputData.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(array $inputData): JsonResponse
    {
        $result          = [];
        $this->inputData = $inputData;
        //获取模型
        $this->_getModel();
        //前置检查
        $this->_preCheck();
        //生成订单数据
        if (! $this->user instanceof FrontendUser) {
            throw new \RuntimeException('100505');//用户不存在
        }
        $data = $this->_generateOrderData($this->user);
        //保存线上订单
        if ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_YES) {
            $order   = $this->_saveOnlineOrderData($data);
            $channel = $this->model->channel;
            try {
                $channelClass = $channel->getChannelClass($order);
                $result       = $channelClass->recharge();
            } catch (\Throwable $exception) {
                throw new \RuntimeException('100300');
            }
        }
        //保存线下订单
        if ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_NO) {
            $result = $this->_saveOfflineOrderData($data);
        }
        return msgOut($result);
    }

    /**
     * @return void
     * @throws \Exception Exception.
     */
    private function _getModel(): void
    {
        if ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_YES) {
            $this->model = SystemFinanceOnlineInfo::find($this->inputData['channel_id']);
        } elseif ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_NO) {
            $this->model = SystemFinanceOfflineInfo::find($this->inputData['channel_id']);
            if (!$this->model instanceof SystemFinanceOfflineInfo) {
                throw new \Exception('100300');
            }
            $this->authorize($this->model);
        }
    }

    /**
     * @return void
     * @throws \Exception Exception.
     */
    private function _preCheck(): void
    {
        $this->_checkChannelIsOpen();
        $this->_checkMoneyIsEffective();
    }

    /**
     * 检查通道是否开启
     * @return void
     * @throws \Exception Exception.
     */
    private function _checkChannelIsOpen(): void
    {
        if ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_YES) {
            if ((int) ($this->model->status && $this->model->channel->status) === self::STATUS_NO) {
                throw new \Exception('100300');
            }
        } elseif ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_NO) {
            if ((int) $this->model->status === self::STATUS_NO) {
                throw new \Exception('100300');
            }
        }
    }

    /**
     * 检查金额是否有效
     * @return void
     * @throws \Exception Exception.
     */
    private function _checkMoneyIsEffective(): void
    {
        $money = $this->inputData['money'];
        if ($money < $this->model->min_amount || $money > $this->model->max_amount) {
            throw new \Exception('100301');
        }
    }

    /**
     * 保存线下订单
     * @param array $order Order.
     * @return mixed[]
     * @throws \Exception Exception.
     */
    private function _saveOfflineOrderData(array $order): array
    {
        $money            = $this->inputData['money'];
        $cache            = $this->cache;
        $order_expired_at = UsersRechargeOrder::STATUS_EXPIRED * 60;
        $order_key        = $this->order_key . $money;
        $model            = new UsersRechargeOrder();
        $order_cache      = serialize($model->fill($order));
        $cache->set($order_key, $order_cache, 'EX', $order_expired_at);
        return [
                'real_money' => $order['real_money'],
                'money'      => (float) sprintf('%.2f', $order['money']),
                'order_no'   => $order['order_no'],
                'qrcode'     => $this->model->qrcode,
                'expired_at' => $order['expired_at'],
               ];
    }

    /**
     * 保存线上订单
     * @param array $data Data.
     * @return UsersRechargeOrder
     * @throws \Exception Exception.
     */
    private function _saveOnlineOrderData(array $data): UsersRechargeOrder
    {
        $usersRechargeOrderModel = new UsersRechargeOrder();
        $usersRechargeOrderModel->fill($data);
        $result = $usersRechargeOrderModel->save();
        if (!$result) {
            throw new \Exception('100303');
        }
        return $usersRechargeOrderModel;
    }

    /**
     * 生成订单数据
     * @param FrontendUser $user FrontentUser.
     * @return mixed[]
     * @throws \Exception Exception.
     */
    private function _generateOrderData(FrontendUser $user): array
    {
        $data                       = [];
        $platformSign               = $this->currentPlatformEloq->sign;
        $data['platform_sign']      = $platformSign;
        $data['user_id']            = $this->user->id;
        $data['order_no']           = getUUidNodeHex();
        $data['finance_channel_id'] = $this->inputData['channel_id'];
        $data['money']              = $this->inputData['money'];
        $data['top_up_remark']      = $this->inputData['top_up_remark'] ?? null;
        $data['snap_user_level']    = $user->specificInfo->level ?? 0;
        if ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_YES) {
            $data['finance_type_id']    = $this->model->channel->type_id;
            $data['handling_money']     = $this->model->handle_fee;
            $data['arrive_money']       = $data['money'] - $data['handling_money'];
            $data['snap_merchant_no']   = $this->model->merchant_no;
            $data['snap_merchant_code'] = $this->model->merchant_code;
            $data['snap_merchant']      = $this->model->channel->name;
            $data['snap_finance_type']  = $this->model->channel->type->name;
        } elseif ((int) $this->inputData['is_online'] === SystemFinanceType::IS_ONLINE_NO) {
            $data['finance_type_id']   = $this->model->type_id;
            $data['real_money']        = $this->_getRealMoney();
            $data['handling_money']    = $this->model->handle_fee;
            $data['arrive_money']      = $data['money'] - $data['handling_money'];
            $data['snap_finance_type'] = $this->model->type->name;
            $data['snap_account']      = $this->model->account;
            $data['expired_at']        = now()->addMinutes(UsersRechargeOrder::STATUS_EXPIRED)->toDateTimeString();
            $data['created_at']        = now()->toDateTimeString();
            if ($this->model->type_id === SystemFinanceOfflineInfo::FINANCE_TYPE_BANK) {
                $data['snap_bank'] = $this->model->bank->name;
            } else {
                $data['snap_bank'] = $this->model->name;
            }
        }//end if
        $data['status']    = UsersRechargeOrder::STATUS_INIT;
        $data['is_online'] = (int) $this->inputData['is_online'];
        $data['client_ip'] = $this->inputData['ip'];
        return $data;
    }

    /**
     * 获取真实转账金额
     * @return float
     * @throws \Exception Exception.
     */
    private function _getRealMoney(): float
    {
        $platformSign = $this->currentPlatformEloq->sign;

        $condition  = [
                       'status'             => UsersRechargeOrder::STATUS_INIT,
                       'money'              => $this->inputData['money'],
                       'finance_channel_id' => $this->inputData['channel_id'],
                       'platform_sign'      => $platformSign,
                       'is_online'          => SystemFinanceType::IS_ONLINE_NO,
                      ];
        $orders     = UsersRechargeOrder::where($condition)->get('real_money');
        $real_money = $orders->pluck('real_money')->toArray();
        $exists     = []; //已经存在的
        foreach ($real_money as $order) {
            $money    = round($order - $this->inputData['money'], 2);
            $exists[] = $money;
        }
        $allNum = range(-0.99, 0.99, 0.01); //所有的
        $diff   = array_diff($allNum, $exists);
        if (empty($diff)) {
            throw new \Exception('100302');
        }
        $randKey = array_rand($diff);
        return $diff[$randKey] + $this->inputData['money'];
    }

    /**
     * Check if the user has permission for this card.
     * @param SystemFinanceOfflineInfo $offlineInfo SystemFinanceOfflineInfo.
     * @return boolean
     * @throws AccessDeniedException AccessDeniedException.
     * @throws \RuntimeException RuntimeException.
     */
    protected function authorize(SystemFinanceOfflineInfo $offlineInfo): bool
    {
        if (! $this->user instanceof FrontendUser) {
            throw new \RuntimeException('100505');//用户不存在
        }
        $result = in_array($this->user->user_tag_id, optional($offlineInfo->tags)->tag_id);
        if (!$result) {
            throw new AccessDeniedException('This action is unauthorized.', 403);
        }
        return true;
    }
}
