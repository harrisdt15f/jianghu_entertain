<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFrontendUsersAccountsReportsTable
 */
class CreateFrontendUsersAccountsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'frontend_users_accounts_reports',
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('serial_number', 64)->nullable()->default(null)->comment('序列号');
                $table->string('platform_sign', 10)->nullable()->default(null)->comment('平台标识');
                $table->integer('top_id')->nullable()->default(null)->comment('最上级id');
                $table->integer('parent_id')->nullable()->default(null)->comment('上级id');
                $table->integer('user_id')->nullable()->default(null)->comment('用户ID');
                $table->string('username', 32)->nullable()->default(null)->comment('用户名');
                $table->string('type_sign', 32)->nullable()->default(null)->comment('帐变类型标识');
                $table->string('type_name', 32)->nullable()->default(null)->comment('帐变类型名称');
                $table->integer('params_value_id')->nullable()->default(null)->comment('详情数据表ID');
                $table->tinyInteger('in_out')->nullable()->default(null)->comment('帐变类型1增加 2减少');
                $table->decimal('before_balance', 18, 4)->default('0.0000')->comment('变动前的资金')->unsigned();
                $table->decimal('balance', 18, 4)->default('0.0000')->comment('变动后的资金')->unsigned();
                $table->decimal('before_frozen_balance', 18, 4)->default('0.0000')->comment('变动前的冻结资金')->unsigned();
                $table->decimal('frozen_balance', 18, 4)->default('0.0000')->comment('变动后的冻结资金')->unsigned();
                $table->decimal('amount', 18, 4)->default('0.0000')->comment('金额')->unsigned();
                $table->tinyInteger('frozen_type')->default(0)->comment('冻结类型');
                $table->integer('process_time')->default(0)->comment('处理时间');
                $table->text('params')->nullable()->default(null)->comment('扩展的数据');
                $table->string('desc')->nullable()->default(null)->comment('备注');

                $table->index('serial_number');
                $table->index('platform_sign');
                $table->index('parent_id');
                $table->index('user_id');
                $table->index('type_sign');
                $table->index('in_out');
                $table->index('created_at');
                
                $table->nullableTimestamps();
            },
        );
        DB::statement("ALTER TABLE `frontend_users_accounts_reports` comment '用户帐变记录'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_users_accounts_reports');
    }
}
