CREATE TABLE `sline_line_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT NULL,
  `aid` int(11) unsigned DEFAULT NULL,
  `attrname` varchar(255) DEFAULT NULL,
  `displayorder` int(11) unsigned DEFAULT NULL,
  `isopen` int(11) unsigned DEFAULT '0',
  `issystem` int(11) unsigned DEFAULT '0',
  `channeldispaly` int(1) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `destid` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC