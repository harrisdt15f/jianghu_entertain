<?php

use App\Models\Finance\SystemFinanceOnlineInfo;
use Illuminate\Database\Seeder;

/**
 * Class SystemFinanceOnlineInfoSeeder
 */
class SystemFinanceOnlineInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SystemFinanceOnlineInfo::insert(
            [
             [
              'id'              => 1,
              'frontend_name'   => '支付宝扫码1',
              'frontend_remark' => null,
              'backend_name'    => null,
              'backend_remark'  => '第三方：天道支付 通道：支付宝扫码',
              'platform_sign'   => 'JHHY',
              'channel_id'      => 1,
              'min_amount'      => '200.00',
              'max_amount'      => '10000.00',
              'handle_fee'      => '0.00',
              'rebate_fee'      => null,
              'request_url'     => 'http://api.7-epp.com/Pay_Index_index.html',
              'back_url'        => null,
              'merchant_code'   => '11296',
              'merchant_secret' => 'zfpODDwL5gS34PwTPkwu9wABdq0Krkfi',
              'public_key'      => null,
              'private_key'     => null,
              'app_id'          => null,
              'vendor_url'      => null,
              'level_ids'       => null,
              'status'          => 1,
              'sort'            => 0,
              'auto_audit'      => null,
              'merchant_no'     => null,
              'desc'            => '充值完成后请耐心等待3分钟!',
              'encrypt_mode'    => 1,
              'certificate'     => null,
              'author_id'       => 1,
              'last_editor_id'  => 1,
              'created_at'      => '2020-01-09 18:52:06',
              'updated_at'      => '2020-01-09 18:52:06',
             ],
             [
              'id'              => 2,
              'frontend_name'   => '微信扫码',
              'frontend_remark' => null,
              'backend_name'    => null,
              'backend_remark'  => '第三方：天道支付 通道：微信扫码',
              'platform_sign'   => 'JHHY',
              'channel_id'      => 2,
              'min_amount'      => '50.00',
              'max_amount'      => '100.00',
              'handle_fee'      => '0.00',
              'rebate_fee'      => null,
              'request_url'     => 'http://api.7-epp.com/Pay_Index_index.html',
              'back_url'        => null,
              'merchant_code'   => '11296',
              'merchant_secret' => 'zfpODDwL5gS34PwTPkwu9wABdq0Krkfi',
              'public_key'      => null,
              'private_key'     => null,
              'app_id'          => null,
              'vendor_url'      => null,
              'level_ids'       => null,
              'status'          => 1,
              'sort'            => 0,
              'auto_audit'      => null,
              'merchant_no'     => null,
              'desc'            => '充值完成后请耐心等待3分钟!',
              'encrypt_mode'    => 1,
              'certificate'     => null,
              'author_id'       => 1,
              'last_editor_id'  => 1,
              'created_at'      => '2020-06-13 17:41:37',
              'updated_at'      => '2020-06-13 17:41:39',
             ],
             [
              'id'              => 3,
              'frontend_name'   => '支付宝 WAP',
              'frontend_remark' => null,
              'backend_name'    => null,
              'backend_remark'  => '第三方：天道支付 通道：支付宝WAP',
              'platform_sign'   => 'JHHY',
              'channel_id'      => 3,
              'min_amount'      => '50.00',
              'max_amount'      => '500.00',
              'handle_fee'      => '0.00',
              'rebate_fee'      => null,
              'request_url'     => 'http://api.7-epp.com/Pay_Index_index.html',
              'back_url'        => null,
              'merchant_code'   => '11296',
              'merchant_secret' => 'zfpODDwL5gS34PwTPkwu9wABdq0Krkfi',
              'public_key'      => null,
              'private_key'     => null,
              'app_id'          => null,
              'vendor_url'      => null,
              'level_ids'       => null,
              'status'          => 1,
              'sort'            => 0,
              'auto_audit'      => null,
              'merchant_no'     => null,
              'desc'            => '充值完成后请耐心等待3分钟!',
              'encrypt_mode'    => 1,
              'certificate'     => null,
              'author_id'       => 1,
              'last_editor_id'  => 1,
              'created_at'      => '2020-06-13 17:43:41',
              'updated_at'      => '2020-06-13 17:43:44',
             ],
             [
              'id'              => 4,
              'frontend_name'   => '微信H5',
              'frontend_remark' => null,
              'backend_name'    => null,
              'backend_remark'  => '第三方：天道支付 通道：微信H5',
              'platform_sign'   => 'JHHY',
              'channel_id'      => 4,
              'min_amount'      => '50.00',
              'max_amount'      => '500.00',
              'handle_fee'      => '0.00',
              'rebate_fee'      => null,
              'request_url'     => 'http://api.7-epp.com/Pay_Index_index.html',
              'back_url'        => null,
              'merchant_code'   => '11296',
              'merchant_secret' => 'zfpODDwL5gS34PwTPkwu9wABdq0Krkfi',
              'public_key'      => null,
              'private_key'     => null,
              'app_id'          => null,
              'vendor_url'      => null,
              'level_ids'       => null,
              'status'          => 1,
              'sort'            => 0,
              'auto_audit'      => null,
              'merchant_no'     => null,
              'desc'            => '充值完成后请耐心等待3分钟!',
              'encrypt_mode'    => 1,
              'certificate'     => null,
              'author_id'       => 1,
              'last_editor_id'  => 1,
              'created_at'      => '2020-06-13 17:45:02',
              'updated_at'      => '2020-06-13 17:45:05',
             ],
             [
              'id'              => 5,
              'frontend_name'   => '云闪付',
              'frontend_remark' => null,
              'backend_name'    => null,
              'backend_remark'  => '第三方：天道支付 通道：云闪付',
              'platform_sign'   => 'JHHY',
              'channel_id'      => 5,
              'min_amount'      => '50.00',
              'max_amount'      => '500.00',
              'handle_fee'      => '0.00',
              'rebate_fee'      => null,
              'request_url'     => 'http://api.7-epp.com/Pay_Index_index.html',
              'back_url'        => null,
              'merchant_code'   => '11296',
              'merchant_secret' => 'zfpODDwL5gS34PwTPkwu9wABdq0Krkfi',
              'public_key'      => null,
              'private_key'     => null,
              'app_id'          => null,
              'vendor_url'      => null,
              'level_ids'       => null,
              'status'          => 1,
              'sort'            => 0,
              'auto_audit'      => null,
              'merchant_no'     => null,
              'desc'            => '充值完成后请耐心等待3分钟!',
              'encrypt_mode'    => 1,
              'certificate'     => null,
              'author_id'       => 1,
              'last_editor_id'  => 1,
              'created_at'      => '2020-06-13 17:46:26',
              'updated_at'      => '2020-06-13 17:46:28',
             ],
            ],
        );
    }
}
