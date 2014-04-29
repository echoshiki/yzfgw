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
<style>
input { width:130PX;}
select{ width:137PX;}
TABLE TD{ padding-left:5PX; padding-top:5PX; padding-right:5PX; color:#666666; font-size:14px;}
.s-table caption{ height:40PX; line-height:40PX; background-color:#f5f5f5;border-top: 1px solid #CCCCCC;border-left: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC; margin-top:20PX; font-size:14px; font-weight:bold}
</style>
<script>
function Dsy() 
{ 
this.Items = {}; 
} 
Dsy.prototype.add = function(id,iArray) 
{ 
this.Items[id] = iArray; 
} 
Dsy.prototype.Exists = function(id) 
{ 
if(typeof(this.Items[id]) == "undefined") return false; 
return true; 
}
 
function change(v){ 
var str="0"; 
for(i=0;i<v;i++){ str+=("_"+(document.getElementById(s[i]).selectedIndex-1));}; 
var ss=document.getElementById(s[v]); 
with(ss){ 
length = 0; 
options[0]=new Option(opt0[v],opt0[v]); 
if(v && document.getElementById(s[v-1]).selectedIndex>0 || !v) 
{ 
if(dsy.Exists(str)){ 
ar = dsy.Items[str]; 
for(i=0;i<ar.length;i++)options[length]=new Option(ar[i],ar[i]); 
if(v)options[1].selected = true; 
} 
} 
if(++v<s.length){change(v);} 
} 
}
 
var dsy = new Dsy();
dsy.add("0",[<?php if(is_array($swclass)): $k = 0; $__LIST__ = $swclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pso): $mod = ($k % 2 );++$k; if($k == 1): ?>"<?php echo ($pso["groupname"]); ?>"<?php else: ?>,"<?php echo ($pso["groupname"]); ?>"<?php endif; endforeach; endif; else: echo "" ;endif; ?>]);


<?php if(is_array($shangwu_small)): $kk = 0; $__LIST__ = $shangwu_small;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): $mod = ($kk % 2 );++$kk;?><!-- -->
dsy.add("0_<?php echo ($kk-1); ?>",[
<?php foreach($pp as $kkk=>$vvv){ if($kkk == 0): ?>"<?php echo ($vvv['name']); ?>"<?php else: ?>,"<?php echo ($vvv['name']); ?>"<?php endif; } ?>]
);<?php endforeach; endif; else: echo "" ;endif; ?>

var s=["s1","s2"];
var opt0 = ["指派部门","指派人"]; 
function setup() 
{ 
for(i=0;i<s.length-1;i++) 
document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")"); 
change(0); 
} 
</script>
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

								<a href="<?php echo U('Project/PList');?>">项目管理</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="">项目修改</a></li>

						</ul>
		<!-- END PAGE HEADER-->
		<div class="portlet box blue tabbable">

							<div class="portlet-title">

								<div class="caption">

									<i class="icon-reorder"></i>

									<span class="hidden-480">项目修改</span>

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
<!--重大办操作地方 -->
<?php if($_SESSION['usertype'] == 1): ?><form action="__APP__/Project/doedite" method="post" accept-charset="utf-8">

    <div class="panes">
        <div>
        		<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="s-table">
						<caption>
								基本信息
								</caption>
        				<tr >
								<td width="12%">项目编码 <span class="required">*</span></td>
        						<td colspan="2"><?php echo ($projectedite["projectcoding"]); ?>								</td>
        						<td>项目类别<span class="required">*</span></td>
        						<td width="120"><select name="citytype" id="citytype">
								
												<option value="0" <?php if($projectedite["citytype"] == 0): ?>selected="selected"<?php endif; ?>>区储备重大项目</option>
												<option value="1" <?php if($projectedite["citytype"] == 1): ?>selected="selected"<?php endif; ?>>市重大项目库项目</option>
										</select>								</td>
        						<td width="10%">填报时间<span class="required">*</span></td>
        						<td><input type="text" class="normal datepicker" name="created" value="<?php echo ($projectedite["created"]); ?>"  />												 </td>
        						</tr>
						<tr class="even">
								<td>项目名称<span class="required">*</span></td>
								<td colspan="4"><input type="text" class="normal" name="projectname" value="<?php echo ($projectedite["projectname"]); ?>" style="width:90%" /></td>
								<td>责任主体<span class="required">*</span></td>
								<td>
								<?php echo ($projectedite["bumen"]); ?>　----　<?php echo ($projectedite["bumenwho"]); ?><BR />
           <select name="bumen" id="s1" style="width:93px;">
            <option></option>
          </select>
          <select name="bumenwho" id="s2"  style="width:93px;">
            <option></option>
          </select> <font color="#0033FF" style="font-size:12px;">*留空则表示不修改</font>
          <script language="javascript">setup();</script> 
		  
