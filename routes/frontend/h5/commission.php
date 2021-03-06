<?php

use App\Http\Controllers\FrontendApi\Common\CommissionController;

Route::group(
    ['prefix' => 'commission'],
    static function (): void {
        $namePrefix = 'h5-api.commission.';
        //佣金-洗码收益
        Route::post('rebate', [CommissionController::class, 'rebate'])->name($namePrefix . 'rebate');
        //佣金-代理收益
        Route::post(
            'report',
            [
             CommissionController::class,
             'report',
            ],
        )->name($namePrefix . 'report');
    },
);
