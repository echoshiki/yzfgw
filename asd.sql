-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2014 年 04 月 29 日 00:17
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `yzfgw`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_authassignment`
-- 

CREATE TABLE `gv_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `gv_authassignment`
-- 

INSERT INTO `gv_authassignment` VALUES ('dg', '1', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '2', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '3', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '31', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '32', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '39', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '4', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '40', NULL, 'N;');
INSERT INTO `gv_authassignment` VALUES ('dg', '41', NULL, 'N;');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_authitem`
-- 

CREATE TABLE `gv_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `gv_authitem`
-- 

INSERT INTO `gv_authitem` VALUES ('cjj', 1, '城建局', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('department', 1, '部门', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('dg', 1, '东关街道', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('fgw', 1, '发改委', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('fwyfzj', 1, '服务业发展局', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jtj', 1, '交通局', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jw', 1, '纪委', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jxw', 1, '经信委', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('kf', 1, '经济开发区', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('kjj', 1, '科技局', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('ld', 1, '李典镇', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('nw', 1, '农委', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('qj', 1, '曲江街道', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('significantoffice', 1, '重大办', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('sm', 1, '商贸物流园', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('sp', 1, '食品工业园', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('st', 1, '沙头镇', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('streettownshippark', 1, '乡镇街道园区', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('tq', 1, '头桥镇', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('tw', 1, '汤汪乡', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wb', 1, '委办', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wf', 1, '文峰街道', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wh', 1, '汶河街道', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wt', 1, '湾头镇', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('xc', 1, '广陵新城', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('xx', 1, '信息产业基地', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zdb', 1, '重大办', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zfb', 1, '政府办', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zzb', 1, '组织部', NULL, 'N;');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_authitemchild`
-- 

CREATE TABLE `gv_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY  (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `gv_authitemchild`
-- 

INSERT INTO `gv_authitemchild` VALUES ('cjj', 'department');
INSERT INTO `gv_authitemchild` VALUES ('dg', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('fgw', 'department');
INSERT INTO `gv_authitemchild` VALUES ('fwyfzj', 'department');
INSERT INTO `gv_authitemchild` VALUES ('jtj', 'department');
INSERT INTO `gv_authitemchild` VALUES ('jw', 'significantoffice');
INSERT INTO `gv_authitemchild` VALUES ('jxw', 'department');
INSERT INTO `gv_authitemchild` VALUES ('kf', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('kjj', 'department');
INSERT INTO `gv_authitemchild` VALUES ('ld', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('nw', 'department');
INSERT INTO `gv_authitemchild` VALUES ('qj', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('sm', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('sp', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('st', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('tq', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('tw', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('wb', 'significantoffice');
INSERT INTO `gv_authitemchild` VALUES ('wf', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('wh', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('wt', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('xc', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('xx', 'streettownshippark');
INSERT INTO `gv_authitemchild` VALUES ('zdb', 'significantoffice');
INSERT INTO `gv_authitemchild` VALUES ('zfb', 'significantoffice');
INSERT INTO `gv_authitemchild` VALUES ('zzb', 'significantoffice');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_base`
-- 

CREATE TABLE `gv_base` (
  `id` int(11) NOT NULL auto_increment,
  `projectcoding` varchar(100) NOT NULL COMMENT '项目编码',
  `created` varchar(100) NOT NULL COMMENT '填报时间',
  `citytype` int(1) NOT NULL default '0' COMMENT '区市类别(0区存储1市重大)',
  `projectname` varchar(128) NOT NULL COMMENT '名称',
  `bumen` varchar(200) NOT NULL,
  `bumenwho` varchar(200) NOT NULL,
  `xiangzhen` varchar(100) NOT NULL COMMENT '责任主体-乡镇',
  `xiangzhenwhoadd` varchar(200) NOT NULL,
  `invest_name` varchar(50) NOT NULL default '' COMMENT '投资主体',
  `invest_leader_name` varchar(20) NOT NULL default '' COMMENT '投资主体_负责人姓名',
  `invest_leader_position` varchar(20) NOT NULL default '' COMMENT '投资主体_负责人职务',
  `invest_leader_phone` varchar(20) NOT NULL default '' COMMENT '投资主体_负责人电话',
  `invest_linkman_name` varchar(20) NOT NULL default '' COMMENT '投资主体_联系人姓名',
  `invest_linkman_position` varchar(20) NOT NULL default '' COMMENT '投资主体_联系人职务',
  `invest_linkman_phone` varchar(20) NOT NULL default '' COMMENT '投资主体_联系人电话',
  `partner` varchar(50) NOT NULL default '' COMMENT '合作方',
  `cooperation` varchar(50) NOT NULL default '' COMMENT '合作院所',
  `projecttype` varchar(20) NOT NULL default '' COMMENT '项目类别',
  `acreage` float NOT NULL default '0' COMMENT '用地亩',
  `areraged` float NOT NULL default '0' COMMENT '已建成用地',
  `address` varchar(200) NOT NULL default '' COMMENT '项目建设地址',
  `majorprojectname` varchar(100) NOT NULL default '' COMMENT '被纳入省(部)重大项目计划名称',
  `build_content` mediumtext NOT NULL,
  `benefit_output` float NOT NULL default '0' COMMENT '投产后效益年产值亿',
  `benefit_sell` float NOT NULL default '0' COMMENT '投产后效益年销售亿',
  `benefit_taxes` float NOT NULL default '0' COMMENT '投产后效益年利税亿',
  `officeworker_all` int(5) NOT NULL default '0' COMMENT '用人数总',
  `officeworker_doctor` int(5) NOT NULL default '0' COMMENT '用人数_博士',
  `officeworker_master` int(5) NOT NULL default '0' COMMENT '用人数_硕士',
  `officeworker_bachelor` int(5) NOT NULL default '0' COMMENT '用人数_本科',
  `officeworker_undergraduate` int(5) NOT NULL default '0' COMMENT '用人数_专科',
  `projectcontent` text COMMENT '项目建设内容',
  `warehousing_time` varchar(200) NOT NULL COMMENT '项目入库和市认定情况_入库时间',
  `warehousing_citytime` varchar(200) NOT NULL COMMENT '项目入库和市认定情况_报市库时间',
  `warehousing_newsignature` varchar(200) NOT NULL COMMENT '项目入库和市认定情况_认定新签约',
  `warehousing_startwork` varchar(200) NOT NULL COMMENT '项目入库和市认定情况_认定新开工',
  `warehousing_newcompletion` datetime NOT NULL COMMENT '项目入库和市认定情况_认定新竣工',
  `warehousing_production` varchar(20) NOT NULL COMMENT '项目入库和市认定情况_认定新投产',
  `invest_type` varchar(20) NOT NULL default '' COMMENT '投资情况_引资类别 民资/外资',
  `invest_currency` varchar(20) NOT NULL default '' COMMENT '投资情况_货币种类',
  `invest_signasset` float NOT NULL default '0' COMMENT '投资情况_注册资本金',
  `invest_planinvestall` float NOT NULL default '0' COMMENT '投资情况_计划总投资',
  `invest_completeinvestall` float NOT NULL default '0' COMMENT '投资情况_累计完成投资',
  `invest_planinvestyear` float NOT NULL default '0' COMMENT '投资情况_本年计划投资',
  `invest_completeinvestyear` float NOT NULL default '0' COMMENT '投资情况_本年完成投资',
  `invest_month` float NOT NULL,
  `planname` varchar(100) NOT NULL default '默认',
  `build_plan_demolition` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_拆迁',
  `build_plan_piling` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_打桩',
  `build_plan_excavate` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_开挖',
  `build_plan_pmz` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_正负零',
  `build_plan_cap` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_主体封顶',
  `build_plan_completion` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_主体竣工',
  `build_plan_device` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_设备安装调试',
  `build_plan_partproduction` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_部分投产',
  `build_plan_allproduction` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_全部投产',
  `build_actual_demolition` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_计划_拆迁',
  `build_actual_piling` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_打桩',
  `build_actual_excavate` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_开挖',
  `build_actual_pmz` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_正负零',
  `build_actual_cap` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_主体封顶',
  `build_actual_completion` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_主体竣工',
  `build_actual_device` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_设备安装调试',
  `build_actual_partproduction` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_部分投产',
  `build_actual_allproduction` varchar(200) NOT NULL COMMENT '建设时序计划完成情况_实际_全部投产',
  `content_jinzhan` text NOT NULL,
  `content_problem` text NOT NULL,
  `content_leader` text NOT NULL,
  `city_leader_name` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_姓名',
  `city_leader_position` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_职位',
  `city_contact_name` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人姓名',
  `city_contact_position` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人职位',
  `city_contact_phone` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人电话',
  `city_contact_mail` varchar(30) NOT NULL default '' COMMENT '挂钩市领导_联系人邮箱',
  `city_department` varchar(20) NOT NULL default '' COMMENT '市挂钩部门名',
  `city_department_position` varchar(20) NOT NULL default '' COMMENT '市挂钩部门_联系人职位',
  `city_department_phone` varchar(20) NOT NULL default '' COMMENT '市挂钩部门_联系人电话',
  `city_department_mail` varchar(30) NOT NULL default '' COMMENT '市挂钩部门_联系人邮箱',
  `responsibility_name` varchar(20) NOT NULL default '' COMMENT '责任主体负责人名',
  `responsibility_position` varchar(20) NOT NULL default '' COMMENT '责任主体负责人_职位',
  `responsibility_phone` varchar(20) NOT NULL default '' COMMENT '责任主体负责人_电话',
  `responsibility_mail` varchar(30) NOT NULL default '' COMMENT '责任主体负责人_邮箱',
  `officemajor_name` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人',
  `officemajor_position` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人_职位',
  `officemajor_phone` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人_电话',
  `officemajor_mail` varchar(30) NOT NULL default '' COMMENT '责任主体重大办联系人_邮箱',
  `status` int(10) NOT NULL default '2' COMMENT '审核状态',
  `ischeckbm` int(10) NOT NULL default '0',
  `ischeckzd` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `created` (`created`),
  KEY `projectcoding` (`projectcoding`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基本信息' AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `gv_base`
-- 

INSERT INTO `gv_base` VALUES (4, 'sp2014042323023', '2014-04-22', 0, '扬州三笑集团', '科技部门', '任广彪', '陈集镇', '', '扬汽集团', '柳先生', '负责人', '13236209874', '杨先生', '经理', '13236209874', '扬州酒店用品', '扬州大学', '工业园', 604, 643, '扬州市广陵区', 'WWYY', '扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区扬州市广陵区', 13, 55, 33, 365, 44, 44, 55, 222, NULL, '2014-04-30', '2014-04-29', '2014-04-30', '2014-04-29', '2014-04-26 00:00:00', '2014-04-30', '44', '', 43, 21, 43, 54, 65, 56, '默认', '2014-04-18', '2014-04-19', '2014-04-18', '2014-04-26', '2014-04-16', '2014-04-29', '2014-04-30', '2014-04-21', '2014-04-18', '2014-04-19', '2014-04-25', '2014-04-26', '2014-04-22', '2014-04-24', '2014-04-30', '2014-04-30', '2014-04-23', '2014-04-23', '年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税', '1.扬州大学扬州大学扬州大学扬州大学扬州大学扬州大学 【未解决】\r\n2.扬州酒店用品扬州酒店用品扬州酒店用品 【未解决】\r\n3.主体竣工主体竣工主体竣工主体竣工主体竣工  【未解决】', '技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部', '刘先生', '总监', '刘先生', '经理', '13233454444', '388348934@qq.com', '技术部', '总监', '13233454444', '388348934@qq.com', '技术部', '总监', '13233454444', '388348934@qq.com', '技术部', '总监', '13233454444', '388348934@qq.com', 1, 0, 1);
INSERT INTO `gv_base` VALUES (5, 'sp2014042408420', '2014-04-24', 1, '扬州喜来乐商品', '科技部门', '刘明川', '陈集镇', '', '扬州至中集团', '薛先生', '技术', '1327478495', '孙先生', '经理', '13236209874', '开业公司', '扬州广陵学院', '服务业', 34, 4634, '江苏徐州', 'XXKK', '扬州时尚扬州时尚扬州时尚扬州时尚扬州时尚扬州时尚', 30, 40, 33, 102, 34, 23, 23, 22, NULL, '2014-04-12', '2014-04-15', '2014-04-22', '2014-04-21', '2014-04-15 00:00:00', '2014-04-26', '44', '', 44, 33, 22, 22, 11, 33, '默认', '2014-04-10', '2014-04-11', '2014-04-07', '2014-04-20', '2014-04-24', '2014-04-25', '2014-04-26', '2014-04-28', '2014-04-23', '2014-04-01', '2014-04-11', '2014-04-15', '2014-04-16', '2014-04-10', '2014-04-17', '2014-04-18', '2014-04-19', '2014-04-19', '主体封顶主体封顶主体封顶主体封顶主体封顶主体封顶主体封顶主体封顶主体封顶', '1.扬州大学扬州大学扬州大学扬州大学扬州大学扬州大学 [已解决]\r\n2.扬州酒店用品扬州酒店用品扬州酒店用品  [已解决]\r\n3.主体竣工主体竣工主体竣工主体竣工主体竣工  [已解决]', '马化腾马化腾马化腾马化腾马化腾马化腾马化腾马化腾马化腾马化腾马化腾', '刘先生', '总监', '马先生', '总经理', '1816477443', '89489433@163.com', '马先生', '总经理', '1816477443', '89489433@163.com', '马先生', '总经理', '1816477443', '89489433@163.com', '马先生', '总经理', '1816477443', '89489433@163.com', 1, 1, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_build`
-- 

CREATE TABLE `gv_build` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `projectcoding` varchar(100) NOT NULL,
  `projectname` varchar(128) NOT NULL COMMENT '名称',
  `build_plan_demolition` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_拆迁',
  `build_plan_piling` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_打桩',
  `build_plan_excavate` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_开挖',
  `build_plan_pmz` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_正负零',
  `build_plan_cap` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_主体封顶',
  `build_plan_completion` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_主体竣工',
  `build_plan_device` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_设备安装调试',
  `build_plan_partproduction` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_部分投产',
  `build_plan_allproduction` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_全部投产',
  `build_actual_demolition` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_计划_拆迁',
  `build_actual_piling` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_打桩',
  `build_actual_excavate` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_开挖',
  `build_actual_pmz` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_正负零',
  `build_actual_cap` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_主体封顶',
  `build_actual_completion` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_主体竣工',
  `build_actual_device` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_设备安装调试',
  `build_actual_partproduction` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_部分投产',
  `build_actual_allproduction` varchar(100) NOT NULL COMMENT '建设时序计划完成情况_实际_全部投产',
  `content_jinzhan` text NOT NULL,
  `content_problem` text NOT NULL,
  `content_leader` text NOT NULL,
  `build_addtime` int(10) NOT NULL,
  `ischeckbm` int(4) NOT NULL default '0' COMMENT '部门审核',
  `whoadd` varchar(100) default NULL COMMENT '是谁添加的月报',
  `ischeckzd` int(4) default '0' COMMENT '重大办审核',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='建设时序计划完成情况' AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `gv_build`
-- 

INSERT INTO `gv_build` VALUES (5, 4, 'sp2014042323023', '扬州三笑集团', '2014-04-18', '2014-04-19', '2014-04-18', '2014-04-26', '2014-04-16', '2014-04-29', '2014-04-30', '2014-04-21', '2014-04-18', '2014-04-19', '2014-04-25', '2014-04-26', '2014-04-22', '2014-04-24', '2014-04-30', '2014-04-30', '2014-04-23', '2014-04-23', '年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税年利税', '1.扬州大学扬州大学扬州大学扬州大学扬州大学扬州大学 【未解决】\r\n2.扬州酒店用品扬州酒店用品扬州酒店用品 【未解决】\r\n3.主体竣工主体竣工主体竣工主体竣工主体竣工  【未解决】', '技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部技术部', 1398415140, 1, 'xiangzhen', 1);
INSERT INTO `gv_build` VALUES (6, 5, 'sp2014042408420', '扬州喜来乐商品', '2014-04-10', '2014-04-11', '2014-04-07', '2014-04-20', '2014-04-24', '2014-04-25', '2014-04-26', '2014-04-28', '2014-04-23', '2014-04-25', '2014-04-22', '2014-04-29', '2014-04-30', '2014-04-28', '2014-04-23', '2014-04-30', '2014-04-28', '2014-04-29', '建设时序计划完成情况建设时序计划完成情况建设时序计划完成情况', '建设时序计划完成情况', '建设时序计划完成情况建设时序计划完成情况', 1398475471, 1, 'xiangzhen', 1);
INSERT INTO `gv_build` VALUES (7, 5, 'sp2014042408420', '扬州喜来乐商品', '2014-04-10', '2014-04-11', '2014-04-07', '2014-04-20', '2014-04-24', '2014-04-25', '2014-04-26', '2014-04-28', '2014-04-23', '2014-04-17', '2014-04-19', '2014-04-22', '2014-04-21', '2014-04-30', '2014-04-20', '2014-04-23', '2014-04-29', '2014-04-30', '您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是', '您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是we', '您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是您的登陆身份是', 1398476004, 0, 'xiangzhen', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_contactinfo`
-- 

CREATE TABLE `gv_contactinfo` (
  `id` int(11) NOT NULL,
  `city_leader_name` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_姓名',
  `city_leader_position` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_职位',
  `city_contact_name` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人姓名',
  `city_contact_position` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人职位',
  `city_contact_phone` varchar(20) NOT NULL default '' COMMENT '挂钩市领导_联系人电话',
  `city_contact_mail` varchar(30) NOT NULL default '' COMMENT '挂钩市领导_联系人邮箱',
  `city_department` varchar(20) NOT NULL default '' COMMENT '市挂钩部门名',
  `city_department_position` varchar(20) NOT NULL default '' COMMENT '市挂钩部门_联系人职位',
  `city_department_phone` varchar(20) NOT NULL default '' COMMENT '市挂钩部门_联系人电话',
  `city_department_mail` varchar(30) NOT NULL default '' COMMENT '市挂钩部门_联系人邮箱',
  `responsibility_name` varchar(20) NOT NULL default '' COMMENT '责任主体负责人名',
  `responsibility_position` varchar(20) NOT NULL default '' COMMENT '责任主体负责人_职位',
  `responsibility_phone` varchar(20) NOT NULL default '' COMMENT '责任主体负责人_电话',
  `responsibility_mail` varchar(30) NOT NULL default '' COMMENT '责任主体负责人_邮箱',
  `officemajor_name` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人',
  `officemajor_position` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人_职位',
  `officemajor_phone` varchar(20) NOT NULL default '' COMMENT '责任主体重大办联系人_电话',
  `officemajor_mail` varchar(30) NOT NULL default '' COMMENT '责任主体重大办联系人_邮箱',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='联系信息';

-- 
-- 导出表中的数据 `gv_contactinfo`
-- 

INSERT INTO `gv_contactinfo` VALUES (2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_formalities`
-- 

CREATE TABLE `gv_formalities` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL COMMENT '时间',
  `department` tinyint(4) NOT NULL COMMENT '部门',
  `formalities` tinyint(4) NOT NULL COMMENT '手续',
  PRIMARY KEY  (`id`),
  KEY `parentid` (`parentid`,`department`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='手续办理情况\r\ndepartment 具体按照config文件配置\r\nformalities 具体按照config文件配' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `gv_formalities`
-- 

INSERT INTO `gv_formalities` VALUES (1, 2, '2014-04-14 03:18:06', 5, 5);
INSERT INTO `gv_formalities` VALUES (2, 2, '2014-04-14 03:34:57', 5, 10);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_invest`
-- 

CREATE TABLE `gv_invest` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `year` int(4) NOT NULL default '0' COMMENT '年',
  `plan_yeartotal` float NOT NULL default '0' COMMENT '本年计划投资',
  `complete_yeartotal` float NOT NULL default '0' COMMENT '本年完成投资',
  `m1` float default NULL COMMENT '1月',
  `m2` float default NULL COMMENT '2月',
  `m3` float default NULL COMMENT '3月',
  `m4` float default NULL COMMENT '4月',
  `m5` float default NULL COMMENT '5月',
  `m6` float default NULL COMMENT '6月',
  `m7` float default NULL COMMENT '7月',
  `m8` float default NULL COMMENT '8月',
  `m9` float default NULL COMMENT '9月',
  `m10` float default NULL COMMENT '10月',
  `m11` float default NULL COMMENT '11月',
  `m12` float default NULL COMMENT '12月',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投资情况';

-- 
-- 导出表中的数据 `gv_invest`
-- 

INSERT INTO `gv_invest` VALUES (2, 2, 2014, 0, 0, NULL, NULL, NULL, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `gv_invest` VALUES (3, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_log`
-- 

CREATE TABLE `gv_log` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `content` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `parentid` (`parentid`,`created`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `gv_log`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `gv_member`
-- 

CREATE TABLE `gv_member` (
  `userid` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `usertype` int(10) NOT NULL COMMENT '用户权限',
  `groupid` int(10) NOT NULL COMMENT '具体属于哪个部门',
  `hash` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '称谓',
  `post` varchar(20) NOT NULL COMMENT '职位',
  `registered` datetime NOT NULL COMMENT '注册时间',
  `phone` varchar(50) NOT NULL COMMENT '联系方式',
  `mobile` varchar(50) NOT NULL COMMENT '手机号码',
  `qq` varchar(50) NOT NULL COMMENT 'QQ',
  `email` varchar(50) NOT NULL COMMENT '电子邮箱',
  `fax` varchar(50) NOT NULL COMMENT '传真',
  `sitting` varchar(500) NOT NULL COMMENT '设置',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username_Unique` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `gv_member`
-- 

INSERT INTO `gv_member` VALUES (1, 'zhongdaban', '14e1b600b1fd579f47433b88e8d85291', 1, 1, '', '刘强东', '', '0000-00-00 00:00:00', '', '', '', '', '', '');
INSERT INTO `gv_member` VALUES (3, 'bumen', '14e1b600b1fd579f47433b88e8d85291', 2, 11, '', '任广彪', '', '0000-00-00 00:00:00', '', '', '', '', '', '');
INSERT INTO `gv_member` VALUES (4, 'xiangzhen', '14e1b600b1fd579f47433b88e8d85291', 3, 4, '', '刘晓明', '', '0000-00-00 00:00:00', '', '', '', '', '', '');
INSERT INTO `gv_member` VALUES (5, 'liumingchuan', '14e1b600b1fd579f47433b88e8d85291', 2, 11, '', '刘明川', '', '0000-00-00 00:00:00', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_member_group`
-- 

CREATE TABLE `gv_member_group` (
  `groupid` int(10) NOT NULL auto_increment,
  `groupname` varchar(100) default NULL,
  `pid` int(10) default NULL,
  `listorder` int(5) default NULL,
  `status` int(2) default NULL,
  `level` int(5) default NULL,
  `note` varchar(500) default NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- 导出表中的数据 `gv_member_group`
-- 

INSERT INTO `gv_member_group` VALUES (1, '重大办', 0, NULL, 1, NULL, '最高级权限，管理员');
INSERT INTO `gv_member_group` VALUES (2, '部门', 0, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (3, '乡镇街道', 0, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (4, '陈集镇', 3, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (5, '杭集镇', 3, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (7, '规划部门', 2, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (8, '食品部门', 2, NULL, 1, NULL, NULL);
INSERT INTO `gv_member_group` VALUES (9, '新城镇', 3, NULL, NULL, NULL, '测试街道D');
INSERT INTO `gv_member_group` VALUES (11, '科技部门', 2, NULL, NULL, NULL, '');
INSERT INTO `gv_member_group` VALUES (10, '工业部门', 2, NULL, NULL, NULL, '');

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_project`
-- 

CREATE TABLE `gv_project` (
  `id` int(11) NOT NULL,
  `streettownshippark` int(11) default NULL COMMENT '分配街道乡镇园区用户ID',
  `created` int(1) NOT NULL default '0' COMMENT '重大办创建',
  `assign` int(1) NOT NULL default '0' COMMENT '部门分配',
  `fillin` int(1) NOT NULL default '0' COMMENT '乡镇街道填写',
  `departmentverify` int(1) NOT NULL default '0' COMMENT '部门审核',
  `zdbverify` int(1) NOT NULL default '0' COMMENT '重大办审核',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='项目配置';

-- 
-- 导出表中的数据 `gv_project`
-- 

INSERT INTO `gv_project` VALUES (2, 2, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_schedul_problem`
-- 

CREATE TABLE `gv_schedul_problem` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '时间',
  `problem` varchar(500) NOT NULL COMMENT '问题描述',
  `pts` int(11) NOT NULL default '0' COMMENT '乡镇街道园区审核',
  `department` int(11) NOT NULL default '0' COMMENT '部门审核',
  `gdb` int(11) NOT NULL default '0' COMMENT '重大办审核',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='进度存在的问题' AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `gv_schedul_problem`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `gv_schedul_process`
-- 

CREATE TABLE `gv_schedul_process` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '时间',
  `detailedprogress` text NOT NULL COMMENT '详细进展情况',
  `cityleadercheck` text NOT NULL COMMENT '市领导挂钩情况',
  PRIMARY KEY  (`id`),
  KEY `parentid` (`parentid`,`created`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='进度跟踪' AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `gv_schedul_process`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `gv_session`
-- 

CREATE TABLE `gv_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) default NULL,
  `data` longblob,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `gv_session`
-- 

INSERT INTO `gv_session` VALUES ('prkafe1hlvk0ua2urlu29vf7r3', 1397707104, 0x30623436333663623465386633383934376162626338333664386164363135635f5f69647c733a313a2231223b30623436333663623465386633383934376162626338333664386164363135635f5f6e616d657c733a343a2262646563223b30623436333663623465386633383934376162626338333664386164363135635f5f7374617465737c613a303a7b7d61737369676e70726f6a6563747c613a333a7b733a393a2270726f6a6563746964223b733a313a2232223b733a343a226974656d223b733a323a226467223b733a343a2275736572223b613a323a7b693a303b613a343a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a393a22e7aea1e79086e5913f3b733a343a22706f7374223b733a303a22223b733a383a22757365726e616d65223b733a343a2262646563223b7d693a313b613a343a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a393a22313233313234313233223b733a343a22706f7374223b733a303a22223b733a383a22757365726e616d65223b733a393a22313233313234313233223b7d7d7d);

-- --------------------------------------------------------

-- 
-- 表的结构 `gv_sitting`
-- 

CREATE TABLE `gv_sitting` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `option_name` varchar(64) NOT NULL,
  `option_value` mediumtext NOT NULL,
  `autoload` enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `gv_sitting`
-- 

