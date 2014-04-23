<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="zh-CN" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>广陵区项目管理系统</title>
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
					广陵区项目管理系统
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
						<span class="badge"><?php echo ($agentMessageCount); ?></span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li><p>您有 <?php echo ($agentMessageCount); ?> 条未读通知</p></li>
						<?php if(empty($agentMessage)): ?><li>	<a href="javascript:void(0)"> 暂 无 未 读 通 知 项 </a></li>
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

								<a href="<?php echo U('Policy/notifyList');?>">查看所有通知 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->

					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-tasks"></i>
						<span class="badge"><?php echo ($agentnewscount); ?></span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li><p>七天内新增 <?php echo ($agentnewscount); ?> 条政策公告</p></li>
						<?php if(empty($agentnews)): ?><li>	<a href="javascript:void(0)"> 暂 无 政 策 公 告 </a></li>
						<?php else: ?>
							<?php if(is_array($agentnews)): $i = 0; $__LIST__ = $agentnews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo U('Policy/notifyInfo',array('itemid'=>$v['itemid']));?>">
									<span class="subject">
									<span class="from"><?php echo ($v['title']); ?></span>
									<span class="time"><?php echo (date("Y-m-d",$v['addtime'])); ?></span>
									</span>
									<span class="message" style="text-indent: 2em;"><?php echo (msubstr($v['content'],0,20,'utf-8',true)); ?></span>  
									</a>
								</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							<li class="external">
								<a href="<?php echo U('Policy/newsList');?>">查看所有政策公告 <i class="m-icon-swapright"></i></a>
							</li>

						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="__ROOT__/public/media/image/avatar1_small.jpg" />
						<span class="username"><?php echo session('username');?></span>
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
						<li <?php if(ACTION_NAME == 'create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/create');?>">创建用户</a></li>
						<li <?php if(ACTION_NAME == 'List'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Member/List');?>">用户管理</a></li>
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
					   <?php if($_SESSION['usertype'] == 2): ?><li <?php if(ACTION_NAME == 'create'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Project/create');?>">添加项目</a></li><?php endif; ?>
						<li <?php if(ACTION_NAME == 'List'): ?>class="active"<?php endif; ?> >
						<a href="<?php echo U('Project/List');?>">项目列表</a></li>
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
<style>
input { width:130PX;}
select{ width:137PX;}
TABLE TD{ padding-left:5PX; padding-top:5PX; padding-right:5PX; color:#666666}
.s-table caption{ height:40PX; line-height:40PX; background-color:#f5f5f5;border-top: 1px solid #CCCCCC;border-left: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC; margin-top:20PX; font-size:14px; font-weight:bold}
</style>
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
				<h3 class="page-title"><small>欢迎你！</small><?php echo session('username');?> 　<small>您的登陆身份是：
				<?php if($_SESSION['usertype'] == 2): ?>重大办<?php endif; ?>
				<?php if($_SESSION['usertype'] == 1): ?>部门<?php endif; ?>
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

								<a href="<?php echo U('Project/List');?>">项目管理</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="<?php echo U('Project/create');?>">添加项目</a></li>

						</ul>
		<!-- END PAGE HEADER-->
		<div class="portlet box blue tabbable">

							<div class="portlet-title">

								<div class="caption">

									<i class="icon-reorder"></i>

									<span class="hidden-480">添加项目</span>

								</div>

							</div>

							<div class="portlet-body form">

								<div class="tabbable portlet-tabs">

									<ul class="nav nav-tabs">
										<li class=""><a href="#portlet_tab3" data-toggle="tab"></a></li>

										<li class=""><a href="#portlet_tab2" data-toggle="tab"></a></li>

										<li class="active"><a href="#portlet_tab1" data-toggle="tab"></a></li>
									</ul>

									<div class="tab-content">
<form action="" method="post" accept-charset="utf-8">

    <div class="panes">
        <div>
            <table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="s-table">
                <caption>基本信息</caption>
                <tr >
                    <td width="12%">项目编码 <span class="required">*</span></td>
                    <td colspan="2">
                        <input type="text" class="normal" name="base[projectcoding]"   value="gv<?php echo date('YmdHis', time()) ?>" >
                       
                    </td>
                    <td>类别<span class="required">*</span></td>
                    <td width="120px">
                        <select name="base[citytype]" id="">
                            <option value="0">区储备重大项目</option>
                            <option value="1">市重大项目库项目</option>
                        </select>
                    </td>
                    <td width="10%">填报时间<span class="required">*</span></td>
                    <td><input type="text" class="normal datepicker" name="base[created]"  value="<?php echo date('Y-m-d', time()) ?>">
                    <span><?php echo($created);?></span>
                    </td>
                </tr>
                <tr class="even">
                    <td>项目名称<span class="required">*</span></td>
                    <td colspan="4"><input type="text" class="normal" name="base[name]" style="width:90%"></td>
                    <td>责任主体<span class="required">*</span></td>
                    <td>
			<input type="text" class="normal" name="base[responsibility]">

                    </td>
                </tr>
                <tr>
                    <td>投资主体</td>
                    <td style="width: 8%">联系人</td>
                    <td><input type="text" class="normal" name="base[invest_linkman_name]"></td>
                    <td style="width: 8%">职务</td>
                    <td><input type="text" class="normal" name="base[invest_linkman_position]"></td>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="base[invest_linkman_phone]"></td>
                </tr>
                <tr  class="even">
                    <td>合作方</td>
                    <td colspan="6"><input type="text" class="normal" name="base[partner]" style="width:90%"></td>
                </tr>
                <tr>
                    <td>合作院所</td>
                    <td colspan="6"><input type="text" class="normal" name="base[cooperation]" style="width:90%"></td>
                </tr>
                <td>项目类别<span class="required">*</span></td>
                <td  colspan="6"><input type="text" class="normal" name="base[type]" style="width:40%"> </td>
            </table>
        </div>
        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>项目入库和市认定情况</caption>
                <tr>
                    <td>入库时间</td>
                    <td>报市库时间</td>
                    <td>认定新签约</td>
                    <td>认定新开工</td>
                    <td>认定新竣工</td>
                    <td>认定新投产</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_time]"></td>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_citytime]"></td>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_newsignature]"></td>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_startwork]"></td>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_newcompletion]"></td>
                    <td><input type="text" style="width:90PX;" name="base[warehousing_production]"></td>
                </tr>
            </table>
        </div>
        <div>
            <table id="addNode" class="s-table" width="100%" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0">
                <caption>建设时序计划完成情况<span class="required">*</span></caption>
                <tr>
                    <td>节点</td>
                    <td>完成拆迁</td>
                    <td>开始打桩</td>
                    <td>基础开挖</td>
                    <td>正&nbsp;负&nbsp;零</td>
                    <td>主体封顶</td>
                    <td>主体竣工</td>
                    <td>设备安装调试(装修)</td>
                    <td>部分投产(营业)</td>
                    <td colspan="2">全部投产(营业)</td>
                </tr>
                <tr>
                    <td><input type="hidden" class="normal" name="build[0][name]" value="默认">计划</td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_demolition]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_piling]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_excavate]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_pmz]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_cap]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_completion]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_device]"></td>
                    <td><input type="text" style="width:50PX;" name="build[0][build_plan_partproduction]"></td>
                    <td colspan="2"><input type="text" style="width:50PX;" name="build[0][build_plan_allproduction]"></td>
                </tr>
            </table>
            <button id="addNodeButtom" type="button" class="btn green" style="margin-top: 10px;">添加节点</button>
        </div>
        <div>
            <table class="s-table" width="98%" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" >
                <caption>挂钩领导部门联系信息</caption>
                <tr>
                    <td rowspan="3" style="width: 10%">挂钩市领导</td>
                    <td colspan="2" style="width: 15%">姓名</td>
                    <td><input type="text" class="normal" name="contactinfo[city_leader_name]"></td>
                    <td style="width: 10%">职务</td>
                    <td><input type="text" class="normal" name="contactinfo[city_leader_position]"></td>
                </tr>
                <tr>
                    <td rowspan="2">联系人</td>
                    <td style="width: 10%">姓名</td>
                    <td><input type="text" class="normal" name="contactinfo[city_contact_name]"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="contactinfo[city_contact_position]"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="contactinfo[city_contact_phone]"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="contactinfo[city_contact_mail]"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">市挂钩部门</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="contactinfo[city_department]"></td>
                    <td>联系人职务</td>
                    <td><input type="text" class="normal" name="contactinfo[city_department_position]"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="contactinfo[city_department_phone]"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="contactinfo[city_department_mail]"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">责任主体</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="contactinfo[responsibility_name]"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="contactinfo[responsibility_position]"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="contactinfo[responsibility_phone]"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="contactinfo[responsibility_mail]"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" >责任主体重大办联系人</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="contactinfo[officemajor_name]"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="contactinfo[officemajor_position]"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="contactinfo[officemajor_phone]"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="contactinfo[officemajor_mail]"></td>
                </tr>
            </table>
        </div>
    </div>
    <p style="line-height:40px; height:40px; color:#0066FF">*为必填项，其他项可以[修改项目]中添加，修改。</p>

												<div class="form-actions">

													<button type="submit" class="btn blue"><i class="icon-ok"></i> 保存</button>

													<button type="button" class="btn">取消</button>

												</div>
