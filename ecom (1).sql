-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 06:17 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertising`
--

DROP TABLE IF EXISTS `advertising`;
CREATE TABLE IF NOT EXISTS `advertising` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(250) NOT NULL,
  `intro` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `link` text NOT NULL,
  `photo` varchar(250) NOT NULL DEFAULT 'no-image.png',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `df` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`id`, `business_name`, `intro`, `mobile`, `address`, `link`, `photo`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(4, 'kava dev3', 'hello there', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:57:55', '2019-06-03 09:57:55', '0'),
(2, 'Kava Developers1', 'Hello', '9898375981', 'Ahmedabad', '#', '11770532fc0180f51df2e644898098c4.png', '1', '1', '2019-06-03 08:51:30', '2019-06-03 08:51:30', '0'),
(3, 'Kava Dev2', 'hello', '9898375981', 'Ahmedabad', 'https://www.kavadevelopers.com', '6c0d59b13327e401e4a15d8d849693a5.png', '1', '1', '2019-06-03 08:53:13', '2019-06-03 08:53:13', '0'),
(5, 'kava Dev4', 'hello', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:58:12', '2019-06-03 09:58:12', '0'),
(6, 'kava dev5', 'hello', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:58:28', '2019-06-03 09:58:28', '0'),
(7, 'kava defv6', 'hello', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:59:02', '2019-06-03 09:59:02', '0'),
(8, 'kava dev7', 'hello', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:59:27', '2019-06-03 09:59:27', '0'),
(9, 'kava dev8', 'hello', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 09:59:44', '2019-06-03 09:59:44', '0'),
(10, 'kava dev9', 'helo', '9898375981', 'ahmedabad', '#', 'no-image.png', '1', '1', '2019-06-03 10:00:03', '2019-06-03 10:00:03', '0'),
(11, 'kava dev10', 'hellpo', '9898375981', 'ahmedabads', '#', 'no-image.png', '1', '1', '2019-06-03 10:00:24', '2019-06-03 10:00:24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `df` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `df`) VALUES
(1, 'Women', 0),
(2, 'Men', 0),
(3, 'Footware', 0),
(4, 'Mobile', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hash` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `amount` decimal(40,2) NOT NULL,
  `short_desc` text NOT NULL,
  `desc` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `df` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `hash`, `name`, `amount`, `short_desc`, `desc`, `category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(1, '02d97bed230cb3255b908f51699e33bd', 'Moto Z play', '25000.00', '25000.00', '25000.00', '4', 2, '1', '1', '2019-05-06 09:46:09', '2019-05-06 09:46:09', 0),
(2, '4366a1f0469f990d530a3e2b6219f79e', 'Samsung Galaxy s10a', '12001.00', 'Samsung Branda', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><em><u>Specification</u></em></strong></h3>\r\n\r\n<ul>\r\n	<li>5.5 inch display</li>\r\n	<li>full displays</li>\r\n	<li>123</li>\r\n</ul>', '3', 1, '1', '1', '2019-05-06 09:48:37', '2019-05-06 11:05:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `p_id` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`p_id`, `image`) VALUES
('1', 'no-image.png'),
('2', 'no-image.png');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(250) NOT NULL,
  `owner_name` varchar(250) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `wp_no` varchar(250) NOT NULL COMMENT 'Watsapp No',
  `address` longtext NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL COMMENT 'Hours of Operation',
  `hour_operation` varchar(250) NOT NULL,
  `pro_or_servi` longtext NOT NULL COMMENT 'Products/Services',
  `payment_mode` varchar(250) NOT NULL,
  `photo` text NOT NULL,
  `info` longtext NOT NULL COMMENT 'Information',
  `detail_desc` longtext NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `owner_name`, `employee_name`, `mobile`, `wp_no`, `address`, `landmark`, `email`, `hour_operation`, `pro_or_servi`, `payment_mode`, `photo`, `info`, `detail_desc`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd', '34234234234', '34234234234', 'asdasdasd asdasd asd asd', 'asdasd asdasdasda', 'asdas@gmail.com', '1212', 'sda adsd', 'aasdasd', '5035bfe1a7b7ea1a5732ef696d603e86.png', 'sadasdads', '', '1', '2019-05-29 18:07:25', NULL, '2019-05-29 18:55:49'),
(2, 'footware', 'dash', 'emp', '0123456789', '1234567890', 'adasd asdasdasd asda s dasd', 'asdasd asda dasd', 'asdasd@gmail.com', '45', 'asdas asd asd asd asdas', 'dsasdasd', '79abdcde431b0ca7689475895dffb298.png', 'asdasdasd', '', '1', '2019-05-29 18:20:48', '2019-05-31 15:39:22', NULL),
(4, 'Gotham', 'Bruce Wayne', 'Lucius Fox', '2222222222', '2222555555', 'Gotham City', 'Wayne Towe', 'dsgsdkgjh@gmail.com', '9-5', 'application and', 'CASH', '36d44a9dab10f1ed99aff50c42cc03c5.PNG', 'DSMNB GKD GJHDKFGHDKF GHKD', '', '1', '2019-05-30 16:30:07', NULL, NULL),
(5, 'food Junction ***', 'coca cola', 'jguar', '7897897822', '4564585685', 'jkl sda dasdasdsssssssssssssssssssssss', 'Darpan Six Road, Ahemdabad', '108@gmail.com', '8 to 8', '//////////////////////////////////////////////////////////', 'Paytam  6363', '4fd08e6051f7d87c7a2793483599e171.PNG', '[][][][]][asdasssssssssssssssssssssssssssssssssss', 'opopoooooooooooooooooooooooooooo', '1', '2019-05-31 14:59:50', '2019-05-31 15:39:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `name` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `name`, `pass`, `email`, `mobile`, `delete_flag`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
(1, 'admin', 'Super User', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '9898989898', 0, '0', '1', '2018-11-30 06:34:34', '2019-01-27 17:33:32', NULL, 'user.png'),
(2, 'kava_dev', 'Kava Developers', '21232f297a57a5a743894a0e4a801fc3', 'kava@gmail.com', '9099998171', 0, '1', '1', '2019-05-02 15:09:09', '2019-05-02 15:34:26', '2019-05-02 15:23:48', 'user.png'),
(3, 'nayan', 'Nayan Ramani', '21232f297a57a5a743894a0e4a801fc3', 'nayan@gmail.com', '9898878720', 0, '1', '1', '2019-05-02 15:24:35', '2019-05-02 15:24:35', NULL, 'user.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
