-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2014 at 01:04 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `subject`, `topic`, `file`) VALUES
(26, 'SQL Tutorial', 'SQL PDF', 'sql_tutorial.pdf'),
(30, 'prog1', 'PDF Format', 'python_tutorial.pdf'),
(31, 'prog2', 'PDF Format', 'servlets_tutorial.pdf'),
(32, 'prog4', 'PDF Format', 'jsp_tutorial.pdf'),
(33, 'prog5', 'PDF Format', 'ruby_tutorial.pdf'),
(34, 'prog6', 'PDF Format', 'struts2_tutorial.pdf');
