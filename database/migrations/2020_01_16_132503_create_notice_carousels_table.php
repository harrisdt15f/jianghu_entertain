<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNoticeCarouselsTable
 */
class CreateNoticeCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'notice_carousels',
            static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->integer('platform_id')->default(0)->comment('平台id');
                $table->string('title', 64)->default(' ')->comment('公告标题');
                $table->integer('pic_id')->nullable()->comment('图标id');
                $table->tinyInteger('type')->default(0)->comment('轮播类型 1 内部 2 外部');
                $table->string('link', 128)->default(' ')->comment('跳转链接');
                $table->timestamp('start_time')->useCurrent()->comment('开始时间');
                $table->timestamp('end_time')->useCurrent()->comment('结束时间');
                $table->tinyInteger('status')->default(0)->comment('状态 0 禁用 1 启用');
                $table->integer('author_id')->default(0)->comment('创建人id');
                $table->integer('last_editor_id')->default(0)->comment('最后编辑人id');
                $table->tinyInteger('device')->default(0)->comment('所属设备 1 pc 2 h5 3 app');
                $table->timestamps();
                $table->index('platform_id');
                $table->index('device');
            },
        );
        DB::statement("ALTER TABLE `notice_carousels` comment '轮播公告表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_carousels');
    }
}
