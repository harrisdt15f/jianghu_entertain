<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantSystemMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'merchant_system_menus',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('label', 20)->nullable()->default(null)->comment('标题');
                $table->string('en_name', 20)->nullable()->default(null)->comment('英文名');
                $table->string('route', 50)->nullable()->default(null)->comment('路由');
                $table->integer('pid')->nullable()->default(null)->comment('上级id');
                $table->string('icon', 20)->nullable()->default(null)->comment('图标class');
                $table->tinyInteger('display')->nullable()->default(null)->comment('是否显示：0否 1是');
                $table->tinyInteger('level')->nullable()->default(null)->comment('层级');
                $table->integer('sort')->nullable()->default(null)->comment('排序');
                $table->tinyInteger('type')->nullable()->default(null)->comment('1菜单 2按钮 3普通链接');
                $table->nullableTimestamps();
            },
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_system_menus');
    }
}
