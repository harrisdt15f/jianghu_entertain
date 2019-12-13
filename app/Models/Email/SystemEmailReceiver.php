<?php

namespace App\Models\Email;

use App\Models\BaseModel;

/**
 * Class SystemEmailReceiver
 *
 * @package App\Models\Email
 */
class SystemEmailReceiver extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * 接收者类型 总后台
     *
     * @var integer
     */
    public const RECEIVER_TYPE_HEADQUARTERS = 1;
    /**
     * 接收者类型 运营商
     *
     * @var integer
     */
    public const RECEIVER_TYPE_MERCHANT = 2;
    /**
     * 接收者类型 玩家
     *
     * @var integer
     */
    public const RECEIVER_TYPE_PLAYER = 3;
}