<?php

use App\Http\Controllers\FrontendApi\Test\TestController;

// 测试
Route::group(
    ['prefix' => 'test'],
    static function (): void {
        $namePrefix = 'app-api.test.';
        //测试帐变
        Route::post(
            'account-change',
            [
             TestController::class,
             'accountChange',
            ],
        )->name($namePrefix . 'account-change');
    },
);
