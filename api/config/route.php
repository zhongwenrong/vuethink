<?php
/**
 * api 路由定义
 */
use think\Route;
// 调用v2模块 
// 
/**
 * 新增路由
 */
Route::any('v2/register','v2/account/register'); 		      // 注册
Route::post('v2/sendRegVerify','v2/account/sendRegVerify');   // 注册短信

Route::post('v2/login','v2/account/login'); 				  // 普通登陆
Route::post('v2/phonelogin','v2/account/phonelogin'); 				  // 普通登陆

Route::post('v2/uploadBase64','v2/upload/uploadBase64');  // base64格式上传 
Route::post('v2/uploadQiniu','v2/upload/uploadQiniu');    // input表单上传

Route::post('v2/outlayOrincome','v2/account/outlayOrincome');                         // 保存收入和支出
Route::post('v2/obtainUser','v2/account/obtainUser');                                 // 修改用户昵称
Route::post('v2/getUserInfo','v2/account/getUserInfo');                               // 获取用户信息
Route::post('v2/getPassword','v2/account/getPassword');                               // 找回密码
Route::post('v2/updatePassword','v2/account/updatePassword');                         // 修改密码
Route::get('v2/getNewconfigs','v2/account/getNewconfigs');                            // 修改密码
Route::post('v2/getBill','v2/account/getBill');                                       // 账单明细
Route::post('v2/searchBill','v2/account/searchBill');                                 // 查询
Route::post('v2/billMon','v2/account/billMon');                                       // 账单
Route::post('v2/getConsumptionstatus','v2/account/getConsumptionstatus');             // 账单
Route::post('v2/billChart','v2/account/billChart');                                   // 图表
Route::post('v2/billChartSum','v2/account/billChartSum');                             // 图表总
Route::post('v2/userFeedback','v2/account/userFeedback');                             // 反馈


//--------------------------------------------------------------  //分割线
//---------旅游App

Route::post('v2/firstList','v2/account/firstList');                             //  首页列表
Route::post('v2/articleInfo','v2/account/articleInfo');                         //  文章详情
Route::post('v2/browsingHistory','v2/account/browsingHistory');                 //  浏览历史
Route::post('v2/historyList','v2/account/historyList');                         //  历史记录
Route::post('v2/userMessage','v2/account/userMessage');                         //  消息
Route::post('v2/userSeach','v2/account/userSeach');                             //  用户查询
Route::post('v2/userApply','v2/account/userApply');                             //  添加用户订单
Route::post('v2/myApply','v2/account/myApply');                                 //  用户订单列表
Route::post('v2/applyInfo','v2/account/applyInfo');                             //  订单详情
Route::post('v2/WatchPoint','v2/account/WatchPoint');                           //  看点















//-----------------------------------------------------------------
// 
/*账户相关路由*/

// Route::post('v2/tg_sendRegVerify','v2/account/tg_sendRegVerify');   // 推广注册短信
// Route::post('v2/sendRegVoiceVerify','v2/account/sendRegVoiceVerify');   // 注册语音短信
// Route::post('v2/tg_sendRegVoiceVerify','v2/account/tg_sendRegVoiceVerify');   // 推广注册语音短信
// Route::any('v2/register','v2/account/register'); 		    // 注册
// Route::post('v2/FirstRegister','v2/account/newRegister'); 		    // 推广第一步注册
// Route::post('v2/secondRegister','v2/account/secondRegister'); 		    // 推广第二步注册
// Route::post('v2/login','v2/account/login'); 				    // 登陆
// Route::post('v2/sendFindVerify','v2/account/sendFindVerify'); // 找回密码短信
// Route::post('v2/changPassword','v2/account/changPassword');   // 找回密码
// Route::post('v2/feedback','v2/account/feedback');             // 反馈
// Route::post('v2/memberCenter','v2/Account/memberCenter');     // 个人中心
// Route::get('v2/index2','v2/Account/index2');                // mongodb读取
// Route::post('v2/create','v2/Account/create');                // mongodb插入
// Route::post('v2/changePayPassword','v2/account/changePayPassword');   // 修改支付密码
// Route::post('v2/download','v2/Account/download');                // 记录下载
// Route::post('v2/myoverdue','v2/User/getMyOverdueDays');                // 已逾期


