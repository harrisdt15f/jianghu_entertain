<?php

namespace App\Http\Resources\Backend\Merchant\Game;

use App;
use App\Http\Resources\BaseResource;
use App\Models\Game\Game;

/**
 * Class IndexResource
 * @package App\Http\Resources\Backend\Merchant\Game
 */
class IndexResource extends BaseResource
{

    /**
     * @var integer $id Id.
     */
    private $id;

    /**
     * @var Game $games Game Model.
     */
    private $games;

    /**
     * @var integer $sort Sort.
     */
    private $sort;

    /**
     * @var integer $hot_new Hot_new.
     */
    private $hot_new;

    /**
     * @var App\Models\Systems\StaticResource $icon 游戏图标地址.
     */
    private $icon;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        unset($request);
        $appEnvironment = App::environment();
        $icon           = $this->icon->path ?? null;
        return [
                'id'        => $this->id,
                'icon'      => config('image_domain.' . $appEnvironment) . $icon,
                'name'      => $this->games->name,
                'sort'      => $this->sort,
                'hot_new'   => $this->hot_new,
                'vendor'    => optional($this->games->vendor)->name,
                'vendor_id' => $this->games->vendor_id,
               ];
    }
}
