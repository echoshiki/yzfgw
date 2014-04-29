<?php
class ProjectAction extends BaseAction{

	public function __construct(){
		parent::__construct();
	}
	//登入
	public function index(){

		$this->display();
		
	}

	
	//项目列表
	public function PList(){
     $prors=M("base");
	 import("ORG.Util.Page");
	 $listRows_order = 15;//指定每页分页数量
	 
	 $soso=$this->_GET('soso','trim');
	 if($soso=="soso"){
	 
	  $search_project=$this->_GET('search_project','trim');
	  $wheresoso=array(
	  'projectcoding'=>array("like","%".$search_project."%"),
	  'projectname'=>array("like","%".$search_project."%"),
	  '_logic' =>'or',
	  );
	  $count_pro=$prors->where($wheresoso)->count();//统计搜索匹配的总记录
	  $pro_key = new Page($count_pro,$listRows_order);
	  $projectall=$prors->where($wheresoso)->limit($pro_key->firstRow.','.$listRows_order)->order("id desc")->select();
	  $page_pro = $pro_key->show();
	  $this->assign("page_pro",$page_pro);//将分页写入模板 
	 }
	 else{
	    if ($_SESSION["usertype"]==2){
		$wherename["bumenwho"]=$_SESSION["name"];
	    $count_proso=$prors->where($wherename)->count();//统计部门下总记录
	    $pro_key_so = new Page($count_proso,$listRows_order);
	    $projectall=$prors->where($wherename)->limit($pro_key_so->firstRow.','.$listRows_order)->order("id desc")->select();
	    }
	    elseif($_SESSION["usertype"]==3){
		$wherenamexz["xiangzhenwhoadd"]=$_SESSION["name"];
	    $count_proso=$prors->where($wherenamexz)->count();//统计总记录
	    $pro_key_so = new Page($count_proso,$listRows_order);
	    $projectall=$prors->where($wherenamexz)->limit($pro_key_so->firstRow.','.$listRows_order)->order("id desc")->select();
	    }
	    else{
	    $count_proso=$prors->count();//统计总记录
	    $pro_key_so = new Page($count_proso,$listRows_order);
	    $projectall=$prors->limit($pro_key_so->firstRow.','.$listRows_order)->order("id desc")->select();
	    }
	    $page_pro_so = $pro_key_so->show();
	    $this->assign("page_pro",$page_pro_so);//将分页写入模板
	 }
	 

	 $this->assign("projectall",$projectall);//将变量值写到模板
	 $this->display("PList");
	}
	
	//月报列表
	public function MonthReportList(){
	 $prors=M("build");
	 import("ORG.Util.Page");
	 $listRows_order = 15;//指定每页分页数量
	 
	  $id = $this->_get('id','trim');
	  $whereyb=array(
	  'parentid'=>array("eq",$id),
	  );
	 
	 $count_proso=$prors->where($whereyb)->count();//统计总记录
	 $pro_key_so = new Page($count_proso,$listRows_order);
	 $projectall=$prors->where($whereyb)->limit($pro_key_so->firstRow.','.$listRows_order)->order("id desc")->select();
	 $page_pro_so = $pro_key_so->show();
	 $this->assign("page_pro",$page_pro_so);//将分页写入模板
	 $this->assign("projectall",$projectall);//将变量值写到模板
	 $this->display("MonthReportList");
	
	}
	
	//修改月报时读取数据
	public function PMRediter(){
	
	$id = $this->_GET('id','trim');
	$projectrs=M("build");
	$whereid=array(
	'id'=>array("EQ",$id),
	 );
	$projecteditemr=$projectrs->where($whereid)->order("id desc")->find();
	$this->assign("projecteditemr",$projecteditemr);//将变量值写到模板
	$this->display("PMRediter");
	
	}
	
		//删除月报
	public function project_MR_delete(){
	 $projmrdel=M("build");
	 $idmrdel = $this->_GET('id','trim');
	 $idmrdel=$projmrdel->delete($iddel);
	 if($idmrdel){
	 $this->success("月报删除成功");
	 }
	 else{
	 $this->error("月报删除失败");
	 }
	
	}
	
