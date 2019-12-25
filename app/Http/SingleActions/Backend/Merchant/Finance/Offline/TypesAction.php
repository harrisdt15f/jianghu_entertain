<?php

namespace App\Http\SingleActions\Backend\Merchant\Finance\Offline;

use App\Models\Finance\SystemFinanceType;
use Illuminate\Http\JsonResponse;

/**
 * Class TypesAction
 * @package App\Http\SingleActions\Backend\Merchant\Finance\Offline
 */
class TypesAction
{
    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(): JsonResponse
    {
        $model  = new SystemFinanceType();
        $data   = $model->where('status', SystemFinanceType::STATUS_YES)
            ->where('is_online', SystemFinanceType::IS_ONLINE_NO)
            ->select(['id', 'name', 'sign'])
            ->withCacheCooldownSeconds(86400)
            ->get();
        $result = msgOut(true, $data);
        return $result;
    }
}