// /*用户路由*/
// Route::post('v2/setUserInfo','v2/user/update');  		    // 修改个人信息 
// Route::post('v2/myTeam','v2/user/myTeam'); 				// 我的团队
// Route::post('v2/getInviteInfo','v2/user/getInviteInfo');  // 邀请链接
// Route::post('v2/userScore','v2/user/score');  			// 用户余额          		
// Route::post('v2/getBrowseList','v2/user/getBrowseList');  // 用户浏览历史          		        		
// Route::post('v2/myInfo','v2/user/myInfo');                // 用户资料   
// Route::post('v2/operatorAuth','v2/user/operatorAuth');    // 运营商认证
// //Route::post('v2/zhifubaoAuth','v2/user/zhifubaoAuth');    // 支付宝认证
// Route::post('v2/Operator','v2/user/Operator');            // 是否验证运营商
// Route::post('v2/authState','v2/user/authState');            // 认证状态
// Route::post('v2/sixnum','v2/user/checkIdLastSix');            // 验证身份后六位数
// Route::any('v2/returnUrl','v2/user/returnUrl');          // 获取通话详单唯一标识  
// Route::any('v2/notifyUrl','v2/user/notifyUrl');          // 获取用户报告详情  
// Route::any('v2/zfbreturnUrl','v2/user/zfbreturnUrl');        // 支付宝认证同步跳转 
// Route::any('v2/zfbnotifyUrl','v2/user/zfbnotifyUrl');       // 支付宝认证异步跳转
// // Route::post('v2/taobaoAuth','v2/user/taobaoAuth');    // 淘宝认证
// Route::any('v2/tbreturnUrl','v2/user/tbreturnUrl');        // 淘宝认证同步跳转 
// Route::any('v2/tbnotifyUrl','v2/user/tbnotifyUrl');       // 淘宝认证异步跳转
// //Route::post('v2/shebaoAuth','v2/user/shebaoAuth');    		// 社保认证
// Route::any('v2/sbreturnUrl','v2/user/sbreturnUrl');        // 社保认证同步跳转 
// Route::any('v2/sbnotifyUrl','v2/user/sbnotifyUrl');       // 社保认证异步跳转
// //Route::post('v2/gongjijinAuth','v2/user/gongjijinAuth');     // 公积金认证
// Route::any('v2/gjjreturnUrl','v2/user/gjjreturnUrl');        // 公积金认证同步跳转 
// Route::any('v2/gjjnotifyUrl','v2/user/gjjnotifyUrl');       // 公积金认证异步跳转
// //Route::any('v2/zfbnotifyUrl','v2/user/ceshi2');          // 异步测试跳转
// Route::post('v2/publicAuth','v2/user/publicAuth');     // 选填认证

// /*锦聪添加风控路由*/
// Route::any('v2/check_newyan_data','v2/user/check_newyan_data');          // 查看用户数据

// /*商户*/
// Route::post('v2/getList','v2/merchant/getList');  // 商户列表
// Route::post('v2/details','v2/merchant/details');  // 商户详情

// /*提现*/
// Route::post('v2/createWithdraw','v2/score/createWithdraw');  // 申请提现
// Route::post('v2/txHistory','v2/score/txHistory');            // 提现历史

// /*系统配置*/
// Route::post('v2/getAppConfigs','v2/config/getAppConfigs');  // 获取系统配置
// Route::post('v2/getLunbo','v2/config/getLunbo');            // 获取轮播图