	//执行月报操作修改
	public function editemonthpreport(){
	 $prors=M("build");
	 $id = $this->_POST('id','trim');
	 $prodate['build_actual_demolition'] = $this->_post('build_actual_demolition','trim');
     $prodate['build_actual_piling'] = $this->_post('build_actual_piling','trim');
     $prodate['build_actual_excavate'] = $this->_post('build_actual_excavate','trim');
	 $prodate['build_actual_pmz'] = $this->_post('build_actual_pmz','trim');
     $prodate['build_actual_cap'] = $this->_post('build_actual_cap','trim');
     $prodate['build_actual_completion'] = $this->_post('build_actual_completion','trim');
	 $prodate['build_actual_device'] = $this->_post('build_actual_device','trim');
     $prodate['build_actual_partproduction'] = $this->_post('build_actual_partproduction','trim');
     $prodate['build_actual_allproduction'] = $this->_post('build_actual_allproduction','trim');
	 $prodate['content_jinzhan'] = $this->_post('content_jinzhan','trim');
  	 $prodate['content_problem'] = $this->_post('content_problem','trim');
	 $prodate['content_leader'] = $this->_post('content_leader','trim');
	 $pepe = $prors->where('id='.$id)->data($prodate)->save(); // 根据条件保存修改的数据
	 
	 if($pepe){
	 $this->success("月报修改成功");
	 }
	 else{
	 $this->error("月报修改失败");
	 }
	
	}
	
	//重大办发布项目
	public function add(){
        $reg=M("base");
		if($_POST['projectname']==""){
			$this->error("项目名称不能为空");
		}
		if($_POST['created']==""){
			$this->error("填报时间不能为空");
		}

		if($_POST['responsibility']==""){
			$this->error("责任主体不能为空");
		}
		
	  $rs_c=$reg->add($_POST);
	  if($rs_c){
	  $this->success("项目发布成功");
	  }
	  else{
	    $this->error("项目发布失败");
	  }
	}
	
	//修改项目时读取数据
	public function Pediter(){
	$projectrs=M("base");
	$id = $this->_GET('id','trim');
	$whereid=array(
	'id'=>array("EQ",$id),
	 );
	$projectedite=$projectrs->where($whereid)->order("id desc")->find();
	$this->assign("projectedite",$projectedite);//将变量值写到模板
	
	
	//二级联动开始
			//读取部门分类
		$sw_s=M("member_group");
		$swclass=$sw_s->field("groupid,groupname")->where("pid=2")->order("groupid desc")->select();
		$this->assign("swclass",$swclass);
	
	
	    //读取分类里的具体用户
		  $p_sme=M("member");
	      $ddd= array();
		  foreach($swclass as $k=>$v){
		  	  $groupidid=array(
				'groupid'=>array("eq",$v['groupid']),
			  );
			  $lingbumen=$p_sme->where($groupidid)->select();
			//echo $p_sme->getLastSql();
			// exit;
			$ddd[$v['groupid']] = $lingbumen;
			$groupidid = '';
           
		  }
          $this->assign("shangwu_small",$ddd);
		  
	    //读取乡镇分类
		$xzclass=$sw_s->field("groupid,groupname")->where("pid=3")->order("groupid desc")->select();
		$this->assign("xzclass",$xzclass);
	//二级联动结束

	
	$this->display("Pediter");
	}
	
	//写月报时读取数据
	public function MonthReport(){
	$projectrs=M("base");
	$id = $this->_GET('id','trim');
	$whereid=array(
	'id'=>array("EQ",$id),
	 );
	$projectmonth=$projectrs->where($whereid)->order("id desc")->find();
	$this->assign("projectedite",$projectmonth);//将变量值写到模板
	$this->display("MonthReport");
	}
	
	
	
