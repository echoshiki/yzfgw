<?php

class MemberAction extends BaseAction{

	public function __construct(){
		parent::__construct();
	}
	//登入
	public function index(){
		$this->display();
	}
	
}