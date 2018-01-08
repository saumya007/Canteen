-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2013 at 07:08 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `canteen`
--
CREATE DATABASE IF NOT EXISTS `canteen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `canteen`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(45) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'sag', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE IF NOT EXISTS `billing_details` (
  `billing_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(15) NOT NULL,
  `Street_Address` varchar(100) NOT NULL,
  `P_O_Box_No` varchar(15) NOT NULL,
  `City` text NOT NULL,
  `Mobile_No` varchar(15) NOT NULL,
  `Landline_No` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`billing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`billing_id`, `member_id`, `Street_Address`, `P_O_Box_No`, `City`, `Mobile_No`, `Landline_No`) VALUES
(1, 15, 'at dasir room no. 202', '175001', 'mandi', 'hshdhdwh iowqjs', ''),
(2, 17, 'a;''slalsa', 'sd;slx[a', 'xalalpsq', 's;kqpdiw0kq', '.,mlqsdqs'),
(3, 19, 'at b2 h6 colony', '175001', 'mandi', '9816479040', ''),
(4, 20, 'Dasir hostel', '175001', 'mandi', '9816479040', 'H.P.'),
(5, 22, 'Dasir hostel', '175001', 'mandi', '9816479040', 'H.P.');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `cart_id` int(15) NOT NULL AUTO_INCREMENT,
  `member_id` int(15) NOT NULL,
  `food_id` int(15) NOT NULL,
  `quantity_id` int(15) NOT NULL,
  `total` float NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `member_id`, `food_id`, `quantity_id`, `total`, `flag`) VALUES
(1, 15, 1, 1, 20, 0),
(2, 16, 1, 3, 140, 0),
(3, 16, 2, 1, 20, 0),
(4, 17, 1, 4, 160, 0),
(5, 17, 4, 2, 150, 0),
(8, 19, 1, 1, 20, 1),
(10, 19, 1, 1, 20, 1),
(16, 19, 1, 1, 20, 0),
(17, 20, 4, 1, 25, 1),
(18, 20, 2, 1, 20, 1),
(19, 23, 1, 11, 120, 0),
(20, 22, 1, 12, 140, 0),
(22, 22, 4, 11, 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(15) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'italian'),
(2, 'chinese'),
(3, 'Drink'),
(4, 'Indian'),
(5, 'specials');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currency_id` int(5) NOT NULL AUTO_INCREMENT,
  `currency_symbol` varchar(15) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_symbol`, `flag`) VALUES
(1, '$', 0),
(2, '&#8377;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE IF NOT EXISTS `food_details` (
  `food_id` int(15) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(45) NOT NULL,
  `food_description` text NOT NULL,
  `food_price` float NOT NULL,
  `food_photo` varchar(45) NOT NULL,
  `food_category` int(15) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`food_id`, `food_name`, `food_description`, `food_price`, `food_photo`, `food_category`) VALUES
(1, 'momos', 'delicious', 20, 'veg-momos.jpg', 2),
(2, 'veg-momos', 'delicious', 20, '3524563641_Chicken_Momos_120612_2.jpg', 2),
(3, 'Noodles', 'delicious', 20, 'download.jpg', 2),
(4, 'Cola-cane', 'chill', 25, 'images.jpg', 3),
(8, 'pratha', 'aloo', 12, '100_6883.JPG', 4),
(9, 'Special ice-cream', '6 in the price of 5', 100, 'ice.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  `question_id` int(5) NOT NULL,
  `answer` varchar(45) NOT NULL,
  PRIMARY KEY (`member_id`),
  FULLTEXT KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`, `question_id`, `answer`) VALUES
