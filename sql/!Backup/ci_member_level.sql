-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 09 พ.ค. 2022 เมื่อ 04:55 PM
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
-- โครงสร้างตาราง `ci_member_level`
--

CREATE TABLE `ci_member_level` (
  `member_level_id` int(11) NOT NULL,
  `member_level_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_level_datetime_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `ci_member_level`
--

INSERT INTO `ci_member_level` (`member_level_id`, `member_level_name`, `member_level_datetime_create`) VALUES
(1, 'Classic', '2022-05-09 16:53:40'),
(2, 'Silver', '2022-05-09 16:53:40'),
(3, 'Gold', '2022-05-09 16:54:33'),
(4, 'Platinum', '2022-05-09 16:54:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_member_level`
--
ALTER TABLE `ci_member_level`
  ADD PRIMARY KEY (`member_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_member_level`
--
ALTER TABLE `ci_member_level`
  MODIFY `member_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
