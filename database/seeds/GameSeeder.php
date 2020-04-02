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
              'type_id'      => 0,
              'sub_type_id'  => 0,
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
              'name'         => '德州扑克',
              'sign'         => '620',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '二八杠',
              'sign'         => '720',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '抢庄牛牛',
              'sign'         => '830',
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
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '压庄龙虎',
              'sign'         => '900',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '21点',
              'sign'         => '600',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '通比牛牛',
              'sign'         => '870',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 5,
              'vendor_id'    => 1,
              'name'         => '欢乐红包',
              'sign'         => '880',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '急速炸金花',
              'sign'         => '230',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 5,
              'vendor_id'    => 1,
              'name'         => '抢庄牌九',
              'sign'         => '730',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '十三水',
              'sign'         => '630',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '幸运五张',
              'sign'         => '380',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '斗地主',
              'sign'         => '610',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '射龙门',
              'sign'         => '390',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '百家乐',
              'sign'         => '910',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '森林舞会',
              'sign'         => '920',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '百人牛牛',
              'sign'         => '930',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '万人炸金花',
              'sign'         => '1950',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 3,
              'vendor_id'    => 1,
              'name'         => '血流成河',
              'sign'         => '650',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '看牌抢庄牛牛',
              'sign'         => '890',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 3,
              'vendor_id'    => 1,
              'name'         => '二人麻将',
              'sign'         => '740',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '幸运转盘',
              'sign'         => '1350',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '金鲨银鲨',
              'sign'         => '1940',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '奔驰宝马',
              'sign'         => '1960',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 1,
              'name'         => '百人骰宝',
              'sign'         => '1980',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '单挑牛牛',
              'sign'         => '1810',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '炸金牛',
              'sign'         => '1990',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 2,
              'vendor_id'    => 1,
              'name'         => '押宝抢庄牛牛',
              'sign'         => '1850',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 3,
              'sub_type_id'  => 5,
              'vendor_id'    => 1,
              'name'         => '红包捕鱼',
              'sign'         => '510',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 3,
              'vendor_id'    => 1,
              'name'         => '血战到底',
              'sign'         => '1660',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '搏一搏',
              'sign'         => '1355',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '五星宏辉',
              'sign'         => '1970',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '赌场扑克',
              'sign'         => '1860',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 1,
              'vendor_id'    => 1,
              'name'         => '港式梭哈',
              'sign'         => '1370',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 1,
              'sub_type_id'  => 4,
              'vendor_id'    => 1,
              'name'         => '血战骰宝',
              'sign'         => '1690',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '水果机',
              'sign'         => '1890',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 4,
              'sub_type_id'  => 6,
              'vendor_id'    => 1,
              'name'         => '幸运夺宝',
              'sign'         => '1610',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 8,
              'vendor_id'    => 2,
              'name'         => 'VR赛马',
              'sign'         => '36',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 8,
              'vendor_id'    => 2,
              'name'         => 'VR游泳',
              'sign'         => '37',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 8,
              'vendor_id'    => 2,
              'name'         => 'VR自行车',
              'sign'         => '38',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => 'VR自开游戏大厅',
              'sign'         => '10000',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '世界足球赛',
              'sign'         => '10001',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '射兔神手',
              'sign'         => '10002',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '梦幻排球赛',
              'sign'         => '10003',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '斗牛对决',
              'sign'         => '10004',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '拳击王者战',
              'sign'         => '10005',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '欢乐捕鱼',
              'sign'         => '10006',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '最佳阵容',
              'sign'         => '10007',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '彩运亨通',
              'sign'         => '10008',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '丝路寻梦',
              'sign'         => '10009',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 7,
              'vendor_id'    => 2,
              'name'         => '幸福宝藏',
              'sign'         => '10010',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR金星1.5分彩',
              'sign'         => '1',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR赛车',
              'sign'         => '2',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR3分彩',
              'sign'         => '11',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR北京赛车',
              'sign'         => '13',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR彩票百家乐',
              'sign'         => '15',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR六合彩',
              'sign'         => '16',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 9,
              'vendor_id'    => 2,
              'name'         => 'VR重庆时时彩',
              'sign'         => '42',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR水星分分彩',
              'sign'         => '34',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR木星赛车',
              'sign'         => '35',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR11选5',
              'sign'         => '39',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR快三',
              'sign'         => '40',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR幸运28',
              'sign'         => '41',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 5,
              'sub_type_id'  => 10,
              'vendor_id'    => 2,
              'name'         => 'VR 10分彩',
              'sign'         => '46',
              'request_mode' => 1,
              'status'       => 1,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '腾讯分分彩',
              'sign'         => '45',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '重庆时时彩',
              'sign'         => '3',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '新疆时时彩',
              'sign'         => '4',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '天津时时彩',
              'sign'         => '5',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '广东11选5',
              'sign'         => '6',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '江西11选5',
              'sign'         => '7',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '北京赛车',
              'sign'         => '8',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '江苏快三',
              'sign'         => '9',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '幸运28',
              'sign'         => '10',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '香港六合彩',
              'sign'         => '14',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '云南时时彩',
              'sign'         => '17',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '上海11选5',
              'sign'         => '18',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '山东11选5',
              'sign'         => '19',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '新疆11选5',
              'sign'         => '20',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '江苏11选5',
              'sign'         => '21',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '辽宁11选5',
              'sign'         => '22',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '河北11选5',
              'sign'         => '23',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '吉林快三',
              'sign'         => '26',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '北京快三',
              'sign'         => '27',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '广西快三',
              'sign'         => '29',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '河南快三',
              'sign'         => '30',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '湖北快三',
              'sign'         => '31',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '河北快三',
              'sign'         => '32',
              'request_mode' => 1,
              'status'       => 0,
             ],
             [
              'type_id'      => 6,
              'sub_type_id'  => 11,
              'vendor_id'    => 2,
              'name'         => '内蒙古快三',
              'sign'         => '33',
              'request_mode' => 1,
              'status'       => 0,
             ],
            ],
        );
    }
}
