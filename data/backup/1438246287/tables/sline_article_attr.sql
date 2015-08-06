CREATE TABLE `sline_article_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT NULL,
  `aid` int(11) unsigned DEFAULT NULL,
  `attrname` varchar(255) DEFAULT NULL,
  `displayorder` int(11) unsigned DEFAULT NULL,
  `isopen` int(11) unsigned DEFAULT '0',
  `pid` int(10) DEFAULT NULL,
  `destid` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `issystem` int(1) DEFAULT '0' COMMENT '是否是系统属性',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC