-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: devweb2014.cis.strath.ac.uk:3306
-- Generation Time: Dec 15, 2014 at 03:43 PM
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
(1, 'Humour', 1),
(2, 'Food', 1),
(3, 'Multipack', 1),
(4, 'Unisex', 1),
(5, 'Womens', 1),
(6, 'Mens', 1),
(7, 'Awesome', 1);

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
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 9),
(7, 10);

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
  `size` varchar(3) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`prodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10003 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`prodID`, `name`, `description`, `productImage`, `price`, `active`, `size`, `stock`) VALUES
(1, 'Offensive t-Shirt', 'This t-shirt will annoy your friends', '/images/product/001.png', 99.99, 1, 'S', 3),
(2, 'Cloud sick', 'Save tha planet!', '/images/product/002.jpg', 9999.10, 1, 'S', 0),
(3, 'Patrick made a friend ', 'Who''s riding a sloth under the sea?<br />\r\nPatrick Starfish!', '/images/product/003.png', 5.99, 1, 'S', 0),
(4, 'Alchemy ', 'Warning: Try not to lose your body due to equivalent exchange.', '/images/product/004.jpg', 5.99, 1, 'S', 0),
(5, 'Munchies', 'Need food?<br /> Why not M & M''s', '/images/product/005.png', 10.99, 1, 'S', 0),
(6, 'Triple Pack', 'Need more than one t-shirt?<br />Why not have 3!', '/images/product/006.jpg', 59.99, 1, 'S', 0),
(7, 'Generic T Shirt', 'Generic Blah Blah Blah', '/images/product/007.jpg', 10.99, 1, 'S', 0),
(8, 'Girls T Shirt', 'All girly and stuff', '/images/product/008.jpg', 11.99, 1, 'S', 0),
(9, 'Manly Man''s T Shirt', 'Are you man enough for the t shirt?', '/images/product/009.png', 99.99, 1, 'S', 0),
(10, 'Awesome T Shirt', 'EVERYTHING IS AWESOME!', '/images/product/010.jpg', 50.53, 1, 'S', 0),
(11, 'Offensive t-Shirt', 'This t-shirt will annoy your friends', '/images/product/001.png', 99.99, 0, 'M', 50),
(12, 'Cloud sick', 'Save tha planet!', '/images/product/002.jpg', 9.10, 0, 'M', 50),
(13, 'Patrick made a friend ', 'Who''s riding a sloth under the sea?<br />Patrick Starfish!', '/images/product/003.png', 5.99, 0, 'M', 50),
(14, 'Alchemy ', 'Warning: Try not to lose your body due to equivalent exchange.', '/images/product/004.jpg', 5.99, 0, 'M', 50),
(15, 'Munchies', 'Need food?<br /> Why not M & M''s', '/images/product/005.png', 10.99, 0, 'M', 50),
(16, 'Triple Pack', 'Need more than one t-shirt?<br />Why not have 3!', '/images/product/006.jpg', 59.99, 0, 'M', 50),
(17, 'Generic T Shirt', 'Generic Blah Blah Blah', '/images/product/007.jpg', 10.99, 0, 'M', 50),
(18, 'Girls T Shirt', 'All girly and stuff', '/images/product/008.jpg', 11.99, 0, 'M', 50),
(19, 'Manly Man''s T Shirt', 'Are you man enough for the t shirt?', '/images/product/009.png', 99.99, 0, 'M', 50),
(20, 'Awesome T Shirt', 'EVERYTHING IS AWESOME!', '/images/product/010.jpg', 50.53, 0, 'M', 50),
(21, 'Offensive t-Shirt', 'This t-shirt will annoy your friends', '/images/product/001.png', 99.99, 0, 'L', 50),
(22, 'Cloud sick', 'Save tha planet!', '/images/product/002.jpg', 9999.10, 0, 'L', 50),
(23, 'Patrick made a friend ', 'Who''s riding a sloth under the sea?<br />\r\nPatrick Starfish!', '/images/product/003.png', 5.99, 0, 'L', 50),
(24, 'Alchemy ', 'Warning: Try not to lose your body due to equivalent exchange.', '/images/product/004.jpg', 5.99, 0, 'L', 50),
(25, 'Munchies', 'Need food?<br /> Why not M & M''s', '/images/product/005.png', 10.99, 0, 'L', 50),
(26, 'Triple Pack', 'Need more than one t-shirt?<br />Why not have 3!', '/images/product/006.jpg', 59.99, 0, 'L', 50),
(27, 'Generic T Shirt', 'Generic Blah Blah Blah', '/images/product/007.jpg', 10.99, 0, 'L', 50),
(28, 'Girls T Shirt', 'All girly and stuff', '/images/product/008.jpg', 11.99, 0, 'L', 50),
(29, 'Manly Man''s T Shirt', 'Are you man enough for the t shirt?', '/images/product/009.png', 99.99, 0, 'L', 50),
(30, 'Awesome T Shirt', 'EVERYTHING IS AWESOME!', '/images/product/010.jpg', 50.53, 0, 'L', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `prodID` int(11) NOT NULL,
  `size` tinyint(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `final` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderID`,`prodID`),
  KEY `prodID` (`prodID`),
  KEY `orderID` (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `prodID`, `size`, `quantity`, `final`) VALUES