// /*征信*/
// Route::post('v2/tddoPreloanCheck','v2/watermelon/creditReport');  // 征信审核信息提交
// Route::post('v2/tdhistory','v2/watermelon/reportList');                // 征信历史审核列表
// Route::post('v2/tdreport','v2/watermelon/report');                  // 征信审核详情报告
// Route::post('v2/tdrefresh','v2/watermelon/refresh');                // 征信审核刷新列表页按钮
// /*商家链接用户浏览 注册*/
// Route::post('v2/businessRegister','v2/baccount/businessRegister');  // 商家链接注册
// Route::post('v2/addBrowse','v2/baccount/addBrowse');                // 商家链接注册

// /*用户贷款申请*/
// Route::post('v2/loanDetails','v2/apply/loanDetails');   // 借款明细
// Route::post('v2/apply','v2/apply/apply');         // 申请
// Route::post('v2/myApply','v2/apply/myApply');     // 我的借款列表
// Route::post('v2/overdow_day','v2/apply/overdow_day');     // 首页违约天数，剩余邮寄时间
// Route::post('v2/myApplyDetails','v2/apply/myApplyDetails');     // 我的借款详情
// Route::post('v2/countdown','v2/apply/countdown');     // 审核不通过再次借款倒计时

// /*首页*/
// Route::post('v2/getCard','v2/Home/getCard');  // 首页卡片数据
// Route::post('v2/getGear','v2/Home/getGear');  // 首页档位数据

// /*消息*/
// Route::post('v2/messpages','v2/message/messpages'); //列表
// Route::post('v2/messred','v2/message/messred'); //阅读
// Route::post('v2/messageinfo','v2/message/messageinfo'); //消息详情接口

// /*图片上传*/
// Route::post('v2/uploadBase64','admin/Upload/uploadBase64');  // base64格式上传 
// Route::post('v2/uploadQiniu','admin/Upload/uploadQiniu');    // input表单上传
// Route::post('v2/qiniuToken','v2/Config/qiniuToken');    // 获取七牛token

// /*接收客户端的值*/
// Route::post('v2/teladdress','v2/Myinfo/Myinfo'); //通讯录

// /*token 验证接口*/
// Route::post('v2/tokenverify','v2/account/tokenverify');   // 注册短信

// Route::get('v2/pic','v2/account/pic'); // 图片验证码

// /*支付  路由*/
// Route::post('v2/pay','v2/Order/createorder'); //创建支付链接
// Route::any('v2/notify','v2/Order/notify');    //支付回调
// Route::any('v2/successPage','v2/Order/successPage');  //支付成功页面 
// Route::post('v2/payAction','v2/Order/payAction');  //还款成功后的操作
// Route::post('v2/queryPay','v2/Order/queryPay');  //查询订单支付情况
// Route::post('v2/BinQuery','v2/Order/BinQuery');  //查询银行卡信息
// Route::post('v2/bankcardbindlist','v2/Order/bankcardbindlist');  //查询签约信息
// Route::any('v2/setDefaultBankCard','v2/Order/setDefaultBankCard');  //设置默认银行卡
// Route::post('v2/bankcardbind','v2/Order/bankcardbind');     //银行卡签约申请
// Route::post('v2/saveBankCard','v2/Order/saveBankCard');      //保存银行卡
// Route::post('v2/bankcardunbind','v2/Order/bankcardunbind');  //银行卡解约
// Route::post('v2/payRecord','v2/Order/payRecord');  //支付记录
// Route::post('v2/quickNotifyUrl','v2/apply/quickNotifyUrl');  //富有快捷支付回調
// Route::post('v2/teaQuickNotifyUrl','v2/apply/teaQuickNotifyUrl');  //购买茶叶富有快捷支付回調
// Route::post('v2/unbindCard','v2/FuIou/unbindCard');  //银行卡解绑
// Route::post('v2/authOrderPay','v2/FuIou/authPay');  //认证支付
// Route::post('v2/repayOrderPay','v2/FuIou/repayPay');  //还款支付
// Route::post('v2/buyOrderPay','v2/FuIou/buyPay');  //购物支付
// Route::post('v2/rechargeOrderPay','v2/FuIou/rechargeOrderPay');  //充值支付
// Route::post('v2/rechargPc','v2/FuIou/rechargePc');  // PC充值参数
// Route::post('v2/rechargPcNotify','v2/FuIou/rechargPcNotify');  // PC充值回调

