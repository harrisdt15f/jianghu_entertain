<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNoticeSystemsTable
 */
class CreateNoticeSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'notice_systems',
            static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->integer('platform_id')->default(0)->comment('平台id');
                $table->string('title', 64)->default(' ')->comment('公告标题');
                $table->string('h5_pic', 128)->default(' ')->comment('h5端图片链接');
                $table->string('app_pic', 128)->default(' ')->comment('app端图片链接');
                $table->string('pc_pic', 128)->default(' ')->comment('pc端图片链接');
                $table->string('device', 8)->default(' ')->comment('所拥有的设备');
                $table->date('start_time')->nullable()->default(null)->comment('开始时间');
                $table->date('end_time')->nullable()->default(null)->comment('结束时间');
                $table->integer('author_id')->default(0)->comment('创建人id');
                $table->integer('last_editor_id')->default(0)->comment('最后编辑人id');
                $table->timestamps();
                $table->index('title');
            },
        );
        DB::statement("ALTER TABLE `notice_systems` comment '系统公告表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_systems');
    }
}
