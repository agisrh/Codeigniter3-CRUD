-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_study
CREATE DATABASE IF NOT EXISTS `db_study` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_study`;

-- Dumping structure for table db_study.sttdb_attempts
CREATE TABLE IF NOT EXISTS `sttdb_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table db_study.sttdb_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `sttdb_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `sttdb_attempts` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_category
CREATE TABLE IF NOT EXISTS `sttdb_category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryDesc` text,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_study.sttdb_category: ~4 rows (approximately)
/*!40000 ALTER TABLE `sttdb_category` DISABLE KEYS */;
INSERT INTO `sttdb_category` (`categoryId`, `categoryName`, `categoryDesc`) VALUES
	(1, 'Mikroprocessor', 'Mikroprosesor adalah singkatan dari prosesor biasa juga disebut CPU (central processing unit). Komponen ini merupakan sebuah cip. Cip (chip atau IC/Integrated circuit) adalah sekeping silikon berukuran beberapa milimeter persegi yang mengandung puluhan ribu transistor dan komponen elektronik lain.'),
	(2, 'Java', 'Java adalah bahasa pemrograman yang multi platform dan multi device. Sekali anda menuliskan sebuah program dengan menggunakan Java, anda dapat menjalankannya hampir di semua komputer dan perangkat lain yang support Java, dengan sedikit perubahan atau tanpa perubahan sama sekali dalam kodenya. Aplikasi dengan berbasis Java ini dikompulasikan ke dalam p-code dan bisa dijalankan dengan Java Virtual Machine. Fungsionalitas dari Java ini dapat berjalan dengan platform sistem operasi yang berbeda karena sifatnya yang umum dan non-spesifik.'),
	(3, 'Android', 'Android adalah sistem operasi yang berbasis Linux untuk telepon seluler seperti telepon pintar dan komputer tablet. Android menyediakan platform terbuka bagi para pengembang untuk menciptakan aplikasi mereka sendiri untuk digunakan oleh bermacam peranti bergerak.'),
	(4, 'Web', 'Web development atau yang biasa dipanggil pengembangan aplikasi lebih condong pada apa yang terjadi dibalik layar, sehingga bukan hanya berkaitan dengan apa yang dilihat pengunjung web dan bagaimana kemudian berinteraksi dengan web tersebut melalui navigasi, aplikasi, dan fitur-fitur lainnya. Web development menciptakan karakteristik dan fungsi web yang memungkinkan suatu website dapat berinteraksi dengan pengujung sesuai dengan apa yang direncanakan dan diharapkan.');
/*!40000 ALTER TABLE `sttdb_category` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_menu
CREATE TABLE IF NOT EXISTS `sttdb_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` mediumint(8) unsigned NOT NULL DEFAULT '100',
  `label` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_id` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_study.sttdb_menu: ~15 rows (approximately)
/*!40000 ALTER TABLE `sttdb_menu` DISABLE KEYS */;
INSERT INTO `sttdb_menu` (`id`, `name`, `key`, `icon`, `position`, `label`, `parent_id`, `group_id`) VALUES
	(35, 'Master', '#', ' fa-cubes', 100, '', 0, 6),
	(36, 'Supplier', 'supplier', '', 100, '', 35, 6),
	(37, 'Product', 'product', '', 100, '', 35, 6),
	(41, 'Inbound', '#', ' fa-truck', 100, '', 0, 6),
	(42, 'Outbound', '#', ' fa-plane', 100, '', 0, 6),
	(43, 'Warehouse', 'warehouse', ' fa-home', 100, '', 0, 6),
	(44, 'List', 'warehouse', '', 100, '', 43, 6),
	(45, 'Stock', 'stock', '', 100, '', 43, 6),
	(46, 'Inspect', 'inspect', '', 100, '', 43, 6),
	(47, 'User', '#', 'fa-user-circle', 100, '', 0, 6),
	(48, 'List', 'auth', '', 100, '', 47, 6),
	(49, 'Group', 'auth/group', '', 100, '', 47, 6),
	(50, 'Role', 'auth/role', '', 100, '', 47, 6),
	(51, 'Pickup Request', 'pickup', '', 100, '', 41, 6),
	(52, 'Package', 'package', '', 100, '', 42, 6);
/*!40000 ALTER TABLE `sttdb_menu` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_menu_groups
CREATE TABLE IF NOT EXISTS `sttdb_menu_groups` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_study.sttdb_menu_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `sttdb_menu_groups` DISABLE KEYS */;
INSERT INTO `sttdb_menu_groups` (`id`, `name`, `slug`) VALUES
	(6, 'Navigation', 'navigation');
