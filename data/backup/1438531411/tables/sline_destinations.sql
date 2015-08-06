CREATE TABLE `sline_destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kindname` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT '0' COMMENT '本表从属关系父id',
  `seotitle` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tagword` varchar(255) DEFAULT NULL,
  `jieshao` text,
  `kindtype` int(1) unsigned DEFAULT NULL COMMENT '1:栏目分类 2:其它分类',
  `isopen` int(1) unsigned DEFAULT '1' COMMENT '是否开启',
  `isfinishseo` int(1) unsigned NOT NULL DEFAULT '0',
  `displayorder` int(4) unsigned DEFAULT '9999',
  `isnav` int(1) unsigned DEFAULT '0',
  `templetpath` varchar(255) DEFAULT NULL,
  `ishot` int(1) unsigned DEFAULT '0',
  `litpic` varchar(255) DEFAULT NULL,
  `piclist` text,
  `istopnav` tinyint(3) DEFAULT '0',
  `pinyin` varchar(255) DEFAULT NULL,
  `templet` varchar(255) DEFAULT NULL,
  `iswebsite` int(1) DEFAULT '0' COMMENT '是否开启子站',
  `weburl` varchar(50) DEFAULT NULL COMMENT '子站域名',
  `webroot` varchar(50) DEFAULT NULL COMMENT '子站目录',
  `webprefix` varchar(50) DEFAULT NULL COMMENT '子站主机头',
  `opentypeids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PINYIN` (`pinyin`) USING BTREE,
  KEY `IDX_PID` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8