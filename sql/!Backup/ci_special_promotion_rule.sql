-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03 พ.ค. 2022 เมื่อ 12:06 PM
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
-- โครงสร้างตาราง `ci_special_promotion_rule`
--

CREATE TABLE `ci_special_promotion_rule` (
  `special_promotion_rule_id` int(11) NOT NULL,
  `special_promotion_rule_no` int(11) NOT NULL,
  `product_price_low_percent` int(11) NOT NULL,
  `special_promotion_rule_datetime_create` datetime NOT NULL,
  `special_promotion_rule_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_special_promotion_rule`
--
ALTER TABLE `ci_special_promotion_rule`
  ADD PRIMARY KEY (`special_promotion_rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_special_promotion_rule`
--
ALTER TABLE `ci_special_promotion_rule`
  MODIFY `special_promotion_rule_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