<select name="xiangzhen">
<option value="">指派乡镇</option>
<?php if(is_array($xzclass)): $i = 0; $__LIST__ = $xzclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pvo["groupname"]); ?>" <?php if(($projectedite["xiangzhen"]) == $pvo["groupname"]): ?>selected="selected"<?php endif; ?> ><?php echo ($pvo["groupname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
								
								</td>
						</tr>
						<tr>
								<td rowspan="3">投资主体</td>
								<td height="30" colspan="6" style="width: 8%"><input type="text" class="normal" name="invest_name" value="<?php echo ($projectedite["invest_name"]); ?>" style="width:70%"/></td>
						</tr>
						<tr>
						  <td style="width: 8%">负责人</td>
					      <td><input type="text" class="normal" name="invest_leader_name" value="<?php echo ($projectedite["invest_leader_name"]); ?>"/></td>
					      <td style="width: 8%">职务</td>
					      <td><input type="text" class="normal" name="invest_leader_position" value="<?php echo ($projectedite["invest_leader_position"]); ?>"/></td>
					      <td>联系方式</td>
					      <td><input type="text" class="normal" name="invest_leader_phone" value="<?php echo ($projectedite["invest_leader_phone"]); ?>"/></td>
					  </tr>
						<tr>
						  <td style="width: 8%">联系人</td>
					      <td><input type="text" class="normal" name="invest_linkman_name" value="<?php echo ($projectedite["invest_linkman_name"]); ?>"/></td>
					      <td style="width: 8%">职务</td>
					      <td><input type="text" class="normal" name="invest_linkman_position" value="<?php echo ($projectedite["invest_linkman_position"]); ?>"/></td>
					      <td>联系方式</td>
					      <td><input type="text" class="normal" name="invest_linkman_phone" value="<?php echo ($projectedite["invest_linkman_phone"]); ?>"/></td>
					  </tr>
						<tr  class="even">
								<td>合作方</td>
								<td colspan="2"><input type="text" class="normal" name="partner" style="width:70%" value="<?php echo ($projectedite["partner"]); ?>"/></td>
						        <td>用地（亩）</td>
						        <td><input type="text" class="normal" name="acreage" value="<?php echo ($projectedite["acreage"]); ?>"/></td>
						        <td rowspan="3">被纳入省(部)
重大项目计划名称</td>
						        <td rowspan="3"><input type="text" class="normal" name="majorprojectname" value="<?php echo ($projectedite["majorprojectname"]); ?>"/></td>
						</tr>
						<tr>
								<td>合作院所</td>
								<td colspan="2"><input type="text" class="normal" name="cooperation" style="width:70%" value="<?php echo ($projectedite["cooperation"]); ?>"/></td>
						        <td>建筑面积（平方米)</td>
						        <td><input type="text" class="normal" name="areraged" value="<?php echo ($projectedite["areraged"]); ?>"/></td>
				        </tr>
		<tr><td>项目类别<span class="required">*</span></td>
						<td  colspan="2"><input type="text" class="normal" name="projecttype" style="width:40%" value="<?php echo ($projectedite["projecttype"]); ?>"/>						</td>
						<td>建设地点</td>
						<td><input type="text" class="normal" name="address" value="<?php echo ($projectedite["address"]); ?>"/></td>
				    </table>
        </div>

		        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>项目建设内容</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="build_content" id="build_content" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["build_content"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>		
		        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">投产后效益（预计）</font></caption>
                <tr>
                    <td>年产值
(亿元)</td>
                    <td>年销售
(亿元)</td>
                    <td>年利税
(亿元)</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_output"]); ?>" name="benefit_output"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_sell"]); ?>" name="benefit_sell"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_taxes"]); ?>" name="benefit_taxes"></td>

                </tr>
            </table></td>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">用工人数</font></caption>
                <tr>
                    <td>总数</td>
                    <td>博士</td>
                    <td>硕士</td>
                    <td>本科</td>
					<td>大专</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_all"]); ?>" name="officeworker_all" disabled="disabled"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_doctor"]); ?>" name="officeworker_doctor"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_master"]); ?>" name="officeworker_master"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_bachelor"]); ?>" name="officeworker_bachelor"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_undergraduate"]); ?>" name="officeworker_undergraduate"></td>
                </tr>
            </table></td>
		</tr>
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
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_time"]); ?>" name="warehousing_time"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_citytime"]); ?>" name="warehousing_citytime"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_newsignature"]); ?>" name="warehousing_newsignature"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_startwork"]); ?>" name="warehousing_startwork"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_newcompletion"]); ?>" name="warehousing_newcompletion"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["warehousing_production"]); ?>" name="warehousing_production"></td>
                </tr>
            </table>
        </div>
                <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>投资情况（亿元、亿美元）</caption>
                <tr>
                    <td>引资情况</td>
                    <td>注册
