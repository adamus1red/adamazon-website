-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: devweb2014.cis.strath.ac.uk:3306
-- Generation Time: Dec 08, 2014 at 05:48 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rjb12180`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`, `active`) VALUES
(1, 'Offensive t-shirts', 1),
(2, 'Pop Culture', 1),
(999, 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `is_cat`
--

DROP TABLE IF EXISTS `is_cat`;
CREATE TABLE IF NOT EXISTS `is_cat` (
  `catID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  PRIMARY KEY (`catID`,`prodID`),
  KEY `catID` (`catID`),
  KEY `prodID` (`prodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_cat`
--

INSERT INTO `is_cat` (`catID`, `prodID`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 3),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `prodID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `productImage` varchar(255) NOT NULL DEFAULT '/images/product/default.jpg',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1003 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`prodID`, `name`, `description`, `productImage`, `price`, `active`) VALUES
(1, 'Offensive t-Shirt', 'This t-shirt will annoy your friends', '/images/product/001.png', 99.99, 1),
(2, 'Cloud sick', 'Save tha planet!', '/images/product/002.jpg', 9999.10, 1),
(3, 'Patrick made a friend ', 'Who''s riding a sloth under the sea?<br />\r\nPatrick Starfish!', '/images/product/003.png', 5.99, 1),
(4, 'Alchemy ', 'Warning: Try not to lose your body due to equivalent exchange.', '/images/product/004.jpg', 5.99, 1),
(5, 'Munchies', 'Need food?<br /> Why not M & M''s', '/images/product/005.png', 10.99, 1),
(6, 'Triple Pack', 'Need more than one t-shirt?<br />Why not have 3!', '/images/product/006.jpg', 59.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `prodID` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `final` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderID`,`prodID`),
  KEY `prodID` (`prodID`),
  KEY `orderID` (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `prodID`, `quantity`, `final`) VALUES
(1, 1, 5, 0),
(1, 999, 1, 0),
(2, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

DROP TABLE IF EXISTS `ordered`;
CREATE TABLE IF NOT EXISTS `ordered` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderID`,`userID`),
  UNIQUE KEY `orderID` (`orderID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`orderID`, `userID`, `total`) VALUES
(1, 1, 500.00),
(2, 1, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sessionID` varchar(34) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `sessionID`, `active`) VALUES
(1, 'Test', 'cceb2a1b8b2c8c2c278579d1087acceaae9d5504 ', 'bF0NirK6eUfHUVy598DlClqt7qVlSw93', 1),
(2, 'adam@mcghie.eu', 'bf91f2c5b335d545208ff8d11eb89da0d3bac925', NULL, 0),
(3, 'adamus1red@gmail.com', 'bf91f2c5b335d545208ff8d11eb89da0d3bac925', 'mBylhfIVMBTNYXrLLdbXe2MDgHkP7Dst', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_cat`
--
ALTER TABLE `is_cat`
  ADD CONSTRAINT `is_cat_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `items` (`prodID`),
  ADD CONSTRAINT `is_cat_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