	//乡镇街道添加月报
	public function addmonthpreport(){
	  $reg=M("build");
	  $_POST['build_addtime'] =  time();
	  $rs_c=$reg->add($_POST);
	  if($rs_c){
	  $this->success("月报发布成功");
	  }
	  else{
	    $this->error("月报发布失败");
	  }
	}
	
	
	//区重大办操作修改
	public function doedite(){
	 $projectrs=M("base");
	 $id = $this->_post('id','trim');
	 
	 //基本信息
	 $prodate['citytype'] = $this->_post('citytype','trim');
     $prodate['created'] = $this->_post('created','trim');
     $prodate['projectname'] = $this->_post('projectname','trim');
	 
	 if($this->_post('bumen','trim')!="指派部门"){
  	 $prodate['bumen'] = $this->_post('bumen','trim');
	 }
	 if($this->_post('bumenwho','trim')!="指派人"){
     $prodate['bumenwho'] = $this->_post('bumenwho','trim');
	 }
	 $prodate['xiangzhen'] = $this->_post('xiangzhen','trim');
	 $prodate['invest_linkman_name'] = $this->_post('invest_linkman_name','trim');
     $prodate['invest_linkman_position'] = $this->_post('invest_linkman_position','trim');
     $prodate['invest_linkman_phone'] = $this->_post('invest_linkman_phone','trim');
	 $prodate['partner'] = $this->_post('partner','trim');
     $prodate['cooperation'] = $this->_post('cooperation','trim');
     $prodate['projecttype'] = $this->_post('projecttype','trim');
	 $prodate['majorprojectname'] = $this->_post('majorprojectname','trim');
	 
	 //项目入库和市认定情况
	 $prodate['warehousing_time'] = $this->_post('warehousing_time','trim');
     $prodate['warehousing_citytime'] = $this->_post('warehousing_citytime','trim');
     $prodate['warehousing_newsignature'] = $this->_post('warehousing_newsignature','trim');
	 $prodate['warehousing_startwork'] = $this->_post('warehousing_startwork','trim');
     $prodate['warehousing_newcompletion'] = $this->_post('warehousing_newcompletion','trim');
     $prodate['warehousing_production'] = $this->_post('warehousing_production','trim');	 

     //建设时序计划完成情况*
	 $prodate['build_plan_demolition'] = $this->_post('build_plan_demolition','trim');
     $prodate['build_plan_piling'] = $this->_post('build_plan_piling','trim');
     $prodate['build_plan_excavate'] = $this->_post('build_plan_excavate','trim');
	 $prodate['build_plan_pmz'] = $this->_post('build_plan_pmz','trim');
     $prodate['build_plan_cap'] = $this->_post('build_plan_cap','trim');
     $prodate['build_plan_completion'] = $this->_post('build_plan_completion','trim');	
	 $prodate['build_plan_device'] = $this->_post('build_plan_device','trim');
     $prodate['build_plan_partproduction'] = $this->_post('build_plan_partproduction','trim');
     $prodate['build_plan_allproduction'] = $this->_post('build_plan_allproduction','trim');
	 
	 //挂钩领导部门联系信息*
	 $prodate['city_leader_name'] = $this->_post('city_leader_name','trim');
     $prodate['city_leader_position'] = $this->_post('city_leader_position','trim');
     $prodate['city_contact_name'] = $this->_post('city_contact_name','trim');
	 $prodate['city_contact_position'] = $this->_post('city_contact_position','trim');
     $prodate['city_contact_phone'] = $this->_post('city_contact_phone','trim');
     $prodate['city_contact_mail'] = $this->_post('city_contact_mail','trim');	
	 $prodate['city_department'] = $this->_post('city_department','trim');
     $prodate['city_department_position'] = $this->_post('city_department_position','trim');
     $prodate['city_department_phone'] = $this->_post('city_department_phone','trim');
	 $prodate['city_department_mail'] = $this->_post('city_department_mail','trim');
     $prodate['responsibility_name'] = $this->_post('responsibility_name','trim');
     $prodate['responsibility_position'] = $this->_post('responsibility_position','trim');
	 $prodate['responsibility_phone'] = $this->_post('responsibility_phone','trim');
     $prodate['responsibility_mail'] = $this->_post('responsibility_mail','trim');
     $prodate['officemajor_name'] = $this->_post('officemajor_name','trim');	
	 $prodate['officemajor_position'] = $this->_post('officemajor_position','trim');
     $prodate['officemajor_phone'] = $this->_post('officemajor_phone','trim');
     $prodate['officemajor_mail'] = $this->_post('officemajor_mail','trim');
	 
	 //修改乡镇发布的信息
	 $prodate['invest_name'] = $this->_post('invest_name','trim');
     $prodate['invest_leader_name'] = $this->_post('invest_leader_name','trim');
	 $prodate['invest_leader_position'] = $this->_post('invest_leader_position','trim');
     $prodate['invest_leader_phone'] = $this->_post('invest_leader_phone','trim');
	 $prodate['acreage'] = $this->_post('acreage','trim');
     $prodate['areraged'] = $this->_post('areraged','trim');
	 $prodate['address'] = $this->_post('address','trim');
	 
	 $prodate['build_content'] = $this->_post('build_content','trim');
	 $prodate['benefit_output'] = $this->_post('benefit_output','trim');
	 $prodate['benefit_sell'] = $this->_post('benefit_sell','trim');
	 $prodate['benefit_taxes'] = $this->_post('benefit_taxes','trim');
	 
	 $prodate['officeworker_all'] = intval($this->_post('officeworker_doctor','trim')) + intval($this->_post('officeworker_master','trim')) + intval($this->_post('officeworker_bachelor','trim')) + intval($this->_post('officeworker_undergraduate','trim'));
	 $prodate['officeworker_doctor'] = $this->_post('officeworker_doctor','trim');
	 $prodate['officeworker_master'] = $this->_post('officeworker_master','trim');
	 $prodate['officeworker_bachelor'] = $this->_post('officeworker_bachelor','trim');
	 $prodate['officeworker_undergraduate'] = $this->_post('officeworker_undergraduate','trim');

	 $prodate['invest_type'] = $this->_post('invest_type','trim');
	 $prodate['invest_signasset'] = $this->_post('invest_signasset','trim');
	 $prodate['invest_planinvestall'] = $this->_post('invest_planinvestall','trim');
	 $prodate['invest_completeinvestall'] = $this->_post('invest_completeinvestall','trim');
	 $prodate['invest_planinvestyear'] = $this->_post('invest_planinvestyear','trim');
	 $prodate['invest_completeinvestyear'] = $this->_post('invest_completeinvestyear','trim');
	 $prodate['invest_month'] = $this->_post('invest_month','trim');
	 
	 /*
	 $prodate['build_actual_demolition'] = $this->_post('build_actual_demolition','trim');
	 $prodate['build_actual_piling'] = $this->_post('build_actual_piling','trim');
	 $prodate['build_actual_excavate'] = $this->_post('build_actual_excavate','trim');
	 $prodate['build_actual_pmz'] = $this->_post('build_actual_pmz','trim');
	 $prodate['build_actual_cap'] = $this->_post('build_actual_cap','trim');
	 $prodate['build_actual_completion'] = $this->_post('build_actual_completion','trim');
	 $prodate['build_actual_device'] = $this->_post('build_actual_device','trim');
	 $prodate['build_actual_partproduction'] = $this->_post('build_actual_partproduction','trim');
	 $prodate['build_actual_allproduction'] = $this->_post('build_actual_allproduction','trim');
	 
	 $prodate['content_jinzhan'] = $this->_post('content_jinzhan','trim');
	 $prodate['content_problem'] = $this->_post('content_problem','trim');
	 $prodate['content_leader'] = $this->_post('content_leader','trim');*/
	 
	 $prodate['status'] = 1;
	 
	 $pe = $projectrs->where('id='.$id)->data($prodate)->save(); // 根据条件保存修改的数据
	 if($pe){
	 $this->success("项目修改成功");
	 }
	 else{
	 $this->error("项目修改失败");
	 }
	}
	
