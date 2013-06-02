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

-- Dumping structure for table newcms.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `default_image` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.gallery: ~2 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `title`, `description`, `default_image`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Test Gallery', 'z', '', 1, '2012-09-26 16:11:49', '2012-09-26 16:11:49'),
	(2, 'Monday', '', '', 1, '2012-09-27 00:38:58', '2012-09-27 00:38:58');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Dumping structure for table newcms.gallery_images
DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_description` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `img_src` varchar(200) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.gallery_images: ~0 rows (approximately)
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;


-- Dumping structure for table newcms.lang
DROP TABLE IF EXISTS `lang`;
CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lang` varchar(2) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `default` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.lang: ~2 rows (approximately)
/*!40000 ALTER TABLE `lang` DISABLE KEYS */;
INSERT INTO `lang` (`id`, `lang`, `language`, `default`) VALUES
	(1, 'en', 'English', 0),
	(2, 'id', 'Indonesia', 1);
/*!40000 ALTER TABLE `lang` ENABLE KEYS */;


-- Dumping structure for table newcms.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `layout` varchar(50) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.menu: ~4 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `layout`, `ordering`) VALUES
	(4, 'Top Menu', 'top-menu', 1),
	(5, 'Menu Headline', 'menu-headline', 1),
	(6, 'Footer Menu Left', 'footer_menu_left', 2),
	(7, 'Footer Menu Right', 'footer_menu_right', 3);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table newcms.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `fullday` int(11) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `img_src` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.news: ~3 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `news_title`, `start_date`, `end_date`, `url`, `fullday`, `user_id`, `img_src`) VALUES
	(5, 'Seminar Computer', '2013-05-21 09:53:40', '2013-05-21 09:53:40', 'seminar-computer', 1, NULL, NULL),
	(6, 'COba event baru', '2013-06-01 09:42:32', '2013-06-26 09:42:32', 'coba-event-baru', 0, NULL, NULL),
	(22, 'test event with image', '2013-06-01 09:58:12', '2013-06-12 09:58:12', 'test-event-with-image', 0, 3, 'Desert.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table newcms.news_lang
DROP TABLE IF EXISTS `news_lang`;
CREATE TABLE IF NOT EXISTS `news_lang` (
  `lang` varchar(2) DEFAULT NULL,
  `news_id` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `content` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  UNIQUE KEY `lang` (`lang`,`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.news_lang: ~18 rows (approximately)
/*!40000 ALTER TABLE `news_lang` DISABLE KEYS */;
INSERT INTO `news_lang` (`lang`, `news_id`, `title`, `subtitle`, `content`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
	('en', 5, 'Seminar Computer', 'hi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu accumsan neque. Phasellus non justo lorem. Aliquam vulputate placerat lorem, in facilisis urna malesuada non. Sed vel enim dui. Curabitur posuere neque id lectus ornare pharetra. Etiam volutpat sapien eu risus cursus tincidunt at vitae felis. Morbi eu sem ac metus bibendum sollicitudin sit amet vel purus. Vestibulum sed lectus leo. Ut aliquet mollis tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tellus elit, facilisis sagittis adipiscing pulvinar, dapibus sed ligula. Quisque quis porttitor eros.&nbsp;</p>\r\n\r\n<p>Praesent congue iaculis sollicitudin. Vivamus vel quam ac tortor vestibulum posuere. Sed sit amet lectus magna. Fusce nunc ligula, faucibus vel consectetur vel, blandit non ipsum. Donec fringilla metus eget mi aliquam at faucibus velit suscipit. Ut ipsum justo, venenatis id scelerisque in, pretium ut risus. Curabitur fermentum orci sed ante eleifend laoreet. Vivamus nec velit est. Integer sem arcu, dapibus a luctus vel, imperdiet venenatis augue. Mauris lacinia lectus non magna pretium elementum. Pellentesque egestas, lorem at suscipit lobortis, nibh eros eleifend urna, euismod blandit purus quam non velit. Donec ac quam at erat sollicitudin hendrerit sit amet ac magna. Aenean eget hendrerit elit. Mauris aliquet, magna ac sagittis tristique, ante diam fringilla lorem, vel varius erat risus eget risus. Pellentesque at purus eget nunc mattis pellentesque. Nam sollicitudin, orci ac viverra dignissim, arcu turpis rhoncus nulla, in iaculis velit nisl in sapien. Cras quis lorem tellus.</p>\r\n\r\n<p>Vivamus aliquam, sapien at pharetra commodo, lacus magna fermentum sem, eget feugiat ipsum leo dignissim nulla. Aenean sit amet viverra purus. Aenean interdum sem vitae mi interdum molestie. Sed vitae diam mi, ut congue leo. Ut bibendum ultrices tellus, dapibus venenatis magna ornare ac. Quisque augue arcu, scelerisque at pretium in, porttitor at justo. Pellentesque malesuada, nunc lacinia pharetra aliquam, sem neque ornare nunc, ut accumsan tortor risus id ipsum. Fusce sit amet viverra est. Suspendisse augue massa, venenatis a vulputate id, aliquet in felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vel massa arcu, sed mattis nunc. Sed eget arcu massa. Fusce leo diam, placerat eu ornare eget, sollicitudin non mauris. Nulla interdum, augue at iaculis blandit, dolor justo faucibus elit, quis porttitor risus metus eu diam. In sit amet dolor neque, sed semper arcu. Ut tristique vulputate lorem vel ultricies. Sed a purus eros, in sollicitudin nisi. Morbi et nisl nec risus laoreet viverra. Curabitur eu risus ac purus cursus tincidunt quis nec quam.&nbsp;</p>\r\n\r\n<p>Praesent et eros ut diam facilisis posuere. Aliquam viverra, tellus vel venenatis gravida, arcu ligula posuere est, vitae bibendum sem leo id massa. Mauris mollis rhoncus neque, non hendrerit enim lobortis in. Ut dapibus auctor rhoncus. Sed ultrices viverra purus id feugiat. Curabitur id ligula nec sem consequat porta nec nec nunc. Curabitur quis dui vitae ipsum ultrices vehicula et sed ligula. Maecenas lacinia enim quis nisi malesuada quis viverra mi pulvinar. Suspendisse bibendum felis ut elit dictum id tincidunt lorem molestie.</p>\r\n', 'z a', 'z a', 'z a'),
	('id', 5, 'Seminar Komputer', '-', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu accumsan neque. Phasellus non justo lorem. Aliquam vulputate placerat lorem, in facilisis urna malesuada non. Sed vel enim dui. Curabitur posuere neque id lectus ornare pharetra. Etiam volutpat sapien eu risus cursus tincidunt at vitae felis. Morbi eu sem ac metus bibendum sollicitudin sit amet vel purus. Vestibulum sed lectus leo. Ut aliquet mollis tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tellus elit, facilisis sagittis adipiscing pulvinar, dapibus sed ligula. Quisque quis porttitor eros.</p>\r\n\r\n<p>Praesent congue iaculis sollicitudin. Vivamus vel quam ac tortor vestibulum posuere. Sed sit amet lectus magna. Fusce nunc ligula, faucibus vel consectetur vel, blandit non ipsum. Donec fringilla metus eget mi aliquam at faucibus velit suscipit. Ut ipsum justo, venenatis id scelerisque in, pretium ut risus. Curabitur fermentum orci sed ante eleifend laoreet. Vivamus nec velit est. Integer sem arcu, dapibus a luctus vel, imperdiet venenatis augue. Mauris lacinia lectus non magna pretium elementum. Pellentesque egestas, lorem at suscipit lobortis, nibh eros eleifend urna, euismod blandit purus quam non velit. Donec ac quam at erat sollicitudin hendrerit sit amet ac magna. Aenean eget hendrerit elit. Mauris aliquet, magna ac sagittis tristique, ante diam fringilla lorem, vel varius erat risus eget risus. Pellentesque at purus eget nunc mattis pellentesque. Nam sollicitudin, orci ac viverra dignissim, arcu turpis rhoncus nulla, in iaculis velit nisl in sapien. Cras quis lorem tellus.</p>\r\n\r\n<p>Vivamus aliquam, sapien at pharetra commodo, lacus magna fermentum sem, eget feugiat ipsum leo dignissim nulla. Aenean sit amet viverra purus. Aenean interdum sem vitae mi interdum molestie. Sed vitae diam mi, ut congue leo. Ut bibendum ultrices tellus, dapibus venenatis magna ornare ac. Quisque augue arcu, scelerisque at pretium in, porttitor at justo. Pellentesque malesuada, nunc lacinia pharetra aliquam, sem neque ornare nunc, ut accumsan tortor risus id ipsum. Fusce sit amet viverra est. Suspendisse augue massa, venenatis a vulputate id, aliquet in felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vel massa arcu, sed mattis nunc. Sed eget arcu massa. Fusce leo diam, placerat eu ornare eget, sollicitudin non mauris. Nulla interdum, augue at iaculis blandit, dolor justo faucibus elit, quis porttitor risus metus eu diam. In sit amet dolor neque, sed semper arcu. Ut tristique vulputate lorem vel ultricies. Sed a purus eros, in sollicitudin nisi. Morbi et nisl nec risus laoreet viverra. Curabitur eu risus ac purus cursus tincidunt quis nec quam.</p>\r\n\r\n<p>Praesent et eros ut diam facilisis posuere. Aliquam viverra, tellus vel venenatis gravida, arcu ligula posuere est, vitae bibendum sem leo id massa. Mauris mollis rhoncus neque, non hendrerit enim lobortis in. Ut dapibus auctor rhoncus. Sed ultrices viverra purus id feugiat. Curabitur id ligula nec sem consequat porta nec nec nunc. Curabitur quis dui vitae ipsum ultrices vehicula et sed ligula. Maecenas lacinia enim quis nisi malesuada quis viverra mi pulvinar. Suspendisse bibendum felis ut elit dictum id tincidunt lorem molestie.</p>\r\n', 'z', 'z', 'z'),
	('en', 6, 'asdas', '', '<p>asdasd</p>\r\n', 'asd', 'a', 'a'),
	('id', 6, 'sdasd', '', '<p>asd</p>\r\n', 'a', 'a', 'a'),
	('en', 16, '', '', '', '', '', ''),
	('id', 16, '', '', '', '', '', ''),
	('en', 17, '', '', '', '', '', ''),
	('id', 17, '', '', '', '', '', ''),
	('en', 18, '', '', '', '', '', ''),
	('id', 18, '', '', '', '', '', ''),
	('en', 19, '', '', '', '', '', ''),
	('id', 19, '', '', '', '', '', ''),
	('en', 20, '', '', '', '', '', ''),
	('id', 20, '', '', '', '', '', ''),
	('en', 21, '', '', '', '', '', ''),
	('id', 21, '', '', '', '', '', ''),
	('en', 22, 'sss', 'sss', '<p>ss</p>\r\n', '', '', ''),
	('id', 22, 'sss', 'sss', '<p>ssss</p>\r\n', '', '', '');
/*!40000 ALTER TABLE `news_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.page
DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(200) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `is_home` int(1) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `layout` varchar(200) DEFAULT NULL,
  `protected` int(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.page: ~22 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `page_name`, `menu_id`, `url`, `order`, `parent`, `is_home`, `publish`, `layout`, `protected`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'home', 4, 'home', 1, 0, 0, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'about', 4, 'about', 2, 0, 0, 1, 'about', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'contact us', 4, 'contact-us', 3, 0, 0, 1, 'contact', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Company Profile', 4, 'company-profile', 0, 3, 0, 1, 'about', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Consultant Profile', 4, 'consultant-profile', 0, 3, 0, 1, 'about', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'news & events', 4, 'news', 6, 0, 0, 1, 'news', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'What Thay Say', 4, 'what-they-say', 7, 0, 0, 1, 'blogs', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'registers', 4, 'registers', 5, 0, 0, 1, 'registers', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'programs', 4, 'programs', 4, 0, 0, 1, 'programs', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'footer programs', 6, 'programs', 1, 0, 0, 1, 'programs', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'footer Schedules', 6, 'schedules', 2, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'Admission', 6, 'admission', 3, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'Customer Service', 6, 'customer-service', 4, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'Help & FAQ', 6, 'help-and-faq', 5, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'Sitemap', 7, 'sitemap', 1, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'Privacy Policy', 7, 'privacy-policy', 2, 0, 0, 1, 'singlepage', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 'WHO WE ARE', 5, 'who-we-are', 1, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 'WHAT WE OFFER', 5, 'what-we-offer', 2, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 'HOW WE DO IT', 5, 'how-we-do-it', 3, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 'WHAT WE DO', 5, 'what-we-do', 4, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 'YOUR CAREER', 5, 'your-career', 6, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 'OUR COMMITMENT', 5, 'our-commitment', 8, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


-- Dumping structure for table newcms.page_lang
DROP TABLE IF EXISTS `page_lang`;
CREATE TABLE IF NOT EXISTS `page_lang` (
  `lang` varchar(3) NOT NULL,
  `page_id` int(11) unsigned NOT NULL,
  `url` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `nav_title` varchar(255) NOT NULL DEFAULT '',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `online` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`lang`,`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.page_lang: ~44 rows (approximately)
/*!40000 ALTER TABLE `page_lang` DISABLE KEYS */;
INSERT INTO `page_lang` (`lang`, `page_id`, `url`, `title`, `subtitle`, `nav_title`, `meta_title`, `meta_description`, `meta_keywords`, `online`) VALUES
	('en', 1, '', 'Home', '', 'home', 'a', 'a', 'a', 1),
	('en', 3, '', 'About Us', '', 'about us', 'a', 'a', 'a', 1),
	('en', 4, '', 'Contact Us', '', 'Contact Us', 'Contact Us', 'Contact us prastimulya', 'prastimulya, eli, ', 1),
	('en', 5, '', 'Company Profile', '', 'Company Profile', 'a', 'a', 'a', 1),
	('en', 6, '', 'Consultant Profile', '', 'Consultant Profile', 'a', 'a', 'a', 1),
	('en', 7, '', 'News & Events', '', 'News & Events', 'a', 'a', 'a', 1),
	('en', 8, '', 'What They Say', '', 'What They Say', 'a', 'a', 'a', 1),
	('en', 9, '', 'Register', '', 'Register', 'Register', 'Register', 'Register', 1),
	('en', 10, '', 'programs', '', 'programs', 'a', 'a', 'a', 1),
	('en', 11, '', 'Programs', '', 'Programs', 'a', 'a', 'a', 1),
	('en', 12, '', 'Schedules', '', 'Schedules', 'a', 'a', 'a', 1),
	('en', 13, '', 'Admission', '', 'Admission', 'a', 'a', 'a', 1),
	('en', 14, '', 'Customer Service', '', 'Customer Service', 'a', 'a', 'a', 1),
	('en', 15, '', 'Help & FAQ', '', 'Help & FAQ', 'a', 'a', 'a', 1),
	('en', 16, '', 'Sitemap', '', 'Sitemap', 'a', 'a', 'a', 1),
	('en', 17, '', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 1),
	('en', 18, '', 'WHO WE ARE', '', 'WHO WE ARE', 'a', 'a', 'a', 1),
	('en', 19, '', 'WHAT WE OFFER', '', 'WHAT WE OFFER', 'a', 'a', 'a', 1),
	('en', 20, '', 'HOW WE DO IT', '', 'HOW WE DO IT', 'a', 'a', 'a', 1),
	('en', 21, '', 'What We Do', '', 'What We Do', 'a', 'a', 'a', 1),
	('en', 22, '', 'YOUR CAREER', '', 'YOUR CAREER', 'a', 'a', 'a', 1),
	('en', 23, '', 'OUR COMMITMENT', '', 'OUR COMMITMENT', 'a', 'a', 'a', 1),
	('id', 1, '', 'beranda', '', 'beranda', 's', 's', 's', 1),
	('id', 3, '', 'Tentang Kami', '', 'tentang kami', 'a', 'a', 'a', 1),
	('id', 4, '', 'Kontak Kami', '', 'Kontak Kami', 'kontak kami', 'kontak prastimulya', 'prastimulya, eli, cbn', 1),
	('id', 5, '', 'Profil Perusahaan', '', 'Profil Perusahaan', 'a', 'a', 'a', 1),
	('id', 6, '', 'Profil Konsultan', '', 'Profil Konsultan', 'a', 'a', 'a', 1),
	('id', 7, '', 'Berita & Kegiatan', '', 'Berita & Kegiatan', 'a', 'a', 'a', 1),
	('id', 8, '', 'Mereka Berkata', '-', 'mereka berkata', 'a', 'a', 'a', 1),
	('id', 9, '', 'Registrasi', '', 'registrasi', 'registrasi', 'registrasi', 'registrasi', 1),
	('id', 10, '', 'program', '', 'program', 'program', 'program', 'program', 1),
	('id', 11, '', 'Program', '', 'Program', 'a', 'a', 'a', 1),
	('id', 12, '', 'Jadwal', '', 'Jadwal', 'a', 'a', 'a', 1),
	('id', 13, '', 'Penerimaan', '', 'Penerimaan', 'a', 'a', 'a', 1),
	('id', 14, '', 'Layanan', '', 'Layanan', 'a', 'a', 'a', 1),
	('id', 15, '', 'Help & FAQ', '', 'Help & FAQ', 'a', 'a', 'a', 1),
	('id', 16, '', 'Peta Situs', '', 'Peta Situs', 'a', 'a', 'a', 1),
	('id', 17, '', 'Kebijakan Privasi', '', 'Kebijakan Privasi', 'Kebijakan Privasi', 'Kebijakan Privasi', 'Kebijakan Privasi', 1),
	('id', 18, '', 'TENTANG KAMI', '', 'TENTANG KAMI', 'a', 'a', 'a', 1),
	('id', 19, '', 'KAMI MENAWARKAN', '', 'KAMI MENAWARKAN', 'a', 'a', 'a', 1),
	('id', 20, '', 'KAMI MELAYANI MELALUI', '', 'KAMI MELAYANI MELALUI', 'a', 'a', 'a', 1),
	('id', 21, '', 'Apa Yang Kami Tawarkan', '', 'Apa Yang Kami Tawarkan', 'a', 'a', 'a', 1),
	('id', 22, '', 'LOWONGAN KERJA', '', 'LOWONGAN KERJA', 'a', 'a', 'a', 1),
	('id', 23, '', 'KOMITMEN KAMI', '', 'KOMITMEN KAMI', 'q', 'aa', 'a', 1);
/*!40000 ALTER TABLE `page_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.periode_courses
DROP TABLE IF EXISTS `periode_courses`;
CREATE TABLE IF NOT EXISTS `periode_courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode` varchar(200) DEFAULT NULL,
  `actived` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.periode_courses: ~2 rows (approximately)
/*!40000 ALTER TABLE `periode_courses` DISABLE KEYS */;
INSERT INTO `periode_courses` (`id`, `periode`, `actived`) VALUES
	(1, 'Jan 2013 - Mar 2013', 1),
	(3, '12 Desember 2012 - 13 Januari 2013', 1);
/*!40000 ALTER TABLE `periode_courses` ENABLE KEYS */;


-- Dumping structure for table newcms.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `enable_comment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `img_src` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.posts: ~4 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `post_name`, `url`, `created_by`, `enable_comment`, `created_at`, `updated_at`, `img_src`) VALUES
	(2, 'Posting yang pertama', 'posting-yang-pertama', 3, 0, '2013-05-31 07:27:14', '2013-05-31 07:36:33', NULL),
	(3, 'Testing posting lagi aja', 'testing-posting-lagi-aja', 3, 0, '2013-05-31 07:39:00', '0000-00-00 00:00:00', NULL),
	(4, 'Testing posting lagi ajaa', 'testing-posting-lagi-ajaa', 3, 0, '2013-06-01 03:06:38', '2013-06-01 03:08:19', ''),
	(5, 'aaa', 'aaa', 3, 0, '2013-06-01 03:08:31', '2013-06-01 03:08:53', '053fc14040f39c6039662f2b40298d09.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table newcms.posts_lang
DROP TABLE IF EXISTS `posts_lang`;
CREATE TABLE IF NOT EXISTS `posts_lang` (
  `lang` varchar(2) DEFAULT NULL,
  `post_id` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  UNIQUE KEY `lang` (`lang`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.posts_lang: ~8 rows (approximately)
/*!40000 ALTER TABLE `posts_lang` DISABLE KEYS */;
INSERT INTO `posts_lang` (`lang`, `post_id`, `title`, `subtitle`, `content`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
	('en', 2, 'testing posting', 'aa', '<p>asdasd</p>\r\n', 'a', 'a', 'a'),
	('id', 2, 'Testing posting', '', '<p>asdasd</p>\r\n', 'aa', 'a', 'a'),
	('en', 3, 'english kali yah', '', '<pre>\r\nobject(stdClass)[30]\r\n  public &#39;lang&#39; =&gt; string &#39;en&#39; (length=2)\r\n  public &#39;post_id&#39; =&gt; string &#39;2&#39; (length=1)\r\n  public &#39;title&#39; =&gt; string &#39;testing posting&#39; (length=15)\r\n  public &#39;subtitle&#39; =&gt; string &#39;aa&#39; (length=2)\r\n  public &#39;content&#39; =&gt; string &#39;&lt;p&gt;asdasd&lt;/p&gt;\r\n&#39; (length=15)\r\n  public &#39;meta_title&#39; =&gt; string &#39;a&#39; (length=1)\r\n  public &#39;meta_keywords&#39; =&gt; string &#39;a&#39; (length=1)\r\n  public &#39;meta_description&#39; =&gt; string &#39;a&#39; (length=1)\r\n  public &#39;id&#39; =&gt; string &#39;2&#39; (length=1)\r\n  public &#39;post_name&#39; =&gt; string &#39;Posting yang pertama&#39; (length=20)\r\n  public &#39;url&#39; =&gt; string &#39;posting-yang-pertama&#39; (length=20)\r\n  public &#39;created_by&#39; =&gt; string &#39;3&#39; (length=1)\r\n  public &#39;enable_comment&#39; =&gt; string &#39;0&#39; (length=1)\r\n  public &#39;created_at&#39; =&gt; string &#39;2013-05-31 07:27:14&#39; (length=19)\r\n  public &#39;updated_at&#39; =&gt; string &#39;2013-05-31 07:36:33&#39; (length=19)</pre>\r\n', 'a', 'a', 'a'),
	('id', 3, 'asdasdasdas', '', '<p>asdasdasd</p>\r\n', 'a', 'a', 'a'),
	('en', 4, 'aaaa', 'aaaa', '<p>aa</p>\r\n', 'aa', 'a', 'a'),
	('id', 4, 'aaaaa', 'aaaa', '<p>aaaa</p>\r\n', '', '', ''),
	('en', 5, '', '', '', '', '', ''),
	('id', 5, '', '', '', '', '', '');
/*!40000 ALTER TABLE `posts_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.programs
DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `program` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `first_program` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `parent` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.programs: ~5 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `program`, `price`, `first_program`, `url`, `parent`) VALUES
	(1, 'Public Courses Programs', 100000, 1, '', 0),
	(2, 'Certificate Programs', 140000, 0, '', 0),
	(3, 'International Certificate Program', 140000, 0, '', 2),
	(4, 'Managerial Courses', 140000, 0, '', 1),
	(27, 'Test Program', 10000, 0, 'test-program', 4);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;


-- Dumping structure for table newcms.program_lang
DROP TABLE IF EXISTS `program_lang`;
CREATE TABLE IF NOT EXISTS `program_lang` (
  `lang` varchar(2) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `program_name` varchar(200) DEFAULT NULL,
  `content` text,
  UNIQUE KEY `lang` (`lang`,`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.program_lang: ~10 rows (approximately)
/*!40000 ALTER TABLE `program_lang` DISABLE KEYS */;
INSERT INTO `program_lang` (`lang`, `program_id`, `program_name`, `content`) VALUES
	('id', 1, 'INdonesia Ol', '<p>in Indonesia</p>\r\n'),
	('en', 1, 'English Pliss', '<p>English plis</p>\r\n'),
	('id', 2, 'Sertiofication Programs', '<p>jkhkaskd</p>\r\n'),
	('en', 2, 'Program Sertifikat', '<p>asdasd</p>\r\n'),
	('id', 3, 'Sertifikat Internasional Program', '<p>asdasd</p>\r\n'),
	('en', 3, 'International Certificate Program', '<p>asdasd</p>\r\n'),
	('id', 4, 'Hello', '<p>askld</p>\r\n'),
	('en', 4, 'Wheybb', '<p>asd</p>\r\n'),
	('en', 27, 'Test Program in Indonesia', '<p>Aku Suka Kamu</p>\r\n'),
	('id', 27, 'Test Program in English', '<p>asd</p>\r\n');
/*!40000 ALTER TABLE `program_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` text,
  `lang` varchar(3) DEFAULT NULL,
  `starting` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.questions: ~3 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `question`, `lang`, `starting`) VALUES
	(2, 'Latar belakang pendidikan saya adalah jurusan bisnis/ manajemen', 'id', 1),
	(3, 'Silakan pilih salah satu dari posisi Anda saat ini dalam organisasi?', 'en', 1),
	(5, 'New Question ?', 'en', 0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Dumping structure for table newcms.question_options
DROP TABLE IF EXISTS `question_options`;
CREATE TABLE IF NOT EXISTS `question_options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) DEFAULT NULL,
  `option` varchar(250) DEFAULT NULL,
  `next_questions_id` int(11) DEFAULT NULL,
  `end_question` int(10) NOT NULL DEFAULT '0',
  `recommendation_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.question_options: ~6 rows (approximately)
/*!40000 ALTER TABLE `question_options` DISABLE KEYS */;
INSERT INTO `question_options` (`id`, `question_id`, `option`, `next_questions_id`, `end_question`, `recommendation_id`) VALUES
	(9, 2, 'Ya', NULL, 1, 1),
	(10, 2, 'Tidak', NULL, 1, 2),
	(11, 3, 'aaaa', 5, 0, 0),
	(12, 3, 'Kok', 0, 1, 107),
	(16, 5, 'asdasd', 0, 1, 111),
	(17, 5, 'dasdasd', 0, 1, 112);
/*!40000 ALTER TABLE `question_options` ENABLE KEYS */;


-- Dumping structure for table newcms.registrations
DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `personal` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `participant_of` int(11) DEFAULT '0',
  `date_of_birth` date DEFAULT NULL,
  `gander` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name_com` varchar(100) DEFAULT NULL,
  `email_com` varchar(100) DEFAULT NULL,
  `indrustry_com` varchar(100) DEFAULT NULL,
  `address_com` varchar(100) DEFAULT NULL,
  `code_com` varchar(10) DEFAULT NULL,
  `city_com` varchar(100) DEFAULT NULL,
  `country_com` varchar(100) DEFAULT NULL,
  `phone_com` varchar(100) DEFAULT NULL,
  `fax_com` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.registrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` (`id`, `personal`, `first_name`, `last_name`, `birth_place`, `participant_of`, `date_of_birth`, `gander`, `mobile_phone`, `job_title`, `email`, `name_com`, `email_com`, `indrustry_com`, `address_com`, `code_com`, `city_com`, `country_com`, `phone_com`, `fax_com`) VALUES
	(4, 0, 'Abdul', 'Anshari', 's', 1, '0000-00-00', '0', '622158901717', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 0, 's', 'sd', 'sd', 1, '0000-00-00', 'Male', 'sd', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 1, 'Adub', 'a', NULL, 0, NULL, 'Male', NULL, 'asd', 'asd@asd.com', '', '', '', '', '', '', '', '', ''),
	(7, 0, 'Anshari', 'Anshari', 'a', 6, '0000-00-00', 'Male', '622158901717', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;


-- Dumping structure for table newcms.registration_program
DROP TABLE IF EXISTS `registration_program`;
CREATE TABLE IF NOT EXISTS `registration_program` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `registration_id` int(10) DEFAULT NULL,
  `program_id` int(10) DEFAULT NULL,
  `periode_id` int(10) DEFAULT NULL,
  `date_registration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.registration_program: ~8 rows (approximately)
/*!40000 ALTER TABLE `registration_program` DISABLE KEYS */;
INSERT INTO `registration_program` (`id`, `registration_id`, `program_id`, `periode_id`, `date_registration`) VALUES
	(1, 1, 27, 1, '2013-06-02 15:45:04'),
	(2, 1, 3, 1, '2013-06-02 15:45:06'),
	(3, 2, 27, 1, '2013-06-02 15:45:13'),
	(4, 3, 27, 1, '2013-06-02 15:55:33'),
	(5, 4, 27, 1, '2013-06-02 16:01:42'),
	(6, 5, 27, 1, '2013-06-02 16:19:04'),
	(7, 6, 27, 3, '2013-06-02 17:04:53'),
	(8, 7, 27, 3, '2013-06-02 17:05:38');
/*!40000 ALTER TABLE `registration_program` ENABLE KEYS */;


-- Dumping structure for table newcms.sections
DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sections: ~9 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `page_id`, `order`, `section_name`, `created_by`) VALUES
	(6, 18, 0, 'WHO WE ARE', 3),
	(7, 19, 0, 'WHAT WE OFFER', 3),
	(8, 20, 0, 'HOW WE DO IT', 3),
	(9, 21, 0, 'What We Do', 3),
	(10, 23, 0, 'OUR COMMITMENT', 3),
	(11, 22, 0, 'Your Career', 3),
	(12, 3, 0, 'ABOUT US', 3),
	(13, 5, 0, 'company profile', 3),
	(14, 6, 0, 'Consultant Profile', 3);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;


-- Dumping structure for table newcms.section_lang
DROP TABLE IF EXISTS `section_lang`;
CREATE TABLE IF NOT EXISTS `section_lang` (
  `section_id` int(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  UNIQUE KEY `sectionlang` (`lang`,`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.section_lang: ~6 rows (approximately)
/*!40000 ALTER TABLE `section_lang` DISABLE KEYS */;
INSERT INTO `section_lang` (`section_id`, `lang`, `title`, `subtitle`, `content`) VALUES
	(6, 'en', 'Who We Are', '', '<p>Dates back to May 19, 1980, when a group of prominent business leaders in Indonesia set up the Prasetiya Mulya Foundation (YPM) as a commitment to give real contributions to the nation. The words of Prasetiya Mulya is the Sanskrit words for noble pledge; the name that was given by the President of Republic of Indonesia.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="float:right; margin:20px 0px" /></p>\r\n\r\n<p>With a mission to develop professionalism in Indonesia business management practices that anchored to the sound management knowledge and skill, Prasetiya Mulya Foundation established the Management Development Centre in 1982, which later became the Prasetiya Mulya Institute of Management (IMPM) ; a not for profit organization to provide management education and training. Beside executive management courses and development program for small and medium enterprises, Prasetiya Mulya Institute of Management also initiated the first MBA program in Indonesia.</p>\r\n\r\n<p>In 1993, the Prasetiya Mulya Institute of Management which offered the MBA program was renamed to the Sekolah Tinggi Manajemen Prasetiya Mulya (Prasetiya Mulya School of Management), in compliance with new regulations of Indonesia Ministry of Education. These new regulations also required the replacement of Master of Business Administration (MBA) degree with a Magister Management (MM). Meanwhile, the executive learning programs which not offer the academic degree still be managed under Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). In 2000, with an objective to promote the existence of business school in Indonesia, we decided to use Prasetiya Mulya Business School as our corporate brand. In order to strengthen the brand of Prasetiya Mulya Business School, we are offering our services in business management education either for academic degree or executive programs under single brand.</p>\r\n\r\n<p>The enhancement of our services in academic programs as well as in the executive programs, the escalation of quality requirement in both programs, the increasing flexibility needed to cope with the business dynamics and the burgeoning demand of contextualization and customized solution in developing business people certainly require full hearted people, a focus management team and specific competencies to be developed further. All of these things are necessitated to improve our services, to enhance the impact of the solution and to maintain our commitment in developing human asset value of the business. This was what we have done since 2009 to enhance our services to Indonesia business world in non academic development programs.</p>\r\n\r\n<p>With more than 30 years experiences in partnering with numerous companies in developing reliable talents and with, the continuous development in the management knowledge and business contextualization Prasetiya Mulya Executive Learning Institute, formerly known as Lembaga Manajemen (Prasetiya Mulya Institute of Management), is ready for partnering with you to develop a higher value of human asset in your company, not only to improve the business performance but also to enhance the contribution in transforming Indonesia business world better.</p>\r\n'),
	(7, 'en', 'What We Offer', '', '<p>--</p>\r\n'),
	(8, 'en', 'How We Do It', '', '<p>In its action for more than thirty years, Prasetiya Mulya Executive Learning Institute (PM ELI) constantly position itself as partner for business leaders who believe that human are their main capital in developing and sustaining the life of business. We always feel honored in contributing solutions in building, refreshing, developing and bridging business people&rsquo;s competencies gaps. We are also proud if we could share our thought to be one of solutions to develop the sustainable competitive advantage.<br />\r\n<br />\r\nThrough structured plans, materials and methods based on competencies, we provide answer to current business challenges as well as the future challenges. With the combination of business insight in short course programs, deeper knowledge and capabilities&rsquo; enhancement of the certificates in management program (CBM and PSCM) , both are designed specially, systematically, contextually and&nbsp; integrated, we are ready to be the partner in transforming mindsets and developing capabilities of business people.<br />\r\n<br />\r\nIf you:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Have&nbsp;certainly known capabilities or competencies to be built</li>\r\n	<li>And&nbsp;have&nbsp;certainly known the linkages with materials or topics specifically</li>\r\n	<li>And&nbsp;have&nbsp;certainly known the linkages between each topic to build competencies systematically, and purposely.&nbsp;</li>\r\n</ul>\r\n\r\n<p>Please learn this catalog to determine your choice&nbsp;If you:</p>\r\n\r\n<ul>\r\n	<li>Have not&nbsp;known with certainty the capabilities or competencies to be built</li>\r\n	<li>Or have not&nbsp;known with certainty the linkages with materials or topics</li>\r\n	<li>Or have not&nbsp;known with certainty of the linkages between each topic to build competencies systematically and purposely.</li>\r\n</ul>\r\n\r\n<p>Contact us to help you in formulating those matters</p>\r\n'),
	(9, 'en', 'What We Do', '', '<p>-----</p>\r\n'),
	(10, 'en', 'Our Commitment', '', '<p>---</p>\r\n'),
	(11, 'en', 'Your Career', '', '<p>--</p>\r\n'),
	(12, 'en', 'Company Profile', '', '<p>Dates back to May 19, 1980, when a group of prominent business leaders in Indonesia set up the Prasetiya Multya Foundation (YPM) as a commitment to give real contributions to the nation. The words of Prasetiya Mulya is the Sanskrit words for noble pledge; the name that was given by the President of Republic of Indonesia.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="margin:0px; width:600px" /></p>\r\n\r\n<p>With a mission to develop professionalism in Indonesia business management practices that anchored to the sound management knowledge and skill, Prasetiya Mulya Foundation established the Management Development Centre in 1982, which later became the Prasetiya Mulya Institute of Management (IMPM) ; a not for profit organization to provide management education and training Beside executive management courses and development program for small and medium enterprises, Prasetiya Mulya Institute of Management also initiated the first MBA program in Indonesia.</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/company-profile">Read more ...</a></p>\r\n\r\n<p>Consultants Profile</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/consultant.jpg" style="margin:0px" /></p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vulputate, velit sit amet volutpat consequat, ligula mauris blandit</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/consultant-profile">Read more ...</a></p>\r\n\r\n<p>Our Mission</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mission.jpg" style="margin:0px" /></p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vulputate, velit sit amet volutpat consequat, ligula mauris blandit</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/vission-mission">Read more ...</a></p>\r\n'),
	(13, 'en', 'Company Profile', '', '<p>Dates back to May 19, 1980, when a group of prominent business leaders in Indonesia set up the Prasetiya Mulya Foundation (YPM) as a commitment to give real contributions to the nation. The words of Prasetiya Mulya is the Sanskrit words for noble pledge; the name that was given by the President of Republic of Indonesia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="margin:0px" /></p>\r\n\r\n<p>With a mission to develop professionalism in Indonesia business management practices that anchored to the sound management knowledge and skill, Prasetiya Mulya Foundation established the Management Development Centre in 1982, which later became the Prasetiya Mulya Institute of Management (IMPM) ; a not for profit organization to provide management education and training. Beside executive management courses and development program for small and medium enterprises, Prasetiya Mulya Institute of Management also initiated the first MBA program in Indonesia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In 1993, the Prasetiya Mulya Institute of Management which offered the MBA program was renamed to the Sekolah Tinggi Manajemen Prasetiya Mulya (Prasetiya Mulya School of Management), in compliance with new regulations of Indonesia Ministry of Education. These new regulations also required the replacement of Master of Business Administration (MBA) degree with a Magister Management (MM). Meanwhile, the executive learning programs which not offer the academic degree still be managed under Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). In 2000, with an objective to promote the existence of business school in Indonesia, we decided to use Prasetiya Mulya Business School as our corporate brand. In order to strengthen the brand of Prasetiya Mulya Business School, we are offering our services in business management education either for academic degree or executive programs under single brand.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The enhancement of our services in academic programs as well as in the executive programs, the escalation of quality requirement in both programs, the increasing flexibility needed to cope with the business dynamics and the burgeoning demand of contextualization and customized solution in developing business people certainly require full hearted people, a focus management team and specific competencies to be developed further. All of these things are necessitated to improve our services, to enhance the impact of the solution and to maintain our commitment in developing human asset value of the business. This was what we have done since 2009 to enhance our services to Indonesia business world in non academic development programs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With more than 30 years experiences in partnering with numerous companies in developing reliable talents and with, the continuous development in the management knowledge and business contextualization Prasetiya Mulya Executive Learning Institute, formerly known as Lembaga Manajemen (Prasetiya Mulya Institute of Management), is ready for partnering with you to develop a higher value of human asset in your company, not only to improve the business performance but also to enhance the contribution in transforming Indonesia business world better.</p>\r\n'),
	(14, 'en', 'Consultant Profile', '', '<h3>Consultant Profile</h3>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/sitanggang.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Ir. Gerhard Sitanggang, MM, MBA</h3>\r\n\r\n<p>Director of Executive Learning Institute</p>\r\n\r\n<p>A Bachelor Graduate from Physics Engineering Faculty of ITB, as well as MM graduate IPMI and MBA graduate from Mt. Eliza Business School of Monash University, Australia, was a practitioner in service engineering , business analyst and client service with major worldwide companies, i.e Coca Cola and Amatil amongst others.<br />\r\nJoining Astra Management Development Institute as senior faculty member was his first step engagement in the field of education till he decided to be part of Prasetiya Mulia Business School (PMBS) in June 2010. He is currently a director of Executive Learning Institute of PMBS.<br />\r\nHis area of expertise is in strategic management with experiences facilitating Astra group&rsquo;s executives in business planning and as well as chief jury of Astra Quality convention. He has been exposing in designing, conducting, and lecturing for executive development program in various companies since joining PMBS.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/santosa.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Switomo Santoso Ak., MBA, CPMA, CFP</h3>\r\n\r\n<p>CPMA &amp; CFP</p>\r\n\r\n<p>Holder of MBA degree from California State University, USA. He is also a Registered Accountant from Brawijaya University. His 20 years business experiences span from retail, automotive, banking, financial, education, consultancy, service, export-import and manufacturing. He has working exposures abroad and in some multinational companies within various divisions. His expertises include such areas as Finance, Accounting, Managerial Leadership, Supply Chain, Human Resources, Personal Development and Sales / Marketing. He has training proficiencies in hard skill as well as soft skill. Furthermore, he was awarded professional qualifications in CPMA (Certified Professional Management Accountant) and CFP (Certified Financial Planner).</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mely.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Mely Simpony, MBA</h3>\r\n\r\n<p>A retired practitioner, she is an alumni of UALR, USA where she earned her MBA degree. She started her first job at big five before moving around Asia Pacific countries with major players of Worldwide Companies in different industries. Started as external auditor and consultant with Arthur Andersen before climbing her career up to country CFO Indonesia, Regional Financial Controller and CFO Asia Pacific, she has major exposures in the industry of Banking, Advertising and Market Research.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/endang.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>M. A Endang Tatiana, MM</h3>\r\n\r\n<p>She is a holder of Magister Management from Universitas Indonesia. She had more than 15 years working experience before joining Prasetiya Mulya Business School. Her professional exposures include Auto 2000, Lippo Life and Anugerah Pharmindo Lestari and was a lecturer in several renowned universities. In the world of training, she had intensive skills and competencies in designing and facilitating various training programs such as HR for non HR, Performance Management, Presentation Skills, Leadership, Supervisory and Change Management. In the areas of consulting, she was highly involved in some high-level projects like Competency Based Training Building Blocks, Performance Management System, Development Program for Management Trainees, dan Job Analysis</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/deddi.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Deddi Tedjakumara</h3>\r\n\r\n<p>Executive Director</p>\r\n\r\n<p>Executive Director of Executive Learning Institute of Prasetiya Mulya Business School (PMBS). With more than 15 years of professional teaching experience, he was voted as the best faculty member by PMBS&rsquo; MBA students for three years in the row.<br />\r\nHaving expertise and interest in the area of business planning, strategic development, corporate finance, not for profit management, and social venture, he has been engaging in business planning and strategic development consulting as well in designing and conducting workplace learning and performance development program in many companies</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mawar.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Mawar Sheila, MM, M.Psi (MS)</h3>\r\n\r\n<p>A Psychologist from Padjadjaran University&rsquo;s Bachelor and Professional Psychology Program, she holds a Magister Management degree from Prasetiya Mulya Business School.<br />\r\nExperienced in consultative assessments with a wide range of employees nationwide for reputable state owned and private companies (among many others ASDP, Buana Finance, Taspen, Sugar Group Companies, Kompas Group, etc) accumulated her in-depth knowledge and understanding of people, business and industry.<br />\r\nMawar was entrusted to set up the admission office and selection process for the Prasetiya Mulya Undergraduate Program whilst helping the Marketing activities. Later she headed the Career Development and Alumni Relations Division for the graduate program where she designed and executed various development programs. This fueled her passion in developing people and significantly increased her managerial competence and acumen as well as enhanced her skills as Facilitator, Assessor, Consultant, and a Coach.</p>\r\n'),
	(6, 'id', 'Tentang Kami', '', '<p>Pada tanggal 19 Mei 1980, sekelompok pemimpin bisnis terkemuka di Indonesia sepakat untuk mendirikan Yayasan Prasetiya Mulya (YPM) sebagai salah satu bentuk komitmen mereka untuk memberikan kontribusi nyata untuk bangsa Indonesia. Presiden Republik Indonesia pada tahun 1980, Bapak Soeharto, member nama &lsquo;Prasetiya Mulya&rsquo; kepada yayasan ini dan 2 kata tersebut merupakan bahasa Sansekerta yang memiliki arti janji mulya.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="float:right; margin:20px 0px" /></p>\r\n\r\n<p>Dengan misi untuk mengembangkan profesionalisme dalam praktek manajemen bisnis di Indonesia melalui manajemen ilmu pengetahuan dan keterampilan, Yayasan Prasetiya Mulya mendirikan Pusat Pengembangan Manajemen (Management Development Center) pada tahun 1982, yang kemudian berubah menjadi Institute of Management Prasetiya Mulya (IMPM). IMPM sendiri merupakan sebuah organisasi (non-profit organization) yang bertanggungjawab menyediakan pendidikan manajemen serta pelatihannya. Selain kursus manajemen eksekutif dan program pengembangan usaha kecil-menengah, Institute of Management Prasetiya Mulya juga memprakarsai program MBA pertama di Indonesia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pada tahun 1993, Institute of Management Prasetiya Mulya (IMPM) yang menawarkan program MBA ini kemudian diubah namanya menjadi Sekolah Tinggi Manajemen Prasteiya Mulya. Pengubahan nama ini disesuaikan dengan peraturan baru Departemen Pendidikan di Indonesia. Dengan berlakunya peraturan tersebut juga membuat Prasetiya Mulya mengubah nama program yang awalnya Master of Business Administration (MBA) menjadi Magister Manajemen (MM). Dengan adanya perubahan nama ini, tidak berpengaruh pada program pembelajaran eksekutif yang tidak menawarkan gelar akademis. Program tersebut tetap akan dikelola di bawah Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). Di tahun 2000, dengan tujuan mempromosikan keberadaan sekolah bisnis di Indonesia, kami memutuskan untuk menggunakan Prasetiya Mulya Business School sebagai merek (brand) dari perusahaan kami. Dalam rangka memperkuat merek tersebut, kami juga menawarkan jasa dalam pendidikan manajemen bisnis, baik untuk gelar akademis atau program eksekutif di bawah merek tunggal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Peningkatan layanan kami dalam program akademik dan eksekutif, peningkatan persyaratan mutu pada kedua program, peningkatan fleksibilitas untuk mengatasi dinamika bisnis dan permintaan yang berkembang pada konstekstualisasi dan solusi yang disesuaikan pada pengembangan pelaku bisnis tentu membutuhkan orang yang sungguh-sungguh, tim yang fokus pada manajemen serta kompetensi spesifik untuk dikembangkan lebih lanjut. Semua hal yang disampaikan sebelumnya tersebut mengharuskan kami untuk meningkatkan pelayanan agar dampak dari sebuah solusi juga semakin besar serta mempertahankan komitmen kami dalam mengembangkan asset manusia dari bisnis. Hal inilah yang terus menerus kami lakukan sejak 2009 untuk meningkatkan layanan kami kepada dunia bisnis Indonesia dalam program pembangunan non-akademik.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dengan lebih dari 30 tahun pengalaman bermitra dengan berbagai perusahaan dalam mengembangkan bakat mereka, Prasetiya Mulya terus melakukan pengembangan dalam manajemen pengetahuan dan kontekstualisasi bisnis Prasetiya Mulya Executive Learning Institute (yang sebelumnya dikenal dengan Prasetiya Mulya Institute of Management); kami siap untuk bermitra dengan Anda untuk mengembangkan nilai lebih tinggi dari aset manusia di perusahaan Anda.&nbsp; Tidak hanya fokus untuk meningkatkan kinerja atau performa bisnis tetapi juga untuk meningktatkan kontribusi dalam mengubah duniu bisnis Indonesia menjadi lebih baik lagi.</p>\r\n'),
	(7, 'id', 'Kami Menawarkan', '', '<ul>\r\n	<li>SOLUSI&nbsp;INTEGRATIF&nbsp;dan&nbsp;KONTEKSTUAL&nbsp;untuk mengembangkan kompetensi manajemen dan kepemimpinan bisnis, baik untuk menjembatani kesenjangan individual maupun untuk menyamakan standard kompetensi tertentu</li>\r\n	<li>INSPIRASI, WAWASAN BARU, PENYEGARAN ATAU KONFIRMASI&nbsp;pengetahuan bisnis melalui materi-materi dalam program kami</li>\r\n	<li>Alternatif untuk&nbsp;MEMBENTUK, MEMOLES atau MENGASAH&nbsp;para&nbsp;talent&nbsp;perusahaan melalui sistem dan metode yang diterapkan</li>\r\n	<li>KEMITRAAN&nbsp;dalam menempuh perjalanan panjang membangun dan memupuk modal manusia dalam organisasi.</li>\r\n</ul>\r\n'),
	(8, 'id', 'Kami Melayani Melalui', '', '<p>Dalam kiprahnya selama lebih dari tiga puluh tahun, Prasetiya Mulya Executive Learning Institute senantiasa menempatkan diri sebagai mitra bagi para pemimpin bisnis yang percaya bahwa manusia adalah modal utama mereka dalam mengembangkan dan menjaga kelangsungan hidup bisnis. Kami selalu merasa terhormat jika dapat berkontribusi memberikan solusi dalam membangun, menyegarkan, mengembangkan, dan menjembatani kesenjangan kompetensi pelaku bisnis. Kami juga merasa bangga jika kami dapat membagikan pemikiran yang menjadi salah satu solusi dalam membangun keunggulan bersaing yang&nbsp;<br />\r\nberkelanjutan.<br />\r\n<br />\r\nMelalui rancangan struktur, materi, dan metode, kami menjawab tantangan bisnis yang ada saat ini dan mendatang. Dengan kombinasi program-program jangka pendek yang memberikan inspirasi dan wawasan, program sertifikasi menajemen memberikan penguasaan lebih mendalam, dan program pengembangan kapabilitas manajemen dan kepemimpinan bisnis yang dirancang secara khusus, sistematis, integratif, dan kontekstual, kami siap menjadi mitra dalam mentransformasi cara berpikir dan mengembangkan kapabilitas para pelaku bisnis, dan meramu solusi bagi para pemimpin bisnis.</p>\r\n\r\n<p>Jika Anda:</p>\r\n\r\n<ul>\r\n	<li>telah&nbsp;mengetahui dengan pasti kapabilitas atau kompetensi yang akan dibangun</li>\r\n	<li>DAN telah&nbsp;mengetahui dengan pasti keterkaitannya dengan materi atau topik secara spesifik</li>\r\n	<li>DAN telah&nbsp;mengetahui dengan pasti keterkaitan antar topik untuk membangun kompetensi secara sistematis dan terarah</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Silakan untuk mempelajari katalog ini dan menentukan pilihan anda</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/download-catalog.png" style="float:right; height:53px; margin:0px; width:149px" /></p>\r\n\r\n<p>Jika Anda:</p>\r\n\r\n<ul>\r\n	<li>belum&nbsp;mengetahui dengan pasti kapabilitas atau kompetensi yang akan dibangun</li>\r\n	<li>ATAU belum&nbsp;mengetahui dengan pasti keterkaitannya dengan materi atau topik</li>\r\n	<li>ATAU belum&nbsp;mengetahui dengan pasti keterkaitan antar topik untuk membangun kompetensi secara sistematis dan terarah</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kami menyarankan untuk menghubungi para advisor kami untuk membantu anda merumuskan hal-hal tersebut.</p>\r\n'),
	(9, 'id', 'Apa Yang Kami Tawarkan', '', '<p>Menjadimitra dalam modal pembangunanmanusia untuk meningkatkankemampuan untuk memperkayaperspektif, untuk meningkatkanrasa percaya diri, untuk meningkatkankinerja untuk membentukmasa depan dengan merancangdan melaksanakan solusiyang relevan dalam hal sistem, metode dan konten WE FIT RATHER THAN FIX Prasetiya Mulya Executive Learning Institutememberikan: &nbsp;</p>\r\n\r\n<ul>\r\n	<li>SOLUSIINTEGRATIF dan KONTEKSTUAL untuk mengembangkan kompetensi manajemen dan kepemimpinan bisnis, baik untuk menjembatani kesenjangan individual maupun untuk menyamakan standar kompetensi tertentu</li>\r\n	<li>INSPIRASI, WAWASAN BARU, PENYEGARAN ATAU KONFIRMASI pengetahuan bisnis melalui materi-materi dalam program Prasetiya Mulya Executive Learning Institute</li>\r\n	<li>Alternatif untuk MEMBENTUK, MEMOLES atau MENGASAH para talent perusahaan melalui sistem dan metode yang diterapkan</li>\r\n</ul>\r\n\r\n<p>KEMITRAAN dalam menempuh perjalanan panjang membangun dan memupuk modal manusia dalam organisasi. Prasetiya Mulya Executive Learning Institute mempunyaihubunganjangkapanjang dengan perusahaan-perusahaan lokal dan internasional yang berbasis di Indonesia untuk mendukung pengembangan sumber daya manusia mereka serta strategi bisnis dan manajemen.</p>\r\n\r\n<p>Program pengembangan ini dirancang untuk meningkatkan keahlian spesifik bahwa perusahaan membutuhkan strategiuntukmengahadapimasa depan.</p>\r\n\r\n<p>Prasetiya Mulya Executive Learning Institute menyediakan layanan kepada perusahaan-perusahaan yang membutuhkan pengembangan kompetensi manajemensertakepemimpinanbisnisdengan pendekatan yang sistematis, progresif dan berkesinambungan.</p>\r\n\r\n<p>Dari pengalaman bertahun-tahun, program tersebut terbukti efektif dalam menjembatani kesenjangan individual maupununtukmenyamakan standard kompetensitertentu. Melalui parakonsultanyang berpengalamandalam menghasilkan rancangan, metode, serta eksekusi solusi yang integratif dan sesuai dengan strategi dan arah perusahaan, Prasetiya Mulya Executive Learning Institute berkomitmen untuk menjalin kemitraandalammenempuhperjalananpanjangmembangundanmemupuk modal manusiadalamorganisasisertamengembangkankompetensimanajemendanbisnis, memperbaikikeefektifanorganisasi, danmeningkatkankeberlangsunganperusahaan.</p>\r\n'),
	(10, 'id', 'Komitmen Kami', '', '<p>Prasetiya Mulya Executive Learning Institute senantiasa&nbsp;berkomitmen untuk melayani kebutuhan dan meningkatkan&nbsp;kualitas layanan dengan menawarkan solusi yang kreatif dalam bentuk program&nbsp;Corporate Social Responsibility.&nbsp;Dalam program ini, kami juga berkomitmen untuk memenuhi kewajiban penting lainnya kepada masyarakat, melestarikan lingkungan, menjaga karyawan, dan&nbsp;pelayanan prima serta terus berinovasi melalui berbagai bidang, antara lain: &nbsp;&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Sosial&nbsp;</li>\r\n	<li>Pelayanan&nbsp;</li>\r\n	<li>Keselamatan&nbsp;</li>\r\n	<li>Manusia&nbsp;</li>\r\n	<li>Lingkungan&nbsp;</li>\r\n	<li>Inovasi &nbsp;&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;Lebih lanjut mengenai komitmen kami.</p>\r\n'),
	(11, 'id', 'Lowongan Kerja', '', '<p>--</p>\r\n'),
	(12, 'id', 'Profil Perusahaan', '', '<p>Pada tanggal 19 Mei 1980, sekelompok pemimpin bisnis terkemuka di Indonesia sepakat untuk mendirikan Yayasan Prasetiya Mulya (YPM) sebagai salah satu bentuk komitmen mereka untuk memberikan kontribusi nyata untuk bangsa Indonesia. Presiden Republik Indonesia pada tahun 1980, Bapak Soeharto, member nama &lsquo;Prasetiya Mulya&rsquo; kepada yayasan ini dan 2 kata tersebut merupakan bahasa Sansekerta yang memiliki arti janji mulya.</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="margin:0px; width:600px" /></p>\r\n\r\n<p>Dengan misi untuk mengembangkan profesionalisme dalam praktek manajemen bisnis di Indonesia melalui manajemen ilmu pengetahuan dan keterampilan, Yayasan Prasetiya Mulya mendirikan Pusat Pengembangan Manajemen (Management Development Center) pada tahun 1982, yang kemudian berubah menjadi Institute of Management Prasetiya Mulya (IMPM). IMPM sendiri merupakan sebuah organisasi (non-profit organization) yang bertanggungjawab menyediakan pendidikan manajemen serta pelatihannya. Selain kursus manajemen eksekutif dan program pengembangan usaha kecil-menengah, Institute of Management Prasetiya Mulya juga memprakarsai program MBA pertama di Indonesia.</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/company-profile">Read more ...</a></p>\r\n\r\n<p>Consultants Profile</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/consultant.jpg" style="margin:0px" /></p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vulputate, velit sit amet volutpat consequat, ligula mauris blandit</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/consultant-profile">Read more ...</a></p>\r\n\r\n<p>Our Mission</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mission.jpg" style="margin:0px" /></p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vulputate, velit sit amet volutpat consequat, ligula mauris blandit</p>\r\n\r\n<p><a href="http://localhost/elinew/prasmul-eli/vission-mission">Read more ...</a></p>\r\n'),
	(13, 'id', 'Profil Perusahaan', '', '<p>Pada tanggal 19 Mei 1980, sekelompok pemimpin bisnis terkemuka di Indonesia sepakat untuk mendirikan Yayasan Prasetiya Mulya (YPM) sebagai salah satu bentuk komitmen mereka untuk memberikan kontribusi nyata untuk bangsa Indonesia. Presiden Republik Indonesia pada tahun 1980, Bapak Soeharto, member nama &lsquo;Prasetiya Mulya&rsquo; kepada yayasan ini dan 2 kata tersebut merupakan bahasa Sansekerta yang memiliki arti janji mulya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/photo1.png" style="margin:0px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dengan misi untuk mengembangkan profesionalisme dalam praktek manajemen bisnis di Indonesia melalui manajemen ilmu pengetahuan dan keterampilan, Yayasan Prasetiya Mulya mendirikan Pusat Pengembangan Manajemen (Management Development Center) pada tahun 1982, yang kemudian berubah menjadi Institute of Management Prasetiya Mulya (IMPM). IMPM sendiri merupakan sebuah organisasi (non-profit organization) yang bertanggungjawab menyediakan pendidikan manajemen serta pelatihannya. Selain kursus manajemen eksekutif dan program pengembangan usaha kecil-menengah, Institute of Management Prasetiya Mulya juga memprakarsai program MBA pertama di Indonesia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pada tahun 1993, Institute of Management Prasetiya Mulya (IMPM) yang menawarkan program MBA ini kemudian diubah namanya menjadi Sekolah Tinggi Manajemen Prasteiya Mulya. Pengubahan nama ini disesuaikan dengan peraturan baru Departemen Pendidikan di Indonesia. Dengan berlakunya peraturan tersebut juga membuat Prasetiya Mulya mengubah nama program yang awalnya Master of Business Administration (MBA) menjadi Magister Manajemen (MM). Dengan adanya perubahan nama ini, tidak berpengaruh pada program pembelajaran eksekutif yang tidak menawarkan gelar akademis. Program tersebut tetap akan dikelola di bawah Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). Di tahun 2000, dengan tujuan mempromosikan keberadaan sekolah bisnis di Indonesia, kami memutuskan untuk menggunakan Prasetiya Mulya Business School sebagai merek (brand) dari perusahaan kami. Dalam rangka memperkuat merek tersebut, kami juga menawarkan jasa dalam pendidikan manajemen bisnis, baik untuk gelar akademis atau program eksekutif di bawah merek tunggal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Peningkatan layanan kami dalam program akademik dan eksekutif, peningkatan persyaratan mutu pada kedua program, peningkatan fleksibilitas untuk mengatasi dinamika bisnis dan permintaan yang berkembang pada konstekstualisasi dan solusi yang disesuaikan pada pengembangan pelaku bisnis tentu membutuhkan orang yang sungguh-sungguh, tim yang fokus pada manajemen serta kompetensi spesifik untuk dikembangkan lebih lanjut. Semua hal yang disampaikan sebelumnya tersebut mengharuskan kami untuk meningkatkan pelayanan agar dampak dari sebuah solusi juga semakin besar serta mempertahankan komitmen kami dalam mengembangkan asset manusia dari bisnis. Hal inilah yang terus menerus kami lakukan sejak 2009 untuk meningkatkan layanan kami kepada dunia bisnis Indonesia dalam program pembangunan non-akademik.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dengan lebih dari 30 tahun pengalaman bermitra dengan berbagai perusahaan dalam mengembangkan bakat mereka, Prasetiya Mulya terus melakukan pengembangan dalam manajemen pengetahuan dan kontekstualisasi bisnis Prasetiya Mulya Executive Learning Institute (yang sebelumnya dikenal dengan Prasetiya Mulya Institute of Management); kami siap untuk bermitra dengan Anda untuk mengembangkan nilai lebih tinggi dari aset manusia di perusahaan Anda.&nbsp; Tidak hanya fokus untuk meningkatkan kinerja atau performa bisnis tetapi juga untuk meningktatkan kontribusi dalam mengubah duniu bisnis Indonesia menjadi lebih baik lagi.</p>\r\n'),
	(14, 'id', 'Profil Konsultan', '', '<h3>&nbsp;</h3>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/sitanggang.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Ir. Gerhard Sitanggang, MM, MBA</h3>\r\n\r\n<p>Director of Executive Learning Institute</p>\r\n\r\n<p>Lulusan S1 dari fakultas Teknik Fisika ITB, serta lulusan MM IPMI dan MBA lulusan Mt. Eliza Business School dari Monash University, Australia, beliau adalah seorang praktisi dalam bidang teknik, analis rekayasa bisnis dan layanan klien dengan perusahaan besar di seluruh dunia, seperti Coca Cola Amatil dan lain-lain. Bergabung dengan Astra Management Development Institute sebagai langkah awal di bidang pendidikan sampai ia memutuskan untuk menjadi bagian dari Prasetiya Mulia Business School (PMBS) pada bulan Juni 2010. Saat ini beliau menjabat sebagai direktur Institute Eksekutif Belajar PMB. Keahlian dalam manajemen strategis dengan pengalaman memfasilitasi eksekutif Astra kelompok dalam perencanaan bisnis dan serta juri kepala konvensi Kualitas Astra. Beliau telah mengekspos dalam merancang, melaksanakan, dan mengajar untuk program pengembangan eksekutif di berbagai perusahaan sejak bergabung PMBS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/santosa.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Switomo Santoso Ak., MBA, CPMA, CFP</h3>\r\n\r\n<p>CPMA &amp; CFP</p>\r\n\r\n<p>Pemegang gelar MBA dari California State University, USA. Beliau juga terdaftar sebagai lulusan Akuntansi dari Universitas Brawijaya. Dalam jangka waktu 20 tahun pengalaman bisnisnya antara lain ritel, perbankan otomotif, keuangan, pendidikan, konsultasi, layanan, ekspor-impor dan manufaktur. Beliau telah bekerja di luar negeri dan di beberapa perusahaan multinasional dalam berbagai divisi. Keahliannya meliputi bidang-bidang seperti Keuangan, Akuntansi, Kepemimpinan Manajerial, Supply Chain, Sumber Daya Manusia, Pengembangan Pribadi dan Penjualan / Pemasaran. Beliau ahli dalam melatih hard skill serta soft skill. Selain itu, ia dianugerahi kualifikasi profesional di CPMA (Certified Professional Management Accountant) dan CFP (Certified Financial Planner).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mely.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Mely Simpony, MBA</h3>\r\n\r\n<p>Seorang praktisi pensiun, beliau adalah alumni dari UALR, Amerika Serikat di mana ia meraih gelar MBA. beliau memulai pekerjaan pertamanya di lima besar sebelum bergerak di sekitar negara-negara Asia Pasifik dengan pemain utama Perusahaan Worldwide industri yang berbeda. Dimulai sebagai auditor eksternal dan konsultan Arthur Andersen sebelum menjejaki karirnya hingga ke negara CFO Indonesia, Regional Financial Controller dan CFO Asia Pasifik, dia memiliki eksposur besar di industri Perbankan, Advertising dan Penelitian Pasar.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/endang.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>M. A Endang Tatiana, MM</h3>\r\n\r\n<p>Beliau adalah pemegang Magister Manajemen dari Universitas Indonesia. Beliau memiliki pengalaman lebih dari 15 tahun bekerja sebelum bergabung dengan Prasetiya Mulya Business School. Eksposur profesional nya termasuk Auto 2000, Lippo Life dan Anugerah Pharmindo Lestari dan menjadi dosen di universitas-universitas ternama beberapa. Dalam dunia pelatihan, ia memiliki keterampilan yang intensif dan kompetensi dalam merancang dan memfasilitasi berbagai program pelatihan, seperti pengembangan sumber daya manusia (SDM) untuk manajer non SDM, Manajemen Kinerja, Keterampilan Presentasi, Kepemimpinan, Pengawasan dan Manajemen Perubahan. Di bidang konsultasi, beliau terlibat dalam beberapa proyek tingkat tinggi seperti Blok Pelatihan Kompetensi Berbasis Building, Sistem Manajemen Kinerja, Pengembangan Program Management Trainee, Dan Job Analisis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/deddi.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Deddi Tedjakumara</h3>\r\n\r\n<p>Executive Director</p>\r\n\r\n<p>Eksekutif Direktur Eksekutif Learning Institute of Prasetiya Mulya Business School (PMBS). Dengan lebih dari 15 tahun pengalaman mengajar profesional, ia terpilih sebagai anggota fakultas terbaik oleh mahasiswa PMB S&#39;MBA selama tiga tahun berturut-turut. Memiliki keahlian dan minat di bidang perencanaan bisnis, pengembangan strategis, keuangan perusahaan, manajemen unprofit, dan usaha sosial, ia telah terlibat dalam perencanaan bisnis dan konsultasi pengembangan strategis serta dalam merancang dan melaksanakan pembelajaran tempat kerja dan kinerja program pembangunan di banyak perusahaan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src="http://localhost/elinew/prasmul-eli/themes/images/mawar.jpg" style="float:left; margin:-20px 0px 0px; width:200px" /></p>\r\n\r\n<h3>Mawar Sheila, MM, M.Psi (MS)</h3>\r\n\r\n<p>Psikolog dari Universitas Padjadjaran dan Program Profesional Psikologi, ia meraih gelar Magister Manajemen dari Prasetiya Mulya Business School. Berpengalaman dalam asesmen konsultatif terhadap berbagai perusahaan nasional dan swasta terkemuka (antara lain ASDP, Buana Finance, Taspen, Sugar Group Companies, Kompas Grup dll), pengalaman ini mengakumulasi keahlian, pengetahuan dan pemahaman yang mendalam tentang manusia, bisnis dan industri. Mawar dipercayakan untuk mengembangkan proses seleksi untuk Program Sarjana Prasetiya Mulya, sekaligus membantu kegiatan Pemasaran. Setelah itu ia memimpin Divisi Pengembangan Karir dan Hubungan Alumni untuk program pasca sarjana dimana ia merencanakan dan melaksanakan berbagai program pengembangan. Hal ini meningkatkan minatnya dalam pengembangan sumber daya manusia dan secara signifikan meningkatkan kompetensi manajerial dan ketajaman sekaligus meningkatkan keahliannya sebagai fasilitator, asesor, konsultan, dan executive coach.</p>\r\n');
/*!40000 ALTER TABLE `section_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.setting
DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;


-- Dumping structure for table newcms.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `never_exp` int(1) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sliders: ~3 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `title`, `never_exp`, `expired_at`, `created_at`, `updated_at`) VALUES
	(4, 'slider 2', NULL, '2013-05-21 01:13:23', '2013-05-22 02:13:35', '2013-05-22 04:28:29'),
	(5, 'Slider 1', NULL, '2013-05-06 01:26:40', '2013-05-22 02:26:55', '2013-05-22 04:28:21'),
	(6, 'Slider 3', NULL, '2013-05-22 08:41:25', '2013-05-22 09:41:58', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;


-- Dumping structure for table newcms.sliders_lang
DROP TABLE IF EXISTS `sliders_lang`;
CREATE TABLE IF NOT EXISTS `sliders_lang` (
  `lang` varchar(2) DEFAULT NULL,
  `slide_id` int(5) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `img_src` varchar(100) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  UNIQUE KEY `lang` (`lang`,`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sliders_lang: ~6 rows (approximately)
/*!40000 ALTER TABLE `sliders_lang` DISABLE KEYS */;
INSERT INTO `sliders_lang` (`lang`, `slide_id`, `title`, `img_src`, `link`) VALUES
	('en', 4, 'slider 2', 'banner-2-43b3f5b8cf-baner-2.jpg', '#'),
	('id', 4, 'slider 2', 'banner-5-d2bccdbce4-bannerc-2.jpg', '#'),
	('en', 5, 'Slider 1', 'banner-1-21dee38a7b-baner-1.jpg', '#'),
	('id', 5, 'Slider 1', 'banner-4-a3802589af-banner-1.jpg', '#'),
	('en', 6, 'Slider 3', 'banner-3-94b457f193-baner-3.jpg', '#'),
	('id', 6, 'slider 3', 'banner-6-d1832aca8c-baner-w.jpg', '#');
/*!40000 ALTER TABLE `sliders_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `last_login`, `active`, `admin`) VALUES
	(1, 'admin', 'admin@admin.com', 's', 'istrator', '$23PstrXfk7Nw', '0000-00-00 00:00:00', 1, 1),
	(3, 'admin1', 'aditans88@gmail.com', 'Abdul', 'Anshari', '$2a$16$MnG7OBhi7CN.fHA8bM2LquEp1ASXfaAKu3MBRSxg9mujlclABK/0.', '0000-00-00 00:00:00', 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
