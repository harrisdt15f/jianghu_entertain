<?php

namespace App\Models\Admin;

use App\Models\BaseAuthModel;
use App\Models\Systems\SystemPlatform;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

/**
 * Class for backend admin user.
 */
class BackendAdminUser extends BaseAuthModel
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        $userKey = $this->getKey();
        return $userKey;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return mixed
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * 平台
     *
     * @return HasOne
     */
    public function platform(): HasOne
    {
        $platform = $this->hasOne(SystemPlatform::class, 'id', 'platform_id');
        return $platform;
    }

    /**
     * 角色组
     *
     * @return HasOne
     */
    public function accessGroup(): HasOne
    {
        $accessGroup = $this->hasOne(BackendAdminAccessGroup::class, 'id', 'group_id');
        return $accessGroup;
    }
}