	//乡镇街道操作修改
	public function xiangzhenedite(){
    
	 $projecxz=M("base");
	 $idxz = $this->_post('id','trim');

	 $prodate['invest_name'] = $this->_post('invest_name','trim');
     $prodate['invest_leader_name'] = $this->_post('invest_leader_name','trim');
	 $prodate['invest_leader_position'] = $this->_post('invest_leader_position','trim');
     $prodate['invest_leader_phone'] = $this->_post('invest_leader_phone','trim');
	 $prodate['invest_linkman_name'] = $this->_post('invest_linkman_name','trim');
     $prodate['invest_linkman_position'] = $this->_post('invest_linkman_position','trim');
	 $prodate['invest_linkman_phone'] = $this->_post('invest_linkman_phone','trim');
     $prodate['partner'] = $this->_post('partner','trim');
	 $prodate['acreage'] = $this->_post('acreage','trim');
     $prodate['cooperation'] = $this->_post('cooperation','trim');
     $prodate['areraged'] = $this->_post('areraged','trim');
	 $prodate['address'] = $this->_post('address','trim');
	 
	 $prodate['build_content'] = $this->_post('build_content','trim');
	 $prodate['benefit_output'] = $this->_post('benefit_output','trim');
	 $prodate['benefit_sell'] = $this->_post('benefit_sell','trim');
	 $prodate['benefit_taxes'] = $this->_post('benefit_taxes','trim');
	 
	 $prodate['officeworker_all'] = intval($this->_post('officeworker_doctor','trim')) + intval($this->_post('officeworker_master','trim')) + intval($this->_post('officeworker_bachelor','trim')) + intval($this->_post('officeworker_undergraduate','trim'));
	 $prodate['officeworker_doctor'] = $this->_post('officeworker_doctor','trim');
	 $prodate['officeworker_master'] = $this->_post('officeworker_master','trim');
	 $prodate['officeworker_bachelor'] = $this->_post('officeworker_bachelor','trim');
	 $prodate['officeworker_undergraduate'] = $this->_post('officeworker_undergraduate','trim');

	 $prodate['invest_type'] = $this->_post('invest_type','trim');
	 $prodate['invest_signasset'] = $this->_post('invest_signasset','trim');
	 $prodate['invest_planinvestall'] = $this->_post('invest_planinvestall','trim');
	 $prodate['invest_completeinvestall'] = $this->_post('invest_completeinvestall','trim');
	 $prodate['invest_planinvestyear'] = $this->_post('invest_planinvestyear','trim');
	 $prodate['invest_completeinvestyear'] = $this->_post('invest_completeinvestyear','trim');
	 $prodate['invest_month'] = $this->_post('invest_month','trim');
	 
	 /* 
   	 $prodate['build_actual_demolition'] = $this->_post('build_actual_demolition','trim');
	 $prodate['build_actual_piling'] = $this->_post('build_actual_piling','trim');
	 $prodate['build_actual_excavate'] = $this->_post('build_actual_excavate','trim');
	 $prodate['build_actual_pmz'] = $this->_post('build_actual_pmz','trim');
	 $prodate['build_actual_cap'] = $this->_post('build_actual_cap','trim');
	 $prodate['build_actual_completion'] = $this->_post('build_actual_completion','trim');
	 $prodate['build_actual_device'] = $this->_post('build_actual_device','trim');
	 $prodate['build_actual_partproduction'] = $this->_post('build_actual_partproduction','trim');
	 $prodate['build_actual_allproduction'] = $this->_post('build_actual_allproduction','trim');
	 
	 $prodate['content_jinzhan'] = $this->_post('content_jinzhan','trim');
	 $prodate['content_problem'] = $this->_post('content_problem','trim');
	 $prodate['content_leader'] = $this->_post('content_leader','trim');*/
	 
	 $prodate['status'] = 3;
	 
	 $pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	 if($pexz){
	 $this->success("项目完善成功");
	 }
	 else{
	 $this->error("项目完善失败");
	 }

	}
	
