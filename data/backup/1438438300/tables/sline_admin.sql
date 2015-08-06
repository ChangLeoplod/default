CREATE TABLE `sline_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sxw_name` varchar(255) DEFAULT NULL COMMENT '登陆搜行网的用户名',
  `logintime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(255) DEFAULT NULL,
  `roleid` int(6) DEFAULT NULL,
  `realname` varchar(30) DEFAULT NULL,
  `beizu` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8