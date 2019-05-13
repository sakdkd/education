-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2019 at 05:38 PM
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
(1, 'admin', 'c33367701511b4f6020ec61ded352059', 1, 1, 'Admin', NULL, '+6521457878', '97456321000', 'ABC123456', 'MjAxOS0wMi0xMyAwMzoyOToxNQ==_logon.png', 1, 'admin@gmail.com'),
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
(9, 'Equations', 11, 1, 1, 14, 0, 7);

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
(9, '', 'Delaware', 1, 1);

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
(4, 'STARTER', '0', 1, 1, 1, '2019-03-20'),
(5, 'ULTIMATE', '79.98', 1, 1, 1, '2019-03-20'),
(6, 'Free Trial', '0', 3, 1, 1, '2019-04-03'),
(8, 'Starter', '59.90', 3, 1, 0, '2019-04-08'),
(9, 'Starter', '59.9', 3, 1, 0, '2019-04-09'),
(11, 'Starter', '59.99', 3, 1, 1, '2019-04-09'),
(12, 'Starter', '78', 2, 1, 0, '2019-04-26'),
(13, 'Starter', '50', 2, 1, 1, '2019-04-26');

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
(28, 11, 6, 1, 1),
(29, 11, 5, 1, 1),
(30, 12, 6, 1, 1),
(31, 12, 5, 1, 1),
(32, 12, 4, 1, 1),
(33, 12, 3, 1, 1),
(34, 13, 6, 1, 1),
(35, 13, 5, 1, 1),
(36, 13, 3, 1, 1);

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
(1, 11, 2, 1, 1, 2),
(2, 11, 1, 1, 1, 1),
(3, 11, 3, 0, 1, 5),
(5, 13, 2, 1, 1, 2),
(6, 13, 4, 1, 1, 1);

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
(6, 2, 24, 28, 1, 1, '2019-03-19', '06:20 pm', 1, 2),
(7, 2, 24, 26, 1, 1, '2019-03-19', '06:21 pm', 1, 3),
(8, 2, 1, 0, 1, 1, '2019-03-19', '06:21 pm', 1, 4),
(9, 3, 37, 35, 1, 1, '2019-04-03', '11:20 am', 1, 5),
(10, 3, 37, 35, 1, 1, '2019-04-03', '11:20 am', 1, 6),
(11, 3, 36, 35, 1, 1, '2019-04-03', '11:20 am', 1, 2),
(12, 3, 47, 5, 1, 1, '2019-04-03', '11:21 am', 1, 7),
(13, 3, 1, 1, 1, 1, '2019-04-03', '11:21 am', 1, 8),
(14, 2, 37, 37, 1, 1, '2019-04-15', '03:33 pm', 1, 7),
(15, 2, 37, 37, 1, 1, '2019-04-15', '03:33 pm', 1, 6),
(16, 2, 1, 5, 1, 1, '2019-05-07', '01:36 pm', 1, 8);

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
(9, '', 'Santa Barbara', 1, 5, 1);

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
(2, 5, 10, 3, 1, 1, '2019-04-12', '10:59 am', 1, 7);

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
(57, 1, 3, 2, 1),
(58, 1, 5, 1, 1),
(59, 1, 4, 2, 1),
(60, 1, 6, 4, 1),
(61, 1, 8, 3, 1),
(62, 1, 1, 2, 1),
(63, 1, 2, 1, 1);

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

--
-- Dumping data for table `minitestgiven`
--