	//部门操作修改
	public function bumenedite(){
    
	 $projecxz=M("base");
	 $idxz = $this->_post('id','trim');

	 $prodate['invest_name'] = $this->_post('invest_name','trim');
     $prodate['invest_leader_name'] = $this->_post('invest_leader_name','trim');
	 $prodate['invest_leader_position'] = $this->_post('invest_leader_position','trim');
     $prodate['invest_leader_phone'] = $this->_post('invest_leader_phone','trim');
	 $prodate['invest_linkman_name'] = $this->_post('invest_linkman_name','trim');
     $prodate['invest_linkman_position'] = $this->_post('invest_linkman_position','trim');
	 $prodate['invest_linkman_phone'] = $this->_post('invest_linkman_phone','trim');
     $prodate['partner'] = $this->_post('partner','trim');
	 $prodate['acreage'] = $this->_post('acreage','trim');
     $prodate['cooperation'] = $this->_post('cooperation','trim');
     $prodate['areraged'] = $this->_post('areraged','trim');
	 $prodate['address'] = $this->_post('address','trim');
	 
	 $prodate['build_content'] = $this->_post('build_content','trim');
	 $prodate['benefit_output'] = $this->_post('benefit_output','trim');
	 $prodate['benefit_sell'] = $this->_post('benefit_sell','trim');
	 $prodate['benefit_taxes'] = $this->_post('benefit_taxes','trim');
	 
	 $prodate['officeworker_all'] = intval($this->_post('officeworker_doctor','trim')) + intval($this->_post('officeworker_master','trim')) + intval($this->_post('officeworker_bachelor','trim')) + intval($this->_post('officeworker_undergraduate','trim'));
	 $prodate['officeworker_doctor'] = $this->_post('officeworker_doctor','trim');
	 $prodate['officeworker_master'] = $this->_post('officeworker_master','trim');
	 $prodate['officeworker_bachelor'] = $this->_post('officeworker_bachelor','trim');
	 $prodate['officeworker_undergraduate'] = $this->_post('officeworker_undergraduate','trim');

	 $prodate['invest_type'] = $this->_post('invest_type','trim');
	 $prodate['invest_signasset'] = $this->_post('invest_signasset','trim');
	 $prodate['invest_planinvestall'] = $this->_post('invest_planinvestall','trim');
	 $prodate['invest_completeinvestall'] = $this->_post('invest_completeinvestall','trim');
	 $prodate['invest_planinvestyear'] = $this->_post('invest_planinvestyear','trim');
	 $prodate['invest_completeinvestyear'] = $this->_post('invest_completeinvestyear','trim');
	 $prodate['invest_month'] = $this->_post('invest_month','trim');
	 
	 $prodate['build_actual_demolition'] = $this->_post('build_actual_demolition','trim');
	 $prodate['build_actual_piling'] = $this->_post('build_actual_piling','trim');
	 $prodate['build_actual_excavate'] = $this->_post('build_actual_excavate','trim');
	 $prodate['build_actual_pmz'] = $this->_post('build_actual_pmz','trim');
	 $prodate['build_actual_cap'] = $this->_post('build_actual_cap','trim');
	 $prodate['build_actual_completion'] = $this->_post('build_actual_completion','trim');
	 $prodate['build_actual_device'] = $this->_post('build_actual_device','trim');
	 $prodate['build_actual_partproduction'] = $this->_post('build_actual_partproduction','trim');
	 $prodate['build_actual_allproduction'] = $this->_post('build_actual_allproduction','trim');
	 
	 $prodate['content_jinzhan'] = $this->_post('content_jinzhan','trim');
	 $prodate['content_problem'] = $this->_post('content_problem','trim');
	 $prodate['content_leader'] = $this->_post('content_leader','trim');
	 
	 $prodate['status'] = 2;
	 
	 $pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	 if($pexz){
	 $this->success("项目完善成功");
	 }
	 else{
	 $this->error("项目完善失败");
	 }

	}	
	