资本金</td>
                    <td>计划
总投资</td>
                    <td>累计完成投资</td>
                    <td>本年
计划投资</td>
                    <td>本年完成投资</td>
					 <td>本月投资</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_type"]); ?>" name="invest_type"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_signasset"]); ?>" name="invest_signasset"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestall"]); ?>" name="invest_planinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestall"]); ?>" name="invest_completeinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestyear"]); ?>" name="invest_planinvestyear"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestyear"]); ?>" name="invest_completeinvestyear"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_month"]); ?>" name="invest_month"></td>
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
                    <td><input type="hidden" class="normal" name="planname" value="默认">计划</td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_demolition"]); ?>" name="build_plan_demolition"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_piling"]); ?>" name="build_plan_piling"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_excavate"]); ?>" name="build_plan_excavate"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_pmz"]); ?>" name="build_plan_pmz"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_cap"]); ?>" name="build_plan_cap"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_completion"]); ?>" name="build_plan_completion"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_device"]); ?>" name="build_plan_device"></td>
                    <td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_plan_partproduction"]); ?>" name="build_plan_partproduction"></td>
                    <td colspan="2"><input type="text" style="width:87%" value="<?php echo ($projectedite["build_plan_allproduction"]); ?>" class="normal datepicker" name="build_plan_allproduction"></td>
                </tr>
<!--                                <tr>
                		<td>实际</td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_demolition"]); ?>" name="build_actual_demolition"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_piling"]); ?>" name="build_actual_piling"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_excavate"]); ?>" name="build_actual_excavate"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_pmz"]); ?>" name="build_actual_pmz"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_cap"]); ?>" name="build_actual_cap"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_completion"]); ?>" name="build_actual_completion"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_device"]); ?>" name="build_actual_device"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_partproduction"]); ?>" name="build_actual_partproduction"></td>
                		<td colspan="2"><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_allproduction"]); ?>" name="build_actual_allproduction"></td>
                </tr> -->
                
            </table>
          <!--  <button id="addNodeButtom" type="button" class="btn green" style="margin-top: 10px;">添加节点</button> -->
        </div>
<!--        		        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>详细进展</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
<textarea name="content_jinzhan" id="content_jinzhan" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_jinzhan"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>	
				        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>存在问题</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
<textarea name="content_problem" id="content_problem" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_problem"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>
		<div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>市领导挂钩情况</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
