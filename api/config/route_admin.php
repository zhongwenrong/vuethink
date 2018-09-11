<?php
// +----------------------------------------------------------------------
// | Description: 基础框架路由配置文件
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honghaiweb.com>
// +----------------------------------------------------------------------

return [
    // 定义资源路由
    '__rest__' => [
		'admin/rules'                 => 'admin/rules',
		'admin/groups'                => 'admin/groups',
		'admin/users'                 => 'admin/users',
		'admin/appusers'              => 'admin/appusers',
		'admin/appadmin'              => 'admin/appadmin',
		'admin/appadmin2'             => 'admin/appadmin2',
		'admin/applyAuth'             => 'admin/applyAuth', //申请收费认证配置
		'admin/elesale'               => 'admin/elesale', //新增电销
		'admin/elesalemy'             => 'admin/elesalemy', //新增电销认领
		'admin/appview'               => 'admin/appview',
		'admin/appcard'               => 'admin/appcard',
		'admin/business'              => 'admin/business',
		'admin/goods'                 =>'admin/goods',
		'admin/order'                 =>'admin/order',
		'admin/menus'                 => 'admin/menus',
		'admin/structures'            => 'admin/structures',
		'admin/posts'                 => 'admin/posts',
		'admin/tondun'                => 'admin/tondun',
		'admin/lunbo'                 => 'admin/lunbo',
		'admin/userbrowse'            => 'admin/userbrowse',
		'admin/loginlog'              => 'appadmin/loginlog',
		'admin/tondunLog'             => 'admin/tondunLog',
		'admin/binviteCode'           => 'admin/binviteCode',
		'admin/buserbrowse'           => 'admin/buserbrowse',
		'admin/binviteCommission'     => 'admin/binviteCommission',
		'admin/BinviteCommissionlist' => 'admin/BinviteCommissionlist',
		'admin/BcreateCode'           => 'admin/BcreateCode',
		'admin/firsttrial'            => 'admin/firsttrial',
		'admin/Firstpass'             => 'admin/Firstpass',
		'admin/Review'                => 'admin/Review',
		'admin/Reviewpass'            => 'admin/Reviewpass',
		'admin/Repayments'            => 'admin/Repayments',             //还款管理
		'admin/Documentary'           => 'admin/Documentary',            //M1我的跟单
		'admin/Documentary2'          => 'admin/Documentary2',            //M0我的跟单
		'admin/Bridge'                => 'admin/Bridge',                        //M0A跟单入口
		'admin/CollectionBridge'      => 'admin/CollectionBridge',    //M0A跟单
		'admin/Transfer'              => 'admin/Transfer',               //M1跟单移交列表
		'admin/Collection'            => 'admin/Collection',             //M2我的催收
		'admin/myloans'               => 'admin/myloans',
		'admin/call'                  => 'admin/call',                   //通讯录对比
		'admin/Mrelated'              => 'admin/Mrelated',               //M1备注详情
		'admin/BlackList'             => 'admin/BlackList',              //黑名单
		'admin/PartnerList'           => 'admin/PartnerList',              //黑名单
		'admin/PartnerList'           => 'admin/PartnerList',              //黑名单
		'admin/PartnerList'           => 'admin/PartnerList',              //合作伙伴
		'admin/operating'             => 'admin/operating',              //管理员操作详情
		'admin/Credit'                => 'admin/Credit',                 //征信报告
		'admin/Otherdown'             => 'admin/Otherdown',              //其它驳回
		'admin/pay'                   => 'admin/pay',                    //支付接口
		'admin/Myloanpass'            => 'admin/Myloanpass',             //财务认领
		'admin/Mtwotransfer'          => 'admin/Mtwotransfer',         //m2入口
		'admin/Mtwocollection'        => 'admin/Mtwocollection',         //m2我的跟单
		'admin/Recovery'              => 'admin/Recovery',         //回收列表
		'admin/Recoverymy'            => 'admin/Recoverymy',     //我的回收
		'admin/Safety'                => 'admin/Safety',    //绑定手机号码
		'admin/Soso'                  => 'admin/Soso',            //搜搜
		'admin/Position'              => 'admin/Position',         //额度管理
    ],

	//搜一搜
	'admin/soso/export'                                      => ['admin/soso/export', ['method' => 'GET']],                 //导出搜一搜excel

	// 安全路由模块
	'admin/Safety/indexEdit'                                 => ['admin/Safety/indexEdit', ['method' => 'POST']],
	'admin/Safety/index'                                     => ['admin/Safety/index', ['method' => 'POST']],
	'admin/Safety/dlverif'                                   => ['admin/Safety/dlverif', ['method' => 'POST']],
	'admin/Safety/dlverif_del'                               => ['admin/Safety/dlverif_del', ['method' => 'POST']],
	'admin/Safety/fkverif'                                   => ['admin/Safety/fkverif', ['method' => 'POST']],
	'admin/Safety/disable_ip'                                => ['admin/Safety/disable_ip', ['method' => 'POST']],
	'admin/Safety/disable_ip_add'                            => ['admin/Safety/disable_ip_add', ['method' => 'POST']],
	'admin/Safety/disable_ip_del'                            => ['admin/Safety/disable_ip_del', ['method' => 'POST']],
	'admin/Safety/disable_ip_edit'                           => ['admin/Safety/disable_ip_edit', ['method' => 'POST']],
	'admin/Safety/windcontroller_url'                        => ['admin/Safety/windcontroller_url', ['method' => 'POST']],
	'admin/Safety/windcontroller_index'                      => ['admin/Safety/windcontroller_index', ['method' => 'POST']],


	// 【】权限返回值，用于配置权限
	//还款
	'admin/index/back'                                       => ['admin/index/back', ['method' => 'GET']],
	'admin/index/delay'                                      => ['admin/index/delay', ['method' => 'GET']],
	'admin/index/overdue'                                    => ['admin/index/overdue', ['method' => 'GET']],
	'admin/index/refuse'                                     => ['admin/index/refuse', ['method' => 'GET']],
	'admin/index/fk'                                         => ['admin/index/fk', ['method' => 'GET']],
	'admin/index/auth'                                       => ['admin/index/auth', ['method' => 'GET']],
	//还款导出
	'admin/index/back/export'                                => ['admin/index/exportBack', ['method' => 'GET']],
	'admin/index/delay/export'                               => ['admin/index/exportDelay', ['method' => 'GET']],
	'admin/index/overdue/export'                             => ['admin/index/exportOverdue', ['method' => 'GET']],
	'admin/index/refuse/export'                              => ['admin/index/exportRefuse', ['method' => 'GET']],
	'admin/index/fk/export'                                  => ['admin/index/exportFk', ['method' => 'GET']],
	'admin/index/total'                                      => ['admin/Index/echartTotal', ['method' => 'GET']],//折线统计图
	// 后台首页
	'admin/index/index'                                      => ['admin/index/index', ['method' => 'GET']],

	// 生成邀请码
	'admin/BcreateCode/savecode'                             => ['admin/BcreateCode/savecode', ['method' => 'GET']],


	//用户批量删除
	// 'admin/appusers/deletes'                              => ['admin/appusers/deletes', ['method' => 'POST']],
	// 【商家】批量删除
	'admin/business/deletes'                                 => ['admin/business/deletes', ['method' => 'POST']],
	// 【商家】批量启用/禁用
	'admin/business/enables'                                 => ['admin/business/enables', ['method' => 'POST']],
	//匹配
	'admin/business/match'                                   => ['admin/business/match', ['method' => 'POST|GET']],
	//商家管理
	'admin/business/manageList'                              => ['admin/business/manageList', ['method' => 'GET']],
	//修改商家账号状态
	'admin/business/changeStatus'                            => ['admin/business/changeStatus', ['method' => 'POST']],
	//获取商家套餐
	'admin/business/getvip'                                  => ['admin/business/vip', ['method' => 'get']],
	//保存商家套餐
	'admin/business/vipinfosave'                             => ['admin/business/vipSave', ['method' => 'POST']],
	//获取商家账号权限
	'admin/business/memberAuth'                              => ['admin/business/getMemberAuth', ['method' => 'POST']],
	//重新授权商家账号
	'admin/business/reAuth'                                  => ['admin/business/reAuthAdd', ['method' => 'POST']],
	//添加商家账号
	'admin/business/addBusinessMember'                       => ['admin/business/addBusinessMember', ['method' => 'POST']],
	//获取商家权限
	'admin/business/authList'                                => ['admin/business/authList', ['method' => 'POST']],
	//用户邀请人查询
	'admin/appusers/invit'                                   => ['admin/appusers/invit', ['method' => 'Get']],
	//用户批量启用/禁用
	'admin/appusers/enables'                                 => ['admin/appusers/enables', ['method' => 'POST']],
	//征信批量启用/禁用
	'admin/tondun/enables'                                   => ['admin/tondun/enables', ['method' => 'POST']],
	//征信批量删除
	'admin/tondun/deletes'                                   => ['admin/tondun/deletes', ['method' => 'POST']],
	#提现列表
	'admin/withdraw/index'                                   => ['admin/withdraw/index', ['method' => 'GET']],
	#提现
	'admin/withdraw/tx'                                      => ['admin/withdraw/tx', ['method' => 'POST']],
	#关闭提现
	'admin/withdraw/close'                                   => ['admin/withdraw/close', ['method' => 'POST']],
	#批量提现  关闭操作
	'admin/withdraw/enables'                                 => ['admin/withdraw/enables', ['method' => 'POST']],
	#积分日志列表
	'admin/score/index'                                      => ['admin/score/index', ['method' => 'GET']],
	#积分列表
	'admin/score/scoreList'                                  => ['admin/score/scoreList', ['method' => 'GET']],

	#更新 配置
	'admin/configs/update'                                   => ['admin/configs/update', ['method' => 'POST']],
	#获取配置
	'admin/configs/getConfigs'                               => ['admin/configs/getConfigs', ['method' => 'POST']],

	# 获取链接
	'admin/configs/getUrl'                                   => ['admin/configs/getUrl', ['method' => 'POST']],

	// 'admin/appusers/deletes'                              => ['admin/structures/deletes', ['method' => 'POST']],
	// 'admin/appusers/enables'                              => ['admin/posts/enables', ['method' => 'POST']],
	// 'admin/business/deletes'                              => ['admin/structures/deletes', ['method' => 'POST']],
	// 【部门】批量删除
	'admin/business/enables'                                 => ['admin/posts/enables', ['method' => 'POST']],


	// 【基础】登录
	'admin/base/login'                                       => ['admin/base/login', ['method' => 'POST']],
	// 【基础】记住登录
	'admin/base/relogin'                                     => ['admin/base/relogin', ['method' => 'POST']],
	// 【基础】修改密码
	'admin/base/setInfo'                                     => ['admin/base/setInfo', ['method' => 'POST']],
	// 【基础】退出登录
	'admin/base/logout'                                      => ['admin/base/logout', ['method' => 'POST']],
	// 【基础】获取配置
	'admin/base/getConfigs'                                  => ['admin/base/getConfigs', ['method' => 'POST']],
	// 【基础】获取验证码
	'admin/base/getVerify'                                   => ['admin/base/getVerify', ['method' => 'GET']],
	// 【基础】上传图片

	// 保存本地
	'upload'                                                 => ['admin/upload/index', ['method' => 'POST']],
	// qiniu
	'uploadQiniu'                                            => ['admin/upload/uploadQiniu', ['method' => 'POST']],
	// qiniu base64
	'uploadBase64'                                           => ['admin/upload/uploadBase64', ['method' => 'POST']],


	// 保存系统配置
	'admin/systemConfigs'                                    => ['admin/systemConfigs/save', ['method' => 'POST']],
	// 【规则】批量删除
	'admin/rules/deletes'                                    => ['admin/rules/deletes', ['method' => 'POST']],
	// 【规则】批量启用/禁用
	'admin/rules/enables'                                    => ['admin/rules/enables', ['method' => 'POST']],
	// 【用户组】批量删除
	'admin/groups/deletes'                                   => ['admin/groups/deletes', ['method' => 'POST']],
	// 【用户组】批量启用/禁用
	'admin/groups/enables'                                   => ['admin/groups/enables', ['method' => 'POST']],
	// 【用户】批量删除
	'admin/users/deletes'                                    => ['admin/users/deletes', ['method' => 'POST']],
	// 【用户】批量启用/禁用
	'admin/users/enables'                                    => ['admin/users/enables', ['method' => 'POST']],
	// 【菜单】批量删除
	'admin/menus/deletes'                                    => ['admin/menus/deletes', ['method' => 'POST']],
	// 【菜单】批量启用/禁用
	'admin/menus/enables'                                    => ['admin/menus/enables', ['method' => 'POST']],
	// 【组织架构】批量删除
	'admin/structures/deletes'                               => ['admin/structures/deletes', ['method' => 'POST']],
	// 【组织架构】批量启用/禁用
	'admin/structures/enables'                               => ['admin/structures/enables', ['method' => 'POST']],
	// 【部门】批量删除
	'admin/posts/deletes'                                    => ['admin/posts/deletes', ['method' => 'POST']],                           // 【部门】批量启用/禁用
	'admin/elesale/randomclaim'                              => ['admin/elesale/randomclaim', ['method' => 'POST']],                            //电销一键认领
	'admin/elesale/claim'                                    => ['admin/elesale/claim', ['method' => 'POST']],                            //电销认领
	'admin/elesalemy/complete'                               => ['admin/elesalemy/complete', ['method' => 'POST']],                            //电销完成
	'admin/elesalemy/giveup'                                 => ['admin/elesalemy/giveup', ['method' => 'POST']],                            //电销放弃
	'admin/elesalemy/remark'                                 => ['admin/elesalemy/remark', ['method' => 'POST']],                            //电销备注
	'admin/elesalemy/backout'                                => ['admin/elesalemy/backout', ['method' => 'POST']],
	'admin/elesalemy/export'                                 => ['admin/elesalemy/export', ['method' => 'POST']],                //电销导出

	'admin/appview/claim'                                    => ['admin/appview/claim', ['method' => 'POST']],                            //申请认领
	'admin/Firstpass/claim'                                  => ['admin/Firstpass/claim', ['method' => 'POST']],                        //初审认领
	'admin/reviewpass/claim'                                 => ['admin/reviewpass/claim', ['method' => 'POST']],                      //复审通过认领
	'admin/myloans/loans'                                    => ['admin/myloans/loans', ['method' => 'POST']],                            //确认认领
	'admin/myloans/myloanspass'                              => ['admin/myloans/myloanspass', ['method' => 'POST']],              //拒绝放款
	'admin/myloans/addto'                                    => ['admin/myloans/addto', ['method' => 'POST']],                          //添加借款
	'admin/myloans/hang'                                     => ['admin/myloans/hang', ['method' => 'POST']],                           //挂起
	'admin/myloans/tolifthang'                               => ['admin/myloans/tolifthang', ['method' => 'POST']],               //解除挂起
	'admin/myloans/updatedate'                               => ['admin/myloans/updatedate', ['method' => 'POST']],               //解除挂起
	'admin/myloans/export'                                   => ['admin/myloans/export', ['method' => 'GET']],                 //导出财务excel
	'admin/myloans/batchclaim'                               => ['admin/myloans/batchclaim', ['method' => 'POST']],             //批量认领
	'admin/myloans/smsVerification'                          => ['admin/myloans/smsVerification', ['method' => 'POST']],                        //后台放款短信
	'admin/myloans/smsVerification_phone'                    => ['admin/myloans/smsVerification_phone', ['method' => 'POST']],           //安全修改手机号短信

	'admin/appview/otherdown'                                => ['admin/appview/otherdown', ['method' => 'POST']],                 //恢复申请


	'admin/firsttrial/firsttrial'                            => ['admin/Firstpass/firsttrial', ['method' => 'POST']],                //初审提交
	'admin/firstpass/batchclaim'                             => ['admin/firstpass/batchclaim', ['method' => 'POST']],                 //初审列表中批量领取
	'admin/firsttrial/xadd'                                  => ['admin/firsttrial/xadd', ['method' => 'POST']],                     //初审驳回
	'admin/firsttrial/datainfo'                              => ['admin/firsttrial/datainfo', ['method' => 'POST']],                 //上传补充资料
	'admin/firsttrial/firsttrials'                           => ['admin/firsttrial/firsttrials', ['method' => 'POST']],                 //批量初审通过
	'admin/firsttrial/firstrejects'                          => ['admin/firsttrial/firstrejects', ['method' => 'POST']],                 //批量初审驳回
	/*'admin/review/xadd'                                    => ['admin/review/xadd', ['method' => 'POST']],                         //复审驳回*/

	'admin/opapi/lookDetail'                                 => ['admin/opapi/lookDetail', ['method' => 'POST']],                      //报告
	'admin/savatomongodb/lookDetail'                         => ['admin/savatomongodb/lookDetail', ['method' => 'GET']],              //转存

	'admin/savatomongodb/delredis'                           => ['admin/savatomongodb/delredis', ['method' => 'GET']],                  //删除mongodb
	'admin/savatomongodb/delByRand'                          => ['admin/savatomongodb/delByRand', ['method' => 'GET']],                  //获取随机key 并删除
	'admin/savatomongodb/Operator_report'                    => ['admin/savatomongodb/Operator_report', ['method' => 'GET']],                  //获取随机key 并删除


	# 商家推广
	'admin/savatomongodb/get_binvite_about'                  => ['admin/savatomongodb/get_binvite_about', ['method' => 'GET']],  //异步商家推广
	'admin/savatomongodb/get_binvite_formal_about'           => ['admin/savatomongodb/get_binvite_formal_about', ['method' => 'GET']],  //异步商家推广
	'admin/savatomongodb/get_binvite_formal_about_again'     => ['admin/savatomongodb/get_binvite_formal_about_again', ['method' => 'GET']],  //异步商家推广
	'admin/savatomongodb/get_binvite_formal_about_thirddays' => ['admin/savatomongodb/get_binvite_formal_about_thirddays', ['method' => 'GET']],  //异步更新三天内的订单
	'admin/savatomongodb/changeOS'                           => ['admin/savatomongodb/changeOS', ['method' => 'GET']],                   //异步商家推广os 正式服

	// os
	'admin/savatomongodb/update_binvite_about_os'            => ['admin/savatomongodb/update_binvite_about_os', ['method' => 'GET']],                   //异步商家推广os 测试

	// os
	'admin/savatomongodb/update_binvite_about_formal_os'     => ['admin/savatomongodb/update_binvite_about_formal_os', ['method' => 'GET']],  // 正式

	// 拉取信用报告
	'admin/savatomongodb/serch_report'                       => ['admin/savatomongodb/serch_report', ['method' => 'GET']],  // 正式
	'admin/savatomongodb/serch_report_s'                     => ['admin/savatomongodb/serch_report_s', ['method' => 'GET']],  // 正式

	// 脚本测试
	'admin/savatomongodb/hebin'                              => ['admin/savatomongodb/hebin', ['method' => 'GET']],                   //异步商家推广os 正式服


	'admin/firsttrial/conditionadd'                          => ['admin/firsttrial/conditionadd', ['method' => 'POST']],               //报告
	'admin/firsttrial/datadetele'                            => ['admin/firsttrial/datadetele', ['method' => 'POST']],                 //刪除
	'admin/firsttrial/finance'                               => ['admin/firsttrial/finance', ['method' => 'POST']],                   //财务撤回

	'admin/posts/enables'                                    => ['admin/posts/enables', ['method' => 'POST']],

	'admin/Repayments/claim'                                 => ['admin/Repayments/claim', ['method' => 'POST']],                      //跟单员认领
	'admin/appusers/disabled'                                => ['admin/appusers/disabled', ['method' => 'POST']],                    //加入黑名单
	'admin/appusers/xdisabled'                               => ['admin/appusers/xdisabled', ['method' => 'POST']],                  //从黑名单中取出
	'admin/Transfer/claim'                                   => ['admin/Transfer/claim', ['method' => 'POST']],                          //移交认领
	'admin/Operator/lookDetail'                              => ['admin/Operator/lookDetail', ['method' => 'GET']],                 //运营商报告
	'admin/OperatorOther/getUserData'                        => ['admin/OperatorOther/getUserData', ['method' => 'POST']],                 //所有报告
	'admin/OperatorOther/regetWater'                         => ['admin/OperatorOther/regetWater', ['method' => 'POST']],                 //重新获取西瓜分


	'admin/documentary/getdelay'                             => ['admin/documentary/getdelay', ['method' => 'POST']],              //获取当前延期费用及日期
	'admin/documentary/collectionReport'                     => ['admin/documentary/collectionReport', ['method' => 'POST']],    //M2催收报表
	'admin/documentary/report'                               => ['admin/documentary/report', ['method' => 'POST']],              //M1回访报表
	'admin/elesalemy/report'                                 => ['admin/elesalemy/report', ['method' => 'POST']],                //电销报表
    'admin/documentary/collectionReport2'                    =>['admin/documentary/collectionReport2', ['method' => 'POST']],    //M0跟M1统计报表

	'admin/documentary/transfer'                             => ['admin/documentary/transfer', ['method' => 'POST']],              //M1移交用户
	'admin/documentary/repayment'                            => ['admin/documentary/repayment', ['method' => 'POST']],            //M1确认还款
	'admin/documentary/saveinfo'                             => ['admin/documentary/saveinfo', ['method' => 'POST']],              //M1保存相关
	'admin/documentary/selectinfo'                           => ['admin/documentary/selectinfo', ['method' => 'POST']],          //M1获取相关备注
	'admin/documentary/remindernote'                         => ['admin/documentary/remindernote', ['method' => 'POST']],      //M1保存催收日志备注
	'admin/documentary/xadd'                                 => ['admin/documentary/xadd', ['method' => 'POST']],             //M1回访驳回
	'admin/documentary/cuishouTips'                          => ['admin/documentary/cuishouTips', ['method' => 'POST']],             //催收提示语
	'admin/documentary/transferToRecoveryList'               => ['admin/documentary/transferToRecoveryList', ['method' => 'POST']],             //催收提示语

	#【黑名单】
	'admin/BlackList/list'                                   => ['admin/BlackList/list', ['method' => 'POST']],             //黑名单列表
	'admin/BlackList/add'                                    => ['admin/BlackList/add', ['method' => 'POST']],              //添加黑名单
	'admin/BlackList/delete'                                 => ['admin/BlackList/delete', ['method' => 'POST']],           //单个删除黑名单
	'admin/BlackList/deletes'                                => ['admin/BlackList/deletes', ['method' => 'POST']],          //多选删除黑名单
	'admin/BlackList/upload_excel'                           => ['admin/BlackList/upload_excel', ['method' => 'POST']],     //上传excel文件
	'admin/BlackList/import_excel'                           => ['admin/BlackList/import_excel', ['method' => 'POST']],     //导入excel


	'admin/documentary/delaytransfer'                        => ['admin/documentary/delaytransfer', ['method' => 'POST']],              //M1延迟移交
	'admin/Repayments/claim'                                 => ['admin/Repayments/claim', ['method' => 'POST']],                      //跟单员认领
	'admin/Transfer/claim'                                   => ['admin/Transfer/claim', ['method' => 'POST']],                          //移交认领
	'admin/Operator/lookDetail'                              => ['admin/Operator/lookDetail', ['method' => 'GET']],                 //运营商报告
	'admin/documentary/transfer'                             => ['admin/documentary/transfer', ['method' => 'POST']],              //M1移交用户
	'admin/documentary/repayment'                            => ['admin/documentary/repayment', ['method' => 'POST']],            //M1确认还款
	'admin/documentary/delay'                                => ['admin/documentary/delay', ['method' => 'POST']],            //M1确认延期
	'admin/documentary/saveinfo'                             => ['admin/documentary/saveinfo', ['method' => 'POST']],              //M1保存相关
	'admin/documentary/selectinfo'                           => ['admin/documentary/selectinfo', ['method' => 'POST']],          //M1获取相关备注
	'admin/documentary/remindernote'                         => ['admin/documentary/remindernote', ['method' => 'POST']],      //M1保存催收日志备注
	'admin/collection/remindernote'                          => ['admin/collection/remindernote', ['method' => 'POST']],        //M2保存催收日志备注
	'admin/collection/repayment'                             => ['admin/collection/repayment', ['method' => 'POST']],              //M2确定还款
	'admin/documentary/search'                               => ['admin/documentary/search', ['method' => 'POST']],                  //M1统计
	'admin/Collection/search'                                => ['admin/Collection/search', ['method' => 'POST']],                     //M2统计
	'admin/Collection/mtwoyijioa'                            => ['admin/Collection/mtwoyijioa', ['method' => 'POST']],      //M2移交（现m1）
	'admin/Collection/mtwoliuan'                             => ['admin/Collection/mtwoliuan', ['method' => 'POST']],//M2统计
	'admin/documentary/mtwocollectionReport'                 => ['admin/documentary/mtwocollectionReport', ['method' => 'POST']],  //m2报表

	# 财务路由
	'admin/Myloanpass/claim'                                 => ['admin/Myloanpass/claim', ['method' => 'POST']],                  //财务认领路由


	'admin/firsttrial/firstrevoked'                          => ['admin/firsttrial/firstrevoked', ['method' => 'POST']],                    //初审撤销

	// 档位批量删除
	'admin/appadmin/deletes'                                 => ['admin/appadmin/deletes', ['method' => 'POST']],

	'admin/pay/create_payment_oeder'                         => ['admin/pay/create_payment_oeder', ['method' => 'POST']],    //创建打款订单
	'admin/pay/payment'                                      => ['admin/pay/payment', ['method' => 'POST']],                            //支付订单
	'admin/pay/confirm'                                      => ['admin/pay/confirm', ['method' => 'POST']],                            //确认打款（同于疑似重复订单的二次确认）
	'admin/pay/queryPayment'                                 => ['admin/pay/queryPayment', ['method' => 'POST']],                    //订单查询接口
	'admin/myfangkuan/deleteOrder'                           => ['admin/myfangkuan/deleteOrder', ['method' => 'POST']],        //删除订单
	'admin/pay/change'                                       => ['admin/Pay/advanceRepay', ['method' => 'POST']],        //提前收款

	// 前海征信查询
	'admin/qhrepot/report'                                   => ['admin/QhReport/getReport', ['method' => 'POST']],        //征信查询
	'admin/qhrepot/qqtb_verify'                              => ['admin/QhReport/qqtb_verify', ['method' => 'POST']],        //qq同步助手注册
	'admin/YunFengRisk/getResult'                            => ['admin/YunFengRisk/getResult', ['method' => 'POST']],        //云峰风控查询
	'admin/YunFengRisk/getFengKongResult'                    => ['admin/YunFengRisk/getFengKongResult', ['method' => 'POST']],        //云峰风控模型查询

	// 推广统计
	'admin/binviteCommission/search'                         => ['admin/binviteCommission/search', ['method' => 'POST']],        //推广统计
	'admin/binviteCommission/baccountlist'                   => ['admin/binviteCommission/baccountlist', ['method' => 'POST']],    //推广统计列表

	// 反馈信息
	'admin/feedback/list'                                    => ['admin/feedback/index', ['method' => 'GET']],        //用户反馈

	// 脚本--运营商报告分析
	'admin/Scriptfile/report_split'                          => ['admin/Scriptfile/report_split', ['method' => 'GET']],
	'admin/Scriptfile/report_user'                           => ['admin/Scriptfile/report_user', ['method' => 'GET']],
	'admin/Scriptfile/tuhaoqianzhuang_yijioa'                => ['admin/Scriptfile/tuhaoqianzhuang_yijioa', ['method' => 'GET']],
	'admin/Scriptfile/dev_auto_yijioa'                       => ['admin/Scriptfile/dev_tuhaoqianzhuang_yijioa', ['method' => 'GET']], //M0自动移交测试
	'admin/Scriptfile/dev_auto_yijioa_m1'                    => ['admin/Scriptfile/auto_yijioa_m1_dev', ['method' => 'GET']], //M1自动移交测试
	'admin/Scriptfile/getTelDetails'                         => ['admin/Scriptfile/getTelDetails', ['method' => 'GET']],
	'admin/Scriptfile/auto_yijioa'                           => ['admin/Scriptfile/auto_yijioa', ['method' => 'GET']],
	'admin/Scriptfile/auto_yijioa_m1'                        => ['admin/Scriptfile/auto_yijioa_m1', ['method' => 'GET']],
	'admin/Scriptfile/updateUserGroup'                       => ['admin/Scriptfile/updateUserGroup', ['method' => 'GET']],      // 合并usergroup
	'admin/Scriptfile/wind_loan_now'                         => ['admin/Scriptfile/wind_loan_now', ['method' => 'GET']],      // 将数据填充至表f_loan_now中

	'admin/firsttrial/createreport'                          => ['admin/firsttrial/createReport', ['method' => 'POST']],//初审报告

	'admin/call/is_pipei'                                    => ['admin/call/is_pipei', ['method' => 'POST']],
	//员工审核导出
	'admin/operating/checkout'                               => ['admin/Operating/down', ['method' => 'GET']],
	'admin/operating/index_second'                           => ['admin/Operating/index_second', ['method' => 'GET']],  // 第二进程统计
	// M2专场
	'admin/Mtwotransfer/claim'                               => ['admin/Mtwotransfer/claim', ['method' => 'POST']],
	'admin/Mtwocollection/move'                              => ['admin/Mtwocollection/move', ['method' => 'POST']],        // 移交

	// MISS路由
	'__miss__'                                               => 'admin/base/miss',

	'admin/Batch/execute'                                    => 'admin/Batch/execute',

	//回收模块
	'admin/Recovery/claim'                                   => ['admin/Recovery/claim', ['method' => 'POST']], //回收认领
	'admin/Recoverymy/xadd'                                  => ['admin/Recoverymy/xadd', ['method' => 'POST']],//回收驳回
	'admin/Recoverymy/returngoods'                           => ['admin/Recoverymy/returngoods', ['method' => 'POST']],//回收退货
	'admin/Recoverymy/updateexpress'                         => ['admin/Recoverymy/updateexpress', ['method' => 'POST']],//更新物流
	'admin/Recoverymy/logisticsInfo'                         => ['admin/Recoverymy/logisticsInfo', ['method' => 'POST']],//获取物流

	'admin/login/sms'                                        => ['admin/base/loginSms', ['method' => 'POST']],//发送短信验证码

	'/api/renqijie_api'                                      => ['admin/Data/getRenqijieData', 'method' => 'POST'],              //对外开放数据

	//逾期导出
	'admin/index/overdue360'                                 => ['admin/index/exportOverdue360', ['method' => 'GET']],
	'admin/mtwocollection/exportOverdueList'                 => ['admin/mtwocollection/exportOverdueList', ['method' => 'GET']],
	//额度管理
	'admin/Position/modifyMaxMoney'                          => ['admin/Position/modifyMaxMoney', ['method' => 'POST']],    //修改额度
	'admin/Position/lookOver'                                => ['admin/Position/lookOver', ['method' => 'POST']],                //查看修改额度


	'admin/Scriptfile/getwindcontrol'                        => ['admin/Scriptfile/getwindcontrol', ['method' => 'GET']],//风控
	'admin/Scriptfile/windcontrol_result'                    => ['admin/Scriptfile/windcontrol_result', ['method' => 'GET']],// 风控初审结果
	'admin/Scriptfile/MatchingData'                    => ['admin/Scriptfile/MatchingData', ['method' => 'GET']],// 风控匹配结果

	'admin/Order/exportOverdue'                              => ['admin/Order/exportOverdue', ['method' => 'GET']],
	//商品管理
	'admin/Goods/deletes'                                    => ['admin/Goods/deletes', ['method' => 'POST']],
	'admin/Goods/enables'                                    => ['admin/Goods/enables', ['method' => 'POST']],

	//订单管理
	'admin/Documentary2/express'                             => ['admin/Documentary2/express',['method'=>'GET']],
	'admin/order/batchClaim'                                 => ['admin/order/batchClaim',['method'=>'POST']],
	'admin/order/statistics'                                 => ['admin/order/statistics',['method'=>'GET']],

	//订单上传/导出excel文件/退货
	'admin/order/import'                                     => ['admin/order/import',['method'=>'POST']],
	'admin/order/output'                                     => ['admin/order/output',['method'=>'GET']],
    'admin/order/drawback'                                   => ['admin/order/drawback',['method'=>'POST']],
    'admin/order/drawbackSms'                                     => ['admin/order/drawbackSms',['method'=>'POST']],

	//物流
	'admin/Express/lookOver'                                 => ['admin/Express/lookOver',['method'=>'GET|POST']],
	'admin/Express/modify'                                   => ['admin/Express/modify',['method'=>'POST']],

	//m0跟单发货
	'admin/Documentary2/send'                                => ['admin/Documentary2/send',['method' => 'POST|GET']],

	//M0A 认领
	'admin/Bridge/claim'                                     => ['admin/Bridge/claim', ['method' => 'POST']],
	//M0A 移交
	'admin/CollectionBridge/transfer'                        => ['admin/CollectionBridge/transfer', ['method' => 'POST']],
	//M0A 留案
	'admin/CollectionBridge/delaytransfer'                   => ['admin/CollectionBridge/delaytransfer', ['method' => 'POST']],
	//M0A 自动移交
	'admin/Scriptfile/auto_yijioa_m0a'                       => ['admin/Scriptfile/auto_yijioa_m0a', ['method' => 'GET']],

	// 催收平台相关
	'admin/ExternalCollection/collectoin'                    => ['admin/ExternalCollection/collectoin', ['method' => 'GET']],
	// 更新金额等数据
	'admin/ExternalCollection/collectoinUpdate'              => ['admin/ExternalCollection/collectoinUpdate', ['method' => 'GET']],
	// 催收平台更新状态
	'admin/ExternalCollection/collectoinRepayment'           => ['admin/ExternalCollection/collectoinRepayment', ['method' => 'GET']],
	// 催收平台历史记录
	'admin/ExternalCollection/historyRepayment'              => ['admin/ExternalCollection/historyRepayment', ['method' => 'POST']],

	 // 将数据填充至表f_loan_now中

	// start 账务
	'admin/accounting/index'                                 => ['admin/Accounting/index', ['method' => 'POST']],      // 账务首页
	'admin/accounting/paymentList'                           => ['admin/Accounting/paymentList', ['method' => 'POST']],      // 打款列表
	'admin/accounting/repayList'                             => ['admin/Accounting/repayList', ['method' => 'POST']],      // 代扣列表
	'admin/accounting/quickList'                             => ['admin/Accounting/quickList', ['method' => 'POST']],      // 快捷支付
	'admin/accounting/offline'                               => ['admin/Accounting/offline', ['method' => 'POST']],      // 线下
	// end 账务

	/*************************************风控数据每天下午4点执行*************************************/
	'admin/DoJob'                                            => ['admin/Job/EveryDatas','method'=>'GET|POST'],                    //生成excel
	'admin/download'                                         => ['admin/Job/download','method'=>'GET|POST'],                   //提供单个文件下载接口
	'admin/downloadZip'                                      => ['admin/Job/downloadZip','method'=>'GET|POST'],             //下载压缩包
	'admin/delFile'                                          => ['admin/Job/deleteHistoryFile','method'=>'GET|POST'],           //删除过期文件
	'admin/weekendDatas'                                     => ['admin/Job/Once_A_Week','method'=>'GET|POST'],           //删除过期文件
	'admin/getWeekCacheDatas'                                         => ['admin/Job/getDatas','method'=>'GET|POST'],  //调试          //删除过期文件
	/*****date:2018-07-23 15:42*************取首页的数据统计和apply表的数据生成excel*******************/

	//移交撤销
    'admin/Soso/transferRevoke'                                            => ['admin/Soso/transferRevoke','method'=>'GET|POST'],
    //统计优化
    'admin/Operating/summary'                                            => ['admin/Operating/summary','method'=>'GET|POST'],
    //操作记录
    'admin/OperationRecord/index'                                            => ['admin/OperationRecord/index','method'=>'GET|POST'],

];
