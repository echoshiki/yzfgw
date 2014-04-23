-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ��������: 2014 �� 04 �� 23 �� 06:52
-- �������汾: 5.0.51
-- PHP �汾: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ���ݿ�: `yzfgw`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_authassignment`
-- 

CREATE TABLE `gv_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- �������е����� `gv_authassignment`
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
-- ��Ľṹ `gv_authitem`
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
-- �������е����� `gv_authitem`
-- 

INSERT INTO `gv_authitem` VALUES ('cjj', 1, '�ǽ���', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('department', 1, '����', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('dg', 1, '���ؽֵ�', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('fgw', 1, '����ί', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('fwyfzj', 1, '����ҵ��չ��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jtj', 1, '��ͨ��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jw', 1, '��ί', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('jxw', 1, '����ί', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('kf', 1, '���ÿ�����', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('kjj', 1, '�Ƽ���', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('ld', 1, '�����', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('nw', 1, 'ũί', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('qj', 1, '�����ֵ�', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('significantoffice', 1, '�ش��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('sm', 1, '��ó����԰', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('sp', 1, 'ʳƷ��ҵ԰', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('st', 1, 'ɳͷ��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('streettownshippark', 1, '����ֵ�԰��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('tq', 1, 'ͷ����', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('tw', 1, '������', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wb', 1, 'ί��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wf', 1, '�ķ�ֵ�', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wh', 1, '��ӽֵ�', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('wt', 1, '��ͷ��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('xc', 1, '�����³�', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('xx', 1, '��Ϣ��ҵ����', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zdb', 1, '�ش��', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zfb', 1, '������', NULL, 'N;');
INSERT INTO `gv_authitem` VALUES ('zzb', 1, '��֯��', NULL, 'N;');

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_authitemchild`
-- 

CREATE TABLE `gv_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY  (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- �������е����� `gv_authitemchild`
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
-- ��Ľṹ `gv_base`
-- 

CREATE TABLE `gv_base` (
  `id` int(11) NOT NULL auto_increment,
  `projectcoding` varchar(15) NOT NULL COMMENT '��Ŀ����',
  `created` datetime NOT NULL COMMENT '�ʱ��',
  `citytype` int(1) NOT NULL default '0' COMMENT '�������(0���洢1���ش�)',
  `name` varchar(128) NOT NULL COMMENT '����',
  `responsibility` varchar(100) NOT NULL default '' COMMENT '��������',
  `invest_name` varchar(50) NOT NULL default '' COMMENT 'Ͷ������',
  `invest_leader_name` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_����������',
  `invest_leader_position` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_������ְ��',
  `invest_leader_phone` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_�����˵绰',
  `invest_linkman_name` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_��ϵ������',
  `invest_linkman_position` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_��ϵ��ְ��',
  `invest_linkman_phone` varchar(20) NOT NULL default '' COMMENT 'Ͷ������_��ϵ�˵绰',
  `partner` varchar(50) NOT NULL default '' COMMENT '������',
  `cooperation` varchar(50) NOT NULL default '' COMMENT '����Ժ��',
  `type` varchar(20) NOT NULL default '' COMMENT '��Ŀ���',
  `acreage` float NOT NULL default '0' COMMENT '�õ�Ķ',
  `areraged` float NOT NULL default '0' COMMENT '�ѽ����õ�',
  `address` varchar(200) NOT NULL default '' COMMENT '��Ŀ�����ַ',
  `majorprojectname` varchar(100) NOT NULL default '' COMMENT '������ʡ(��)�ش���Ŀ�ƻ�����',
  `benefit_output` float NOT NULL default '0' COMMENT 'Ͷ����Ч�����ֵ��',
  `benefit_sell` float NOT NULL default '0' COMMENT 'Ͷ����Ч����������',
  `benefit_taxes` float NOT NULL default '0' COMMENT 'Ͷ����Ч������˰��',
  `officeworker_all` int(5) NOT NULL default '0' COMMENT '��������',
  `officeworker_doctor` int(5) NOT NULL default '0' COMMENT '������_��ʿ',
  `officeworker_master` int(5) NOT NULL default '0' COMMENT '������_˶ʿ',
  `officeworker_bachelor` int(5) NOT NULL default '0' COMMENT '������_����',
  `officeworker_undergraduate` int(5) NOT NULL default '0' COMMENT '������_ר��',
  `projectcontent` text COMMENT '��Ŀ��������',
  `warehousing_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_���ʱ��',
  `warehousing_citytime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_���п�ʱ��',
  `warehousing_newsignature` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_�϶���ǩԼ',
  `warehousing_startwork` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_�϶��¿���',
  `warehousing_newcompletion` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_�϶��¿���',
  `warehousing_production` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ŀ�������϶����_�϶���Ͷ��',
  `invest_type` varchar(20) NOT NULL default '' COMMENT 'Ͷ�����_������� ����/����',
  `invest_currency` varchar(20) NOT NULL default '' COMMENT 'Ͷ�����_��������',
  `invest_signasset` float NOT NULL default '0' COMMENT 'Ͷ�����_ע���ʱ���',
  `invest_planinvestall` float NOT NULL default '0' COMMENT 'Ͷ�����_�ƻ���Ͷ��',
  `invest_completeinvestall` float NOT NULL default '0' COMMENT 'Ͷ�����_�ۼ����Ͷ��',
  `invest_planinvestyear` float NOT NULL default '0' COMMENT 'Ͷ�����_����ƻ�Ͷ��',
  `invest_completeinvestyear` float NOT NULL default '0' COMMENT 'Ͷ�����_�������Ͷ��',
  PRIMARY KEY  (`id`),
  KEY `created` (`created`),
  KEY `projectcoding` (`projectcoding`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='������Ϣ' AUTO_INCREMENT=3 ;

-- 
-- �������е����� `gv_base`
-- 

INSERT INTO `gv_base` VALUES (2, 'dg201403001', '2014-03-11 00:00:00', 0, '������Ŀһ', 'dg', '', '', '', '', '', '', '', '', '', 'ces', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_build`
-- 

CREATE TABLE `gv_build` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL COMMENT '����',
  `build_plan_demolition` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_��Ǩ',
  `build_plan_piling` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_��׮',
  `build_plan_excavate` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_����',
  `build_plan_pmz` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_������',
  `build_plan_cap` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_����ⶥ',
  `build_plan_completion` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_���忢��',
  `build_plan_device` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_�豸��װ����',
  `build_plan_partproduction` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_����Ͷ��',
  `build_plan_allproduction` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_ȫ��Ͷ��',
  `build_actual_demolition` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_�ƻ�_��Ǩ',
  `build_actual_piling` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_��׮',
  `build_actual_excavate` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_����',
  `build_actual_pmz` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_������',
  `build_actual_cap` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_����ⶥ',
  `build_actual_completion` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_���忢��',
  `build_actual_device` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_�豸��װ����',
  `build_actual_partproduction` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_����Ͷ��',
  `build_actual_allproduction` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '����ʱ��ƻ�������_ʵ��_ȫ��Ͷ��',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='����ʱ��ƻ�������' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `gv_build`
-- 

INSERT INTO `gv_build` VALUES (2, 2, 'Ĭ��', '2014-03-12 00:00:00', '2014-03-13 00:00:00', '2014-03-27 00:00:00', '2014-03-20 00:00:00', '2014-03-19 00:00:00', '2014-03-19 00:00:00', '2014-03-12 00:00:00', '2014-03-27 00:00:00', '2014-03-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `gv_build` VALUES (3, 2, '������', '2014-03-05 00:00:00', '2014-03-06 00:00:00', '2014-03-07 00:00:00', '2014-03-08 00:00:00', '2014-03-09 00:00:00', '2014-03-10 00:00:00', '2014-03-11 00:00:00', '2014-03-11 00:00:00', '2014-03-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_contactinfo`
-- 

CREATE TABLE `gv_contactinfo` (
  `id` int(11) NOT NULL,
  `city_leader_name` varchar(20) NOT NULL default '' COMMENT '�ҹ����쵼_����',
  `city_leader_position` varchar(20) NOT NULL default '' COMMENT '�ҹ����쵼_ְλ',
  `city_contact_name` varchar(20) NOT NULL default '' COMMENT '�ҹ����쵼_��ϵ������',
  `city_contact_position` varchar(20) NOT NULL default '' COMMENT '�ҹ����쵼_��ϵ��ְλ',
  `city_contact_phone` varchar(20) NOT NULL default '' COMMENT '�ҹ����쵼_��ϵ�˵绰',
  `city_contact_mail` varchar(30) NOT NULL default '' COMMENT '�ҹ����쵼_��ϵ������',
  `city_department` varchar(20) NOT NULL default '' COMMENT '�йҹ�������',
  `city_department_position` varchar(20) NOT NULL default '' COMMENT '�йҹ�����_��ϵ��ְλ',
  `city_department_phone` varchar(20) NOT NULL default '' COMMENT '�йҹ�����_��ϵ�˵绰',
  `city_department_mail` varchar(30) NOT NULL default '' COMMENT '�йҹ�����_��ϵ������',
  `responsibility_name` varchar(20) NOT NULL default '' COMMENT '�������帺������',
  `responsibility_position` varchar(20) NOT NULL default '' COMMENT '�������帺����_ְλ',
  `responsibility_phone` varchar(20) NOT NULL default '' COMMENT '�������帺����_�绰',
  `responsibility_mail` varchar(30) NOT NULL default '' COMMENT '�������帺����_����',
  `officemajor_name` varchar(20) NOT NULL default '' COMMENT '���������ش����ϵ��',
  `officemajor_position` varchar(20) NOT NULL default '' COMMENT '���������ش����ϵ��_ְλ',
  `officemajor_phone` varchar(20) NOT NULL default '' COMMENT '���������ش����ϵ��_�绰',
  `officemajor_mail` varchar(30) NOT NULL default '' COMMENT '���������ش����ϵ��_����',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='��ϵ��Ϣ';

-- 
-- �������е����� `gv_contactinfo`
-- 

INSERT INTO `gv_contactinfo` VALUES (2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_formalities`
-- 

CREATE TABLE `gv_formalities` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL COMMENT 'ʱ��',
  `department` tinyint(4) NOT NULL COMMENT '����',
  `formalities` tinyint(4) NOT NULL COMMENT '����',
  PRIMARY KEY  (`id`),
  KEY `parentid` (`parentid`,`department`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='�����������\r\ndepartment ���尴��config�ļ�����\r\nformalities ���尴��config�ļ���' AUTO_INCREMENT=3 ;

-- 
-- �������е����� `gv_formalities`
-- 

INSERT INTO `gv_formalities` VALUES (1, 2, '2014-04-14 03:18:06', 5, 5);
INSERT INTO `gv_formalities` VALUES (2, 2, '2014-04-14 03:34:57', 5, 10);

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_invest`
-- 

CREATE TABLE `gv_invest` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `year` int(4) NOT NULL default '0' COMMENT '��',
  `plan_yeartotal` float NOT NULL default '0' COMMENT '����ƻ�Ͷ��',
  `complete_yeartotal` float NOT NULL default '0' COMMENT '�������Ͷ��',
  `m1` float default NULL COMMENT '1��',
  `m2` float default NULL COMMENT '2��',
  `m3` float default NULL COMMENT '3��',
  `m4` float default NULL COMMENT '4��',
  `m5` float default NULL COMMENT '5��',
  `m6` float default NULL COMMENT '6��',
  `m7` float default NULL COMMENT '7��',
  `m8` float default NULL COMMENT '8��',
  `m9` float default NULL COMMENT '9��',
  `m10` float default NULL COMMENT '10��',
  `m11` float default NULL COMMENT '11��',
  `m12` float default NULL COMMENT '12��',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Ͷ�����';

-- 
-- �������е����� `gv_invest`
-- 

INSERT INTO `gv_invest` VALUES (2, 2, 2014, 0, 0, NULL, NULL, NULL, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `gv_invest` VALUES (3, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_log`
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
-- �������е����� `gv_log`
-- 


-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_member`
-- 

CREATE TABLE `gv_member` (
  `userid` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `usertype` int(10) NOT NULL COMMENT '�û�Ȩ��',
  `hash` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '��ν',
  `post` varchar(20) NOT NULL COMMENT 'ְλ',
  `registered` datetime NOT NULL COMMENT 'ע��ʱ��',
  `phone` varchar(50) NOT NULL COMMENT '��ϵ��ʽ',
  `mobile` varchar(50) NOT NULL COMMENT '�ֻ�����',
  `qq` varchar(50) NOT NULL COMMENT 'QQ',
  `email` varchar(50) NOT NULL COMMENT '��������',
  `fax` varchar(50) NOT NULL COMMENT '����',
  `sitting` varchar(500) NOT NULL COMMENT '����',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username_Unique` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- �������е����� `gv_member`
-- 

INSERT INTO `gv_member` VALUES (1, 'zhongdaban', '14e1b600b1fd579f47433b88e8d85291', 2, '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '');
INSERT INTO `gv_member` VALUES (3, 'bumen', '14e1b600b1fd579f47433b88e8d85291', 1, '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '');
INSERT INTO `gv_member` VALUES (4, 'xiangzhen', '14e1b600b1fd579f47433b88e8d85291', 3, '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_project`
-- 

CREATE TABLE `gv_project` (
  `id` int(11) NOT NULL,
  `streettownshippark` int(11) default NULL COMMENT '����ֵ�����԰���û�ID',
  `created` int(1) NOT NULL default '0' COMMENT '�ش�촴��',
  `assign` int(1) NOT NULL default '0' COMMENT '���ŷ���',
  `fillin` int(1) NOT NULL default '0' COMMENT '����ֵ���д',
  `departmentverify` int(1) NOT NULL default '0' COMMENT '�������',
  `zdbverify` int(1) NOT NULL default '0' COMMENT '�ش�����',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='��Ŀ����';

-- 
-- �������е����� `gv_project`
-- 

INSERT INTO `gv_project` VALUES (2, 2, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_schedul_problem`
-- 

CREATE TABLE `gv_schedul_problem` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ʱ��',
  `problem` varchar(500) NOT NULL COMMENT '��������',
  `pts` int(11) NOT NULL default '0' COMMENT '����ֵ�԰�����',
  `department` int(11) NOT NULL default '0' COMMENT '�������',
  `gdb` int(11) NOT NULL default '0' COMMENT '�ش�����',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���ȴ��ڵ�����' AUTO_INCREMENT=1 ;

-- 
-- �������е����� `gv_schedul_problem`
-- 


-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_schedul_process`
-- 

CREATE TABLE `gv_schedul_process` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ʱ��',
  `detailedprogress` text NOT NULL COMMENT '��ϸ��չ���',
  `cityleadercheck` text NOT NULL COMMENT '���쵼�ҹ����',
  PRIMARY KEY  (`id`),
  KEY `parentid` (`parentid`,`created`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���ȸ���' AUTO_INCREMENT=1 ;

-- 
-- �������е����� `gv_schedul_process`
-- 


-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_session`
-- 

CREATE TABLE `gv_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) default NULL,
  `data` longblob,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- �������е����� `gv_session`
-- 

INSERT INTO `gv_session` VALUES ('prkafe1hlvk0ua2urlu29vf7r3', 1397707104, 0x30623436333663623465386633383934376162626338333664386164363135635f5f69647c733a313a2231223b30623436333663623465386633383934376162626338333664386164363135635f5f6e616d657c733a343a2262646563223b30623436333663623465386633383934376162626338333664386164363135635f5f7374617465737c613a303a7b7d61737369676e70726f6a6563747c613a333a7b733a393a2270726f6a6563746964223b733a313a2232223b733a343a226974656d223b733a323a226467223b733a343a2275736572223b613a323a7b693a303b613a343a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a393a22e7aea1e79086e5913f3b733a343a22706f7374223b733a303a22223b733a383a22757365726e616d65223b733a343a2262646563223b7d693a313b613a343a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a393a22313233313234313233223b733a343a22706f7374223b733a303a22223b733a383a22757365726e616d65223b733a393a22313233313234313233223b7d7d7d);

-- --------------------------------------------------------

-- 
-- ��Ľṹ `gv_sitting`
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
-- �������е����� `gv_sitting`
-- 

