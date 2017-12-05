-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2017 at 10:36 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matocrea_nak_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advise`
--

CREATE TABLE `advise` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` text,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advise`
--

INSERT INTO `advise` (`id`, `category_id`, `image`, `title`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(1, 3, 'BackdropLED_CoThiDua-01.jpg', 'asd123', 'asd1', '2017-10-10 14:46:56', 'administrator', '2017-10-10 14:54:59', 'administrator', 1),
(2, 4, 'banner_21.jpg', 'Bài viết tư vấn làm đẹp', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam efficitur tempus tellus, id sollicitudin turpis. Aenean pretium, quam at pharetra tempor, nisi est malesuada orci, ac rutrum arcu magna at sapien. Sed id porttitor enim. Duis neque erat, rhoncus vitae tristique in, laoreet eu lacus. Fusce ullamcorper aliquam purus in mattis. Phasellus cursus semper iaculis. Ut at porttitor ante, nec sollicitudin lacus. In ultricies condimentum libero ultrices tristique. In nibh eros, mollis id rhoncus sit amet, lobortis eget elit. Vestibulum feugiat consectetur orci, id faucibus libero facilisis et. Sed interdum bibendum sollicitudin. Nam in est at nisi dictum imperdiet.</p>\r\n<p>Nulla enim urna, rutrum sit amet vulputate eget, ornare at leo. Nullam feugiat purus sapien, at aliquet est egestas vitae. Integer posuere pulvinar nunc, vitae malesuada felis. Nulla suscipit congue elit sit amet tristique. Fusce mattis porta lacus sed porttitor. Maecenas nec efficitur odio. Mauris et arcu congue, porttitor nulla non, vulputate nisi. Quisque dictum, tellus id vulputate iaculis, justo orci gravida nulla, vel lobortis eros lectus porttitor orci. Etiam a lorem sodales, sodales leo at, sodales turpis. Suspendisse non ipsum eu risus venenatis ultrices at in odio. Nam eu leo viverra, porttitor justo non, dignissim ante. Curabitur sed bibendum ligula, at efficitur mauris. Suspendisse feugiat libero elit, nec interdum ligula lobortis ac. Nam elementum tincidunt nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam est sapien, efficitur eget egestas ut, vulputate id metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '2017-11-09 17:11:33', 'administrator', '2017-11-09 17:15:23', 'administrator', 0),
(3, 5, 'banner_1.jpg', 'Bài viết tư vấn dưỡng da', '<p>Nulla odio justo, pulvinar quis mattis quis, cursus sed lacus. In vulputate auctor purus, ut convallis elit rutrum id. Proin luctus mollis justo eu malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent elementum dui sit amet purus tincidunt, vitae ultrices eros ornare. Maecenas lobortis nibh in mauris efficitur, eget fermentum lorem egestas. Ut convallis maximus orci, non tristique massa lacinia id. Maecenas sollicitudin elit id enim interdum, vel laoreet tortor aliquet. Vestibulum volutpat rhoncus mi ut lacinia. Cras id auctor diam. Morbi venenatis accumsan lorem, at laoreet orci rhoncus a. Nam condimentum laoreet mauris vitae bibendum. Phasellus eu metus vel odio posuere fermentum vel ut elit. Donec sed lobortis elit. Ut faucibus molestie rutrum.</p>\r\n<p><img src=\"http://nak.matocreative.vn//source/banner_1.jpg?1510223179223\" alt=\"ảnh minh họa\" width=\"390\" height=\"290\" /></p>\r\n<p>In dapibus venenatis sem, ut varius metus consequat at. Nulla facilisi. Praesent sed porttitor dolor, quis cursus ipsum. Cras congue nisi vitae mollis tempus. Etiam vestibulum mi in massa ultrices vulputate. Fusce tempus ligula a felis venenatis imperdiet. Aenean egestas venenatis urna, vel dapibus nulla venenatis quis. Donec sapien odio, consequat id eros in, vestibulum dignissim turpis. Sed aliquam, lacus id tincidunt luctus, augue ante pharetra nisi, ut consectetur turpis ante vitae arcu.</p>', '2017-11-09 17:26:27', 'administrator', '2017-11-09 17:26:27', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advise_category`
--

