<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemRoutesBackendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_routes_backends', function (Blueprint $table) {
            $table->increments('id');
            $table->collation = 'utf8mb4_0900_ai_ci';
            $table->string('route_name', 64)->nullable()->default(null)->comment('路由名称');
            $table->string('controller', 128)->nullable()->default(null)->comment('控制器');
            $table->string('method', 64)->nullable()->default(null)->comment('方法');
            $table->unsignedInteger('menu_group_id')->nullable()->default(null)->comment('菜单id');
            $table->string('title', 45)->nullable()->default(null)->comment('标题');
            $table->text('description')->nullable()->default(null)->comment('描述');
            $table->tinyInteger('is_open')->nullable()->default('0')->comment('0封闭式 1开放式');
            $table->nullableTimestamps();
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `system_routes_backends` comment '后台路由'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_routes_backends');
    }
}
