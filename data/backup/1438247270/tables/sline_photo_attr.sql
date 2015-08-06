CREATE TABLE `sline_photo_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT NULL,
  `aid` int(11) unsigned DEFAULT NULL,
  `attrname` varchar(255) DEFAULT NULL,
  `displayorder` int(11) unsigned DEFAULT NULL,
  `isopen` int(1) unsigned DEFAULT '0',
  `pid` int(10) DEFAULT NULL,
  `issystem` int(1) NOT NULL DEFAULT '0',
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PID_ID` (`pid`,`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC