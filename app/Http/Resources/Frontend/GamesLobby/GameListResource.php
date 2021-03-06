<?php

namespace App\Http\Resources\Frontend\GamesLobby;

use App\Http\Resources\BaseResource;
use App\Models\Game\Game;

/**
 * Class GameListResource
 * @package App\Http\Resources
 */
class GameListResource extends BaseResource
{

    /**
     * @var Game $games Game Model.
     */
    private $games;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        unset($request);
        return [
                'game_id'   => $this->games->id,
                'name'      => $this->games->name,
                'game_sign' => $this->games->sign,
                'type_id'   => $this->games->type_id,
                'type_sign' => optional($this->games->type)->sign,
               ];
    }
}