/*!40000 ALTER TABLE `sttdb_menu_groups` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_posts
CREATE TABLE IF NOT EXISTS `sttdb_posts` (
  `postsId` char(10) NOT NULL,
  `postsTitle` varchar(255) DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `author` int(11) unsigned NOT NULL,
  `postsDesc` text NOT NULL,
  `postsStatus` enum('Published','Draft') DEFAULT NULL,
  `poststype` enum('Materi','Tugas') DEFAULT NULL,
  `postsFile` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`postsId`),
  KEY `FK_sttdb_posts_sttdb_users` (`author`),
  KEY `FK_sttdb_posts_sttdb_category` (`categoryId`),
  CONSTRAINT `FK_sttdb_posts_sttdb_category` FOREIGN KEY (`categoryId`) REFERENCES `sttdb_category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sttdb_posts_sttdb_users` FOREIGN KEY (`author`) REFERENCES `sttdb_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_study.sttdb_posts: ~6 rows (approximately)
/*!40000 ALTER TABLE `sttdb_posts` DISABLE KEYS */;
INSERT INTO `sttdb_posts` (`postsId`, `postsTitle`, `categoryId`, `author`, `postsDesc`, `postsStatus`, `poststype`, `postsFile`, `createdAt`, `updatedAt`) VALUES
	('PST00004', 'Introduce Microprocessor', 1, 1, '<p>Tess</p>', 'Draft', 'Materi', 'PST00004.jpg', '2019-08-06 20:09:02', NULL),
	('PST00005', 'Module Praktikum Mikroprosesor', 1, 1, '<p><span style="text-align: justify;">membahas lebih dalam tentang ATMega8. Disini saya fokuskan pada pembahasan tentang fungsi pin, clock, fuse bit, dll.</span><br style="text-align: justify;"><img alt="" src="http://electromac.files.wordpress.com/2007/03/atmega8_chip_2.jpg" width="320" height="251" style="border: 0px; max-width: 100%; height: auto; text-align: justify;"><br style="text-align: justify;"><span style="text-align: justify;">bahwa mikrokontroler ATMega8 merupakan mikrokontroler keluarga AVR 8bit. Beberapa tipe mikrokontroler yang “berkeluarga” sama dengan ATMega8 ini antara lain ATMega8535, ATMega16, ATMega32, ATmega328, dll. Yang membedakan antara mikrokontroler ini adalah, ukuran memori, banyaknya GPIO (pin input/output), peripherial (USART, timer, counter, dll). Dari segi ukuran fisik, ATMega8 memiliki ukuran fisik lebih kecil dibandingkan dengan beberapa mikrokontroler yang disebutkan diatas. Namun untuk segi memori dan periperial lainnya ATMega8 tidak kalah dengan yang lainnya karena ukuran memori dan periperialnya relatif sama dengan ATMega8535, ATMega32, dll, hanya saja jumlah GPIO lebih sedikit dibandingkan mikrokontroler yang saya sebutkan diatas.</span><br></p>', 'Published', 'Materi', 'PST00005.docx', '2019-08-07 16:51:22', NULL),
	('PST00006', 'Tutorial Java Untuk Pemula', 2, 1, '<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;">Pemprograman Java menggunakan konsep pemrograman berorientasi obyek (PBO) atau&nbsp;<font color="#333333" face="Libre Franklin, Helvetica Neue, helvetica, arial, sans-serif"><span style="box-sizing: inherit; font-size: 16px;">Object Oriented Programming</span>&nbsp;(OOP). Semua program Java merupakaan suatu obyek. Dasar-dasar OOP meliputi<span style="box-sizing: inherit; font-size: 16px;">&nbsp;Class,&nbsp;Object, Attribute, Method</span>.</font></p><p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;">Secara umum, OOP adalah teknik yang memfokuskan desain program pada obyek dan class berdasarkan pada skenario di dunia nyata. Sebagai contoh, misalkan mobil. Sebuah mobil secara umum tentunya memiliki beberapa karakteristik, yaitu misalnya memiliki sejumlah roda, memiliki warna, memiliki beberapa pintu dsb.</p><p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;">Selanjutnya mobil ini bisa terdapat berbagai macam merek, misalnya mobil Suzuki Ertiga, Toyota Avanza dsb. Sebuah mobil tentunya juga bisa dijalankan, baik maju maupun mundur atau dihentikan.</p><p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;">Dalam OOP, mobil tersebut identik dengan Class, mobil Suzuki Ertiga, Avanza dll itu merupakan obyek. Jumlah roda, warna mobil, jumlah tempat duduk dll identik dengan atribut dari suatu obyek, serta proses untuk mengendalikan mobil (maju, mundur dan berhenti) itu dalam OOP identik dengan method dari suatu obyek.</p><p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;">Manfaat dari pemrograman yang menggunakan teknik OOP ini adalah kebebasan pengembangan, meningkatkan kualitas, mempermudah pemeliharaan, mempertinggi kemampuan dalam modifikasi dan meningkatkan penggunaan kembali software.</p>', 'Published', 'Materi', 'PST00006.pdf', '2019-08-07 16:59:46', NULL),
	('PST00007', 'Android Development Fundamental', 3, 1, '<p style="margin-bottom: 1.5rem; font-size: 18px; color: rgba(0, 0, 0, 0.84); font-family: Georgia, &quot;Times New Roman&quot;, Times, Merriweather, Cambria, Times, serif; letter-spacing: 0.16px;">Apa saja yang akan dipelajari?</p><ul style="margin-bottom: 1.5rem; font-size: 18px; color: rgba(0, 0, 0, 0.84); font-family: Georgia, &quot;Times New Roman&quot;, Times, Merriweather, Cambria, Times, serif; letter-spacing: 0.16px;"><li style="margin-bottom: 0.5rem;">Unit 1. Pengenalan Dasar Pemrograman Android</li><li style="margin-bottom: 0.5rem;">Unit 2. Merancang UI/UX</li><li style="margin-bottom: 0.5rem;">Unit 3. Background Task</li><li style="margin-bottom: 0.5rem;">Unit 4. Menggunakan Database</li><li style="margin-bottom: 0.5rem;">Unit 5. Penutup</li></ul><h2 id="modul-praktikum-pemrograman-android" style="margin: 1.5rem 0px; font-size: 1.925rem; font-family: Lato, &quot;PT Sans&quot;, Roboto, sans-serif; color: rgba(0, 0, 0, 0.84); letter-spacing: 0.16px;">Modul Praktikum Pemrograman Android</h2><p style="margin-bottom: 1.5rem; font-size: 18px; color: rgba(0, 0, 0, 0.84); font-family: Georgia, &quot;Times New Roman&quot;, Times, Merriweather, Cambria, Times, serif; letter-spacing: 0.16px;">Modul ini berisi praktek pemrograman android, dilengkapi dengan tugas yang harus dikerjakan. Bisa digunakan untuk kuliah praktikum.</p><figure class="figure mb-3 img-thumbnail rounded-0" style="margin-bottom: 1.75rem; color: rgba(0, 0, 0, 0.84); font-family: Georgia, &quot;Times New Roman&quot;, Times, Merriweather, Cambria, Times, serif; font-size: 18px; letter-spacing: 0.16px;"><img class="lazyload blur-up figure-img img-fluid mb-0 lazyloaded" data-src="https://d33wubrfki0l68.cloudfront.net/45fa799e8569bf3c46525c6794ae8fe758e9b9d0/5a0e4/img/android/ebook/modul-praktek-pemrograman-android.png" src="https://d33wubrfki0l68.cloudfront.net/45fa799e8569bf3c46525c6794ae8fe758e9b9d0/5a0e4/img/android/ebook/modul-praktek-pemrograman-android.png" alt="Ebook Praktikum Pemrograman Android V1" loading="lazy" style="filter: blur(0px); transition: filter 1s ease 0s, -webkit-filter 1s ease 0s;"></figure>', 'Published', 'Materi', 'PST00007.pdf', '2019-08-07 17:05:32', NULL),
	('PST00008', 'Materi laravel for beginner', 4, 1, '<p style="margin: 10px 0px 0px; line-height: 24px; padding: 0px; font-family: Lato, sans-serif; font-size: 16px; color: rgb(51, 51, 51);"><span style="font-weight: 700;">Laravel</span>&nbsp;adalah sebuah framework PHP yang dirilis dibawah lisensi MIT, dibangun dengan konsep MVC (model view controller). Laravel adalah pengembangan website berbasis MVP yang ditulis dalam PHP yang dirancang untuk meningkatkan kualitas perangkat lunak dengan mengurangi biaya pengembangan awal dan biaya pemeliharaan, dan untuk meningkatkan pengalaman bekerja dengan aplikasi dengan menyediakan sintaks yang ekspresif, jelas dan menghemat waktu.</p><p style="margin: 10px 0px 0px; line-height: 24px; padding: 0px; font-family: Lato, sans-serif; font-size: 16px; color: rgb(51, 51, 51);">MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi. MVC memisahkan aplikasi berdasarkan komponen- komponen aplikasi, seperti : manipulasi data, controller, dan user interface.</p><ol style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;PT Sans&quot;, sans-serif;"><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Model, Model mewakili struktur data. Biasanya model berisi fungsi-fungsi yang membantu seseorang dalam pengelolaan basis data seperti memasukkan data ke basis data, pembaruan data dan lain-lain.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">View, View adalah bagian yang mengatur tampilan ke pengguna. Bisa dikatakan berupa halaman web.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Controller, Controller merupakan bagian yang menjembatani model dan view.</li></ol><p style="margin: 10px 0px 0px; line-height: 24px; padding: 0px; font-family: Lato, sans-serif; font-size: 16px; color: rgb(51, 51, 51);">Beberapa fitur yang terdapat di Laravel :</p><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;PT Sans&quot;, sans-serif;"><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Bundles, yaitu sebuah fitur dengan sistem pengemasan modular dan tersedia beragam di aplikasi.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Eloquent ORM, merupakan penerapan PHP lanjutan menyediakan metode internal dari pola “active record” yang menagatasi masalah pada hubungan objek database.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Application Logic, merupakan bagian dari aplikasi, menggunakan controller atau bagian Route.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Reverse Routing, mendefinisikan relasi atau hubungan antara Link dan Route.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Restful controllers, memisahkan logika dalam melayani HTTP GET and POST.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Class Auto Loading, menyediakan loading otomatis untuk class PHP.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">View Composer, adalah kode unit logikal yang dapat dieksekusi ketika view sedang loading.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">IoC Container, memungkin obyek baru dihasilkan dengan pembalikan controller.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Migration, menyediakan sistem kontrol untuk skema database.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Unit Testing, banyak tes untuk mendeteksi dan mencegah regresi.</li><li style="font-size: 16px; font-family: Lato, sans-serif; line-height: 24px; margin: auto;">Automatic Pagination, menyederhanakan tugas dari penerapan halaman</li></ul>', 'Published', 'Materi', 'PST00008.pdf', '2019-08-07 18:30:59', NULL),
	('PST00009', 'Tugas Mikroprosessor', 1, 5, '<p>Berikut saya lampirkan tugas mikroprosessor</p>', 'Published', 'Tugas', 'PST00009.pdf', '2019-08-07 20:28:02', NULL);
