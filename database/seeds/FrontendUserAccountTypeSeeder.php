<?php

use Illuminate\Database\Seeder;
use App\Models\User\FrontendUsersAccountsType;

/**
 * Class FrontendUserAccountTypeSeeder
 */
class FrontendUserAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontendUsersAccountsType::insert(
            [
                [
                    'name' => '充值',
                    'sign' => 'recharge',
                    'in_out' => 1,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '下级返点',
                    'sign' => 'point_from_child',
                    'in_out' => 1,
                    'param' => '1,2,3,4,5,6,7,8',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '游戏奖金',
                    'sign' => 'game_bonus',
                    'in_out' => 1,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 6,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '撤单返款',
                    'sign' => 'cancel_order',
                    'in_out' => 1,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 2,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '活动礼金',
                    'sign' => 'gift',
                    'in_out' => 1,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 1,
                    'admin_id' => 0,
                ],
                [
                    'name' => '上级充值',
                    'sign' => 'recharge_from_parent',
                    'in_out' => 1,
                    'param' => '1,2,7',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '系统活动转账',
                    'sign' => 'system_claim',
                    'in_out' => 1,
                    'param' => '1,2,8',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '日工资',
                    'sign' => 'day_salary',
                    'in_out' => 1,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '上级分红',
                    'sign' => 'dividend_from_parent',
                    'in_out' => 1,
                    'param' => '1,2,7',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '提现解冻',
                    'sign' => 'withdraw_un_frozen',
                    'in_out' => 1,
                    'param' => '1,2',
                    'frozen_type' => 2,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '提现冻结',
                    'sign' => 'withdraw_frozen',
                    'in_out' => 2,
                    'param' => '1,2',
                    'frozen_type' => 1,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '提现成功',
                    'sign' => 'withdraw_finish',
                    'in_out' => 2,
                    'param' => '1,2',
                    'frozen_type' => 4,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '投注扣款',
                    'sign' => 'bet_cost',
                    'in_out' => 2,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 1,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '追号冻结',
                    'sign' => 'trace_cost',
                    'in_out' => 2,
                    'param' => '1,2,4,5,6',
                    'frozen_type' => 1,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '真实扣款',
                    'sign' => 'real_cost',
                    'in_out' => 2,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 4,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '撤销返点',
                    'sign' => 'cancel_point',
                    'in_out' => 2,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '撤销派奖',
                    'sign' => 'cancel_bonus',
                    'in_out' => 2,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '撤单手续费',
                    'sign' => 'cancel_fee',
                    'in_out' => 2,
                    'param' => '1,2,3,4,5,6',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '为下级充值',
                    'sign' => 'recharge_to_child',
                    'in_out' => 2,
                    'param' => '1,2,9',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '系统扣减',
                    'sign' => 'system_reduce',
                    'in_out' => 2,
                    'param' => '1,2,8',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '分红给下级',
                    'sign' => 'dividend_to_child',
                    'in_out' => 2,
                    'param' => '1,2,9',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '奖金限额扣除',
                    'sign' => 'bonus_limit_reduce',
                    'in_out' => 2,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '人工充值',
                    'sign' => 'artificial_recharge',
                    'in_out' => 1,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '人工扣款',
                    'sign' => 'artificial_deduction',
                    'in_out' => 2,
                    'param' => '1,2',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '投注返点',
                    'sign' => 'bet_commission',
                    'in_out' => 1,
                    'param' => '1,2,3,4,6',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '下级投注反佣',
                    'sign' => 'commission',
                    'in_out' => 1,
                    'param' => '1,2,3,4,6',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '追号解冻',
                    'sign' => 'trace_un_frozen',
                    'in_out' => 1,
                    'param' => '1,2,4,5,6',
                    'frozen_type' => 2,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '追号返款',
                    'sign' => 'trace_refund',
                    'in_out' => 1,
                    'param' => '1,2,4,5',
                    'frozen_type' => 2,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '转入娱乐城',
                    'sign' => 'casino_in',
                    'in_out' => 1,
                    'param' => '1,2,11',
                    'frozen_type' => 4,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
                [
                    'name' => '娱乐城转入平台',
                    'sign' => 'casino_to',
                    'in_out' => 2,
                    'param' => '1,2,11',
                    'frozen_type' => 0,
                    'activity_sign' => 0,
                    'admin_id' => 0,
                ],
            ],
        );
    }
}
