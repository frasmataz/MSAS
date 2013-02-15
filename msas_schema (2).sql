-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2013 at 07:33 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Title` varchar(255) DEFAULT NULL,
  `Message` text,
  `Datetime` datetime NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Users_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Users_ID` (`Users_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Title`, `Message`, `Datetime`, `ID`, `Users_ID`) VALUES
('Hello world', 'test posts test posts', '2013-02-14 16:23:40', 2, 13),
('lnhkj', ' cfhgjnl', '2013-02-14 16:55:33', 6, 13),
('', 'dfgb', '2013-02-15 18:45:13', 8, 13),
('Hello world, I am a cat', 'My issues are things like wool and mice and catnip and stuff.  It''s becoming a real problem.', '2013-02-15 19:28:09', 9, 14);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `Message` text,
  `Datetime` datetime DEFAULT NULL,
  `IsFromAdvisor` tinyint(1) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Posts_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Posts_ID` (`Posts_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`Message`, `Datetime`, `IsFromAdvisor`, `ID`, `Posts_ID`) VALUES
('test reply to myself\r\n\r\nHELLO WORLD', '2013-02-14 16:24:18', 0, 4, 2),
('dfhdfdfh', '2013-02-15 19:15:22', 0, 5, 2),
('vbnvbn', '2013-02-15 19:19:20', 0, 6, 2),
('sdfsdf', '2013-02-15 19:23:32', 0, 7, 2),
('sdfsdf', '2013-02-15 19:25:16', 1, 8, 2),
('I don''t think I completely believe you.  Being a cat would be awesome.', '2013-02-15 19:28:40', 1, 9, 9),
('Well that''s just like.. your opinion man.', '2013-02-15 19:29:10', 0, 10, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `ID`) VALUES
('advisor', 'a33c7303d4bc3322700a0f53787677c5', 'advisor', 8),
('anotheruser', '9dcbcc5d394eae2ee7d42bbed87d2e03', 'student', 11),
('davesmith', '63ccdf1c2cc061f2ce1f389516fbee52', 'student', 12),
('hello', '5d41402abc4b2a76b9719d911017c592', 'student', 13),
('cat', 'd077f244def8a70e5ea758bd8352fcd8', 'student', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Users_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`Posts_ID`) REFERENCES `posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
