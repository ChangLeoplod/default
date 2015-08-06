CREATE TABLE `sline_kindset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(2) unsigned DEFAULT '1',
  `typeid` int(11) unsigned DEFAULT '0' COMMENT '栏目类型',
  `aid` varchar(255) DEFAULT NULL COMMENT '线路id',
  `classid` varchar(255) DEFAULT NULL COMMENT '线路分类id',
  `displayorder` int(11) unsigned DEFAULT '9999' COMMENT '排序ID',
  `istejia` int(1) unsigned DEFAULT '0' COMMENT '特惠',
  `isding` int(1) unsigned DEFAULT '0' COMMENT '是否置顶',
  `isjian` int(1) unsigned DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC