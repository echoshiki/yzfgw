<?php
Load('extend');
import('ORG.Util.Page');
class BaseAction extends Action{

	public $userId = '';
	public $userName = '';

	public function __construct(){
		parent::__construct();
		if(session('userid')=='' || session('username')=='')
		{
			$this->error('哎呀,我不记得您了,可以再告诉我一次么...',U('Index/index'));
		}else{
			$this->userId = session('userid');
			$this->userName = session('username');
		}
	}




}











?>