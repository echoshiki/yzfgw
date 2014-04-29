<?php 
class Member_groupModel extends Model {
    // 自动验证
    protected $_validate = array(
        array('groupname', 'require', '请填写用户组名！', 1),
        array('groupname', '', '用户组名称已存在！', 1, 'unique', 3)
    );

    public function getGroupName($groupid){
    	$Group  	= D('Member_group');
    	$where  	= 'groupid="'.$groupid.'"';
    	$view 		= $Group->where($where)->find();
    	$groupname 	= $view['groupname'];
    	return $groupname;
    }


}


 ?>