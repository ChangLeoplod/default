CREATE TABLE `sline_member_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `intime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC