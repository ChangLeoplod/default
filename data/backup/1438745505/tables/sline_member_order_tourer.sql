CREATE TABLE `sline_member_order_tourer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(255) DEFAULT '0' COMMENT '订单编号',
  `tourername` varchar(255) DEFAULT '0' COMMENT '游客姓名',
  `sex` enum('男','女') DEFAULT '男',
  `cardnumber` varchar(32) DEFAULT '0' COMMENT '证件号码',
  `passportno` varchar(32) DEFAULT '0',
  `mobile` varchar(15) DEFAULT '0' COMMENT '手机',
  `email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单游客表'