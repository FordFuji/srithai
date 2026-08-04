-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2022 at 11:47 AM
-- Server version: 5.6.51
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp367776_srithai_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_link_social`
--

CREATE TABLE `ci_link_social` (
  `link_social_id` int(11) NOT NULL,
  `link_social_facebook` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_social_twitter` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_social_instagram` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_social_line` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_social_datetime_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_link_social`
--
ALTER TABLE `ci_link_social`
  ADD PRIMARY KEY (`link_social_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_link_social`
--
ALTER TABLE `ci_link_social`
  MODIFY `link_social_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
