<?php

class AgentAction extends BaseAction{
	public function __construct(){
		parent::__construct();
	}

	public function myInfo(){
		$Member  = D('Member');
		$userid  = $_SESSION['userid'];
		
		if ($this->_param('submit')) {
			$postArr = $this->_param();
			$validate = array(
		        array('email', 'require', '请填写邮箱！', 1),
		        array('email', '', '邮箱已注册！', 1, 'unique', 3),
			 );
			$Member-> setProperty("_validate",$validate);
			$result = $Member->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Member->getError());
			 }else{
			 	$id 	= $postArr['userid'];
			 	$where  = 'userid="'.$id.'"';	
			 	$data 	= $postArr;
			    $Member->where($where)->save($data); 
			    $this->success('用户编辑成功', $_SERVER['HTTP_REFERER']);
			 }
		}else{
			$where   = 'userid="'.$userid.'"';
			$view    = $Member->where($where)->find();
			$this->assign('view',$view);
			$this->display('myinfo');
		}
	}

	public function editPassword(){
		$Member  = D('Member');
		$userid  = $_SESSION['userid'];
		
		if ($this->_param('submit')) {
			$postArr = $this->_param();
			$validate = array(
				array('oldpassword', 'require', '请填写旧密码！', 1),
				array('password', 'require', '请填写新密码！', 1),
		        array('repassword', 'password', '两次输入的密码不一致！', 1, 'confirm')
			 );
			$Member-> setProperty("_validate",$validate);
			$result = $Member->create();
			 if (!$result){
			    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    $this->error($Member->getError());
			 }else{
			 	$id 	= $userid;
			 	$where  = 'userid="'.$id.'"';
			 	$data 	= $postArr;
			 	$view   = $Member->where($where)->find();
			 	$str    = md5(md5($data['oldpassword']));
			 	if ($str == $view['password']) {
			 		$data['password'] = md5(md5($data['password']));
			 	 	$Member->where($where)->save($data); 
			    	$this->success('密码修改成功', $_SERVER['HTTP_REFERER']);
			 	}else{
			 		$this->error("旧密码输入错误。");
			 	}
			 }
		}else{
			$this->display('editpassword');
		}

	}


}

?>