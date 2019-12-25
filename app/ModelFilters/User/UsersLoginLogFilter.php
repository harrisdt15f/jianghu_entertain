<?php

namespace App\ModelFilters\User;

use EloquentFilter\ModelFilter;

/**
 * 用户
 */
class UsersLoginLogFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * 用户UID查询
     *
     * @param  string $uniqueId 用户UID.
     * @return $this
     */
    public function uniqueId(string $uniqueId)
    {
        $eloq = $this->where('uid', $uniqueId);
        return $eloq;
    }

    /**
     * 手机号码查询
     *
     * @param  string $mobile 手机号码.
     * @return $this
     */
    public function mobile(string $mobile)
    {
        $eloq = $this->where('mobile', $mobile);
        return $eloq;
    }

    /**
     * 最后登陆IP查询
     *
     * @param  string $lastLoginIp 最后登陆IP.
     * @return $this
     */
    public function lastLoginIp(string $lastLoginIp)
    {
        $eloq = $this->where('last_login_ip', $lastLoginIp);
        return $eloq;
    }

    /**
     * 注册时间查询
     *
     * @param  string $createAt 注册时间.
     * @return $this
     */
    public function createAt(string $createAt)
    {
        $createTime = json_decode($createAt, true);
        $eloq       = $this;
        if ($createTime !== null) {
            if (count($createTime) === 2) {
                $eloq = $this->whereBetween('created_at', $createTime);
            }
        }
        return $eloq;
    }

    /**
     * 平台标识查询
     * @param  string $sign 平台标识.
     * @return $this
     */
    public function platformSign(string $sign)
    {
        $eloq = $this->where('platform_sign', $sign);
        return $eloq;
    }
}