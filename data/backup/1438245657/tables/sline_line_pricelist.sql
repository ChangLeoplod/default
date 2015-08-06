CREATE TABLE `sline_line_pricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT '1',
  `aid` int(11) unsigned DEFAULT NULL,
  `lowerprice` int(11) DEFAULT NULL,
  `highprice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='线路价格分段表'