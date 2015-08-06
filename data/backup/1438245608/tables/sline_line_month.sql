CREATE TABLE `sline_line_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(2) DEFAULT '1',
  `lineid` int(11) DEFAULT NULL COMMENT '线路id',
  `yearnum` int(11) DEFAULT NULL COMMENT '线路年份',
  `monthnum` varchar(255) DEFAULT NULL COMMENT '线路月份',
  `exname` varchar(50) NOT NULL,
  `exchange` varchar(50) NOT NULL,
  `basicprice` text NOT NULL,
  `profit` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='线路月份报价'