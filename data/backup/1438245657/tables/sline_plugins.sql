CREATE TABLE `sline_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `webid` int(2) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `datatables` varchar(255) DEFAULT NULL COMMENT '插件所使用的表',
  `copyright` varchar(255) DEFAULT NULL,
  `isopen` int(1) unsigned DEFAULT '0',
  `folder` varchar(255) DEFAULT NULL,
  `identify` varchar(255) DEFAULT NULL COMMENT '插件唯一标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC