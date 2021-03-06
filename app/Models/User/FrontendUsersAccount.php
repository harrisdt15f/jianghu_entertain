<?php

namespace App\Models\User;

use App\Models\BaseAuthModel;
use App\Models\User\Logics\FrontendUsersAccountLogics;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FrontendUsersAccount
 *
 * @package App\Models\User
 */
class FrontendUsersAccount extends BaseAuthModel
{
    /**
     * 账户Logics
     */
    use FrontendUsersAccountLogics;

    public const FROZEN_STATUS_NO        = 0; //冻结无关
    public const FROZEN_STATUS_OUT       = 1; //冻结金额
    public const FROZEN_STATUS_BACK      = 2; //解冻金额(返还给用户)
    public const FROZEN_STATUS_GAME_WIN  = 3; //游戏中奖
    public const FROZEN_STATUS_TO_SYSTEM = 4; //扣除冻结金额
    public const TAX_STATUS_DONE         = 0; //稽核状态  0已完成
    public const TAX_STATUS_UNDONE       = 1; //稽核状态  1未完成

    public const TAX_STATUS_NO  = 0; //稽核已完成 提现不需要扣除稽核手续费
    public const TAX_STATUS_YES = 1; //稽核未完成 提现需要扣除稽核手续费

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $rechargeTypes = [
                                'recharge',
                                'artificial_recharge',
                               ];

    /**
     * @var array
     */
    protected $activityTypes = ['gift'];

    /**
     * 用户信息
     *
     * @return BelongsTo
     */
    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class, 'user_id', 'id');
    }
}
