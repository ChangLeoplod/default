CREATE TABLE `sline_car_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(11) DEFAULT NULL COMMENT 'sline对应ID',
  `kindname` varchar(255) DEFAULT NULL COMMENT '分类信息',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `tagword` varchar(255) DEFAULT NULL COMMENT '文章相关词',
  `title` varchar(255) DEFAULT NULL COMMENT '品牌栏目标题',
  `description` mediumtext COMMENT '信息描述',
  `aid` int(11) unsigned DEFAULT NULL,
  `displayorder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车务品牌表'