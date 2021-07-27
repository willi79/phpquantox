
/*Student List table*/
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(45),
  `grades1` decimal(4,2) DEFAULT NULL,
  `grades2` decimal(4,2) DEFAULT NULL,
  `grades3` decimal(4,2) DEFAULT NULL,
  `grades4` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
)

