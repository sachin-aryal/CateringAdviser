-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 01:56 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CateringManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE IF NOT EXISTS `catering` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area` varchar(255) NOT NULL,
  `building` varchar(255) DEFAULT NULL,
  `catering_name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `established_date` varchar(30) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nearest_landmark` varchar(255) DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `phone_no1` varchar(255) NOT NULL,
  `phone_no2` varchar(255) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `vat_no` varchar(255) DEFAULT NULL,
  `ward` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `zone` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id`, `area`, `building`, `catering_name`, `designation`, `district`, `email_id`, `established_date`, `first_name`, `floor`, `last_name`, `logo`, `nearest_landmark`, `pan_no`, `phone_no1`, `phone_no2`, `street`, `vat_no`, `ward`, `website`, `zone`, `user_id`) VALUES
(35, 'Chabahil', 'Red', 'My Best Catering', 'Manager', 'Achham', 'sachin.aryal@gmail.com', '2009/02/23', 'Sachin', '2', 'Aryal', 'uploads/My Best Catering_logo.jpg', 'Ganesh Mandir', 'asd223', '9861676916', '', 'Ganesthan', 'asdas22', '', '', 'Bagmati', 1),
(36, 'Chabahil', 'Red', 'Second Best Catering', 'Manager', 'Achham', 'sachin.aryal@gmail.com', '2009/02/23', 'Sachin', '2', 'Aryal', 'uploads/Second Best Catering_logo.jpg', 'Ganesh Mandir', 'asd223', '9861676916', 'No', 'Ganesthan', 'asdas22', '', 'NO ANY', 'Bagmati', 1),
(37, 'Chabahil', 'Red', 'Second Best Catering', 'Manager', 'Achham', 'sachin.aryal@gmail.com', '2009/02/23', 'Sachin', '2', 'Aryal', 'uploads/Second Best Catering_logo.jpg', 'Ganesh Mandir', 'asd223', '9861676916', 'No', 'Ganesthan', 'asdas22', '', 'NO ANY', 'Bagmati', 1),
(38, 'Chabahil', 'Red', 'Another Best Catering', 'Manager', 'Achham', 'sachin.aryal@gmail.com', '2009/02/23', 'Sachin', '2', 'Aryal', 'uploads/Another Best Catering_a2gmiA8yT8_logo.jpg', 'Ganesh Mandir', 'asd223', '9861676916', 'No', 'Ganesthan', 'asdas22', '', 'NO ANY', 'Bagmati', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `catering_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_1n9jsk91klp1c4siphpj7d3va` (`catering_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `catering_id`, `name`) VALUES
(57, 35, 'Parking'),
(58, 35, 'Florist'),
(59, 35, 'Decoration'),
(60, 35, 'Music / Sound System'),
(61, 35, 'Throne / Sofa'),
(62, 35, 'Dinner / Snack'),
(63, 36, 'Parking'),
(64, 36, 'Florist'),
(65, 36, 'Decoration'),
(66, 36, 'Music / Sound System'),
(67, 36, 'Throne / Sofa'),
(68, 36, 'Dinner / Snack'),
(69, 37, 'Parking'),
(70, 37, 'Florist'),
(71, 37, 'Dance Area'),
(72, 37, 'Decoration'),
(73, 37, 'Music / Sound System'),
(74, 37, 'Heater'),
(75, 37, 'Throne / Sofa'),
(76, 37, 'Dinner / Snack'),
(77, 38, 'Parking'),
(78, 38, 'Florist'),
(79, 38, 'Dance Area'),
(80, 38, 'Decoration'),
(81, 38, 'Music / Sound System'),
(82, 38, 'Heater'),
(83, 38, 'Throne / Sofa'),
(84, 38, 'Dinner / Snack');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `catering_id` bigint(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_3rx6rd1r2trvdg1yx1ytjj3o` (`catering_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `catering_id`, `item_name`) VALUES
(133, 'Veg Snacks', 35, 'Plain Rice, Pakora'),
(134, 'Non-Veg Snacks', 35, 'Chili Chicken, Fly Chiken'),
(135, 'Veg Main Course', 35, 'Milk, Tea'),
(136, 'Non-Veg Main Course', 35, 'Non-Veg Tea, Non-Veg Milk'),
(137, 'Salad', 35, 'Gajar, Kakro'),
(138, 'Pickles', 35, 'Test1, Test2'),
(139, 'Soft Drinks', 35, 'Coke, Pepsi'),
(140, 'Hard Drinks', 35, 'Vodka, Rum'),
(141, 'Hot Drinks', 35, 'Tea1, Tea2'),
(142, 'Soup', 35, 'Khasi Ko Soup, Kukhura ko Soup'),
(143, 'BBQ', 35, 'Yes'),
(144, 'Veg Snacks', 36, 'Plain Rice, Pakora'),
(145, 'Non-Veg Snacks', 36, 'Chili Chicken, Fly Chiken'),
(146, 'Veg Main Course', 36, 'Milk, Tea'),
(147, 'Non-Veg Main Course', 36, 'Non-Veg Tea, Non-Veg Milk'),
(148, 'Salad', 36, 'Gajar, Kakro'),
(149, 'Pickles', 36, 'Test1, Test2'),
(150, 'Soft Drinks', 36, 'Coke, Pepsi'),
(151, 'Hard Drinks', 36, 'Vodka, Rum'),
(152, 'Hot Drinks', 36, 'Tea1, Tea2'),
(153, 'Soup', 36, 'Khasi Ko Soup, Kukhura ko Soup'),
(154, 'BBQ', 36, 'No'),
(155, 'Veg Snacks', 37, 'Plain Rice, Pakora'),
(156, 'Non-Veg Snacks', 37, 'Chili Chicken, Fly Chiken'),
(157, 'Veg Main Course', 37, 'Milk, Tea'),
(158, 'Non-Veg Main Course', 37, 'Non-Veg Tea, Non-Veg Milk'),
(159, 'Salad', 37, 'Gajar, Kakro'),
(160, 'Pickles', 37, 'Test1, Test2'),
(161, 'Soft Drinks', 37, 'Coke, Pepsi'),
(162, 'Hard Drinks', 37, 'Vodka, Rum'),
(163, 'Hot Drinks', 37, 'Tea1, Tea2'),
(164, 'Soup', 37, 'Khasi Ko Soup, Kukhura ko Soup'),
(165, 'BBQ', 37, 'Yes'),
(166, 'Veg Snacks', 38, 'Plain Rice, Pakora'),
(167, 'Non-Veg Snacks', 38, 'Chili Chicken, Fly Chiken'),
(168, 'Veg Main Course', 38, 'Milk, Tea'),
(169, 'Non-Veg Main Course', 38, 'Non-Veg Tea, Non-Veg Milk'),
(170, 'Salad', 38, 'Gajar, Kakro'),
(171, 'Pickles', 38, 'Test1, Test2'),
(172, 'Soft Drinks', 38, 'Coke, Pepsi'),
(173, 'Hard Drinks', 38, 'Vodka, Rum'),
(174, 'Hot Drinks', 38, 'Tea1, Tea2'),
(175, 'Soup', 38, 'Khasi Ko Soup, Kukhura ko Soup'),
(176, 'BBQ', 38, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_people` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `catering_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `no_of_people`, `price`, `catering_id`) VALUES
(7, 23, 1500, 35),
(8, 23, 1500, 36),
(9, 23, 1500, 37),
(10, 23, 1500, 38);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `phone_no` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_r43af9ap4edm43mmtq01oddj6` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `role`, `username`, `enabled`, `phone_no`) VALUES
(1, 'caNCyOY7ipZ4A', 'catering', 'root@gmail.com', 1, ''),
(4, 'caNCyOY7ipZ4A', 'catering', 'sachin@gmail.com', 0, '9861676916'),
(8, 'caG2/l/l4PaoQ', 'admin', 'admin@gmail.com', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `catering_id` bigint(20) NOT NULL,
  `closing_time` varchar(255) NOT NULL,
  `i_max_capacity` int(11) DEFAULT NULL,
  `indoor_size` varchar(255) DEFAULT NULL,
  `music_end` varchar(255) DEFAULT NULL,
  `no_of_bars` int(11) NOT NULL,
  `no_of_cleaners` int(11) DEFAULT NULL,
  `no_of_cooks` int(11) DEFAULT NULL,
  `no_of_guards` int(11) DEFAULT NULL,
  `no_of_halls` int(11) NOT NULL,
  `no_of_helpers` int(11) DEFAULT NULL,
  `no_of_others` int(11) DEFAULT NULL,
  `no_of_servers` int(11) DEFAULT NULL,
  `o_max_capacity` int(11) DEFAULT NULL,
  `opening_time` varchar(255) NOT NULL,
  `outdoor_size` varchar(255) DEFAULT NULL,
  `parking_size` varchar(255) DEFAULT NULL,
  `venue_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pi3e22m06vgl047jn6w234b4b` (`catering_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `catering_id`, `closing_time`, `i_max_capacity`, `indoor_size`, `music_end`, `no_of_bars`, `no_of_cleaners`, `no_of_cooks`, `no_of_guards`, `no_of_halls`, `no_of_helpers`, `no_of_others`, `no_of_servers`, `o_max_capacity`, `opening_time`, `outdoor_size`, `parking_size`, `venue_size`) VALUES
(30, 35, '10:00 PM', 12, '123 Meter Square', '9:00 PM', 2, 5, 4, 7, 23, 3, 6, 1, 29, '12:00 AM', '126 Meter Square', '', '300m2'),
(31, 36, '10:00 PM', 12, '123 Meter Square', '9:00 PM', 2, 5, 4, 7, 23, 3, 6, 1, 29, '12:00 AM', '126 Meter Square', '', '300m2'),
(32, 37, '10:00 PM', 12, '123 Meter Square', '9:00 PM', 2, 5, 4, 7, 23, 3, 6, 1, 29, '12:00 AM', '126 Meter Square', '', '300m2'),
(33, 38, '10:00 PM', 12, '123 Meter Square', '9:00 PM', 2, 5, 4, 7, 23, 3, 6, 1, 29, '12:00 AM', '126 Meter Square', '', '300m2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facility`
--
ALTER TABLE `facility`
  ADD CONSTRAINT `FK_1n9jsk91klp1c4siphpj7d3va` FOREIGN KEY (`catering_id`) REFERENCES `catering` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_3rx6rd1r2trvdg1yx1ytjj3o` FOREIGN KEY (`catering_id`) REFERENCES `catering` (`id`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `FK_pi3e22m06vgl047jn6w234b4b` FOREIGN KEY (`catering_id`) REFERENCES `catering` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
