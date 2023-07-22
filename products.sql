-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2023 at 06:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

DROP TABLE IF EXISTS `product_list`;
CREATE TABLE IF NOT EXISTS `product_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(15) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `description`, `quantity`, `price`, `time_created`, `image`) VALUES
(35, 'Apple 12.9&quot; iPad Pro M2 Chip', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining a compact form factor.', 6, 40000, '2023-07-20 11:20:31', 'apple_mnxr3ll_a_12_9_ipad_pro_m2_1731117.jpg'),
(36, 'Apple 10.2&quot; iPad (9th Gen, 64GB, Wi-Fi Only, Space Gray)', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can', 8, 400000, '2023-07-20 11:22:24', 'apple_mk2k3ll_a_10_2_ipad_wi_fi_64gb_1664329.jpg'),
(37, 'Roku Ultra 4K UHD Streaming Media Player', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can', 9, 300000, '2023-07-20 11:23:33', 'roku_4802r_roku_ultra_2022_4k_hdr_dolby_1708258.jpg'),
(38, 'GoPro HERO11 Black Creator Edition Bundle', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining a compact form factor.', 7, 200000, '2023-07-20 11:25:10', 'gopro_chdfb_111_cn_hero11_black_creator_edition_1721878.jpg'),
(39, 'GoPro Display Mod Front-Facing Camera Screen', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining ', 8, 100000, '2023-07-20 11:26:28', 'gopro_ajlcd_001_display_mod_for_hero8_1540204.jpg'),
(40, 'GoPro Dual-Battery Charger with Two Enduro Batteries', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining.', 9, 100000, '2023-07-20 11:27:26', 'gopro_addbd_211_enduro_dual_battery_charger_1720163.jpg'),
(41, 'ZGCINE PS-G10 Charging Case', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining a compact form factor.', 9, 18000, '2023-07-20 11:28:20', 'zgcine_ps_g10_charging_case_for_1709704.jpg'),
(42, 'Belkin BoostCharge Pro 45W', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining a compact form factor.', 3, 10000, '2023-07-20 11:58:06', 'belkin_wch011dqwh_boostcharge_pro_45w_dual_1735752.jpg'),
(43, 'USB Type-C To USB Type-C', 'Portable and powerful define the Belkin BoostCharge Pro 45W Dual USB-C GaN Wall Charger and its ability to safely recharge an array of devices wherever there\'s an available outlet. Thanks to GaN technology, the BoostCharge Pro can output 45W in total while maintaining a compact form factor.', 3, 5000, '2023-07-20 11:58:51', 'iogear_g2lu3ccm12e_usb_c_to_usb_c_5_1438877.jpg'),
(44, 'Asus Laptop', 'ajaajjahsasasba ax xxaxbasbaahsbabsahsbaa asbahsahsahsahsa', 6, 5000, '2023-07-21 16:16:48', 'asus-transformer-mini-t102ha-10-1-2-1-silver.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'customer', 'customer'),
(2, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
