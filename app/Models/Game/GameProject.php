<?php

namespace App\Models\Game;

use App\Models\BaseModel;
use App\Models\Game\Logics\GameProjectLogics;
use App\Models\Systems\SystemPlatform;
use App\Models\User\FrontendUser;
use App\Models\User\FrontendUserLevel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Game
 * @package App\Models\Game
 */
class GameProject extends BaseModel
{
    use GameProjectLogics;


    public const STATUS_BET            = 0;//已投注
    public const STATUS_CANCEL         = 1;//已撤销
    public const STATUS_LOSE           = 2;//未中奖
    public const STATUS_WIN            = 3;//已中奖
    public const STATUS_WIN_CALCULATE  = 4;//已派奖
    public const PULL_STATUS_NO        = 0;//未拉取第三方状态
    public const PULL_STATUS_YES       = 1;//已拉取第三方状态
    public const COUNTED_REPORT_NO     = 0;//未计入报表
    public const COUNTED_REPORT_YES    = 1;//已计入报表
    public const COMMISSION_STATUS_NO  = 0;//未统计洗码
    public const COMMISSION_STATUS_YES = 1;//已统计洗码

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public static $fieldDefinition = [
                                      'guid'              => '用户ID',
                                      'serial_number'     => '注单号',
                                      'status'            => '状态',
                                      'game_vendor_sign'  => '游戏厂商',
                                      'their_create_time' => '注单时间',
                                      'delivery_time'     => '派彩时间',
                                      'created_at'        => '入库时间',
                                     ];

    /**
     * 用户
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class, 'user_id', 'id');
    }

    /**
     * 游戏
     * @return BelongsTo
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_sign', 'sign');
    }

    /**
     * 游戏厂商
     * @return BelongsTo
     */
    public function gameVendor(): BelongsTo
    {
        return $this->belongsTo(GameVendor::class, 'game_vendor_sign', 'sign');
    }

    /**
     * 等级
     * @return BelongsTo
     */
    public function userLevel(): BelongsTo
    {
        return $this->belongsTo(FrontendUserLevel::class, 'vip_level_id', 'id');
    }


    /**
     * 平台
     * @return BelongsTo
     */
    public function platform(): BelongsTo
    {
        return $this->belongsTo(SystemPlatform::class, 'platform_sign', 'sign');
    }
}
