<?php

namespace App\Http\SingleActions\Frontend\Common\AccountManagement;

use App\Events\PlatformNoticeEvent;
use App\Http\Requests\Frontend\Common\FrontendUser\WithdrawalRequest;
use App\Http\SingleActions\MainAction;
use App\Models\Notification\MerchantNotificationStatistic;
use App\Models\User\FrontendUser;
use App\Models\User\FrontendUsersAccount;
use App\Models\User\FrontendUsersBankCard;
use App\Models\User\FrontendUsersWithdrawOrder;
use App\Models\User\UsersRechargeOrder;
use Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;
use Log;

/**
 * Class WithdrawalAction
 * @package App\Http\SingleActions\Frontend\Common\AccountManagement
 */
class WithdrawalAction extends MainAction
{

    /**
     * @var \Illuminate\Redis\Connections\Connection $redis Redis Instance.
     */
    private $redis;

    /**
     * Account withdrawal.
     * @param WithdrawalRequest $request WithdrawalRequest.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(WithdrawalRequest $request): JsonResponse
    {
        $inputData   = $request->validated();
        $this->redis = Redis::connection();
        $user        = $this->user;
        if (!$user instanceof FrontendUser) {
            throw new \RuntimeException('100505');//用户不存在
        }
        $account = $user->account;
        if (!$account instanceof FrontendUsersAccount) {
            throw new \RuntimeException('203001');
        }
        $bankCard = $user->bankCard()->where('id', $inputData['bank_id'])->first();
        if (!$bankCard instanceof FrontendUsersBankCard) {
            throw new \RuntimeException('100907');//请先绑定银行卡
        }
        $result = $this->handleOrderItem($user, $account, $bankCard, $inputData);
        if (!$result) {
            throw new \RuntimeException('100905');
        }
        return msgOut([], '100903');
    }

    /**
     * @param FrontendUser          $user      FrontendUser.
     * @param FrontendUsersAccount  $account   Account.
     * @param FrontendUsersBankCard $bankCard  BankCard.
     * @param array                 $inputData InputData.
     * @return boolean
     */
    protected function handleOrderItem(
        FrontendUser $user,
        FrontendUsersAccount $account,
        FrontendUsersBankCard $bankCard,
        array $inputData
    ): bool {
        //提款次数处理
        $num_withdrawal = FrontendUsersWithdrawOrder::select('id')->where('user_id', $user->id)
            ->whereDate('created_at', date('Y-m-d'))->count();
        $this->_checkBeforeWithdrawal($user->platform_sign, $num_withdrawal, $bankCard->id);
        $total_withdrawal = FrontendUsersWithdrawOrder::where('user_id', $user->id)
            ->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])->sum('amount');
        //充值次数处理
        $num_top_up = UsersRechargeOrder::select('id')
            ->where('status', UsersRechargeOrder::STATUS_SUCCESS)->count();
        //稽核处理
        $amount    = (float) $inputData['amount'];
        $balance   = $account->balance;
        $audit_fee = $this->_audit($user, $amount);
        $item      = $this->_orderItem(
            $amount,
            $bankCard->type,
            $user->mobile,
            $balance,
            Arr::only($bankCard->toArray(), ['owner_name', 'card_number', 'branch']),
            (float) $total_withdrawal + $balance,
            $num_withdrawal,
            $num_top_up,
            $audit_fee,
        );
        try {
            $order = $user->withdraw()->create($item);
            $param = [
                      'user_id' => $user->id,
                      'amount'  => $amount,
                     ];
            $account->operateAccount('withdraw_frozen', $param);
            broadcast(new PlatformNoticeEvent('notice_of_withdraw', '', $order->toArray()));
            merchantNotificationIncrement(MerchantNotificationStatistic::WITHDRAWAL_ORDER);
            $this->_redis($amount);
            return true;
        } catch (\Throwable $exception) {
            $logData = [
                        'msg'  => '发起提现失败!',
                        'data' => $exception,
                       ];
            Log::channel('withdrawal-system')
                ->info(json_encode($logData, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT, 512));
            return false;
        }//end try
    }

    /**
     * Headquarters statistics.
     * @param float $amount Withdrawal Amount.
     * @return void
     * @throws \RuntimeException RuntimeException.
     */
    private function _redis(float $amount): void
    {
        $user = $this->user;
        if (!$user instanceof FrontendUser) {
            throw new \RuntimeException('100505');//用户不存在
        }
        $time  = mktime(23, 59, 59) - mktime((int) date('H'), (int) date('i'), (int) date('s'));
        $redis = $this->redis;

        $withdraw_cache = json_encode(
            [
             'user_id' => $user->id,
             'amount'  => $amount,
            ],
            JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT,
            512,
        );
        $redis->rpush('headquarters_statistics:withdrawal', $withdraw_cache);
        $redis->expire('headquarters_statistics:withdrawal', $time);
        $redis->rpush('merchant_statistics_' . $user->platform_sign . ':withdrawal', $withdraw_cache);
        $redis->expire('merchant_statistics_' . $user->platform_sign . ':withdrawal', $time);
    }

    /**
     * Audit fee.
     * @param FrontendUser $user   FrontendUser.
     * @param float        $amount Withdrawal Amount.
     * @return float
     */
    private function _audit(FrontendUser $user, float $amount): float
    {
        $audit_fee = 0;
        if ((int) optional($user->account)->tax_status !== FrontendUsersAccount::TAX_STATUS_DONE) {
            $audit     = (float) configure($this->currentPlatformEloq->sign, 'audit_free');
            $audit_fee = $amount * $audit;
        }
        return (float) $audit_fee;
    }

    /**
     * 提现前的检查.
     * @param string  $platform_sign  平台标识.
     * @param integer $num_withdrawal Num_withdrawal.
     * @param integer $bankCardId     BankCardId.
     * @return void
     * @throws \RuntimeException RuntimeException.
     */
    private function _checkBeforeWithdrawal(
        string $platform_sign,
        int $num_withdrawal,
        int $bankCardId
    ): void {
        // 新绑卡检查
        $cache_prefix = $platform_sign . ':frontend_user_' . $this->user->id . ':binding_card:' . $bankCardId;
        if ($this->redis->exists($cache_prefix)) {
            $bank_card_frozen = (int) configure($platform_sign, 'bank_card_frozen');
            throw new \RuntimeException('新绑定银行卡' . $bank_card_frozen . '小时后才可以使用!', 403);
        }

        // 稽核不足检查
        $audit_withdraw = (int) configure($platform_sign, 'audit_withdraw');
        if ($audit_withdraw) {
            throw new \RuntimeException('100908');
        }

        // 每日提款次数检查
        $day_withdraw_num = (int) configure($platform_sign, 'day_withdraw_num');
        if ($num_withdrawal >= $day_withdraw_num) {
            throw new \RuntimeException('100904');
        }
    }

    /**
     * @param float                $amount           总金额.
     * @param integer              $account_type     账户类型.
     * @param string               $mobile           Mobile.
     * @param float                $balance          账户总额.
     * @param array<string,string> $account_snapshot 账户快照.
     * @param float                $month_total      当月总提现.
     * @param integer              $num_withdrawal   今日出款次数.
     * @param integer              $num_top_up       今日充值次数.
     * @param float                $audit_fee        今日充值次数.
     * @return mixed[]
     */
    private function _orderItem(
        float $amount,
        int $account_type,
        string $mobile,
        float $balance,
        array $account_snapshot,
        float $month_total,
        int $num_withdrawal,
        int $num_top_up,
        float $audit_fee
    ): array {
        return [
                'amount'         => $amount,
                'account_type'   => $account_type,
                'mobile'         => $mobile,
                'before_balance' => $balance,
                'account_snap'   => $account_snapshot,
                'month_total'    => $month_total,
                'num_withdrawal' => $num_withdrawal,
                'num_top_up'     => $num_top_up,
                'audit_fee'      => $audit_fee,
                'platform_sign'  => $this->currentPlatformEloq->sign,
               ];
    }
}
