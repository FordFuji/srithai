-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03 พ.ค. 2022 เมื่อ 11:27 AM
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
-- โครงสร้างตาราง `ci_auto_add_gift`
--

CREATE TABLE `ci_auto_add_gift` (
  `auto_add_gift_id` int(11) NOT NULL,
  `auto_add_gift_price_limit` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `auto_add_gift_datetime_create` datetime NOT NULL,
  `auto_add_gift_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `ci_auto_add_gift`
--

INSERT INTO `ci_auto_add_gift` (`auto_add_gift_id`, `auto_add_gift_price_limit`, `product_id`, `auto_add_gift_datetime_create`, `auto_add_gift_datetime_update`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_auto_add_gift`
--
ALTER TABLE `ci_auto_add_gift`
  ADD PRIMARY KEY (`auto_add_gift_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_auto_add_gift`
--
ALTER TABLE `ci_auto_add_gift`
  MODIFY `auto_add_gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
