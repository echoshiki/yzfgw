<?php

class IndexAction extends Action{
	//登入
	public function index(){
		if(IS_POST){
			$member_model= M('member');
			
			$usertype = $this->_post('usertype','trim');
			if($usertype==""){
				$this->error('请选择登陆类型');
			}
			else{
			   $fidwhere=array(
		       'username'=>array("EQ",$this->_post('username','trim')),
		       'usertype'=>array("EQ",$usertype),
		       '_logic'=>"and",
	           );

			  $checkData = $member_model->where($fidwhere)->find();
			
			  if(empty($checkData)){
				$this->error('用户帐号不存在或者用户类型不对,请查证');
			  }
			  
			  $password = $this->_post('password','trim');
			  if($checkData['password']!=md5(md5($password))){
				$this->error('密码错误,请正确输入');
			  }
			  session('name',$checkData['name']);
              session('usertype',$checkData['usertype']);
			  session('userid',$checkData['userid']);
			  session('username',$checkData['username']);
			  $this->success('登入成功',U('Index/Agent'));
			}
		}else{
			$this->display();
		}
		
	}
	
	
	public function logout(){
		session(null);
		session_destroy();
		unset($_SESSION);
		session('agentid',null);
		session('agentname',null);
		session('agentlevel',null);
		$this->success('您已成功退出！',U('Index/index'));
	}
	

	

}