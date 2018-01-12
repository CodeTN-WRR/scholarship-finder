-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 09:20 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Scholarship`
--
CREATE DATABASE IF NOT EXISTS `Scholarship` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Scholarship`;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

DROP TABLE IF EXISTS `scholarships`;
CREATE TABLE IF NOT EXISTS `scholarships` (
  `Deadline` date DEFAULT NULL,
  `Schools` varchar(255) DEFAULT NULL,
  `Money` decimal(32,2) DEFAULT NULL,
  `GPA` float(4,2) DEFAULT NULL,
  `Focus` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Major` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO 'scholarships' ('Deadline', 'Schools', 'Money', 'GPA', 'Focus', 'Location', 'Major', 'Name') values (

  2017-11-01,
  "Harvard",
  20000,
  3.90,
  "Law",
  "Massachusetts",
  "N/A",
  "Mark"
  
)

INSERT INTO 'scholarships' ('Deadline', 'Schools', 'Money', 'GPA', 'Focus', 'Location', 'Major', 'Name') values (

  2017-11-01,
  "University of Tennessee Knoxville",
  1500,
  3.80,
  "N/A",
  "Tennessee",
  "N/A",
  "John"
  
)

INSERT INTO 'scholarships' ('Deadline', 'Schools', 'Money', 'GPA', 'Focus', 'Location', 'Major', 'Name') values (

  2017-12-01,
  "University of Colorado",
  5000,
  4.00,
  "Art",
  "Colorado",
  "Graphic Design",
  "Kevin"
  
)

INSERT INTO 'scholarships' ('Deadline', 'Schools', 'Money', 'GPA', 'Focus', 'Location', 'Major', 'Name') values (

  2017-12-15,
  "University of California, Berkeley",
  6500,
  3.90,
  "Engineering",
  "California",
  "Chemical Engineering",
  "Jessica"
  
)

INSERT INTO 'scholarships' ('Deadline', 'Schools', 'Money', 'GPA', 'Focus', 'Location', 'Major', 'Name') values (

  2017-11-01,
  "Georgia Tech",
  20000,
  3.90,
  "Engineering",
  "Georgia",
  "N/A",
  "Jean"
  
)