-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 12:21 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`id`, `business_name`, `intro`, `mobile`, `address`, `link`, `photo`, `plan_name`, `exp_date`, `page`, `position`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(1, 'alpha', 'abcd', '8758432032', 'asdasdas', '#', 'no-image.png', '2', '2019-07-10', 'Home', '6', '1', '1', '2019-06-11 17:23:47', '2019-06-11 17:23:47', '0'),
(2, 'Beta', 'asdasd', '1203454567', 'asdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '8', '1', '1', '2019-06-11 17:27:26', '2019-06-11 17:27:26', '0'),
(3, 'Gama', 'asdasd', '1201232032', 'asdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '1', '1', '1', '2019-06-11 17:27:45', '2019-06-11 17:27:45', '0'),
(4, 'Lemda', 'dasdasd', '4506345269', 'asdasda', '#', 'no-image.png', '2', '2019-07-11', 'Home', '4', '1', '1', '2019-06-11 17:28:26', '2019-06-11 17:28:26', '0'),
(5, 'dasdasd', 'asdasd', '1201232032', 'asdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '5', '1', '1', '2019-06-11 17:28:54', '2019-06-11 17:28:54', '0'),
(6, 'xx2', 'asdasd', '7807898098', 'asdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '3', '1', '1', '2019-06-11 17:29:34', '2019-06-11 17:29:34', '0'),
(7, 'sssdfd', 'sadasd', '7807898090', 'sadasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '2', '1', '1', '2019-06-11 17:29:57', '2019-06-11 17:29:57', '0'),
(8, 'trtrt', 'rtrt', '7807898020', 'asdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '7', '1', '1', '2019-06-11 17:30:30', '2019-06-11 17:30:30', '0'),
(9, 'fdgdfg', 'sfdgfsdg', '7807898071', 'sadasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '9', '1', '1', '2019-06-11 17:30:59', '2019-06-11 17:30:59', '0'),
(10, 'cvvcvcv', 'scsd', '7807898010', 'sdasdasd', '#', 'no-image.png', '2', '2019-07-11', 'Home', '10', '1', '1', '2019-06-11 17:31:32', '2019-06-11 17:31:32', '0'),
(11, 'asdasd asd asd dasda vvvvvvvvvvvvv', 'asdasda asd asd asd asd asdasd asdasd asd\r\nasd asd asd asd asdasd asdasd asd\r\nasd asd asd asd asdasd asdasd asd', '1201232032', 'asd asd asd asd asdasd asdasd asd\r\nasd asd asd asd asdasd asdasd asd\r\nasd asd asd asd asdasd asdasd asd', '#', 'no-image.png', '2', '2019-07-11', 'Listing', '1', '1', '1', '2019-06-11 17:46:29', '2019-06-11 17:46:29', '0'),
(12, 'zibra', 'adsdasdasd', '4564563022', 'asdasdasda asdas', '#', 'no-image.png', '2', '2019-07-11', 'Listing', '3', '1', '1', '2019-06-11 17:50:11', '2019-06-11 17:50:11', '0'),
(13, 'Croobow', 'asdasdas', '7897865565', 'asdas dasd', '#', 'no-image.png', '2', '2019-07-11', 'Listing', '2', '1', '1', '2019-06-11 17:50:48', '2019-06-11 17:50:48', '0');

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
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`) VALUES
(1, 'about', '<p>This Is data <u><em><strong>123456</strong></em></u></p>\r\n'),
(2, 'terms', '<p>This is <u><em><strong>terms</strong></em></u></p>\r\n'),
(3, 'privacy', '<h1>This i<strong>s privacy</strong></h1>\r\n');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `hash`, `name`, `amount`, `short_desc`, `desc`, `category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `df`) VALUES
(1, '02d97bed230cb3255b908f51699e33bd', 'Moto Z play', '25000.00', '25000.00', '25000.00', '4', 1, '1', '1', '2019-05-06 09:46:09', '2019-05-06 09:46:09', 0),
(2, '4366a1f0469f990d530a3e2b6219f79e', 'Samsung Galaxy s10a', '12001.00', 'Samsung Branda', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><em><u>Specification</u></em></strong></h3>\r\n\r\n<ul>\r\n	<li>5.5 inch display</li>\r\n	<li>full displays</li>\r\n	<li>123</li>\r\n</ul>', '4', 1, '1', '1', '2019-05-06 09:48:37', '2019-05-06 11:05:16', 0),
(3, '79f3c79fbbdce0cebb18027dc0812610', 'Redmi 6 Pro', '12999.00', 'asdasd asd asdasdasdasdasdsad', '<p>asda sdasd asdasd</p>', '4', 1, '1', '1', '2019-06-07 17:17:02', '2019-06-07 17:17:02', 0),
(4, '0cd155e84b4266c63337a02303551499', 'Redmi 6', '11999.00', 'asdasdasd asd', '<p>asdasdasdsad</p>', '4', 1, '1', '1', '2019-06-07 17:17:36', '2019-06-07 17:17:36', 0),
(5, '1ccdcca89fbe346071ed3c4f6c370621', 'redmi 7', '14999.00', 'asdasdasdasd', '<p>asdasdasd<em>as asd asdasasd</em></p>', '4', 1, '1', '1', '2019-06-07 17:18:03', '2019-06-07 17:18:03', 0),
(6, 'ffa0eddb2f3f73dda1fac27ff6b0b1ea', 'redmi 7 pro', '15999.00', 'asda sda', '<p>asdasdasd<strong>asdas asd asd</strong></p>', '4', 1, '1', '1', '2019-06-07 17:18:26', '2019-06-07 17:18:26', 0),
(7, 'b14c983e834525d2cc1ab48c5559282f', 'Redmi 7 pro..', '15999.00', 'rrrrrrrrrrrrrrrrrrrrrrrrr\r\ndasdas dasd asdas a\r\nasdasdasd', '<p><strong>Camera&nbsp;</strong></p>\r\n\r\n<p><em>fornt Camera : 12px</em></p>\r\n\r\n<p><em>Seconad Camera : 48px;</em></p>\r\n\r\n<p><strong>Display</strong></p>\r\n\r\n<p><em>6.2 display..</em></p>', '4', 0, '1', '1', '2019-06-08 14:41:04', '2019-06-08 15:16:45', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `p_id`, `image`) VALUES
(1, '7', 'adfb6d9879d936720ecfa940895dca27.jpg');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `mobile` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `opening_hours` text NOT NULL,
  `short_about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `email`, `support_email`, `contact_email`, `mobile`, `city`, `address`, `opening_hours`, `short_about`) VALUES
(1, 'kavadev@gmail.com', 'support.kava@gmail.com', 'nayanpatel807@gmail.com', '+91 90-9999-8171', 'Ahmedabad', 'City, gitanjali \r\namedabad', '10 am to 7 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown');

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
  `category` longtext NOT NULL,
  `shop_plan` varchar(250) DEFAULT NULL COMMENT 'shop package id',
  `exp_date` date DEFAULT NULL COMMENT 'Shop Expiry Date',
  `created_by` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `owner_name`, `employee_name`, `mobile`, `wp_no`, `address`, `landmark`, `email`, `hour_operation`, `pro_or_servi`, `payment_mode`, `photo`, `info`, `detail_desc`, `category`, `shop_plan`, `exp_date`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd l', '34234234234', '34234234234', 'asdasdasd asdasd asd asd This page didn\'t load Google Maps correctly. See the JavaScript console for technical details.', 'asdasd asdasdasda', 'asdas@gmail.com', '1212', 'sda adsd', 'aasdasd', '9e36c6a6b346ce680fa0c0b850ec714c.png', 'sadasdads', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', NULL, '2020-06-05', '1', '2019-05-29 18:07:25', NULL, '2019-05-29 18:55:49'),
(2, 'kava developers', 'kava', 'jay', '9099998171', '9099998171', 'adasd asdasdasd asda s dasd', 'asdasd asda dasd', 'asdasd@gmail.com', '45', 'web developement,software,seo,smo,android,ios,desktop', 'dsasdasd', '148bc37cadf9d8170700c4122bbbd70b.jpg', 'asdasdasd', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium\r\n\r\n, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the \r\n\r\nScrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'It Developement', NULL, '2020-06-05', '1', '2019-05-29 18:20:48', '2019-06-05 11:41:51', NULL),
(4, 'Gotham', 'Bruce Wayne', 'Lucius Fox', '2222222222', '2222555555', 'Gotham City', 'Wayne Towe', 'dsgsdkgjh@gmail.com', '9-5', 'application and', 'CASH', '9e36c6a6b346ce680fa0c0b850ec714c.png', 'DSMNB GKD GJHDKFGHDKF GHKD', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', NULL, '2020-06-05', '1', '2019-05-30 16:30:07', NULL, NULL),
(5, 'food Junction ***', 'coca cola', 'jguar', '7897897822', '4564585685', 'jkl sda dasdasdsssssssssssssssssssssss', 'Darpan Six Road, Ahemdabad', '108@gmail.com', '8 to 8', '//////////////////////////////////////////////////////////', 'Paytam  6363', '9e36c6a6b346ce680fa0c0b850ec714c.png', '[][][][]][asdasssssssssssssssssssssssssssssssssss', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst\r\n                                many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', NULL, '2020-06-05', '1', '2019-05-31 14:59:50', '2019-05-31 15:39:00', NULL),
(6, 'lenovo', 'zoo', 'park', '1234564454', '01212121211', 'sdas dasd asda', 'asd asdasd asda sd', '712@gmail.com', '08:00  AM to 9:00 PM', 'asdasdas sad asdas dasd', 'Cash', 'aa5891bf0c76a6ddafeed87830ada232.jpg', 'asd dasd asd as', 'asdasd', 'Electronic, mouse, keyboard, laptop, mobile,all items', NULL, '2020-06-05', '1', '2019-06-05 10:34:13', '2019-06-05 10:36:49', NULL),
(7, 'umiya', 'ooo', 'adasdas', '4564525652', '1234567890', 'asdas dasd asd asdas das', 'asda sdas', 'dasdas@gmail.com', '12 to 9', 'asda as dasd', 'check', '', '', '', 'Veg', '3', '2020-06-05', '1', '2019-06-11 12:43:06', '2019-06-11 12:52:42', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_rating`
--

INSERT INTO `shop_rating` (`id`, `user_id`, `shop_id`, `subject`, `review`, `rating`, `created_at`) VALUES
(5, '6', '2', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 3, '2019-06-04 19:41:40'),
(6, '6', '2', '', 'This is good', 4, '2019-06-04 20:32:53'),
(11, '6', '2', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 3, '2019-06-04 19:41:40'),
(12, '6', '2', '', 'This is good', 4, '2019-06-04 20:32:53');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_user`
--

INSERT INTO `social_user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `image`, `delete_flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'rrrr', 'ers', 'sdfs@gmail.com', '12012121211', '5690d363233fab288d51e9b4b4c70edb', '483391b37a55a7e84ba56af8dbba8572.png', 0, '2019-06-04 12:31:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'asdasdasd', 'dasda', 'dasd@gmail.com', '1201212121', '456456456', '580b0399f62f5ca36a1b3443aec578a0.jpg', 0, '2019-06-04 12:24:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'asdasd', 'asdasd', '12@gmail.com', '12121212121', '0e7517141fb53f21ee439b355b5a1d0a', '1f4d40181b795f2c1a35d95750f8fb13.jpg', 0, '2019-06-04 12:37:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'elephant', 'jungle', 'nayan@gmail.com', '4564589789', '0e7517141fb53f21ee439b355b5a1d0a', '0f5a364c7a9f21305b97bea45c3d456d.jpg', 0, '2019-06-04 12:56:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
