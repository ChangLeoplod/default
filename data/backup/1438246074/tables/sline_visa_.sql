CREATE TABLE `sline_visa_` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `webid` int(11) unsigned DEFAULT '0',
  `aid` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '签证名称',
  `seotitle` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tagword` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL COMMENT '图片',
  `visatype` varchar(255) DEFAULT NULL COMMENT '签证类型',
  `handleday` varchar(255) DEFAULT NULL COMMENT '办理时间',
  `validday` varchar(255) DEFAULT NULL COMMENT '有效时间',
  `needinterview` int(1) unsigned DEFAULT '0' COMMENT '是否需要面签',
  `needletter` int(1) unsigned DEFAULT '0' COMMENT '是否需要邀请函',
  `price` varchar(255) DEFAULT NULL COMMENT '网站报价',
  `marketprice` varchar(255) DEFAULT NULL COMMENT '市场价',
  `feeinclude` text COMMENT '费用包含',
  `content` text COMMENT '内容介绍',
  `handlerange` varchar(255) DEFAULT NULL COMMENT '受理范围',
  `addtime` int(10) unsigned DEFAULT NULL,
  `modtime` int(10) unsigned DEFAULT NULL,
  `shownum` int(11) unsigned DEFAULT NULL,
  `areaid` varchar(255) DEFAULT NULL COMMENT '区域id',
  `nationid` varchar(255) DEFAULT NULL COMMENT '国家id',
  `displayorder` int(4) unsigned DEFAULT '9999',
  `partday` varchar(255) DEFAULT NULL COMMENT '停留时间',
  `acceptday` varchar(255) DEFAULT NULL COMMENT '受理时间',
  `handlepeople` varchar(255) DEFAULT NULL COMMENT '受理人群',
  `belongconsulate` varchar(255) DEFAULT NULL COMMENT '所属领事管',
  `cityid` int(20) unsigned DEFAULT NULL COMMENT '签发城市id',
  `booknotice` text COMMENT '预订须知',
  `material` text COMMENT '所需材料',
  `circuit` text,
  `friendtip` text COMMENT '温馨提示',
  `dingjin` varchar(255) DEFAULT NULL COMMENT '定金',
  `paytype` int(1) DEFAULT '1' COMMENT '支付方式',
  `material1` text,
  `material2` text,
  `material3` text,
  `material4` text,
  `material5` text,
  `ishidden` tinyint(4) DEFAULT '0',
  `satisfyscore` varchar(255) DEFAULT NULL,
  `bookcount` varchar(255) DEFAULT NULL,
  `jifenbook` int(11) DEFAULT NULL,
  `jifentprice` int(11) DEFAULT NULL,
  `jifencomment` int(11) DEFAULT NULL,
  `iconlist` varchar(255) DEFAULT NULL,
  `themelist` varchar(255) DEFAULT NULL,
  `yesjian` varchar(255) DEFAULT NULL,
  `supplierlist` varchar(255) DEFAULT NULL,
  `templet` varchar(255) DEFAULT NULL,
  `specialtip` text,
  `enternum` int(11) DEFAULT NULL COMMENT '入境次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC