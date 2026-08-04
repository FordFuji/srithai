-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 28 เม.ย. 2022 เมื่อ 03:20 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.24-MariaDB-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zford_srithai`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ci_map_customer_group`
--

CREATE TABLE `ci_map_customer_group` (
  `map_customer_group_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `map_customer_group_datetime_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_map_customer_group`
--
ALTER TABLE `ci_map_customer_group`
  ADD PRIMARY KEY (`map_customer_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_map_customer_group`
--
ALTER TABLE `ci_map_customer_group`
  MODIFY `map_customer_group_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