// /*打款*/
// Route::any('v2/paymentOeder','v2/Order/create_payment_oeder'); //创建支付订单
// Route::any('v2/payment','v2/Order/payment'); 					// 发起支付
// Route::any('v2/notify_payment','v2/Order/notify_payment'); //打款回调
// Route::any('v2/confirm_payment','v2/Order/confirm'); // 疑似订单确认
// Route::any('v2/queryPayment','v2/Order/queryPayment'); //订单结果查询

// Route::post('v2/repayment','v2/apply/repayment'); // 还款页面 
// Route::any('v2/contract','v2/apply/contract');    // 查询合同

// Route::any('v2/hanlerrepay','v2/Order/repayment'); // 处理自动打款 
// /*反馈*/
// Route::post('v2/feedback','v2/FeedBack/add'); // 写入 

// /*定时脚本*/
// Route::any('v2/savePhoneList','v2/Script/savePhoneList');               // 保存需要发送短信的手机号 插入Redis队列【每天9点执行一次】
// Route::any('v2/sendMessages','v2/Script/sendMessages');                 // 从队列取出并逐一发送短信【每分钟执行一次】
// Route::any('v2/handOverdueScript','v2/Script/handOverdueScript');       // 逾期处理的脚本【不自动执行】
// Route::any('v2/pullNotifyUrl','v2/Script/pullNotifyUrl');               // 通话详单异步回调【主动拉取脚本，每分钟执行一次】
// Route::any('v2/changeOS','v2/Script/changeOS');                         // 修改user_info系统
// Route::any('v2/changeOS_test','v2/Script/changeOS_test');               // 修改user_info系统
// Route::any('v2/saveOverdueOrderNumberList','v2/Script/saveOverdueOrderNumberList');    // 逾期订单入队列【每天00:01执行一次】
// Route::any('v2/costOverdueOrderNumber','v2/Script/costOverdueOrderNumber');            // 消费逾期订单队列【每分钟执行一次】
// Route::any('v2/popPayUserOrderList','v2/Script/popPayUserOrderList');            // 消费打款订单队列【每分钟执行50条】
// Route::any('v2/Invite','v2/Script/Invite');            //
// Route::any('v2/getRedisInfo','v2/Script/getRegistInfoFromRedis');            //取redis的注册第一步和注册第二步统计数据

// // 云峰风控
// Route::any('v2/yunFengUrl','v2/YunFengRisk/getUrl'); //获取云峰链接
// Route::any('v2/yunFengResult','v2/YunFengRisk/getResult'); //获取云峰结果
// Route::any('v2/yunFengRiskNotify','v2/YunFengRisk/notify'); //云峰回调
// Route::any('v2/fengkongNotify','v2/YunFengRisk/fengkongNotify'); //云峰风控模型回调

// // qq同步助手
// Route::any('v2/sesame_qqtb_verify','v2/Sesame/qqtb_verify'); //注册qq同步助手注册
// Route::any('v2/sesame_qqtb_home','v2/Sesame/qqtb_home');     //获取通讯录或者短信
// Route::any('v2/sesame_qqtb_directories','v2/Sesame/qqtb_directories');     //获取通讯录或者短信
// Route::any('v2/sesame_is_fifeen','v2/Sesame/is_fifeen');     //获取通讯录或者短信
// Route::any('v2/sesame_Sesame','v2/Sesame/Sesame');     //芝麻分
// Route::any('v2/sesame_notifyurl','v2/Sesame/get_sesame_notifyurl'); //芝麻分回调

// Route::post('v2/delUser','v2/user/delUser');   // 删除帐号-测试专用
// Route::post('v2/delApply','v2/user/delApply');   // 删除上一笔订单-测试专用
// Route::any('v2/ceshi','v2/Script/ceshi');   // 测试

