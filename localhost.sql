-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 03:34 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `msas_schema`
--
CREATE DATABASE `msas_schema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `msas_schema`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Title` varchar(255) DEFAULT NULL,
  `Message` text,
  `Datetime` datetime NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Title`, `Message`, `Datetime`, `ID`) VALUES
('I''m having trouble being Lorem Ipsum!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel ligula nulla. Cras tincidunt luctus convallis. Etiam aliquet urna quis eros condimentum nec convallis velit venenatis. Sed sem lacus, feugiat sit amet varius ut, ornare id leo. Donec nec sem leo, eget rutrum eros. Nam posuere est velit, nec vulputate orci. Donec mattis quam eu velit posuere id fringilla tortor venenatis.', '2013-02-03 02:25:00', 1),
('You got girl problems, I feel bad for you son', 'I got ninety-nine problems, but mySQL ain''t one.', '2013-02-13 00:00:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_reply`
--

CREATE TABLE IF NOT EXISTS `posts_has_reply` (
  `Posts_ID` int(11) NOT NULL,
  `Reply_ID` int(11) NOT NULL,
  PRIMARY KEY (`Posts_ID`,`Reply_ID`),
  KEY `fk_Posts_has_Reply_Reply1_idx` (`Reply_ID`),
  KEY `fk_Posts_has_Reply_Posts1_idx` (`Posts_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `Message` text,
  `Datetime` datetime DEFAULT NULL,
  `IsFromAdvisor` tinyint(1) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'student',
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `ID`) VALUES
('cat', 'd077f244def8a70e5ea758bd8352fcd8', 'student', 1),
('hello', '7813258ef8c6b632dde8cc80f6bda62f', 'student', 2),
('test', '098f6bcd4621d373cade4e832627b4f6', 'student', 3),
('zxc', '5fa72358f0b4fb4f2c5d7de8c9a41846', 'student', 5),
('', 'd41d8cd98f00b204e9800998ecf8427e', 'student', 6),
('sdf', 'd9729feb74992cc3482b350163a1a010', 'student', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_posts`
--

CREATE TABLE IF NOT EXISTS `users_has_posts` (
  `Users_ID` int(11) NOT NULL,
  `Posts_ID` int(11) NOT NULL,
  PRIMARY KEY (`Users_ID`,`Posts_ID`),
  KEY `fk_Users_has_Posts_Posts1_idx` (`Posts_ID`),
  KEY `fk_Users_has_Posts_Users_idx` (`Users_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_has_posts`
--

INSERT INTO `users_has_posts` (`Users_ID`, `Posts_ID`) VALUES
(2, 1),
(2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts_has_reply`
--
ALTER TABLE `posts_has_reply`
  ADD CONSTRAINT `fk_Posts_has_Reply_Posts1` FOREIGN KEY (`Posts_ID`) REFERENCES `posts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Posts_has_Reply_Reply1` FOREIGN KEY (`Reply_ID`) REFERENCES `reply` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_posts`
--
ALTER TABLE `users_has_posts`
  ADD CONSTRAINT `fk_Users_has_Posts_Users` FOREIGN KEY (`Users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Posts_Posts1` FOREIGN KEY (`Posts_ID`) REFERENCES `posts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
