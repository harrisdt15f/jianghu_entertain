<?php
return [
        //Merchant/GameVendorController
        '200100' => '游戏厂商排序失败',
        //Merchant/GameController
        '200200' => '游戏,设置热门失败',
        '200201' => '游戏,更改维护状态失败',
        '200202' => '游戏,更改是否推荐失败',
        '200203' => '游戏排序失败',
        //UserBlackListController
        '200300' => '解除黑名单失败，数据不存在或状态已经解除',
        '200301' => '解除黑名单失败，修改数据时发生错误',
        '200302' => '解除黑名单失败，该用户不存在',
        '200303' => '解除黑名单失败，修改用户状态失败',
        //MerchantAuthController
        '200400' => '退出成功',
        '200401' => '登录失败，请重试',
        '200402' => '对不起，您的帐号异常，请联系管理员',
        //UsersTagController
        '200500' => '添加用户标签时发生错误',
        '200501' => '该用户标签不存在',
        '200502' => '编辑用户标签时发生错误',
        '200503' => '删除用户标签时发生错误',
        '200504' => '修改该标签的用户数据时出错',
        //Merchant/Finance/OfflineFinanceController
        '200600' => '线下金流,添加失败',
        '200601' => '线下金流,删除失败',
        '200602' => '线下金流,状态改变失败',
        //UserGradeController
        '200700' => '配置晋级规则时发生错误',
        '200701' => '最小经验值与其他等级存在冲突',
        '200702' => '最大经验值与其他等级存在冲突',
        '200703' => '插入数据时发生错误',
        '200704' => '该等级配置不存在',
        '200705' => '删除等级设置时发生错误',
        '200706' => '修改该等级的用户数据时发生错误',
        '200707' => '插入洗码设置详情数据时发生错误',
        '200708' => '编辑洗码设置详情数据时发生错误',
        //CommissionController
        '200800' => '选择的游戏平台或游戏分类不存在',
        '200801' => '该打码量的洗码设置已存在',
        '200802' => 'VIP的洗码率数据不完整',
        '200803' => '与前一列数据对比时发生错误',
        '200804' => '洗码百分比只能等于或大于上一列数据',
        '200805' => '与后一列数据对比时发生错误',
        '200806' => '洗码百分比只能等于或小于下一列数据',
        '200807' => '插入洗码设置时发生错误',
        '200808' => '出现的不正确的等级数据',
        '200809' => '缺少用户等级配置',
        '200810' => '插入洗码设置详情数据时发生错误',
        '200811' => '该洗码设置不存在',
        '200812' => '修改洗码设置时发生错误',
        '200813' => '缺少洗码设置的详情数据',
        '200814' => '修改洗码设置详情数据时发生错误',
        '200815' => '删除洗码设置时发生错误',
        '200816' => '删除洗码设置详情数据时发生错误',
        '200817' => '等级高的洗码率不能小于等级低的洗码率',
        //AdminController
        '200900' => '生成管理员组数据时发生错误',
        '200901' => '生成管理员组的权限数据时发生错误',
        '200902' => '管理员组不存在',
        '200903' => '删除管理员组时发生错误',
        '200904' => '编辑管理员组数据时发生错误',
        '200905' => '超级管理员组不可修改',
        '200906' => '编辑管理员组的权限数据时发生错误',
        //AdminController
        '201000' => '管理员不存在',
        '201001' => '您没有权限操作此管理员',
        '201002' => '超级管理员不可删除',
        '201003' => '删除管理员时发生错误',
        '201004' => '修改管理员状态时发生错误',
        //UploadController
        '201100' => '上传失败',
        //CostomerServiceController
        '201200' => '添加客服时发生错误',
        '201201' => '操作的客服不存在',
        '201202' => '编辑客服数据时发生错误',
        '201203' => '删除客服数据时发生错误',
        //HelpCenterController
        '201300' => '添加帮助设置时发生错误',
        '201301' => '该帮助设置数据不存在',
        '201302' => '编辑帮助设置时发生错误',
        '201303' => '删除帮助设置时发生错误',
        //Merchant/Finance/OfflineFinanceController
        '201400' => '线上金流,添加失败',
        '201401' => '线上金流,编辑失败',
        '201402' => '线上金流,删除失败',
        '201403' => '线上金流,修改状态失败',
        //BankCardsController
        '201500' => '该银行卡不存在',
        '201501' => '删除银行卡时发生错误',
        //MarqueeNoticeController
        '201600' => '跑马灯公告,添加失败!',
        '201601' => '跑马灯公告,编辑失败!',
        '201602' => '跑马灯公告,删除失败!',
        '201603' => '跑马灯公告,改变状态失败!',
        '201604' => '登录弹窗公告不存在!',
        //SystemNoticeController
        '201700' => '系统公告,添加失败!',
        '201701' => '系统公告,编辑失败!',
        '201702' => '系统公告,删除失败!',
        '201703' => '系统公告,改变状态失败!',
        '201704' => '系统公告不存在!',
        //LoginNoticeController
        '201800' => '登录弹窗公告,添加失败!',
        '201801' => '登录弹窗公告,编辑失败!',
        '201802' => '登录弹窗公告,删除失败!',
        '201803' => '登录弹窗公告,改变状态失败!',
        '201804' => '登录弹窗公告不存在!',
        //CarouselNoticeController
        '201900' => '轮播图公告,添加失败!',
        '201901' => '轮播图公告,编辑失败!',
        '201902' => '轮播图公告,删除失败!',
        '201903' => '轮播图公告,改变状态失败!',
        '201904' => '轮播图公告不存在!',
        //ActivityStaticController
        '202000' => '活动,添加失败!',
        '202001' => '活动,编辑失败!',
        '202002' => '活动,删除失败!',
        '202003' => '活动,改变状态失败!',
        //BankController
        '202100' => '出款银行,改变状态失败!',
        //ActivityDynController
        '202200' => '活动,改变状态失败!',
        '202201' => '活动,保存图片失败!',
        //RechargeOrderController
        '202300' => '订单异常!',
        '202301' => '操作失败,订单状态异常!',
        '202302' => '入款失败,系统异常!',
        '202303' => '审核失败,订单状态异常!',
        '202304' => '审核失败,系统异常!',
        //HandleSaveBuckleRecordController
        '202400' => '用户不存在!',
        '202401' => '系统异常,存款失败!',
        '202402' => '系统异常,扣款失败!',
        //ConfigController
        '202500' => '参数错误或缺少平台配置数据!',
        '202501' => '修改配置数据时发生错误!',
        //CameController
        '202600' => '游戏,图片保存失败!',
        //GameVendorController
        '202700' => '游戏厂商,图片保存失败!',
        //MenuController
        '202800' => '添加菜单时发生错误',
        '202801' => '菜单不存在',
        '202802' => '删除菜单时发生错误',
        '202803' => '菜单排序时发生错误',
        '202804' => '编辑菜单时发生错误',
        //WithdrawOrderController
        '202900' => '订单异常,审核通过失败!',
        '202901' => '订单异常,审核拒绝失败!',
        '202902' => '订单异常,出款通过失败!',
        '202903' => '订单异常,出款拒绝失败!',
        //FrontendUserController
        '203000' => '用户不存在',
        '203001' => '用户缺少资金数据',
        '203002' => '加入黑名单时发生错误',
        '203003' => '修改用户状态时发生错误',
        '203004' => '该用户当前已经在黑名单',
        //PromotionPicController
        '203100' => '添加推广图片配置失败',
        '203101' => '推广图片配置不存在',
        '203102' => '修改推广图片配置失败',
        '203103' => '删除推广图片配置失败',

        //GameAcknowledgementController
        '203200' => '厂商不对应',
       ];
