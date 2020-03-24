<?php

use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Illuminate\Database\Seeder;

/**
 * Class BackendSystemMenuSeeder
 */
class BackendSystemMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        BackendSystemMenu::insert(
            [
             [
              'id'      => '1',
              'label'   => '首页',
              'en_name' => '',
              'route'   => '/home',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '2',
              'label'   => '首页',
              'en_name' => '',
              'route'   => '/home',
              'pid'     => 1,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '3',
              'label'   => '厅主管理',
              'en_name' => '',
              'route'   => '/hall',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '4',
              'label'   => '厅主列表',
              'en_name' => '',
              'route'   => '/hall/halllist',
              'pid'     => 3,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '5',
              'label'   => '登录记录',
              'en_name' => '',
              'route'   => '/hall/loginrecord',
              'pid'     => 3,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '6',
              'label'   => '游戏管理',
              'en_name' => '',
              'route'   => '/home',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '7',
              'label'   => '厂商管理',
              'en_name' => '',
              'route'   => '/game/vendormanage',
              'pid'     => 6,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '8',
              'label'   => '分类设置',
              'en_name' => '',
              'route'   => '/game/sortset',
              'pid'     => 6,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '9',
              'label'   => '游戏管理',
              'en_name' => '',
              'route'   => '/game/gamemanage',
              'pid'     => 6,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '10',
              'label'   => '活动管理',
              'en_name' => '',
              'route'   => '/active',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 4,
              'type'    => 1,
             ],
             [
              'id'      => '11',
              'label'   => '活动列表',
              'en_name' => '',
              'route'   => '/active/activelist',
              'pid'     => 10,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '12',
              'label'   => '邮件系统',
              'en_name' => '',
              'route'   => '/email',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 5,
              'type'    => 1,
             ],
             [
              'id'      => '13',
              'label'   => '发邮件',
              'en_name' => '',
              'route'   => '/email/sendemail',
              'pid'     => 12,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '14',
              'label'   => '收件箱',
              'en_name' => '',
              'route'   => '/email/receiveemail',
              'pid'     => 12,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '15',
              'label'   => '已发邮件',
              'en_name' => '',
              'route'   => '/email/emailsent',
              'pid'     => 12,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '16',
              'label'   => '报表管理',
              'en_name' => '',
              'route'   => '/report',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 6,
              'type'    => 1,
             ],
             [
              'id'      => '17',
              'label'   => '厅主注单报表',
              'en_name' => '',
              'route'   => '/report/hallregist',
              'pid'     => 16,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '18',
              'label'   => '第三方游戏报表',
              'en_name' => '',
              'route'   => '/report/thirdgame',
              'pid'     => 16,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '19',
              'label'   => '厅主游戏报表',
              'en_name' => '',
              'route'   => '/report/hallgame',
              'pid'     => 16,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '20',
              'label'   => '厅主充提报表',
              'en_name' => '',
              'route'   => '/report/halldeposit',
              'pid'     => 16,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 4,
              'type'    => 1,
             ],
             [
              'id'      => '21',
              'label'   => '金流配置',
              'en_name' => '',
              'route'   => '/cashflow',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 7,
              'type'    => 1,
             ],
             [
              'id'      => '22',
              'label'   => '厂商管理',
              'en_name' => '',
              'route'   => '/cashflow/cashflowvendor',
              'pid'     => 21,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '23',
              'label'   => '分类管理',
              'en_name' => '',
              'route'   => '/cashflow/cashflowsort',
              'pid'     => 21,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '24',
              'label'   => '通道管理',
              'en_name' => '',
              'route'   => '/cashflow/channelmanage',
              'pid'     => 21,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '25',
              'label'   => '设置管理',
              'en_name' => '',
              'route'   => '/set',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 8,
              'type'    => 1,
             ],
             [
              'id'      => '26',
              'label'   => '管理员分组',
              'en_name' => '',
              'route'   => '/set/adminsort',
              'pid'     => 25,
              'icon'    => null,
              'display' => 1,
              'level'   => 5,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '27',
              'label'   => '操作日志',
              'en_name' => '',
              'route'   => '/set/operatlog',
              'pid'     => 25,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '28',
              'label'   => '短信配置',
              'en_name' => '',
              'route'   => '/set/smsconfig',
              'pid'     => 25,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 3,
              'type'    => 1,
             ],
             [
              'id'      => '29',
              'label'   => '开发管理',
              'en_name' => '',
              'route'   => '/dev',
              'pid'     => 0,
              'icon'    => null,
              'display' => 1,
              'level'   => 1,
              'sort'    => 9,
              'type'    => 1,
             ],
             [
              'id'      => '30',
              'label'   => '总控菜单管理',
              'en_name' => '',
              'route'   => '/dev/totalmenu',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 1,
              'type'    => 1,
             ],
             [
              'id'      => '31',
              'label'   => '厅主菜单管理',
              'en_name' => '',
              'route'   => '/dev/hallmenu',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 2,
              'type'    => 1,
             ],
             [
              'id'      => '33',
              'label'   => '游戏分类配置',
              'en_name' => '',
              'route'   => '/dev/gamesort',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 4,
              'type'    => 1,
             ],
             [
              'id'      => '34',
              'label'   => '游戏管理配置',
              'en_name' => '',
              'route'   => '/dev/gamemanaconfig',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 5,
              'type'    => 1,
             ],
             [
              'id'      => '35',
              'label'   => '金流厂商配置',
              'en_name' => '',
              'route'   => '/dev/cashvendorconfig',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 6,
              'type'    => 1,
             ],
             [
              'id'      => '36',
              'label'   => '金流分类管理',
              'en_name' => '',
              'route'   => '/dev/cashsort',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 7,
              'type'    => 1,
             ],
             [
              'id'      => '37',
              'label'   => '金流通道配置',
              'en_name' => '',
              'route'   => '/dev/cashchannel',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 8,
              'type'    => 1,
             ],
             [
              'id'      => '38',
              'label'   => '金流银行卡配置',
              'en_name' => '',
              'route'   => '/dev/cashbankcard',
              'pid'     => 29,
              'icon'    => null,
              'display' => 1,
              'level'   => 2,
              'sort'    => 9,
              'type'    => 1,
             ],
             [
              'id'      => '39',
              'label'   => '全域',
              'en_name' => '',
              'route'   => '',
              'pid'     => 0,
              'icon'    => null,
              'display' => 0,
              'level'   => 1,
              'sort'    => 10,
              'type'    => 1,
             ],
            ],
        );
    }
}