<textarea name="content_leader" id="content_leader" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_leader"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div> -->
        <div>
            <table class="s-table" width="100%" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" >
                <caption>挂钩领导部门联系信息</caption>
                <tr>
                    <td rowspan="3" style="width: 10%">挂钩市领导</td>
                    <td colspan="2" style="width: 15%">姓名</td>
                    <td><input type="text" class="normal" name="city_leader_name" value="<?php echo ($projectedite["city_leader_name"]); ?>" ></td>
                    <td style="width: 10%">职务</td>
                    <td><input type="text" class="normal" name="city_leader_position" value="<?php echo ($projectedite["city_leader_position"]); ?>"></td>
                </tr>
                <tr>
                    <td rowspan="2">联系人</td>
                    <td style="width: 10%">姓名</td>
                    <td><input type="text" class="normal" name="city_contact_name" value="<?php echo ($projectedite["city_contact_name"]); ?>"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="city_contact_position" value="<?php echo ($projectedite["city_contact_position"]); ?>"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="city_contact_phone" value="<?php echo ($projectedite["city_contact_phone"]); ?>"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="city_contact_mail" value="<?php echo ($projectedite["city_contact_mail"]); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">市挂钩部门</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="city_department" value="<?php echo ($projectedite["city_department"]); ?>"></td>
                    <td>联系人职务</td>
                    <td><input type="text" class="normal" name="city_department_position" value="<?php echo ($projectedite["city_department_position"]); ?>"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="city_department_phone" value="<?php echo ($projectedite["city_department_phone"]); ?>"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="city_department_mail" value="<?php echo ($projectedite["city_department_mail"]); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">责任主体</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="responsibility_name" value="<?php echo ($projectedite["responsibility_name"]); ?>"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="responsibility_position" value="<?php echo ($projectedite["responsibility_position"]); ?>"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="responsibility_phone" value="<?php echo ($projectedite["responsibility_phone"]); ?>"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="responsibility_mail" value="<?php echo ($projectedite["responsibility_mail"]); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" >责任主体重大办联系人</td>
                    <td>名称</td>
                    <td><input type="text" class="normal" name="officemajor_name" value="<?php echo ($projectedite["officemajor_name"]); ?>"></td>
                    <td>职务</td>
                    <td><input type="text" class="normal" name="officemajor_position" value="<?php echo ($projectedite["officemajor_position"]); ?>"></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><input type="text" class="normal" name="officemajor_phone" value="<?php echo ($projectedite["officemajor_phone"]); ?>"></td>
                    <td>E-mail</td>
                    <td><input type="text" class="normal" name="officemajor_mail" value="<?php echo ($projectedite["officemajor_mail"]); ?>"></td>
                </tr>
            </table>
        </div>
    </div>
	<input type="hidden" class="normal" name="id" value="<?php echo ($projectedite["id"]); ?>">
    <p style="line-height:40px; height:40px; color:#0066FF">*为必填项，其他项可以[修改项目]中添加，修改。</p>

												<div class="form-actions">

													<button type="submit" class="btn blue"><i class="icon-ok"></i> 修改</button>

													<button type="button" class="btn">取消</button>

												</div>
</form><?php endif; ?>
<!--乡镇街道操作地方 -->
<?php if($_SESSION['usertype'] == 3): ?><form action="__APP__/Project/xiangzhenedite" method="post" accept-charset="utf-8">

    <div class="panes">
        <div>
        		<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="s-table">
						<caption>
								基本信息
								</caption>
        				<tr >
								<td width="12%">项目编码 <span class="required">*</span></td>
        						<td colspan="2"><?php echo ($projectedite["projectcoding"]); ?>								</td>
        						<td>项目类别<span class="required">*</span></td>
        						<td width="120">
								            <?php if($projectedite["citytype"] == 0): ?>区储备重大项目<?php endif; ?>
											<?php if($projectedite["citytype"] == 1): ?>市重大项目库项目<?php endif; ?>								</td>
        						<td width="10%">填报时间<span class="required">*</span></td>
        						<td><?php echo ($projectedite["created"]); ?>												 </td>
        						</tr>
						<tr class="even">
								<td>项目名称<span class="required">*</span></td>
								<td colspan="4"><?php echo ($projectedite["projectname"]); ?></td>
								<td>责任主体<span class="required">*</span></td>
								<td>部门：<?php echo ($projectedite["bumen"]); ?>　----　<?php echo ($projectedite["bumenwho"]); ?><BR />
								乡镇：<?php echo ($projectedite["xiangzhen"]); ?>
								</td>
						</tr>
						<tr>
								<td rowspan="3">投资主体</td>
								<td colspan="6" style="width: 8%"><input type="text" class="normal" name="invest_name" value="<?php echo ($projectedite["invest_name"]); ?>" style="width:70%"/></td>
								</tr>
						<tr>
								<td style="width: 8%">负责人</td>
								<td><input type="text" class="normal" name="invest_leader_name" value="<?php echo ($projectedite["invest_leader_name"]); ?>"/></td>
								<td style="width: 8%">职务</td>
								<td><input type="text" class="normal" name="invest_leader_position" value="<?php echo ($projectedite["invest_leader_position"]); ?>"/></td>
								<td>联系方式</td>
								<td><input type="text" class="normal" name="invest_leader_phone" value="<?php echo ($projectedite["invest_leader_phone"]); ?>"/></td>
						</tr>
						<tr>
								<td style="width: 8%">联系人</td>
								<td><input type="text" class="normal" name="invest_linkman_name" value="<?php echo ($projectedite["invest_linkman_name"]); ?>"/></td>
								<td style="width: 8%">职务</td>
								<td><input type="text" class="normal" name="invest_linkman_position" value="<?php echo ($projectedite["invest_linkman_position"]); ?>"/></td>
								<td>联系方式</td>
								<td><input type="text" class="normal" name="invest_linkman_phone" value="<?php echo ($projectedite["invest_linkman_phone"]); ?>"/></td>
						</tr>
						<tr  class="even">
								<td>合作方</td>
								<td colspan="2"><input type="text" class="normal" name="partner" style="width:90%" value="<?php echo ($projectedite["partner"]); ?>"/></td>
								<td>用地
