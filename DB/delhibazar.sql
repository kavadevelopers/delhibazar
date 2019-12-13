-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2019 at 10:59 PM
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
  `plan_name` varchar(250) DEFAULT NULL,
  `exp_date` date DEFAULT NULL COMMENT 'Expiry Date',
  `page` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `df` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`id`, `business_name`, `intro`, `mobile`, `address`, `link`, `photo`, `plan_name`, `exp_date`, `page`, `position`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(13, 'Adver - 1', 'h', '1237894560', 'sdadsa', '', 'no-image.png', '2', '2019-09-27', 'Home', '1', '1', '1', '2019-08-28 12:16:23', '2019-08-28 12:16:23', '0'),
(14, 'Adver - 1 - 2', 'asdasd', '1231231230', 'fsdfsdf', '', 'no-image.png', '2', '2019-09-27', 'Home', '1', '1', '1', '2019-08-28 12:16:51', '2019-08-28 12:16:51', '0'),
(15, 'Adver - 1 - 3', 'fsdfsdf', '1234567890', 'dsadasd', '', 'no-image.png', '2', '2019-09-27', 'Home', '1', '1', '1', '2019-08-28 12:17:15', '2019-08-28 12:17:15', '0'),
(16, 'Adver - 2 - 1', 'dfsdf', '1324567890', 'Adver', '', 'no-image.png', '2', '2019-09-27', 'Business Detail', '4', '1', '1', '2019-08-28 12:17:37', '2019-08-28 23:16:18', '0'),
(17, 'Adver -2 - 2', 'Adver', '1234567890', 'Adver', '', 'no-image.png', '2', '2019-09-27', 'Business Detail', '4', '1', '1', '2019-08-28 12:17:59', '2019-08-28 23:16:09', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ad_package`
--

DROP TABLE IF EXISTS `ad_package`;
CREATE TABLE IF NOT EXISTS `ad_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_package`
--

INSERT INTO `ad_package` (`id`, `plan`, `price`, `duration`, `created_at`) VALUES
(2, 'silver', '4000.00', '30', '2019-06-11 14:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` text NOT NULL,
  `validity` text NOT NULL,
  `total_usage` text NOT NULL,
  `usage` varchar(100) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `qr` text NOT NULL,
  `created_at` datetime NOT NULL,
  `df` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `price`, `validity`, `total_usage`, `usage`, `image`, `qr`, `created_at`, `df`) VALUES
