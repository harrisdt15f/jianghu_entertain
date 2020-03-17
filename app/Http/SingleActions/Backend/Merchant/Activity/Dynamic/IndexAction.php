<?php

namespace App\Http\SingleActions\Backend\Merchant\Activity\Dynamic;

use App\ModelFilters\Platform\SystemDynActivityPlatformFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexAction
 * @package App\Http\SingleActions\Backend\Merchant\Activity\Dyn
 */
class IndexAction extends BaseAction
{

    /**
     * @var object $model
     */
    protected $model;

    /**
     * ***
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $inputDatas['platform_sign'] = $this->currentPlatformEloq->sign;
        $data                        = $this->model::with('lastEditor:id,name', 'activity:id,sign,name')
            ->filter($inputDatas, SystemDynActivityPlatformFilter::class)
            ->withCacheCooldownSeconds(86400)
            ->paginate($this->model::getPageSize());
        $msgOut                      = msgOut($data);
        return $msgOut;
    }
}
