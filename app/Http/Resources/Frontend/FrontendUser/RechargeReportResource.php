<?php

namespace App\Http\Resources\Frontend\FrontendUser;

use App\Http\Resources\BaseResource;
use App\Models\User\UsersRechargeOrder;
use Carbon\Carbon;

/**
 * Class RechargeReportResource
 * @package App\Http\Resources\Backend\Headquarters\Game\GameType
 */
class RechargeReportResource extends BaseResource
{

    /**
     * @var string $order_no 管理员Id.
     */
    private $order_no;

    /**
     * @var float $money 订单金额.
     */
    private $money;

    /**
     * @var float $arrive_money 实际到账金额.
     */
    private $arrive_money;

    /**
     * @var float $real_money 真实付款金额.
     */
    private $real_money;

    /**
     * @var integer $status 审核状态.
     */
    private $status;

    /**
     * @var integer $is_online 是否线上充值.
     */
    private $is_online;

    /**
     * @var \Carbon\Carbon $arrived_at 到账时间.
     */
    private $arrived_at;

    /**
     * @var \App\Models\Finance\SystemFinanceType $financeType 资金类型.
     */
    private $financeType;

    /**
     * @var \App\Models\Finance\SystemFinanceOfflineInfo $offlineInfo 线下金流信息.
     */
    private $offlineInfo;

    /**
     * @var \Carbon\Carbon $created_at 充值时间.
     */
    private $created_at;

    /**
     * @var string $expired_at 过期时间.
     */
    private $expired_at;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        unset($request);
        $account  = '';
        $username = '';
        $branch   = '';
        //线下充值返回平台收款账户信息
        if ($this->is_online === UsersRechargeOrder::OFFLINE_FINANCE) {
            $account  = $this->offlineInfo->account ?? '';
            $username = $this->offlineInfo->username ?? '';
            $branch   = $this->offlineInfo->branch ?? '';
        }
        $item = [
                 'order_no'          => $this->order_no,
                 'money'             => $this->money,
                 'real_money'        => $this->real_money,
                 'arrive_money'      => $this->arrive_money,
                 'status'            => $this->status,
                 'finance_type_name' => $this->financeType->name ?? '',
                 'created_at'        => $this->created_at->toDateTimeString(),
                 'is_online'         => $this->is_online,
                 'account'           => $account,
                 'username'          => $username,
                 'branch'            => $branch,
                 'arrived_at'        => $this->arrived_at,
                 'expired_at'        => $this->expired_at,
                ];
        if (!$this->expired_at) {
            unset($item['expired_at']);
        }
        return $item;
    }
}
