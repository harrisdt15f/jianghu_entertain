<?php

namespace App\Http\Controllers\BackendApi\Merchant\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Merchant\GameType\IndexRequest;
use App\Http\Requests\Backend\Merchant\GameType\StatusRequest;
use App\Http\SingleActions\Backend\Merchant\GameType\IndexAction;
use App\Http\SingleActions\Backend\Merchant\GameType\StatusAction;
use Illuminate\Http\JsonResponse;

/**
 * 游戏分类控制器
 * Class GameTypeController
 * @package App\Http\Controllers\BackendApi\Merchant\Game
 */
class GameTypeController extends Controller
{
    /**
     * 列表
     * @param IndexAction  $action  Action.
     * @param IndexRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function index(
        IndexAction $action,
        IndexRequest $request
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param StatusAction  $action  Action.
     * @param StatusRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function status(
        StatusAction $action,
        StatusRequest $request
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
