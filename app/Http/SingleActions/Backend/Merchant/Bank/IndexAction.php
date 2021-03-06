<?php

namespace App\Http\SingleActions\Backend\Merchant\Bank;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexAction
 * @package App\Http\SingleActions\Backend\Merchant\Notice\Carousel
 */
class IndexAction extends BaseAction
{

    /**
     * @var object $model
     */
    public $model;

    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $inputDatas['platform_sign'] = $this->currentPlatformEloq->sign;
        $data                        = $this->model->with('bank:id,name')
            ->filter($inputDatas)
            ->paginate($this->perPage);
        return msgOut($data);
    }
}
