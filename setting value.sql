-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.5.24-log - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dro.setting
DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(2) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dro.setting: ~12 rows (approximately)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `value`, `description`) VALUES
	(1, 'Prastimulya Educations', 'site name'),
	(2, 'Description Site cccc', 'Description Site'),
	(3, '021-82222', 'phone'),
	(4, 'Facebook Link:ssssss', 'Facebook Link:'),
	(5, 'Twitter Link: wdwdw', 'Twitter Link:'),
	(6, 'Jl. Supervise Block B Jakarta, Indonesia', 'Address'),
	(7, 'YYYY-MM-DD', 'date format'),
	(8, 'en', 'default language'),
	(9, 'UA-XXXXX-X', 'Google Analytics ID'),
	(10, 'sadjka@dkadjs.omv', 'email master'),
	(11, 'dsfs@dfsdfdsfs.dfs', 'email secondary'),
	(12, '021-82222', 'fax');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
