<?php

class MemberAction extends BaseAction{

	public function __construct(){
		parent::__construct();
	}
	//登入
	public function index(){

		$this->display();
	}

	public function member_list(){
		$Member = D('Member');
		$Group = D('Member_group');
		import('ORG.Util.Page');// 导入分页类
		$gid 	= $this->_param('gid');
		$type   = $this->_param('type');
		$group  = $_SESSION['usertype'];

		$where = "usertype>='".$group."'";
		
		//如果URL地址存在分组参数则添加筛选条件
		if ($gid) { $where .= " AND groupid='".$gid."'"; }
		if ($type) { $where .= " AND usertype='".$type."'";	}

		$count	= $Member->count();// 查询满足要求的总记录数
		$Page   = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show   = $Page->show();// 分页显示输出
		
		$list 	= $Member->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($list as $key => $value) {
			$usertype = $value['usertype'];
			$groupid  = $value['groupid'];
			$list[$key]['typename'] = $Group->getGroupName($usertype);
			$list[$key]['groupname'] = $Group->getGroupName($groupid);
		}

		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display('list');
	}

	public function member_view(){
		$Member = D('Member');
		$Group  = D('Member_group');
		$id 	= $this->_param('id');
		$where  = 'userid="'.$id.'"';
		$view 	= $Member->where($where)->find();
		$view['typename'] 	= $Group->getGroupName($view['usertype']);
		$view['groupname'] 	= $Group->getGroupName($view['groupid']);
		

		$this->assign('view',$view);
		$this->display('view');
	}

