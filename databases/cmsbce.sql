-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 04:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsbce`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendancestaff`
--

CREATE TABLE IF NOT EXISTS `attendancestaff` (
  `attempID` int(10) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `attempdate` date NOT NULL,
  `attempstatus` tinyint(4) NOT NULL,
  `attempremarks` varchar(250) NOT NULL,
  PRIMARY KEY (`attempID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `attendancestaff`
--

INSERT INTO `attendancestaff` (`attempID`, `empID`, `attempdate`, `attempstatus`, `attempremarks`) VALUES
(1, 'E0001', '2017-12-07', 1, ''),
(2, 'E0002', '2017-12-07', 1, ''),
(3, 'E0005', '2017-12-07', 1, ''),
(4, 'E0006', '2017-12-07', 2, ''),
(5, 'E0007', '2017-12-07', 1, ''),
(6, 'E0001', '2017-12-12', 1, ''),
(7, 'E0002', '2017-12-12', 1, ''),
(8, 'E0005', '2017-12-12', 2, ''),
(9, 'E0006', '2017-12-12', 1, ''),
(10, 'E0007', '2017-12-12', 1, ''),
(11, 'E0001', '2017-12-23', 1, ''),
(12, 'E0002', '2017-12-23', 1, ''),
(13, 'E0005', '2017-12-23', 1, ''),
(14, 'E0006', '2017-12-23', 1, ''),
(15, 'E0007', '2017-12-23', 1, ''),
(16, 'E0001', '2017-12-26', 1, ''),
(17, 'E0002', '2017-12-26', 1, ''),
(18, 'E0005', '2017-12-26', 1, ''),
(19, 'E0006', '2017-12-26', 1, ''),
(20, 'E0007', '2017-12-26', 1, ''),
(21, 'E0001', '2017-12-28', 1, ''),
(22, 'E0002', '2017-12-28', 1, ''),
(23, 'E0005', '2017-12-28', 2, ''),
(24, 'E0006', '2017-12-28', 1, ''),
(25, 'E0007', '2017-12-28', 1, ''),
(26, 'E0001', '2018-01-25', 1, ''),
(27, 'E0002', '2018-01-25', 2, ''),
(28, 'E0005', '2018-01-25', 1, ''),
(29, 'E0006', '2018-01-25', 1, ''),
(30, 'E0007', '2018-01-25', 1, ''),
(31, 'E0008', '2018-01-25', 1, ''),
(32, 'E009', '2018-01-25', 1, ''),
(33, 'E0001', '2019-03-12', 2, ''),
(34, 'E0002', '2019-03-12', 1, ''),
(35, 'E0005', '2019-03-12', 1, ''),
(36, 'E0007', '2019-03-12', 1, ''),
(37, 'E0009', '2019-03-12', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendancestu`
--

CREATE TABLE IF NOT EXISTS `attendancestu` (
  `attstuID` int(10) NOT NULL AUTO_INCREMENT,
  `enrollID` varchar(50) CHARACTER SET utf8 NOT NULL,
  `attstustatus` tinyint(4) NOT NULL,
  `attstudate` date NOT NULL,
  `attremark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`attstuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `attendancestu`
--

INSERT INTO `attendancestu` (`attstuID`, `enrollID`, `attstustatus`, `attstudate`, `attremark`) VALUES
(1, 'HBCA00002', 1, '2017-11-26', ''),
(2, 'HBCA00001', 1, '2017-11-26', ''),
(3, 'HBCA00003', 1, '2017-11-26', ''),
(4, 'HBCA00002', 1, '2017-11-27', ''),
(5, 'HBCA00001', 1, '2017-11-27', ''),
(6, 'HBCA00003', 1, '2017-11-27', ''),
(7, 'HBCA00002', 1, '2017-11-28', ''),
(8, 'HBCA00004', 1, '2017-11-28', ''),
(9, 'HBCA00005', 1, '2017-11-28', ''),
(10, 'HBCA00001', 2, '2017-11-28', ''),
(11, 'HBCA00001', 1, '2017-12-25', ''),
(12, 'HBCA00002', 1, '2017-12-28', ''),
(13, 'HBCA00004', 2, '2017-12-28', ''),
(14, 'HBCA00005', 2, '2017-12-28', ''),
(15, 'HBCA00016', 1, '2017-12-28', ''),
(16, 'HBCA00001', 1, '2017-12-29', ''),
(17, 'HBCA00010', 1, '2017-12-29', ''),
(18, 'HBCA00011', 2, '2017-12-29', ''),
(19, 'HBCA00013', 1, '2017-12-29', ''),
(20, 'HBCA00014', 2, '2017-12-29', ''),
(21, 'HBCA00019', 1, '2017-12-29', ''),
(22, 'HBCA00021', 1, '2017-12-29', ''),
(23, 'HBCA00002', 1, '2017-12-29', ''),
(24, 'HBCA00004', 2, '2017-12-29', ''),
(25, 'HBCA00005', 1, '2017-12-29', ''),
(26, 'KYBCE00016', 2, '2017-12-29', ''),
(27, 'KYBCE00008', 1, '2017-12-29', ''),
(28, 'KYBCE00001', 1, '2017-12-30', ''),
(29, 'KYBCE00002', 2, '2017-12-30', ''),
(30, 'KYBCE00003', 1, '2017-12-30', ''),
(31, 'KYBCE00005', 1, '2018-01-25', ''),
(32, 'KYBCE00006', 1, '2018-01-25', ''),
(33, 'HBCA00001', 1, '2019-03-12', ''),
(34, 'HBCA00002', 1, '2019-03-12', ''),
(35, 'HBCA00003', 2, '2019-03-12', ''),
(36, 'HBCA00014', 1, '2019-03-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `batchID` varchar(10) NOT NULL,
  `batchsize` int(10) NOT NULL,
  `batchstatus` tinyint(4) NOT NULL,
  `batchremark` varchar(200) NOT NULL,
  `couID` varchar(10) NOT NULL,
  `lecId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`batchID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batchID`, `batchsize`, `batchstatus`, `batchremark`, `couID`, `lecId`) VALUES
(1, 'B0001', 25, 1, '', 'CRS0001', 'E0002'),
(2, 'B0002', 10, 0, '', 'CRS0002', 'E0002'),
(3, 'B0003', 20, 1, '', 'CRS0002', 'E0002'),
(4, 'B0004', 10, 1, '', 'CRS0003', 'E0002'),
(5, 'B0005', 10, 1, '', 'CRS0004', 'E0002'),
(6, 'B0006', 25, 1, '', 'CRS0001', 'E0002'),
(7, 'B0007', 10, 1, '', 'CRS0005', NULL),
(8, 'B0008', 25, 1, '', 'CRS0006', NULL),
(11, 'B0009', 20, 1, '', 'CRS0007', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `clroomID` int(10) NOT NULL AUTO_INCREMENT,
  `clroomname` varchar(30) NOT NULL,
  `clroomlocation` varchar(50) NOT NULL,
  `clroomsize` int(50) NOT NULL,
  `clroomstatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`clroomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`clroomID`, `clroomname`, `clroomlocation`, `clroomsize`, `clroomstatus`) VALUES
(1, 'Classroom 1', '1', 25, 1),
(2, 'Classroom 2', '1', 25, 1),
(3, 'Classroom 3', '1', 25, 0),
(4, 'Classroom 4', '2', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `couID` varchar(10) NOT NULL,
  `couname` varchar(100) NOT NULL,
  `coutitle` varchar(10) NOT NULL,
  `couduration` varchar(50) NOT NULL,
  `coutype` tinyint(4) NOT NULL,
  `couaddfee` decimal(10,2) NOT NULL,
  `coufee` decimal(10,2) NOT NULL,
  `coudescription` varchar(250) NOT NULL,
  PRIMARY KEY (`couID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `couID`, `couname`, `coutitle`, `couduration`, `coutype`, `couaddfee`, `coufee`, `coudescription`) VALUES
(1, 'CRS0001', 'Diploma in English', 'English', '6', 1, 2000.00, 18000.00, ''),
(2, 'CRS0002', 'Diploma in Sinhala', 'Sinhala', '4', 1, 2000.00, 28000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `empcode` varchar(50) NOT NULL,
  `empfname` varchar(100) NOT NULL,
  `emplname` varchar(100) NOT NULL,
  `empepfno` varchar(50) NOT NULL,
  `empjob` varchar(50) NOT NULL,
  `empdepartment` tinyint(4) NOT NULL,
  `empdoj` date NOT NULL,
  `empdob` date NOT NULL,
  `empnic` varchar(12) NOT NULL,
  `empgender` tinyint(4) NOT NULL,
  `empcivil` tinyint(4) NOT NULL,
  `empadd` varchar(100) NOT NULL,
  `empcity` varchar(50) NOT NULL,
  `empland` varchar(12) NOT NULL,
  `empmobile` varchar(12) NOT NULL,
  `empemail` varchar(100) NOT NULL,
  `empstatus` tinyint(4) NOT NULL,
  `emptype` tinyint(4) NOT NULL,
  PRIMARY KEY (`empcode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empcode`, `empfname`, `emplname`, `empepfno`, `empjob`, `empdepartment`, `empdoj`, `empdob`, `empnic`, `empgender`, `empcivil`, `empadd`, `empcity`, `empland`, `empmobile`, `empemail`, `empstatus`, `emptype`) VALUES
(1, 'E0001', 'Kamal', 'Ekanayake', '100', '1', 1, '2017-12-26', '1990-01-01', '905845698V', 0, 0, '2, Kandy Road, Peradeniya', 'Peradeniya', '0812452267', '0771234567', 'kamal@gmail.com', 1, 1),
(2, 'E0002', 'Saman', 'Kumara', '121', '2', 2, '2017-12-26', '1986-10-11', '869585487V', 1, 1, '2, Wattegama Road, Ukwala', 'Matale', '0662548965', '0725896554', 'saman@gmail.com', 1, 2),
(3, 'E0003', 'Kumudhu', 'Nilanka', '110', '4', 2, '2017-12-26', '1989-05-01', '896598456V', 0, 1, '2, Temple Road, Gampola', 'Kandy', '0812569874', '0715698565', 'kumudu@yahoo.com', 0, 4),
(4, 'E0004', 'Chathu', 'Charumadi', '150', '4', 1, '2017-12-26', '1987-09-20', '877450856V', 0, 0, '212/A, Kandy lake Road, Ampitiya', 'Kandy', '0812475698', '0782569458', 'charu@gmail.com', 0, 3),
(5, 'E0005', 'Radha', 'Radhi', '222', '3', 1, '2017-11-07', '1984-06-12', '845698452V', 0, 1, '2, jaffna', 'Jaffna', '0564856985', '0772569885', 'radharadhi@hotmail.com', 1, 3),
(6, 'E0007', 'Ahmadh', 'Munzir', '30', '2', 2, '2017-11-16', '1997-11-01', '972568954V', 0, 0, '30, Madawala', 'Kandy', '0815698745', '0772369554', 'munzir@gmail.com', 1, 2),
(7, 'E0009', 'Champika ', 'Kumari', '125', '2', 2, '2017-12-22', '1984-08-13', '846592456V', 0, 0, '23, Madapola Rd, Teldeniya', 'Teldeniya', '0813569874', '0772659886', 'champi@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `enrollID` varchar(50) NOT NULL,
  `stuID` varchar(50) NOT NULL,
  `batchID` varchar(10) NOT NULL,
  `couID` varchar(10) NOT NULL,
  `dfee` decimal(10,2) NOT NULL,
  `netamnt` decimal(10,2) NOT NULL,
  `paidamount` decimal(10,2) NOT NULL,
  `balanceamnt` decimal(10,2) NOT NULL,
  `regdate` date NOT NULL,
  `is_cancel` varchar(10) NOT NULL,
  PRIMARY KEY (`enrollID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollID`, `stuID`, `batchID`, `couID`, `dfee`, `netamnt`, `paidamount`, `balanceamnt`, `regdate`, `is_cancel`) VALUES
('HBCA00001', 'CH1700001', 'B0001', 'CRS0001', 0.00, 20000.00, 8000.00, 12000.00, '2017-11-29', ''),
('HBCA00002', 'CH1700002', 'B0001', 'CRS0001', 1000.00, 19000.00, 2000.00, 17000.00, '2017-12-05', ''),
('HBCA00003', 'CH1700003', 'B0001', 'CRS0001', 1000.00, 19000.00, 12000.00, 11000.00, '2017-11-15', ''),
('HBCA00004', 'CH1700004', 'B0008', 'CRS0002', 2000.00, 23000.00, 4000.00, 19000.00, '2017-12-13', ''),
('HBCA00005', 'CH1700005', 'B0003', 'CRS0002', 2000.00, 28000.00, 4000.00, 24000.00, '2017-12-24', ''),
('HBCA00006', 'CH1700006', 'B0003', 'CRS0002', 2000.00, 28000.00, 21000.00, 7000.00, '2017-12-23', ''),
('HBCA00007', 'CH1700007', 'B0005', 'CRS0002', 0.00, 17000.00, 4000.00, 13000.00, '2017-12-29', ''),
('HBCA00008', 'CH1700008', 'B0006', 'CRS0001', 2000.00, 18000.00, 8000.00, 10000.00, '2017-12-29', ''),
('HBCA00009', 'CH1700009', 'B0009', 'CRS0002', 2000.00, 23000.00, 0.00, 0.00, '2017-12-30', ''),
('HBCA00010', 'BCE0009', 'B0003', 'CRS0002', 0.00, 30000.00, 10000.00, 20000.00, '2019-03-03', ''),
('HBCA00011', 'CH1700009', 'B0003', 'CRS0002', 2000.00, 28000.00, 2000.00, 26000.00, '2019-03-03', ''),
('HBCA00012', 'CH1700003', 'B0006', 'CRS0001', 5000.00, 15000.00, 5000.00, 10000.00, '2019-03-03', ''),
('HBCA00013', 'BCE0009', 'B0003', 'CRS0001', 5000.00, 25000.00, 0.00, 0.00, '2019-03-03', ''),
('HBCA00014', 'CH170009', 'B0001', 'CRS0001', 5000.00, 15000.00, 5000.00, -5000.00, '2019-03-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `examID` int(10) NOT NULL AUTO_INCREMENT,
  `examtype` tinyint(4) NOT NULL,
  `paper` mediumblob NOT NULL,
  `examduration` varchar(50) NOT NULL,
  `exammarks` int(50) NOT NULL,
  `couID` varchar(10) NOT NULL,
  PRIMARY KEY (`examID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examID`, `examtype`, `paper`, `examduration`, `exammarks`, `couID`) VALUES
(1, 1, '', '2', 40, 'CRS0001'),
(2, 2, '', '1', 60, 'CRS0001'),
(3, 1, '', '2', 40, 'CRS0002'),
(4, 2, '', '2', 60, 'CRS0002');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payID` int(10) NOT NULL AUTO_INCREMENT,
  `invoiceno` varchar(200) NOT NULL,
  `paydate` date NOT NULL,
  `payby` varchar(10) NOT NULL,
  `enrollID` varchar(50) DEFAULT NULL,
  `payamount` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`payID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payID`, `invoiceno`, `paydate`, `payby`, `enrollID`, `payamount`) VALUES
(1, 'K-INV-00001', '2017-11-29', 'kamal', 'HBCA00001', 2000.00),
(2, 'K-INV-00002', '2017-12-05', 'Kamal', 'HBCA00002', 2000.00),
(3, 'K-INV-00003', '2017-11-15', 'radhi', 'HBCA00003', 5000.00),
(4, 'K-INV-00004', '2017-12-13', 'saman', 'HBCA00004', 3000.00),
(5, 'K-INV-00005', '2017-12-24', 'kamal', 'HBCA00005', 2000.00),
(6, 'K-INV-00006', '2017-12-23', 'kamal', 'HBCA00006', 8000.00),
(7, 'K-INV-00007', '2017-12-29', 'saman', 'HBCA00007', 2000.00),
(8, 'K-INV-00008', '2017-12-29', 'kamal', 'HBCA00008', 8000.00),
(9, 'K-INV-0009', '2017-12-29', 'kamal', 'HBCA00001', 3000.00),
(10, 'K-INV-00010', '2017-12-29', 'kamal', 'HBCA00003', 3000.00),
(11, 'K-INV-00010', '2017-12-30', 'Saman', 'HBCA00009', 5000.00),
(12, 'K-INV-00010', '2017-12-30', 'kamal', 'HBCA00009', 3000.00),
(13, 'K-INV-00010', '2017-12-30', 'saman', 'HBCA00001', 3000.00),
(14, 'K-INV-00010', '2017-12-30', 'kamal', 'HBCA00009', 3000.00),
(15, 'K-INV-00010', '2017-12-30', 'kamal', 'HBCA00004', 1000.00),
(16, 'K-INV-00010', '2017-12-30', 'KAMAL', 'HBCA00006', 8000.00),
(17, 'K-INV-00010', '2017-12-30', 'kamal', 'HBCA00006', 2000.00),
(18, 'K-INV-00010', '2017-12-30', 'kamal', 'HBCA00006', 3000.00),
(19, 'K-INV-00010', '2018-02-21', 'abc', 'HBCA00009', 5000.00),
(20, 'K-INV-00010', '2018-02-21', 'abc', 'HBCA00007', 2000.00),
(21, 'K-INV-00010', '2019-03-02', 'kamal', 'HBCA00003', 2000.00),
(22, 'K-INV-00010', '2019-03-02', 'kamal', 'HBCA00003', 2000.00),
(23, 'K-INV-00010', '2019-03-03', 'kamal', 'HBCA00010', 10000.00),
(24, 'K-INV-00010', '2019-03-03', 'kamal', 'HBCA00011', 2000.00),
(25, 'K-INV-00010', '2019-03-03', 'kamal', 'HBCA00012', 5000.00),
(26, 'K-INV-00010', '2019-03-03', 'kamal', 'HBCA00014', 5000.00),
(27, 'K-INV-00010', '2019-03-12', 'kamal', 'HBCA00005', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `resultID` int(10) NOT NULL AUTO_INCREMENT,
  `stuID` varchar(50) NOT NULL,
  `enrollID` varchar(50) NOT NULL,
  `batchID` varchar(10) NOT NULL,
  `couID` varchar(10) NOT NULL,
  `examtype` varchar(10) NOT NULL,
  `marks` int(10) NOT NULL,
  `examdate` date NOT NULL,
  PRIMARY KEY (`resultID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultID`, `stuID`, `enrollID`, `batchID`, `couID`, `examtype`, `marks`, `examdate`) VALUES
(1, '', 'HBCA00001', 'B0001', 'CRS0001', 'Written', 68, '2017-12-30'),
(2, '', 'HBCA00002', 'B0001', 'CRS0001', 'Written', 85, '2017-12-30'),
(3, '', 'HBCA00003', 'B0001', 'CRS0001', 'Written', 90, '2017-12-30'),
(4, '', 'HBCA00001', 'B0001', 'CRS0001', 'Oral', 65, '2017-12-30'),
(5, '', 'HBCA00002', 'B0001', 'CRS0001', 'Oral', 56, '2017-12-30'),
(6, '', 'HBCA00003', 'B0001', 'CRS0001', 'Oral', 96, '2017-12-30'),
(7, '', 'HBCA00004', 'B0008', 'CRS0002', 'Oral', 56, '2017-12-30'),
(8, '', 'HBCA00004', 'B0008', 'CRS0002', 'Written', 69, '2017-12-30'),
(9, '', 'HBCA00008', 'B0006', 'CRS0001', 'Oral', 68, '2017-12-30'),
(10, '', 'HBCA00008', 'B0006', 'CRS0001', 'Written', 86, '2017-12-30'),
(11, '', 'HBCA00005', 'B0003', 'CRS0002', 'Written', 69, '0000-00-00'),
(12, '', 'HBCA00006', 'B0003', 'CRS0002', 'Written', 85, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `shedule`
--

CREATE TABLE IF NOT EXISTS `shedule` (
  `schID` int(10) NOT NULL AUTO_INCREMENT,
  `schtype` varchar(50) NOT NULL,
  `examtype` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time DEFAULT NULL,
  `batchID` varchar(10) NOT NULL,
  `clroomID` varchar(30) NOT NULL,
  `lecID` varchar(10) NOT NULL,
  `schstatus` int(10) DEFAULT NULL,
  PRIMARY KEY (`schID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `shedule`
--

INSERT INTO `shedule` (`schID`, `schtype`, `examtype`, `date`, `starttime`, `endtime`, `batchID`, `clroomID`, `lecID`, `schstatus`) VALUES
(13, 'Exam', '1', '2017-11-29', '09:00:00', '12:00:00', 'B0001', 'Classroom 1', 'E0002', 1),
(16, 'Exam', '1', '2017-11-30', '12:00:00', '12:00:00', 'B0005', 'Classroom 2', 'E0006', 1),
(18, 'Class', '', '2017-12-03', '09:00:00', '11:00:00', 'B0004', 'Classroom 2', 'E0006', 1),
(19, 'Class', '', '2017-12-24', '09:00:00', '11:00:00', 'B0001', 'Classroom 1', 'E0002', 1),
(20, 'Class', '', '2017-12-30', '10:00:00', '12:00:00', 'B0003', 'Classroom 2', 'E0006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stucode` varchar(50) NOT NULL,
  `stuinitialname` varchar(50) NOT NULL,
  `stufname` varchar(100) NOT NULL,
  `stulname` varchar(100) NOT NULL,
  `stuaddress` varchar(200) NOT NULL,
  `stucity` varchar(50) NOT NULL,
  `stunic` varchar(12) NOT NULL,
  `stugender` tinyint(4) NOT NULL,
  `studob` date NOT NULL,
  `stumobile` varchar(12) NOT NULL,
  `stuland` varchar(12) NOT NULL,
  `stuemail` varchar(100) NOT NULL,
  PRIMARY KEY (`stucode`),
  UNIQUE KEY `stucode` (`stucode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stucode`, `stuinitialname`, `stufname`, `stulname`, `stuaddress`, `stucity`, `stunic`, `stugender`, `studob`, `stumobile`, `stuland`, `stuemail`) VALUES
(19, 'BCE0009', 'R.rock', 'Rockey', 'rock', 'kandy,kandy', 'kandy', '966532678V', 1, '2019-03-02', '0187542396', '0812563215', 'rocky@gmail.com'),
(1, 'CH1700001', 'G.U. Madhusankani', 'Udheshika', 'Madhusankani', '23, Digana', 'Kandy', '876954658V', 0, '1987-10-03', '0771234567', '0811234567', 'udhe@gmail.com'),
(2, 'CH1700002', 'A. Kumar', 'Arun', 'Kumar', '30, Galle', 'Galle', '896541237V', 127, '0000-00-00', '0771234556', '0811234567', 'arunk@yahoo.com'),
(3, 'CH1700003', 'M.M. Munzir', 'Mohammad', 'Munzir', '30, Wattegama Road, Madawala', 'Kandy', '965485725V', 1, '1996-01-29', '0771112223', '0812223333', 'mun@gmail.com'),
(4, 'CH1700004', 'A.M. Francis', 'Ashini', 'Francis', '2, Nawalapitiya', 'Nawalapitiya', '905869458V', 0, '0000-00-00', '0772356998', '0812475698', 'ashini@gmail.com'),
(5, 'CH1700005', 'M.F. Zeena', 'Fathima', 'Zeena', '21, Madawala Rd, Kandy', 'Kandy', '895645856V', 0, '1989-02-07', '0712365998', '0815698456', 'zeena@gmail.com'),
(6, 'CH1700006', 'E.M.K.L. Bandaranayake ', 'Lalith ', 'Bandaranayake', '25, Medhamahanuwara, Digana', 'Kandy', '925862159V', 1, '1992-10-03', '0721563226', '0813569485', 'lalith@yahoo.com'),
(7, 'CH1700007', 'S. Simbu', 'Sham', 'Simbu', '52, Matale Road, Matale', 'Matale', '908562158V', 1, '1990-12-07', '0772659886', '0812659874', 'samrock@gmail.com'),
(8, 'CH1700008', 'M.A.F. Asna', 'Fathima', 'Asna', '25, Nittambuwa Road, Kandy', 'Kandy', '952654856V', 0, '1995-06-20', '0777256998', '0816598456', 'asnafathi@gmail.com'),
(9, 'CH1700009', 'E.M.G.G.S. Kavisekara', 'Sulakshana', 'Kavisekara', '32, Pilawala, Menikkinna', 'Kandy', '946598569V', 0, '1994-06-28', '0715698566', '0815698756', 'sula@gmail.com'),
(11, 'CH170001', 'V. Vinotharasa', 'Vinoja', 'Vinothrasa', 'Manthuvil East, Kodikamam', 'Jaffna', '986483616V', 0, '1998-05-27', '0771234567', '0811234567', 'vinoja@gmail.com'),
(10, 'CH1700010', 'A.R. Wickramanayaka', 'Aruna Rasanga', 'Wickramanayaka', '32/1, Palangoda, Ratnapura', 'Ratnapura', '896592589V', 1, '1989-03-08', '0776985663', '0356985624', 'aruna@gmail.com'),
(12, 'CH170002', 'A. Kumar', 'Arun', 'Kumar', 'ketply west, Mirusuvil', 'Jaffna', '987303425v', 1, '1998-09-03', '0771234556', '0811234567', 'arunk@yahoo.com'),
(13, 'CH170003', 'K. Mathivarathan', 'Kajeepa', 'Mathivarathan', 'ketply west,mirusuvil', 'Jaffna', '987303425v', 0, '1998-09-03', '0771972982', '0213452658', 'kajee@gmail.com'),
(14, 'CH170004', 'R. Tarmapuththiran', 'Rajiththa', 'Tarmapuththiran', 'madduvil south,madduvil', 'Jaffna', '986862552v', 0, '1998-11-02', '0762453167', '0762453167', 'rajitha@hotmail.com'),
(15, 'CH170005', 'K. Ketheswaran', 'Kabila', 'Ketheesvarn', 'Kurekutivu', 'Jaffna', '977161754v', 0, '1997-10-10', '0775382757', '0775382757', 'kabila@gmail.com'),
(16, 'CH170006', 'J. Vaikoparaj', 'Jaliny', 'Vaipokaraj', 'Nunavil east,Chavakachcheri', 'Jaffna', '958022158v', 0, '1995-08-10', '0776034375', '0776034375', 'jali@gmail.com'),
(17, 'CH170007', 'K. Vimalraj', 'Karthikajiny', 'vimalaraj', 'Vellem pokkady,Kodykamam', 'Jaffna', '958044158v', 0, '1997-04-21', '0771769296', '0771769296', 'Karthika@gmail.com'),
(18, 'CH170008', 'V. Perinpanajakam', 'Vigitha', 'Perinpanajakam', 'Nunavil east,Chavakachcheri', 'Jaffna', '968022865v', 0, '1996-05-11', '0778655134', '0778655134', 'vigi@gmail.com'),
(20, 'CH170009', 'k.velu', 'kumar', 'velu', '23,kandy road, Jaffna', 'Jaffna', '960704314V', 1, '2019-03-03', '0710185023', '0187539621', 'velu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uID` int(5) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `upwd` varchar(50) NOT NULL,
  `utype` tinyint(4) NOT NULL,
  `ustatus` tinyint(4) NOT NULL,
  `usrcreatedate` datetime NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `uname`, `upwd`, `utype`, `ustatus`, `usrcreatedate`) VALUES
(1, 'admin001', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2018-10-22 00:00:00'),
(2, 'student001', 'e65af974fee3af633c2faf06279a0385', 4, 1, '2018-10-19 00:00:00'),
(3, 'student002', 'cb9661313af3c48f4a65795f89bbf00a', 4, 1, '2018-10-20 00:00:00'),
(4, 'student003', 'eb40b23b9c1f85eb174eb46f921b57fc', 4, 0, '2018-10-21 00:00:00'),
(5, 'lecturer001', 'f623b999a103aadeb7570da2d76b4b22', 2, 1, '2018-10-22 00:00:00'),
(6, 'lecturer002', 'c1833d113f63614cc04544e15bb16a0b', 2, 1, '0000-00-00 00:00:00'),
(7, 'reception001', '414e337e06962fa850f225da915811fd', 3, 1, '2018-10-25 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
