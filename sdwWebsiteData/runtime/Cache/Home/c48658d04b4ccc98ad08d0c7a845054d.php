<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="zh-CN" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>广陵区发改委重大项目申报系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="__ROOT__/public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="__ROOT__/public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="shortcut icon" href="__ROOT__/public/media/image/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="javascript:void(0)" style="margin-left:20px;">
					广陵区发改委重大项目申报系统
				</a>
				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="__ROOT__/public/media/image/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">
					<!-- BEGIN INBOX DROPDOWN -->

					<li class="dropdown" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-envelope"></i>
						<span class="badge">4</span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li><p>您有 4 条未完善项目</p></li>
							
						<?php if(empty($agentMessage)): ?><li>	<a href="javascript:void(0)"> 暂 无 未 完 善 项 目 </a></li>
						<?php else: ?>
							<?php if(is_array($agentMessage)): $i = 0; $__LIST__ = $agentMessage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo U('Policy/notifyInfo',array('itemid'=>$v['itemid']));?>">
									<span class="subject">
									<span class="from"><?php echo ($v['title']); ?></span>
									<span class="time"><?php echo (date("Y-m-d H:i",$v['addtime'])); ?></span>
									</span>
									<span class="message" style="text-indent: 2em;"><?php echo (msubstr($v['content'],0,20,'utf-8',true)); ?></span>  
									</a>
								</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						
							<li class="external">

								<a href="<?php echo U('Policy/notifyList');?>">查看所有项目 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="__ROOT__/public/media/image/avatar1_small.jpg" />
						<span class="username"><?php echo session('name');?></span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo U('Agent/myInfo');?>"><i class="icon-user"></i> 我的资料</a></li>
							<li><a href="<?php echo U('Agent/editPassword');?>"><i class="icon-calendar"></i> 修改密码</a></li>
							<li><a href="javascript:void(0)"><i class="icon-lock"></i> 关于系统</a></li>
							<li><a href="<?php echo U('Index/logout');?>"><i class="icon-key"></i> 退出</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li style="margin-bottom:10px;">
					<div class="sidebar-toggler hidden-phone">
					<span class="m_title"><strong>功能选项</strong></span>
					</div>
				</li>
				<!-------------------选中实例代码，请勿删除-------------------->
				<li class="start <?php if(MODULE_NAME == 'Agent'): ?>active<?php endif; ?>">
					<a href="<?php echo U('Index/Agent');?>">
					<i class="icon-home"></i> 
					<span class="title">平台首页</span>
					<?php if(MODULE_NAME == 'Agent'): ?><span class="selected"></span><?php endif; ?>
					</a>
				</li>

               <!-------------------重大办和部门有用户管理权限-------------------->
              <?php if(($_SESSION['usertype'] == 1) or ($_SESSION['usertype'] == 2)): ?><li class="<?php if(MODULE_NAME == 'Member'): ?>active<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-cogs"></i> 
					<span class="title">用户管理</span>
					<?php if(MODULE_NAME == 'Member'): ?><span class="selected"></span>
					<?php else: ?>
					<span class="arrow"></span><?php endif; ?>
					</a>
					<ul class="sub-menu">
						<li <?php if(ACTION_NAME == 'member_group_create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/member_group_create');?>">创建用户组</a></li>
						<li <?php if(ACTION_NAME == 'member_group'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/member_group');?>">用户组管理</a></li>
						<li <?php if(ACTION_NAME == 'member_create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/member_create');?>">创建用户</a></li>
						<li <?php if(ACTION_NAME == 'member_list'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/member_list');?>">用户管理</a></li>
					</ul>
				</li><?php endif; ?>

				<li class="<?php if(MODULE_NAME == 'Project'): ?>active<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-bookmark-empty"></i> 
					<span class="title">项目管理</span>
					<?php if(MODULE_NAME == 'Project'): ?><span class="selected"></span>
					<?php else: ?>
					<span class="arrow"></span><?php endif; ?>
					</a>
					<ul class="sub-menu">
					   <!-------------------只有重大办才能发起项目-------------------->
					   <?php if($_SESSION['usertype'] == 1): ?><li <?php if(ACTION_NAME == 'create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Project/create');?>">添加项目</a></li><?php endif; ?>
						<li <?php if(ACTION_NAME == 'PList'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Project/PList');?>">项目列表</a></li>
						<li <?php if(ACTION_NAME == 'MList'): ?>class="active"<?php endif; ?> >
					</ul>
				</li>


				<li class="<?php if(MODULE_NAME == 'System'): ?>active<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-gift"></i> 
					<span class="title">系统设置</span>
					<?php if(MODULE_NAME == 'System'): ?><span class="selected"></span>
					<?php else: ?>
					<span class="arrow"></span><?php endif; ?>
					</a>
					<ul class="sub-menu">
						<li <?php if(ACTION_NAME == 'create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Agent/myInfo');?>">我的资料</a></li>
						<li <?php if(ACTION_NAME == 'List'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Agent/editPassword');?>">修改密码</a></li>
						<li <?php if(ACTION_NAME == 'List'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Index/logout');?>">安全退出</a></li>
					</ul>
				</li>


			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
<!-- BEGIN PAGE LEVEL STYLES --> 
	<link href="__ROOT__/public/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="__ROOT__/public/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="__ROOT__/public/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="__ROOT__/public/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PAGE LEVEL STYLES -->
		<!-- BEGIN PAGE -->
<div class="page-content" style="min-height:560px;">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"></button>
			<h3>Widget Settings</h3>
		</div>
		<div class="modal-body">
			Widget settings form goes here
		</div>
	</div>
	<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title"><small>欢迎你！</small><?php echo session('name');?> 　<small>您的登陆身份是：
				<?php if($_SESSION['usertype'] == 1): ?>重大办<?php endif; ?>
				<?php if($_SESSION['usertype'] == 2): ?>部门<?php endif; ?>
				<?php if($_SESSION['usertype'] == 3): ?>乡镇街道<?php endif; ?>
				</small></h3>
			</div>
		</div>
        		<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Index/Agent');?>">平台首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="<?php echo U('Project/PList');?>">项目列表</a>

								<span class="icon-angle-right"></span>

							</li>


						</ul>
		<!-- END PAGE HEADER-->
		<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-edit"></i>项目列表</div>

								<div class="tools">



								</div>

							</div>

							<div class="portlet-body">

								<div class="clearfix">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<!--重大办身份添加 -->
		<?php if($_SESSION['usertype'] == 1): ?><td><div class="btn-group">

										<button id="sample_editable_1_new" class="btn green" 
										onclick="window.open('<?php echo U('Project/create');?>')">

										添加项目 <i class="icon-plus"></i>

										</button>

									</div></td><?php endif; ?>
									
				<td><form class="form-search" action="__APP__/Project/PList" style="margin-top:10px;">

					<div class="input-append">

						<input type="text" class="m-wrap" placeholder="项目编号,项目名称" name="search_project">

						<button type="submit" class="btn blue btn-subscribe"><span>搜索项目</span> <i class="m-icon-swapright m-icon-white"></i></button>

					</div>
<input name="soso" type="hidden" value="soso" />
				</form></td>
		</tr>
</table>



								</div>
<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info" width="100%">

									<thead>

										<tr role="row"><th width="143" colspan="1" rowspan="1" class="sorting_disabled" style="width: 107px;" role="columnheader" aria-label="Username">项目编码</th><th width="300" colspan="1" rowspan="1" class="sorting" style="width: 140px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Full Name: activate to sort column ascending">项目类别</th><th width="145" colspan="1" rowspan="1" class="sorting" style="width: 120px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Points: activate to sort column ascending">填报时间</th><th width="201" colspan="1" rowspan="1" class="sorting" style="width: 166px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Notes: activate to sort column ascending">项目名称</th>
										  <th width="164" rowspan="1" class="sorting" style="width: 136px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Notes: activate to sort column ascending">责任主体</th>
										  <th width="193" rowspan="1" class="sorting" style="width: 136px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Notes: activate to sort column ascending">合作方</th>
									    <th colspan="2" rowspan="1" class="sorting" style="width: 58px;" role="columnheader" tabindex="0" aria-controls="sample_editable_1" aria-label="Edit: activate to sort column ascending">管理</th></tr>
									</thead>

									

								<tbody role="alert" aria-live="polite" aria-relevant="all">
								<?php if(is_array($projectall)): $i = 0; $__LIST__ = $projectall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i; if($i%2 == 0): ?><tr class="odd">

											<td class="  sorting_1"><?php echo ($p["projectcoding"]); ?></td>

											<td class=" ">
											<?php if($p["citytype"] == 0): ?>区储备重大项目<?php endif; ?>
											<?php if($p["citytype"] == 1): ?>市重大项目库项目<?php endif; ?>											</td>

											<td class=" "><?php echo ($p["created"]); ?></td>

											<td class="center "><?php echo ($p["projectname"]); ?></td>

											<td class="center "><?php echo ($p["bumen"]); ?>--<?php echo ($p["bumenwho"]); ?></td>
											<td class="center "><?php echo ($p["partner"]); ?></td>
											<td class=" ">
											<!--乡镇街道写月报 -->
											<?php if($_SESSION['usertype'] == 3): ?><a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">编辑</a>
                                            <a href="<?php echo U('Project/MonthReport','id='); echo ($p["id"]); ?>">写月报</a>
											<a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">看月报</a>
											   <?php if(($p["ischeckbm"] == 1) and ($p["ischeckzd"] == 1)): ?><font color="#009900">已审核</font>
											   <?php else: ?>
											   审核中<?php endif; endif; ?>
                                             <!--部门具有分配项目的权限 -->
											<?php if($_SESSION['usertype'] == 2): ?><a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">写项目</a>
											<a href="<?php echo U('Project/projectfenpei','id='); echo ($p["id"]); ?>">分配</a>
											<a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">查看月报</a>
											  <?php if($p["ischeckbm"] == 1): ?><a href="<?php echo U('Project/Shenhebumenxm','id='); echo ($p["id"]); ?>"><font color="#009900">已审核</font></a>
											  <?php else: ?>
											  <a href="<?php echo U('Project/Shenhebumenxm','id='); echo ($p["id"]); ?>">未审核</a><?php endif; endif; ?>	
											<!-- 重大办具有删除项目的权限-->
											<?php if($_SESSION['usertype'] == 1): ?><a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">月报</a>
											<a onclick="return confirm(this,'您确定删除吗？')" href="<?php echo U('Project/project_delete','id='); echo ($p["id"]); ?>">删除</a>
											<a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">编辑</a><BR />
											
											<?php if($p["ischeckbm"] == 1): ?><!--部门审核通过后，重大办来审核 -->
											<?php if($p["ischeckzd"] == 1): ?><a href="<?php echo U('Project/Shenhezdbxm','id='); echo ($p["id"]); ?>"><font color="#009900">已审核</font></a>
											<?php else: ?>
											<a href="<?php echo U('Project/Shenhezdbxm','id='); echo ($p["id"]); ?>">未审核</a><?php endif; endif; endif; ?>	
											</td>
								</tr>
								<?php else: ?>
											<tr class="even">

											<td class="  sorting_1"><?php echo ($p["projectcoding"]); ?></td>

											<td class=" ">											
											<?php if($p["citytype"] == 0): ?>区储备重大项目<?php endif; ?>
											<?php if($p["citytype"] == 1): ?>市重大项目库项目<?php endif; ?></td>

											<td class=" "><?php echo ($p["created"]); ?></td>

											<td class="center "><?php echo ($p["projectname"]); ?></td>

											<td class="center "><?php echo ($p["bumen"]); ?>--<?php echo ($p["bumenwho"]); ?></td>
											<td class="center "><?php echo ($p["partner"]); ?></td>
											<td class=" ">
											<!--乡镇街道写月报 -->
											<?php if($_SESSION['usertype'] == 3): ?><a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">编辑</a>
                                            <a href="<?php echo U('Project/MonthReport','id='); echo ($p["id"]); ?>">写月报</a>
											<a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">看月报</a>
											   <?php if(($p["ischeckbm"] == 1) and ($p["ischeckzd"] == 1)): ?><font color="#009900">已审核</font>
											   <?php else: ?>
											   审核中<?php endif; endif; ?>
                                             <!--部门具有分配项目的权限 -->
											<?php if($_SESSION['usertype'] == 2): ?><a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">写项目</a>
											<a href="<?php echo U('Project/projectfenpei','id='); echo ($p["id"]); ?>">分配</a>
											<a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">查看月报</a>
											
											  <?php if($p["ischeckbm"] == 1): ?><a href="<?php echo U('Project/Shenhebumenxm','id='); echo ($p["id"]); ?>"><font color="#009900">已审核</font></a>
											  <?php else: ?>
											  <a href="<?php echo U('Project/Shenhebumenxm','id='); echo ($p["id"]); ?>">未审核</a><?php endif; endif; ?>	
											<!-- 重大办具有删除项目的权限-->
											<?php if($_SESSION['usertype'] == 1): ?><a href="<?php echo U('Project/MonthReportList','id='); echo ($p["id"]); ?>">月报</a>
											<a onclick="return confirm(this,'您确定删除吗？')" href="<?php echo U('Project/project_delete','id='); echo ($p["id"]); ?>">删除</a>
											<a href="<?php echo U('Project/Pediter','id='); echo ($p["id"]); ?>">编辑</a><BR />
											
											<?php if($p["ischeckbm"] == 1): ?><!--部门审核通过后，重大办来审核 -->
											<?php if($p["ischeckzd"] == 1): ?><a href="<?php echo U('Project/Shenhezdbxm','id='); echo ($p["id"]); ?>"><font color="#009900">已审核</font></a>
											<?php else: ?>
											<a href="<?php echo U('Project/Shenhezdbxm','id='); echo ($p["id"]); ?>">未审核</a><?php endif; endif; endif; ?>	
											</td>
											</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</tbody></table>
<div class="row-fluid"><div class="span6"><div class="dataTables_info" id="sample_editable_1_info"></div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><?php echo ($page_pro); ?></ul></div></div></div></div>

							</div>

						</div>

	</div>
	<!-- END PAGE CONTAINER-->    
</div>
<!-- END PAGE -->
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			技术支持：江苏仕德伟网络科技有限公司
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="__ROOT__/public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="__ROOT__/public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="__ROOT__/public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="__ROOT__/public/media/js/bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="/public/media/js/excanvas.min.js"></script>
	<script src="/public/media/js/respond.min.js"></script>  
	<![endif]-->   
	<script src="__ROOT__/public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="__ROOT__/public/media/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="__ROOT__/public/media/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="__ROOT__/public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
<!-- END BODY -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="__ROOT__/public/js/confirm.js" type="text/javascript"></script>   
<script src="__ROOT__/public/media/js/jquery.vmap.js" type="text/javascript"></script>   
<script src="__ROOT__/public/media/js/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.vmap.world.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  
<script src="__ROOT__/public/media/js/jquery.flot.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.flot.resize.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/date.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/daterangepicker.js" type="text/javascript"></script>     
<script src="__ROOT__/public/media/js/jquery.gritter.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="__ROOT__/public/media/js/jquery.sparkline.min.js" type="text/javascript"></script>  
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="__ROOT__/public/media/js/app.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->  
<!-- END JAVASCRIPTS -->
<script>
var Index = function () {
return {
	//main function to initiate the module
	init: function () {
		App.addResponsiveHandler(function () {
			Index.initCalendar();
			jQuery('.vmaps').each(function () {
				var map = jQuery(this);
				map.width(map.parent().width());
			});
		});
	},

initCharts: function () {
	if (!jQuery.plot) {
		return;
	}
	
function showTooltip(title, x, y, contents) {
	$('<div id="tooltip" class="chart-tooltip"><div class="date">' + title + '<\/div><div class="label label-success">CTR: ' + x + '<\/div><div class="label label-important">Imp: ' + y + '<\/div><\/div>').css({
		position: 'absolute',
		display: 'none',
		top: y - 100,
		width: 75,
		left: x - 40,
		border: '0px solid #ccc',
		padding: '2px 6px',
		'background-color': '#fff',
	}).appendTo("body").fadeIn(200);
}

<?php $i=0;$j=0;$m=0; ?>
var pageviews = [
<?php if(is_array($chartmemberlist)): foreach($chartmemberlist as $k=>$v): ?>[<?php echo ($i); ?>, <?php echo ($v); ?>]<?php if($i != '29' ): ?>,<?php endif; ?>
<?php $i++; endforeach; endif; ?>
];

var visitors = [
<?php if(is_array($chartorderlist)): foreach($chartorderlist as $k=>$v): ?>[<?php echo ($j); ?>, <?php echo ($v); ?>]<?php if($j != '29' ): ?>,<?php endif; ?>
<?php $j++; endforeach; endif; ?>
];
			
            if ($('#site_statistics').size() != 0) {
                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();
                var plot_statistics = $.plot($("#site_statistics"), [{
                        data: pageviews,
                        label: "净增会员数"
                    }, {
                        data: visitors,
                        label: "净增订单数"
                    }
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                        opacity: 0.05
                                    }, {
                                        opacity: 0.01
                                    }
                                ]
                            }
                        },
                        points: {
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderWidth: 0
                    },
                    colors: ["#d12610", "#37b7f3", "#52e136"],
					xaxis: {
                        ticks: [
						
					<?php if(is_array($chartorderlist)): foreach($chartorderlist as $k=>$v): ?>[<?php echo ($m); ?>, "<?php echo ($k); ?>"]<?php if($i != '29' ): ?>,<?php endif; ?>
					<?php $m++; endforeach; endif; ?>	
						
						
						],
                        tickDecimals: 0
                    },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0
                    }
                });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                           // showTooltip(item.series.label,item.pageX , item.pageY, item.series.label + " of " + x + " = " + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }
        },
		
    };

}();

jQuery(document).ready(function(){   
	   App.init(); // initlayout and core plugins
	   Index.initCharts(); // init index page's custom scripts
});
</script>
<!-- END BODY -->
</body>
</html>