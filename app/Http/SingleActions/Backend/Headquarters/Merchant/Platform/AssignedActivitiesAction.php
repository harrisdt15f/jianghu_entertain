<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\Platform;

use App\Http\SingleActions\MainAction;
use App\Models\Activity\ActivitiesDynSystem;
use Illuminate\Http\JsonResponse;

/**
 * Class AssignedActivitiesAction
 * @package App\Http\SingleActions\Backend\Headquarters\Merchant\Platform
 */
class AssignedActivitiesAction extends MainAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $systemDynActivity = new ActivitiesDynSystem();
        if (isset($inputDatas['pageSize'])) {
            $systemDynActivity->setPerPage($inputDatas['pageSize']);
        }
        $inputDatas['assigned_platform_sign'] = $inputDatas['platform_sign'];
        $outputDatas                          = $systemDynActivity->filter($inputDatas)
            ->paginate();
        return msgOut($outputDatas);
    }
}
