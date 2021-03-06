-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 09:07 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `title`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`, `image`, `slug`, `category`) VALUES
(11, 'Thủ tục nhập học', '<p>nội dung thủ tục nhập học 1</p>', '0000-00-00 00:00:00', '', '2017-12-01 16:47:58', 'administrator', 0, '11828789_1662838560598827_7938886227678840225_n1.png', 'thu-tuc-nhap-hoc', 0),
(12, 'Lịch học', '<p>nội dung lịch học 1</p>', '0000-00-00 00:00:00', '', '2017-12-01 16:48:25', 'administrator', 0, '11887970_1667411716808178_8048824633656872007_n2.jpg', 'lich-hoc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text,
  `is_actived` tinyint(1) DEFAULT '1',
  `text` varchar(255) DEFAULT NULL,
  `url` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `is_actived`, `text`, `url`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(23, '3b7f32d8-1977-4ba0-b2c1-156df52fe006.jpg', 1, 'Banner 1', '', '2017-11-17 10:44:09', 'administrator', '2017-11-17 10:44:09', 'administrator', 0),
(24, 'f8791c75-c9c2-4052-949d-4309247838bf.jpg', 1, 'Banner 2', '', '2017-11-17 10:44:27', 'administrator', '2017-11-17 10:44:27', 'administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('043rdu2r29cau6qiauhjn74p22835l2f', '::1', 1512122876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132323837363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('19bu0eopr1jijiuur528iqjrro418uoh', '::1', 1512188383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138383338333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('1v48fju1ljhijsh5op4b8d5afuso6m9f', '::1', 1512184066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138343036363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('3pihgp92cu9idcpnadsvoim40nbs8ver', '::1', 1512460650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323436303635303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313831393933223b),
('3uqs2ngb66ftesups9ue1dj0feag95hu', '::1', 1512124013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132343031333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('48rqjs6rb9vsc625kbgapbt7pfvqud7n', '::1', 1512117499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131373439393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('4b23f03jlpi0tu0gg18hkvpshptesu6b', '::1', 1512121114, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132313131343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('6rm2jrin8937m48f4sftbi8e18at5nh3', '::1', 1512120803, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132303830333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('7bfpiecf7tufk0pvspaoqaup95lnk5tv', '::1', 1512115047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131353034373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('7fhu2qrnoqj41kb8c2fhd1i4p1e34ook', '::1', 1512130997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133303939373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('7gpcophtterdb1sn73o343akafl9k4r8', '::1', 1512117823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131373832333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('7nvavjk5j78u3ttu027aruvgh7rqurnt', '::1', 1512132221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133323230333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('7tisp34ubndrtacbqn2su66isb2kv899', '::1', 1512131493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133313439333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('8f7uv3se8o8ijnbh3ka927rcjkl0vigp', '::1', 1512132203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133323230333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('8hra4h2folps7osdsgu4bubmv99fe54p', '::1', 1512129079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132393037393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('9urklg0v7ub4mjk3kemj5e8e50rmrpem', '::1', 1512185905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138353930353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('aev0r122rfv2089b0henmcr0mnjnk31k', '::1', 1512122487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132323438373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b6d6573736167657c733a31393a224974656d20646f6573206e6f74206578697374223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('algjtouioq3bi85jetdqjarh6oe29335', '::1', 1512185087, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138353038373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('btafktu5nnvloouob559fj8sqi4ppvl3', '::1', 1512124320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132343332303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('cjaa7hne9ppp526b4tasjnge5kb4ipef', '::1', 1512182997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138323939373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('d77kk599th3063hg12ocbvh97ohf5fil', '::1', 1512188387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138383338333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('dnbg8oirbje8ko7g4gid0lojvlii949i', '::1', 1512460990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323436303939303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313831393933223b),
('eftu8ncfo9t8mt7qn11k00b6u8i4e6jv', '::1', 1512130579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133303537393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('fvhiqoaa09p71rk9motj3a3r3bio7grq', '::1', 1512117021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131373032313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('g2b790aac15hhnlklaa2vpo84k4k98mv', '::1', 1512186498, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138363439383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('g590boak2jpholofn8n7k5g1t6oaugfm', '::1', 1512129509, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132393530393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('hqdhdiuujb77mfimsm0fgvp4v4uecmee', '::1', 1512457747, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323435373734373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313831393933223b),
('i7406qu5ceqfuead5pkvjnc6agtavtoh', '::1', 1512116391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131363339313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('k73l4ifthbvks6eq6007u8tmre3c95hc', '::1', 1512116720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131363732303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('kbek5r2dj2fq8ghe6fapkn2pq49rqdd6', '::1', 1512121720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132313732303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('kdmvoqdnoi72haebk073rtfcl0qn6sns', '::1', 1512134254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133343235343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313233363935223b),
('lefr8sin34ti015spo0tdd037jprnghm', '::1', 1512115430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131353433303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('lvkrg4elg3pt850h2qrmr6b3gsnji809', '::1', 1512119464, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131393436343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('m4v2kc7iuffj36qtefbm43brmm4tq7bh', '::1', 1512121419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132313431393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('mlsmn9lhid9sn77l78sleq768p51r43e', '::1', 1512114714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131343731343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('mqrn0713mqib76r2ls7712br2ke36kvv', '::1', 1512118379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131383337393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('ms0qhd9olqqgc9jr3bhfgsbnbqqovtcj', '::1', 1512123687, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132333638373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('pr2nch4arh589qqsbhm4b99mc27g3b3i', '::1', 1512119769, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131393736393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('qshegqr7vikg3lnp3e77787c7kd5rai1', '::1', 1512124994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132343939343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313132343738223b),
('rd45i3tg0paf39i53p2lq9bk2u9lh9ol', '::1', 1512119142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131393134323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('rluuoa0c8nq902tna867jqc5gisaii9k', '::1', 1512461185, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323436303939303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313831393933223b),
('su30s16nj4b9dtcfn1fp7odmemdemhcj', '::1', 1512134604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133343630343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313233363935223b),
('svfcjg3h5j2auqth962upup3v17mejo4', '::1', 1512182622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138323632323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('t41podi394614mn4pl6isfipma0maimk', '::1', 1512123386, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132333338363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('tlerp46tkdaui41qmpb4s3sku5velan1', '::1', 1512134774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323133343630343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313233363935223b),
('ttte777v9fvpqq5jo5kknj225flnl4rs', '::1', 1512184779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138343737393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('ttuenb9jspnnb9onu1eovi9o483dpr7b', '::1', 1512120090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132303039303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('u72dtopsk2nahri2osn15r1ikrlkd0sf', '::1', 1512115834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323131353833343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('udajpn9ea2cf6amrcojnbfltmv7vkg6k', '::1', 1512185591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138353539313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('vg1dajkh6obccqp3b4less82l5ccbqed', '::1', 1512120491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323132303439313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132303935303635223b),
('vgsgidhspr8e2pmrvg8bqhbg5agvg459', '::1', 1512182282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323138323238323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313333393433223b),
('vmelhepr0tkofruj3ken14l0g8gs47fj', '::1', 1512457446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323435373434363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353132313831393933223b);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `is_deleted` tinyint(1) DEFAULT '0',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `introduce`
--

INSERT INTO `introduce` (`id`, `title`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`, `image`, `slug`, `category`, `sub_category`) VALUES
(25, 'Tổng quan', '<p>nội dung tổng quan 1</p>', NULL, NULL, '2017-12-01 16:46:40', 'administrator', 0, '11017042_1652458474970169_7919033472674742016_n2.jpg', 'tong-quan', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `parental`
--

CREATE TABLE `parental` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parental`
--

INSERT INTO `parental` (`id`, `title`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`, `image`, `slug`, `category`) VALUES
(10, 'Chê độ sinh hoạt 1 ngày', '<p>nội dung chế độ sinh hoạt 1</p>', '2017-12-01 16:48:47', 'administrator', '2017-12-01 16:48:47', 'administrator', 0, '11904641_1666010526948297_4879654193919550599_n.jpg', 'che-do-sinh-hoat-1-ngay', 0),
(11, 'Giờ đưa đón', '<p>nội dung giờ đưa đ&oacute;n 1</p>', '2017-12-01 16:49:40', 'administrator', '2017-12-01 16:49:40', 'administrator', 0, '11935099_1667411820141501_6900367301029460513_n1.png', 'gio-dua-don', 0);

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1512453897, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'nak_admin', '$2y$08$Dwaj3aGpcBANtZujnHylVelm6xlId28UJAEvWO/WYq0QX/3p72BT6', NULL, 'nak_admin@hoamyphamnamanhkhuong.com', NULL, NULL, NULL, NULL, 0, 1510902781, 1, 'NAK', 'Admin', 'NAK', '0');

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
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parental`
--
ALTER TABLE `parental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribe`
--
ALTER TABLE `subcribe`
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
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parental`
--
ALTER TABLE `parental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcribe`
--
ALTER TABLE `subcribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
