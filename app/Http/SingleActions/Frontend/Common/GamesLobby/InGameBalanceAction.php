<?php

namespace App\Http\SingleActions\Frontend\Common\GamesLobby;

use App\Http\SingleActions\MainAction;
use App\Lib\Game\GameCommons;
use App\Models\Game\GameVendor;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

/**
 * Class InGameAction
 * @package App\Http\SingleActions\Frontend\Common\GamesLobby
 */
class InGameBalanceAction extends MainAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $criteriaInput   = Arr::only($inputDatas, 'vendor');
        $curentVendorObj = GameVendor::filter($criteriaInput)->first();
        if (! $curentVendorObj instanceof GameVendor) {
            throw new \RuntimeException('100704');//对不起,游戏厂商不存在!
        }
        $gameInstance = GameCommons::gameInit($curentVendorObj);
        $balance      = $gameInstance->checkBalance($this->user, $inputDatas);
        $data         = ['balance' => sprintf('%.2f', $balance)];
        return msgOut($data);
    }
}
