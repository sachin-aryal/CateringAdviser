-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 01:48 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id`, `area`, `building`, `catering_name`, `designation`, `district`, `email_id`, `established_date`, `first_name`, `floor`, `last_name`, `logo`, `nearest_landmark`, `pan_no`, `phone_no1`, `phone_no2`, `street`, `vat_no`, `ward`, `website`, `zone`, `user_id`) VALUES
(39, 'Chabahil', 'Red', 'My Best Catering', 'Manager', 'Achham', 'sachin.aryal@gmail.com', '2009/02/23', 'Sachin', '2', 'Aryal', 'uploads/My Best Catering_VDhNJ67oQh_logo.jpg', 'Ganesh Mandir', 'asd223', '9861676916', 'No', 'Ganesthan', 'asdsa', '', 'NO ANY', 'Bagmati', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `catering_id`, `name`) VALUES
(97, 39, 'Parking'),
(98, 39, 'Stage'),
(99, 39, 'DJ'),
(100, 39, 'Florist'),
(101, 39, 'Decoration'),
(102, 39, 'Tattoo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `catering_id`, `item_name`) VALUES
(199, 'Veg Snacks', 39, 'Plain Rice, Pakora'),
(200, 'Non-Veg Snacks', 39, 'Chili Chicken, Fly Chiken'),
(201, 'Veg Main Course', 39, 'Milk, Tea'),
(202, 'Non-Veg Main Course', 39, 'Non-Veg Tea, Non-Veg Milk'),
(203, 'Salad', 39, 'Gajar, Kakro'),
(204, 'Pickles', 39, 'Test1, Test2'),
(205, 'Soft Drinks', 39, 'Coke, Pepsi'),
(206, 'Hard Drinks', 39, 'Vodka, Rum'),
(207, 'Hot Drinks', 39, 'Tea1, Tea2'),
(208, 'Soup', 39, 'Khasi Ko Soup, Kukhura ko Soup'),
(209, 'BBQ', 39, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_people_start` int(11) NOT NULL DEFAULT '0',
  `no_of_people_end` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `catering_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `no_of_people_start`, `no_of_people_end`, `price`, `catering_id`) VALUES
(16, 0, 250, 1400, 39),
(17, 250, 400, 1200, 39),
(18, 400, 1500, 800, 39);

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
(1, 'ca6.h8QGYJ.Z.', 'catering', 'root@gmail.com', 1, ''),
(4, 'caCRj9eMXo4.I', 'catering', 'saaryal51@gmail.com', 1, '9861676916'),
(8, 'caG2/l/l4PaoQ', 'admin', 'admin@gmail.com', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `catering_id` bigint(20) NOT NULL,
  `closing_time` varchar(255) DEFAULT NULL,
  `i_max_capacity` int(11) DEFAULT NULL,
  `indoor_size` varchar(255) DEFAULT NULL,
  `music_end` varchar(255) DEFAULT NULL,
  `no_of_bars` int(11) DEFAULT NULL,
  `no_of_cleaners` int(11) DEFAULT NULL,
  `no_of_cooks` int(11) DEFAULT NULL,
  `no_of_guards` int(11) DEFAULT NULL,
  `no_of_halls` int(11) DEFAULT NULL,
  `no_of_helpers` int(11) DEFAULT NULL,
  `no_of_others` int(11) DEFAULT NULL,
  `no_of_servers` int(11) DEFAULT NULL,
  `o_max_capacity` int(11) DEFAULT NULL,
  `opening_time` varchar(255) DEFAULT NULL,
  `outdoor_size` varchar(255) DEFAULT NULL,
  `parking_size` varchar(255) DEFAULT NULL,
  `venue_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pi3e22m06vgl047jn6w234b4b` (`catering_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `catering_id`, `closing_time`, `i_max_capacity`, `indoor_size`, `music_end`, `no_of_bars`, `no_of_cleaners`, `no_of_cooks`, `no_of_guards`, `no_of_halls`, `no_of_helpers`, `no_of_others`, `no_of_servers`, `o_max_capacity`, `opening_time`, `outdoor_size`, `parking_size`, `venue_size`) VALUES
(34, 39, '10:00 PM', 12, '123 Meter Square', '9:00 PM', 2, 5, 4, 7, 23, 3, 6, 1, 29, '12:00 AM', '126 Meter Square', '50 Cars', '300m2');

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
