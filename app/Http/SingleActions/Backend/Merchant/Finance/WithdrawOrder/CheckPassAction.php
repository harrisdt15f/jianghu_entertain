<?php

namespace App\Http\SingleActions\Backend\Merchant\Finance\WithdrawOrder;

use App\Models\Notification\MerchantNotificationStatistic;
use App\Models\User\FrontendUsersWithdrawOrder;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Log;

/**
 * Class CheckPassAction
 * @package App\Http\SingleActions\Backend\Merchant\Finance\WithdrawOrder
 */
class CheckPassAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $whereCondition = [
                           'id'     => $inputDatas['id'],
                           'status' => FrontendUsersWithdrawOrder::STATUS_CHECK_INIT,
                          ];
        $update         = [
                           'status'      => FrontendUsersWithdrawOrder::STATUS_CHECK_PASS,
                           'remark'      => $inputDatas['remark'] ?? null,
                           'reviewer_id' => $this->user->id,
                           'review_at'   => Carbon::now(),
                          ];
        try {
            $result = $this->model::where($whereCondition)->update($update);
            if ($result) {
                merchantNotificationIncrement(MerchantNotificationStatistic::WITHDRAWAL_REVIEW);
                return msgOut();
            }
        } catch (\RuntimeException $exception) {
            Log::error($exception->getMessage());
        }
        throw new \Exception('202900');
    }
}
