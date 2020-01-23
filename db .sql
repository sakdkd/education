-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2020 at 10:39 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_kapil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1',
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `primarycontact` varchar(100) DEFAULT NULL,
  `secondarycontact` varchar(100) DEFAULT NULL,
  `tin` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `key` int(11) DEFAULT '1',
  `email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `view`, `name`, `address`, `primarycontact`, `secondarycontact`, `tin`, `logo`, `key`, `email`) VALUES
(1, 'admin', 'ed98ed7eb3473a6ae439028a121d387e', 1, 1, 'Admin', NULL, '+6521457878', '97456321000', 'ABC123456', 'MjAxOS0wMi0xMyAwMzoyOToxNQ==_logon.png', 1, 'admin@gmail.com'),
(3, 'trip@advisor.com', 'c33367701511b4f6020ec61ded352059', 1, 1, 'Trip Advisor', '23/4 , B J J Colony New Delhi India.', '9999999999', '9999999998', 'BA0115623589', 'MjAxOS0wMS0xOSAwMjo0MjowNA==_big-club-mahindra-logo.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admissiontype`
--

CREATE TABLE `admissiontype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admissiontype`
--

INSERT INTO `admissiontype` (`id`, `name`, `status`, `view`) VALUES
(1, 'ISEE', 1, 1),
(2, 'SSAT', 1, 1),
(3, 'ISEE OR SSAT', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `answeroption`
--

CREATE TABLE `answeroption` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answeroption`
--

INSERT INTO `answeroption` (`id`, `name`, `status`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignquestion`
--

CREATE TABLE `assignquestion` (
  `id` int(13) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `topic_id` varchar(150) NOT NULL,
  `planid` varchar(50) NOT NULL,
  `prid` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignquestion`
--

INSERT INTO `assignquestion` (`id`, `qid`, `topic_id`, `planid`, `prid`, `status`, `pdate`) VALUES
(4, '12', '6', '30', '9', '1', '2019-11-14 07:25:57'),
(5, '12', '6', '30', '10', '1', '2019-11-14 07:25:57'),
(6, '11', '6', '30', '9', '1', '2019-11-14 07:26:03'),
(7, '11', '6', '30', '10', '1', '2019-11-14 07:26:03'),
(8, '10', '6', '30', '9', '1', '2019-11-14 07:26:12'),
(9, '10', '6', '30', '10', '1', '2019-11-14 07:26:12'),
(10, '3', '1', '33', '41', '1', '2019-11-14 11:39:21'),
(11, '2', '1', '33', '41', '1', '2019-11-14 11:39:28'),
(12, '1', '1', '33', '41', '1', '2019-11-14 11:39:34'),
(13, '8', '3', '33', '41', '1', '2019-11-14 11:39:44'),
(14, '6', '3', '33', '41', '1', '2019-11-14 11:39:51'),
(15, '5', '3', '33', '41', '1', '2019-11-14 11:39:56'),
(16, '4', '3', '33', '41', '1', '2019-11-14 11:40:03'),
(17, '23', '9', '33', '41', '1', '2019-11-14 11:40:13'),
(18, '22', '9', '33', '41', '1', '2019-11-14 11:40:18'),
(19, '21', '9', '33', '41', '1', '2019-11-14 11:40:24'),
(20, '20', '9', '33', '41', '1', '2019-11-14 11:40:32'),
(23, '24', '10', '33', '41', '1', '2019-11-19 06:19:23'),
(24, '24', '10', '33', '42', '1', '2019-11-19 06:19:23'),
(25, '25', '10', '33', '41', '1', '2019-11-19 06:19:31'),
(26, '25', '10', '33', '42', '1', '2019-11-19 06:19:31'),
(27, '14', '8', '33', '41', '1', '2019-11-21 08:02:50'),
(28, '26', '5', '33', '41', '1', '2019-11-21 08:03:26'),
(31, '43', '32', '17', '', '1', '2019-12-29 21:30:15'),
(40, '99', '32', '17', '', '1', '2020-01-09 20:44:07'),
(43, '99', '32', '36', '', '1', '2020-01-09 20:53:23'),
(44, '99', '32', '35', '49', '1', '2020-01-09 20:53:43'),
(45, '99', '32', '35', '50', '1', '2020-01-09 20:53:43'),
(46, '99', '32', '35', '51', '1', '2020-01-09 20:53:43'),
(47, '99', '32', '38', '66', '1', '2020-01-10 12:18:13'),
(48, '99', '32', '38', '67', '1', '2020-01-10 12:18:13'),
(49, '99', '32', '38', '68', '1', '2020-01-10 12:18:13'),
(50, '99', '32', '39', '72', '1', '2020-01-10 12:32:25'),
(51, '99', '32', '39', '73', '1', '2020-01-10 12:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `attachedtopics`
--

CREATE TABLE `attachedtopics` (
  `id` int(250) NOT NULL,
  `topics` varchar(250) NOT NULL,
  `subtype_id` int(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `attachedid` int(250) NOT NULL,
  `examlevel` int(250) NOT NULL DEFAULT '0',
  `subject_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachedtopics`
--

INSERT INTO `attachedtopics` (`id`, `topics`, `subtype_id`, `status`, `view`, `attachedid`, `examlevel`, `subject_id`) VALUES
(1, 'Age Word problems', 11, 1, 1, 14, 0, 7),
(2, 'Coins and bills Preparation', 11, 1, 1, 14, 0, 7),
(3, 'Distance,Rate and time', 11, 1, 1, 14, 0, 7),
(4, 'Inference', 12, 1, 1, 6, 0, 2),
(5, 'Organization and logic', 12, 1, 1, 6, 0, 2),
(6, 'Decimals', 7, 1, 1, 12, 0, 7),
(7, 'My Nation', 8, 1, 1, 13, 0, 8),
(8, 'Parents', 13, 1, 1, 16, 0, 8),
(9, 'Equations', 11, 1, 1, 14, 0, 7),
(10, 'areas', 14, 1, 1, 15, 0, 6),
(11, 'Cyclinder', 15, 1, 1, 7, 0, 3),
(12, 'Botney', 16, 1, 1, 17, 0, 10),
(13, 'Circle', 17, 1, 0, 18, 0, 11),
(14, 'Distribution', 18, 1, 1, 10, 0, 6),
(15, '', 18, 1, 1, 10, 0, 6),
(16, 'Synonyms', 19, 1, 1, 19, 0, 1),
(17, '', 19, 1, 1, 19, 0, 1),
(18, 'Sentence Completions', 20, 1, 1, 19, 0, 1),
(19, 'Word Problems', 21, 1, 1, 20, 0, 6),
(20, 'Quantitative Comparison Questions', 22, 1, 1, 20, 0, 6),
(21, 'Numbers and Operations', 23, 1, 1, 20, 0, 6),
(22, 'Algebra', 24, 1, 1, 20, 0, 6),
(23, 'Geometry', 25, 1, 1, 20, 0, 6),
(24, 'Measurement', 26, 1, 1, 20, 0, 6),
(25, 'Data Analysis & Probability', 27, 1, 1, 20, 0, 6),
(26, 'Problem Solving', 28, 1, 1, 20, 0, 6),
(27, 'Numbers and Operations', 29, 1, 1, 22, 0, 7),
(28, 'Algebra', 30, 1, 1, 22, 0, 7),
(29, 'Geometry', 31, 1, 1, 22, 0, 7),
(30, 'Measurement', 32, 1, 1, 22, 0, 7),
(31, 'Data Analysis & Probability', 33, 1, 1, 22, 0, 7),
(32, 'Problem Solving', 34, 1, 1, 22, 0, 7),
(33, 'Essay', 35, 1, 1, 23, 0, 8),
(34, 'Main Idea', 36, 1, 1, 21, 0, 2),
(35, 'Supporting Idea', 37, 1, 1, 21, 0, 2),
(36, 'Inference', 38, 1, 1, 21, 0, 2),
(37, 'Vocabulary', 39, 1, 1, 21, 0, 2),
(38, 'Organization and Logic', 40, 1, 1, 21, 0, 2),
(39, 'Tone, Style and Figurative Language', 41, 1, 1, 21, 0, 2),
(40, 'Test Subtype-Topic4', 42, 1, 1, 12, 0, 7),
(41, 'Test Subtype-Topic3', 42, 1, 1, 12, 0, 7),
(42, 'Test Subtype-Topic2', 42, 1, 1, 12, 0, 7),
(43, 'Test Subtype-Topic1', 42, 1, 1, 12, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comeback`
--

CREATE TABLE `comeback` (
  `id` int(250) NOT NULL,
  `levelid` int(250) NOT NULL,
  `qid` int(250) NOT NULL,
  `uid` int(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(250) NOT NULL DEFAULT '1',
  `testid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comeback`
--

INSERT INTO `comeback` (`id`, `levelid`, `qid`, `uid`, `status`, `view`, `testid`) VALUES
(2, 14, 1, 13, 1, 1, 41),
(3, 14, 3, 13, 1, 1, 41),
(7, 6, 1, 13, 1, 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `competitiveness`
--

CREATE TABLE `competitiveness` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitiveness`
--

INSERT INTO `competitiveness` (`id`, `name`, `status`, `view`) VALUES
(1, 'Extremely high', 1, 1),
(2, 'Very High', 1, 1),
(3, 'Moderate', 1, 1),
(4, 'Some What', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `mobile`, `email`, `message`, `pdate`, `status`, `view`) VALUES
(1, 'test', '9899123456', 'test@gmail.com', 'test', '2019-11-21', 1, 1),
(3, 'test', '989989889', 'test@gmail.com', 'testinggggg', '2019-11-21', 1, 1),
(4, 'test', '98989899', 'test@gmail.com', 'cfvgvgfg', '2019-11-21', 1, 1),
(5, 'fs', '45435', 'manisha.rawat@dkd.co.in', 'sdf', '2019-11-22', 1, 1),
(6, 'afqw', '234234', 'manisha.rawat@dkd.co.in', 'sdfsd', '2019-11-22', 1, 1),
(7, 'sdgsd', '34324', 'manisha.rawat@dkd.co.in', 'df', '2019-11-22', 1, 1),
(8, 'fs', '342423', 'manisha.rawat@dkd.co.in', 'dfsd', '2019-11-22', 1, 1),
(9, 'ewrwe', '3423', 'manisha.rawat@dkd.co.in', 'rwe', '2019-11-22', 1, 1),
(10, 'sdf', '21423', 'manisha@gmail.com', 'sdfsd', '2019-11-22', 1, 1),
(11, 'gfdfft', '34535', 'manisha.rawat@dkd.co.in', 'sdfsdfsd', '2019-11-22', 1, 1),
(12, 'fwer', '32523', 'manisha.rawat@dkd.co.in', 'werwe', '2019-11-22', 1, 1),
(13, 'w', '989', 's2S@S.COM', 's', '2019-11-22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contentpages`
--

CREATE TABLE `contentpages` (
  `id` int(11) NOT NULL,
  `content` text,
  `status` int(11) DEFAULT '1',
  `type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contentpages`
--

INSERT INTO `contentpages` (`id`, `content`, `status`, `type`) VALUES
(1, '<h2><strong>About Us</strong></h2>\r\n\r\n<p>Content will come here</p>\r\n', 1, 1),
(2, '<p>Content will come here.</p>\r\n', 1, 2),
(3, 'Payment Terms will come here', 1, 3),
(4, 'Privacy Policy', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(250) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `description`, `name`, `status`, `view`) VALUES
(4, '', 'Canada', 1, 1),
(5, '', 'California', 1, 1),
(3, '', 'Albama', 1, 1),
(6, '', 'China', 1, 1),
(7, '', 'Colorado', 1, 1),
(8, '', 'Connecticut', 1, 1),
(9, '', 'Delaware', 1, 1),
(15, '', 'India', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu_grades`
--

CREATE TABLE `edu_grades` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1',
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_grades`
--

INSERT INTO `edu_grades` (`id`, `name`, `status`, `view`, `level_id`) VALUES
(1, '2', 1, 1, 1),
(2, '3', 1, 1, 1),
(3, '4', 1, 1, 1),
(4, '5', 1, 1, 2),
(5, '6', 1, 1, 2),
(6, '7', 1, 1, 3),
(7, '8', 1, 1, 3),
(8, '9', 1, 1, 4),
(9, '10', 1, 1, 4),
(10, '11', 1, 1, 4),
(11, '12', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `edu_levels`
--

CREATE TABLE `edu_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1',
  `slug` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_levels`
--

INSERT INTO `edu_levels` (`id`, `name`, `status`, `view`, `slug`, `description`) VALUES
(1, 'Primary Level ISEE', 1, 1, 'primary-level-isee', 'Students Applying to Grades 3 & 4'),
(2, 'Lower Level ISEE', 1, 1, 'lower-level-isee', 'Students Applying to Grades 5 & 6'),
(3, 'Middle Level ISEE', 1, 1, 'middle-level-isee', 'Students Applying to Grades 7 & 8'),
(4, 'Upper Level ISEE', 1, 1, 'upper-level-isee', 'Students Applying to Grades 9 - 12');

-- --------------------------------------------------------

--
-- Table structure for table `edu_pricing`
--

CREATE TABLE `edu_pricing` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `pdate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_pricing`
--

INSERT INTO `edu_pricing` (`id`, `name`, `price`, `level_id`, `status`, `view`, `pdate`) VALUES
(38, 'My test', '1000', 4, 1, 1, '2020-01-10'),
(39, 'My Upper Test', '1000', 4, 1, 1, '2020-01-10'),
(40, 'New Upper Plan', '12345', 4, 1, 0, '2020-01-10'),
(41, 'My New Upper Test', '123456', 4, 1, 0, '2020-01-10'),
(42, 'New Upper Test2', '123', 4, 1, 0, '2020-01-10'),
(43, 'New Upper Test2', '1234', 4, 1, 0, '2020-01-10'),
(44, 'Bosh New Upper Test', '999', 4, 1, 1, '2020-01-10'),
(45, 'New Middle', '588', 3, 1, 1, '2020-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `edu_pricingnonqfeatures`
--

CREATE TABLE `edu_pricingnonqfeatures` (
  `id` int(11) NOT NULL,
  `pricingid` int(11) DEFAULT NULL,
  `nqfeatureid` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_pricingnonqfeatures`
--

INSERT INTO `edu_pricingnonqfeatures` (`id`, `pricingid`, `nqfeatureid`, `view`, `status`) VALUES
(1, 4, 5, 1, 1),
(2, 4, 4, 1, 1),
(3, 4, 3, 1, 1),
(4, 4, 2, 1, 1),
(5, 4, 1, 1, 1),
(6, 5, 6, 1, 1),
(7, 5, 5, 1, 1),
(8, 5, 4, 1, 1),
(9, 5, 3, 1, 1),
(10, 5, 2, 1, 1),
(11, 5, 1, 1, 1),
(12, 6, 8, 0, 1),
(13, 6, 3, 1, 1),
(14, 6, 1, 1, 1),
(19, 8, 6, 1, 1),
(20, 8, 4, 1, 1),
(21, 8, 3, 1, 1),
(22, 8, 1, 1, 1),
(23, 9, 6, 1, 1),
(24, 9, 5, 1, 1),
(25, 9, 4, 1, 1),
(26, 9, 3, 1, 1),
(27, 9, 1, 1, 1),
(28, 11, 6, 0, 1),
(29, 11, 5, 1, 1),
(30, 12, 6, 1, 1),
(31, 12, 5, 1, 1),
(32, 12, 4, 1, 1),
(33, 12, 3, 1, 1),
(34, 13, 6, 0, 1),
(35, 13, 5, 1, 1),
(36, 13, 3, 1, 1),
(37, 14, 5, 1, 1),
(38, 14, 3, 1, 1),
(39, 14, 1, 1, 1),
(40, 16, 5, 1, 1),
(41, 16, 3, 1, 1),
(42, 16, 1, 1, 1),
(43, 17, 10, 1, 1),
(44, 17, 5, 1, 1),
(45, 17, 3, 1, 1),
(46, 17, 1, 1, 1),
(47, 11, 10, 1, 1),
(48, 11, 3, 1, 1),
(49, 11, 1, 1, 1),
(50, 18, 10, 1, 1),
(51, 18, 5, 1, 1),
(52, 18, 3, 1, 1),
(53, 18, 1, 1, 1),
(54, 28, 10, 1, 1),
(55, 28, 5, 1, 1),
(56, 28, 3, 1, 1),
(57, 28, 1, 1, 1),
(58, 29, 10, 1, 1),
(59, 29, 5, 1, 1),
(60, 29, 3, 1, 1),
(61, 29, 1, 1, 1),
(62, 30, 10, 1, 1),
(63, 30, 5, 1, 1),
(64, 30, 3, 1, 1),
(69, 32, 10, 1, 1),
(70, 32, 5, 1, 1),
(71, 32, 3, 1, 1),
(72, 32, 1, 1, 1),
(73, 33, 10, 1, 1),
(74, 33, 5, 1, 1),
(75, 33, 3, 1, 1),
(78, 35, 10, 1, 1),
(79, 35, 5, 1, 1),
(80, 36, 10, 1, 1),
(81, 36, 5, 1, 1),
(82, 37, 10, 1, 1),
(83, 37, 5, 1, 1),
(84, 38, 10, 1, 1),
(85, 38, 5, 1, 1),
(86, 39, 10, 1, 1),
(87, 41, 10, 1, 1),
(88, 42, 10, 1, 1),
(89, 43, 10, 1, 1),
(90, 44, 10, 1, 1),
(91, 45, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu_pricingqfeatures`
--

CREATE TABLE `edu_pricingqfeatures` (
  `id` int(11) NOT NULL,
  `pricingid` int(11) DEFAULT NULL,
  `qfeatureid` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1',
  `sets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_pricingqfeatures`
--

INSERT INTO `edu_pricingqfeatures` (`id`, `pricingid`, `qfeatureid`, `view`, `status`, `sets`) VALUES
(1, 11, 2, 1, 1, 6),
(2, 11, 1, 1, 1, 2),
(3, 11, 3, 0, 1, 5),
(5, 13, 2, 1, 1, 2),
(6, 13, 4, 1, 1, 1),
(7, 16, 4, 1, 1, 4),
(8, 16, 3, 1, 1, 2),
(9, 16, 2, 1, 1, 2),
(10, 16, 1, 1, 1, 4),
(11, 17, 5, 0, 1, 0),
(12, 17, 4, 1, 1, 4),
(13, 17, 3, 0, 1, 0),
(14, 17, 2, 1, 1, 2),
(15, 17, 1, 0, 1, 4),
(25, 27, 2, 1, 1, 2),
(26, 28, 5, 1, 1, 5),
(27, 28, 4, 1, 1, 4),
(28, 28, 3, 1, 1, 3),
(29, 28, 2, 1, 1, 2),
(30, 28, 1, 1, 1, 5),
(31, 29, 2, 1, 1, 5),
(32, 30, 5, 1, 1, 2),
(33, 30, 4, 1, 1, 3),
(34, 30, 3, 1, 1, 3),
(35, 30, 2, 1, 1, 5),
(36, 30, 1, 1, 1, 4),
(38, 32, 5, 1, 1, 4),
(39, 32, 4, 1, 1, 4),
(40, 32, 3, 1, 1, 4),
(41, 32, 2, 1, 1, 3),
(42, 32, 1, 1, 1, 3),
(43, 33, 5, 1, 1, 1),
(44, 33, 4, 1, 1, 1),
(45, 33, 2, 1, 1, 2),
(46, 14, 4, 1, 1, 3),
(47, 14, 2, 1, 1, 1),
(49, 35, 4, 1, 1, 4),
(50, 35, 2, 1, 1, 4),
(51, 36, 4, 1, 1, 3),
(52, 36, 2, 1, 1, 3),
(53, 37, 4, 1, 1, 2),
(54, 37, 2, 1, 1, 2),
(55, 38, 4, 1, 1, 3),
(56, 38, 2, 1, 1, 3),
(57, 39, 4, 1, 1, 3),
(58, 39, 2, 1, 1, 3),
(59, 40, 4, 1, 1, 3),
(60, 41, 4, 1, 1, 3),
(61, 41, 2, 1, 1, 3),
(62, 42, 4, 0, 1, 1),
(63, 42, 2, 0, 1, 2),
(64, 42, 2, 1, 1, 1),
(65, 42, 4, 1, 1, 1),
(66, 43, 4, 1, 1, 3),
(67, 43, 2, 1, 1, 3),
(68, 44, 4, 1, 1, 2),
(69, 44, 2, 1, 1, 1),
(70, 45, 4, 1, 1, 2),
(71, 45, 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `examlevel`
--

CREATE TABLE `examlevel` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examlevel`
--

INSERT INTO `examlevel` (`id`, `name`, `status`, `view`) VALUES
(1, 'Easy', 1, 1),
(2, 'Medium', 1, 1),
(3, 'Hard', 1, 1),
(4, 'All', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(250) NOT NULL DEFAULT '1',
  `class` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `name`, `status`, `view`, `class`) VALUES
(1, 'Correct', 1, 1, 'correct'),
(2, 'Incorrect', 1, 1, 'incorrect'),
(3, 'Omitted', 0, 0, 'omitted'),
(4, 'Flagged', 0, 0, 'flagged'),
(5, 'Timing: less than 30 sec', 1, 1, 'less30'),
(6, 'Timing: 30 sec to 2 min', 1, 1, '30to2'),
(7, 'Timing: greater than 2 min', 1, 1, 'grt2'),
(8, 'Difficulty: Easy', 1, 1, 'Easy'),
(9, 'Difficulty: Medium', 1, 1, 'Medium'),
(10, 'Difficulty: Hard', 1, 1, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `full_test_created`
--

CREATE TABLE `full_test_created` (
  `id` int(250) NOT NULL,
  `eduqfeature_id` int(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(250) NOT NULL DEFAULT '1',
  `name` varchar(250) NOT NULL,
  `pdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `full_test_created`
--

INSERT INTO `full_test_created` (`id`, `eduqfeature_id`, `status`, `view`, `name`, `pdate`) VALUES
(1, 32, 1, 1, 'Practice Test #1', '2019-11-06'),
(2, 32, 1, 1, 'Practice Test #2', '2019-11-06'),
(3, 33, 1, 1, 'Practice Test #1', '2019-11-06'),
(4, 33, 1, 1, 'Practice Test #2', '2019-11-06'),
(5, 33, 1, 1, 'Practice Test #3', '2019-11-06'),
(6, 34, 1, 1, 'Practice Test #1', '2019-11-06'),
(7, 34, 1, 1, 'Practice Test #2', '2019-11-06'),
(8, 34, 1, 1, 'Practice Test #3', '2019-11-06'),
(9, 35, 1, 1, 'Practice Test #1', '2019-11-06'),
(10, 35, 1, 1, 'Practice Test #2', '2019-11-06'),
(11, 35, 1, 1, 'Practice Test #3', '2019-11-06'),
(12, 35, 1, 1, 'Practice Test #4', '2019-11-06'),
(13, 35, 1, 1, 'Practice Test #5', '2019-11-06'),
(14, 36, 1, 1, 'Practice Test #1', '2019-11-06'),
(15, 36, 1, 1, 'Practice Test #2', '2019-11-06'),
(16, 36, 1, 1, 'Practice Test #3', '2019-11-06'),
(17, 36, 1, 1, 'Practice Test #4', '2019-11-06'),
(21, 38, 1, 1, 'Practice Test #1', '2019-11-06'),
(22, 38, 1, 1, 'Practice Test #2', '2019-11-06'),
(23, 38, 1, 1, 'Practice Test #3', '2019-11-06'),
(24, 38, 1, 1, 'Practice Test #4', '2019-11-06'),
(25, 39, 1, 1, 'Practice Test #1', '2019-11-06'),
(26, 39, 1, 1, 'Practice Test #2', '2019-11-06'),
(27, 39, 1, 1, 'Practice Test #3', '2019-11-06'),
(28, 39, 1, 1, 'Practice Test #4', '2019-11-06'),
(29, 40, 1, 1, 'Practice Test #1', '2019-11-06'),
(30, 40, 1, 1, 'Practice Test #2', '2019-11-06'),
(31, 40, 1, 1, 'Practice Test #3', '2019-11-06'),
(32, 40, 1, 1, 'Practice Test #4', '2019-11-06'),
(33, 41, 1, 1, 'Practice Test #1', '2019-11-06'),
(34, 41, 1, 1, 'Practice Test #2', '2019-11-06'),
(35, 41, 1, 1, 'Practice Test #3', '2019-11-06'),
(36, 42, 1, 1, 'Practice Test #1', '2019-11-06'),
(37, 42, 1, 1, 'Practice Test #2', '2019-11-06'),
(38, 42, 1, 1, 'Practice Test #3', '2019-11-06'),
(39, 43, 1, 1, 'Practice Test #1', '2019-11-13'),
(40, 44, 1, 1, 'Practice Test #1', '2019-11-13'),
(41, 45, 1, 1, 'Practice Test #1', '2019-11-13'),
(42, 45, 1, 1, 'Practice Test #2', '2019-11-13'),
(46, 49, 1, 1, 'Practice Test #1', '2019-12-31'),
(47, 49, 1, 1, 'Practice Test #2', '2019-12-31'),
(48, 49, 1, 1, 'Practice Test #3', '2019-12-31'),
(49, 50, 1, 1, 'Practice Test #1', '2019-12-31'),
(50, 50, 1, 1, 'Practice Test #2', '2019-12-31'),
(51, 50, 1, 1, 'Practice Test #3', '2019-12-31'),
(52, 51, 1, 1, 'Practice Test #1', '2020-01-10'),
(53, 51, 1, 1, 'Practice Test #2', '2020-01-10'),
(54, 51, 1, 1, 'Practice Test #3', '2020-01-10'),
(55, 51, 1, 1, 'Practice Test #4', '2020-01-10'),
(56, 51, 1, 1, 'Practice Test #5', '2020-01-10'),
(57, 53, 1, 1, 'Practice Test #1', '2020-01-10'),
(58, 53, 1, 1, 'Practice Test #2', '2020-01-10'),
(59, 53, 1, 1, 'Practice Test #3', '2020-01-10'),
(60, 54, 1, 1, 'Practice Test #1', '2020-01-10'),
(61, 54, 1, 1, 'Practice Test #2', '2020-01-10'),
(62, 54, 1, 1, 'Practice Test #3', '2020-01-10'),
(63, 55, 1, 1, 'Practice Test #1', '2020-01-10'),
(64, 55, 1, 1, 'Practice Test #2', '2020-01-10'),
(65, 55, 1, 1, 'Practice Test #3', '2020-01-10'),
(66, 56, 1, 1, 'Practice Test #1', '2020-01-10'),
(67, 56, 1, 1, 'Practice Test #2', '2020-01-10'),
(68, 56, 1, 1, 'Practice Test #3', '2020-01-10'),
(69, 57, 1, 1, 'Practice Test #1', '2020-01-10'),
(70, 57, 1, 1, 'Practice Test #2', '2020-01-10'),
(71, 57, 1, 1, 'Practice Test #3', '2020-01-10'),
(72, 58, 1, 1, 'Practice Test #1', '2020-01-10'),
(73, 58, 1, 1, 'Practice Test #2', '2020-01-10'),
(74, 58, 1, 1, 'Practice Test #3', '2020-01-10'),
(75, 59, 1, 1, 'Practice Test #1', '2020-01-10'),
(76, 59, 1, 1, 'Practice Test #2', '2020-01-10'),
(77, 59, 1, 1, 'Practice Test #3', '2020-01-10'),
(78, 60, 1, 1, 'Practice Test #1', '2020-01-10'),
(79, 60, 1, 1, 'Practice Test #2', '2020-01-10'),
(80, 60, 1, 1, 'Practice Test #3', '2020-01-10'),
(81, 61, 1, 1, 'Practice Test #1', '2020-01-10'),
(82, 61, 1, 1, 'Practice Test #2', '2020-01-10'),
(83, 61, 1, 1, 'Practice Test #3', '2020-01-10'),
(84, 62, 1, 1, 'Practice Test #1', '2020-01-10'),
(85, 63, 1, 1, 'Practice Test #1', '2020-01-10'),
(86, 63, 1, 1, 'Practice Test #2', '2020-01-10'),
(87, 66, 1, 1, 'Practice Test #1', '2020-01-10'),
(88, 67, 1, 1, 'Practice Test #1', '2020-01-10'),
(89, 68, 1, 1, 'Practice Test #1', '2020-01-10'),
(90, 68, 1, 1, 'Practice Test #2', '2020-01-10'),
(91, 69, 1, 1, 'Practice Test #1', '2020-01-10'),
(92, 70, 1, 1, 'Practice Test #1', '2020-01-23'),
(93, 70, 1, 1, 'Practice Test #2', '2020-01-23'),
(94, 71, 1, 1, 'Practice Test #1', '2020-01-23'),
(95, 71, 1, 1, 'Practice Test #2', '2020-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `paging` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `name`, `paging`, `status`) VALUES
(1, 'Bosh Education // Administration', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `levelsubjects`
--

CREATE TABLE `levelsubjects` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `questions` int(11) DEFAULT NULL,
  `timings` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `pdate` varchar(100) DEFAULT NULL,
  `ptime` varchar(100) DEFAULT NULL,
  `postedby` int(11) NOT NULL DEFAULT '1',
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelsubjects`
--

INSERT INTO `levelsubjects` (`id`, `level_id`, `questions`, `timings`, `status`, `view`, `pdate`, `ptime`, `postedby`, `subject_id`) VALUES
(2, 1, 6, 7, 1, 1, '2019-03-19', '06:16 pm', 1, 1),
(3, 1, 18, 20, 1, 1, '2019-03-19', '06:18 pm', 1, 2),
(4, 1, 24, 26, 1, 1, '2019-03-19', '06:18 pm', 1, 3),
(5, 1, 1, 0, 1, 1, '2019-03-19', '06:18 pm', 1, 4),
(6, 2, 24, 120, 1, 1, '2019-03-19', '06:20 pm', 1, 2),
(7, 2, 24, 26, 1, 1, '2019-03-19', '06:21 pm', 1, 3),
(8, 2, 1, 0, 0, 1, '2019-03-19', '06:21 pm', 1, 4),
(9, 3, 37, 35, 1, 1, '2019-04-03', '11:20 am', 1, 5),
(10, 3, 37, 35, 1, 1, '2019-04-03', '11:20 am', 1, 6),
(11, 3, 36, 35, 1, 1, '2019-04-03', '11:20 am', 1, 2),
(12, 3, 4, 60, 1, 1, '2019-04-03', '11:21 am', 1, 7),
(13, 3, 1, 1, 1, 1, '2019-04-03', '11:21 am', 1, 8),
(14, 2, 11, 40, 1, 1, '2019-04-15', '03:33 pm', 1, 7),
(15, 2, 2, 37, 1, 1, '2019-04-15', '03:33 pm', 1, 6),
(16, 2, 1, 5, 1, 1, '2019-05-07', '01:36 pm', 1, 8),
(17, 3, 10, 10, 1, 0, '2019-05-27', '01:55 pm', 1, 10),
(18, 3, 2, 10, 1, 0, '2019-05-27', '02:48 pm', 1, 11),
(19, 4, 33, 40, 1, 1, '2019-09-06', '08:07 pm', 1, 12),
(20, 4, 37, 35, 1, 1, '2019-09-06', '08:07 pm', 1, 6),
(21, 4, 36, 30, 1, 1, '2019-09-06', '08:08 pm', 1, 2),
(22, 4, 47, 38, 1, 1, '2019-09-06', '08:09 pm', 1, 7),
(23, 4, 1, 29, 1, 1, '2019-09-06', '08:09 pm', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(250) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `countryid` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `description`, `name`, `status`, `countryid`, `view`) VALUES
(1, 'A lush region with a rhythmic heartbeat and easy-going charm', 'Goa', 1, 1, 1),
(2, '', 'Albama', 1, 3, 1),
(3, '', 'Alberta', 1, 4, 1),
(4, '', 'British Columbia', 1, 4, 1),
(5, '', 'Ontario', 1, 4, 1),
(6, '', 'Bay Area', 1, 5, 1),
(7, '', 'Greater Los Angeles', 1, 5, 1),
(8, '', 'Greater San Diego', 1, 5, 1),
(9, '', 'Santa Barbara', 1, 5, 1),
(11, '', 'test', 1, 9, 1),
(12, '', 'Delhi', 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `minitest`
--

CREATE TABLE `minitest` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `questions` int(11) DEFAULT NULL,
  `timings` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `pdate` varchar(100) DEFAULT NULL,
  `ptime` varchar(100) DEFAULT NULL,
  `postedby` int(11) NOT NULL DEFAULT '1',
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minitest`
--

INSERT INTO `minitest` (`id`, `level_id`, `questions`, `timings`, `status`, `view`, `pdate`, `ptime`, `postedby`, `subject_id`) VALUES
(1, 5, 10, 5, 1, 1, '2019-04-12', '10:38 am', 1, 6),
(2, 5, 10, 3, 1, 1, '2019-04-12', '10:59 am', 1, 7),
(3, 5, 5, 12, 0, 1, '2019-05-15', '01:59 pm', 1, 3),
(5, NULL, 10, 10, 1, 1, '2019-05-27', '02:09 pm', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `minitestattempted`
--

CREATE TABLE `minitestattempted` (
  `id` int(250) NOT NULL,
  `testid` int(250) NOT NULL,
  `questionid` int(250) NOT NULL,
  `answer` int(250) NOT NULL,
  `buttonval` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minitestattempted`
--

INSERT INTO `minitestattempted` (`id`, `testid`, `questionid`, `answer`, `buttonval`) VALUES
(1, 1, 96, 2, 1),
(2, 1, 93, 2, 1),
(3, 1, 92, 4, 1),
(4, 1, 94, 0, 1),
(5, 1, 25, 0, 1),
(6, 1, 89, 0, 1),
(7, 1, 90, 0, 1),
(8, 1, 95, 0, 1),
(9, 1, 24, 0, 1),
(10, 1, 98, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `minitestgiven`
--

CREATE TABLE `minitestgiven` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `testname` int(250) NOT NULL,
  `button` enum('1','0','3') NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `levelid` int(250) NOT NULL,
  `savedtime` varchar(250) NOT NULL DEFAULT 'nil'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `minitestid`
--

CREATE TABLE `minitestid` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `level` int(250) NOT NULL DEFAULT '0',
  `pricingid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minitestid`
--

INSERT INTO `minitestid` (`id`, `name`, `status`, `view`, `level`, `pricingid`) VALUES
(5, 'Mini Practice Test', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nqfeatures`
--

CREATE TABLE `nqfeatures` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nqfeatures`
--

INSERT INTO `nqfeatures` (`id`, `name`, `status`, `view`) VALUES
(1, 'Online test portal', 1, 1),
(2, 'Stanine results', 1, 0),
(3, 'Interactive diagnostics', 1, 1),
(4, 'Tutor consultation', 1, 0),
(5, 'Personalized prep plan', 1, 1),
(6, '12 extra writing prompts', 0, 0),
(7, 'test1', 0, 0),
(8, '1 mini test', 1, 0),
(9, 'p p hgggg', 1, 0),
(10, 'Assignment provider', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `omitted`
--

CREATE TABLE `omitted` (
  `id` int(250) NOT NULL,
  `levelid` int(250) NOT NULL,
  `qid` int(250) NOT NULL,
  `uid` int(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(250) NOT NULL DEFAULT '1',
  `testid` int(250) NOT NULL,
  `ans` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `omitted`
--

INSERT INTO `omitted` (`id`, `levelid`, `qid`, `uid`, `status`, `view`, `testid`, `ans`) VALUES
(10, 14, 2, 13, 1, 1, 41, 2),
(26, 6, 26, 13, 1, 1, 41, 4),
(28, 14, 21, 13, 1, 1, 41, 2),
(33, 15, 24, 13, 1, 1, 41, 4),
(34, 15, 24, 13, 1, 1, 41, 3),
(35, 15, 24, 13, 1, 1, 41, 2),
(37, 15, 24, 13, 1, 1, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(250) NOT NULL,
  `orderid` int(250) NOT NULL,
  `planid` int(250) NOT NULL,
  `status` int(250) NOT NULL,
  `qty` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `orderid`, `planid`, `status`, `qty`) VALUES
(1, 1, 30, 1, 1),
(2, 2, 33, 1, 1),
(3, 3, 11, 1, 1),
(4, 4, 17, 1, 1),
(5, 5, 14, 1, 1),
(6, 6, 35, 1, 1),
(7, 7, 44, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` int(250) NOT NULL,
  `country` int(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `postal` varchar(250) NOT NULL,
  `company` text,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `pdate`, `status`, `address`, `city`, `state`, `country`, `phone`, `postal`, `company`, `fname`, `lname`) VALUES
(1, 12, '2019-11-14', 1, 'test', 'delhi', 0, 15, '9899121234', '09865', 'test', 'test', 'test'),
(2, 13, '2019-11-14', 1, 'Hello', 'delhi', 0, 15, '9899878789', '110098', 'Hello', 'Hello', 'Hello'),
(3, 15, '2019-11-22', 1, 'test', 'delhi', 0, 15, '78787890', '112234', 'test', 'test', 'test'),
(4, 1, '2019-12-27', 1, 'test', 'test', 0, 5, '6178358895', '01172', 'test', 'test', 'test'),
(5, 16, '2019-12-31', 1, 'test3', 'test3', 0, 15, '9877676789', '02132', 'test3', 'test', 'test'),
(6, 17, '2019-12-31', 1, 'my testing', 'my testing', 0, 15, '8788787898', '02132', 'my testing', 'my testing', 'my testing'),
(7, 18, '2020-01-11', 1, '44 BoshALL', 'Boston', 0, 15, '6178359967', '02122', 'BoshALL', 'Jun', 'Wang');

-- --------------------------------------------------------

--
-- Table structure for table `practicetestgiven`
--

CREATE TABLE `practicetestgiven` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `testname` varchar(250) NOT NULL,
  `button` enum('1','0','3') NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `levelid` int(250) NOT NULL,
  `savedtime` varchar(250) NOT NULL DEFAULT 'nil'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicetestgiven`
--

INSERT INTO `practicetestgiven` (`id`, `userid`, `pdate`, `testname`, `button`, `status`, `view`, `subject_id`, `levelid`, `savedtime`) VALUES
(1, 3, '2019-05-27', 'Practice', '1', 1, 1, 12, 3, ''),
(2, 3, '2019-05-27', 'Practice', '1', 1, 1, 12, 3, 'nil'),
(3, 3, '2019-05-27', 'Practice', '1', 1, 1, 13, 3, ''),
(4, 3, '2019-05-27', 'Practice', '1', 1, 1, 13, 3, 'nil'),
(5, 1, '2019-08-13', 'Practice', '3', 1, 1, 1, 3, 'nil'),
(6, 1, '2019-08-13', 'Practice', '3', 1, 1, 1, 1, 'nil'),
(7, 1, '2019-11-13', 'Practice', '1', 1, 1, 6, 2, ''),
(8, 1, '2019-11-06', 'Practice', '1', 1, 1, 6, 1, ''),
(9, 1, '2019-11-06', 'Practice', '3', 1, 1, 6, 1, 'nil'),
(10, 1, '2019-11-12', 'Practice', '1', 1, 1, 7, 2, 'nil'),
(11, 9, '2019-11-13', 'Practice', '1', 1, 1, 6, 2, 'nil'),
(12, 10, '2019-11-13', 'Practice', '3', 1, 1, 1, 1, 'nil'),
(13, 9, '2019-11-13', 'Practice', '1', 1, 1, 6, 1, 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `ptestattempted`
--

CREATE TABLE `ptestattempted` (
  `id` int(250) NOT NULL,
  `testid` int(250) NOT NULL,
  `questionid` int(250) NOT NULL,
  `answer` text NOT NULL,
  `buttonval` int(250) NOT NULL,
  `timetaken` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ptestattempted`
--

INSERT INTO `ptestattempted` (`id`, `testid`, `questionid`, `answer`, `buttonval`, `timetaken`) VALUES
(1, 5, 3, '1', 3, NULL),
(2, 6, 1, '0', 3, NULL),
(7, 8, 12, '2', 1, NULL),
(8, 8, 11, '4', 1, NULL),
(9, 9, 11, '4', 3, NULL),
(10, 9, 12, '2', 3, NULL),
(11, 10, 13, 'fghjfjtyutyujtyjtyjtyjutyujytuyujyutyuytutyut', 1, NULL),
(12, 11, 10, '1', 1, NULL),
(13, 7, 10, '1', 1, NULL),
(14, 12, 1, '1', 3, NULL),
(15, 13, 11, '3', 1, NULL),
(16, 13, 12, '3', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qfeature`
--

CREATE TABLE `qfeature` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qfeature`
--

INSERT INTO `qfeature` (`id`, `name`, `status`, `view`) VALUES
(1, 'MINI TEST', 1, 0),
(2, 'FULL-LENGTH TEST', 1, 1),
(3, 'PREMIUM VIDEO COURSE', 1, 1),
(4, 'PRACTICE EXERCISES', 1, 1),
(5, 'Assignment provider', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionimages`
--

CREATE TABLE `questionimages` (
  `id` int(250) NOT NULL,
  `imagepath` varchar(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionimages`
--

INSERT INTO `questionimages` (`id`, `imagepath`, `pdate`, `status`, `view`) VALUES
(20, 'mastercard.png', '2019-04-10', 1, 1),
(23, 'american-express.png', '2019-04-10', 1, 1),
(24, 'user.png', '2019-04-10', 1, 1),
(25, 'user.png', '2019-04-10', 1, 1),
(26, 'favicon.ico', '2019-04-11', 1, 1),
(27, '_gram.jpg', '2019-04-29', 1, 1),
(28, 'file1.png', '2019-05-08', 1, 1),
(29, 'file4.png', '2019-05-08', 1, 1),
(30, 'image.svg', '2019-05-14', 1, 1),
(31, '4b88a24ee9847354d1fdc472202c81b0.jpg', '2019-05-27', 1, 1),
(32, 'images.png', '2019-05-27', 1, 1),
(33, 'capture-png4 (1).png', '2019-08-09', 1, 1),
(34, 'image.png', '2019-09-06', 1, 1),
(35, 'image.png', '2019-09-06', 1, 1),
(36, 'image.png', '2019-09-06', 1, 1),
(37, 'image.png', '2019-09-06', 1, 1),
(38, 'image-20190907125947-1.png', '2019-09-07', 1, 1),
(39, 'image-20190907130340-1.png', '2019-09-07', 1, 1),
(40, 'image-20190907130417-2.png', '2019-09-07', 1, 1),
(41, 'image-20190907130705-1.png', '2019-09-07', 1, 1),
(42, 'image-20190907130712-2.png', '2019-09-07', 1, 1),
(43, 'image-20190907130749-3.png', '2019-09-07', 1, 1),
(44, 'image-20190907130800-4.png', '2019-09-07', 1, 1),
(45, 'image-20190907130834-5.png', '2019-09-07', 1, 1),
(46, 'image-20190907130856-6.png', '2019-09-07', 1, 1),
(47, 'image-20190907131948-1.png', '2019-09-07', 1, 1),
(48, 'image-20190907132706-2.png', '2019-09-07', 1, 1),
(49, 'image-20190907133747-1.png', '2019-09-07', 1, 1),
(50, 'image-20190907134048-1.png', '2019-09-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(250) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correct` varchar(250) NOT NULL,
  `solution` text NOT NULL,
  `topic_id` int(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `difficulty` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct`, `solution`, `topic_id`, `status`, `view`, `pdate`, `difficulty`) VALUES
(1, '<p><strong>Age of Umesh will be 4 times the age of Reena in 6 years from today. If ages of Umesh and Mahesh are 7 times and 6 times the age of Reena respectively, what is present age of Umesh?</strong>&nbsp;</p>', '<p>64 years</p>\r\n', '<p>30 years</p>\r\n', '<p>28 years</p>\r\n', '<p>34 years</p>\r\n', '2', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, '2019-04-15', 1),
(2, '<p><strong>The average age of 10 students and their teacher is 15 years. The average age of the first seven students is 15 yr and that of the last three is 11 yr. What is the teacher&#39;s age?</strong>&nbsp;</p>', '<p>33 years</p>\r\n', '<p>30 years</p>\r\n', '<p>27 years</p>\r\n', '<p>29 years</p>\r\n', '2', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, '2019-04-15', 2),
(3, '<p><strong>A father is 4 times as old as his son. 8 years hence, the ratio of father&rsquo;s age to the son&rsquo;s age will be 20:7. What is the sum of their present ages?</strong>&nbsp;</p>', '<p>50</p>\r\n', '<p>45</p>\r\n', '<p>56</p>\r\n', '<p>78</p>\r\n', '3', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, '2019-04-15', 3),
(4, '<p><strong>A man goes to Mumbai from Pune at a speed of 4 km/hr and returns to Pune at speed of 6km/hr. What is his average speed of the entire journey?</strong></p>', '<p>4.8km/hr</p>\r\n', '<p>4.6km/hr</p>\r\n', '<p>6.8km/hr</p>\r\n', '<p>2.8km/hr</p>\r\n', '2', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 1, 1, '2019-04-15', 2),
(5, '<p><strong>P, Q and R are in a cycle race of 4500 meters. P cycles twice as fast as Q. R cycles 1/3<sup>rd</sup>&nbsp;as fast as Q. R completes the race in 45 minutes. Then where was Q from the finishing line when P finished the race?</strong>&nbsp;</p>', '<p>300 m</p>\r\n', '<p>3000 m</p>\r\n', '<p>400 m</p>\r\n', '<p>305 m</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 1, 1, '2019-04-15', 2),
(6, '<p><strong>A walks from points Jammu to Delhi and at the same time B starts walking from Delhi to Jammu. After passing each other, they complete their journeys in 361 hours and 289 hours, respectively. Find the ratio of speed of A to that of B?</strong>&nbsp;</p>', '<p>17:19</p>\r\n', '<p>174:196</p>\r\n', '<p>228:19</p>\r\n', '<p>17:1988</p>\r\n', '4', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 1, 1, '2019-04-15', 2),
(8, '<p><strong>&nbsp;&nbsp;A starts walking at 4 kmph and 4 hours after his start B starts cycling at 10 kmph. After how much distance will B catch up with A?</strong>&nbsp;</p>', '<p>26.2 km</p>\r\n', '<p>29.2 km</p>\r\n', '<p>23.2 km</p>\r\n', '<p>21.2 km</p>\r\n', '4', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 1, 1, '2019-04-15', 1),
(9, '', '', '', '', '', '', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 0, 0, '', 1),
(10, '<p>1 + 1=?</p>', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 6, 1, 1, '2019-04-27', 2),
(11, '<p><img alt=\\"\\\\sqrt{2^2 }\\" src=\\"http://latex.codecogs.com/gif.latex?%5Csqrt%7B2%5E2%20%7D\\" />= ?</p>', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '4', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 6, 1, 1, '2019-04-29', 1),
(12, '<p><img alt=\\"\\\\binom{n-1}{n}\\" src=\\"http://latex.codecogs.com/gif.latex?%5Cbinom%7Bn-1%7D%7Bn%7D\\" /></p>', '<p>n</p>\r\n', '<p>n-1</p>\r\n', '<p>n<sup>20</sup></p>\r\n', '<p>0</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 6, 1, 1, '2019-05-01', 1),
(13, '<p>Write an essay on My Nation</p>', '', '', '', '', '', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 7, 1, 1, '2019-05-07', 2),
(14, '<p>Write an essay on My Parents</p>', '', '', '', '', '', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 8, 1, 1, '2019-05-07', 2),
(15, '<p><img alt=\\"(a+b)^2\\" src=\\"http://latex.codecogs.com/gif.latex?%28a&amp;plus;b%29%5E2\\" />=?</p>', '<p><img alt="a^2 + b^2 +2abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;2abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +3abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;3abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +4abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;4abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +5abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;5abc" /></p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 1),
(16, '<p><strong><img alt=\\"square-root\\" src=\\"https://mba.hitbullseye.com/sites/default/files/square-root.svg\\" /></strong></p>', '<p>369</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>498</p>\r\n', '<p>380</p>\r\n', '<p>400</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 2),
(17, '<p>84.95% of 280 + &radic;? = 253.001</p>', '<p>256</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>260</p>\r\n', '<p>18</p>\r\n', '<p>9</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 1),
(18, '<p><strong><img alt=\\"10008.99^2-10009.001\\\\sqrt{3589X0.4987}=?\\" src=\\"http://latex.codecogs.com/gif.latex?10008.99%5E2-10009.001%5Csqrt%7B3589X0.4987%7D%3D%3F\\" /></strong></p>', '<p>3,000</p>\r\n', '<p>30,0000</p>\r\n', '<p>5000</p>\r\n', '<p>6000</p>\r\n', '3', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 2),
(19, '<p>An object moves from point A to point B to point C, then back to point B and then to point C along the line shown in the figure below.&nbsp;<br />a) Find the distance covered by the moving object.&nbsp;</p><p><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/file1.png\\" style=\\"height:165px; width:721px\\" /></p>', '<p>12 km</p>\r\n', '<p>9 km</p>\r\n', '<p>10 km</p>\r\n', '<p>80 km</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 1),
(20, '<p>An object moves from point A to point C along the rectangle shown in the figure below.&nbsp;<br />a) Find the distance covered by the moving object.&nbsp;<br /><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/file4.png\\" style=\\"height:200px; width:242px\\" /></p>', '<p>2 km</p>\r\n', '<p>3 km</p>\r\n', '<p>4 km</p>\r\n', '<p>5 km</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 2),
(21, '<p>2a + 3a=?</p>', '<p>5a</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-08', 1),
(22, '<p><img alt=\\"\\\\log_{5}(x^2-5)=?\\" src=\\"http://latex.codecogs.com/gif.latex?%5Clog_%7B5%7D%28x%5E2-5%29%3D%3F\\" /></p>', '<p><img alt="\\log_{5}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7B5%7D%28y%5E2-5%29" /></p>\n', '<p><img alt="\\log_{e}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7Be%7D%28y%5E2-5%29" /></p>\r\n', '<p><img alt="\\log_{3}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7B3%7D%28y%5E2-5%29" /></p>\r\n', '<p><img alt="\\log_{e}(z^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7Be%7D%28z%5E2-5%29" /></p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-13', 2),
(23, '<p>if 3x(<img alt=\\"\\\\Delta\\" src=\\"http://latex.codecogs.com/gif.latex?%5CDelta\\" />-2)=1,<img alt=\\"\\\\Delta\\" src=\\"http://latex.codecogs.com/gif.latex?%5CDelta\\" /> is what?</p>', '<p>12</p>\r\n', '<p>9</p>\r\n', '<p>8</p>\r\n', '<p>12</p>\r\n', '3', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, '2019-05-13', 1),
(24, '<p>A right triangle with sides 3 cm, 4 cm and 5 cm is rotated the side of 3 cm to form a cone. The volume of the cone so formed is:</p>', '<p><img alt="12\\Pi cm^3" src="http://latex.codecogs.com/gif.latex?12%5CPi%20cm%5E3" /></p>\r\n', '<p><img alt="15\\Pi cm^3" src="http://latex.codecogs.com/gif.latex?15%5CPi%20cm%5E3" /></p>\r\n', '<p><img alt="16\\Pi cm^3" src="http://latex.codecogs.com/gif.latex?16%5CPi%20cm%5E3" /></p>\r\n', '<p><img alt="20\\Pi cm^3" src="http://latex.codecogs.com/gif.latex?20%5CPi%20cm%5E3" /></p>\r\n', '1', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{	ext{length}}{	ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 10, 1, 1, '2019-05-14', 2),
(25, '<p><em>Either enter an exact answer&nbsp;<img alt=\\"\\\\pi\\" src=\\"http://latex.codecogs.com/gif.latex?%5Cpi\\" /> in terms of&nbsp;\\\\pi&pi;pi&nbsp;or use&nbsp;3.143.143, point, 14&nbsp;for&nbsp;\\\\pi&pi;pi.&nbsp;<img alt=\\"\\\\pi\\" src=\\"http://latex.codecogs.com/gif.latex?%5Cpi\\" /></em></p><p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/image.svg\\" style=\\"height:180px; width:146px\\" /></em></p>', '<p>12</p>\r\n', '<p>134.89</p>\r\n', '<p>123.76</p>\r\n', '<p>19</p>\r\n', '3', '<p>The correct answer is A; 6. Use a ratio of&nbsp;frac{ ext{length}}{ ext{width}}widthlengthâ€‹&nbsp;and write the proportion:</p>\r\n\r\n<p><img alt="lim_{x-&gt;0}" src="http://latex.codecogs.com/gif.latex?%5Clim_%7Bx-%3E0%7D" /></p>\r\n\r\n<p>Cross-multiply and then divide by 8:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 10, 1, 1, '2019-05-14', 1),
(26, '<p>Use our free, printable reading comprehension passage exercises to improve your student&#39;s reading skills! Recognizing letters and words is an important first step in learning to read. However, it is only a first step; it is vital that students comprehend, or understand, what they are reading. They must be able to get the meaning of the text: What is the author telling the reader? This is reading comprehension, and it is an essential skill for success in school and in the real world. Below are our reading comprehension worksheets grouped by grade, that include passages and related questions. Click on the title to view the printable activities in each grade range, or to read the details of each worksheet. They are free for use in the home or in the classroom. Be sure to check out our&nbsp;&nbsp;activities too!</p><p>Use our free, printable reading comprehension passage exercises to improve your student&#39;s reading skills! Recognizing letters and words is an important first step in learning to read. However, it is only a first step; it is vital that students comprehend, or understand, what they are reading. They must be able to get the meaning of the text: What is the author telling the reader? This is reading comprehension, and it is an essential skill for success in school and in the real world. Below are our reading comprehension worksheets grouped by grade, that include passages and related questions. Click on the title to view the printable activities in each grade range, or to read the details of each worksheet. They are free for use in the home or in the classroom. Be sure to check out our&nbsp;&nbsp;activities too!fhgfh</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Use our free, printable reading comprehension passage exercises to improve your student&#39;s reading skills! Recognizing letters and words is an important first step in learning to read. However, it is only a first step; it is vital that students comprehend, or understand, what they are reading. They must be able to get the meaning of the text: What is the author telling the reader? This is reading comprehension, and it is an essential skill for success in school and in the real world. Below are our reading comprehension worksheets grouped by grade, that include passages and related questions. Click on the title to view the printable activities in each grade range, or to read the details of each worksheet. They are free for use in the home or in the classroom. Be sure to check out our&nbsp;&nbsp;activities too!</p><p>Use our free, printable reading comprehension passage exercises to improve your student&#39;s reading skills! Recognizing letters and words is an important first step in learning to read. However, it is only a first step; it is vital that students comprehend, or understand, what they are reading. They must be able to get the meaning of the text: What is the author telling the reader? This is reading comprehension, and it is an essential skill for success in school and in the real world. Below are our reading comprehension worksheets grouped by grade, that include passages and related questions. Click on the title to view the printable activities in each grade range, or to read the details of each worksheet. They are free for use in the home or in the classroom. Be sure to check out our&nbsp;&nbsp;activities too!</p>', '<p>Use our free, printable reading comprehension passage</p>\r\n', '<p>Use our free, printable reading comprehension passage</p>\r\n', '<p>Use our free, printable reading comprehension passage</p>\r\n', '<p>Use our free, printable reading comprehension passage</p>\r\n', '1', '', 5, 1, 1, '2019-05-20', 2),
(27, '<p><img alt=\\"\\\\sqrt{12}\\" src=\\"http://latex.codecogs.com/gif.latex?%5Csqrt%7B12%7D\\" /></p>', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '2', '', 11, 1, 1, '2019-05-27', 2),
(28, '<p>What is called &quot;Flora&quot;</p>', '<p>Animal kingdom</p>\r\n', '<p>Plant Kingdom</p>\r\n', '<p>Both&nbsp; a and b</p>\r\n', '<p>Neither a nor b</p>\r\n', '2', '', 12, 1, 1, '2019-05-27', 3),
(29, '<p>Types of plant</p>', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '<p>6</p>\r\n', '1', '', 12, 1, 1, '2019-05-27', 3),
(30, '<p>Name the process by which plants cook food.</p>', '<p>Transpiration</p>\r\n', '<p>Breathing</p>\r\n', '<p>Photosynthesis</p>\r\n', '<p>Sweating</p>\r\n', '3', '', 12, 1, 1, '2019-05-27', 3),
(31, '<p>Which tissue carry water from root to plant body?</p>', '<p>Phloum</p>\r\n', '<p>Xylum</p>\r\n', '<p>Guard cell</p>\r\n', '<p>Cell Wall</p>\r\n', '2', '', 12, 1, 1, '2019-05-27', 3),
(32, '<p>Which tisue carry food to all part of plant body?</p>', '<p>Phloum</p>\r\n', '<p>Xylum</p>\r\n', '<p>Guard cell</p>\r\n', '<p>Cellwall</p>\r\n', '1', '', 12, 1, 1, '2019-05-27', 3),
(33, '<p>Which is known as the kitchen of plant?</p>', '<p>Root</p>\r\n', '<p>Stem</p>\r\n', '<p>Seed</p>\r\n', '<p>Leaf</p>\r\n', '4', '', 12, 1, 1, '2019-05-27', 3),
(34, '<p>Name the process by which plant excrite the waste water?</p>', '<p>Transpiration</p>\r\n', '<p>Sweating</p>\r\n', '<p>Breathing</p>\r\n', '<p>Bathing</p>\r\n', '1', '', 12, 1, 1, '2019-05-27', 3),
(35, '<p>What does plant need to prepare its food</p>', '<p>co2,water,sunlight,chlorophyl.</p>\r\n', '<p>only water</p>\r\n', '<p>only sunlight</p>\r\n', '<p>oxyzen</p>\r\n', '1', '', 12, 1, 1, '2019-05-27', 3),
(36, '<p>Why does plant have green leaf?</p>', '<p>due to&nbsp; presence of water.</p>\r\n', '<p>due to&nbsp; presence of sunlight.</p>\r\n', '<p>due to&nbsp; presence of chlorophyl.</p>\r\n', '<p>due to&nbsp; presence of oxyzen.</p>\r\n', '3', '', 12, 1, 1, '2019-05-27', 3),
(37, '<p>What is shoot?</p>', '<p>Top most pat of plant</p>\r\n', '<p>middle part</p>\r\n', '<p>part above the ground</p>\r\n', '<p>part down the ground</p>\r\n', '3', '', 12, 1, 1, '2019-05-27', 3),
(38, '<p><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/images.png\\" style=\\"height:225px; width:212px\\" />&nbsp;Find the area of the circle whose radius is 7cm.&nbsp;</p>', '<p>150 cm</p>\r\n', '<p>154cm</p>\r\n', '<p>100cm</p>\r\n', '<p>120cm</p>\r\n', '2', '<p>Since radius of the circle is 7 cm.</p>\r\n\r\n<p>then Area of the circle=pii * r<sup>2</sup></p>\r\n\r\n<p>=&gt;22/7*7*7=154 cm<sup>2</sup></p>\r\n', 13, 1, 1, '2019-05-27', 3),
(39, '<p>&nbsp;Jatin&nbsp; &nbsp;wants to cover the floor of a room 3 m wide and 4 m long by squared tiles. If each square tile is of side 0.5 m, then find the number of tiles required to cover the floor of the room.</p>', '<p>20</p>\r\n', '<p>30</p>\r\n', '<p>40</p>\r\n', '<p>50</p>\r\n', '1', '', 13, 1, 1, '2019-08-09', 1),
(40, '<p>Find the areas of the rectangles whose sides are:<br />(a) 7 cm and 4 cm<br />&nbsp;</p>', '<p>12</p>\r\n', '<p>3</p>\r\n', '<p>13</p>\r\n', '<p>6</p>\r\n', '1', '', 13, 1, 1, '2019-08-09', 2),
(41, '<p><em>&nbsp;Find the perimeter of each of the following shapes:</em></p><p>&nbsp;</p><p><em><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/capture-png4 (1).png\\" style=\\"height:123px; width:202px\\" /></em></p>', '<p>300 cm</p>\r\n', '<p>500 cm</p>\r\n', '<p>600 cm</p>\r\n', '<p>700 cm</p>\r\n', '3', '', 13, 1, 1, '2019-08-09', 3),
(42, '<h3><span style="font-size:24px">What is a career that you might appreciate working in? What are some of your skills or abilities that might help you to do well in this line of work?</span></h3>', '', '', '', '', '', '', 33, 1, 1, '2019-09-06', 3),
(43, '<p>The box-and-whisker plot shown below&nbsp;represents the weight, in kilograms, of&nbsp;dog patients at a veterinary clinic.</p><p><img src=\\"http://78.46.117.226/education/allphotos/image.png\\" style=\\"height:98px; width:403px\\" /></p><p>What is the median of the data?</p><p>&nbsp;</p>', '<p>25</p>\r\n', '<p>35</p>\r\n', '<p>45</p>\r\n', '<p>50</p>\r\n', '2', '', 32, 1, 1, '2019-09-06', 2),
(44, '<p>Which matrix is equivalent to the&nbsp;expression</p><p>&nbsp;</p><p><img alt=\\"\\\\begin{bmatrix} 9\\\\\\\\ 4\\\\\\\\ 8 \\\\end{bmatrix}+\\\\begin{bmatrix} 0\\\\\\\\ 3\\\\\\\\ 1 \\\\end{bmatrix}\\" src=\\"http://latex.codecogs.com/gif.latex?%5Cbegin%7Bbmatrix%7D%209%5C%5C%204%5C%5C%208%20%5Cend%7Bbmatrix%7D&amp;plus;%5Cbegin%7Bbmatrix%7D%200%5C%5C%203%5C%5C%201%20%5Cend%7Bbmatrix%7D\\" /></p>', '<p><img alt="\\begin{bmatrix} 0\\\\ 12\\\\ 8 \\end{bmatrix}" src="http://latex.codecogs.com/gif.latex?%5Cbegin%7Bbmatrix%7D%200%5C%5C%2012%5C%5C%208%20%5Cend%7Bbmatrix%7D" /></p>\r\n', '<p><img alt="\\begin{bmatrix} 0\\\\ 7\\\\ 8 \\end{bmatrix}" src="http://latex.codecogs.com/gif.latex?%5Cbegin%7Bbmatrix%7D%200%5C%5C%207%5C%5C%208%20%5Cend%7Bbmatrix%7D" /></p>\r\n', '<p><img alt="\\begin{bmatrix} 9\\\\ 7\\\\ 8 \\end{bmatrix}" src="http://latex.codecogs.com/gif.latex?%5Cbegin%7Bbmatrix%7D%209%5C%5C%207%5C%5C%208%20%5Cend%7Bbmatrix%7D" /></p>\r\n', '<p><img alt="\\begin{bmatrix} 9\\\\ 7\\\\ 9 \\end{bmatrix}" src="http://latex.codecogs.com/gif.latex?%5Cbegin%7Bbmatrix%7D%209%5C%5C%207%5C%5C%209%20%5Cend%7Bbmatrix%7D" /></p>\r\n', '4', '', 32, 1, 1, '2019-09-06', 1),
(45, '<p>Which is the best unit to use when&nbsp;measuring the length of a truck?</p>', '<p>g rams</p>\r\n', '<p>m eters</p>\r\n', '<p>k ilograms</p>\r\n', '<p>k ilometers</p>\r\n', '4', '', 32, 1, 1, '2019-09-06', 1),
(46, '<p>Which one of the answer choices is a&nbsp;prime number?</p>', '<p>315</p>\r\n', '<p>317</p>\r\n', '<p>327</p>\r\n', '<p>333</p>\r\n', '2', '', 32, 1, 1, '2019-09-06', 2),
(47, '<p>What is the value of the numerical expression&nbsp;<img alt=\\"\\\\sqrt{25-16}\\" src=\\"http://latex.codecogs.com/gif.latex?%5Csqrt%7B25-16%7D\\" /></p>', '<p>1</p>\r\n', '<p>3</p>\r\n', '<p>9</p>\r\n', '<p>41</p>\r\n', '2', '', 32, 1, 1, '2019-09-06', 1),
(48, '<p>HASTY</p>', '<p>careful</p>\r\n', '<p>critical</p>\r\n', '<p>developed</p>\r\n', '<p>rushed</p>\r\n', '2', '', 16, 1, 1, '2019-09-07', 2),
(49, '<p>AGGRAVATION</p>', '<p>combination</p>\r\n', '<p>congregation</p>\r\n', '<p>plantation</p>\r\n', '<p>vexation</p>\r\n', '1', '', 16, 1, 1, '2019-09-07', 2),
(50, '<p>CHARISMA</p>', '<p>appeal</p>\r\n', '<p>malice</p>\r\n', '<p>mercy</p>\r\n', '<p>vileness</p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 2),
(51, '<p>OPTIMISTIC</p>', '<p>buoyant</p>\r\n', '<p>gloomy</p>\r\n', '<p>morbid</p>\r\n', '<p>silly</p>\r\n', '1', '', 16, 1, 1, '2019-09-07', 2),
(52, '<p>ANTICS</p>', '<p>dancing</p>\r\n', '<p>foolery</p>\r\n', '<p>relics</p>\r\n', '<p>scurrying</p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 2),
(53, '<p>INFERENCE</p>', '<p>block</p>\r\n', '<p>conclusion</p>\r\n', '<p>interview</p>\r\n', '<p>withdrawal</p>\r\n', '2', '', 16, 1, 1, '2019-09-07', 2),
(54, '<p>CONTEMPT</p>', '<p>appproval</p>\r\n', '<p>confinement</p>\r\n', '<p>disrespect</p>\r\n', '<p>selfishness</p>\r\n', '2', '', 16, 1, 1, '2019-09-07', 2),
(55, '<p>GREGARIOUS</p>', '<p>chic</p>\r\n', '<p>extensive</p>\r\n', '<p>harmonious</p>\r\n', '<p>outgoing</p>\r\n', '2', '', 16, 1, 1, '2019-09-07', 2),
(56, '<p>QUELL</p>', '<p>mission</p>\r\n', '<p>spiral</p>\r\n', '<p>spirit</p>\r\n', '<p>suppress</p>\r\n', '4', '', 16, 1, 1, '2019-09-07', 2),
(57, '<p>MALLEABLE</p>', '<p>b elievable</p>\r\n', '<p>p liable</p>\r\n', '<p>s piteful</p>\r\n', '<p>w rongful</p>\r\n', '4', '', 16, 1, 1, '2019-09-07', 2),
(58, '<p>FELICITY</p>', '<p>bliss</p>\r\n', '<p>e ase</p>\r\n', '<p>p rivation</p>\r\n', '<p>s orrow</p>\r\n', '1', '', 16, 1, 1, '2019-09-07', 1),
(59, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">PRUDENCE</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c aution</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">h esitation</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p rinciples</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">t yranny</span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 16, 1, 1, '2019-09-07', 2),
(60, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">RENOUNCE</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r elinquish</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r evise</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>sing</p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">w hisper</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 2),
(61, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">USURP</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i nspire</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r evolt</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">seize</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s lip</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 2),
(62, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">EXPLOIT</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a buse</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a chieve</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i nvent</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eimburse</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 1),
(63, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">MYRIAD</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c ountless</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d ream</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">n ymph</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>v<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">ision</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 16, 1, 1, '2019-09-07', 1),
(64, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">PLACID</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d ull</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>l<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">imp</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>s<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">alty</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>s<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">erene</span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 16, 1, 1, '2019-09-07', 1),
(65, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">PERUSE</span></span></span></span></span></span></span></span></span></p>', '<p>d<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">efine</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d etermine</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s crutinize</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s harpen</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 1),
(66, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">BRACKISH</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a rgumentative</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">b riny</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m enacing</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">n oxious</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 16, 1, 1, '2019-09-07', 1),
(67, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">REBUKE</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d ivorce</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">f righten</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eject</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eprimand</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 16, 1, 1, '2019-09-07', 1),
(68, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Buckingham Palace has had several <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">structural additions as new wings were <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">added, â€‘â€‘â€‘â€‘â€‘â€‘â€‘ the building</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e nlarging</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i mpairing</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m inimizing</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">w renching</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 1),
(69, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Archimedes is generally â€‘â€‘â€‘â€‘â€‘â€‘â€‘ as the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">greatest mathematician of antiquity; his <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">work has provided a critical foundation <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">for many of today&rsquo;s mathematicians, <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">physicists, and engineers.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a cclaimed</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d oubted</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">n eglected</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r equired</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 2);
INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct`, `solution`, `topic_id`, `status`, `view`, `pdate`, `difficulty`) VALUES
(70, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Mahatma Gandhi led India to <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">independence by employing nonviolent <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">protests; he vehemently opposed any <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ tactics.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c ompassionate</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d iplomatic</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p hysical</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p ractical</span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 18, 1, 1, '2019-09-07', 2),
(71, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Christian Barnard is â€‘â€‘â€‘â€‘â€‘â€‘â€‘ for being the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">first surgeon to successfully perform a <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">heart transplant.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a bashed</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">o stracized</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r enowned</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s hirked</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 18, 1, 1, '2019-09-07', 1),
(72, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">The board&#39;s economic initiative <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">advocated a(n) â€‘â€‘â€‘â€‘â€‘â€‘â€‘ in corporate <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">spending, decreasing the amount of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">money needed for the annual budget.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e xpansion</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eduction</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s urge</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s welter</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 18, 1, 1, '2019-09-07', 2),
(73, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Afua â€‘â€‘â€‘â€‘â€‘â€‘â€‘ the city, but, despite her <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">efforts, she couldn&#39;t find the out-of-print <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">novel in any bookstores or libraries.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m apped</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r esearched</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s acked</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s coured</span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 18, 1, 1, '2019-09-07', 3),
(74, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">When Antonio heard the chance of rain <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">was nearly 100 percent, he let out a(n) <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ sigh at the thought of his afternoon <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">baseball game.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e nergetic</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p eaceful</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p laintive</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">q uiet</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 18, 1, 1, '2019-09-07', 1),
(75, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Known throughout Europe for her <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">ballooning exploits, Sophie Blanchard <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">was the first female professional hot air <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">balloonist, travelling on more than sixty <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ during her career.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="color:#333333"><span style="font-family:DejaVuSerif">&nbsp;</span></span></span></span><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a scents</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">o ffspring</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s windles</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">t rademarks</span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 18, 1, 1, '2019-09-07', 1),
(76, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">The hostess mingled â€‘â€‘â€‘â€‘â€‘â€‘â€‘ with her <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">guests, greeting everyone warmly.</span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c ordially</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">d isinterestedly</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e cstatically</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">n ervously</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 1),
(77, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Like the Egyptian pyramids, the Bermuda <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">Triangle, and other mysterious <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">phenomena, Stonehenge remains one of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">the world&rsquo;s greatest â€‘â€‘â€‘â€‘â€‘â€‘â€‘.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e nigmas</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">g ardens</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p redicaments</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s culptures</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 2),
(78, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">As far as could be ascertained, the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">diagram was â€‘â€‘â€‘â€‘â€‘â€‘â€‘ with errors, making it <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">thoroughly useless for educating others.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c onjoined</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i ntrepid</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eplete</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">t imorous</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 1),
(79, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Although he sometimes â€‘â€‘â€‘â€‘â€‘â€‘â€‘ ice cream <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">for dinner, Peter knew that indulging too <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">much would â€‘â€‘â€‘â€‘â€‘â€‘â€‘ his health.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c raved. . . ruin</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">w anted. . . desire</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p repared. . . support</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r efused. . . break</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 1),
(80, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Despite the exceedingly early hour of the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">class, the students were as â€‘â€‘â€‘â€‘â€‘â€‘â€‘ and <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ as in the afternoon.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">f air . . . presumptuous</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">l oud . . . rambunctious</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m undane . . . vivacious</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m uscled . . . concerned</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 18, 1, 1, '2019-09-07', 1),
(81, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Like many other â€‘â€‘â€‘â€‘â€‘â€‘â€‘ viral infections, his <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">disease would never be â€‘â€‘â€‘â€‘â€‘â€‘â€‘; however, <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">his health care team did their best to <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">ease his suffering.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c hronic. . . eradicated</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m inimized . . . accountable</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p ickled . . . terminal</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">t rivial . . . shifted</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 2),
(82, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Chess is a game of strategy; players <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">attempt to â€‘â€‘â€‘â€‘â€‘â€‘â€‘ their opponent&rsquo;s next <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ based on the moves that have <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">already taken place.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">f athom . . . mistake</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">f oresee . . . maneuver</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i nfer . . . nuance</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">i nstigate . . . loss</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 18, 1, 1, '2019-09-07', 1),
(83, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Although the Rocky Mountains seemed <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">treacherous, the Cullen brothers found <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">that climbing them was one of the most <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">â€‘â€‘â€‘â€‘â€‘â€‘â€‘ and â€‘â€‘â€‘â€‘â€‘â€‘â€‘ experiences of their youth.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">c hallenging &hellip; frustrating</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">m emorable &hellip; negating</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p ositive &hellip; rewarding</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p rofound &hellip; eclipsing</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 18, 1, 1, '2019-09-07', 1),
(84, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">The husband and wife were very similar <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">in their â€‘â€‘â€‘â€‘â€‘â€‘â€‘ lifestyles: both spent money <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">freely and proudly displayed the â€‘â€‘â€‘â€‘â€‘â€‘â€‘ of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">their home to their less wealthy <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">neighbors.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">f rugal . . . misery</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">l avish . . . opulence</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">l uxurious . . . deficiency</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s tingy . . . magnificence</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 18, 1, 1, '2019-09-07', 1),
(85, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Adrian wondered why the â€‘â€‘â€‘â€‘â€‘â€‘â€‘ in most of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">the fairytales was female; he thought <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">there was definitely a gender â€‘â€‘â€‘â€‘â€‘â€‘â€‘. </span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">a ntagonist . . . bias</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">e nmity . . . exception</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">h ero . . . fallacy</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p rotagonist . . . embargo</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 18, 1, 1, '2019-09-07', 1),
(86, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Chenille&rsquo;s colleagues are right to think <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">that she is quite â€‘â€‘â€‘â€‘â€‘â€‘â€‘, because in my <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">experience, she is thoroughly â€‘â€‘â€‘â€‘â€‘â€‘â€‘. </span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">g ullible &hellip; spontaneous</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">l ighthearted &hellip; neat</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">o bdurate . . . uncompromising</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p unctual &hellip; unreliable</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 18, 1, 1, '2019-09-07', 1),
(87, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Emily was trying to stay quiet, â€‘â€‘â€‘â€‘â€‘â€‘â€‘ her <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">laughter by holding her hand â€‘â€‘â€‘â€‘â€‘â€‘â€‘ over <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">her mouth.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">p ausing. . . imperceptibly</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r eleasing. . . casually</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">r epressing. . . extremely</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">s tifling. . . steadfastly</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 18, 1, 1, '2019-09-07', 2),
(88, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Greg has a total of 15 coins in dimes and <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">quarters. If he has a total of $1.95, how <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">many dimes and quarters does he have? </span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p><p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">(Note: one quarter = $0.25; 1 dime <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">=$0.10)</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">2 quarters and 13 dimes</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">5 quarters and 10 dimes</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">6 quarters and 9 dimes</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">3 quarters and 12 dimes</span></span></span></span></span></span></span></span></span></p>\r\n', '1', '', 20, 1, 1, '2019-09-07', 2);
INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct`, `solution`, `topic_id`, `status`, `view`, `pdate`, `difficulty`) VALUES
(89, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Kyle and Megan are playing a game using <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">two dice. Each player rolls two dice, <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">numbered 1 through 6, and the sum of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">the numbers is recorded. </span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p><p><em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\">Kyle receives a point if his sum is a 9. <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">Megan receives a point if her sum is <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">either 9 or 3.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></em></p><p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Who has a greater probability of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">receiving a point?</span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">K yle</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">K yle and Megan have the same <span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">probability of receiving a point.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">M egan</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">T here is not enough information given <span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">to determine the answer.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n', '4', '', 20, 1, 1, '2019-09-07', 1),
(90, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Rectangle </span></span></span></span></span></span></span></span></span><em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\">ABCD </span></span></span></span></span></span></span></span></span></em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">is similar to rectangle <em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\">WXYZ</span></span></span></span></span></span></span></span></span></em></span></span></span></span></span></span></span></span></span></p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907125947-1.png\\" style=\\"height:143px; width:372px\\" /></p><p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">What is the length of side </span></span></span></span></span></span></span></span></span><em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif-Italic\\"><span style=\\"font-size:medium\\">AB</span></span></span></span></span></span></span></span></span></em><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">?</span></span></span></span></span></span></span></span></span></p><p>&nbsp;</p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">2 in</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">6 in</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">7 in</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">1 0 in</span></span></span></span></span></span></span></span></span></p>\r\n', '2', '', 20, 1, 1, '2019-09-07', 1),
(91, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">The graph below shows the distance <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">Julian is from work after he drove away <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">from work</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907130417-2.png\\" style=\\"height:353px; width:367px\\" /></p><p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">During which time interval was Julian&rsquo;s <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">driving speed the fastest?</span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">0 to 3 minutes</span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">3 to 5 minutes</span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">5 to 7 minutes</span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">7 to 10 minutes</span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 19, 1, 1, '2019-09-07', 1),
(92, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Which polyhedron can be constructed <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">from the net shown below?</span></span></span></span></span></span></span></span></span></span></span></span></p><p>&nbsp;</p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907130712-2.png\\" style=\\"height:180px; width:244px\\" /></p>', '<p><img src="http://78.46.117.226/education/allphotos/image-20190907130749-3.png" style="height:211px; width:215px" /></p>\r\n', '<p><img src="http://78.46.117.226/education/allphotos/image-20190907130800-4.png" style="height:207px; width:225px" /></p>\r\n', '<p><img src="http://78.46.117.226/education/allphotos/image-20190907130834-5.png" style="height:216px; width:237px" /></p>\r\n', '<p><img src="http://78.46.117.226/education/allphotos/image-20190907130856-6.png" style="height:230px; width:277px" /></p>\r\n', '4', '', 19, 1, 1, '2019-09-07', 1),
(93, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">What is the value of the following <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">expression?</span></span></span></span></span></span></span></span></span></span></span></span></p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907132706-2.png\\" style=\\"height:73px; width:137px\\" /></p>', '<p>0</p>\r\n', '<p>1</p>\r\n', '<p>3</p>\r\n', '<p>5</p>\r\n', '3', '', 19, 1, 1, '2019-09-07', 2),
(94, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">A rectangle has a perimeter of 24 <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">centimeters. If the length and width of <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">the rectangle are measured in whole <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">centimeters, what is the greatest possible <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">area of the rectangle?</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">1 1 cm<sup>2</sup></span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">1 2 cm<sup>2</sup></span></span></span></span></span></span></span></span></span></p>\r\n', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">3 6 cm<sup>2</sup></span></span></span></span></span></span></span></span></span></p>\r\n', '<p>&nbsp;<span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">1 44 cm<sup>2</sup></span></span></span></span></span></span></span></span></span></p>\r\n', '3', '', 19, 1, 1, '2019-09-07', 2),
(95, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">If n&amp;=5n-6&nbsp;, what is the value of 7&amp;?</span></span></span></span></span></span></span></span></span></p>', '<p><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium"><span style="color:#333333"><span style="font-family:DejaVuSerif"><span style="font-size:medium">29</span></span></span></span></span></span></span></span></span></p>\n', '<p>35</p>\r\n', '<p>41</p>\r\n', '<p>42</p>\r\n', '1', '', 19, 1, 1, '2019-09-07', 1),
(96, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">If x-y=-9&nbsp;, which expression is equal <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">to y?</span></span></span></span></span></span></span></span></span></span></span></span></p>', '<p>-x+9</p>\r\n', '<p>-x-9</p>\r\n', '<p>x+9</p>\r\n', '<p>x-9</p>\r\n', '3', '', 19, 1, 1, '2019-09-07', 1),
(97, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">Which ordered pair is the solution to the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">system of equations shown below?</span></span></span></span></span></span></span></span></span></span></span></span></p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907133747-1.png\\" style=\\"height:107px; width:213px\\" /></p>', '<p>(-4,-11)</p>\r\n', '<p>(-2,-9)</p>\r\n', '<p>(2,-5)</p>\r\n', '<p>(4,-3)</p>\r\n', '4', '', 19, 1, 1, '2019-09-07', 1),
(98, '<p><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\"><span style=\\"color:#333333\\"><span style=\\"font-family:DejaVuSerif\\"><span style=\\"font-size:medium\\">A teacher begins to create the bar graph <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">of data shown below, but does not <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">complete it. The mean and median of the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">data are both equal to 6 and the data are <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">symmetric about this value. Given that <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">the left side of the graph is complete, <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">how many data points fall above the <span style=\\"color:#333333\\"><span style=\\"color:#333333\\"><span style=\\"color:#333333\\">value 8?</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p><p>&nbsp;</p><p><img src=\\"http://78.46.117.226/education/allphotos/image-20190907134048-1.png\\" style=\\"height:361px; width:437px\\" /></p>', '<p>2</p>\r\n', '<p>5</p>\r\n', '<p>7</p>\r\n', '<p>10</p>\r\n', '1', '', 19, 1, 1, '2019-09-07', 1),
(99, '<p>which is prime number?</p>', '<p>23</p>\r\n', '<p>22</p>\r\n', '<p>134</p>\r\n', '<p>356</p>\r\n', '2', '', 32, 1, 1, '2019-12-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `sid` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `trial` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `pdate`, `status`, `phone`, `lname`, `sid`, `location`, `trial`) VALUES
(1, '', 'sakshi@dkd.co.in', 'c33367701511b4f6020ec61ded352059', '2019-05-21', 1, '', '', '3', '', 1),
(6, '', 'sakshi1@dkd.co.in', 'e10adc3949ba59abbe56e057f20f883e', '2019-10-24', 1, '', '', '2', '', 1),
(7, '', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-05', 1, '', '', '3', '', 1),
(12, '', 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-14', 1, '', '', '3', '', 1),
(13, '', 'test2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-14', 1, '', '', '2', '', 1),
(14, '', 'test3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-15', 1, '', '', '4', '', 1),
(15, '', 'test4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-22', 1, '', '', '3', '', 1),
(16, '', 'test5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-31', 1, '', '', '4', '', 1),
(17, '', 'test6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-31', 1, '', '', '4', '', 1),
(18, '', 'jwangyz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-11', 1, '', '', '4', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1',
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `primarycontact` varchar(100) DEFAULT NULL,
  `secondarycontact` varchar(100) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `schooltype` varchar(250) DEFAULT NULL,
  `gradelevel` varchar(250) DEFAULT NULL,
  `competitiveness` int(11) DEFAULT NULL,
  `studenttype` int(11) DEFAULT NULL,
  `admissiontype` int(11) DEFAULT NULL,
  `graduates` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `status`, `view`, `name`, `address`, `primarycontact`, `secondarycontact`, `website`, `logo`, `locationid`, `email`, `schooltype`, `gradelevel`, `competitiveness`, `studenttype`, `admissiontype`, `graduates`) VALUES
(2, 1, 1, 'Rundle College Admissions', '4330 16th Street SW Calgary, AB T2T 4H9, Canada', '+1 403-250-2965', '', 'http://www.rundle.ab.ca/', 'MjAxOS0wMy0yMiAwMToyNzo0Nw==_download.jpg', 3, 'collegeadmissions@rundle.ab.ca', 'Independent, Day', 'PK-12', 4, 1, 2, ''),
(3, 1, 1, 'Strathcona-Tweedsmuir School', 'RR 2 Okotoks, AB T1S 1A2, Canada', '+1 403-938-4431', '', 'http://www.rundle.ab.ca/', 'MjAxOS0wMy0yMiAwMTozNzozMA==_download-1-.jpg', 3, 'admissions@sts.ab.ca', 'Independent, Day', '1-12', 4, 1, 2, 'test'),
(4, 1, 1, 'Appleby College Admissions', '540 Lakeshore Rd W Oakville, ON L6K 3P1, Canada', '', '', 'http://www.appleby.on.ca/', 'MjAxOS0wNC0wOCAxMToyMzozNw==_download.jpg', 5, 'mjonah@appleby.on.ca', 'Independent, Day, Boarding', '7-12', 3, 1, 2, 'Students have gained acceptance to prestigious schools, including: Johns Hopkins University, Dartmouth College, Princeton University, and Cornell University.'),
(5, 1, 1, 'Appleby College Admissions New', 'Ontario,Canada', '12365787', '12365787', '', '', 5, 'test@hotmail.com', '', 'A', 1, 2, 2, ''),
(6, 1, 1, 'Amity School', 'Delhi', '9879654335', '9870675676', 'amity.com', '', 12, 'amity@gmail.com', 'Business', 'High', 2, 1, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `studenttype`
--

CREATE TABLE `studenttype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttype`
--

INSERT INTO `studenttype` (`id`, `name`, `status`, `view`) VALUES
(1, 'Co-ed', 1, 1),
(2, 'All Boys', 1, 1),
(3, 'All Girls', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(250) NOT NULL,
  `timebound` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `promptbased` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `timebound`, `name`, `status`, `promptbased`, `view`) VALUES
(1, 1, 'Auditory Comprehension', 0, 0, 0),
(2, 1, 'Reading Comprehension', 1, 0, 1),
(3, 1, 'Mathematics', 0, 0, 0),
(4, 0, 'Writing Sample', 0, 1, 0),
(5, 1, 'Verbal Reasoning', 1, 0, 0),
(6, 1, 'Quantitative Reasoning', 1, 0, 1),
(7, 1, 'Mathematics Achievement', 1, 0, 1),
(8, 1, 'Essay', 1, 1, 1),
(9, 1, 't', 1, 0, 0),
(10, 1, 'General Science', 0, 0, 0),
(11, 1, 'Maths', 0, 0, 0),
(12, 1, 'Verbal Reasonings', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subtype`
--

CREATE TABLE `subtype` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `attachedid` int(250) NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtype`
--

INSERT INTO `subtype` (`id`, `name`, `attachedid`, `status`, `view`) VALUES
(3, 'Geometry', 12, 1, 1),
(6, 'Whole Numbers', 12, 1, 1),
(7, 'Decimals,Percents and Fractions', 12, 1, 1),
(8, 'My Nation', 13, 1, 1),
(9, 'Alzebra', 14, 1, 0),
(10, 'Alzebra', 14, 1, 0),
(11, 'Alzebraic Concepts', 14, 1, 1),
(12, 'Supporting Idea', 6, 1, 1),
(13, 'My parents', 16, 1, 1),
(14, 'Volume and surface  area', 15, 1, 1),
(15, 'Area', 7, 1, 1),
(16, 'Science', 17, 1, 1),
(17, 'Mensuration-JW', 18, 1, 1),
(18, 'Distribution', 10, 1, 1),
(19, 'Synonyms', 19, 1, 1),
(20, 'Sentence Completions', 19, 1, 1),
(21, 'Word Problems', 20, 1, 1),
(22, 'Quantitative Comparison Questions', 20, 1, 1),
(23, 'Numbers and Operations', 20, 1, 1),
(24, 'Algebra', 20, 1, 1),
(25, 'Geometry', 20, 1, 1),
(26, 'Measurement', 20, 1, 1),
(27, 'Data Analysis & Probability', 20, 1, 1),
(28, 'Problem Solving', 20, 1, 1),
(29, 'Numbers and Operations', 22, 1, 1),
(30, 'Algebra', 22, 1, 1),
(31, 'Geometry', 22, 1, 1),
(32, 'Measurement', 22, 1, 1),
(33, 'Data Analysis & Probability', 22, 1, 1),
(34, 'Problem Solving', 22, 1, 1),
(35, 'Essay', 23, 1, 1),
(36, 'Main Idea', 21, 1, 1),
(37, 'Supporting Idea', 21, 1, 1),
(38, 'Inference', 21, 1, 1),
(39, 'Vocabulary', 21, 1, 1),
(40, 'Organization and Logic', 21, 1, 1),
(41, 'Tone, Style and Figurative Language', 21, 1, 1),
(42, 'Test Subtype', 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testattempted`
--

CREATE TABLE `testattempted` (
  `id` int(250) NOT NULL,
  `testid` int(250) NOT NULL,
  `questionid` int(250) NOT NULL,
  `answer` text,
  `buttonval` int(250) NOT NULL,
  `timetaken` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testattempted`
--

INSERT INTO `testattempted` (`id`, `testid`, `questionid`, `answer`, `buttonval`, `timetaken`) VALUES
(13, 1, 10, '2', 1, '21'),
(14, 1, 11, '2', 1, '12'),
(15, 1, 12, '2', 1, '5'),
(19, 3, 10, '3', 1, '0'),
(20, 3, 11, '0', 1, '0'),
(21, 3, 12, '0', 1, '0'),
(36, 2, 10, '1', 1, '6'),
(37, 2, 11, '2', 1, '5'),
(38, 2, 12, '3', 1, '2'),
(39, 5, 10, '0', 1, '0'),
(40, 5, 11, '0', 1, '0'),
(41, 5, 12, '0', 1, '0'),
(44, 7, 24, '3', 1, '3'),
(45, 7, 25, '3', 1, '2'),
(73, 18, 26, '0', 1, '2'),
(74, 6, 24, '2', 1, '4'),
(75, 6, 25, '1', 1, '83'),
(76, 4, 1, '2', 1, '5'),
(77, 4, 2, '2', 1, '2'),
(78, 4, 3, '2', 1, '2'),
(79, 4, 4, '2', 1, '2'),
(80, 4, 5, '0', 1, '0'),
(81, 4, 6, '2', 1, '2'),
(82, 4, 8, '2', 1, '1'),
(83, 4, 20, '2', 1, '1'),
(84, 4, 21, '2', 1, '3'),
(85, 4, 22, '0', 1, '0'),
(86, 4, 23, '2', 1, '4');

-- --------------------------------------------------------

--
-- Table structure for table `testgiven`
--

CREATE TABLE `testgiven` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `testname` int(250) NOT NULL,
  `button` enum('1','0','3') NOT NULL,
  `status` int(250) NOT NULL,
  `view` int(250) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `levelid` int(250) NOT NULL,
  `savedtime` varchar(250) NOT NULL DEFAULT 'nil'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testgiven`
--

INSERT INTO `testgiven` (`id`, `userid`, `pdate`, `testname`, `button`, `status`, `view`, `subject_id`, `levelid`, `savedtime`) VALUES
(1, 12, '2019-11-14', 9, '1', 1, 1, 7, 12, '56:46'),
(2, 12, '2019-11-15', 10, '0', 1, 1, 7, 12, '59:40'),
(4, 13, '2019-11-29', 41, '1', 1, 1, 7, 14, ''),
(5, 12, '2019-11-15', 10, '1', 1, 1, 7, 12, 'nil'),
(6, 13, '2019-11-28', 41, '0', 1, 1, 6, 15, ''),
(7, 13, '2019-11-19', 42, '1', 1, 1, 6, 15, '36:55'),
(18, 13, '2019-11-26', 41, '0', 1, 1, 2, 6, '23:07');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(250) NOT NULL,
  `testimonial` text NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `postedby` text,
  `posteddate` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial`, `status`, `postedby`, `posteddate`) VALUES
(3, '<p>Your practice tests were essential in determining specific areas where our student could prepare for the test</p>\r\n', 1, 'Parent of student accepted to Harvard-Westlakes', '2019-04-08'),
(4, '<p>Your practice tests were essential in determining specific areas where our student could prepare for the test</p>\r\n', 1, 'Parent of student accepted to Harvard-Westlakes', '2019-04-08'),
(5, '<p>Your practice tests were essential in determining specific areas where our student could prepare for the tests</p>\r\n', 1, 'Parent of student accepted to Harvard-Westlakes', '2019-04-08'),
(6, '<p>Your practice tests were essential in determining specific areas where our student could prepare for the tests</p>\r\n', 1, 'Student of Amity school', '2019-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `test_detail`
--

CREATE TABLE `test_detail` (
  `id` int(250) NOT NULL,
  `att_mini_id` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `pdate` varchar(250) NOT NULL,
  `userid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissiontype`
--
ALTER TABLE `admissiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answeroption`
--
ALTER TABLE `answeroption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignquestion`
--
ALTER TABLE `assignquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachedtopics`
--
ALTER TABLE `attachedtopics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comeback`
--
ALTER TABLE `comeback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitiveness`
--
ALTER TABLE `competitiveness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentpages`
--
ALTER TABLE `contentpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_grades`
--
ALTER TABLE `edu_grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `edu_levels`
--
ALTER TABLE `edu_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `edu_pricing`
--
ALTER TABLE `edu_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_pricingnonqfeatures`
--
ALTER TABLE `edu_pricingnonqfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_pricingqfeatures`
--
ALTER TABLE `edu_pricingqfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examlevel`
--
ALTER TABLE `examlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_test_created`
--
ALTER TABLE `full_test_created`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levelsubjects`
--
ALTER TABLE `levelsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minitest`
--
ALTER TABLE `minitest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minitestattempted`
--
ALTER TABLE `minitestattempted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minitestgiven`
--
ALTER TABLE `minitestgiven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minitestid`
--
ALTER TABLE `minitestid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nqfeatures`
--
ALTER TABLE `nqfeatures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `omitted`
--
ALTER TABLE `omitted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practicetestgiven`
--
ALTER TABLE `practicetestgiven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptestattempted`
--
ALTER TABLE `ptestattempted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qfeature`
--
ALTER TABLE `qfeature`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questionimages`
--
ALTER TABLE `questionimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenttype`
--
ALTER TABLE `studenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subtype`
--
ALTER TABLE `subtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testattempted`
--
ALTER TABLE `testattempted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testgiven`
--
ALTER TABLE `testgiven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_detail`
--
ALTER TABLE `test_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admissiontype`
--
ALTER TABLE `admissiontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `answeroption`
--
ALTER TABLE `answeroption`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assignquestion`
--
ALTER TABLE `assignquestion`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `attachedtopics`
--
ALTER TABLE `attachedtopics`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `comeback`
--
ALTER TABLE `comeback`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `competitiveness`
--
ALTER TABLE `competitiveness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contentpages`
--
ALTER TABLE `contentpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `edu_grades`
--
ALTER TABLE `edu_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `edu_levels`
--
ALTER TABLE `edu_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `edu_pricing`
--
ALTER TABLE `edu_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `edu_pricingnonqfeatures`
--
ALTER TABLE `edu_pricingnonqfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `edu_pricingqfeatures`
--
ALTER TABLE `edu_pricingqfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `examlevel`
--
ALTER TABLE `examlevel`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `full_test_created`
--
ALTER TABLE `full_test_created`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `levelsubjects`
--
ALTER TABLE `levelsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `minitest`
--
ALTER TABLE `minitest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `minitestattempted`
--
ALTER TABLE `minitestattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `minitestgiven`
--
ALTER TABLE `minitestgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `minitestid`
--
ALTER TABLE `minitestid`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nqfeatures`
--
ALTER TABLE `nqfeatures`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `omitted`
--
ALTER TABLE `omitted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `practicetestgiven`
--
ALTER TABLE `practicetestgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ptestattempted`
--
ALTER TABLE `ptestattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `qfeature`
--
ALTER TABLE `qfeature`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questionimages`
--
ALTER TABLE `questionimages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `studenttype`
--
ALTER TABLE `studenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subtype`
--
ALTER TABLE `subtype`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `testattempted`
--
ALTER TABLE `testattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `testgiven`
--
ALTER TABLE `testgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `test_detail`
--
ALTER TABLE `test_detail`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
