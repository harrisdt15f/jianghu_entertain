<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game\Game;

use App\Models\Game\Game;
use App\Models\Game\GamePlatform;
use App\Models\Systems\StaticResource;
use Illuminate\Http\JsonResponse;

/**
 * Class IconAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class IconAction extends BaseAction
{

    /**
     * @param  array $inputData InputData.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputData): JsonResponse
    {
        $game_platform = GamePlatform::where('game_id', $inputData['id'])->get();
        $model         = $this->model->find($inputData['id']);
        $resource      = [
                          'type'        => 1,
                          'title'       => 'game_icon',
                          'table_name'  => 'games',
                          'description' => '游戏 icon',
                         ];
        if (!$model instanceof Game) {
            throw new \Exception('300201');
        }
        $icon_id = $inputData['icon_id'];
        try {
            $model->update(['icon_id' => $icon_id]);
            StaticResource::where(['id' => $icon_id])->update($resource);
            $game_platform->map(
                static function ($item) use ($icon_id): void {
                    if ($item->icon_id > 0) {
                        return;
                    }
                    $item->icon_id = $icon_id;
                    $item->save();
                },
            );
            return msgOut();
        } catch (\RuntimeException $exception) {
            \Log::error($exception->getMessage());
        }
        throw new \Exception('300201');
    }
}
