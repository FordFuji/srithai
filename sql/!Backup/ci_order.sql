-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 07:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `ci_order`
--

CREATE TABLE `ci_order` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `order_point` int(11) NOT NULL,
  `order_use_point` int(11) NOT NULL,
  `order_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_sub_total` float(10,2) NOT NULL,
  `order_shipping` float(10,2) NOT NULL,
  `order_discount` float(10,2) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` text COLLATE utf8_unicode_ci NOT NULL,
  `order_province` int(11) NOT NULL,
  `order_amphur` int(11) NOT NULL,
  `order_tumbol` int(11) NOT NULL,
  `order_postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_address` text COLLATE utf8_unicode_ci NOT NULL,
  `order_billing_province` int(11) NOT NULL,
  `order_billing_amphur` int(11) NOT NULL,
  `order_billing_tumbol` int(11) NOT NULL,
  `order_billing_postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8_unicode_ci NOT NULL,
  `order_shipping_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_tracking_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_datetime_create` datetime NOT NULL,
  `order_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_order`
--

INSERT INTO `ci_order` (`order_id`, `member_id`, `coupon_id`, `order_point`, `order_use_point`, `order_no`, `order_sub_total`, `order_shipping`, `order_discount`, `order_total`, `order_name`, `order_surname`, `order_tel`, `order_email`, `order_address`, `order_province`, `order_amphur`, `order_tumbol`, `order_postcode`, `order_billing_name`, `order_billing_surname`, `order_billing_tel`, `order_billing_email`, `order_billing_address`, `order_billing_province`, `order_billing_amphur`, `order_billing_tumbol`, `order_billing_postcode`, `order_note`, `order_shipping_method`, `order_payment_method`, `order_status`, `order_tracking_no`, `order_datetime_create`, `order_datetime_update`) VALUES
(1, 0, 0, 0, 0, '1', 1.00, 0.00, 0.00, 1.00, 'Ford', 'Fuji', '0990943010', 'ford@ford.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Complete', '', '2022-04-12 10:53:59', '2022-04-19 10:41:18'),
(2, 0, 0, 0, 0, '2', 1.00, 0.00, 0.00, 1.00, 'rabbit', 'Romeo', '00000000', 'auttakron@srithaisuperware.com', '456', 1, 35, 121, '10150', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-12 11:07:44', '2022-04-12 11:07:44'),
(3, 0, 0, 0, 0, '3', 4540.00, 0.00, 0.00, 4540.00, '123', '456', '0935791774', 'auttakron@srithaisuperware.com', '15 สุขสวัสดิ์ ซอย 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-18 16:18:45', '2022-04-18 16:18:45'),
(4, 0, 0, 0, 0, '4', 1.00, 0.00, 0.00, 1.00, 'Ford', 'Fuji', '0990943010', 'ford@ford.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Processing', '', '2022-04-20 09:46:23', '2022-04-20 09:54:35'),
(5, 0, 0, 0, 0, '5', 1196.00, 0.00, 0.00, 1196.00, 'สิทธิพร', 'ตรองวิเชียร', '0990943010', 'nirvanaford94@gmail.com', '366/66 Soi Sapankhwa Pracharat 2 Road', 1, 1, 1, '10200', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Processing', '', '2022-04-22 14:29:56', '2022-04-22 14:52:48'),
(6, 0, 0, 0, 0, '6', 1280.00, 0.00, 0.00, 1280.00, 'สิทธิพร', 'ตรองวิเชียร', '0990943010', 'nirvanaford94@gmail.com', '366/66 Soi Sapankhwa Pracharat 2 Road', 1, 1, 1, '1', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-22 14:53:08', '2022-04-22 14:53:08'),
(7, 0, 0, 0, 0, '7', 2010.00, 0.00, 0.00, 2010.00, 'สิทธิพร', 'ตรองวิเชียร', '0990943010', 'nirvanaford94@gmail.com', '366/66 Soi Sapankhwa Pracharat 2 Road', 4, 63, 259, '12000', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-22 14:54:07', '2022-04-22 14:54:07'),
(8, 0, 0, 0, 0, '8', 2010.00, 0.00, 0.00, 2010.00, 'สิทธิพร', 'ตรองวิเชียร', '0990943010', 'nirvanaford94@gmail.com', '366/66 Soi Sapankhwa Pracharat 2 Road', 4, 63, 259, '257', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-22 16:41:06', '2022-04-22 16:41:06'),
(9, 2, 0, 0, 0, '9', 299.00, 0.00, 100.00, 199.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-26 15:10:38', '2022-04-26 15:10:38'),
(10, 2, 0, 0, 0, '10', 0.00, 0.00, 100.00, -100.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-26 15:11:28', '2022-04-26 15:11:28'),
(11, 2, 0, 0, 0, '11', 2.00, 0.00, 100.00, -98.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-26 15:12:19', '2022-04-26 15:12:19'),
(12, 2, 0, 0, 0, '12', 199.00, 0.00, 100.00, 99.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Credit Card', 'Ordering', '', '2022-04-26 15:17:52', '2022-04-26 15:17:52'),
(13, 2, 0, 0, 0, '13', 299.00, 0.00, 100.00, 199.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-26 15:18:56', '2022-04-26 15:18:56'),
(14, 2, 0, 0, 0, '14', 6839.00, 0.00, 100.00, 6739.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-26 15:59:01', '2022-04-26 15:59:01'),
(15, 2, 0, 0, 0, '15', 1.00, 0.00, 100.00, -99.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-26 16:36:28', '2022-04-26 16:36:28'),
(16, 2, 0, 0, 0, '16', 2010.00, 0.00, 100.00, 1910.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-26 16:52:11', '2022-04-26 16:52:11'),
(17, 2, 0, 0, 0, '17', 299.00, 0.00, 100.00, 199.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-04-26 16:52:45', '2022-04-26 16:52:45'),
(18, 2, 0, 0, 0, '18', 2290.00, 0.00, 100.00, 2190.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-27 08:32:51', '2022-04-27 08:32:51'),
(19, 2, 0, 0, 0, '19', 2270.00, 0.00, 100.00, 2170.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-29 11:59:52', '2022-04-29 11:59:52'),
(20, 2, 0, 0, 0, '20', 5700.00, 0.00, 285.00, 5415.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-29 13:22:25', '2022-04-29 13:22:25'),
(21, 2, 0, 0, 0, '21', 550.00, 0.00, 100.00, 450.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-29 13:23:18', '2022-04-29 13:23:18'),
(22, 2, 0, 0, 0, '22', 6768.00, 0.00, 338.40, 6429.60, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-04-29 14:04:10', '2022-04-29 14:04:10'),
(23, 2, 0, 0, 0, '23', 260.00, 0.00, 0.00, 260.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Bank Transfer', 'Ordering', '', '2022-05-04 10:20:47', '2022-05-04 10:20:47'),
(24, 2, 0, 0, 0, '24', 2270.00, 0.00, 0.00, 2270.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Bank Transfer', 'Ordering', '', '2022-05-04 10:25:53', '2022-05-04 10:25:53'),
(25, 2, 0, 0, 0, '25', 4300.00, 0.00, 0.00, 4300.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Delivery', '', '2022-05-04 10:29:12', '2022-05-04 10:29:53'),
(26, 2, 0, 0, 0, '26', 2010.00, 0.00, 0.00, 2010.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Credit Card', 'Ordering', '', '2022-05-04 10:38:12', '2022-05-04 10:38:12'),
(27, 2, 0, 0, 0, '27', 2670.00, 0.00, 0.00, 2670.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Bank Transfer', 'Ordering', '', '2022-05-04 10:44:21', '2022-05-04 10:44:21'),
(28, 2, 0, 0, 0, '28', 179.00, 0.00, 0.00, 179.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 10:45:32', '2022-05-04 10:45:32'),
(29, 2, 0, 0, 0, '29', 1.00, 0.00, 0.00, 1.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Credit Card', 'Ordering', '', '2022-05-04 10:52:07', '2022-05-04 10:52:07'),
(30, 1, 0, 0, 0, '30', 2270.00, 0.00, 0.00, 2270.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-04 12:13:17', '2022-05-04 12:13:17'),
(31, 1, 0, 0, 0, '31', 2270.00, 0.00, 0.00, 2270.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-04 12:13:38', '2022-05-04 12:13:38'),
(32, 1, 0, 0, 0, '32', 2270.00, 0.00, 0.00, 2270.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-04 12:14:13', '2022-05-04 12:14:13'),
(33, 1, 0, 0, 0, '33', 1.00, 0.00, 0.00, 1.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Bank Transfer', 'Ordering', '', '2022-05-04 12:16:04', '2022-05-04 12:16:04'),
(34, 1, 0, 0, 0, '34', 2568.00, 0.00, 0.00, 2568.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Normal', 'Bank Transfer', 'Ordering', '', '2022-05-04 12:17:11', '2022-05-04 12:17:11'),
(35, 2, 0, 0, 0, '35', 1.00, 0.00, 0.00, 1.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:30', '2022-05-04 15:13:30'),
(36, 2, 0, 0, 0, '36', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:35', '2022-05-04 15:13:35'),
(37, 2, 0, 0, 0, '37', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:39', '2022-05-04 15:13:39'),
(38, 2, 0, 0, 0, '38', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:43', '2022-05-04 15:13:43'),
(39, 2, 0, 0, 0, '39', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:46', '2022-05-04 15:13:46'),
(40, 2, 0, 0, 0, '40', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:51', '2022-05-04 15:13:51'),
(41, 2, 0, 0, 0, '41', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:55', '2022-05-04 15:13:55'),
(42, 2, 0, 0, 0, '42', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:13:58', '2022-05-04 15:13:58'),
(43, 2, 0, 0, 0, '43', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:02', '2022-05-04 15:14:02'),
(44, 2, 0, 0, 0, '44', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:06', '2022-05-04 15:14:06'),
(45, 2, 0, 0, 0, '45', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:10', '2022-05-04 15:14:10'),
(46, 2, 0, 0, 0, '46', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:14', '2022-05-04 15:14:14'),
(47, 2, 0, 0, 0, '47', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:18', '2022-05-04 15:14:18'),
(48, 2, 0, 0, 0, '48', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:21', '2022-05-04 15:14:21'),
(49, 2, 0, 0, 0, '49', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:25', '2022-05-04 15:14:25'),
(50, 2, 0, 0, 0, '50', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:30', '2022-05-04 15:14:30'),
(51, 2, 0, 0, 0, '51', 0.00, 0.00, 0.00, 0.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-04 15:14:34', '2022-05-04 15:14:34'),
(52, 2, 0, 0, 0, '52', 1870.00, 25.00, 0.00, 1895.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-05 11:46:53', '2022-05-05 11:46:53'),
(53, 2, 0, 0, 0, '53', 4100.00, 25.00, 0.00, 4125.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-05 13:35:57', '2022-05-05 13:35:57'),
(54, 1, 0, 0, 0, '54', 10050.00, 25.00, 1005.00, 9070.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-05 14:02:16', '2022-05-05 14:02:16'),
(55, 2, 0, 0, 0, '55', 5120.00, 25.00, 0.00, 5145.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Complete', '', '2022-05-05 14:42:42', '2022-05-11 12:08:50'),
(56, 2, 0, 0, 0, '56', 0.00, 25.00, 0.00, 25.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-05 14:43:26', '2022-05-05 14:43:26'),
(57, 1, 0, 0, 0, '57', 5454.00, 25.00, 698.70, 4780.30, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-05 16:44:00', '2022-05-05 16:44:00'),
(58, 2, 0, 0, 0, '58', 260.00, 25.00, 100.00, 185.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Delivery', '', '2022-05-05 16:48:11', '2022-05-05 16:48:43'),
(59, 2, 0, 0, 0, '59', 299.00, 25.00, 100.00, 224.00, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Delivery', '', '2022-05-05 16:49:05', '2022-05-05 16:49:27'),
(60, 1, 0, 1870, 0, '60', 1870.00, 25.00, 187.00, 1708.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Processing', '', '2022-05-09 16:14:54', '2022-05-11 14:38:41'),
(61, 2, 0, 75, 0, '61', 7480.00, 35.00, 1271.60, 6243.40, 'Rabbit', 'อรรถกร', '0935791774', 'auttakron@srithaisuperware.com', '15 ซอย สุขสวัสดิ์ 36', 1, 24, 96, '10140', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-09 16:49:42', '2022-05-09 16:49:42'),
(62, 1, 0, 13, 500, '62', 1280.00, 25.00, 50.00, 1255.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-11 14:38:56', '2022-05-11 14:38:56'),
(63, 1, 0, 13, 500, '63', 1280.00, 25.00, 50.00, 1255.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Ordering', '', '2022-05-11 14:39:44', '2022-05-11 14:39:44'),
(64, 1, 0, 13, 0, '64', 1280.00, 25.00, 0.00, 1305.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-13 10:23:49', '2022-05-13 10:23:49'),
(65, 1, 0, 26, 0, '65', 2568.00, 25.00, 0.00, 2593.00, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-13 10:40:55', '2022-05-13 10:40:55'),
(66, 1, 0, 13, 0, '66', 1280.00, 25.00, 25.60, 1279.40, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-13 14:13:22', '2022-05-13 14:13:22'),
(67, 1, 0, 13, 0, '67', 1280.00, 25.00, 25.60, 1279.40, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-13 14:29:35', '2022-05-13 14:29:35'),
(68, 1, 0, 13, 0, '22050001', 1280.00, 25.00, 25.60, 1279.40, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-14 09:28:26', '2022-05-14 09:28:26'),
(69, 1, 0, 23, 0, '22050002', 2270.00, 25.00, 295.10, 1999.90, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Bank Transfer', 'Ordering', '', '2022-05-14 09:29:11', '2022-05-14 09:29:11'),
(70, 1, 0, 0, 0, '22050003', 1.00, 25.00, 0.13, 25.87, 'Ford', 'Fuji', '0990943010', 'nirvanaford94@gmail.com', '366/66', 8, 105, 728, '16130', '', '', '', '', '', 0, 0, 0, '', '', 'Express', 'Credit Card', 'Processing', '', '2022-05-14 11:04:14', '2022-05-14 11:07:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_order`
--
ALTER TABLE `ci_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_order`
--
ALTER TABLE `ci_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