	public function member_create(){
		$Member = D('Member');
		if ($this->_param('submit')) {
			$postArr = $this->_param();
			$result = $Member->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Member->getError());
			 }else{
			 	$id 	= $postArr['userid'];
			 	$where  = 'userid="'.$id.'"';
				$postArr['password'] = md5(md5($postArr['password']));	
				$postArr['registered'] = date('Y-m-d H:i:s',time());
			 	$data 	= $postArr;
			    $Member->add($data); 
			    $this->success('用户创建成功', U('Member/member_list'));
			 }
		}else{
			$Group 	= D('Member_group');
			if ($_GET['gid']) {
				$gid = $_GET['gid'];
				if ($gid == 0) {
					return false;
				}
				$where	= 'pid="'.$gid.'"';
				$child  = $Group->where($where)->select();
				foreach ($child as $key => $value) {
					$selstr .= "<option value='".$value['groupid']."'>";
					$selstr .= $value['groupname'];
					$selstr .= "</option>";
				}
				echo $selstr;
			}else{			
				$group  = $_SESSION['usertype'];
			 	$where	= 'pid=0 AND groupid>="'.$group.'"';	
			 	
			 	$list   = $Group->where($where)->select();
				$this->assign('list',$list);
				$this->display('create');
			}	
			
		}		
	}

	public function member_edit(){
		$Member = D('Member');
		$id 	= $this->_param('id');
		$where  = 'userid="'.$id.'"';
		if ($this->_param('submit')) {
			$postArr = $this->_param();
			$validate = array(
		        array('email', 'require', '请填写邮箱！', 1),
		        array('email', '', '邮箱已注册！', 1, 'unique', 3),
		        array('username', 'require', '请填写用户名！', 1),
		        array('repassword', 'password', '密码不一致！', 1, 'confirm'),
		        array('username', '', '账号名称已存在！', 1, 'unique', 3)
			 );
			$Member-> setProperty("_validate",$validate);
			$result = $Member->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Member->getError());
			 }else{
			 	$id 	= $postArr['userid'];
			 	$where  = 'userid="'.$id.'"';
			 	if ($postArr['password'] == '') {
			 		unset($postArr['password']);
			 	}else{
			 		$postArr['password'] = md5(md5($postArr['password']));
			 	}	
			 	$data 	= $postArr;
			    $Member->where($where)->save($data); 
			    $this->success('用户编辑成功', $_SERVER['HTTP_REFERER']);
			 }
		}else{
			$Group 	= D('Member_group');
			$group  = $_SESSION['usertype'];
			if ($_GET['gid']) {
				$gid = $_GET['gid'];
				if ($gid == 0) {
					return false;
				}
				$where	= 'pid="'.$gid.'"';
				$child  = $Group->where($where)->select();
				foreach ($child as $key => $value) {
					$selstr .= "<option value='".$value['groupid']."'>";
					$selstr .= $value['groupname'];
					$selstr .= "</option>";
				}
				echo $selstr;
			}else{
				//获取用户详细数据
				$view 	= $Member->where($where)->find();
				//获取低于登陆用户权限的用户组列表
				$where	= 'pid=0 AND groupid>="'.$group.'"';	
				$list   = $Group->where($where)->select();
				//获取相对于已选择的一级权限的二级权限列表
				$usertype	= $view['usertype'];
				$where  	= 'pid="'.$usertype.'" AND groupid!=0';
				$listChild	= $Group->where($where)->select();

				$this->assign('view',$view);
				$this->assign('list',$list);
				$this->assign('listChild',$listChild);		
				$this->display('edit');
			}
		}		
	}

	public function member_del(){
		$Member = D('Member');
		$id 	= $this->_param('id');
		if ($id == '') {
			$this->error("请选择要删除的用户。");
		}
		$idArr  = explode(',',$id);
		$num 	= count($idArr) - 1;
		foreach ($idArr as $key => $value) {
			$where  = 'userid="'.$value.'"';
			$Member->where($where)->delete();

		}
		$this->success('删除用户成功', U('Member/member_list'));
	}

	public function member_group(){
		$Group 	= D('Member_group');
		$pid 	= $this->_param('id');
		$pid    = !isset($pid) ? '0' : $pid;
		$group  = $_SESSION['usertype'];
		$where  = 'groupid>="'.$group.'" AND pid="'.$pid.'"';

		$list 	= $Group->where($where)->select();

		$this->assign('list',$list);
		$this->display('group_list');
	}

	public function member_group_create(){
		$Group 	= D('Member_group');
		if ($this->_param('submit')) {
			$postArr = $this->_param();
			$result  = $Group->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Group->getError());
			 }else{
			 	if ($postArr['pid'] == 0) {
			 		$this->error('操作不合法');
			 	}
			 	$data 	= $postArr;
			    $Group->add($data); 
			    $this->success('用户创建成功', U('Member/member_group'));
			 }
		}else{		
			$group  = $_SESSION['usertype'];
		 	$where	= 'pid=0 AND groupid>="'.$group.'"';	
	
			$list   = $Group->where($where)->select();
			$this->assign('list',$list);
			$this->display('group_create');
		}		
	}

	public function member_group_del(){
		$Group 	= D('Member_group');
		$Member = D('Member');
		$id 	= $this->_param('id');
		if ($id == '') {
			$this->error("请选择要删除的用户组。");
		}
		$idArr  = explode(',',$id);
		$num 	= count($idArr) - 1;
		foreach ($idArr as $key => $value) {
			$where 	= 'usertype="'.$value.'"';
			$count = $Member->where($where)->count();
			if($count!=0){
				$this->error("所选用户组存在组员，请手动删除组员之后在删除用户组。");
			}
			$where  = 'groupid="'.$value.'"';
			$Group->where($where)->delete();
		}
		$this->success('删除用户成功', U('Member/member_list'));
	}

	public function member_group_edit(){
		$Group  = D('Member_group');
		$id 	= $this->_param('id');
		if ($this->_param('submit')) {
			$postArr  = $this->_param();
			$validate = array(
		        array('groupname', 'require', '请填写用户名！', 1),
		        array('groupname', '', '账号名称已存在！', 1, 'unique', 3));
			$Group->setProperty("_validate",$validate);
			$result = $Group->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Group->getError());
			 }else{
			 	$id 	= $postArr['groupid'];
			 	$where  = 'groupid="'.$id.'"';
			 	$data 	= $postArr;
			    $Group->where($where)->save($data); 
			    $this->success('用户组编辑成功', $_SERVER['HTTP_REFERER']);
			 }
		}else{
			$where  = 'groupid="'.$id.'"';
			$view 	= $Group->where($where)->find();
			$this->assign('view',$view);		
			$this->display('group_edit');
		}		
	}
}


?>