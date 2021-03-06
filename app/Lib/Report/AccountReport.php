<?php

namespace App\Lib\Report;

use App\Models\Report\ReportDayUser;
use App\Models\User\FrontendUser;

/**
 * 资金报表相关
 */
class AccountReport
{
    /**
     * 报表处理
     * @param  FrontendUser $user   用户.
     * @param  string       $sign   账变类型标识.
     * @param  float        $amount 账变金额.
     * @return void
     */
    public static function saveReport(FrontendUser $user, string $sign, float $amount): void
    {
        //充值
        if (in_array($sign, ['recharge', 'artificial_recharge'])) {
            //用户日报表
            ReportDayUser::saveAccountReport($user->mobile, $user->guid, $amount, 1);
        }

        //提现成功
        if ($sign !== 'withdraw_finish') {
            return;
        }
        //用户日报表
        ReportDayUser::saveAccountReport($user->mobile, $user->guid, $amount, 2);
    }
}
