<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSystemFinanceOnlineInfosTable
 */
class CreateSystemFinanceOnlineInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'system_finance_online_infos',
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('frontend_name', 64)->nullable()->index()->comment('前台名称');
                $table->string('frontend_remark')->nullable()->comment('前台备注');
                $table->string('backend_name', 64)->nullable()->comment('后台名称');
                $table->string('backend_remark')->nullable()->comment('后台备注');
                $table->string('platform_sign', 10)->nullable()->index()->comment('平台标识');
                $table->integer('channel_id')->nullable()->comment('所属通道id');
                $table->decimal('min_amount', 20)->nullable()->default(0.00)->comment('最小充值金额');
                $table->decimal('max_amount', 20)->nullable()->default(0.00)->comment('最大充值金额');
                $table->decimal('handle_fee', 20)->nullable()->default(0.00)->comment('手续费');
                $table->string('rebate_fee', 10)->nullable()->default(0.00)->comment('返点');
                $table->string('request_url')->nullable()->comment('请求地址');
                $table->string('back_url')->nullable()->comment('返回地址');
                $table->string('merchant_code')->nullable()->index()->comment('商户号');
                $table->text('merchant_secret')->nullable()->comment('商户密钥');
                $table->text('public_key')->nullable()->comment('第三方公钥');
                $table->text('private_key')->nullable()->comment('第三方私钥');
                $table->string('app_id')->nullable()->comment('终端号');
                $table->string('vendor_url')->nullable()->comment('第三方域名');
                $table->string('level_ids')->nullable()->comment('可见的用户层级');
                $table->tinyInteger('status')->default(0)->index()->comment('状态 1 启用 0 禁用');
                $table->integer('sort')->default(0)->comment('排序');
                $table->tinyInteger('auto_audit')->nullable()->comment('是否自动审核 1 是 0 否');
                $table->string('merchant_no')->nullable()->comment('商户编号');
                $table->string('desc')->nullable()->comment('充值说明 备注');
                $table->tinyInteger('encrypt_mode')->default(1)->comment('加密方式 1 密钥模式 2 证书模式');
                $table->string('certificate')->nullable()->comment('证书');
                $table->integer('author_id')->default(0)->comment('创建人id');
                $table->integer('last_editor_id')->default(0)->comment('最后编辑人id');
                $table->timestamps();
            },
        );
        DB::statement("ALTER TABLE `system_finance_online_infos` comment '线上金流详情表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('system_finance_online_infos');
    }
}
