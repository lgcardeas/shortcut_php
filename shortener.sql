-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 11:42 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_shortened` varchar(200) NOT NULL,
  `url_oficial` varchar(2000) NOT NULL,
  `counter` int(10) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_shortened` (`url_shortened`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `url_shortened`, `url_oficial`, `counter`, `date`, `user_email`) VALUES
(8, '1', 'http://www.google.com', 0, '2017-04-28 10:04:31', 'admin@gmail.com'),
(9, '9', 'http://www.facebook.com', 0, '2017-04-28 10:04:02', 'admin@gmail.com'),
(10, 'b', 'http://www.twitter.com', 1, '2017-04-28 10:04:57', 'lgcardenas@gmail.com'),
(11, 'c', 'https://ide50-lgcardenas91.cs50.io/phpmyadmin/tbl_row_action.php#PMAURL-9:tbl_structure.php?db=shortener&table=users&server=1&target=&token=dea0b5616e5703cdcf752a20bf4bdefa', 1, '2017-04-28 11:04:54', 'lgcardenas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `hash`) VALUES
(17, 'lgcardenas@gmail.com', 'username', '$2y$10$ztGHVmDZZvcMzund2hIVQebOn4hVMJgF2k3KII5iucSOYjm2FUbdy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
