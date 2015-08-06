CREATE TABLE `sline_right_module` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8