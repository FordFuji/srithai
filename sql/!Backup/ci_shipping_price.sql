-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 08:40 AM
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
-- Table structure for table `ci_shipping_price`
--

CREATE TABLE `ci_shipping_price` (
  `shipping_price_id` int(11) NOT NULL,
  `shipping_price_1000` int(11) NOT NULL,
  `shipping_price_1000_1999` int(11) NOT NULL,
  `shipping_price_2000_2999` int(11) NOT NULL,
  `shipping_price_3000_3999` int(11) NOT NULL,
  `shipping_price_4000_4999` int(11) NOT NULL,
  `shipping_price_5000_5999` int(11) NOT NULL,
  `shipping_price_6000_6999` int(11) NOT NULL,
  `shipping_price_7000_7999` int(11) NOT NULL,
  `shipping_price_8000_8999` int(11) NOT NULL,
  `shipping_price_9000_9999` int(11) NOT NULL,
  `shipping_price_10000_10999` int(11) NOT NULL,
  `shipping_price_11000_11999` int(11) NOT NULL,
  `shipping_price_12000_12999` int(11) NOT NULL,
  `shipping_price_13000_13999` int(11) NOT NULL,
  `shipping_price_14000_14999` int(11) NOT NULL,
  `shipping_price_15000_15999` int(11) NOT NULL,
  `shipping_price_16000_16999` int(11) NOT NULL,
  `shipping_price_17000_17999` int(11) NOT NULL,
  `shipping_price_18000_18999` int(11) NOT NULL,
  `shipping_price_19000_19999` int(11) NOT NULL,
  `shipping_price_20000_100000000` int(11) NOT NULL,
  `shipping_price_datetime_create` datetime NOT NULL,
  `shipping_price_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_shipping_price`
--

INSERT INTO `ci_shipping_price` (`shipping_price_id`, `shipping_price_1000`, `shipping_price_1000_1999`, `shipping_price_2000_2999`, `shipping_price_3000_3999`, `shipping_price_4000_4999`, `shipping_price_5000_5999`, `shipping_price_6000_6999`, `shipping_price_7000_7999`, `shipping_price_8000_8999`, `shipping_price_9000_9999`, `shipping_price_10000_10999`, `shipping_price_11000_11999`, `shipping_price_12000_12999`, `shipping_price_13000_13999`, `shipping_price_14000_14999`, `shipping_price_15000_15999`, `shipping_price_16000_16999`, `shipping_price_17000_17999`, `shipping_price_18000_18999`, `shipping_price_19000_19999`, `shipping_price_20000_100000000`, `shipping_price_datetime_create`, `shipping_price_datetime_update`) VALUES
(1, 27, 34, 38, 50, 63, 80, 92, 109, 120, 132, 155, 166, 178, 189, 201, 218, 230, 241, 253, 264, 260, '2022-08-15 13:39:27', '2022-08-15 13:39:27'),
(2, 40, 46, 51, 57, 69, 80, 92, 109, 120, 132, 155, 166, 178, 189, 201, 218, 230, 241, 253, 264, 0, '2022-08-15 13:39:27', '2022-08-15 13:39:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_shipping_price`
--
ALTER TABLE `ci_shipping_price`
  ADD PRIMARY KEY (`shipping_price_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_shipping_price`
--
ALTER TABLE `ci_shipping_price`
  MODIFY `shipping_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
