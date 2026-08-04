-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srithai`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_popup`
--

CREATE TABLE `ci_popup` (
  `popup_id` int(11) NOT NULL,
  `popup_image` varchar(255) NOT NULL,
  `popup_link` varchar(255) NOT NULL,
  `popup_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_popup`
--

INSERT INTO `ci_popup` (`popup_id`, `popup_image`, `popup_link`, `popup_datetime_update`) VALUES
(1, '', '', '2023-01-18 08:21:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_popup`
--
ALTER TABLE `ci_popup`
  ADD PRIMARY KEY (`popup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_popup`
--
ALTER TABLE `ci_popup`
  MODIFY `popup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
