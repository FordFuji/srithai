-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16 ส.ค. 2022 เมื่อ 01:55 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 5.6.51
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
-- โครงสร้างตาราง `ci_banner_article`
--

CREATE TABLE `ci_banner_article` (
  `banner_article_id` int(11) NOT NULL,
  `banner_article_image` varchar(255) NOT NULL,
  `banner_article_name_th` varchar(255) NOT NULL,
  `banner_article_name_en` varchar(255) NOT NULL,
  `banner_article_datetime_create` datetime NOT NULL,
  `banner_article_datetime_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- dump ตาราง `ci_banner_article`
--

INSERT INTO `ci_banner_article` (`banner_article_id`, `banner_article_image`, `banner_article_name_th`, `banner_article_name_en`, `banner_article_datetime_create`, `banner_article_datetime_update`) VALUES
(1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_banner_article`
--
ALTER TABLE `ci_banner_article`
  ADD PRIMARY KEY (`banner_article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_banner_article`
--
ALTER TABLE `ci_banner_article`
  MODIFY `banner_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
