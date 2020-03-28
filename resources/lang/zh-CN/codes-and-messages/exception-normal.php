<?php

/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 5/7/2019
 * Time: 8:23 PM
 */

$config = [
         //MenuController
           '300000' => '编辑菜单时发生错误',
           '300001' => '修改失败',
           '300002' => '删除失败',
           '300003' => '添加菜单时发生错误',
           '300004' => '菜单不存在',
           '300005' => '菜单排序时发生错误',
           '300006' => '修改菜单显示状态时发生错误',
         //BackendAdminGroupController
           '300100' => '角色组不存在',
           '300101' => '超级管理员组不可修改',
           '300102' => '角色组已存在',
           '300103' => '添加管理员组时发生错误',
           '300104' => '删除管理员组时发生错误',
           '300105' => '编辑管理员组时发生错误',
           '300106' => '添加管理员组权限时发生错误',
         //BackendGameController
           '300200' => '游戏,添加失败',
           '300201' => '游戏,编辑失败',
           '300202' => '游戏,删除失败',
           '300203' => '游戏,状态改变失败',
           '300204' => '游戏信息不存在',
         //BackendGameVendorController
           '300300' => '删除失败,请先删除所属该厂商的游戏!',
           '300301' => '游戏厂商,删除失败',
           '300302' => '游戏厂商,添加失败',
           '300303' => '游戏厂商,编辑失败',
           '300304' => '游戏厂商,状态改变失败',
         //BackendGameTypeController
           '300400' => '删除失败,请先删除所属该分类的游戏!',
           '300401' => '游戏分类,删除失败',
           '300402' => '游戏分类,添加失败',
           '300403' => '游戏分类,编辑失败',
           '300404' => '游戏分类,状态改变失败',
           '300405' => '游戏分类不存在',
         //BackendFinanceTypeController
           '300500' => '金流分类,添加失败',
           '300501' => '金流分类,修改失败',
           '300502' => '金流分类,删除失败',
           '300503' => '删除失败,请先删除所属该分类的金流!',
           '300504' => '金流分类,状态改变失败',
           '300505' => '金流分类信息不存在',
         //BackendFinanceVendorController
           '300600' => '金流厂商,添加失败',
           '300601' => '金流厂商,修改失败',
           '300602' => '金流厂商,删除失败',
           '300603' => '删除失败,请先删除所属该厂商的金流!',
           '300604' => '金流厂商,状态改变失败',
         //MerchantAdminUserController
           '300700' => '管理员角色组不存在',
           '300701' => '管理员不存在',
           '300702' => '超级管理员不可修改',
           '300703' => '您没有权限操作此管理员',
           '300704' => '超级管理员不可删除',
           '300705' => '添加厅主失败',
           '300706' => '该平台不存在',
           '300707' => '禁用或启用平台时出现错误',
           '300708' => '生成平台时发生错误',
           '300709' => '生成域名数据时发生错误',
           '300710' => '生成银行配置时发生错误',
           '300711' => '生成管理组数据时发生错误',
           '300712' => '生成管理组权限数据时发生错误',
           '300713' => '生成超级管理员时发生错误',
           '300714' => '修改平台所属人数据时发生错误',
           '300715' => '生成SSL证书时发生错误',
           '300716' => '插入平台SSL证书数据时发生错误',
           '300717' => '生成平台默认系统配置时发生错误',
         //BackendFinanceChannelController
           '300800' => '金流通道,添加失败',
           '300801' => '金流通道,修改失败',
           '300803' => '金流通道,删除失败',
           '300804' => '金流通道,状态改变失败',
           '300805' => '金流通道信息不存在',
         //BackendSystemBankController
           '300900' => '系统银行,添加失败',
           '300901' => '系统银行,修改失败',
           '300902' => '系统银行,删除失败',
           '300903' => '删除失败,该银行正在使用!',
           '300904' => '系统银行,状态改变失败',
           '300905' => '该银行信息不存在',
         //BackendSystemDynActivityController
           '301000' => '活动,状态改变失败',
         //BackendAdminUserController
           '301100' => '管理员不存在',
           '301101' => '管理组不存在',
           '301102' => '原密码不正确',
           '301103' => '修改密码时发生错误',
           '301104' => '修改管理员状态时发生错误',
         //PlatformController
           '302000' => '分配游戏失败!',
           '302001' => '游戏移除失败!',
           '302002' => '域名格式不正确',
           '302003' => '该平台不存在',
           '302004' => '站点配置失败，请重新尝试',
           '302005' => '尝试修改权限时出现错误',
           '302006' => '修改平台维护时间时发生错误',
           '302007' => '分配活动失败!',
           '302008' => '活动移除失败!',
         //BackendAuthController
           '302100' => '退出成功',
           '302101' => '登录失败，请重试',
           '302102' => '对不起，您的帐号异常，请联系管理员',
         //BackEndApiMainController
           '302200' => '路由非法',
         //RouteController
           '302300' => '添加路由时发生错误',
           '302301' => '该路由不存在',
           '302302' => '编辑路由时发生错误',
           '302303' => '删除路由时发生错误',
           '302304' => '修改路由开放状态时发生错误',
         //SmsConfigController
           '302400' => '添加短信配置时发生错误',
           '302401' => '该短信配置不存在',
           '302402' => '编辑短信配置时发生错误',
           '302403' => '修改短信配置状态时发生错误',
           '302404' => '删除短信配置时发生错误',
         //PlatformController
           '302500' => '域名已存在',
         //BackendSystemEmailController
           '303000' => '邮件保存失败!',
           '303001' => '邮件发送失败!',
           '303002' => '读邮件失败!',
           '303003' => '邮件删除失败!',
         // SortableController
           '304000' => '数据校验失败!',
          ];
return $config;
