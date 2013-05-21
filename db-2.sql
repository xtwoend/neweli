-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-05-21 13:42:46
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

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
  PRIMARY KEY (`id`),
  KEY `gallery_id_index` (`id`)
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
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_id_index` (`id`),
  KEY `gallery_images_gallery_id_index` (`gallery_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.menu: ~1 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `layout`, `ordering`) VALUES
	(4, 'menu atas', 'menu_atas', 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table newcms.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `fullday` int(11) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.news: ~1 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `url`, `start_date`, `end_date`, `fullday`, `user_id`) VALUES
	(5, 'seminar-computer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL);
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

-- Dumping data for table newcms.news_lang: ~2 rows (approximately)
/*!40000 ALTER TABLE `news_lang` DISABLE KEYS */;
INSERT INTO `news_lang` (`lang`, `news_id`, `title`, `subtitle`, `content`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
	('en', 5, '0', '0', '0', 'seminar comp', 'aaaa', 'bbbbb'),
	('id', 5, '0', '0', '0', '', '', '');
/*!40000 ALTER TABLE `news_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.page
DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.page: ~2 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `title`, `menu_id`, `url`, `order`, `parent`, `is_home`, `publish`, `layout`, `protected`, `created_by`, `created_at`, `updated_at`) VALUES
	(2, 'test menu', 4, 'test-menu', 0, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Pnp', 4, 'pnp', 0, 2, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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

-- Dumping data for table newcms.page_lang: ~4 rows (approximately)
/*!40000 ALTER TABLE `page_lang` DISABLE KEYS */;
INSERT INTO `page_lang` (`lang`, `page_id`, `url`, `title`, `subtitle`, `nav_title`, `meta_title`, `meta_description`, `meta_keywords`, `online`) VALUES
	('en', 2, '', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 1),
	('en', 3, '', 'a', 'a', 'a', 'a', 'a', 'a', 1),
	('id', 2, '', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 1),
	('id', 3, '', 'x', 'x', 'x', 'x', 'x', 'x', 1);
/*!40000 ALTER TABLE `page_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.periode_courses
DROP TABLE IF EXISTS `periode_courses`;
CREATE TABLE IF NOT EXISTS `periode_courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.periode_courses: ~1 rows (approximately)
/*!40000 ALTER TABLE `periode_courses` DISABLE KEYS */;
INSERT INTO `periode_courses` (`id`, `periode`) VALUES
	(1, 'Jan 2013 - Mar 2013');
/*!40000 ALTER TABLE `periode_courses` ENABLE KEYS */;


-- Dumping structure for table newcms.programs
DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lang` varchar(2) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `content` text,
  `day` int(11) DEFAULT NULL,
  `parent` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.programs: ~26 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `lang`, `program`, `price`, `link`, `content`, `day`, `parent`) VALUES
	(1, 'en', 'Public Courses Programs', 100000, NULL, 'PM ELI Public Short Courses are designed in workshop format to be effective for general public. Subjects offered include functional management – Human Resource, Marketing, Operation/Production, Finance, Contemporary Topics – and Strategic management.<br><br>Functional short courses are intended to help participants in developing functional knowledge and skills to apply in their workplace. The assortment of subjects offered includes hard skill and soft skill to develop the competencies and skills of participants to becoming reliable resources in achieving company’s targets.<br><br>The main goal of strategic management short courses is to equip middle and top managers with &nbsp;important knowledge and skills to develop strategic thinking framework. Abilities to analyze and develop business strategies, identify and measure company’s performance, and to manage changes are crucial in ensuring the competitive advantages and growth of the company.', NULL, 0),
	(2, 'en', 'Certificate Programs', 140000, NULL, NULL, NULL, 0),
	(3, 'en', 'International Certificate Program', 140000, NULL, NULL, NULL, 2),
	(4, 'en', 'Managerial Courses', 140000, NULL, NULL, NULL, 1),
	(5, 'en', 'MARKETING MANAGEMENT', 140000, NULL, NULL, NULL, 4),
	(6, 'en', 'FINANCIAL MANAGEMENT', 140000, NULL, NULL, NULL, 4),
	(7, 'en', 'OPERATIONS MANAGEMENT', 140000, NULL, NULL, NULL, 4),
	(8, 'en', 'CONTEMPORARY TOPICS ', 140000, NULL, NULL, NULL, 4),
	(9, 'en', 'STRATEGIC COURSES', 140000, NULL, NULL, NULL, 4),
	(10, 'en', 'HUMAN RESOURCE MANAGEMENT', 140000, NULL, NULL, NULL, 4),
	(11, 'en', 'Effective Leadership', 140000, NULL, NULL, NULL, 10),
	(12, 'en', 'Effective Supervisory', 140000, NULL, NULL, NULL, 10),
	(13, 'en', 'Human Resources for Non Human Resources Manager', 140000, NULL, NULL, NULL, 10),
	(14, 'en', 'Problem Solving and Decision Making', 140000, NULL, NULL, NULL, 10),
	(15, 'en', 'Business Presentation and Writing (in English)', 140000, NULL, NULL, NULL, 10),
	(16, 'en', 'Training for Trainers', 140000, NULL, NULL, NULL, 10),
	(17, 'en', 'Building Powerful Brand', 140000, NULL, NULL, NULL, 5),
	(18, 'en', 'Negotiation Skills in Business', 140000, NULL, NULL, NULL, 5),
	(19, 'en', 'Effective Selling Technique', 140000, NULL, NULL, NULL, 5),
	(20, 'en', 'Applied Marketing Research', 140000, NULL, NULL, NULL, 5),
	(21, 'en', 'Integrated Marketing Communication', 140000, NULL, NULL, NULL, 5),
	(22, 'en', 'Digital Marketing', 140000, NULL, NULL, NULL, 5),
	(23, 'en', 'Contemporary Retail Marketing', 140000, NULL, NULL, NULL, 5),
	(24, 'en', 'Financial Management for Non Finance Manager', 140000, NULL, NULL, NULL, 6),
	(25, 'en', 'Finance for Senior Manager (in English)', 140000, NULL, NULL, NULL, 6),
	(26, 'en', 'Strategic Courses', 140000, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;


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

-- Dumping data for table newcms.questions: ~4 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `question`, `lang`, `starting`) VALUES
	(1, 'Silakan pilih salah satu dari posisi Anda saat ini dalam organisasi?', 'id', 1),
	(2, 'Latar belakang pendidikan saya adalah jurusan bisnis/ manajemen', 'id', 0),
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

-- Dumping data for table newcms.question_options: ~14 rows (approximately)
/*!40000 ALTER TABLE `question_options` DISABLE KEYS */;
INSERT INTO `question_options` (`id`, `question_id`, `option`, `next_questions_id`, `end_question`, `recommendation_id`) VALUES
	(1, 1, 'Baru Lulus', 2, 0, 0),
	(2, 1, 'Pemilik Bisnis', 2, 0, 0),
	(3, 1, 'Konsultan, dosen, dan profesional lainnya yang tidak melekat pada perusahaan', 2, 0, 0),
	(4, 1, 'Staff di Perusahaan', 2, 0, 0),
	(5, 1, 'Supervisor di Perusahaan', 2, 0, 0),
	(6, 1, 'Manajer di Perusahaan', 2, 0, 0),
	(7, 1, 'Direktur di Perusahaan', 2, 0, 0),
	(8, 1, 'Bukan Semuanya', 99, 1, 99),
	(9, 2, 'Ya', NULL, 1, 1),
	(10, 2, 'Tidak', NULL, 1, 2),
	(11, 3, 'aaaa', 5, 0, 0),
	(12, 3, 'Kok', 0, 1, 107),
	(16, 5, 'asdasd', 0, 1, 111),
	(17, 5, 'dasdasd', 0, 1, 112);
/*!40000 ALTER TABLE `question_options` ENABLE KEYS */;


-- Dumping structure for table newcms.recommendations
DROP TABLE IF EXISTS `recommendations`;
CREATE TABLE IF NOT EXISTS `recommendations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `recommendation` varchar(250) DEFAULT NULL,
  `descriptions` text,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.recommendations: ~9 rows (approximately)
/*!40000 ALTER TABLE `recommendations` DISABLE KEYS */;
INSERT INTO `recommendations` (`id`, `recommendation`, `descriptions`, `link`) VALUES
	(1, 'pilih area kompetensi  dalam program Sertifikasi yang ingin Anda perdalam ilmunya', '<article id="program" class="cf">\r\n			<div class="left">\r\n				<h2>Our Recommendation</h2>\r\n				<div class="line">\r\n					<span class="dropcap">1</span>\r\n					Certification Courses\r\n				</div>\r\n				<h5>certificate of business man...:</h5>\r\n				<ol>\r\n					<li><a href="#">General Business Management</a></li>\r\n					<li><a href="#">Marketing Management</a></li>\r\n					<li><a href="#">Financial Management</a></li>\r\n					<li><a href="#">Human Resources Management</a></li>\r\n					<li><a href="#">Operation Management</a></li>\r\n					<li><a href="#">Business Strategic Management*</a></li>\r\n					<li><a href="#">Certificate of: Financial Performance Analysis*</a></li>\r\n					<li><a href="#">Certificate of: Strategic Financial Analysis*</a></li>\r\n				</ol>\r\n				<h5>international professional</h5>\r\n				<ol>\r\n					<li><a href="#">International Certificate in PSCM Module 1-6</a></li>\r\n					<li><a href="#">International Advanced in PSCM Module 7-12</a></li>\r\n					<li><a href="#">International Diploma in PSCM Module 13-18</a></li>\r\n				</ol>\r\n\r\n				<span class="dropcap">2</span>\r\n				Public Courses\r\n				<h5>contemporary topics:</h5>\r\n				<ol>\r\n					<li><a href="#">Green Business</a></li>\r\n					<li><a href="#">SOCIAL VENTURE: Transforming the Society - Transfigure the Business</a></li>\r\n					<li><a href="#">Understanding Chinese Management</a></li>\r\n					<li><a href="#">SOCIAL MEDIA IN THE WORKPLACE: Managing</a></li>\r\n				</ol>\r\n				<h5>social skills:</h5>\r\n				<ol>\r\n					<li><a href="#">Effective Leadership</a></li>\r\n					<li><a href="#">Effective Supervisory</a></li>\r\n					<li><a href="#">Problem Solving &amp; Decision Making</a></li>\r\n					<li><a href="#">Training for Trainers</a></li>\r\n					<li><a href="#">Negotiation Skills in Business</a></li>\r\n					<li><a href="#">Effective Selling Technique</a></li>\r\n					<li><a href="#">MBTI</a></li>\r\n					<li><a href="#">Coaching, Counseling &amp; Mentor</a></li>\r\n				</ol>\r\n			</div><!--left-->\r\n\r\n			<div class="right">\r\n				<h1>general business management</h1>\r\n				<h3>objectives</h3>\r\n				<p>\r\n					To provide a comprehensive and integrated insight about the role of management<br/>\r\n					To improve the understanding of interrelatedness between functions in management\r\n				</p>\r\n				<h3>participants</h3>\r\n				<p>\r\n					Those who do not have any educational background in statement<br/>\r\n					Those who are at the starting position within the corps of management\r\n				</p>\r\n				<h3 style="margin-bottom: 20px;">scope of learning</h3>\r\n				<ol>\r\n					<li>Business Ecosystem</li>\r\n					<li>Role of Management and Leadership in Business Organization</li>\r\n					<li>Management Cycle</li>\r\n				</ol>\r\n				<font class="bold">Managing Value of Customer:</font>\r\n				<ol start="4">\r\n					<li>Managing Perceived Benefit</li>\r\n					<li>Managing Perceived Risk</li>\r\n					<li>Communicating the Value to Customer</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Process:</font>\r\n				<ol start="7">\r\n					<li>Managing Capacity</li>\r\n					<li>Managing Quality</li>\r\n					<li>Managing Process Improvement</li>\r\n				</ol>\r\n				<font class="bold">Managing People and Organization:</font>\r\n				<ol start="10">\r\n					<li>Organizational Behavior</li>\r\n					<li>Recruitment, Compensation and Employee Relation</li>\r\n					<li>Development, Career and Performance</li>\r\n				</ol>\r\n				<font class="bold">Managing Finance:</font>\r\n				<ol start="13">\r\n					<li>Introduction to Financial Statement</li>\r\n					<li>Operational Decision Making: Profitable Management</li>\r\n					<li>Operational Decision Making: Cash Flow Management</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Strategy and Growth:</font>\r\n				<ol start="16">\r\n					<li>Competitive Strategy</li>\r\n					<li>Investment Decision</li>\r\n					<li>Financing Decision</li>\r\n				</ol>\r\n				<font class="bold">Managing Execution:</font>\r\n				<ol start="19">\r\n					<li>Implement the Strategy</li>\r\n					<li>Readership in Business</li>\r\n					<li>Business Ethics and Social Responsibility</li>\r\n				</ol>\r\n				<p>\r\n					<input type="button" class="rounded" name="download" value="download brochure" />\r\n					<input type="button" class="rounded" name="contact" value="contact us" />\r\n				</p>\r\n			</div>\r\n		</article>', NULL),
	(2, 'pilih CBM Manajemen Umum untuk memulai dengan, kemudian pilih bidang kompetensi  yang Anda minati', '<article id="program" class="cf">\r\n			<div class="left">\r\n				<h2>Our Recommendation</h2>\r\n				<div class="line">\r\n					<span class="dropcap">1</span>\r\n					Certification Courses\r\n				</div>\r\n				<h5>certificate of business man...:</h5>\r\n				<ol>\r\n					<li><a href="#">General Business Management</a></li>\r\n					<li><a href="#">Marketing Management</a></li>\r\n					<li><a href="#">Financial Management</a></li>\r\n					<li><a href="#">Human Resources Management</a></li>\r\n					<li><a href="#">Operation Management</a></li>\r\n					<li><a href="#">Business Strategic Management*</a></li>\r\n					<li><a href="#">Certificate of: Financial Performance Analysis*</a></li>\r\n					<li><a href="#">Certificate of: Strategic Financial Analysis*</a></li>\r\n				</ol>\r\n				<h5>international professional</h5>\r\n				<ol>\r\n					<li><a href="#">International Certificate in PSCM Module 1-6</a></li>\r\n					<li><a href="#">International Advanced in PSCM Module 7-12</a></li>\r\n					<li><a href="#">International Diploma in PSCM Module 13-18</a></li>\r\n				</ol>\r\n\r\n				<span class="dropcap">2</span>\r\n				Public Courses\r\n				<h5>contemporary topics:</h5>\r\n				<ol>\r\n					<li><a href="#">Green Business</a></li>\r\n					<li><a href="#">SOCIAL VENTURE: Transforming the Society - Transfigure the Business</a></li>\r\n					<li><a href="#">Understanding Chinese Management</a></li>\r\n					<li><a href="#">SOCIAL MEDIA IN THE WORKPLACE: Managing</a></li>\r\n				</ol>\r\n				<h5>social skills:</h5>\r\n				<ol>\r\n					<li><a href="#">Effective Leadership</a></li>\r\n					<li><a href="#">Effective Supervisory</a></li>\r\n					<li><a href="#">Problem Solving &amp; Decision Making</a></li>\r\n					<li><a href="#">Training for Trainers</a></li>\r\n					<li><a href="#">Negotiation Skills in Business</a></li>\r\n					<li><a href="#">Effective Selling Technique</a></li>\r\n					<li><a href="#">MBTI</a></li>\r\n					<li><a href="#">Coaching, Counseling &amp; Mentor</a></li>\r\n				</ol>\r\n			</div><!--left-->\r\n\r\n			<div class="right">\r\n				<h1>general business management</h1>\r\n				<h3>objectives</h3>\r\n				<p>\r\n					To provide a comprehensive and integrated insight about the role of management<br/>\r\n					To improve the understanding of interrelatedness between functions in management\r\n				</p>\r\n				<h3>participants</h3>\r\n				<p>\r\n					Those who do not have any educational background in statement<br/>\r\n					Those who are at the starting position within the corps of management\r\n				</p>\r\n				<h3 style="margin-bottom: 20px;">scope of learning</h3>\r\n				<ol>\r\n					<li>Business Ecosystem</li>\r\n					<li>Role of Management and Leadership in Business Organization</li>\r\n					<li>Management Cycle</li>\r\n				</ol>\r\n				<font class="bold">Managing Value of Customer:</font>\r\n				<ol start="4">\r\n					<li>Managing Perceived Benefit</li>\r\n					<li>Managing Perceived Risk</li>\r\n					<li>Communicating the Value to Customer</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Process:</font>\r\n				<ol start="7">\r\n					<li>Managing Capacity</li>\r\n					<li>Managing Quality</li>\r\n					<li>Managing Process Improvement</li>\r\n				</ol>\r\n				<font class="bold">Managing People and Organization:</font>\r\n				<ol start="10">\r\n					<li>Organizational Behavior</li>\r\n					<li>Recruitment, Compensation and Employee Relation</li>\r\n					<li>Development, Career and Performance</li>\r\n				</ol>\r\n				<font class="bold">Managing Finance:</font>\r\n				<ol start="13">\r\n					<li>Introduction to Financial Statement</li>\r\n					<li>Operational Decision Making: Profitable Management</li>\r\n					<li>Operational Decision Making: Cash Flow Management</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Strategy and Growth:</font>\r\n				<ol start="16">\r\n					<li>Competitive Strategy</li>\r\n					<li>Investment Decision</li>\r\n					<li>Financing Decision</li>\r\n				</ol>\r\n				<font class="bold">Managing Execution:</font>\r\n				<ol start="19">\r\n					<li>Implement the Strategy</li>\r\n					<li>Readership in Business</li>\r\n					<li>Business Ethics and Social Responsibility</li>\r\n				</ol>\r\n				<p>\r\n					<input type="button" class="rounded" name="download" value="download brochure" />\r\n					<input type="button" class="rounded" name="contact" value="contact us" />\r\n				</p>\r\n			</div>\r\n		</article>', NULL),
	(99, 'Silahkan Hubungi Bagian Pemasaran Kami dengan memilih Contact us', '<article id="program" class="cf">\r\n			<div class="left">\r\n				<h2>Our Recommendation</h2>\r\n				<div class="line">\r\n					<span class="dropcap">1</span>\r\n					Certification Courses\r\n				</div>\r\n				<h5>certificate of business man...:</h5>\r\n				<ol>\r\n					<li><a href="#">General Business Management</a></li>\r\n					<li><a href="#">Marketing Management</a></li>\r\n					<li><a href="#">Financial Management</a></li>\r\n					<li><a href="#">Human Resources Management</a></li>\r\n					<li><a href="#">Operation Management</a></li>\r\n					<li><a href="#">Business Strategic Management*</a></li>\r\n					<li><a href="#">Certificate of: Financial Performance Analysis*</a></li>\r\n					<li><a href="#">Certificate of: Strategic Financial Analysis*</a></li>\r\n				</ol>\r\n				<h5>international professional</h5>\r\n				<ol>\r\n					<li><a href="#">International Certificate in PSCM Module 1-6</a></li>\r\n					<li><a href="#">International Advanced in PSCM Module 7-12</a></li>\r\n					<li><a href="#">International Diploma in PSCM Module 13-18</a></li>\r\n				</ol>\r\n\r\n				<span class="dropcap">2</span>\r\n				Public Courses\r\n				<h5>contemporary topics:</h5>\r\n				<ol>\r\n					<li><a href="#">Green Business</a></li>\r\n					<li><a href="#">SOCIAL VENTURE: Transforming the Society - Transfigure the Business</a></li>\r\n					<li><a href="#">Understanding Chinese Management</a></li>\r\n					<li><a href="#">SOCIAL MEDIA IN THE WORKPLACE: Managing</a></li>\r\n				</ol>\r\n				<h5>social skills:</h5>\r\n				<ol>\r\n					<li><a href="#">Effective Leadership</a></li>\r\n					<li><a href="#">Effective Supervisory</a></li>\r\n					<li><a href="#">Problem Solving &amp; Decision Making</a></li>\r\n					<li><a href="#">Training for Trainers</a></li>\r\n					<li><a href="#">Negotiation Skills in Business</a></li>\r\n					<li><a href="#">Effective Selling Technique</a></li>\r\n					<li><a href="#">MBTI</a></li>\r\n					<li><a href="#">Coaching, Counseling &amp; Mentor</a></li>\r\n				</ol>\r\n			</div><!--left-->\r\n\r\n			<div class="right">\r\n				<h1>general business management</h1>\r\n				<h3>objectives</h3>\r\n				<p>\r\n					To provide a comprehensive and integrated insight about the role of management<br/>\r\n					To improve the understanding of interrelatedness between functions in management\r\n				</p>\r\n				<h3>participants</h3>\r\n				<p>\r\n					Those who do not have any educational background in statement<br/>\r\n					Those who are at the starting position within the corps of management\r\n				</p>\r\n				<h3 style="margin-bottom: 20px;">scope of learning</h3>\r\n				<ol>\r\n					<li>Business Ecosystem</li>\r\n					<li>Role of Management and Leadership in Business Organization</li>\r\n					<li>Management Cycle</li>\r\n				</ol>\r\n				<font class="bold">Managing Value of Customer:</font>\r\n				<ol start="4">\r\n					<li>Managing Perceived Benefit</li>\r\n					<li>Managing Perceived Risk</li>\r\n					<li>Communicating the Value to Customer</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Process:</font>\r\n				<ol start="7">\r\n					<li>Managing Capacity</li>\r\n					<li>Managing Quality</li>\r\n					<li>Managing Process Improvement</li>\r\n				</ol>\r\n				<font class="bold">Managing People and Organization:</font>\r\n				<ol start="10">\r\n					<li>Organizational Behavior</li>\r\n					<li>Recruitment, Compensation and Employee Relation</li>\r\n					<li>Development, Career and Performance</li>\r\n				</ol>\r\n				<font class="bold">Managing Finance:</font>\r\n				<ol start="13">\r\n					<li>Introduction to Financial Statement</li>\r\n					<li>Operational Decision Making: Profitable Management</li>\r\n					<li>Operational Decision Making: Cash Flow Management</li>\r\n				</ol>\r\n				<font class="bold">Managing Business Strategy and Growth:</font>\r\n				<ol start="16">\r\n					<li>Competitive Strategy</li>\r\n					<li>Investment Decision</li>\r\n					<li>Financing Decision</li>\r\n				</ol>\r\n				<font class="bold">Managing Execution:</font>\r\n				<ol start="19">\r\n					<li>Implement the Strategy</li>\r\n					<li>Readership in Business</li>\r\n					<li>Business Ethics and Social Responsibility</li>\r\n				</ol>\r\n				<p>\r\n					<input type="button" class="rounded" name="download" value="download brochure" />\r\n					<input type="button" class="rounded" name="contact" value="contact us" />\r\n				</p>\r\n			</div>\r\n		</article>', NULL),
	(107, 'Test AJa', 'asdasdasdasdasd', NULL),
	(108, 'asd', 'asdsad', NULL),
	(109, 'asd', 'asdasd', NULL),
	(110, 'asd', 'asd', NULL),
	(111, 'asd', 'asdasd', NULL),
	(112, 'asd', 'asdasd', NULL);
/*!40000 ALTER TABLE `recommendations` ENABLE KEYS */;


-- Dumping structure for table newcms.registrations
DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `personal` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `participant_of` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.registrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` (`id`, `personal`, `first_name`, `last_name`, `birth_place`, `participant_of`, `date_of_birth`, `gander`, `mobile_phone`, `job_title`, `email`, `name_com`, `email_com`, `indrustry_com`, `address_com`, `code_com`, `city_com`, `country_com`, `phone_com`, `fax_com`) VALUES
	(1, 0, 'Abdul', 'Anshari', NULL, NULL, NULL, 'Male', NULL, 'Manager IT', 'aditans88@gmail.com', 'PT. Dharma Indah Agung Metropolitan', '', '', '', '', '', '', '', ''),
	(7, 0, 'Abdul', 'Anshari', 'a', 1, '2013-03-15', 'Male', '622158901717', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 0, 'Abdul', 'Anshari', NULL, NULL, NULL, 'Male', NULL, 'Hitam', 'aditans88@gmail.com', 'PT. Dharma Indah Agung Metropolitan', '', '', '', '', '', '', '', ''),
	(9, 0, 'Acuy', 'F', 'Banten', 8, '2013-03-20', 'Male', '2423', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 1, 'asd', 'qe', NULL, NULL, NULL, 'Male', NULL, 'sdf', 'asdf@asda.vb', '', '', '', '', '', '', '', '', '');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.registration_program: ~11 rows (approximately)
/*!40000 ALTER TABLE `registration_program` DISABLE KEYS */;
INSERT INTO `registration_program` (`id`, `registration_id`, `program_id`, `periode_id`, `date_registration`) VALUES
	(1, 1, 18, 1, '2013-03-01 03:04:46'),
	(2, 1, 19, 1, '2013-03-01 03:04:52'),
	(3, 2, 18, 1, '2013-03-01 03:05:14'),
	(4, 3, 19, 1, '2013-03-01 03:05:34'),
	(5, 4, 18, 1, '2013-03-01 03:09:04'),
	(7, 5, 18, 1, '2013-03-01 03:11:35'),
	(8, 6, 18, 1, '2013-03-01 03:13:47'),
	(9, 7, 18, 1, '2013-03-01 03:17:13'),
	(10, 8, 19, 1, '2013-03-01 03:40:32'),
	(11, 8, 23, 1, '2013-03-01 03:40:40'),
	(12, 9, 19, 1, '2013-03-01 03:41:03');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sections: ~1 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `page_id`, `order`, `section_name`, `created_by`) VALUES
	(2, 2, 0, 'about-us', 1);
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

-- Dumping data for table newcms.section_lang: ~2 rows (approximately)
/*!40000 ALTER TABLE `section_lang` DISABLE KEYS */;
INSERT INTO `section_lang` (`section_id`, `lang`, `title`, `subtitle`, `content`) VALUES
	(2, 'en', 'b', 'b', 'b'),
	(2, 'id', 'a', 'a', '<h2>About</h2><span>bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of&nbsp;<a target="_blank" rel="nofollow" href="https://github.com/xing/wysihtml5">wysihtml5</a>&nbsp;and&nbsp;<a target="_blank" rel="nofollow" href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a></span>');
/*!40000 ALTER TABLE `section_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `never_exp` int(1) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sliders: ~0 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;


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
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
