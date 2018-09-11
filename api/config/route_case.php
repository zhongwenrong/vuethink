<?php
// +----------------------------------------------------------------------
// | Description: 基础框架路由配置文件
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honghaiweb.com>
// +----------------------------------------------------------------------

return [
    // 定义资源路由
    '__rest__'=>[
        'admin/caseApplyCenter'   	=>'cases/CaseApplyCenter',
        'admin/applyrelief'  		=>'cases/CaseApplyRelief'
    ],


	// 【案件】列表
	'admin/EntryCases/index' 				=> ['cases/EntryCases/index', ['method' => 'GET']],
	// 【案件】委托方待分配案件
	'admin/EntryCases/structure' 			=> ['cases/EntryCases/structure', ['method' => 'GET']],
	// 【案件】分配案件
	'admin/EntryCases/distribute' 			=> ['cases/EntryCases/distribute', ['method' => 'POST']],
	// 【案件】创建单个案例
	'admin/EntryCases/create' 				=> ['cases/EntryCases/save', ['method' => 'POST']],
	// 【案件】上传excel文件
	'admin/EntryCases/upload' 				=> ['cases/EntryCases/upload', ['method' => 'POST']],
	// 【案件】获取此次导入数据
	'admin/EntryCases/obtain' 				=> ['cases/EntryCases/obtain', ['method' => 'GET']],
	// 【案件】将数据导入数据库
	'admin/EntryCases/implant' 				=> ['cases/EntryCases/implant', ['method' => 'POST']],
	// 【案件】获取分配对象
	// 'admin/EntryCases/allocationObjects' 	=> ['cases/EntryCases/allocationObjects', ['method' => 'GET']],
	// 【案件】分配记录
	'admin/BatchDistribution/index' 	    => ['cases/BatchDistribution/index', ['method' => 'GET']],
	// 【案件】分配记录-具体案例列表
	'admin/Distribution/index' 	    		=> ['cases/Distribution/index', ['method' => 'GET']],
	// 自动分配记录
	'admin/Distribution/record' 			=> ['cases/Distribution/record', ['method' => 'GET']],
	// 【案件】催收池
	'admin/EntryCases/collect' 	    		=> ['cases/EntryCases/collect', ['method' => 'GET']],
	// 【案件】案件重新分配
	'admin/EntryCases/redistribution' 	    => ['cases/EntryCases/redistribution', ['method' => 'POST']],
	// 【案件】下载示范案件
	'admin/EntryCases/download' 	    	=> ['cases/EntryCases/download', ['method' => 'POST']],
	// 【案件】 案件批量导入
	'admin/EntryCases/batchImport' 	    	=> ['cases/EntryCases/batchImport', ['method' => 'POST']],
	
	// 【案件】数据对接新增案件
	'admin/abutment' 						=> ['cases/abutment/getInfo', ['method' => 'POST']],
	// 【案件】数据对接更新案件逾期信息
	// 'admin/LawCase' 						=> ['cases/abutment/update', ['method' => 'POST']],
	// 【案件】数据对接更新案件状态
	// 'admin/repayment' 					=> ['cases/abutment/repayment', ['method' => 'POST']],
	// 【案件】更新接口密码
	'admin/EntryCases/shibboleth' 			=> ['cases/EntryCases/shibboleth', ['method' => 'POST']],
	// 【案件】获取接口密码
	'admin/EntryCases/getPassword' 			=> ['cases/EntryCases/getPassword', ['method' => 'GET']],

	// 【标签】列表
	'admin/CaseTag/index' 					=> ['cases/CaseTag/index', ['method' => 'GET']],
	// 【标签】创建
	'admin/CaseTag/create' 					=> ['cases/CaseTag/save', ['method' => 'POST']],

	// 【案件】案件详情
	'admin/CaseDetail/getCaseDetail' 			=> ['cases/CaseDetail/getCaseDetail', ['method' => 'GET']],	
	// 【案件】案件联系人列表
	'admin/CaseDetail/getCasecontacts' 			=> ['cases/CaseDetail/getCasecontacts', ['method' => 'GET']],
		// 【案件】案件联系人列表
	'admin/CaseDetail/addCasecontacts' 			=> ['cases/CaseDetail/addCasecontacts', ['method' => 'POST']],
		// 【案件】案件联系人详情
	'admin/CaseDetail/getCasecontactsDetail' 	=> ['cases/CaseDetail/getCasecontactsDetail', ['method' => 'GET']],
		// 【案件】新增案件催收记录
	'admin/CaseDetail/addCasesHistory' 			=> ['cases/CaseDetail/addCasesHistory', ['method' => 'POST']],
		// 【案件】编辑案件催收记录
	'admin/CaseDetail/editCasesHistory' 			=> ['cases/CaseDetail/editCasesHistoryList', ['method' => 'POST']],
		// 【案件】获取案件催收记录列表
	'admin/CaseDetail/getCasesHistoryList' 		=> ['cases/CaseDetail/getCasesHistoryList', ['method' => 'GET']],
		// 【案件】获取案件申请还款记录列表	
	'admin/CaseDetail/getCasesRepaymentList' 	=> ['cases/CaseDetail/getCasesRepaymentList', ['method' => 'GET']],
		// 【案件】获取案件分配记录列表
	'admin/CaseDetail/getCasesDistributionList' => ['cases/CaseDetail/getCasesDistributionList', ['method' => 'GET']],
		// 【案件】获取案件申请减免列表
	'admin/CaseDetail/getCasesApplyReliefList' 	=> ['cases/CaseDetail/getCasesApplyReliefList', ['method' => 'GET']],
		// 【案件】新增案件申请减免记录
	'admin/CaseDetail/addCasesRelief' 			=> ['cases/CaseDetail/addCasesRelief', ['method' => 'POST']],
			// 【案件】新增还款申请记录
	'admin/CaseDetail/addCasesRepayment' 		=> ['cases/CaseDetail/addCasesRepayment', ['method' => 'POST']],
			// 【案件】编辑联系人信息
	'admin/CaseDetail/updateCasecontacts' 		=> ['cases/CaseDetail/updateCasecontacts', ['method' => 'POST']],
        // 【案件】获取标签详情	
	'admin/CaseDetail/getCasesMarkList' 		=> ['cases/CaseDetail/getCasesMarkList', ['method' => 'GET']],
       // 【案件】获取标签详情
	'admin/CaseDetail/updateCasesMarkDetail' 	=> ['cases/CaseDetail/updateCasesMarkDetail', ['method' => 'POST']],
      // 【案件】获取标签详情
	'admin/CaseDetail/saveCasesMark' 			=> ['cases/CaseDetail/saveCasesMark', ['method' => 'POST']],
      // 【案件】撤销减免申请
	'admin/CaseDetail/cancelCasesRelief' 		=> ['cases/CaseDetail/cancelCasesRelief', ['method' => 'POST']],
      // 【案件】获取便签或批注
	'admin/CaseDetail/getCaseAnnotationList' 	=> ['cases/CaseDetail/getCaseAnnotationList', ['method' => 'GET']],
      // 【案件】新增便签或批注
	'admin/CaseDetail/addCaseAnnotation' 	=> ['cases/CaseDetail/addCaseAnnotation', ['method' => 'POST']], 
	     // 【案件】全案搜索
	'admin/CaseDetail/fullCaseSearch' 	=> ['cases/CaseDetail/fullCaseSearch', ['method' => 'GET']],
	 // 【案件】强制结案
	'admin/CaseDetail/forceEndCase' 	=> ['cases/CaseDetail/forceEndCase', ['method' => 'POST']],
	 
      // 【申請中心】还款批量拒絕或通過
	'admin/caseApplyCenter/enables' 			=> ['cases/caseApplyCenter/enables', ['method' => 'POST']],
      // 【申請中心】再次申请还款
	'admin/caseApplyCenter/reAapplication' 		=> ['cases/caseApplyCenter/reAapplication', ['method' => 'POST']],
     // 【申請中心】申请还款列表
	'admin/caseApplyCenter/repaymentList' 		=> ['cases/caseApplyCenter/repaymentList', ['method' => 'GET']],
     // 【申請中心】申请还款批量拒絕或通過
	'admin/caseApplyCenter/repaymentEnables' 	=> ['cases/caseApplyCenter/repaymentEnables', ['method' => 'POST']],
   
      // 【申請中心】获取减免列表
	'admin/caseApplyCenter/reliefList' 			=> ['cases/caseApplyCenter/reliefList', ['method' => 'GET']],
      // 【申請中心】减免批量拒絕或通過
	'admin/caseApplyCenter/reliefEnables' 		=> ['cases/caseApplyCenter/reliefEnables', ['method' => 'POST']],
      // 【申請中心】筛选催收员
	'admin/caseApplyCenter/getAllCollection' 	=> ['cases/caseApplyCenter/getAllCollection', ['method' => 'GET']],
	//  【申請中心】获取案件还款历史
	'admin/caseApplyCenter/getHistoryRepayment' 	=> ['cases/caseApplyCenter/getHistoryRepayment', ['method' => 'GET']],

    //催收员视角绩效中心-确认收款
	'admin/Repayments/index' 		=> ['cases/Repayments/index', ['method' => 'GET']],
	//催收员视角绩效中心-代收款
	'admin/Repayments/index2' 		=> ['cases/Repayments/indexConfirm', ['method' => 'GET']],
	//绩效中心-图表详情
	'admin/Repayments/getCount' 	=> ['cases/Repayments/getCount', ['method' => 'GET']],
	//绩效中心-管理级视角
	'admin/Repayments/adminIndex' 	=> ['cases/Repayments/adminIndex', ['method' => 'GET']],
	//获取订单委托方
	'admin/Repayments/getClient' 	=> ['cases/Repayments/getClient', ['method' => 'GET']],
	//首页数据（未启用）
	'admin/Repayments/getIndex' 	=> ['cases/Repayments/getIndex', ['method' => 'GET']],
	//图表-每日详情
	'admin/Repayments/getColumIns' 	=> ['cases/Repayments/getColumInformation', ['method' => 'GET']],
	//图表-每月详情
	'admin/Repayments/getColumMon' 	=> ['cases/Repayments/getColumMonth', ['method' => 'GET']],

     'admin/CaseApplyRelief/test' 	=> ['cases/CaseApplyRelief/test', ['method' => 'GET']],
	// MISS路由
	'__miss__'  => 'admin/base/miss',
];