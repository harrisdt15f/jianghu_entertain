<?php

namespace App\Http\SingleActions\Frontend\Common\GamesLobby;

use App;
use App\Http\SingleActions\MainAction;
use App\Lib\BaseCache;
use App\Models\Game\GamePlatform;
use App\Models\Game\GameSubType;
use App\Models\Game\GameTypePlatform;
use Illuminate\Http\JsonResponse;

/**
 * Class GameListAction
 * @package App\Http\SingleActions\Frontend\Common\GamesLobby
 */
class GameListAction extends MainAction
{
    /**
     * 缓存base
     */
    use BaseCache;

    /**
     * redis键前缀
     * @var string
     */
    public $redisKeyPrefix = 'frontend_game_list_';

    /**
     * Game list.
     * @param array $inputData 接收的数据.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputData): JsonResponse
    {
        $redisKey = $this->redisKeyPrefix . $inputData['device'];
        $result   = $this->getCacheConfig($redisKey);
        if (empty($result)) {
            $condition = [
                          'platform' => $this->currentPlatformEloq->id,
                          'status'   => GameTypePlatform::STATUS_OPEN,
                         ];
            $types     = GameTypePlatform::filter($condition)
                ->with('gameType.children')
                ->get();
    
            $rawData        = [];
            $openTypeIds    = [];
            $openSubTypeIds = [];
            foreach ($types as $firstType) {
                $openGameType   = $firstType->gameType;
                $openTypeIds[]  = $openGameType->id;
                $openSecondType = $openGameType->children->where('status', GameSubType::STATUS_OPEN);
                $data           = [];
                foreach ($openSecondType as $secondType) {
                    $openSubTypeIds[] = $secondType->id;
                    $data[]           = [
                                         'sub_type_id'   => $secondType->id,
                                         'sub_type_name' => $secondType->name,
                                        ];
                }
    
                $rawData[] = [
                              'type_id'   => $firstType->gameType->id ?? '',
                              'type_name' => $firstType->gameType->name ?? '',
                              'sub_type'  => $data,
                             ];
            }
    
            $condition['type_in']     = $openTypeIds;
            $condition['sub_type_in'] = $openSubTypeIds;
            $condition['device']      = $inputData['device'];
            $condition['status']      = GamePlatform::STATUS_OPEN;
            $games                    = $this->_getGames($condition);
            $result                   = [
                                         'raw'  => $rawData,
                                         'list' => $games,
                                        ];
            $this->saveTagsCacheData($redisKey, $result);
        }//end if
        $result = msgOut($result);
        return $result;
    }

    /**
     * 搜索条件
     * @param  array $condition 搜索条件.
     * @return mixed[]
     */
    private function _getGames(array $condition): array
    {
        $datas = GamePlatform::filter($condition)
            ->select(
                [
                 'id',
                 'platform_id',
                 'game_id',
                 'icon_id',
                 'hot_new',
                 'status',
                 'device',
                ],
            )
            ->with(
                [
                 'games:id,type_id,sub_type_id,name',
                 'icon:id,path',
                ],
            )
            ->get();

        $result         = [];
        $appEnvironment = App::environment();
        foreach ($datas as $game) {
            if (!$game->games->vendor->status) {
                continue;
            }
            $icon                          = $game->icon->path ?? '';
            $typeId                        = $game->games->type_id ?? 0;
            $sunTypeId                     = $game->games->sub_type_id ?? 0;
            $result[$typeId][$sunTypeId][] = [
                                              'name'    => $game->games->name ?? '',
                                              'hot_new' => $game->hot_new,
                                              'url'     => $game->games->url ?? '',
                                              'icon'    => config('image_domain.' . $appEnvironment) . $icon,
                                             ];
        }
        return $result;
    }
}