// // 人脸识别
// Route::any('v2/ocr','v2/IdcardOcr/ocr');   // 身份证ocr测试
// Route::any('v2/getNumber','v2/IdcardOcr/getNumber');   // 获取语音数字
// Route::any('v2/validateVideo','v2/IdcardOcr/validateVideo');   // 上传视频
// Route::any('v2/faceVerify','v2/IdcardOcr/faceVerify');   // face认证
// Route::post('v2/face','v2/Face/faceVerify');   // face认证SDK版

// Route::any('v2/ocrInfo','v2/IdcardOcr/ocrInfo');   // 获取身份证OCR信息

// Route::any('v2/ocrReturn','v2/IdcardOcr/returnUrl');          // 获取通话详单唯一标识
// Route::any('v2/ocrNotify','v2/IdcardOcr/notifyUrl');          // 获取用户报告详情

// Route::any('v2/getAcountInfoApi','v2/VoiceNotice/getAcountInfoApi');          // 获取用户报告详情
// Route::post('v2/queryOrder','v2/order/hcQueryOrder');          // 查询汇潮订单

// Route::any('v2/notify_auth','v2/ApplyOrder/ApplyNotify'); //认证收费回调

// Route::any('v2/contractNotify','v2/FuIou/contractNotify'); //签约异步回调

// Route::post('v2/bindCard','v2/FuIou/bindBankCard');//富友绑定银行卡repay

// Route::post('v2/FuiouRepay','v2/FuIou/repay');//富友还款

// Route::post('v2/FuiouBindCardList','v2/FuIou/BindCardList');//富友绑定银行卡列表

// Route::post('v2/bindBankInfo','v2/User/bindBankInfo'); //绑定银行卡列表资料

// Route::any('v2/paySuccess','v2/FuIou/paySuccess'); //代付成功回调
// Route::any('v2/payRefund','v2/FuIou/paySuccess'); //代付退票回调

// Route::any('v2/sendVoice','v2/Script/sendVoice'); // 消费语音电话队列【每天10点到18点每分钟执行一次】
// Route::any('v2/voiceNotify','v2/Script/voiceNotify'); //语音话单回调

// Route::post('v2/rechargePage','v2/FuIou/rechargePage'); //充值页面

// Route::post('v2/recharge','v2/FuIou/recharge'); //充值

// //Route::get('v2/TestRepayment','v2/Account/testRepay'); //测试代扣 单个订单

// Route::post('v2/applyProgress','v2/apply/applyProgress');         // 申请进度
// Route::post('v2/transferAuthVip','v2/apply/transferAuthVip');         // 申请转vip认证

// Route::any('v2/apiErrorLog','v2/Base/apiErrorLog'); //前端日志收集

// Route::any('v2/checkVersion','v2/Base/checkVersion'); //版本检查

// Route::any('v2/getUserInfoByPhone','v2/User/getUserInfoByPhone'); //根据手机号查询用户信息
// Route::any('v2/updateUserInfoByPhone','v2/User/updateUserInfoByPhone'); //根据手机号更新用户信息

// Route::any('v2/payResQuery','v2/Script/payResQuery'); // 查询代付结果
// Route::any('v2/handleSpecialPayOrder','v2/Script/handleSpecialPayOrder'); // 处理特殊的代付订单【每天17点执行一次】
// //我的订单 start
// Route::post('v2/consignment','v2/MyOrder/consignment'); //确认发货
// Route::post('v2/consignmentList','v2/MyOrder/consignmentLog'); //发货记录
// //我的订单 end

// Route::post('v2/partner','v2/Partner/add'); // 写入

// Route::any('v2/timeout', 'v2/FuIou/handlerTimeOut'); //处理超时订单


// Route::any('v2/protocol','v2/Business/protocol');              						//前台获取商家Id

