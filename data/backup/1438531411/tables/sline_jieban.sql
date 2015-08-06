CREATE TABLE `sline_jieban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kindlist` varchar(255) DEFAULT '0' COMMENT '目的地',
  `dest_mainid` int(6) DEFAULT '0' COMMENT '主目的地',
  `dest_childid` int(6) DEFAULT '0' COMMENT '子目的地',
  `day` tinyint(3) DEFAULT '0' COMMENT '天数',
  `attrid` varchar(255) DEFAULT '0' COMMENT '属性id',
  `childnum` int(3) DEFAULT '0' COMMENT '儿童数量',
  `adultnum` int(3) DEFAULT '0' COMMENT '成人数量',
  `vartime` varchar(255) DEFAULT '0' COMMENT '机动时间',
  `lineid` varchar(255) DEFAULT '0' COMMENT '相关线路id',
  `memo` text COMMENT '行程安排',
  `startdate` varchar(255) DEFAULT '0' COMMENT '出发日期',
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  `memberid` varchar(255) DEFAULT '0' COMMENT '会员id',
  `ishidden` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `iconlist` varchar(50) DEFAULT '0' COMMENT '图标',
  `status` tinyint(1) DEFAULT '0' COMMENT '约伴状态,0:关闭1:开启2:已成团',
  `userdest` varchar(255) DEFAULT '0' COMMENT '用户自定义目的地',
  `usertheme` varchar(500) DEFAULT '0' COMMENT '用户主题',
  `shownum` int(4) DEFAULT '0' COMMENT '查看次数',
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='结伴表'