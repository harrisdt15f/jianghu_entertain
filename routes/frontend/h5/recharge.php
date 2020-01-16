<?php

use App\Http\Controllers\FrontendApi\H5\RechargeController;

Route::group(
    ['prefix' => 'recharge'],
    static function (): void {
        $namePrefix = 'h5-api.recharge.';
        //获取充值分类
        Route::get('types', [RechargeController::class, 'types'])->name($namePrefix . 'types');
        //获取充值渠道
        Route::get('channels', [RechargeController::class, 'channels'])->name($namePrefix . 'channels');
        //发起充值
        Route::post('recharge', [RechargeController::class, 'recharge'])->name($namePrefix . 'recharge');
    },
);