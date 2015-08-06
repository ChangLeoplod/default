CREATE TABLE `sline_relationship` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `webid` int(2) unsigned DEFAULT NULL,
  `kindid` int(11) unsigned DEFAULT NULL COMMENT '分类id',
  `destinationid` varchar(255) DEFAULT NULL COMMENT '对应目的地ID',
  `typeid` int(11) unsigned DEFAULT NULL COMMENT '栏目ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='分类与目的地对应关系表'