(1, 1, 4, 5, 0),
(2, 1, 4, 5, 1);

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
-- Table structure for table `size_stock`
--

DROP TABLE IF EXISTS `size_stock`;
CREATE TABLE IF NOT EXISTS `size_stock` (
  `prodID` int(11) NOT NULL,
  `size` varchar(1) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`prodID`,`size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_stock`
--

INSERT INTO `size_stock` (`prodID`, `size`, `stock`) VALUES
(1, 'L', 15),
(1, 'M', 64),
(1, 'S', 12),
(2, 'L', 25),
(2, 'M', 50),
(2, 'S', 88),
(3, 'L', 91),
(3, 'M', 21),
(3, 'S', 4),
(4, 'L', 3),
(4, 'M', 0),
(4, 'S', 35),
(5, 'L', 3),
(5, 'M', 38),
(5, 'S', 9),
(6, 'L', 85),
(6, 'M', 25),
(6, 'S', 1),
(7, 'L', 12),
(7, 'M', 57),
(7, 'S', 62),
(8, 'L', 75),
(8, 'M', 27),
(8, 'S', 12),
(9, 'L', 66),
(9, 'M', 74),
(9, 'S', 70),
(10, 'L', 0),
(10, 'M', 67),
(10, 'S', 82);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `ID` varchar(5) NOT NULL,
  `valBig` int(11) NOT NULL,
  `valSmall` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `valBig`, `valSmall`) VALUES
('admzn', 45, 447);

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
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `sessionID`, `active`) VALUES
(1, 'Test', 'cceb2a1b8b2c8c2c278579d1087acceaae9d5504 ', '5pEH45ANRJub5eE36VMPvHioDIq2dE4j', 1),
(2, 'adamus1red@gmail.com', 'e234e426ec3a594af85b9a0e1513b093a25a65e2', 'Jq4wUHPufU85pWUkI1oV3b5HFwNhori8', 1),
(3, 'adam@mcghie.eu', 'bf91f2c5b335d545208ff8d11eb89da0d3bac925', 'mXDQSpCN6C8Dof80ZjVBcoN1kCV0ujcR', 1),
(4, 'johnsmith@hotmail.com', '5870a4007ae6278b2f3b2000bcc59c02e39417c7', 'DOUV30HJOW4OvRGy14PXWqvXK2iLmSx0', 1),
(7, '2tommax+crap@gmail.com', '21e40c252f3e1b428c773330a37ba5ca2523bf54', 'kNEYs5M5AMQv2UrcHBSwyzl8n9xbtS9O', 1),
(8, 'thomas@sinclair.com', 'cb5fbaa29c83821de20670c186e84ecca8f1754d', 'DYifN0ZRfkHe9yQC1MZotpPObdpZNXSq', 1),
(9, 'test@help.com', 'cbbb17a622d46be25cca2c173f890fbe7954ac4b', 'nRiPp0419Blh86mBEPkm6lfENfmz4eXr', 1),
(10, 'Test@gmail.com', 'bf91f2c5b335d545208ff8d11eb89da0d3bac925', '6YGIKfGgOY9f3MqngqAM0TLOcrM9NlKU', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_cat`
--
ALTER TABLE `is_cat`
  ADD CONSTRAINT `is_cat_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `items` (`prodID`),
  ADD CONSTRAINT `is_cat_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);

--
-- Constraints for table `size_stock`
--
ALTER TABLE `size_stock`
  ADD CONSTRAINT `prodID` FOREIGN KEY (`prodID`) REFERENCES `items` (`prodID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
