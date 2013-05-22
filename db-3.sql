-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-05-22 11:18:37
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `layout`, `ordering`) VALUES
	(4, 'menu atas', 'menu_atas', 1),
	(5, 'menu headline', 'menu-headline', 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table newcms.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `fullday` int(11) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.news: ~1 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `news_title`, `start_date`, `end_date`, `fullday`, `user_id`) VALUES
	(5, 'seminar-computer', '2013-05-21 09:53:40', '2013-05-21 09:53:40', 1, NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table newcms.news_lang
DROP TABLE IF EXISTS `news_lang`;
CREATE TABLE IF NOT EXISTS `news_lang` (
  `lang` varchar(2) DEFAULT NULL,
  `news_id` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `content` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  UNIQUE KEY `lang` (`lang`,`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.news_lang: ~2 rows (approximately)
/*!40000 ALTER TABLE `news_lang` DISABLE KEYS */;
INSERT INTO `news_lang` (`lang`, `news_id`, `title`, `url`, `subtitle`, `content`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
	('en', 5, 'asdasd  sa', 'asdasds-a', 'asdasd ss', 'asdasdadfasdfasdf a', 'z a', 'z a', 'z a'),
	('id', 5, 'asdasd', 'asdasd', 'asdasd', 'asdasdadfasdfasdf', 'z', 'z', 'z');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.page: ~3 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `page_name`, `menu_id`, `url`, `order`, `parent`, `is_home`, `publish`, `layout`, `protected`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'home', 5, 'home', 0, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'test', 5, 'test', 0, 0, 1, 1, 'home', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'about', 4, 'about', 0, 0, 0, 1, 'about', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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

-- Dumping data for table newcms.page_lang: ~6 rows (approximately)
/*!40000 ALTER TABLE `page_lang` DISABLE KEYS */;
INSERT INTO `page_lang` (`lang`, `page_id`, `url`, `title`, `subtitle`, `nav_title`, `meta_title`, `meta_description`, `meta_keywords`, `online`) VALUES
	('en', 1, '', 'a', 'a', 'a', 'a', 'a', 'a', 1),
	('en', 2, '', 'WHO WE ARE', '', 'WHO WE ARE', 'asd', 'asd', 'ad', 1),
	('en', 3, '', 'asdasdasd', '', 'about-us', 'a', 'a', 'a', 1),
	('id', 1, '', 'a', 'a', 'a', 's', 's', 's', 1),
	('id', 2, '', 'a', 'a', 'a', 'sd', 'sd', 'sd', 1),
	('id', 3, '', 'asdasdasd', '', 'tentang kami', 'a', 'a', 'a', 1);
/*!40000 ALTER TABLE `page_lang` ENABLE KEYS */;


-- Dumping structure for table newcms.periode_courses
DROP TABLE IF EXISTS `periode_courses`;
CREATE TABLE IF NOT EXISTS `periode_courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode` varchar(200) DEFAULT NULL,
  `actived` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.periode_courses: ~1 rows (approximately)
/*!40000 ALTER TABLE `periode_courses` DISABLE KEYS */;
INSERT INTO `periode_courses` (`id`, `periode`, `actived`) VALUES
	(1, 'Jan 2013 - Mar 2013', NULL);
/*!40000 ALTER TABLE `periode_courses` ENABLE KEYS */;


-- Dumping structure for table newcms.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `enable_comment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
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

-- Dumping data for table newcms.posts_lang: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_lang` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newcms.sections: ~2 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `page_id`, `order`, `section_name`, `created_by`) VALUES
	(2, 2, 0, 'about-us', 1),
	(3, 1, 0, 'TENTANG KAMI', 1);
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

-- Dumping data for table newcms.section_lang: ~4 rows (approximately)
/*!40000 ALTER TABLE `section_lang` DISABLE KEYS */;
INSERT INTO `section_lang` (`section_id`, `lang`, `title`, `subtitle`, `content`) VALUES
	(2, 'en', 'b', 'b', '<h2>tentang kami</h2>bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of&nbsp;<a target="_blank" rel="nofollow" href="https://github.com/xing/wysihtml5">wysihtml5</a>&nbsp;and&nbsp;<a target="_blank" rel="nofollow" href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a><br>'),
	(3, 'en', 'WHO WE ARE', '', '<p>Dates back to May 19, 1980, when a group of prominent business leaders in Indonesia set up the Prasetiya Mulya Foundation (YPM) as a commitment to give real contributions to the nation. The words of Prasetiya Mulya is the Sanskrit words for noble pledge; the name that was given by the President of Republic of Indonesia.</p>\r\n\r\n<p><img alt="" src="http://localhost/neweli/file/image/photo1.png" style="height:263px; width:620px" /><br />\r\n<br />\r\nWith a mission to develop professionalism in Indonesia business management practices that anchored to the sound management knowledge and skill, Prasetiya Mulya Foundation established the Management Development Centre in 1982, which later became the Prasetiya Mulya Institute of Management (IMPM) ; a not for profit organization to provide management education and training. Beside executive management courses and development program for small and medium enterprises, Prasetiya Mulya Institute of Management also initiated the first MBA program in Indonesia.In 1993, the Prasetiya Mulya Institute of Management which offered the MBA program was renamed to the Sekolah Tinggi Manajemen Prasetiya Mulya (Prasetiya Mulya School of Management), in compliance with new regulations of Indonesia Ministry of Education. These new regulations also required the replacement of Master of Business Administration (MBA) degree with a Magister Management (MM).</p>\r\n\r\n<p>Meanwhile, the executive learning programs which not offer the academic degree still be managed under Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). In 2000, with an objective to promote the existence of business school in Indonesia, we decided to use Prasetiya Mulya Business School as our corporate brand. In order to strengthen the brand of Prasetiya Mulya Business School, we are offering our services in business management education either for academic degree or executive programs under single brand.The enhancement of our services in academic programs as well as in the executive programs, the escalation of quality requirement in both programs, the increasing flexibility needed to cope with the business dynamics and the burgeoning demand of contextualization and customized solution in developing business people certainly require full hearted people, a focus management team and specific competencies to be developed further.</p>\r\n\r\n<p>All of these things are necessitated to improve our services, to enhance the impact of the solution and to maintain our commitment in developing human asset value of the business. This was what we have done since 2009 to enhance our services to Indonesia business world in non academic development programs.With more than 30 years experiences in partnering with numerous companies in developing reliable talents and with, the continuous development in the management knowledge and business contextualization Prasetiya Mulya Executive Learning Institute, formerly known as Lembaga Manajemen (Prasetiya Mulya Institute of Management), is ready for partnering with you to develop a higher value of human asset in your company, not only to improve the business performance but also to enhance the contribution in transforming Indonesia business world better.</p>\r\n'),
	(2, 'id', 'a', 'a', '<h2>About</h2><span>bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of&nbsp;<a target="_blank" rel="nofollow" href="https://github.com/xing/wysihtml5">wysihtml5</a>&nbsp;and&nbsp;<a target="_blank" rel="nofollow" href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a></span>'),
	(3, 'id', 'TENTANG KAMI', '', '<p>Pada tanggal 19 Mei 1980, sekelompok pemimpin bisnis terkemuka di Indonesia sepakat untuk mendirikan Yayasan Prasetiya Mulya (YPM) sebagai salah satu bentuk komitmen mereka untuk memberikan kontribusi nyata untuk bangsa Indonesia. Presiden Republik Indonesia pada tahun 1980, Bapak Soeharto, member nama &lsquo;Prasetiya Mulya&rsquo; kepada yayasan ini dan 2 kata tersebut merupakan bahasa Sansekerta yang memiliki arti janji mulya.</p>\r\n\r\n<p><img alt="" src="http://localhost/neweli/file/image/photo1.png" style="height:263px; width:620px" /></p>\r\n\r\n<p>Dengan misi untuk mengembangkan profesionalisme dalam praktek manajemen bisnis di Indonesia melalui manajemen ilmu pengetahuan dan keterampilan, Yayasan Prasetiya Mulya mendirikan Pusat Pengembangan Manajemen (Management Development Center) pada tahun 1982, yang kemudian berubah menjadi Institute of Management Prasetiya Mulya (IMPM). IMPM sendiri merupakan sebuah organisasi (non-profit organization) yang bertanggungjawab menyediakan pendidikan manajemen serta pelatihannya. Selain kursus manajemen eksekutif dan program pengembangan usaha kecil-menengah, Institute of Management Prasetiya Mulya juga memprakarsai program MBA pertama di Indonesia.</p>\r\n\r\n<p><br />\r\nPada tahun 1993, Institute of Management Prasetiya Mulya (IMPM) yang menawarkan program MBA ini kemudian diubah namanya menjadi Sekolah Tinggi Manajemen Prasteiya Mulya. Pengubahan nama ini disesuaikan dengan peraturan baru Departemen Pendidikan di Indonesia. Dengan berlakunya peraturan tersebut juga membuat Prasetiya Mulya mengubah nama program yang awalnya Master of Business Administration (MBA) menjadi Magister Manajemen (MM). Dengan adanya perubahan nama ini, tidak berpengaruh pada program pembelajaran eksekutif yang tidak menawarkan gelar akademis.</p>\r\n\r\n<p>Program tersebut tetap akan dikelola di bawah Lembaga Manajemen Prasetiya Mulya (Prasetiya Mulya Institute of Management). Di tahun 2000, dengan tujuan mempromosikan keberadaan sekolah bisnis di Indonesia, kami memutuskan untuk menggunakan Prasetiya Mulya Business School sebagai merek (brand) dari perusahaan kami. Dalam rangka memperkuat merek tersebut, kami juga menawarkan jasa dalam pendidikan manajemen bisnis, baik untuk gelar akademis atau program eksekutif di bawah merek tunggal.</p>\r\n\r\n<p><br />\r\nPeningkatan layanan kami dalam program akademik dan eksekutif, peningkatan persyaratan mutu pada kedua program, peningkatan fleksibilitas untuk mengatasi dinamika bisnis dan permintaan yang berkembang pada konstekstualisasi dan solusi yang disesuaikan pada pengembangan pelaku bisnis tentu membutuhkan orang yang sungguh-sungguh, tim yang fokus pada manajemen serta kompetensi spesifik untuk dikembangkan lebih lanjut. Semua hal yang disampaikan sebelumnya tersebut mengharuskan kami untuk meningkatkan pelayanan agar dampak dari sebuah solusi juga semakin besar serta mempertahankan komitmen kami dalam mengembangkan asset manusia dari bisnis. Hal inilah yang terus menerus kami lakukan sejak 2009 untuk meningkatkan layanan kami kepada dunia bisnis Indonesia dalam program pembangunan non-akademik.</p>\r\n\r\n<p><br />\r\nDengan lebih dari 30 tahun pengalaman bermitra dengan berbagai perusahaan dalam mengembangkan bakat mereka, Prasetiya Mulya terus melakukan pengembangan dalam manajemen pengetahuan dan kontekstualisasi bisnis Prasetiya Mulya Executive Learning Institute (yang sebelumnya dikenal dengan Prasetiya Mulya Institute of Management); kami siap untuk bermitra dengan Anda untuk mengembangkan nilai lebih tinggi dari aset manusia di perusahaan Anda.&nbsp; Tidak hanya fokus untuk meningkatkan kinerja atau performa bisnis tetapi juga untuk meningktatkan kontribusi dalam mengubah duniu bisnis Indonesia menjadi lebih baik lagi.</p>\r\n');
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
	(4, 'slider 2', NULL, '2013-05-21 01:13:23', '2013-05-22 02:13:35', '2013-05-22 09:55:30'),
	(5, 'Slider 1', NULL, '2013-05-06 01:26:40', '2013-05-22 02:26:55', '2013-05-22 09:55:15'),
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
	('en', 4, 'slider 2', 'banner-2-43b3f5b8cf-baner-2.jpg', 'xx'),
	('id', 4, 'slider 2', 'banner-5-d2bccdbce4-bannerc-2.jpg', 'ss'),
	('en', 5, 'Slider 1', 'banner-1-21dee38a7b-baner-1.jpg', 'asdasd'),
	('id', 5, 'Slider 1', 'banner-4-a3802589af-banner-1.jpg', 'asdasd'),
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
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
