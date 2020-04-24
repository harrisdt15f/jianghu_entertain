<?php

namespace App\Models\Systems;

use App\Models\FilterModel;

/**
 * 前台系统日志
 */
class SystemLogsFrontend extends FilterModel
{
    public const PHONE    = 1;
    public const DESKSTOP = 2;
    public const ROBOT    = 3;
    public const MOBILE   = 4;
    public const TABLET   = 5;
    public const OTHER    = 6;

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
                        'inputs' => 'array',
                        'route'  => 'array',
                       ];
}
