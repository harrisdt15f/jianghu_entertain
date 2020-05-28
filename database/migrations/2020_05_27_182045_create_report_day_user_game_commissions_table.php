<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateReportDayUserGameCommissionsTable
 */
class CreateReportDayUserGameCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'report_day_user_game_commissions',
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('platform_sign', 10)->comment('平台标记');
                $table->string('mobile', 11)->nullable()->default(null)->comment('用户账号（手机号码）');
                $table->string('guid', 16)->nullable()->default(null)->comment('用户游戏唯一标识id');
                $table->string('game_vendor_sign', 32)->nullable()->default(null)->comment('游戏厂商标识');
                $table->string('game_sign', 32)->nullable()->default(null)->comment('游戏标识');
                $table->decimal('bet', 18, 4)->nullable()->default(null)->comment('下注金额');
                $table->decimal('effective_bet', 18, 4)->nullable()->default(null)->comment('有效下注金额');
                $table->decimal('commission', 18, 4)->nullable()->default(null)->comment('洗码彩金');
                $table->date('day')->comment('日期');
                $table->nullableTimestamps();
            },
        );
        DB::statement("ALTER TABLE `report_day_user_game_commissions` comment '用户游戏洗码日报表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('report_day_user_game_commissions');
    }
}