	//删除重大办发布的项目
	public function project_delete(){
	 $projecdel=M("base");
	 $iddel = $this->_GET('id','trim');
	 $rsdel=$projecdel->delete($iddel);
	 if($rsdel){
	 $this->success("项目删除成功");
	 }
	 else{
	 $this->error("项目删除失败");
	 }
	}
	
	//部门月报审核
	public function Shenhebumen(){
	$projecxz=M("build");
	$idxz = $this->_GET('id','trim');
	
	$pexzfind = $projecxz->where('id='.$idxz)->field('ischeckbm')->find();
	$ischeckbm=$pexzfind["ischeckbm"];//读出数据库里的ischeckbm的值
	
	$prodate['ischeckbm'] = abs($ischeckbm-1);
	$pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	
	 if($pexz){
	 $this->success("操作成功");
	 }
	 else{
	 $this->error("操作失败");
	 }
	}

    //重大办月报审核
	public function Shenhezdb(){
	$projecxz=M("build");
	$idxz = $this->_GET('id','trim');
	
	$pexzfind = $projecxz->where('id='.$idxz)->field('ischeckzd')->find();
	$ischeckzd=$pexzfind["ischeckzd"];//读出数据库里的ischeckbm的值
	
	$prodate['ischeckzd'] = abs($ischeckzd-1);
	$pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	
	 if($pexz){
	 $this->success("操作成功");
	 }
	 else{
	 $this->error("操作失败");
	 }
	}
	