// Route::any('v2/getLinkman','v2/User/getLinkman');									//获取联系人
// Route::any('v2/incrByBusinessId','v2/Account/incrByBusinessId');					//商家计数
// //Route::any('v2/countRedis','v2/User/countRedis');									//商家计数

// Route::any('v2/compressUpload','v2/Account/compressAndUpload');									//处理日志 上传 并且 删除
// // Route::post('v2/checkpic','v2/Account/checkpic');                                             // 图片验证码验证
// Route::post('v2/config_tg','v2/Account/config_tg');                                              // 推广需要的参数

// Route::get('v2/autoHandleTimeOut','v2/Script/handleTimeOut');    //自动处理还款超时订单

// Route::get('v2/test','v2/Account/test');  
// /***********************************************茶商宝模块**********************************************/
// Route::any('v2/getGoods','v2/Goods/getGoods');                                      //获取商品列表
// Route::any('v2/myAddressList','v2/Address/myAddressList');                          //获取我的收获地址
// Route::any('v2/modifyDefaultAddress','v2/Address/modifyDefaultAddress');            //修改默认收货地址
// Route::any('v2/addMyAddress','v2/Address/addMyAddress');                            //增加收货地址
// Route::any('v2/getGoodsDetail','v2/Goods/getGoodsDetail');                          //获取商品详情
// Route::any('v2/delGoodsCache','v2/Goods/delGoodsCache');                          //获取商品详情
// Route::post('v2/myApplyDetails_v2','v2/apply/myApplyDetails_v2');                   //订单详情
// Route::post('v2/lookOverExpress','v2/GoodsOrder/lookOverExpress');                  //查看物流
// Route::post('v2/delMyAddress','v2/Address/delMyAddress');                           //删除
// Route::post('v2/getMyGoodsOrder','v2/GoodsOrder/getMyGoodsOrder');                  //获取购物订单
// Route::post('v2/orderDetail','v2/GoodsOrder/orderDetail');                  //获取购物订单
// Route::post('v2/confirm','v2/GoodsOrder/confirm');                                  //确认收货
// Route::post('v2/buy','v2/GoodsOrder/buyTea');                                       //购买
// Route::post('v2/modifyMyAddress','v2/Address/modifyMyAddress');                     //修改收货地址
// Route::post('v2/getMyAddressById','v2/Address/getMyAddressById');                   //获取详细的收货地址
// Route::post('v2/gear','v2/Home/getGear_v2');  										//首页档位数据 对应茶商宝
// Route::post('v2/getMyOrderNum','v2/GoodsOrder/getMyOrderNum');  					//订单数量
// Route::post('v2/myStatus','v2/Home/Mystatus');  					                //首页状态
// Route::post('v2/apply_v2','v2/apply/apply_v2');                                     // 申请
// Route::post('v2/myApply_v2','v2/apply/myApply_v2');                                 // 我的借款列表

// Route::post('v2/repayment_v2','v2/apply/repayment_v2');                             // 还款页面
// Route::post('v2/OrderContract','v2/Contract/OrderContract');                        // 订货单
// Route::post('v2/myContract','v2/Contract/Contract');                                // 合同
// Route::any('v2/dealOrder','v2/Script/dealTakeOver');                                // 自动收货脚本
// Route::any('v2/dealOrderOne','v2/Script/delTakeOverOne');                                // 自动收货脚本

// Route::post('v2/getCourse','v2/Course/getCourse');                                	// 教程页面
// /***************************************赠险******************************************************/
// Route::any('v2/getGift','v2/RiskGift/getGift');                                	            // 赠险接口
// Route::any('v2/getRiskDatas','v2/RiskGift/getRiskDatas');                                	// 获取统计数据
// Route::any('v2/ceshiToken','v2/RiskGift/ceshiToken');                                	    // 测试token
// Route::any('v2/saveRedisDatas','v2/RiskGift/saveRedisDatas');                               //将redis数据存到数据库
// Route::any('v2/saveHistoryDatas','v2/RiskGift/saveHistoryDatas');
// /************************************************************************************************/

