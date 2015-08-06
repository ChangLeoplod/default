CREATE TABLE `sline_insurance_booking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookordersn` varchar(255) NOT NULL DEFAULT '0' COMMENT '所属性产品订单号',
  `booktype` int(255) DEFAULT NULL COMMENT '订单类型，比如线路1',
  `memberid` bigint(20) DEFAULT '0' COMMENT '会员ID',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '是否是子订单',
  `productcasecode` varchar(255) DEFAULT NULL COMMENT '保险方案号',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型',
  `insurednum` int(11) NOT NULL DEFAULT '0' COMMENT '被保人数量',
  `price` float(10,2) NOT NULL COMMENT '总价',
  `payprice` float(10,2) DEFAULT NULL COMMENT '客户支付价格',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '付款状态 , 0客户未付, 1,客户已付款, 2.购买成功',
  `applicationdate` date DEFAULT NULL COMMENT '投保时间',
  `begindate` date NOT NULL COMMENT '投保开始时间',
  `enddate` date NOT NULL COMMENT '投保结束时间',
  `destination` varchar(255) DEFAULT NULL COMMENT '出行目的地',
  `trippurposeid` varchar(100) DEFAULT NULL COMMENT '出行目的地代码',
  `visacity` varchar(100) DEFAULT NULL COMMENT '签证办理城市',
  `ordersn` varchar(255) NOT NULL COMMENT '订单号',
  `insureno` varchar(255) DEFAULT NULL COMMENT '投保单号',
  `policyno` varchar(255) DEFAULT NULL COMMENT '保险公司保单号  ',
  `policyfileid` varchar(255) DEFAULT NULL COMMENT '保单ID',
  `addtime` int(11) DEFAULT NULL,
  `modtime` int(11) DEFAULT NULL,
  `payedtime` int(11) DEFAULT NULL,
  `viewstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8