	    //重大办项目审核
	public function Shenhezdbxm(){
	$projecxz=M("base");
	$idxz = $this->_GET('id','trim');
	
	$pexzfind = $projecxz->where('id='.$idxz)->field('ischeckzd')->find();
	$ischeckzd=$pexzfind["ischeckzd"];//读出数据库里的ischeckbm的值
	
	$prodate['ischeckzd'] = abs($ischeckzd-1);
	$pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	
	 if($pexz){
	 $this->success("操作成功");
	 }
	 else{
	 $this->error("操作失败");
	 }
	}
	
		//部门项目审核
	public function Shenhebumenxm(){
	$projecxz=M("base");
	$idxz = $this->_GET('id','trim');
	
	$pexzfind = $projecxz->where('id='.$idxz)->field('ischeckbm')->find();
	$ischeckbm=$pexzfind["ischeckbm"];//读出数据库里的ischeckbm的值
	
	$prodate['ischeckbm'] = abs($ischeckbm-1);
	$pexz = $projecxz->where('id='.$idxz)->data($prodate)->save(); // 根据条件保存修改的数据
	
	 if($pexz){
	 $this->success("操作成功");
	 }
	 else{
	 $this->error("操作失败");
	 }
	}
	
	//部门分类调用
	public function create(){
	     
		//读取部门分类
		$sw_s=M("member_group");
		$swclass=$sw_s->field("groupid,groupname")->where("pid=2")->order("groupid desc")->select();
		$this->assign("swclass",$swclass);
	
	
	    //读取分类里的具体用户
		  $p_sme=M("member");
	      $ddd= array();
		  foreach($swclass as $k=>$v){
		  	  $groupidid=array(
				'groupid'=>array("eq",$v['groupid']),
			  );
			  $lingbumen=$p_sme->where($groupidid)->select();
			//echo $p_sme->getLastSql();
			// exit;
			$ddd[$v['groupid']] = $lingbumen;
			$groupidid = '';
           
		  }
          $this->assign("shangwu_small",$ddd);
		  
	    //读取乡镇分类
		$xzclass=$sw_s->field("groupid,groupname")->where("pid=3")->order("groupid desc")->select();
		$this->assign("xzclass",$xzclass);
		$this->display("create");
		

	}
	
}
?>