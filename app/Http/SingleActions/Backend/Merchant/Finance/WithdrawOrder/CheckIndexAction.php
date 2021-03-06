<?php

namespace App\Http\SingleActions\Backend\Merchant\Finance\WithdrawOrder;

use App\Models\Notification\MerchantNotificationStatistic;
use App\Models\User\FrontendUsersWithdrawOrder;
use Illuminate\Http\JsonResponse;

/**
 * Class CheckIndexAction
 * @package App\Http\SingleActions\Backend\Merchant\Finance\WithdrawOrder
 */
class CheckIndexAction extends BaseAction
{

    /**
     * @var object $model
     */
    protected $model;
    
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        merchantNotificationClear(MerchantNotificationStatistic::WITHDRAWAL_ORDER);

        $inputDatas['platform_sign'] = $this->currentPlatformEloq->sign;
        $returnField                 = $this->_getReturnField();
        $inputDatas['status_list']   = [
                                        FrontendUsersWithdrawOrder::STATUS_CHECK_INIT,
                                        FrontendUsersWithdrawOrder::STATUS_CHECK_PASS,
                                        FrontendUsersWithdrawOrder::STATUS_CHECK_REFUSE,
                                       ];
        $data                        = $this->model
            ->with(
                [
                 'user:id,mobile,guid,parent_id,is_tester',
                 'reviewer:id,name',
                 'user.parent:id,mobile,guid',
                ],
            )->filter($inputDatas)
            ->select($returnField)
            ->orderByDesc('id')
            ->paginate($this->perPage);
        return msgOut($data);
    }

    /**
     * 获取返回给前端的字段.
     *
     * @return mixed[]
     */
    private function _getReturnField(): array
    {
        return [
                'id',
                'user_id',
                'reviewer_id',
                'order_no',
                'amount',
                'audit_fee',
                'amount_received',
                'handing_fee',
                'created_at',
                'review_at',
                'status',
                'before_balance',
                'month_total',
                'num_top_up',
                'num_withdrawal',
                'remark',
                'account_snap',
               ];
    }
}
