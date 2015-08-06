CREATE TABLE `sline_line_spot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(2) unsigned NOT NULL DEFAULT '1',
  `lineid` int(11) unsigned DEFAULT NULL COMMENT '线路id',
  `spotname` varchar(255) DEFAULT '' COMMENT '景点名称',
  `spotid` int(11) DEFAULT NULL COMMENT '景点id',
  `litpic` mediumtext COMMENT '缩略图',
  `displayorder` int(11) DEFAULT '9999' COMMENT '显示顺序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='线路途径景点表'