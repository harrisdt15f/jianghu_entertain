<?php

namespace App\Http\SingleActions\Backend\Merchant\GameType;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexAction
 * @package App\Http\SingleActions\Backend\Merchant\GameType
 */
class IndexAction extends BaseAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {

        $inputDatas['platform_id'] = $this->currentPlatformEloq->id;
        $datas                     = $this->model->with('gameType:id,name,sign')
                                          ->filter($inputDatas)
                                          ->paginate($this->perPage);
        return msgOut($datas);
    }
}