INSERT INTO `minitestgiven` (`id`, `userid`, `pdate`, `testname`, `button`, `status`, `view`, `subject_id`, `levelid`, `savedtime`) VALUES
(1, 1, '2019-05-09', 1, '1', 1, 1, 7, 2, '1:53');

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
(2, 'Stanine results', 1, 1),
(3, 'Interactive diagnostics', 1, 1),
(4, 'Tutor consultation', 1, 1),
(5, 'Personalized prep plan', 1, 1),
(6, '12 extra writing prompts', 0, 1),
(7, 'test1', 0, 0),
(8, '1 mini test', 1, 0);

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
(1, 1, 11, 1, 1),
(2, 2, 13, 1, 1);

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
(1, 3, '2019-05-09', 0, 'test', 'test', 3, 4, '9899153569', '123456', 'test', 'sak', 'sak'),
(2, 1, '2019-05-13', 0, 'gtb delhi', 'delhi', 0, 9, '9899153569', '1122345', 'dkd pvt. ltd', 'sak', 'sak');

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
(2, 1, '2019-05-03', 'Practice', '1', 1, 1, 1, 1, 'nil'),
(3, 1, '2019-05-03', 'Practice', '1', 1, 1, 3, 2, ''),
(4, 1, '2019-05-03', 'Practice', '1', 1, 1, 3, 2, 'nil'),
(5, 1, '2019-05-03', 'Practice', '1', 1, 1, 1, 1, 'nil'),
(6, 1, '2019-05-03', 'Practice', '1', 1, 1, 1, 1, 'nil'),
(7, 1, '2019-05-03', 'Practice', '1', 1, 1, 1, 1, 'nil'),
(8, 1, '2019-05-03', 'Practice', '1', 1, 1, 1, 1, 'nil'),
(9, 1, '2019-05-03', 'Practice', '3', 1, 1, 3, 1, ''),
(10, 1, '2019-05-04', 'Practice', '1', 1, 1, 1, 2, ''),
(11, 1, '2019-05-04', 'Practice', '3', 1, 1, 1, 1, ''),
(12, 8, '2019-05-04', 'Practice', '3', 1, 1, 6, 2, ''),
(18, 1, '2019-05-09', 'Practice', '1', 1, 1, 8, 2, ''),
(19, 1, '2019-05-09', 'Practice', '3', 1, 1, 8, 2, 'nil');

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
(15, 4, 6, '2', 1, NULL),
(16, 4, 5, '2', 1, NULL),
(17, 4, 4, '4', 1, NULL),
(18, 5, 1, '2', 1, NULL),
(19, 6, 1, '1', 1, NULL),
(20, 7, 1, '4', 1, NULL),
(21, 8, 1, '1', 1, NULL),
(22, 9, 8, '2', 3, NULL),
(24, 11, 1, '2', 3, NULL),
(25, 10, 2, '0', 1, NULL),
(26, 12, 10, '0', 3, NULL),
(28, 18, 14, 'reffdfdfd', 1, NULL),
(29, 19, 14, '0', 3, NULL);

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
(1, 'MINI TEST', 1, 1),
(2, 'FULL-LENGTH TEST', 1, 1),
(3, 'PREMIUM VIDEO COURSE', 1, 1),
(4, 'PRACTICE EXERCISES', 1, 1);

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
(29, 'file4.png', '2019-05-08', 1, 1);

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
(1, '<p><strong>Age of Umesh will be 4 times the age of Reena in 6 years from today. If ages of Umesh and Mahesh are 7 times and 6 times the age of Reena respectively, what is present age of Umesh?</strong>&nbsp;</p>', '<p>64 years</p>\r\n', '<p>30 years</p>\r\n', '<p>28 years</p>\r\n', '<p>34 years</p>\r\n', '2', '', 1, 1, 1, '2019-04-15', 1),
(2, '<p><strong>The average age of 10 students and their teacher is 15 years. The average age of the first seven students is 15 yr and that of the last three is 11 yr. What is the teacher&#39;s age?</strong>&nbsp;</p>', '<p>33 years</p>\r\n', '<p>30 years</p>\r\n', '<p>27 years</p>\r\n', '<p>29 years</p>\r\n', '2', '', 1, 1, 1, '2019-04-15', 2),
(3, '<p><strong>A father is 4 times as old as his son. 8 years hence, the ratio of father&rsquo;s age to the son&rsquo;s age will be 20:7. What is the sum of their present ages?</strong>&nbsp;</p>', '<p>50</p>\r\n', '<p>45</p>\r\n', '<p>56</p>\r\n', '<p>78</p>\r\n', '3', '', 1, 1, 1, '2019-04-15', 3),
(4, '<p><strong>A man goes to Mumbai from Pune at a speed of 4 km/hr and returns to Pune at speed of 6km/hr. What is his average speed of the entire journey?</strong></p>', '<p>4.8km/hr</p>\r\n', '<p>4.6km/hr</p>\r\n', '<p>6.8km/hr</p>\r\n', '<p>2.8km/hr</p>\r\n', '2', '', 3, 1, 1, '2019-04-15', 2),
(5, '<p><strong>P, Q and R are in a cycle race of 4500 meters. P cycles twice as fast as Q. R cycles 1/3<sup>rd</sup>&nbsp;as fast as Q. R completes the race in 45 minutes. Then where was Q from the finishing line when P finished the race?</strong>&nbsp;</p>', '<p>300 m</p>\r\n', '<p>3000 m</p>\r\n', '<p>400 m</p>\r\n', '<p>305 m</p>\r\n', '1', '', 3, 1, 1, '2019-04-15', 2),
(6, '<p><strong>A walks from points Jammu to Delhi and at the same time B starts walking from Delhi to Jammu. After passing each other, they complete their journeys in 361 hours and 289 hours, respectively. Find the ratio of speed of A to that of B?</strong>&nbsp;</p>', '<p>17:19</p>\r\n', '<p>174:196</p>\r\n', '<p>228:19</p>\r\n', '<p>17:1988</p>\r\n', '4', '', 3, 1, 1, '2019-04-15', 2),
(8, '<p><strong>&nbsp;&nbsp;A starts walking at 4 kmph and 4 hours after his start B starts cycling at 10 kmph. After how much distance will B catch up with A?</strong>&nbsp;</p>', '<p>26.2 km</p>\r\n', '<p>29.2 km</p>\r\n', '<p>23.2 km</p>\r\n', '<p>21.2 km</p>\r\n', '4', '', 3, 1, 1, '2019-04-15', 1),
(9, '', '', '', '', '', '', '', 3, 0, 0, '', 1),
(10, '<p>1 + 1=?</p>', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '1', '', 6, 1, 1, '2019-04-27', 2),
(11, '<p><img alt=\\"\\\\sqrt{2^2 }\\" src=\\"http://latex.codecogs.com/gif.latex?%5Csqrt%7B2%5E2%20%7D\\" />= ?</p>', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '4', '', 6, 1, 1, '2019-04-29', 1),
(12, '<p><img alt=\\"\\\\binom{n-1}{n}\\" src=\\"http://latex.codecogs.com/gif.latex?%5Cbinom%7Bn-1%7D%7Bn%7D\\" /></p>', '<p>n</p>\r\n', '<p>n-1</p>\r\n', '<p>n<sup>20</sup></p>\r\n', '<p>0</p>\r\n', '1', '', 6, 1, 1, '2019-05-01', 1),
(13, '<p>Write an essay on My Nation</p>', '', '', '', '', '', '', 7, 1, 1, '2019-05-07', 2),
(14, '<p>Write an essay on My Parents</p>', '', '', '', '', '', '', 8, 1, 1, '2019-05-07', 2),
(15, '<p><img alt=\\"(a+b)^2\\" src=\\"http://latex.codecogs.com/gif.latex?%28a&amp;plus;b%29%5E2\\" />=?</p>', '<p><img alt="a^2 + b^2 +2abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;2abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +3abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;3abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +4abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;4abc" /></p>\r\n', '<p><img alt="a^2 + b^2 +5abc" src="http://latex.codecogs.com/gif.latex?a%5E2%20&amp;plus;%20b%5E2%20&amp;plus;5abc" /></p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 1),
(16, '<p><strong><img alt=\\"square-root\\" src=\\"https://mba.hitbullseye.com/sites/default/files/square-root.svg\\" /></strong></p>', '<p>369</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>498</p>\r\n', '<p>380</p>\r\n', '<p>400</p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 2),
(17, '<p>84.95% of 280 + &radic;? = 253.001</p>', '<p>256</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>260</p>\r\n', '<p>18</p>\r\n', '<p>9</p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 1),
(18, '<p><strong><img alt=\\"10008.99^2-10009.001\\\\sqrt{3589X0.4987}=?\\" src=\\"http://latex.codecogs.com/gif.latex?10008.99%5E2-10009.001%5Csqrt%7B3589X0.4987%7D%3D%3F\\" /></strong></p>', '<p>3,000</p>\r\n', '<p>30,0000</p>\r\n', '<p>5000</p>\r\n', '<p>6000</p>\r\n', '3', '', 9, 1, 1, '2019-05-08', 2),
(19, '<p>An object moves from point A to point B to point C, then back to point B and then to point C along the line shown in the figure below.&nbsp;<br />a) Find the distance covered by the moving object.&nbsp;</p><p><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/file1.png\\" style=\\"height:165px; width:721px\\" /></p>', '<p>12 km</p>\r\n', '<p>9 km</p>\r\n', '<p>10 km</p>\r\n', '<p>80 km</p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 1),
(20, '<p>An object moves from point A to point C along the rectangle shown in the figure below.&nbsp;<br />a) Find the distance covered by the moving object.&nbsp;<br /><img alt=\\"\\" src=\\"http://78.46.117.226/education/allphotos/file4.png\\" style=\\"height:200px; width:242px\\" /></p>', '<p>2 km</p>\r\n', '<p>3 km</p>\r\n', '<p>4 km</p>\r\n', '<p>5 km</p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 2),
(21, '<p>2a + 3a=?</p>', '<p>5a</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '1', '', 9, 1, 1, '2019-05-08', 1),
(22, '<p><img alt=\\"\\\\log_{5}(x^2-5)=?\\" src=\\"http://latex.codecogs.com/gif.latex?%5Clog_%7B5%7D%28x%5E2-5%29%3D%3F\\" /></p>', '<p><img alt="\\log_{5}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7B5%7D%28y%5E2-5%29" /></p>\n', '<p><img alt="\\log_{e}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7Be%7D%28y%5E2-5%29" /></p>\r\n', '<p><img alt="\\log_{3}(y^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7B3%7D%28y%5E2-5%29" /></p>\r\n', '<p><img alt="\\log_{e}(z^2-5)" src="http://latex.codecogs.com/gif.latex?%5Clog_%7Be%7D%28z%5E2-5%29" /></p>\r\n', '1', '', 9, 1, 1, '2019-05-13', 2),
(23, '<p>if 3x(<img alt=\\"\\\\Delta\\" src=\\"http://latex.codecogs.com/gif.latex?%5CDelta\\" />-2)=1,<img alt=\\"\\\\Delta\\" src=\\"http://latex.codecogs.com/gif.latex?%5CDelta\\" /> is what?</p>', '<p>12</p>\r\n', '<p>9</p>\r\n', '<p>8</p>\r\n', '<p>12</p>\r\n', '3', '', 9, 1, 1, '2019-05-13', 1);

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
(1, '', 'sakshi@dkd.co.in', 'e10adc3949ba59abbe56e057f20f883e', '2019-05-13', 1, '', '', '2', '', 1);

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
(5, 1, 1, 'Appleby College Admissions New', 'Ontario,Canada', '12365787', '12365787', '', '', 5, 'test@hotmail.com', '', 'A', 1, 2, 2, '');

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
(1, 1, 'Auditory Comprehension', 1, 0, 1),
(2, 1, 'Reading', 1, 0, 1),
(3, 1, 'Mathematics', 0, 0, 1),
(4, 0, 'Writing Sample', 1, 1, 1),
(5, 1, 'Verbal Reasoning', 1, 0, 0),
(6, 1, 'Quantitative Reasoning', 1, 0, 1),
(7, 1, 'Mathematics Achievement', 1, 0, 1),
(8, 1, 'Essay', 1, 1, 1),
(9, 1, 't', 1, 0, 0);

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
(13, 'My parents', 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testattempted`
--

CREATE TABLE `testattempted` (
  `id` int(250) NOT NULL,
  `testid` int(250) NOT NULL,
  `questionid` int(250) NOT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `buttonval` int(250) NOT NULL,
  `timetaken` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testattempted`
--

INSERT INTO `testattempted` (`id`, `testid`, `questionid`, `answer`, `buttonval`, `timetaken`) VALUES
(49, 2, 17, '3', 1, '2.479'),
(50, 2, 8, '3', 1, '3.7039999999999997'),
(51, 2, 22, '2', 1, '2.9410000000000003'),
(52, 2, 16, '1', 1, '2.629'),
(53, 2, 21, '2', 1, '2.692'),
(54, 2, 3, '2', 1, '1.44'),
(55, 2, 2, '3', 1, '9.215'),
(56, 2, 18, '4', 1, '7.591'),
(57, 2, 15, '2', 1, '4.096'),
(58, 2, 23, '2', 1, ''),
(59, 2, 20, '4', 1, '3.355'),
(60, 2, 4, '2', 1, '1.116'),
(61, 2, 5, '2', 1, '0.664'),
(62, 2, 19, '4', 1, '4.008'),
(63, 2, 6, '1', 1, '2.822'),
(64, 2, 1, '2', 1, '12.215'),
(65, 3, 23, '0', 1, ''),
(66, 3, 15, '0', 1, ''),
(67, 3, 6, '0', 1, ''),
(68, 3, 4, '0', 1, ''),
(69, 3, 2, '0', 1, ''),
(70, 3, 19, '0', 1, ''),
(71, 3, 18, '0', 1, ''),
(72, 3, 20, '0', 1, ''),
(73, 3, 1, '0', 1, ''),
(74, 3, 22, '0', 1, ''),
(75, 3, 17, '0', 1, ''),
(76, 3, 16, '0', 1, ''),
(77, 3, 21, '0', 1, ''),
(78, 3, 8, '0', 1, ''),
(79, 3, 5, '0', 1, ''),
(80, 3, 3, '0', 1, ''),
(113, 5, 5, '0', 3, ''),
(114, 5, 3, '0', 3, ''),
(115, 5, 19, '0', 3, ''),
(116, 5, 17, '0', 3, ''),
(117, 5, 6, '0', 3, ''),
(118, 5, 21, '0', 3, ''),
(119, 5, 16, '0', 3, ''),
(120, 5, 4, '0', 3, ''),
(121, 5, 2, '0', 3, ''),
(122, 5, 1, '0', 3, ''),
(123, 5, 22, '0', 3, ''),
(124, 5, 20, '0', 3, ''),
(125, 5, 23, '0', 3, ''),
(126, 5, 18, '0', 3, ''),
(127, 5, 15, '0', 3, ''),
(128, 5, 8, '0', 3, ''),
(129, 4, 18, '0', 3, ''),
(130, 4, 23, '0', 3, ''),
(131, 4, 20, '0', 3, ''),
(132, 4, 4, '0', 3, ''),
(133, 4, 22, '0', 3, ''),
(134, 4, 6, '0', 3, ''),
(135, 4, 21, '0', 3, ''),
(136, 4, 3, '0', 3, ''),
(137, 4, 19, '0', 3, ''),
(138, 4, 2, '0', 3, ''),
(139, 4, 17, '0', 3, ''),
(140, 4, 16, '0', 3, ''),
(141, 4, 5, '0', 3, ''),
(142, 4, 1, '0', 3, ''),
(143, 4, 15, '0', 3, ''),
(144, 4, 8, '0', 3, ''),
(145, 6, 4, '0', 3, ''),
(146, 6, 16, '0', 3, ''),
(147, 6, 19, '0', 3, ''),
(148, 6, 1, '0', 3, ''),
(149, 6, 22, '0', 3, ''),
(150, 6, 6, '0', 3, ''),
(151, 6, 18, '0', 3, ''),
(152, 6, 21, '0', 3, ''),
(153, 6, 3, '0', 3, ''),
(154, 6, 20, '0', 3, ''),
(155, 6, 23, '0', 3, ''),
(156, 6, 5, '0', 3, ''),
(157, 6, 8, '0', 3, ''),
(158, 6, 2, '0', 3, ''),
(159, 6, 15, '0', 3, ''),
(160, 6, 17, '0', 3, '');

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
(2, 1, '2019-05-13', 2, '0', 1, 1, 7, 14, '35:05'),
(3, 1, '2019-05-13', 1, '0', 1, 1, 7, 14, '33:55'),
(4, 1, '2019-05-13', 4, '3', 1, 1, 7, 14, '33:07'),
(5, 1, '2019-05-13', 5, '3', 1, 1, 7, 14, '32:43'),
(6, 1, '2019-05-13', 1, '0', 1, 1, 7, 14, '36:59');

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
(5, '<p>Your practice tests were essential in determining specific areas where our student could prepare for the tests</p>\r\n', 1, 'Parent of student accepted to Harvard-Westlakes', '2019-04-08');

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
-- Indexes for table `attachedtopics`
--
ALTER TABLE `attachedtopics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitiveness`
--
ALTER TABLE `competitiveness`
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
-- AUTO_INCREMENT for table `attachedtopics`
--
ALTER TABLE `attachedtopics`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `competitiveness`
--
ALTER TABLE `competitiveness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contentpages`
--
ALTER TABLE `contentpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `edu_pricingnonqfeatures`
--
ALTER TABLE `edu_pricingnonqfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `edu_pricingqfeatures`
--
ALTER TABLE `edu_pricingqfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `examlevel`
--
ALTER TABLE `examlevel`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `levelsubjects`
--
ALTER TABLE `levelsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `minitest`
--
ALTER TABLE `minitest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `minitestattempted`
--
ALTER TABLE `minitestattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `minitestgiven`
--
ALTER TABLE `minitestgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `minitestid`
--
ALTER TABLE `minitestid`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nqfeatures`
--
ALTER TABLE `nqfeatures`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `practicetestgiven`
--
ALTER TABLE `practicetestgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ptestattempted`
--
ALTER TABLE `ptestattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `qfeature`
--
ALTER TABLE `qfeature`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questionimages`
--
ALTER TABLE `questionimages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `studenttype`
--
ALTER TABLE `studenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subtype`
--
ALTER TABLE `subtype`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `testattempted`
--
ALTER TABLE `testattempted`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `testgiven`
--
ALTER TABLE `testgiven`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test_detail`
--
ALTER TABLE `test_detail`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
