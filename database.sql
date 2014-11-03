-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: devweb2014.cis.strath.ac.uk:3306
-- Generation Time: Nov 03, 2014 at 02:17 AM
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
(999, 'Test', 1);

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
(999, 998),
(999, 999);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`prodID`, `name`, `description`, `productImage`, `price`, `active`) VALUES
(998, 'Test', 'This an item for testing', '/images/product/default.jpg', 99.55, 1),
(999, 'Test Shirt', 'TEST', '/images/product/default.jpg', 50.99, 1);

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
