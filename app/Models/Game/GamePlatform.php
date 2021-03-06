<?php

namespace App\Models\Game;

use App\Models\BaseModel;
use App\Models\Systems\StaticResource;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * Class GamePlatform
 *
 * @package App\Models\Game
 */
class GamePlatform extends BaseModel
{

    public const IS_HOT_YES  = 1;
    public const IS_HOT_NO   = 0;
    public const STATUS_OPEN = 1;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public static $fieldDefinition = [
                                      'device'  => '设备类型',
                                      'hot_new' => '是否热门',
                                     ];

    /**
     * @return BelongsTo
     */
    public function games(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    /**
     * @return HasOneThrough
     */
    public function vendor(): HasOneThrough
    {
        return $this->hasOneThrough(GameVendor::class, Game::class, 'id', 'id', 'id', 'vendor_id');
    }

    /**
     * @return HasOneThrough
     */
    public function type(): HasOneThrough
    {
        return $this->hasOneThrough(GameType::class, Game::class, 'id', 'id', 'id', 'type_id');
    }

    /**
     * @return HasOne
     */
    public function icon(): HasOne
    {
        return $this->hasOne(StaticResource::class, 'id', 'icon_id');
    }
}
