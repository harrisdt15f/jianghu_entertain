<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game\GameType;

use App\Http\Requests\Backend\Headquarters\Game\GameType\StatusDoRequest;
use App\Models\Game\GameType;
use App\Models\Game\GameTypePlatform;
use Illuminate\Http\JsonResponse;
use Log;

/**
 * Class StatusDoAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\GameType
 */
class StatusDoAction
{

    /**
     * @param StatusDoRequest $request StatusDoRequest.
     * @return JsonResponse
     * @throws \RuntimeException RuntimeException.
     */
    public function execute(StatusDoRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $model     = $request->get('model');// 从 App\Rules\Backend\Common\Sortable\CheckSortableModel 注入
            $model     = $model::find($validated['id']);
            if ($model instanceof GameType) {
                $status_close = GameTypePlatform::STATUS_CLOSE;
                GameTypePlatform::where('type_id', $validated['id'])->update(['status' => $status_close]);
            }
            $model->status = $validated['status'];
            $model->save();
            return msgOut();
        } catch (\RuntimeException $exception) {
            Log::error($exception->getMessage());
        }
        throw new \RuntimeException('300404');
    }
}
