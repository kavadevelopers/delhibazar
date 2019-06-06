-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2019 at 09:54 AM
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
  `category` longtext NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `owner_name`, `employee_name`, `mobile`, `wp_no`, `address`, `landmark`, `email`, `hour_operation`, `pro_or_servi`, `payment_mode`, `photo`, `info`, `detail_desc`, `category`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd l', '34234234234', '34234234234', 'asdasdasd asdasd asd asd This page didn\'t load Google Maps correctly. See the JavaScript console for technical details.', 'asdasd asdasdasda', 'asdas@gmail.com', '1212', 'sda adsd', 'aasdasd', '9e36c6a6b346ce680fa0c0b850ec714c.png', 'sadasdads', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', '1', '2019-05-29 18:07:25', NULL, '2019-05-29 18:55:49'),
(2, 'kava developers', 'kava', 'jay', '9099998171', '9099998171', 'adasd asdasdasd asda s dasd', 'asdasd asda dasd', 'asdasd@gmail.com', '45', 'web developement,software,seo,smo,android,ios,desktop', 'dsasdasd', '148bc37cadf9d8170700c4122bbbd70b.jpg', 'asdasdasd', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium\r\n\r\n, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the \r\n\r\nScrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', 'It Developement', '1', '2019-05-29 18:20:48', '2019-06-05 11:41:51', NULL),
(4, 'Gotham', 'Bruce Wayne', 'Lucius Fox', '2222222222', '2222555555', 'Gotham City', 'Wayne Towe', 'dsgsdkgjh@gmail.com', '9-5', 'application and', 'CASH', '9e36c6a6b346ce680fa0c0b850ec714c.png', 'DSMNB GKD GJHDKFGHDKF GHKD', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst                                 many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', '1', '2019-05-30 16:30:07', NULL, NULL),
(5, 'food Junction ***', 'coca cola', 'jguar', '7897897822', '4564585685', 'jkl sda dasdasdsssssssssssssssssssssss', 'Darpan Six Road, Ahemdabad', '108@gmail.com', '8 to 8', '//////////////////////////////////////////////////////////', 'Paytam  6363', '9e36c6a6b346ce680fa0c0b850ec714c.png', '[][][][]][asdasssssssssssssssssssssssssssssssssss', 'Tasty Hand-Pulled Noodles is a 1950s style diner located in Madison, Wisconsin. Opened in 1946 by Mickey Weidman, and located just across the street from Camp Randall Stadium, it has become a popular game day tradition amongst\r\n                                many Badger fans. The diner is well known for its breakfast selections, especially the Scrambler, which is a large mound of potatoes, eggs, cheese, gravy, and a patrons’ choice of other toppings.', '', '1', '2019-05-31 14:59:50', '2019-05-31 15:39:00', NULL),
(6, 'lenovo', 'zoo', 'park', '1234564454', '01212121211', 'sdas dasd asda', 'asd asdasd asda sd', '712@gmail.com', '08:00  AM to 9:00 PM', 'asdasdas sad asdas dasd', 'Cash', 'aa5891bf0c76a6ddafeed87830ada232.jpg', 'asd dasd asd as', 'asdasd', 'Electronic, mouse, keyboard, laptop, mobile,all items', '1', '2019-06-05 10:34:13', '2019-06-05 10:36:49', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_rating`
--

INSERT INTO `shop_rating` (`id`, `user_id`, `shop_id`, `subject`, `review`, `rating`, `created_at`) VALUES
(1, '7', '2', '** I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 3, '2019-06-04 18:40:22'),
(2, '7', '2', '* \r\nI love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I\r\n\r\n', 4, '2019-06-03 00:00:00'),
(3, '7', '2', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 5, '2019-06-01 18:43:13'),
(4, '7', '2', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 2, '2019-06-04 18:44:44'),
(5, '6', '2', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly', 'I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the\r\n                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great\r\n                                dipped in their chili sauce.', 3, '2019-06-04 19:41:40'),
(6, '6', '4', '', 'This is good', 4, '2019-06-04 20:32:53');

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
