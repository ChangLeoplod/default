CREATE TABLE `sline_article_gf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(1) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL COMMENT '段落标题',
  `content` mediumtext COMMENT '内容',
  `articleid` int(11) DEFAULT NULL COMMENT '攻略id',
  `displayorder` int(4) unsigned DEFAULT '9999' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='官方攻略信息配置表'