CREATE TABLE `sline_right` (
  `rightid` int(11) NOT NULL AUTO_INCREMENT,
  `rightname` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `typid` int(10) DEFAULT NULL,
  PRIMARY KEY (`rightid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8