/*!40000 ALTER TABLE `sttdb_posts` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_role
CREATE TABLE IF NOT EXISTS `sttdb_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `menu_id` mediumint(8) unsigned NOT NULL,
  `index` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`group_id`),
  KEY `permission_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table db_study.sttdb_role: ~11 rows (approximately)
/*!40000 ALTER TABLE `sttdb_role` DISABLE KEYS */;
INSERT INTO `sttdb_role` (`id`, `group_id`, `menu_id`, `index`) VALUES
	(1, 1, 1, ''),
	(2, 1, 2, ''),
	(3, 1, 3, ''),
	(4, 1, 4, ''),
	(5, 1, 5, ''),
	(6, 1, 36, ''),
	(7, 1, 7, ''),
	(8, 1, 8, ''),
	(9, 2, 36, ''),
	(10, 2, 2, ''),
	(11, 4, 36, 'Y');
/*!40000 ALTER TABLE `sttdb_role` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_users
CREATE TABLE IF NOT EXISTS `sttdb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table db_study.sttdb_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `sttdb_users` DISABLE KEYS */;
INSERT INTO `sttdb_users` (`id`, `ip_address`, `username`, `password`, `group_id`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
	(1, '127.0.0.1', 'Dosen', '$2y$08$TXDXtSI0pzvcr.XDgrSmbO3fxBOnNDzVfEgyeXh0GhAcEzvqMdLUi', 1, '', 'dosen@mail.com', '', 'w2mPfWHhf-AfmC5nznXncu85147c9d4106816ade', 1525982829, NULL, 1268889823, 1565189072, 1, 'Dosen', 'STTDB', '085860803101'),
	(5, '::1', 'Mahasiswa', '$2y$08$TXDXtSI0pzvcr.XDgrSmbO3fxBOnNDzVfEgyeXh0GhAcEzvqMdLUi', 2, NULL, 'mahasiswa@mail.com', NULL, NULL, NULL, NULL, 1526103852, 1565188675, 1, 'Mahasiswa', 'STTDB', '085860803101');
/*!40000 ALTER TABLE `sttdb_users` ENABLE KEYS */;

-- Dumping structure for table db_study.sttdb_user_groups
CREATE TABLE IF NOT EXISTS `sttdb_user_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table db_study.sttdb_user_groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `sttdb_user_groups` DISABLE KEYS */;
INSERT INTO `sttdb_user_groups` (`id`, `name`, `description`) VALUES
	(1, 'Dosen', 'Dosen'),
	(2, 'Mahasiswa', 'Mahasiswa');
/*!40000 ALTER TABLE `sttdb_user_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
