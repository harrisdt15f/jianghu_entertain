<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateReportDayUserGamesTable
 */
class CreateReportDayUserGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'report_day_user_games',
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('platform_sign', 10)->comment('所属平台标记');
                $table->string('mobile', 11)->comment('用户账号（手机号码）');
                $table->string('guid', 16)->comment('用户游戏唯一标识id');
                $table->string('game_sign', 32)->comment('所属游戏标记');
                $table->string('game_vendor_sign', 32)->comment('所属游戏厂商');
                $table->decimal('bet_money', 18, 4)->nullable()->default(0)->comment('下注金额');
                $table->decimal('effective_bet', 18, 4)->nullable()->default(0)->comment('有效下注金额');
                $table->decimal('win_money', 18, 4)->nullable()->default(0)->comment('中奖金额');
                $table->decimal('our_net_win', 18, 4)->nullable()->default(0)->comment('我们平台净赚金额（税收）');
                $table->decimal('rebate', 18, 4)->nullable()->default(0)->comment('洗码返利');
                $table->decimal('commission', 18, 4)->nullable()->default(0)->comment('佣金');
                $table->date('day')->comment('日期');
                $table->nullableTimestamps();
            },
        );
        DB::statement("ALTER TABLE `report_day_user_games` comment '用户游戏日报表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('report_day_user_games');
    }
}