（亩）</td>
								<td><input type="text" class="normal" name="acreage" value="<?php echo ($projectedite["acreage"]); ?>"/></td>
								<td rowspan="3">被纳入省(部)
重大项目计划名称</td>
								<td rowspan="3"><?php echo ($projectedite["majorprojectname"]); ?></td>
						</tr>
						<tr>
								<td rowspan="2">合作院所</td>
								<td colspan="2" rowspan="2"><input type="text" class="normal" name="cooperation" style="width:90%" value="<?php echo ($projectedite["cooperation"]); ?>"/></td>
								<td>建筑面积（平方米)</td>
								<td><input type="text" class="normal" name="areraged" value="<?php echo ($projectedite["areraged"]); ?>"/></td>
								</tr>
		<tr><td>建设
地点</td>
						<td><input type="text" class="normal" name="address" value="<?php echo ($projectedite["address"]); ?>"/></td>
						</table>
        </div>
		
        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>项目建设内容</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="build_content" id="build_content" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["build_content"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>		
		        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">投产后效益（预计）</font></caption>
                <tr>
                    <td>年产值
(亿元)</td>
                    <td>年销售
(亿元)</td>
                    <td>年利税
(亿元)</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_output"]); ?>" name="benefit_output"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_sell"]); ?>" name="benefit_sell"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_taxes"]); ?>" name="benefit_taxes"></td>

                </tr>
            </table></td>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">用工人数</font></caption>
                <tr>
                    <td>总数</td>
                    <td>博士</td>
                    <td>硕士</td>
                    <td>本科</td>
					<td>大专</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_all"]); ?>" name="officeworker_all" disabled="disabled"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_doctor"]); ?>" name="officeworker_doctor"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_master"]); ?>" name="officeworker_master"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_bachelor"]); ?>" name="officeworker_bachelor"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_undergraduate"]); ?>" name="officeworker_undergraduate"></td>
                </tr>
            </table></td>
		</tr>
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
                    <td><?php echo ($projectedite["warehousing_time"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_citytime"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_newsignature"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_startwork"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_newcompletion"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_production"]); ?></td>
                </tr>
            </table>
        </div>
        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>投资情况（亿元、亿美元）</caption>
                <tr>
                    <td>引资情况</td>
                    <td>注册
资本金</td>
                    <td>计划
总投资</td>
                    <td>累计完成投资</td>
                    <td>本年
计划投资</td>
                    <td>本年完成投资</td>
					 <td>本月投资</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_type"]); ?>" name="invest_type"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_signasset"]); ?>" name="invest_signasset"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestall"]); ?>" name="invest_planinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestall"]); ?>" name="invest_completeinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestyear"]); ?>" name="invest_planinvestyear"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestyear"]); ?>" name="invest_completeinvestyear"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_month"]); ?>" name="invest_month"></td>
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
                    <td>计划</td>
                    <td><?php echo ($projectedite["build_plan_demolition"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_piling"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_excavate"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_pmz"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_cap"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_completion"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_device"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_partproduction"]); ?></td>
                    <td colspan="2"><?php echo ($projectedite["build_plan_allproduction"]); ?></td>
                </tr>
<!--                <tr>
                		<td>实际</td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_demolition"]); ?>" name="build_actual_demolition"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_piling"]); ?>" name="build_actual_piling"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_excavate"]); ?>" name="build_actual_excavate"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_pmz"]); ?>" name="build_actual_pmz"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_cap"]); ?>" name="build_actual_cap"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_completion"]); ?>" name="build_actual_completion"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_device"]); ?>" name="build_actual_device"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_partproduction"]); ?>" name="build_actual_partproduction"></td>
                		<td colspan="2"><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_allproduction"]); ?>" name="build_actual_allproduction"></td>
                </tr> -->
            </table>
          <!--  <button id="addNodeButtom" type="button" class="btn green" style="margin-top: 10px;">添加节点</button> -->
        </div>
<!--		        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>详细进展</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_jinzhan" id="content_jinzhan" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_jinzhan"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>	
				        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>存在问题</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_problem" id="content_problem" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_problem"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>
		<div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>市领导挂钩情况</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_leader" id="content_leader" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_leader"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div> -->
        <div>
            <table class="s-table" width="100%" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" >
                <caption>挂钩领导部门联系信息</caption>
                <tr>
                    <td rowspan="3" style="width: 10%">挂钩市领导</td>
                    <td colspan="2" style="width: 15%">姓名</td>
                    <td><?php echo ($projectedite["city_leader_name"]); ?></td>
                    <td style="width: 10%">职务</td>
                    <td><?php echo ($projectedite["city_leader_position"]); ?></td>
                </tr>
                <tr>
                    <td rowspan="2">联系人</td>
                    <td style="width: 10%">姓名</td>
                    <td><?php echo ($projectedite["city_contact_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["city_contact_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["city_contact_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["city_contact_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">市挂钩部门</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["city_department"]); ?></td>
                    <td>联系人职务</td>
                    <td><?php echo ($projectedite["city_department_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["city_department_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["city_department_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">责任主体</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["responsibility_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["responsibility_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["responsibility_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["responsibility_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" >责任主体重大办联系人</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["officemajor_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["officemajor_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["officemajor_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["officemajor_mail"]); ?></td>
                </tr>
            </table>
        </div>
    </div>
	<input type="hidden" class="normal" name="id" value="<?php echo ($projectedite["id"]); ?>">
   

												<div class="form-actions">

													<button type="submit" class="btn blue"><i class="icon-ok"></i> 修改</button>

													<button type="button" class="btn">取消</button>

												</div>
</form><?php endif; ?>





<!--部门操作地方 -->
<?php if($_SESSION['usertype'] == 2): ?><form action="__APP__/Project/bumenedite" method="post" accept-charset="utf-8">

    <div class="panes">
        <div>
        		<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="s-table">
						<caption>
								基本信息
								</caption>
        				<tr >
								<td width="12%">项目编码 <span class="required">*</span></td>
        						<td colspan="2"><?php echo ($projectedite["projectcoding"]); ?>								</td>
        						<td>类别<span class="required">*</span></td>
        						<td width="120">
								            <?php if($projectedite["citytype"] == 0): ?>区储备重大项目<?php endif; ?>
											<?php if($projectedite["citytype"] == 1): ?>市重大项目库项目<?php endif; ?>								</td>
        						<td width="10%">填报时间<span class="required">*</span></td>
        						<td><?php echo ($projectedite["created"]); ?>												 </td>
        						</tr>
						<tr class="even">
								<td>项目名称<span class="required">*</span></td>
								<td colspan="4"><?php echo ($projectedite["projectname"]); ?></td>
								<td>责任主体<span class="required">*</span></td>
								<td>部门：<?php echo ($projectedite["bumen"]); ?>　----　<?php echo ($projectedite["bumenwho"]); ?><BR />
								乡镇：<?php echo ($projectedite["xiangzhen"]); ?></td>
						</tr>
						<tr>
								<td rowspan="3">投资主体</td>
								<td colspan="6" style="width: 8%"><input type="text" class="normal" name="invest_name" value="<?php echo ($projectedite["invest_name"]); ?>" style="width:70%"/></td>
								</tr>
						<tr>
								<td style="width: 8%">负责人</td>
								<td><input type="text" class="normal" name="invest_leader_name" value="<?php echo ($projectedite["invest_leader_name"]); ?>"/></td>
								<td style="width: 8%">职务</td>
								<td><input type="text" class="normal" name="invest_leader_position" value="<?php echo ($projectedite["invest_leader_position"]); ?>"/></td>
								<td>联系方式</td>
								<td><input type="text" class="normal" name="invest_leader_phone" value="<?php echo ($projectedite["invest_leader_phone"]); ?>"/></td>
						</tr>
						<tr>
								<td style="width: 8%">联系人</td>
								<td><input type="text" class="normal" name="invest_linkman_name" value="<?php echo ($projectedite["invest_linkman_name"]); ?>"/></td>
								<td style="width: 8%">职务</td>
								<td><input type="text" class="normal" name="invest_linkman_position" value="<?php echo ($projectedite["invest_linkman_position"]); ?>"/></td>
								<td>联系方式</td>
								<td><input type="text" class="normal" name="invest_linkman_phone" value="<?php echo ($projectedite["invest_linkman_phone"]); ?>"/></td>
						</tr>
						<tr  class="even">
								<td>合作方</td>
								<td colspan="2"><input type="text" class="normal" name="partner" style="width:90%" value="<?php echo ($projectedite["partner"]); ?>"/></td>
								<td>用地
（亩）</td>
								<td><input type="text" class="normal" name="acreage" value="<?php echo ($projectedite["acreage"]); ?>"/></td>
								<td rowspan="3">被纳入省(部)
重大项目计划名称</td>
								<td rowspan="3"><?php echo ($projectedite["majorprojectname"]); ?></td>
						</tr>
						<tr>
								<td rowspan="2">合作院所</td>
								<td colspan="2" rowspan="2"><input type="text" class="normal" name="cooperation" style="width:90%" value="<?php echo ($projectedite["cooperation"]); ?>"/></td>
								<td>建筑面积（平方米)</td>
								<td><input type="text" class="normal" name="areraged" value="<?php echo ($projectedite["areraged"]); ?>"/></td>
								</tr>
		<tr><td>建设
地点</td>
						<td><input type="text" class="normal" name="address" value="<?php echo ($projectedite["address"]); ?>"/></td>
						</table>
        </div>
		
        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>项目建设内容</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="build_content" id="build_content" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["build_content"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>		
		        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">投产后效益（预计）</font></caption>
                <tr>
                    <td>年产值
(亿元)</td>
                    <td>年销售
(亿元)</td>
                    <td>年利税
(亿元)</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_output"]); ?>" name="benefit_output"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_sell"]); ?>" name="benefit_sell"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["benefit_taxes"]); ?>" name="benefit_taxes"></td>

                </tr>
            </table></td>
				<td width="50%"><table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                 <caption><font color="#000000">用工人数</font></caption>
                <tr>
                    <td>总数</td>
                    <td>博士</td>
                    <td>硕士</td>
                    <td>本科</td>
					<td>大专</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_all"]); ?>" name="officeworker_all" disabled="disabled"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_doctor"]); ?>" name="officeworker_doctor"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_master"]); ?>" name="officeworker_master"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_bachelor"]); ?>" name="officeworker_bachelor"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["officeworker_undergraduate"]); ?>" name="officeworker_undergraduate"></td>
                </tr>
            </table></td>
		</tr>
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
                    <td><?php echo ($projectedite["warehousing_time"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_citytime"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_newsignature"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_startwork"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_newcompletion"]); ?></td>
                    <td><?php echo ($projectedite["warehousing_production"]); ?></td>
                </tr>
            </table>
        </div>
        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>投资情况（亿元、亿美元）</caption>
                <tr>
                    <td>引资情况</td>
                    <td>注册
资本金</td>
                    <td>计划
总投资</td>
                    <td>累计完成投资</td>
                    <td>本年
计划投资</td>
                    <td>本年完成投资</td>
					 <td>本月投资</td>
                </tr>
                <tr>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_type"]); ?>" name="invest_type"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_signasset"]); ?>" name="invest_signasset"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestall"]); ?>" name="invest_planinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestall"]); ?>" name="invest_completeinvestall"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_planinvestyear"]); ?>" name="invest_planinvestyear"></td>
                    <td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_completeinvestyear"]); ?>" name="invest_completeinvestyear"></td>
					<td><input type="text" style="width:87%" class="normal" value="<?php echo ($projectedite["invest_month"]); ?>" name="invest_month"></td>
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
                    <td>计划</td>
                    <td><?php echo ($projectedite["build_plan_demolition"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_piling"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_excavate"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_pmz"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_cap"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_completion"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_device"]); ?></td>
                    <td><?php echo ($projectedite["build_plan_partproduction"]); ?></td>
                    <td colspan="2"><?php echo ($projectedite["build_plan_allproduction"]); ?></td>
                </tr>
<!--                <tr>
                		<td>实际</td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_demolition"]); ?>" name="build_actual_demolition"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_piling"]); ?>" name="build_actual_piling"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_excavate"]); ?>" name="build_actual_excavate"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_pmz"]); ?>" name="build_actual_pmz"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_cap"]); ?>" name="build_actual_cap"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_completion"]); ?>" name="build_actual_completion"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_device"]); ?>" name="build_actual_device"></td>
                		<td><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_partproduction"]); ?>" name="build_actual_partproduction"></td>
                		<td colspan="2"><input type="text" style="width:87%" class="normal datepicker" value="<?php echo ($projectedite["build_actual_allproduction"]); ?>" name="build_actual_allproduction"></td>
                </tr> -->
            </table>
          <!--  <button id="addNodeButtom" type="button" class="btn green" style="margin-top: 10px;">添加节点</button> -->
        </div>
<!--		        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>详细进展</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_jinzhan" id="content_jinzhan" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_jinzhan"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>	
				        <div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>存在问题</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_problem" id="content_problem" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_problem"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div>
		<div>
            <table class="s-table" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" width="100%">
                <caption>市领导挂钩情况</caption>
                <tr>
                    <td height="59" colspan="6" align="center"><label>
                    		<textarea name="content_leader" id="content_leader" cols="45" rows="5" style="width:96%"><?php echo ($projectedite["content_leader"]); ?></textarea>
                    </label></td>
                    </tr>
            </table>
        </div> -->
        <div>
            <table class="s-table" width="100%" border="1" cellspacing="1" bordercolor="#CCCCCC" cellpadding="0" >
                <caption>挂钩领导部门联系信息</caption>
                <tr>
                    <td rowspan="3" style="width: 10%">挂钩市领导</td>
                    <td colspan="2" style="width: 15%">姓名</td>
                    <td><?php echo ($projectedite["city_leader_name"]); ?></td>
                    <td style="width: 10%">职务</td>
                    <td><?php echo ($projectedite["city_leader_position"]); ?></td>
                </tr>
                <tr>
                    <td rowspan="2">联系人</td>
                    <td style="width: 10%">姓名</td>
                    <td><?php echo ($projectedite["city_contact_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["city_contact_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["city_contact_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["city_contact_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">市挂钩部门</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["city_department"]); ?></td>
                    <td>联系人职务</td>
                    <td><?php echo ($projectedite["city_department_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["city_department_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["city_department_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">责任主体</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["responsibility_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["responsibility_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["responsibility_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["responsibility_mail"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" >责任主体重大办联系人</td>
                    <td>名称</td>
                    <td><?php echo ($projectedite["officemajor_name"]); ?></td>
                    <td>职务</td>
                    <td><?php echo ($projectedite["officemajor_position"]); ?></td>
                </tr>
                <tr>
                    <td>联系方式</td>
                    <td><?php echo ($projectedite["officemajor_phone"]); ?></td>
                    <td>E-mail</td>
                    <td><?php echo ($projectedite["officemajor_mail"]); ?></td>
                </tr>
            </table>
        </div>
    </div>
	<input type="hidden" class="normal" name="id" value="<?php echo ($projectedite["id"]); ?>">
   

												<div class="form-actions">

													<button type="submit" class="btn blue"><i class="icon-ok"></i> 修改</button>

													<button type="button" class="btn">取消</button>

												</div>
</form><?php endif; ?>





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
                            '<td><input type="hidden" style="width:87%"  name="build[' + counttr+ '][name]">计划<\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_demolition]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_piling]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_excavate]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_pmz]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_cap]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_completion]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_device]"><\/td>' +
                            '<td><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_partproduction]"><\/td>' +
                            '<td width="100px"><input type="text" style="width:87%" name="build[' + counttr+ '][build_plan_allproduction]"><\/td>' +
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