-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 08:37 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joinway`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `match_id` int(11) NOT NULL,
  `commentator` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(3,0) NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `match_id`, `commentator`, `review`, `detail`, `rating`, `comment_datetime`) VALUES
(1, 0, '0001', '0002', 'ขับรถได้เหี้ยมาก', '0', '2016-08-05 00:00:00'),
(2, 0, '0001', '0002', 'ขับรถได้เหี้ยมาก', '999', '2016-08-03 00:00:00'),
(3, 0, '0002', '0001', 'พ่อมึงตายไอสัส', '15', '2016-08-04 00:00:00'),
(4, 0, '0003', '0001', 'พ่อมึงตายยยยไอสัส', '20', '2016-08-06 00:00:00'),
(5, 0, '0002', '0001', 'ทำไมมึงไม่ขับรถดีๆวะห่ะ', '15', '2016-08-12 00:00:00'),
(6, 0, '0002', '0001', 'lkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja', '15', '2016-08-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `map_id` int(11) NOT NULL,
  `meeting_point` text COLLATE utf8_unicode_ci,
  `license_plate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_datetime` datetime DEFAULT NULL,
  `start_lat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_lng` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_lat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_lng` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` text COLLATE utf8_unicode_ci,
  `end` text COLLATE utf8_unicode_ci,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user';

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`map_id`, `meeting_point`, `license_plate`, `map_datetime`, `start_lat`, `start_lng`, `end_lat`, `end_lng`, `start`, `end`, `type`, `user_id`) VALUES
(27, 'ss', 'sss', '2016-09-26 11:56:00', NULL, NULL, NULL, NULL, 'aa', 'aaa', 'CAR', '0002'),
(28, 'hhh', 'dfdfd', '2016-09-26 15:56:00', NULL, NULL, NULL, NULL, 'fff', 'gggg', 'NOCAR', '0002');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `match_id` int(10) NOT NULL,
  `map_id` int(11) DEFAULT NULL,
  `driver` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passenger1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passenger2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passenger3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment1` tinyint(1) NOT NULL DEFAULT '0',
  `comment2` tinyint(1) NOT NULL DEFAULT '0',
  `comment3` tinyint(1) NOT NULL DEFAULT '0',
  `match_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`match_id`, `map_id`, `driver`, `passenger1`, `passenger2`, `passenger3`, `comment1`, `comment2`, `comment3`, `match_datetime`) VALUES
(2, 27, '0002', NULL, NULL, NULL, 0, 0, 0, '2016-10-26 16:57:10'),
(3, 28, '0002', NULL, NULL, NULL, 0, 0, 0, '2016-10-26 16:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `map_id` int(11) NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`) VALUES
('0001', '564607030008', '1709900767081', 'Sutat', 'Plienpeng', ''),
('0002', 'admin', 'admin', 'admin', 'admin', ''),
('0003', 'user', 'user', 'user', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commentator` (`commentator`),
  ADD KEY `review` (`review`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`map_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `driver` (`driver`),
  ADD KEY `passenger1` (`passenger1`),
  ADD KEY `passenger2` (`passenger2`),
  ADD KEY `passenger3` (`passenger3`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `match_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commentator`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`review`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`driver`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`passenger1`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_3` FOREIGN KEY (`passenger2`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_4` FOREIGN KEY (`passenger3`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
