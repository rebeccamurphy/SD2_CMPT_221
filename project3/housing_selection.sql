-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2015 at 03:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `housing_selection`
--
CREATE DATABASE IF NOT EXISTS `housing_selection` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `housing_selection`;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cwid` char(8) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `class` char(4) NOT NULL,
  `ra` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residence_areas`
--

CREATE TABLE IF NOT EXISTS `residence_areas` (
  `hall` varchar(30) NOT NULL,
  `slots` int(1) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence_areas`
--

INSERT INTO `residence_areas` (`hall`, `slots`, `id`) VALUES
('Leo Hall', 5, 1),
('Champagnat Hall', 5, 2),
('Marian Hall', 5, 3),
('Sheahan Hall', 5, 4),
('Midrise Hall', 5, 5),
('Foy Townhouses', 5, 6),
('Gartland Commons', 5, 7),
('New Townhouses', 5, 8),
('Lower West Cedar St Townhouses', 5, 9),
('Upper West Cedar St Townhouses', 5, 10),
('Fulton St Townhouses', 5, 11),
('Talmadge Court', 5, 12),
('New Fulton Townhouses', 5, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residence_areas`
--
ALTER TABLE `residence_areas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `residence_areas`
--
ALTER TABLE `residence_areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
