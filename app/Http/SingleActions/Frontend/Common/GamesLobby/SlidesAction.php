<?php

namespace App\Http\SingleActions\Frontend\Common\GamesLobby;

use App\Http\Resources\Frontend\GamesLobby\SystemSlidesResource;
use App\Models\Systems\SystemFePageBanner;
use Illuminate\Http\JsonResponse;

/**
 * Class SlidesAction
 * @package App\Http\SingleActions\Frontend\Common\GamesLobby
 */
class SlidesAction
{

    /**
     * Home carousel slides.
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $inputDatas['status'] = SystemFePageBanner::STATUS_OPEN;
        $slides               = SystemFePageBanner::filter($inputDatas)->get();
        return msgOut(SystemSlidesResource::collection($slides));
    }
}
