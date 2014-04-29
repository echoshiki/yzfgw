<?php 
class MemberModel extends Model {

    // 自动验证
    protected $_validate = array(
        array('email', 'require', '请填写邮箱！', 1),
        array('email', '', '邮箱已注册！', 1, 'unique', 3),
        array('username', 'require', '请填写用户名！', 1),
        array('password', 'require', '请填写用户密码！', 1),
        array('repassword', 'require', '请填写确认密码！', 1),
        array('repassword', 'password', '密码不一致！', 1, 'confirm'),
        array('username', '', '账号名称已存在！', 1, 'unique', 3)
    );

    // 注册完成后，获取用户完整信息
    public function getUserInfo( $map = array() ) {
        $user = $this->join('JOIN '.$this->tablePrefix.'user_group USING (group_id)')->where($map)->find();
        return $user;
    }

    // 验证用户是否存在
    public function is_exist($username, $password){
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $user = $this->join('JOIN '.$this->tablePrefix.'user_group USING (group_id)')->where($where)->find();
        return $user;
    }

    public function getUsertype($usertype){
    	switch ($usertype) {
    		case '2':
    			return "部门";
    			break;
     		case '1':
    			return "重大办";
    			break;
    		case '3':
    			return "乡镇街道";
    			break;
    		default:
    			return "未定义";
    			break;
    	}
    }

}




 ?>