(15, 'ambuj', 'kumar', 'me@som.in', '81dc9bdb52d04dc20036dbd8313ed055', 1, '9ab7b145bc19095dac6b18cf02bb958e'),
(16, 'hello', 'bye', 'hello@h.in', '5d41402abc4b2a76b9719d911017c592', 1, '7bdff76536f12a7c5ffde207e72cfe3a'),
(17, 'Subhash', 'kumar', 'agarwal.sk091@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '28c0f82e20c5f08e5dfa3032a13d1875'),
(18, 'Ramraj', 'meena', 'meena.ramraj15@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 2, 'ec83186d09ed9102667881ab97bf6bfc'),
(19, 'A', 'AA', 'ann@gmail.com', 'f970e2767d0cfe75876ea857f92e319b', 1, '855dd0c515a3e652763ec84eb26c1624'),
(20, 'Himanshu', 'nandeswar', 'cool_himanshu@yahoo.com', '4122ea4f5490094a33d7cdba65136cf8', 2, 'cc60358f4adbc055856ea802a7a70d7b'),
(21, 'Sai', 'kiran', 'ramavathsaikiran123@gmail.com', '202cb962ac59075b964b07152d234b70', 3, '9de0f163005269ab9fcc14172c973046'),
(22, 'subhash', 'agarwal', 'agarwal1994@live.in', '81dc9bdb52d04dc20036dbd8313ed055', 1, '95340e08d5e91de8229edd3ed2433bd8'),
(23, 'Mohit', 'Sharma', 'mohitpalwal93@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '07ced8aef4f9f33ccea1cfe29e3351bc'),
(24, 'munindar', 'kumar', 'munindar@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'aaca6f8cd4fec9fad099e63739639a5a');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(15) NOT NULL AUTO_INCREMENT,
  `message_from` varchar(25) NOT NULL,
  `message_date` date NOT NULL,
  `message_time` time NOT NULL,
  `message_subject` text NOT NULL,
  `message_text` text NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_from`, `message_date`, `message_time`, `message_subject`, `message_text`) VALUES
(5, 'administrator', '2013-11-09', '11:22:05', 'promo offer', 'hi users');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `billing_id` int(10) NOT NULL,
  `cart_id` int(15) NOT NULL,
  `delivery_date` date NOT NULL,
  `StaffID` int(15) NOT NULL,
  `flag` int(1) NOT NULL,
  `time_stamp` time NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_id`, `member_id`, `billing_id`, `cart_id`, `delivery_date`, `StaffID`, `flag`, `time_stamp`) VALUES
(20, 22, 5, 22, '2013-11-09', 0, 0, '11:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `partyhalls`
--

CREATE TABLE IF NOT EXISTS `partyhalls` (
  `partyhall_id` int(5) NOT NULL AUTO_INCREMENT,
  `partyhall_name` varchar(45) NOT NULL,
  PRIMARY KEY (`partyhall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `partyhalls`
--

INSERT INTO `partyhalls` (`partyhall_id`, `partyhall_name`) VALUES
(1, 'SUVALSAR'),
(2, 'NAKO'),
(3, 'DASIR');

-- --------------------------------------------------------

--
-- Table structure for table `polls_details`
--

CREATE TABLE IF NOT EXISTS `polls_details` (
  `poll_id` int(15) NOT NULL AUTO_INCREMENT,
  `member_id` int(15) NOT NULL,
  `food_id` int(15) NOT NULL,
  `rate_id` int(5) NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `polls_details`
--

INSERT INTO `polls_details` (`poll_id`, `member_id`, `food_id`, `rate_id`) VALUES
(25, 17, 1, 1),
(26, 20, 4, 4),
(27, 20, 8, 5),
(28, 23, 1, 2),
(29, 22, 3, 3),
(30, 22, 1, 2),
(31, 22, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE IF NOT EXISTS `quantities` (
  `quantity_id` int(5) NOT NULL AUTO_INCREMENT,
  `quantity_value` int(5) NOT NULL,
  PRIMARY KEY (`quantity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`quantity_id`, `quantity_value`) VALUES
(1, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5),
(11, 6),
(12, 7),
(14, 8),
(15, 9),
(16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(5) NOT NULL AUTO_INCREMENT,
  `question_text` text NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`) VALUES
(1, 'your favorite food?'),
(2, 'What is your home town?'),
(3, 'What is your pet name?');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rate_id` int(5) NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(15) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rate_id`, `rate_name`) VALUES
(2, '5'),
(3, '4'),
(4, '3'),
(5, '2'),
(6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_details`
--

CREATE TABLE IF NOT EXISTS `reservations_details` (
  `ReservationID` int(15) NOT NULL AUTO_INCREMENT,
  `member_id` int(15) NOT NULL,
  `table_id` int(5) NOT NULL,
  `partyhall_id` int(5) NOT NULL,
  `Reserve_Date` date NOT NULL,
  `Reserve_Time` time NOT NULL,
  `StaffID` int(15) NOT NULL,
  `flag` int(1) NOT NULL,
  `table_flag` int(1) NOT NULL,
  `partyhall_flag` int(1) NOT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE IF NOT EXISTS `specials` (
  `special_id` int(15) NOT NULL AUTO_INCREMENT,
  `special_name` varchar(25) NOT NULL,
  `special_description` text NOT NULL,
  `special_price` float NOT NULL,
  `special_start_date` date NOT NULL,
  `special_end_date` date NOT NULL,
  `special_photo` varchar(45) NOT NULL,
  PRIMARY KEY (`special_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`special_id`, `special_name`, `special_description`, `special_price`, `special_start_date`, `special_end_date`, `special_photo`) VALUES
(7, 'Special ice-cream', 'tuti-futi', 100, '2013-11-09', '2013-11-16', 'ice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(15) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `Street_Address` text NOT NULL,
  `Mobile_Tel` varchar(20) NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(5) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(45) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`) VALUES
(1, 'G-001'),
(2, 'G-002'),
(3, 'G-003'),
(4, 'G-004'),
(5, 'F-001'),
(6, 'F-002'),
(7, 'F-003');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE IF NOT EXISTS `timezones` (
  `timezone_id` int(5) NOT NULL AUTO_INCREMENT,
  `timezone_reference` varchar(45) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`timezone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`timezone_id`, `timezone_reference`, `flag`) VALUES
(1, 'morning', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