</form>
									</div>

								</div>

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
<script type="text/javascript">
    var counttr = 0;
    $(function() {

//        延迟绑定datepicker
        $("body").delegate(".datepicker", "focusin", function(){
            $(this).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
        $('select[name="base[responsibility]"]').change(function(){
            $code =  $("input[name='base[projectcoding]']").val().replace(/[a-zA-Z]+/,'');
            $("input[name='base[projectcoding]']").val($(this).val() + $code ) ;
            $("input[name='base[projectcoding]']").siblings('span').html($(this).val() + $code);
        });
        $('#addNodeButtom').click(function(){
            counttr++;
            var node = '<tr>' +
                            '<td><input type="text" class="normal"  name="build[' + counttr+ '][name]"><\/td>' +
                            '<td>计划<\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_demolition]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_piling]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_excavate]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_pmz]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_cap]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_completion]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_device]"><\/td>' +
                            '<td><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_partproduction]"><\/td>' +
                            '<td width="100px"><input type="text" class="normal datepicker" name="build[' + counttr+ '][build_plan_allproduction]"><\/td>' +
                            '<td width="10px;"><span class="deleteNode">X<\/span><\/td> ' +
                        ' <\/tr>';
            $('#addNode').append(node);
        });

        $('#addNode').on('click','.deleteNode', function(){
            if(confirm('确定删除')){
                $(this).parent().parent().remove();
            }
        });


        $('#createproject').submit(function(){
            if($('select[name="base[responsibility]"]').val() == ''){
                alert('请选择责任主体');
                return false;
            }

            $('input[type=submit]').attr({disabled:"disabled",value:'loading..'});
            $.post(
                $(this).attr("action"),
                $(this).serialize(),
                function(data){
                    if( data == '')
                        location.href = '/project/list/';

                    $('#error').html(data);
                    $('input[type=submit]').attr({value:'提交'}).removeAttr('disabled');
                }
            );

            return false;
        });

    });
</script>
</body>
</html>