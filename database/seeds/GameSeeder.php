<?php

use App\Models\Game\Game;
use Illuminate\Database\Seeder;

/**
 * Class GameSeeder
 */
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Game::insert(
            [
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '游戏大厅',
              'sign'         => '0',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '德州扑克牌',
              'sign'         => '620',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '炸金花',
              'sign'         => '220',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '三公',
              'sign'         => '860',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '世界足球赛',
              'sign'         => '10001',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '射兔神手',
              'sign'         => '10002',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '梦幻排球赛',
              'sign'         => '10003',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '斗牛对决',
              'sign'         => '10004',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '拳击王者战',
              'sign'         => '10005',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '欢乐捕鱼',
              'sign'         => '10006',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '最佳阵容',
              'sign'         => '10007',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '彩运享通',
              'sign'         => '10008',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '丝路寻梦',
              'sign'         => '10009',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '幸福宝藏',
              'sign'         => '100010',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '二人麻将',
              'sign'         => '740',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '幸运转盘',
              'sign'         => '1350',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '金鲨银鲨',
              'sign'         => '1940',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '奔驰宝马',
              'sign'         => '1960',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '百人骰宝',
              'sign'         => '1960',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '单挑牛牛',
              'sign'         => '1810',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '炸金牛',
              'sign'         => '1990',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '押宝抢庄牛牛',
              'sign'         => '1850',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '红包捕鱼',
              'sign'         => '510',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '血战到底',
              'sign'         => '1660',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '搏一搏',
              'sign'         => '1355',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '五星宏辉',
              'sign'         => '1970',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '赌场扑克',
              'sign'         => '1860',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '港式梭哈',
              'sign'         => '1370',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '血战骰宝',
              'sign'         => '1690',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '水果机',
              'sign'         => '1890',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '二八杠',
              'sign'         => '720',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '抢庄牛牛',
              'sign'         => '830',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '押庄龙虎',
              'sign'         => '900',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '21点',
              'sign'         => '600',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '通比牛牛',
              'sign'         => '870',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '极速炸金花',
              'sign'         => '230',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '抢庄牌九',
              'sign'         => '730',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '十三水',
              'sign'         => '630',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '斗地主',
              'sign'         => '610',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '百家乐',
              'sign'         => '910',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '森林舞会',
              'sign'         => '920',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '百人牛牛',
              'sign'         => '930',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '万人炸金花',
              'sign'         => '1950',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '血流成河',
              'sign'         => '650',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 2,
              'name'         => '看牌抢庄牛牛',
              'sign'         => '890',
              'request_mode' => 1,
              'status'       => 1,
             ],
            ],
        );
    }
}
