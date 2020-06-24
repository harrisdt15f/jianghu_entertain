<?php

use App\Models\User\FrontendUsersWithdrawOrder;
use Illuminate\Database\Seeder;

/**
 * Class FrontendUsersWithdrawOrderSeeder
 */
class FrontendUsersWithdrawOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FrontendUsersWithdrawOrder::insert(
            [
             [
              'id'              => 1,
              'platform_sign'   => 'JHHY',
              'order_no'        => '20200410224041873745',
              'mobile'          => '18844446666',
              'user_id'         => 2,
              'amount'          => '1500.0000',
              'before_balance'  => '30000.0000',
              'handing_fee'     => null,
              'audit_fee'       => '30.0000',
              'amount_received' => null,
              'account_type'    => 1,
              'is_audit'        => 0,
              'status'          => 0,
              'month_total'     => '30000.0000',
              'num_withdrawal'  => 0,
              'num_top_up'      => 0,
              'account_snap'    => '{"branch": "苏州路6号", "owner_name": "亚索", "card_number": "6228480402564890018"}',
              'remark'          => null,
              'reviewer_id'     => null,
              'admin_id'        => null,
              'operation_at'    => null,
              'review_at'       => null,
              'created_at'      => '2020-04-10 22:40:41',
              'updated_at'      => '2020-04-10 22:40:41',
             ],
             [
              'id'              => 2,
              'platform_sign'   => 'JHHY',
              'order_no'        => '20200410224042649912',
              'mobile'          => '18844446666',
              'user_id'         => 2,
              'amount'          => '1500.0000',
              'before_balance'  => '28500.0000',
              'handing_fee'     => null,
              'audit_fee'       => '30.0000',
              'amount_received' => null,
              'account_type'    => 1,
              'is_audit'        => 0,
              'status'          => 0,
              'month_total'     => '30000.0000',
              'num_withdrawal'  => 1,
              'num_top_up'      => 0,
              'account_snap'    => '{"branch": "苏州路6号", "owner_name": "亚索", "card_number": "6228480402564890018"}',
              'remark'          => null,
              'reviewer_id'     => null,
              'admin_id'        => null,
              'operation_at'    => null,
              'review_at'       => null,
              'created_at'      => '2020-04-10 22:40:42',
              'updated_at'      => '2020-04-10 22:40:42',
             ],
             [
              'id'              => 3,
              'platform_sign'   => 'JHHY',
              'order_no'        => '20200410224043088099',
              'mobile'          => '18844446666',
              'user_id'         => 2,
              'amount'          => '1500.0000',
              'before_balance'  => '27000.0000',
              'handing_fee'     => null,
              'audit_fee'       => '30.0000',
              'amount_received' => null,
              'account_type'    => 1,
              'is_audit'        => 0,
              'status'          => 0,
              'month_total'     => '30000.0000',
              'num_withdrawal'  => 2,
              'num_top_up'      => 0,
              'account_snap'    => '{"branch": "苏州路6号", "owner_name": "亚索", "card_number": "6228480402564890018"}',
              'remark'          => null,
              'reviewer_id'     => null,
              'admin_id'        => null,
              'operation_at'    => null,
              'review_at'       => null,
              'created_at'      => '2020-04-10 22:40:43',
              'updated_at'      => '2020-04-10 22:40:43',
             ],
             [
              'id'              => 4,
              'platform_sign'   => 'JHHY',
              'order_no'        => '20200410224043547585',
              'mobile'          => '18844446666',
              'user_id'         => 2,
              'amount'          => '1500.0000',
              'before_balance'  => '25500.0000',
              'handing_fee'     => null,
              'audit_fee'       => '30.0000',
              'amount_received' => null,
              'account_type'    => 1,
              'is_audit'        => 0,
              'status'          => 0,
              'month_total'     => '30000.0000',
              'num_withdrawal'  => 3,
              'num_top_up'      => 0,
              'account_snap'    => '{"branch": "苏州路6号", "owner_name": "亚索", "card_number": "6228480402564890018"}',
              'remark'          => null,
              'reviewer_id'     => null,
              'admin_id'        => null,
              'operation_at'    => null,
              'review_at'       => null,
              'created_at'      => '2020-04-10 22:40:43',
              'updated_at'      => '2020-04-10 22:40:43',
             ],
             [
              'id'              => 5,
              'platform_sign'   => 'JHHY',
              'order_no'        => '20200410224044709696',
              'mobile'          => '18844446666',
              'user_id'         => 2,
              'amount'          => '1500.0000',
              'before_balance'  => '24000.0000',
              'handing_fee'     => null,
              'audit_fee'       => '30.0000',
              'amount_received' => null,
              'account_type'    => 1,
              'is_audit'        => 0,
              'status'          => 0,
              'month_total'     => '30000.0000',
              'num_withdrawal'  => 4,
              'num_top_up'      => 0,
              'account_snap'    => '{"branch": "苏州路6号", "owner_name": "亚索", "card_number": "6228480402564890018"}',
              'remark'          => null,
              'reviewer_id'     => null,
              'admin_id'        => null,
              'operation_at'    => null,
              'review_at'       => null,
              'created_at'      => '2020-04-10 22:40:44',
              'updated_at'      => '2020-04-10 22:40:44',
             ],
            ],
        );
    }
}