(10000, '100', '10', '12', '12', '', '', '2019-12-12 00:00:00', '1'),
(10001, '102.00', '10', '0', '0', '7d2b6ab374cd1233e698667fb546b251.png', 'C:\\wamp64\\www\\delhibazar\\admin\\/uploads/qr/6357599ab6f4c3b3d6d459136c8cb860.jpg', '0000-00-00 00:00:00', ''),
(10002, '102.00', '12', '10', '0', '761f8308d547d794bb1a46141eb1a997.png', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `card_purchase`
--

DROP TABLE IF EXISTS `card_purchase`;
CREATE TABLE IF NOT EXISTS `card_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` text NOT NULL,
  `amount` text NOT NULL,
  `card` text NOT NULL,
  `validity` text NOT NULL,
  `usage` text NOT NULL,
  `user` text NOT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_purchase`
--

INSERT INTO `card_purchase` (`id`, `t_id`, `amount`, `card`, `validity`, `usage`, `user`, `p_date`) VALUES
(1, 'dasdasd', '120', '10001', '10', '1', '5', '2019-12-05'),
(2, 'adad111212', '200', '10002', '0', '0', '5', '2019-12-10'),
(3, 'adad111212', '200', '10002', '8', '1', '5', '2019-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `card_usage`
--

DROP TABLE IF EXISTS `card_usage`;
CREATE TABLE IF NOT EXISTS `card_usage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` text NOT NULL,
  `user` text NOT NULL,
  `card` text NOT NULL,
  `amount` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_usage`
--

INSERT INTO `card_usage` (`id`, `vendor`, `user`, `card`, `amount`, `description`, `created_at`) VALUES
(1, '1', '5', '1', '10000', '', '2019-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` bigint(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `size` text,
  `delivered` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 = delivery done, 0 = not delivered',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `qty`, `product_id`, `user_id`, `size`, `delivered`, `created_at`, `updated_at`) VALUES
(61, 1, '6', '', '', 0, '2019-08-04 16:56:16', NULL),
(62, 1, '5', '', '', 0, '2019-08-04 16:56:37', NULL),
(63, 1, '6', '', '', 0, '2019-08-04 16:57:48', NULL),
(90, 1, '13', '9', 'M', 0, '2019-10-12 12:04:55', NULL),
(86, 1, '12', '9', NULL, 0, '2019-09-01 11:25:15', NULL),
(89, 1, '13', '1', 'L', 0, '2019-10-12 11:35:00', NULL),
(91, 1, '11', '5', NULL, 0, '2019-12-12 13:20:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `banner` varchar(50) NOT NULL DEFAULT 'no-image.png',
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `df` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category`, `banner`, `description`, `status`, `df`) VALUES
(1, 'Women', '1', 'no-image.png', 'This Is Description', 0, 0),
(2, 'Men1', '1', 'no-image.png', '', 0, 0),
(3, 'Footware', '1', 'no-image.png', '', 0, 0),
(4, 'Mobile', '1', 'no-image.png', '', 0, 0),
(5, 'Sample', '1', 'no-image.png', '', 0, 0),
(6, 'Shirt', '2', 'cff1a04b35c62ab343a406b5946b6083.jpg', '', 0, 0),
(7, 'asdasdasd', '4', 'no-image.png', 'asdasdasdasdasd dfsd', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL,
  `expire_date` date DEFAULT NULL,
  `off_type` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `df` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `expire_date`, `off_type`, `value`, `status`, `df`, `created_at`, `updated_at`) VALUES
(1, 'ABC1231', '2019-08-08', 'amount', '10.00', 0, 0, '2019-08-08 14:08:22', '2019-08-08 14:57:58'),
(2, 'ABC124', NULL, 'percentage', '10.00', 1, 0, '2019-08-08 14:19:00', '2019-08-08 14:57:36'),
(3, 'VCS123', NULL, 'amount', '100.00', 0, 1, '2019-08-08 14:20:59', '2019-08-08 14:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `que` text NOT NULL,
  `ans` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `que`, `ans`) VALUES
(3, 'This isa', '<p>data aa</p>'),
(2, 'Sample Que', '<h1>Main</h1>\r\n\r\n<h1><s><u><strong><em>.add</em></strong></u></s></h1>');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

DROP TABLE IF EXISTS `home_banner`;
CREATE TABLE IF NOT EXISTS `home_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `order` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `name`, `order`) VALUES
(1, '452c91b52f5f2cdc2e8f91bb3dd86f5f.jpg', 1),
(2, 'a36ea9fbed25472e20ed341b6cb56f5a.jpg', 2),
(3, 'dc2c218886e2e417877fc80dd206af18.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

DROP TABLE IF EXISTS `home_categories`;
CREATE TABLE IF NOT EXISTS `home_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` varchar(50) NOT NULL,
  `order` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `cate_id`, `order`) VALUES
(7, '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
CREATE TABLE IF NOT EXISTS `main_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `banner` varchar(50) NOT NULL DEFAULT 'no-image.png',
  `df` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `name`, `status`, `banner`, `df`) VALUES
(1, 'Women-12', 0, 'c69ad135cbdc2dd1abf9fd93f7240239.jpg', 0),
(2, 'Men', 0, 'd5e439018d184d74cb8b55e6ea9f7ebf.jpg', 0),
(3, 'mobile', 0, 'no-image.png', 0),
(4, 'electronic', 0, 'no-image.png', 0),
(5, 'apple', 0, 'no-image.png', 0),
(6, 'lapotps', 0, 'no-image.png', 0),
(7, 'kitchen', 0, 'no-image.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `active`, `created_at`) VALUES
(1, 'mehul9921@gmail.com', 0, '2019-06-22 12:25:39'),
(3, 'nayan19896@gmail.com', 0, '2019-06-22 18:32:03'),
(4, 'mehul2081@gmail.com', 0, '2019-06-22 18:48:01'),
(5, 'kavadevelopers@gmail.com', 0, '2019-06-22 18:48:10'),
(6, 'ramaninayanrn@gmail.com', 0, '2019-06-22 18:48:22'),
(7, 'nayanpatel807@gmail.com', 0, '2019-06-22 18:48:35'),
(8, 'rajesh.chauhan1010@gmail.com', 0, '2019-06-22 18:49:37'),
(9, 'mehulpkava@gmail.com', 0, '2019-06-22 18:50:07'),
(10, 'sample@gmail.com', 0, '2019-08-04 23:09:40'),
(11, 'sample2@gmail.com', 0, '2019-08-04 23:09:40'),
(12, 'sample@gmail.com', 0, '2019-08-04 23:10:03'),
(13, 'sample2@gmail.com', 0, '2019-08-04 23:10:03'),
(14, 'kava@gmail.com', 0, '2019-08-09 01:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `amount` text NOT NULL,
  `description` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `image` text NOT NULL,
  `shop` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `type`, `amount`, `description`, `date_from`, `date_to`, `image`, `shop`, `status`) VALUES
(2, 'Percentage', '100.00', '1212313', '2019-12-11', '2019-12-22', '1c0b990e283377f44b3ebc1d3dbfe7f3.jpg', '1', ''),
(3, 'Percentage', '200.00', 'dasdad', '2019-12-11', '2019-12-22', '', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `keyword` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `keyword`, `description`) VALUES
(1, 'about', '<h2 style=\"font-style:italic\"><strong>return_policy_save</strong></h2>\r\n', 'a', 'ab'),
(2, 'terms', '<p>This is <u><em><strong>terms</strong></em></u></p>\r\n', 'fa', 'asf'),
(3, 'privacy', '<h1>This i<strong>s privacy</strong></h1>\r\n', 'sa', 'as'),
(4, 'Return Policy', '<h2 style=\"font-style:italic\"><strong>return_policy_save</strong></h2>\r\n', 'adasd', 'asdasddddd'),
(5, 'home', '', 'home-key', 'home-desc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(250) DEFAULT NULL,
  `user_id` text NOT NULL,
  `txnid` text NOT NULL,
  `product_id` text NOT NULL COMMENT 'product id ^~^ product amount',
  `cart_tbl_id` text NOT NULL,
  `quantity` text NOT NULL,
  `amount` decimal(40,2) NOT NULL,
  `productinfo` text NOT NULL,
  `name` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `delivered` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = not delivered, 1 = delivered,2 = shipped',
  `cod` varchar(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `coupon_id` text NOT NULL,
  `size` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `orderid`, `user_id`, `txnid`, `product_id`, `cart_tbl_id`, `quantity`, `amount`, `productinfo`, `name`, `address1`, `address2`, `city`, `district`, `country`, `zipcode`, `email`, `phone`, `delivered`, `cod`, `message`, `delete_flag`, `created_at`, `updated_at`, `deleted_at`, `coupon_id`, `size`) VALUES
(1, 'DB-001', '9', 'c7c7c4bfaf2ab5a208f2', '8^~^100.00', '57', '1', '1455.00', 'One Plus 7,Redmi Y3', 'Nayan Ramani', 'Adasd asd asd asd asd asda sd', '', 'Ahmedabad', 'Ahmedabad', 'Asdasdasd', '380013', 'mehul9921@gmail.com', '9898878720', 2, '1', '', 1, '2019-06-21 18:42:54', NULL, '2019-08-10 16:51:38', ',,', ''),
(2, '1', '1', '2d760916ff2a22d29968', '9,8^~^1100.00,110.01', '66,67', '1,1', '1210.01', 'Sample,Hello world', 'Asdasda Dasdasd', 'Sdasd', 'Asdasd', 'Ahmedabad', 'Aaaa', 'Aaaa', '123456', 'gma@d.com', '9898989898', 0, '0', '', 1, '2019-08-05 16:52:49', NULL, '2019-08-10 16:59:07', ',,', ''),
(3, '1', '1', '1', '9,8^~^1100.00,110.01', '68,69', '1,1', '1210.01', 'Sample,Hello world', 'Asda Sdasdas', 'adasd', '', 'asdasd', 'asdasd', 'asdasd', '', 'sdadasd@f.m', '12333333333', 1, '0', '', 1, '2019-08-05 18:07:14', NULL, NULL, ',,', ''),
(4, 'DB-004', '1', 'DB-004', '9^~^1100.00', '70', '3', '3300.00', 'Sample', 'Hello Aaa', 'dasdsad', '', 'asdasd', 'asdas', 'dasdasd', '', 'aadsd@gg.vv', '787878787878', 0, '0', '', 1, '2019-08-05 18:16:32', NULL, '2019-08-10 17:05:57', ',,', ''),
(5, 'DB-005', '9', 'a45ebd6c9cdf0a88004b', '8^~^110.01', '71', '1', '110.01', 'Hello world', 'Sdasd Asdasd', 'Sdfsdfsdf', '', 'Fsdfsdf', 'Sdfsdf', 'Sdfsdf', '', 'dasddasd@g.com', '12212121212', 0, '1', 'Kavav dev', 0, '2019-08-05 18:36:14', NULL, NULL, ',,', ''),
(6, 'DB-006', '1', 'DB-006', '9,11^~^1100.00,144.00', '72,73', '1,1', '1234.00', 'Sample,Rental', 'Sample Abcdfff', 'adasdasdasdasdsa', '', 'sadadasdas', 'dasd', 'asdsad', '123456', 'addddd@ggg.c', '989898989898', 0, '0', 'asdasdsa', 0, '2019-08-08 16:45:27', NULL, NULL, ',,', ''),
(7, 'DB-007', '1', 'DB-007', '12,10^~^101.00,55.00', '76,77', '1,2', '211.00', 'Asdasd,Others', 'Adas Asdasd', 'fsfdsdf', '', 'sdfsdf', 'fsdf', 'sdfsdf', '32231', 'sdfdfsd@fff.nn', '33333333333', 0, '0', '', 0, '2019-08-08 20:50:59', NULL, NULL, ',,', ''),
(8, 'DB-008', '1', 'DB-008', '11,10^~^144.00,55.00', '78,79', '1,2', '254.00', 'Rental,Others', 'Sdfs Dfsdf', 'sdsdsaas', '', 'dasdasda', 'fsdfs', 'dfsdfsd', 'rwerwer', 'dasds@fdf.c', '4324234234', 0, '0', '', 0, '2019-08-08 20:52:44', NULL, NULL, ',,', ''),
(9, 'DB-009', '1', 'DB-009', '11,10^~^144.00,55.00', '80,81', '1,2', '254.00', 'Rental,Others', 'Asdas Dasd', 'asfsdfsd', '', 'fsdf', 'sfdfsd', 'fsdf', 'fsdfsd', 'sdsfsdfsdf@ggg.mm', '3123123123', 0, '0', '', 0, '2019-08-08 20:55:14', NULL, NULL, ',,', ''),
(10, 'DB-0010', '1', 'DB-0010', '11,13^~^144.00,110.00', '82,83', '1,1', '254.00', 'Rental,Sample B', 'Ada Sdasdasd', 'sdfsdf', '', 'dsfsdf', 'sdfsdf', 'sdfsdf', 'sdf', 'sdadasd@ggg.k', '34234234324', 0, '0', '', 0, '2019-08-09 00:48:46', NULL, NULL, ',,', ',MEDIUM'),
(11, 'DB-0011', '1', 'a3929dfe5cd48757c188', '14^~^110.00', '87', '1', '110.00', 'Featured', 'Sanmple Data', 'Fsdfsdfsdf', '', 'Fdgdfgdfg', 'Dfsdfsdfsd', 'Sdfsdfsdf', '123', 'email@ggg.com', '89898889898', 0, '1', '', 0, '2019-09-02 17:35:50', NULL, NULL, ',,', ''),
(12, 'DB-0012', '1', '8af7c91046e6326e7234', '14^~^110.00', '88', '1', '110.00', 'Featured', 'Asd Adasd', 'Sfdfsdfsdf', '', 'Fdgdfgdfg', 'Dfsdfsdfdsf', 'Sdfsdfsdf', '23232', 'adsdsad@ff.com', '232322232232', 0, '1', '', 0, '2019-09-02 17:38:30', NULL, NULL, ',,', '');

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
  `list_price` varchar(250) NOT NULL,
  `short_desc` text NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 NOT NULL,
  `category` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `keyword` text NOT NULL,
  `description` text NOT NULL,
  `tax` varchar(50) NOT NULL,
  `amount_without_tax` varchar(50) NOT NULL,
  `cod` varchar(50) NOT NULL DEFAULT '0',
  `bannner` varchar(250) NOT NULL DEFAULT 'no-image.png',
  `rating` varchar(50) NOT NULL DEFAULT '0',
  `df` int(1) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `sizes` text NOT NULL,
  `chart` varchar(50) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `hash`, `name`, `amount`, `list_price`, `short_desc`, `desc`, `category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `keyword`, `description`, `tax`, `amount_without_tax`, `cod`, `bannner`, `rating`, `df`, `stock`, `sizes`, `chart`, `featured`) VALUES
(8, '77f9357abe5780e0b3e377498416c5a6', 'Hello world', '110.01', '', 'hello', '<p>sadsad</p>', '1', 1, '1', '1', '2019-08-05 15:05:29', '2019-08-08 11:20:21', '', '', '10', '100.01', '0', '077d796d23bdd2b649e56c437e8f2bbb.jpg', '0', 1, 0, '', '', 0),
(9, '87ca771ee8b45ecc3628f12fc6caf82f', 'Sample', '1100.00', '1200.00', 'sdfsdf', '<pre>\r\nलगभग 2,53,00,00,000 परिणाम (0.53 सेकंड)</pre>', '2', 1, '1', '1', '2019-08-05 16:33:33', '2019-08-27 17:41:10', '', '', '10', '1000.00', '0', '9cd329fce67c732525b110976c906fbf.jpg', '3', 0, 6, '', '', 1),
(10, '61c3a690005c4d15141e217e3e11d753', 'Others', '55.00', '100.00', 'asdasdasd', '<p>asdasd</p>', '2', 1, '1', '1', '2019-08-07 00:18:55', '2019-08-08 20:46:05', '', '', '10', '50.00', '0', '2daf3344d2317563a009fc0efbf168a1.jpg', '3', 0, 2, '', '', 0),
(11, '93355210a5b16ee061d6c81d4fa38e48', 'Rental', '144.00', '150.00', 'asdads', '<p>&nbsp;</p>\r\n\r\n<p>??????</p>', '1,2', 1, '1', '1', '2019-08-07 01:22:46', '2019-08-27 17:28:44', '', '', '20', '120.00', '0', '4c729646a2d058c5bedaa813b7323553.jpg', '4', 0, 49, '', '', 1),
(12, 'eb92283c125159ea8e043eb72482884f', 'Asdasd', '101.00', '12.00', 'df', '<p>sdf</p>', '1,2', 1, '1', '1', '2019-08-08 19:54:07', '2019-08-27 17:28:19', '', '', '1', '100.00', '0', 'b00fc47dcf7b0039ebf359460383c6b0.jpg', '0', 0, 10, '', '4ece49da087e6d8f6654bc9b09c1169c.jpg', 1),
(13, 'e2e2d2861e5b1d9bb27370f9160f7eaf', 'Sample B', '110.00', '100.00', 'abc', '<p>मेरा नाम है&nbsp;ਮੇਰਾ ਨਾਮ ਹੈ</p>', '1,2,5,6', 1, '1', '1', '2019-08-08 23:08:40', '2019-08-27 17:06:48', '', '', '10', '100.00', '0', 'no-image.png', '0', 0, 49, 'SM,L,M,XL,XXL,MEDIUM,A', '', 1),
(14, 'fe826de87dd96553c9180eaa340f8947', 'Featured', '110.00', '', 'hello', '<p>हो। गए, उनका एक समय में बड़ा नाम था। पूरे देश में तालाब बनते थे बनाने वाले भी पूरे देश में थे। कहीं यह विद्या जाति के विद्यालय | सिखाई जाती थी तो कहीं यह जात से हट कर एक विशेष पांत भी जाती थी। बनाने वाले लोग कहीं एक जगह बसे मिलते थे तो कहीं -घूम कर इस काम को करते थे। I 국 घम गजधर एक सुन्दर शब्द है, तालाब बनाने वालों को आदर के साथ याद करने के लिए। राजस्थान के कुछ भागों में यह शब्द आज भी बाकी है। गजधर यानी जो गज को धारण करता है। और गज वही जो नापने के काम आता है। लेकिन फिर भी समाज ने इन्हें तीन हाथ की लोहे की छड़ लेकर घूमने वाला मिस्त्री नहीं माना। गजधर जो समाज को गहराई को नाप ले - उसे ऐसा दर्जा दिया गया है। गजधर वास्तुकार थे। गांव-समाज हो या नगर-समाज - उसके नव निर्माण की, रख-रखाव की ज़िम्मेदारी गजधर निभाते थे। नगर नियोजन से लेकर छोटे से छोटे निर्माण के काम गजधर के कधों पर टिके थे। वे योजना बनाते थे, कुल काम की लागत निकालते थे, काम में लगने वाली सारी सामग्री जुटाते थे और इस सबके बदले वे अपने जजमान से ऐसा कुछ नहीं मांग बैठते थे, जो वे दे न पाएं। लोग भी ऐसे थे कि उनसे जो कुछ बनता, वे गजधर को भेंट कर देते। काम पूरा होने पर पारिश्रमिक के अलावा गजधर को सम्मान &#39; भी मिलता था। सरोपा भेंट करना अब शायद सिर्फ सिख परंपरा में ही बचा समाज की गहराई नापते रहे हैं गुणाधर</p>', '1,2,3', 1, '1', '1', '2019-08-27 17:08:33', '2019-09-13 19:55:37', '', '', '10', '100.00', '1', 'f9611adceaf2721da82bed651f67f7bf.jpg', '5', 0, 99, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `p_id`, `image`) VALUES
(3, '9', 'fefe832e03fe82d9c782f34c263ea97e.jpg'),
(4, '10', '45a4d8db4ff3f9592e26cecff026cb7f.jpg'),
(8, '11', 'b3f91c3b84128d83980200421067770b.jpg'),
(9, '12', 'b51de3337820d8518aa8180252da14f2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

DROP TABLE IF EXISTS `product_rating`;
CREATE TABLE IF NOT EXISTS `product_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(250) NOT NULL,
  `hash` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `rating` text NOT NULL,
  `review` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`id`, `product_id`, `hash`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(5, '14', 'fe826de87dd96553c9180eaa340f8947', '1', '5', 'Fsdfsdf', '2019-12-12 11:47:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_keywords`
--

DROP TABLE IF EXISTS `search_keywords`;
CREATE TABLE IF NOT EXISTS `search_keywords` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyword` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_keywords`
--

INSERT INTO `search_keywords` (`id`, `keyword`, `created`) VALUES
(1, 'asdasd-1', '2019-08-04 16:56:06'),
(2, '1', '2019-08-07 17:33:00'),
(3, 'a', '2019-08-07 17:33:06'),
(4, 'a', '2019-08-07 17:35:28'),
(5, 'a', '2019-08-07 18:52:20'),
(6, 'a', '2019-08-07 18:53:32'),
(7, 'a', '2019-08-07 18:56:19'),
(8, 'a', '2019-08-07 18:57:26'),
(9, 'a', '2019-08-07 18:57:36'),
(10, 'a', '2019-08-07 18:57:47'),
(11, 'a', '2019-08-07 18:58:26'),
(12, 'a', '2019-08-07 18:58:45'),
(13, 'a', '2019-08-07 19:01:10'),
(14, 'a', '2019-08-07 19:01:30'),
(15, 'a', '2019-08-07 19:27:27'),
(16, 'a', '2019-08-07 19:27:48'),
(17, 'a', '2019-08-07 19:29:29'),
(18, 'a', '2019-08-07 19:29:53'),
(19, 'a', '2019-08-07 19:30:14'),
(20, 'a', '2019-08-07 19:30:17'),
(21, 'a', '2019-08-07 19:30:27'),
(22, 'a', '2019-08-07 19:30:29'),
(23, 'a', '2019-08-07 19:30:33'),
(24, 'a', '2019-08-07 19:30:36'),
(25, 'a', '2019-08-07 19:30:38'),
(26, 'a', '2019-08-07 19:30:42'),
(27, 'a', '2019-08-07 19:30:43'),
(28, 'a', '2019-08-07 19:30:45'),
(29, 'a', '2019-08-07 19:30:47'),
(30, 'a', '2019-08-22 13:49:38'),
(31, 'a', '2019-08-22 13:49:47'),
(32, 'a', '2019-08-22 13:49:49'),
(33, 'a', '2019-08-26 18:42:00'),
(34, 'aa', '2019-08-26 19:04:47'),
(35, 'a', '2019-08-26 19:04:52'),
(36, 'a', '2019-08-27 17:44:22'),
(37, 'a', '2019-08-27 17:48:54'),
(38, 'a', '2019-08-27 17:49:17'),
(39, 'a', '2019-08-27 17:49:19'),
(40, 'a', '2019-08-27 17:50:14'),
(41, 'a', '2019-08-27 17:51:15'),
(42, 'a', '2019-08-27 17:51:17'),
(43, 'a', '2019-08-27 17:51:31'),
(44, 'a', '2019-08-27 17:51:45'),
(45, 'a', '2019-08-27 17:53:00'),
(46, 'aaaaaaa', '2019-08-28 09:58:07'),
(47, 'a', '2019-08-28 09:58:15'),
(48, 'a', '2019-08-28 09:59:57'),
(49, 'a', '2019-08-28 21:45:54'),
(50, 'a', '2019-08-28 21:58:33'),
(51, 'a', '2019-08-28 21:59:11'),
(52, 'a', '2019-08-28 22:02:35'),
(53, 'a', '2019-08-28 22:03:31'),
(54, 'a', '2019-08-28 22:05:35'),
(55, 'a', '2019-08-28 22:06:10'),
(56, 'a', '2019-08-28 22:07:01'),
(57, 'a', '2019-08-28 22:09:11'),
(58, 'a', '2019-08-28 22:09:46'),
(59, 'a', '2019-08-28 22:11:05'),
(60, 'a', '2019-08-28 22:11:43'),
(61, 'a', '2019-08-28 22:14:52'),
(62, 'a', '2019-08-28 22:15:08'),
(63, 'a', '2019-08-28 22:15:28'),
(64, 'a', '2019-08-28 22:15:42'),
(65, 'a', '2019-08-28 22:15:58'),
(66, 'a', '2019-08-28 22:16:32'),
(67, 'a', '2019-08-28 22:17:15'),
(68, 'a', '2019-08-28 22:18:07'),
(69, 'a', '2019-08-28 22:18:30'),
(70, 'a', '2019-08-28 22:19:06'),
(71, 'a', '2019-08-28 22:20:16'),
(72, 'a', '2019-08-28 22:20:31'),
(73, 'a', '2019-08-28 22:20:41'),
(74, 'a', '2019-08-28 22:24:26'),
(75, 'a', '2019-08-28 22:34:36'),
(76, 'a', '2019-08-28 22:34:56'),
(77, 'a', '2019-08-28 22:36:26'),
(78, 'a', '2019-08-28 22:37:15'),
(79, 'a', '2019-08-28 22:37:33'),
(80, 'a', '2019-08-28 22:37:55'),
(81, 'a', '2019-08-28 22:38:16'),
(82, 'a', '2019-08-28 22:39:56'),
(83, 'a', '2019-08-28 22:40:17'),
(84, 'a', '2019-08-28 22:41:10'),
(85, 'a', '2019-08-28 22:43:26'),
(86, 'a', '2019-08-28 22:43:46'),
(87, 'a', '2019-08-28 22:44:07'),
(88, 'a', '2019-08-28 22:44:25'),
(89, 'a', '2019-08-28 22:44:41'),
(90, 'a', '2019-08-28 22:45:00'),
(91, 'a', '2019-08-28 22:45:15'),
(92, 'a', '2019-08-28 22:47:34'),
(93, 'a', '2019-08-28 22:52:43'),
(94, 'a', '2019-08-28 22:53:49'),
(95, 'a', '2019-08-28 22:54:40'),
(96, 'a', '2019-08-28 22:54:46'),
(97, 'a', '2019-08-28 23:01:34'),
(98, 'a', '2019-08-28 23:01:50'),
(99, 'a', '2019-08-28 23:02:26'),
(100, 'a', '2019-08-28 23:02:49'),
(101, 'a', '2019-08-28 23:03:30'),
(102, 'a', '2019-08-29 10:46:57'),
(103, 'a', '2019-08-30 09:19:50'),
(104, 'a', '2019-08-30 09:20:18'),
(105, 'a', '2019-08-30 09:22:51'),
(106, 'a', '2019-08-30 09:24:05'),
(107, 'a', '2019-08-30 09:26:29'),
(108, 'a', '2019-08-30 09:34:18'),
(109, 'a', '2019-08-30 10:04:52'),
(110, 'a', '2019-08-30 10:05:20'),
(111, 'a', '2019-08-30 10:09:54'),
(112, 'a', '2019-08-30 10:10:02'),
(113, 'a', '2019-08-30 10:14:45'),
(114, 'a', '2019-08-30 10:18:12'),
(115, 'a', '2019-08-30 10:18:24'),
(116, 'a', '2019-08-30 10:27:35'),
(117, 'a', '2019-10-12 11:57:13'),
(118, 'sad', '2019-12-04 21:20:27'),
(119, 'a', '2019-12-05 10:32:39'),
(120, 'a', '2019-12-05 10:35:58'),
(121, 'a', '2019-12-05 10:36:43'),
(122, 'a', '2019-12-05 10:39:36'),
(123, 'a', '2019-12-05 10:42:26'),
(124, 'a', '2019-12-05 10:43:45'),
(125, 'a', '2019-12-05 10:43:52'),
(126, 'a', '2019-12-05 10:44:27'),
(127, 'a', '2019-12-05 10:44:43'),
(128, 'a', '2019-12-05 10:44:45'),
(129, 'a', '2019-12-05 11:47:13'),
(130, 'a', '2019-12-05 11:48:05'),
(131, 'a', '2019-12-05 11:48:23'),
(132, 'a', '2019-12-05 11:49:01'),
(133, 'a', '2019-12-11 20:27:16'),
(134, 'a', '2019-12-11 20:27:35'),
(135, 'a', '2019-12-11 20:29:20'),
(136, 'a', '2019-12-11 20:29:23'),
(137, 'a', '2019-12-11 20:29:27'),
(138, 'a', '2019-12-11 20:29:29'),
(139, 'a', '2019-12-11 20:29:32'),
(140, 'a', '2019-12-11 20:35:10'),
(141, 'a', '2019-12-11 20:41:14'),
(142, 'a', '2019-12-11 20:41:25'),
(143, 'a', '2019-12-11 20:41:53'),
(144, 'a', '2019-12-11 20:47:05'),
(145, 'a', '2019-12-11 20:47:53'),
(146, 'a', '2019-12-11 20:49:40'),
(147, 'a', '2019-12-11 20:50:29'),
(148, 'a', '2019-12-11 20:51:05'),
(149, 'a', '2019-12-11 20:51:14'),
(150, 'a', '2019-12-11 20:51:26'),
(151, 'a', '2019-12-11 20:51:34'),
(152, 'a', '2019-12-11 20:51:51'),
(153, 'a', '2019-12-11 20:52:04'),
(154, 'a', '2019-12-11 20:52:09'),
(155, 'a', '2019-12-11 20:52:20'),
(156, 'a', '2019-12-11 20:52:28'),
(157, 'a', '2019-12-11 20:52:38'),
(158, 'a', '2019-12-11 21:27:05'),
(159, 'a', '2019-12-11 21:27:17'),
(160, 'a', '2019-12-11 21:27:44'),
(161, 'a', '2019-12-11 21:31:01'),
(162, 'a', '2019-12-11 22:29:48'),
(163, 'a', '2019-12-11 22:30:38'),
(164, 'a', '2019-12-12 09:13:26'),
(165, 'a', '2019-12-12 09:13:56'),
(166, 'a', '2019-12-12 09:34:26'),
(167, 'a', '2019-12-12 09:36:14'),
(168, 'a', '2019-12-12 09:36:20'),
(169, 'a', '2019-12-12 09:36:32'),
(170, 'a', '2019-12-12 09:36:43'),
(171, 'a', '2019-12-12 09:36:46'),
(172, 'a', '2019-12-12 09:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `support_email` text NOT NULL,
  `contact_email` text NOT NULL,
  `newsletter_email` varchar(250) DEFAULT NULL,
  `mobile` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `opening_hours` text NOT NULL,
  `short_about` text NOT NULL,
  `meta_keywords` longtext NOT NULL,
  `meta_description` longtext NOT NULL,
  `shop_commission` decimal(40,2) DEFAULT NULL COMMENT 'Per shop commission',
  `ad_number` varchar(250) DEFAULT NULL,
  `smtp_host` text,
  `smtp_port` text,
  `smtp_user` text,
  `smtp_pass` text,
  `merchent_key` varchar(250) NOT NULL,
  `salt` varchar(250) NOT NULL,
  `announcements` text CHARACTER SET utf8 NOT NULL,
  `dis_text` text NOT NULL,
  `btn_text` text NOT NULL,
  `btn_link` text NOT NULL,
  `offer_image` text NOT NULL,
  `card_web` text NOT NULL,
  `card_text` text NOT NULL,
  `card_email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `email`, `support_email`, `contact_email`, `newsletter_email`, `mobile`, `city`, `address`, `opening_hours`, `short_about`, `meta_keywords`, `meta_description`, `shop_commission`, `ad_number`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `merchent_key`, `salt`, `announcements`, `dis_text`, `btn_text`, `btn_link`, `offer_image`, `card_web`, `card_text`, `card_email`) VALUES
(1, 'kavadev@gmail.com', 'support.kava@gmail.com', 'kavadev@gmail.com', 'kavadev@gmail.com', '+91 90-9999-8171', 'Ahmedabad', 'City, gitanjali \r\namedabad', '10 am to 7 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', 'home', 'description', '50.00', '1234567890', 'ssl://smtp.googlemail.com', '465', 'mehul9921@gmail.com', 'ABCD@5981', 'rjQUPktU', 'e5iIg1jwi8', 'Sample ', 'Diwali Discount up to 70 % off', 'TEXT', 'fb.com', '8d203570d76b14345feea073fcdff52d.jpg', 'Checkout Delals At www.delhibazar.com', 'Gift Card', 'info@delhibazar.com');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(250) NOT NULL,
  `owner_name` varchar(250) NOT NULL,
  `employee_name` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `wp_no` varchar(250) DEFAULT NULL COMMENT 'Watsapp No',
  `mobile_in_website` tinyint(4) DEFAULT NULL COMMENT '(1 = Private, 0 = Public)Mobile no display in website',
  `whats_in_website` tinyint(4) DEFAULT NULL COMMENT '(1 = Private, 0 = Public)Whats no display in website',
  `address` longtext NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL COMMENT 'Hours of Operation',
  `hour_operation` varchar(250) NOT NULL,
  `pro_or_servi` longtext NOT NULL COMMENT 'Products/Services',
  `payment_mode` varchar(250) NOT NULL,
  `photo` text NOT NULL,
  `info` longtext NOT NULL COMMENT 'Information',
  `detail_desc` longtext NOT NULL,
  `category` longtext NOT NULL,
  `shop_plan` varchar(250) DEFAULT NULL COMMENT 'shop package id',
  `dis_in_listing` tinyint(4) DEFAULT NULL COMMENT '0 = Yes,1 = No (Display Shop in Listing Page)',
  `exp_date` date DEFAULT NULL COMMENT 'Shop Expiry Date',
  `created_by` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `keywords` longtext NOT NULL,
  `rating` varchar(10) NOT NULL DEFAULT '0',
  `comment` varchar(100) NOT NULL DEFAULT '0',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `_category` text NOT NULL,
  `_area` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `owner_name`, `employee_name`, `mobile`, `wp_no`, `mobile_in_website`, `whats_in_website`, `address`, `landmark`, `email`, `hour_operation`, `pro_or_servi`, `payment_mode`, `photo`, `info`, `detail_desc`, `category`, `shop_plan`, `dis_in_listing`, `exp_date`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `keywords`, `rating`, `comment`, `username`, `password`, `_category`, `_area`) VALUES
(1, 'Kava Developers', 'Kava', 'ABC', '', '', 0, 0, 'Ahmedabad Ahmedabad', 'nikol', '', '12 - 15', 'IT', 'Cash', 'fdfd828cea5ee9e5c9683aadff691157.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'ABC', '2', 0, '2020-05-24', '1', '2019-12-11 18:11:48', '2019-12-11 20:59:02', NULL, 'a', '0', '0', 'kavadev', 'admin', '2', '1'),
(2, 'Kodek Technologies', 'navnit', '', '', '', 0, 0, 'ABC Ahmedabad', 'nikol', '', '12 - 18', 'It services', 'cash', '', '', '', 'asdasddasd', '3', 0, '2020-12-05', '1', '2019-12-11 18:24:57', NULL, NULL, 'a', '0', '0', 'kodek', 'admin', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shop_area`
--

DROP TABLE IF EXISTS `shop_area`;
CREATE TABLE IF NOT EXISTS `shop_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `df` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_area`
--

INSERT INTO `shop_area` (`id`, `name`, `df`) VALUES
(1, 'AVC', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

DROP TABLE IF EXISTS `shop_categories`;
CREATE TABLE IF NOT EXISTS `shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `df` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `name`, `df`) VALUES
(1, 'Books', ''),
(2, 'ABC', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_package`
--

DROP TABLE IF EXISTS `shop_package`;
CREATE TABLE IF NOT EXISTS `shop_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_package`
--

INSERT INTO `shop_package` (`id`, `plan`, `price`, `duration`, `created_at`) VALUES
(2, 'Silver', '4000.00', '165', '2019-06-11 12:13:14'),
(3, 'Gold', '8000.00', '360', '2019-06-11 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `shop_rating`
--

DROP TABLE IF EXISTS `shop_rating`;
CREATE TABLE IF NOT EXISTS `shop_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) NOT NULL,
  `shop_id` varchar(250) DEFAULT NULL,
  `subject` text NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_rating`
--

INSERT INTO `shop_rating` (`id`, `user_id`, `shop_id`, `subject`, `review`, `rating`, `created_at`) VALUES
(16, '5', '2', 'shop', 'nice', 4, '2019-06-13 13:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `shop_slider`
--

DROP TABLE IF EXISTS `shop_slider`;
CREATE TABLE IF NOT EXISTS `shop_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL COMMENT 'Slider Image',
  `shop_id` varchar(250) NOT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_slider`
--

INSERT INTO `shop_slider` (`id`, `image`, `shop_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '41a3e0440b18a970b38b7ad9cf53d822.jpg', '1', '1', '', '2019-12-11 18:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

DROP TABLE IF EXISTS `social_icon`;
CREATE TABLE IF NOT EXISTS `social_icon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `class` text NOT NULL,
  `link` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icon`
--

INSERT INTO `social_icon` (`id`, `title`, `class`, `link`, `created_at`) VALUES
(2, 'Instagram', 'fa-instagram', 'https://instagram.com', '2019-06-07 00:00:00'),
(3, 'facebook', 'fa-facebook', 'http://facebook.com', '2019-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `social_user`
--

DROP TABLE IF EXISTS `social_user`;
CREATE TABLE IF NOT EXISTS `social_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `password` text NOT NULL,
  `image` text,
  `delete_flag` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_user`
--

INSERT INTO `social_user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `image`, `delete_flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'rrrr', 'ers', 'sdfs@gmail.com', '12012121211', '0e7517141fb53f21ee439b355b5a1d0a', '483391b37a55a7e84ba56af8dbba8572.png', 1, '2019-06-04 12:31:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'asdasdasd', 'dasda', 'dasd@gmail.com', '1201212121', '456456456', '580b0399f62f5ca36a1b3443aec578a0.jpg', 1, '2019-06-04 12:24:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'asdasd', 'asdasd', '12@gmail.com', '12121212121', '0e7517141fb53f21ee439b355b5a1d0a', '1f4d40181b795f2c1a35d95750f8fb13.jpg', 1, '2019-06-04 12:37:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'elephant', 'jungle', 'nayan@gmail.com', '4564589789', '0e7517141fb53f21ee439b355b5a1d0a', '0f5a364c7a9f21305b97bea45c3d456d.jpg', 1, '2019-06-04 12:56:22', '0000-00-00 00:00:00', '2019-08-04 18:42:17'),
(8, 'test', 'user', 'mehul2081@gmail.com', '4564512312', '0e7517141fb53f21ee439b355b5a1d0a', '3aef2dce48775707a9bb6119bc97f74c.jpg', 0, '2019-06-12 16:20:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'types', 'number', 'mehul9921@gmail.com', '1201232032', '0e7517141fb53f21ee439b355b5a1d0a', 'd20a3b9984f166fbbbadbafb9eb5de7d.jpg', 0, '2019-06-12 16:27:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Kava dev', 'deve', 'kava@gmail.com', '9898375981', 'e6e061838856bf47e1de730719fb2609', 'f56914010dad48720f91e1204829a090.png', 0, '2019-08-09 01:58:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `traking`
--

DROP TABLE IF EXISTS `traking`;
CREATE TABLE IF NOT EXISTS `traking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detail` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traking`
--

INSERT INTO `traking` (`id`, `detail`, `date`, `order_id`) VALUES
(1, 'abc', '2019-08-05 12:40:42', '1'),
(2, 'asas', '2019-08-05 12:48:03', '1'),
(3, 'sas', '2019-08-05 12:48:03', '1'),
(4, 'asdasd', '2019-08-05 15:37:18', '1'),
(5, 'Order Placed', '2019-08-05 18:07:14', '3'),
(6, 'Order Placed', '2019-08-05 18:16:32', '4'),
(7, 'Order Placed', '2019-08-05 18:36:14', '5'),
(8, 'Order Placed', '2019-08-08 16:45:27', '6'),
(9, 'Order Placed', '2019-08-08 20:50:59', '7'),
(10, 'Order Placed', '2019-08-08 20:52:44', '8'),
(11, 'Order Placed', '2019-08-08 20:55:14', '9'),
(12, 'Order Placed', '2019-08-09 00:48:46', '10'),
(13, 'Order Placed', '2019-09-02 17:35:50', '11'),
(14, 'Order Placed', '2019-09-02 17:38:30', '12');

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
(1, 'master', 'Super User', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '9898989898', 0, '0', '1', '2018-11-30 06:34:34', '2019-06-18 11:34:40', NULL, 'user.png'),
(2, 'kava_dev', 'Kava Developers', '21232f297a57a5a743894a0e4a801fc3', 'kava@gmail.com', '9099998171', 0, '1', '1', '2019-05-02 15:09:09', '2019-05-02 15:34:26', '2019-05-02 15:23:48', 'user.png'),
(3, 'nayan', 'Nayan Ramani', '21232f297a57a5a743894a0e4a801fc3', 'nayan@gmail.com', '9898878720', 0, '1', '1', '2019-05-02 15:24:35', '2019-05-02 15:24:35', NULL, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `delivered` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 = delivery done, 0 = not delivered',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
