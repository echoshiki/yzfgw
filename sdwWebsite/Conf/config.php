<?php
return array(
//数据库配置
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_PORT' => '3306',
	'DB_NAME' => 'yzfgw',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_PREFIX' => 'gv_',
	
    /* 项目设定 */
    'APP_STATUS'            => 'debug',  // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件
    'APP_FILE_CASE'         => true,   // 是否检查文件的大小写 对Windows平台有效
    'APP_AUTOLOAD_PATH'     => '',// 自动加载机制的自动搜索路径,注意搜索顺序
    'APP_TAGS_ON'           => true, // 系统标签扩展开关
    'APP_SUB_DOMAIN_DEPLOY' => false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  => array(), // 子域名部署规则
    'APP_SUB_DOMAIN_DENY'   => array(), //  子域名禁用列表
    'APP_GROUP_LIST'        => 'Home,Admin',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
    'APP_GROUP_MODE'        =>  0,  // 分组模式 0 普通分组 1 独立分组
    'ACTION_SUFFIX'         =>  '', // 操作方法后缀
	'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER'       =>  'Action', // 默认的控制器层名称
	'DEFAULT_GROUP'         => 'Home',  // 默认分组
    'DEFAULT_MODULE'        => 'Index', // 默认模块名称
    'DEFAULT_ACTION'        => 'index', // 默认操作名称
	
//模板配置
	//'TMPL_L_DELIM'   	 => '{sdw:',  //模板引擎普通标签开始标记
	//'TMPL_R_DELIM'	 => '}',	//模板引擎普通标签结束标记
	'TMPL_FILE_DEPR'        =>  '_', //模板文件MODULE_NAME与ACTION_NAME之间的分割符
	//'TAGLIB_BEGIN' =>'{sdw::',
	//'TAGLIB_END' =>'}',
	
//杂项配置
	'OUTPUT_ENCODE' =>  true,
	'PAGE_NUM'			 => 15,
	'URL_MODEL'         =>0,
	
);
?>