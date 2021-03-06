<?php

use App\Http\Controllers\BackendApi\Headquarters\Report\ReportController;

//报表管理
Route::group(
    ['prefix' => 'report'],
    static function (): void {
        $namePrefix = 'headquarters-api.report.';
        //厅主注单报表-列表
        route::post(
            'game-project',
            [
             ReportController::class,
             'gameProject',
            ],
        )->name($namePrefix . 'game-project');
        //第三方游戏报表-列表
        route::post(
            'game-vendor',
            [
             ReportController::class,
             'gameVendor',
            ],
        )->name($namePrefix . 'game-vendor');
        //厅主游戏报表-列表
        route::post(
            'platform-game',
            [
             ReportController::class,
             'platformGame',
            ],
        )->name($namePrefix . 'platform-game');
        //厅主充提报表-列表
        route::post(
            'platform-account',
            [
             ReportController::class,
             'platformAccount',
            ],
        )->name($namePrefix . 'platform-account');
    },
);
