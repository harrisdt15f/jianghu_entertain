<?php

namespace App\Http\SingleActions\Backend\Merchant\Email;

use App\Models\Email\SystemEmailOfMerchant;
use Illuminate\Http\JsonResponse;
use Log;

/**
 * Class DestroyIncomingEmailAction
 * @package App\Http\SingleActions\Backend\Merchant\Email
 */
class DestroyIncomingEmailAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $condition                  = [];
        $condition['merchant_id']   = $this->user->id;
        $condition['platform_sign'] = $this->currentPlatformEloq->sign;
        try {
            SystemEmailOfMerchant::where($condition)->whereIn('email_id', $inputDatas['email_id'])->delete();
            return msgOut();
        } catch (\RuntimeException $exception) {
            Log::error($exception->getMessage());
        }
        throw new \RuntimeException('303003');
    }
}
