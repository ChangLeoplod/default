CREATE TABLE `sline_user_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(11) unsigned NOT NULL,
  `uid` int(6) unsigned NOT NULL,
  `username` char(50) NOT NULL,
  `loginfo` varchar(100) NOT NULL,
  `logip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2026 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC