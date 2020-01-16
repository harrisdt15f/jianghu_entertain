<?php

use App\Models\Finance\SystemBank;
use Illuminate\Database\Seeder;

/**
 * Class SystemBankSeeder
 */
class SystemBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SystemBank::insert(
            [
             [
              'name'   => '中国人民银行',
              'code'   => 'PBC',
              'status' => 1,
             ],
             [
              'name'   => '中国建设银行',
              'code'   => 'CCB',
              'status' => 1,
             ],
             [
              'name'   => '中国农业银行',
              'code'   => 'ABC',
              'status' => 1,
             ],
             [
              'name'   => '中国工商银行',
              'code'   => 'ICBC',
              'status' => 1,
             ],
             [
              'name'   => '中国银行',
              'code'   => 'BOC',
              'status' => 1,
             ],
             [
              'name'   => '中国民生银行',
              'code'   => 'CMBC',
              'status' => 1,
             ],
             [
              'name'   => '招商银行',
              'code'   => 'CMB',
              'status' => 1,
             ],
             [
              'name'   => '兴业银行',
              'code'   => 'CIB',
              'status' => 1,
             ],
             [
              'name'   => '交通银行',
              'code'   => 'BCOM',
              'status' => 1,
             ],
             [
              'name'   => '北京银行',
              'code'   => 'BOB',
              'status' => 1,
             ],
             [
              'name'   => '中信银行',
              'code'   => 'CITIC',
              'status' => 1,
             ],
             [
              'name'   => '广东发展银行',
              'code'   => 'GDB',
              'status' => 1,
             ],
             [
              'name'   => '上海浦东发展银行',
              'code'   => 'SPDB',
              'status' => 1,
             ],
             [
              'name'   => '深圳发展银行',
              'code'   => 'SDB',
              'status' => 1,
             ],
             [
              'name'   => '国家开发银行',
              'code'   => 'CDB',
              'status' => 1,
             ],
             [
              'name'   => '汇丰银行',
              'code'   => 'HSBC',
              'status' => 1,
             ],
             [
              'name'   => '华夏银行',
              'code'   => 'HXB',
              'status' => 1,
             ],
             [
              'name'   => '中国光大银行',
              'code'   => 'CEB',
              'status' => 1,
             ],
             [
              'name'   => '中国邮政储蓄银行',
              'code'   => 'PSBC',
              'status' => 1,
             ],
             [
              'name'   => '上海银行',
              'code'   => 'BOS',
              'status' => 1,
             ],
             [
              'name'   => '中国进出口银行',
              'code'   => 'EXIMBANK',
              'status' => 1,
             ],
             [
              'name'   => '中国农业发展银行',
              'code'   => 'ADBC',
              'status' => 1,
             ],
             [
              'name'   => '恒丰银行',
              'code'   => 'EGBANK',
              'status' => 1,
             ],
             [
              'name'   => '浙商银行',
              'code'   => 'CZB',
              'status' => 1,
             ],
             [
              'name'   => '东亚银行',
              'code'   => 'HKBEA',
              'status' => 1,
             ],
             [
              'name'   => '恒生银行',
              'code'   => 'HANGSENG',
              'status' => 1,
             ],
             [
              'name'   => '杭州银行',
              'code'   => 'HCCB',
              'status' => 1,
             ],
             [
              'name'   => '南京银行',
              'code'   => 'NJCB',
              'status' => 1,
             ],
             [
              'name'   => '北京农村商业银行',
              'code'   => 'BRCB',
              'status' => 1,
             ],
             [
              'name'   => '宁波银行',
              'code'   => 'NBBANK',
              'status' => 1,
             ],
             [
              'name'   => '渤海银行',
              'code'   => 'BOHAIB',
              'status' => 1,
             ],
             [
              'name'   => '大连银行',
              'code'   => 'DLB',
              'status' => 1,
             ],
             [
              'name'   => '徽商银行',
              'code'   => 'HSBANK',
              'status' => 1,
             ],
            ],
        );
    }
}