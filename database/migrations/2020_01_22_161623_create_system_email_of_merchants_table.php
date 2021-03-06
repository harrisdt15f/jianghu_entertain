<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSystemEmailOfMerchantsTable
 */
class CreateSystemEmailOfMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'system_email_of_merchants',
            static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->integer('email_id')->default(0)->comment('邮件id');
                $table->integer('merchant_id')->default(0)->comment('商户id');
                $table->tinyInteger('is_read')->default(0)->comment('是否已读 0 未读 1 已读');
                $table->string('platform_sign')->default(' ')->comment('平台标记');
                $table->timestamps();
            },
        );
        DB::statement("ALTER TABLE `system_email_of_merchants` comment '厅主收件箱'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('system_email_of_merchants');
    }
}
