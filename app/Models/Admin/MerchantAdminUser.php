<?php

namespace App\Models\Admin;

use App\Models\BaseAuthModel;
use App\Models\Systems\SystemPlatform;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class for marchant admin user.
 */
class MerchantAdminUser extends BaseAuthModel
{

    public const STATUS_CLOSE = 0;
    public const STATUS_OPEN  = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
                         'password',
                         'remember_token',
                        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * @var array
     */
    public static $fieldDefinition = [
                                      'id'       => '管理员ID',
                                      'name'     => '管理员名称',
                                      'email'    => '管理员帐号',
                                      'password' => '管理员密码',
                                      'group_id' => '管理员组ID',
                                      'status'   => '管理员状态',
                                     ];

    /**
     * 所属平台
     * @return BelongsTo
     */
    public function platform(): BelongsTo
    {
        return $this->belongsTo(SystemPlatform::class, 'platform_sign', 'sign');
    }

    /**
     * 角色组
     *
     * @return HasOne
     */
    public function accessGroup(): HasOne
    {
        return $this->hasOne(MerchantAdminAccessGroup::class, 'id', 'group_id');
    }
}
