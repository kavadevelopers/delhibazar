-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2019 at 02:04 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`id`, `business_name`, `intro`, `mobile`, `address`, `link`, `photo`, `plan_name`, `exp_date`, `page`, `position`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(1, 'new Shoppppppp eeess dsd sd sds', 'adsa sa asd', '4504565065', 'asda sda', 'javascript:;', '540f5a0e8327161886e8444231efbcbb.png', '2', '2019-09-03', 'Home', '1', '1', '1', '2019-06-14 14:05:37', '2019-08-04 23:39:13', '0'),
(2, 'Shop 2', 'asdasd', '7898745645', 'adsadasd', '#', 'f83a1832f6c51797bed6de412d4358ce.jpg', '2', '2019-07-14', 'Home\r\n', '2', '1', '1', '2019-06-14 16:06:11', '2019-06-14 16:31:28', '0'),
(3, 'Shop', 'sdas', '1201232032', 'dasdas', '#', '0fa462ca006753b0554feb32d8cdefcd.png', '2', '2019-07-14', 'Home\r\n', '4', '1', '1', '2019-06-14 16:57:22', '2019-06-14 16:57:22', '0'),
(4, 'sadas', 'dasd', '7897865465', 'asdas', '#', '148bc37cadf9d8170700c4122bbbd70b.jpg', '2', '2019-07-14', 'Business Detail', '1', '1', '1', '2019-06-14 16:57:52', '2019-06-14 16:57:52', '0'),
(5, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'no-image.png', '2', '2019-07-14', 'Listing', '5', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0'),
(6, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'eafd12ea47ef187e8054eef92da41839.jpg', '2', '2019-07-14', 'Home\r\n', '6', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0'),
(7, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'eafd12ea47ef187e8054eef92da41839.jpg', '2', '2019-07-14', 'Home\r\n', '7', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0'),
(8, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'eafd12ea47ef187e8054eef92da41839.jpg', '2', '2019-07-14', 'Home\r\n', '8', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0'),
(9, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'eafd12ea47ef187e8054eef92da41839.jpg', '2', '2019-07-14', 'Home\r\n', '9', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0'),
(10, 'Home', 'asdasd asd asd', '4564522112', 'asdasdd as dasd a', '#', 'eafd12ea47ef187e8054eef92da41839.jpg', '2', '2019-07-14', 'Home\r\n', '10', '1', '1', '2019-06-14 14:06:52', '2019-06-17 16:14:30', '0');

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` bigint(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `delivered` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 = delivery done, 0 = not delivered',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `qty`, `product_id`, `user_id`, `delivered`, `created_at`, `updated_at`) VALUES
(61, 1, '6', '', 0, '2019-08-04 16:56:16', NULL),
(62, 1, '5', '', 0, '2019-08-04 16:56:37', NULL),
(63, 1, '6', '', 0, '2019-08-04 16:57:48', NULL),
(72, 1, '9', '1', 0, '2019-08-06 12:30:26', NULL),
(73, 1, '11', '1', 0, '2019-08-07 03:20:25', NULL);

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
  `status` int(11) NOT NULL DEFAULT '0',
  `df` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category`, `banner`, `status`, `df`) VALUES
(1, 'Women', '1', 'no-image.png', 0, 0),
(2, 'Men1', '1', 'no-image.png', 0, 0),
(3, 'Footware', '1', 'no-image.png', 0, 1),
(4, 'Mobile', '1', 'no-image.png', 0, 1),
(5, 'Sample', '1', 'no-image.png', 0, 0),
(6, 'Shirt', '2', 'cff1a04b35c62ab343a406b5946b6083.jpg', 0, 0);

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
(3, 'This is', '<p>data</p>'),
(2, 'Sample Que', '<h1>Main</h1>\r\n\r\n<h1><s><u><strong><em>.add</em></strong></u></s></h1>');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `name`, `status`, `banner`, `df`) VALUES
(1, 'Women-12', 1, 'no-image.png', 0),
(2, 'Men', 0, 'd5e439018d184d74cb8b55e6ea9f7ebf.jpg', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
(13, 'sample2@gmail.com', 0, '2019-08-04 23:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`) VALUES
(1, 'about', '<h2 style=\"font-style:italic\"><strong>return_policy_save</strong></h2>\r\n'),
(2, 'terms', '<p>This is <u><em><strong>terms</strong></em></u></p>\r\n'),
(3, 'privacy', '<h1>This i<strong>s privacy</strong></h1>\r\n'),
(4, 'Return Policy', '<h2 style=\"font-style:italic\"><strong>return_policy_save</strong></h2>\r\n');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `orderid`, `user_id`, `txnid`, `product_id`, `cart_tbl_id`, `quantity`, `amount`, `productinfo`, `name`, `address1`, `address2`, `city`, `district`, `country`, `zipcode`, `email`, `phone`, `delivered`, `cod`, `message`, `delete_flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DB-001', '9', 'c7c7c4bfaf2ab5a208f2', '8^~^100.00', '57', '1', '1455.00', 'One Plus 7,Redmi Y3', 'Nayan Ramani', 'Adasd asd asd asd asd asda sd', '', 'Ahmedabad', 'Ahmedabad', 'Asdasdasd', '380013', 'mehul9921@gmail.com', '9898878720', 2, '1', '', 0, '2019-06-21 18:42:54', NULL, '2019-08-04 19:48:11'),
(2, '1', '1', '2d760916ff2a22d29968', '9,8^~^1100.00,110.01', '66,67', '1,1', '1210.01', 'Sample,Hello world', 'Asdasda Dasdasd', 'Sdasd', 'Asdasd', 'Ahmedabad', 'Aaaa', 'Aaaa', '123456', 'gma@d.com', '9898989898', 0, '0', '', 0, '2019-08-05 16:52:49', NULL, NULL),
(3, '1', '1', '1', '9,8^~^1100.00,110.01', '68,69', '1,1', '1210.01', 'Sample,Hello world', 'Asda Sdasdas', 'adasd', '', 'asdasd', 'asdasd', 'asdasd', '', 'sdadasd@f.m', '12333333333', 1, '0', '', 1, '2019-08-05 18:07:14', NULL, NULL),
(4, 'DB-004', '1', 'DB-004', '9^~^1100.00', '70', '3', '3300.00', 'Sample', 'Hello Aaa', 'dasdsad', '', 'asdasd', 'asdas', 'dasdasd', '', 'aadsd@gg.vv', '787878787878', 0, '0', '', 0, '2019-08-05 18:16:32', NULL, NULL),
(5, 'DB-005', '9', 'a45ebd6c9cdf0a88004b', '8^~^110.01', '71', '1', '110.01', 'Hello world', 'Sdasd Asdasd', 'Sdfsdfsdf', '', 'Fsdfsdf', 'Sdfsdf', 'Sdfsdf', '', 'dasddasd@g.com', '12212121212', 0, '1', 'Kavav dev', 0, '2019-08-05 18:36:14', NULL, NULL);

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
  `desc` longtext NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `hash`, `name`, `amount`, `list_price`, `short_desc`, `desc`, `category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `keyword`, `description`, `tax`, `amount_without_tax`, `cod`, `bannner`, `rating`, `df`) VALUES
(8, '77f9357abe5780e0b3e377498416c5a6', 'Hello world', '110.01', '', 'hello', '<p>sadsad</p>', '1', 1, '1', '1', '2019-08-05 15:05:29', '2019-08-05 17:51:14', '', '', '10', '100.01', '0', '077d796d23bdd2b649e56c437e8f2bbb.jpg', '0', 0),
(9, '87ca771ee8b45ecc3628f12fc6caf82f', 'Sample', '1100.00', '1200.00', 'sdfsdf', '<p>sdfsdf</p>', '2', 1, '1', '1', '2019-08-05 16:33:33', '2019-08-05 17:46:47', '', '', '10', '1000.00', '0', '9cd329fce67c732525b110976c906fbf.jpg', '3', 0),
(10, '61c3a690005c4d15141e217e3e11d753', 'Others', '55.00', '100.00', 'asdasdasd', '<p>asdasd</p>', '2', 1, '1', '1', '2019-08-07 00:18:55', '2019-08-07 00:19:59', '', '', '10', '50.00', '1', '2daf3344d2317563a009fc0efbf168a1.jpg', '3', 0),
(11, '93355210a5b16ee061d6c81d4fa38e48', 'Rental', '144.00', '150.00', 'asdads', '<p>asdasd</p>', '1,2', 1, '1', '1', '2019-08-07 01:22:46', '2019-08-07 01:32:05', '', '', '20', '120.00', '0', '4c729646a2d058c5bedaa813b7323553.jpg', '4', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `p_id`, `image`) VALUES
(3, '9', 'fefe832e03fe82d9c782f34c263ea97e.jpg'),
(4, '10', '45a4d8db4ff3f9592e26cecff026cb7f.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

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
(29, 'a', '2019-08-07 19:30:47');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `email`, `support_email`, `contact_email`, `newsletter_email`, `mobile`, `city`, `address`, `opening_hours`, `short_about`, `meta_keywords`, `meta_description`, `shop_commission`, `ad_number`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES
(1, 'kavadev@gmail.com', 'support.kava@gmail.com', 'nayanpatel807@gmail.com', 'nayanpatel807@gmail.com', '+91 90-9999-8171', 'Ahmedabad', 'City, gitanjali \r\namedabad', '10 am to 7 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', 'home', 'description', '50.00', '1234567890', 'ssl://smtp.googlemail.com', '465', 'mehul9921@gmail.com', 'KAVA@5981');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `owner_name`, `employee_name`, `mobile`, `wp_no`, `mobile_in_website`, `whats_in_website`, `address`, `landmark`, `email`, `hour_operation`, `pro_or_servi`, `payment_mode`, `photo`, `info`, `detail_desc`, `category`, `shop_plan`, `dis_in_listing`, `exp_date`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `keywords`, `rating`, `comment`) VALUES
(1, 'first', 'asdasd', 'asdasd l', '34234234234', '34234234234', 0, 0, 'asdasdasd asdasd asd asd This page didn\'t load Google Maps correctly. See the JavaScript console for technical details.', 'asdasd asdasdasda', 'asdas@gmail.com', '1212', 'sda adsd', 'aasdasd', '9e36c6a6b346ce680fa0c0b850ec714c.png', '<p>sadasdads</p>', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'aa', '2', 0, '2020-01-19', '1', '2019-05-29 18:07:25', '2019-08-07 17:35:23', '2019-05-29 18:55:49', 'a', '', ''),
(2, 'kava developers', 'kava', 'jay', '9099998171', '9099998171', 0, 1, 'adasd asdasdasd asda s dasd', 'asdasd asda dasd', 'asdasd@gmail.com', '45', 'web developement,software,seo,smo,android,ios,desktop', 'dsasdasd', '148bc37cadf9d8170700c4122bbbd70b.jpg', '<p><em>Looking Good</em> <u>and nice </u><strong>Shop</strong></p>', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium\r\n\r\n, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the \r\n\r\nScrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'It Developement', '2', 0, '2020-01-19', '1', '2019-05-29 18:20:48', '2019-08-07 17:35:09', NULL, 'a', '', ''),
(4, 'Gotham', 'Bruce Wayne', 'Lucius Fox', '2222222222', '2222555555', 0, 0, 'Gotham City', 'Wayne Towe', 'dsgsdkgjh@gmail.com', '9-5', 'application and', 'CASH', '9e36c6a6b346ce680fa0c0b850ec714c.png', '<p>DSMNB GKD GJHDKFGHDKF GHKD</p>', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'aa', '2', 0, '2020-01-19', '1', '2019-05-30 16:30:07', '2019-08-07 17:35:01', NULL, 'a', '', ''),
(5, 'food Junction ***', 'coca cola', 'jguar', '7897897822', '4564585685', 0, 0, 'jkl sda dasdasdsssssssssssssssssssssss', 'Darpan Six Road, Ahemdabad', '108@gmail.com', '8 to 8', '//////////////////////////////////////////////////////////', 'Paytam  6363', '9e36c6a6b346ce680fa0c0b850ec714c.png', '<p>[][][][]][asdasssssssssssssssssssssssssssssssssss</p>', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst\r\n                                many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'aaaa', '2', 0, '2020-01-19', '1', '2019-05-31 14:59:50', '2019-08-07 17:34:51', NULL, 'a', '', ''),
(6, 'lenovo', 'zoo', 'park', '1234564454', '01212121211', 0, 0, 'sdas dasd asda', 'asd asdasd asda sd', '712@gmail.com', '08:00  AM to 9:00 PM', 'asdasdas sad asdas dasd', 'Cash', 'aa5891bf0c76a6ddafeed87830ada232.jpg', '<p>asd dasd asd as</p>', 'asdasd', 'Electronic, mouse, keyboard, laptop, mobile,all items', '2', 1, '2020-01-19', '1', '2019-06-05 10:34:13', '2019-08-07 17:34:35', NULL, 'a', '', ''),
(7, 'umiya', 'ooo', 'adasdas', '4564525652', '1234567890', 0, 1, 'asdas dasd asd asdas das', 'asda sdas', 'dasdas@gmail.com', '12 to 9', 'asda as dasd', 'check', '', '', '', 'Veg', '3', 0, '2020-08-01', '1', '2019-06-11 12:43:06', '2019-08-07 17:34:21', NULL, 'a', '', ''),
(8, 'new Deluxea', 'Kava Developers', '', '4564523023', '1201232032', 0, 1, 'adas aS Ad,\r\nasdasdasdasd', 'ahmedabad', '', '10 to 5', 'dasda asd asd', 'cash', 'f430ee5c5567b9466c40d7b1c11bc066.jpg', '<p>asd asd asd asd asd asd</p>', 'aasdasd', 'dasdasdasd', '2', 1, '2020-01-19', '1', '2019-06-14 13:47:03', '2019-08-07 17:34:15', NULL, 'a', '', ''),
(9, 'admin kava', 'admin', '', '1234567890', '1234567890', 0, 0, 'six road abc def gfh', 'Darpan', '', '12 to 05', '123', 'cash', '', '', '', 'sample', '2', 0, '2020-01-19', '1', '2019-06-25 12:37:38', '2019-08-07 17:34:09', NULL, 'a', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_slider`
--

INSERT INTO `shop_slider` (`id`, `image`, `shop_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '489baedcfec8ebee14ad613734876cca.jpg', '', '1', '', '2019-06-06 13:56:04', NULL),
(14, 'de93555952ad9b6f582c02b404d7fae8.jpg', '6', '1', '', '2019-06-06 15:12:22', NULL),
(12, '5b47e9e1df1fd1e4282b1acc63f989e9.jpg', '6', '1', '', '2019-06-06 15:10:55', NULL),
(13, '6fd81900ee6f27bb7a2f93af93ee3289.jpg', '6', '1', '', '2019-06-06 15:12:12', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_user`
--

INSERT INTO `social_user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `image`, `delete_flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'rrrr', 'ers', 'sdfs@gmail.com', '12012121211', '0e7517141fb53f21ee439b355b5a1d0a', '483391b37a55a7e84ba56af8dbba8572.png', 1, '2019-06-04 12:31:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'asdasdasd', 'dasda', 'dasd@gmail.com', '1201212121', '456456456', '580b0399f62f5ca36a1b3443aec578a0.jpg', 1, '2019-06-04 12:24:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'asdasd', 'asdasd', '12@gmail.com', '12121212121', '0e7517141fb53f21ee439b355b5a1d0a', '1f4d40181b795f2c1a35d95750f8fb13.jpg', 1, '2019-06-04 12:37:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'elephant', 'jungle', 'nayan@gmail.com', '4564589789', '0e7517141fb53f21ee439b355b5a1d0a', '0f5a364c7a9f21305b97bea45c3d456d.jpg', 1, '2019-06-04 12:56:22', '0000-00-00 00:00:00', '2019-08-04 18:42:17'),
(8, 'test', 'user', 'mehul2081@gmail.com', '4564512312', '0e7517141fb53f21ee439b355b5a1d0a', '3aef2dce48775707a9bb6119bc97f74c.jpg', 0, '2019-06-12 16:20:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'types', 'number', 'mehul9921@gmail.com', '1201232032', '0e7517141fb53f21ee439b355b5a1d0a', 'd20a3b9984f166fbbbadbafb9eb5de7d.jpg', 0, '2019-06-12 16:27:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 'Order Placed', '2019-08-05 18:36:14', '5');

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
(1, 'admin', 'Super User', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '9898989898', 0, '0', '1', '2018-11-30 06:34:34', '2019-06-18 11:34:40', NULL, 'user.png'),
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