CREATE TABLE `advise_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advise_category`
--

INSERT INTO `advise_category` (`id`, `title`, `description`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(1, 'asd1', 'asdasd1', '2017-10-10 14:33:25', 'administrator', '2017-10-10 14:36:07', 'administrator', 1),
(2, 'qwe', 'qwe', '2017-10-10 14:45:12', 'administrator', '2017-10-10 14:45:12', 'administrator', 1),
(3, 'zxc', 'zxc', '2017-10-10 14:54:01', 'administrator', '2017-10-10 14:54:01', 'administrator', 1),
(4, 'Làm đẹp', '', '2017-11-09 17:10:35', 'administrator', '2017-11-09 17:10:35', 'administrator', 0),
(5, 'Trắng da', '', '2017-11-09 17:10:47', 'administrator', '2017-11-09 17:10:47', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text,
  `description` text,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `type`, `title`, `image`, `description`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(2, 0, 'asd1', 'BackdropLED_HCLD_HangNhi-01.jpg', 'asd1', '<p>asd1</p>', '2017-10-10 15:10:24', 'administrator', '2017-10-10 15:15:08', 'administrator', 1),
(3, 0, 'Bài viết tin tức 001', 'banner_2.jpg', 'In dapibus venenatis sem, ut varius metus consequat at. Nulla facilisi. Praesent sed porttitor dolor, quis cursus ipsum. Cras congue nisi vitae mollis tempus', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam efficitur tempus tellus, id sollicitudin turpis. Aenean pretium, quam at pharetra tempor, nisi est malesuada orci, ac rutrum arcu magna at sapien. Sed id porttitor enim. Duis neque erat, rhoncus vitae tristique in, laoreet eu lacus. Fusce ullamcorper aliquam purus in mattis. Phasellus cursus semper iaculis. Ut at porttitor ante, nec sollicitudin lacus. In ultricies condimentum libero ultrices tristique. In nibh eros, mollis id rhoncus sit amet, lobortis eget elit. Vestibulum feugiat consectetur orci, id faucibus libero facilisis et. Sed interdum bibendum sollicitudin. Nam in est at nisi dictum imperdiet. Nulla enim urna, rutrum sit amet vulputate eget, ornare at leo.</p>\r\n<p>Nullam feugiat purus sapien, at aliquet est egestas vitae. Integer posuere pulvinar nunc, vitae malesuada felis. Nulla suscipit congue elit sit amet tristique. Fusce mattis porta lacus sed porttitor. Maecenas nec efficitur odio. Mauris et arcu congue, porttitor nulla non, vulputate nisi. Quisque dictum, tellus id vulputate iaculis, justo orci gravida nulla, vel lobortis eros lectus porttitor orci. Etiam a lorem sodales, sodales leo at, sodales turpis. Suspendisse non ipsum eu risus venenatis ultrices at in odio. Nam eu leo viverra, porttitor justo non, dignissim ante. Curabitur sed bibendum ligula, at efficitur mauris. Suspendisse feugiat libero elit, nec interdum ligula lobortis ac. Nam elementum tincidunt nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam est sapien, efficitur eget egestas ut, vulputate id metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p><img src=\"http://nak.matocreative.vn//source/banner_1.jpg?1510223364481\" alt=\"\" width=\"390\" height=\"290\" /></p>\r\n<p>Ut ipsum lectus, condimentum et tortor feugiat, bibendum fermentum magna. In turpis nisl, condimentum mattis ultricies et, hendrerit a nisl. Nam sit amet facilisis libero. Duis sagittis quam vitae libero varius sollicitudin. Nam euismod consectetur ultrices. Aliquam et tristique lacus. In velit mi, iaculis ut turpis venenatis, accumsan congue metus. Donec molestie lacus eu efficitur lobortis. Aenean euismod dolor suscipit felis maximus, vel placerat neque accumsan. Donec ut lacus nisi. Sed vehicula posuere odio, in sollicitudin sapien porttitor feugiat. Sed tristique nec eros sed varius. Fusce eleifend ligula elementum sapien aliquam aliquet. Aenean at aliquam diam. In enim nisl, accumsan eu tellus in, egestas rhoncus lorem. Proin bibendum, dui non suscipit scelerisque, sem nisi lacinia justo, quis pulvinar turpis dui vitae nunc.</p>\r\n<p><img src=\"http://nak.matocreative.vn//source/banner_1.jpg?1510223372290\" alt=\"\" width=\"390\" height=\"290\" /></p>', '2017-11-09 17:29:33', 'administrator', '2017-11-09 17:29:33', 'administrator', 0),
(4, 1, 'Tuyển dụng tháng 10', 'banner_21.jpg', 'Tuyển dụng tháng 10', '<p>Nulla odio justo, pulvinar quis mattis quis, cursus sed lacus. In vulputate auctor purus, ut convallis elit rutrum id. Proin luctus mollis justo eu malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent elementum dui sit amet purus tincidunt, vitae ultrices eros ornare. Maecenas lobortis nibh in mauris efficitur, eget fermentum lorem egestas. Ut convallis maximus orci, non tristique massa lacinia id. Maecenas sollicitudin elit id enim interdum, vel laoreet tortor aliquet. Vestibulum volutpat rhoncus mi ut lacinia. Cras id auctor diam. Morbi venenatis accumsan lorem, at laoreet orci rhoncus a. Nam condimentum laoreet mauris vitae bibendum. Phasellus eu metus vel odio posuere fermentum vel ut elit. Donec sed lobortis elit. Ut faucibus molestie rutrum.</p>', '2017-11-09 17:35:18', 'administrator', '2017-11-09 17:35:18', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `trademark_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `trademark_id`, `title`, `description`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(3, 2, 'asd1111111111', 'asd1111111111', '2017-10-09 23:40:00', 'administrator', '2017-10-09 23:40:00', 'administrator', 1),
(4, 2, 'asd222222222222', 'asd222222222222', '2017-10-09 23:40:12', 'administrator', '2017-10-09 23:40:12', 'administrator', 1),
(5, 3, 'qwe111111111111', 'qwe111111111111', '2017-10-09 23:40:23', 'administrator', '2017-10-09 23:40:23', 'administrator', 1),
(6, 3, 'qwe2222222222222', 'qwe2222222222222', '2017-10-09 23:40:39', 'administrator', '2017-10-09 23:40:39', 'administrator', 1),
(7, 2, 'asd33333333', 'asd33333333', '2017-10-09 23:40:50', 'administrator', '2017-10-09 23:40:50', 'administrator', 1),
(8, 2, 'Kem dưỡng da mặt', '', '2017-11-09 16:52:15', 'administrator', '2017-11-09 16:52:15', 'administrator', 0),
(9, 3, 'Sữa rửa mặt', '', '2017-11-09 16:52:25', 'administrator', '2017-11-09 16:52:25', 'administrator', 0),
(10, 3, 'Kem dưỡng trắng da toàn thân', '', '2017-11-09 16:52:36', 'administrator', '2017-11-09 16:52:36', 'administrator', 0),
(11, 3, 'Kem và Bột làm trắng', '', '2017-11-09 16:52:48', 'administrator', '2017-11-09 16:52:48', 'administrator', 0),
(12, 3, 'Chăm sóc da mặt', '', '2017-11-09 16:55:49', 'administrator', '2017-11-09 16:55:49', 'administrator', 0),
(13, 3, 'Serum', '', '2017-11-09 16:55:57', 'administrator', '2017-11-09 16:55:57', 'administrator', 0),
(14, 4, 'Kem dưỡng trắng da toàn thân', '', '2017-11-09 16:56:49', 'administrator', '2017-11-09 16:56:49', 'administrator', 0),
(15, 4, 'Sữa rửa mặt', '', '2017-11-09 16:57:00', 'administrator', '2017-11-09 16:57:00', 'administrator', 0),
(16, 4, 'Kem tắm trắng', '', '2017-11-09 16:57:13', 'administrator', '2017-11-09 16:57:13', 'administrator', 0),
(17, 4, 'Mặt nạ dưỡng trắng da', '', '2017-11-09 16:57:23', 'administrator', '2017-11-09 16:57:23', 'administrator', 0),
(18, 5, 'Kem dưỡng trắng da toàn thân', '', '2017-11-09 16:57:37', 'administrator', '2017-11-09 16:57:37', 'administrator', 0),
(19, 5, 'Sữa rửa mặt', '', '2017-11-09 16:57:56', 'administrator', '2017-11-09 16:57:56', 'administrator', 0),
(20, 5, 'Kem tắm trắng', '', '2017-11-09 16:58:09', 'administrator', '2017-11-09 16:58:09', 'administrator', 0),
(21, 5, 'Mặt nạ dưỡng trắng da', '', '2017-11-09 16:58:18', 'administrator', '2017-11-09 16:58:18', 'administrator', 0),
(22, 6, 'Kem dưỡng trắng da toàn thân', '', '2017-11-09 16:58:33', 'administrator', '2017-11-09 16:58:33', 'administrator', 0),
(23, 6, 'Sữa rửa mặt', '', '2017-11-09 16:58:42', 'administrator', '2017-11-09 16:58:42', 'administrator', 0),
(24, 7, 'Kem tắm trắng', '', '2017-11-09 16:58:52', 'administrator', '2017-11-09 16:58:52', 'administrator', 0),
(25, 7, 'Kem tẩy tế bào chết', '', '2017-11-09 16:59:02', 'administrator', '2017-11-09 16:59:02', 'administrator', 0),
(26, 7, 'Sữa rửa mặt', '', '2017-11-09 16:59:11', 'administrator', '2017-11-09 16:59:11', 'administrator', 0),
(27, 7, 'Mặt nạ dưỡng trắng da', '', '2017-11-09 16:59:19', 'administrator', '2017-11-09 16:59:19', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `introduce`
--

CREATE TABLE `introduce` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `introduce`
--

INSERT INTO `introduce` (`id`, `title`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(1, 'Về chúng tôi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-09 12:58:40', 'Administrator', '2017-10-09 12:59:10', 'Administrator', 0),
(2, 'Tầm nhìn chiến lược', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.</p>', '2017-10-09 12:58:48', 'Administrator', '2017-10-09 13:42:56', 'administrator', 0),
(3, 'Sứ mệnh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-09 12:58:52', 'Administrator', '2017-10-09 12:59:18', 'Administrator', 0),
(4, 'Chứng nhận', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-09 12:58:59', 'Administrator', '2017-10-09 12:59:21', 'Administrator', 0),
(5, 'Điều khoản', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-09 12:59:03', 'Administrator', '2017-10-09 12:59:26', 'Administrator', 0),
(6, 'Thư viện hình ảnh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-09 12:59:06', 'Administrator', '2017-10-09 12:59:29', 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `trademark_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text,
  `price` decimal(10,0) DEFAULT NULL,
  `effect` varchar(255) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `producer` varchar(100) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `trademark_id`, `category_id`, `title`, `image`, `price`, `effect`, `weight`, `producer`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(1, 2, 3, 'asd', 'BackdropLED_CoThiDua-01.jpg|BackdropLED_BangKhenBTC-01.jpg', '123', 'qwe', 456, 'zxc', 'poiuyt', '2017-10-10 00:42:48', 'administrator', '2017-10-10 00:42:48', 'administrator', 1),
(2, 2, 8, 'Sản phẩm dưỡng da 001', '1.png', '100000', 'Dưỡng da', 100, 'Nam Anh Khương', 'Nội dung giới thiệu', '2017-10-10 00:44:07', 'administrator', '2017-11-09 17:02:23', 'administrator', 0),
(3, 2, 3, 'qwe', NULL, '0', '', 0, '', '', '2017-10-10 00:44:21', 'administrator', '2017-10-10 00:44:21', 'administrator', 1),
(4, 3, 5, 'qwe1', 'BackdropLED_BangKhenBTC-01.jpg', '0', '', 0, '', '', '2017-10-10 00:45:20', 'administrator', '2017-10-10 00:45:20', 'administrator', 1),
(5, 2, 7, 'qwe', 'BackdropLED_CoThiDua-01.jpg', '0', '', 0, '', '', '2017-10-10 00:45:43', 'administrator', '2017-10-10 00:45:43', 'administrator', 1),
(6, 3, 6, 'qwe2', 'BackdropLED_BangKhenBTC-01.jpg', '123', 'asd', 123, 'asd', 'Lorem ipsum dolor siProin aliquet tincidunt neque, vel sollicitudin eros rutrum ut. Sed eget ligula in quam consectetur ultricies vel at neque. Nullam euismod iaculis diam ac bibendum. Sed pharetra magna non mauris volutpat luctus. Duis sed ex sit amet justo porttitor rhoncus sit amet ultrices ex. Vestibulum id ipsum ac enim tincidunt sodales. Vestibulum non risus felis. Nunc finibus cursus pulvinar. Cras finibus est id urna tempus dapibus.t amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.', '2017-10-10 13:19:59', 'administrator', '2017-10-11 01:28:12', 'administrator', 1),
(9, 3, 5, 'aaa', 'BackdropLED_CoThiDua-01.jpg', '123', 'aaa', 0, '', '', '2017-10-10 18:52:10', 'administrator', '2017-10-10 18:52:10', 'administrator', 1),
(10, 4, 15, 'Sản phẩm dưỡng da 002', '2.png', '200000', 'Dưỡng da, trị nạm', 120, 'Nam Anh Khương', 'Nội dung giới thiệu sản phẩm', '2017-11-09 17:06:32', 'administrator', '2017-11-09 17:06:32', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcribe`
--

CREATE TABLE `subcribe` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcribe`
--

INSERT INTO `subcribe` (`id`, `email`, `created_at`) VALUES
(5, 'huck_rocker@yahoo.com', NULL),
(6, 'huck_rocker@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trademark`
--

CREATE TABLE `trademark` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trademark`
--

INSERT INTO `trademark` (`id`, `title`, `description`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(1, 'asdasd', 'asdasd', NULL, NULL, '2017-10-09 15:43:55', 'administrator', 1),
(2, 'Wikipedia', 'asd1', '2017-10-09 15:01:50', 'administrator', '2017-11-09 16:50:16', 'administrator', 0),
(3, 'Cream Nam Anh Khương', 'qwe', '2017-10-09 23:31:35', 'administrator', '2017-11-09 16:50:27', 'administrator', 0),
(4, 'Q-10 Sữa dê', '', '2017-11-09 16:50:34', 'administrator', '2017-11-09 16:50:34', 'administrator', 0),
(5, 'Q-10 Phấn hoa', '', '2017-11-09 16:50:42', 'administrator', '2017-11-09 16:50:42', 'administrator', 0),
(6, 'Q-10 Ngọc trai', '', '2017-11-09 16:50:50', 'administrator', '2017-11-09 16:50:50', 'administrator', 0),
(7, 'X-10 Khổ qua đào tiên', '', '2017-11-09 16:50:56', 'administrator', '2017-11-09 16:50:56', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1510220610, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advise`
--
ALTER TABLE `advise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advise_category`
--
ALTER TABLE `advise_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribe`
--
ALTER TABLE `subcribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advise`
--
ALTER TABLE `advise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `advise_category`
--
ALTER TABLE `advise_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subcribe`
--
ALTER TABLE `subcribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trademark`
--
ALTER TABLE `trademark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
