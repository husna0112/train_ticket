-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 04:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_user`
--

CREATE TABLE `bank_user` (
  `id` int(11) NOT NULL,
  `acc_num` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_money` float NOT NULL,
  `bankname` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bank_user`
--

INSERT INTO `bank_user` (`id`, `acc_num`, `password`, `user_money`, `bankname`) VALUES
(1, '1234567890123', '1234', 494, 'ธนาคารออมสิน'),
(5, '9876543210', '4321', 1000, 'ธนาคารกสิกรไทย');

-- --------------------------------------------------------

--
-- Table structure for table `booking_log`
--

CREATE TABLE `booking_log` (
  `id` int(11) NOT NULL,
  `rand_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rand_pw` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ticket_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `expdate` varchar(255) CHARACTER SET utf8 NOT NULL,
  `way` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_station` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_station` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timentrain` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ticket_amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `booking_log`
--

INSERT INTO `booking_log` (`id`, `rand_id`, `rand_pw`, `ticket_type`, `expdate`, `way`, `first_station`, `last_station`, `timentrain`, `ticket_amount`, `price`) VALUES
(33, 's1mymi', 'sk0B', '30 วัน', '17-12-2019', 'กรุงเทพมหานคร (หัวลำโพง) - ชุมทางฉะเชิงเทรา', 'กรุงเทพมหานคร (หัวลำโพง)', 'อุรุพงษ์', 'ORD 391: 16:35-16:43', 3, 6),
(34, 'XIgTJg', 'JMpB', '30 วัน', '17-12-2019', 'กรุงเทพมหานคร (หัวลำโพง) - ชุมทางฉะเชิงเทรา', 'กรุงเทพมหานคร (หัวลำโพง)', 'อุรุพงษ์', 'ORD 277: 15:25-15:38', 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_user`
--
ALTER TABLE `bank_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_log`
--
ALTER TABLE `booking_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_user`
--
ALTER TABLE `bank_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_log`
--
ALTER TABLE `booking_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
