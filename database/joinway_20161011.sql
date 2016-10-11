-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 11, 2016 at 12:00 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `joinway`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL auto_increment,
  `map_id` int(11) NOT NULL,
  `commentator` varchar(10) collate utf8_unicode_ci NOT NULL,
  `review` varchar(10) collate utf8_unicode_ci NOT NULL,
  `detail` text collate utf8_unicode_ci NOT NULL,
  `rating` decimal(3,0) NOT NULL,
  `comment_datetime` datetime NOT NULL,
  PRIMARY KEY  (`comment_id`),
  KEY `commentator` (`commentator`),
  KEY `review` (`review`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `comment`
-- 

INSERT INTO `comment` VALUES (1, 0, '0001', '0002', 'ขับรถได้เหี้ยมาก', 0, '2016-08-05 00:00:00');
INSERT INTO `comment` VALUES (2, 0, '0001', '0002', 'ขับรถได้เหี้ยมาก', 999, '2016-08-03 00:00:00');
INSERT INTO `comment` VALUES (3, 0, '0002', '0001', 'พ่อมึงตายไอสัส', 15, '2016-08-04 00:00:00');
INSERT INTO `comment` VALUES (4, 0, '0003', '0001', 'พ่อมึงตายยยยไอสัส', 20, '2016-08-06 00:00:00');
INSERT INTO `comment` VALUES (5, 0, '0002', '0001', 'ทำไมมึงไม่ขับรถดีๆวะห่ะ', 15, '2016-08-12 00:00:00');
INSERT INTO `comment` VALUES (6, 0, '0002', '0001', 'lkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja', 15, '2016-08-06 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `map`
-- 

CREATE TABLE `map` (
  `map_id` int(11) NOT NULL auto_increment,
  `meeting_point` text collate utf8_unicode_ci,
  `license_plate` varchar(10) collate utf8_unicode_ci default NULL,
  `map_datetime` datetime default NULL,
  `start_lat` varchar(200) collate utf8_unicode_ci default NULL,
  `start_lng` varchar(200) collate utf8_unicode_ci default NULL,
  `end_lat` varchar(200) collate utf8_unicode_ci default NULL,
  `end_lng` varchar(200) collate utf8_unicode_ci default NULL,
  `start` text collate utf8_unicode_ci,
  `end` text collate utf8_unicode_ci,
  `type` varchar(10) collate utf8_unicode_ci default NULL,
  `user_id` varchar(10) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`map_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user' AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `map`
-- 

INSERT INTO `map` VALUES (7, 'aaa', 'ssssss', NULL, NULL, NULL, NULL, NULL, 'aaa', 'aaa', '0', '0002');
INSERT INTO `map` VALUES (8, 'aaa', 'ssssss', NULL, NULL, NULL, NULL, NULL, 'aaakhkhjkhk', 'aaakhjkhkj', '0', '0002');
INSERT INTO `map` VALUES (9, 'เมืองสิงห์บุรี', 'ABC 85599', '2016-08-27 11:25:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'อนุสาวรีย์', '0', '0002');
INSERT INTO `map` VALUES (10, 'พม่าี', 'ABC 85599', '2016-08-27 11:25:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'อนุสาวรีย์', '0', '0002');
INSERT INTO `map` VALUES (11, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (12, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (13, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (14, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (15, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (16, 'fdhfdh', 'fdhdfhfdh', '2016-09-05 10:42:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'fdhfdh', '0', '0002');
INSERT INTO `map` VALUES (17, 'gfjgfj', 'gfjfjgfj', '2016-09-05 10:47:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'gfjf', '0', '0002');
INSERT INTO `map` VALUES (18, 'gfjgfj', 'gfjfjgfj', '2016-09-05 10:47:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'gfjf', '0', '0002');
INSERT INTO `map` VALUES (19, 'dsgdsg', 'dsgsgsgsgs', '2016-09-05 10:51:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'dsgdsgs', '0', '0002');
INSERT INTO `map` VALUES (20, 'dsgdsg', 'dsgsgsgsgs', '2016-09-05 10:51:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'dsgdsgs', '0', '0002');
INSERT INTO `map` VALUES (21, 'dsgsgddsg', 'sdgds', '2016-09-05 10:58:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'dsgdsg', '0', '0002');
INSERT INTO `map` VALUES (22, 'sfsfd', 'fdsfsf', '2016-09-05 11:05:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'dsfsf', '0', '0002');
INSERT INTO `map` VALUES (23, 'dadsas', 'sadasd', '2016-09-05 11:05:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'asdsadsadad', '0', '0002');
INSERT INTO `map` VALUES (24, 'dsgs', 'sdgsg', '2016-09-05 11:06:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'sdgds', '0', '0002');
INSERT INTO `map` VALUES (25, 'dsgs', 'sdgsg', '2016-09-05 11:06:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'sdgds', '0', '0002');
INSERT INTO `map` VALUES (26, 'aad', 'affsdf', '2016-09-05 11:12:00', NULL, NULL, NULL, NULL, 'ทดสอบ', 'adzd', '0', '0002');

-- --------------------------------------------------------

-- 
-- Table structure for table `match`
-- 

CREATE TABLE `match` (
  `match_id` int(10) NOT NULL auto_increment,
  `map_id` int(11) default NULL,
  `driver` varchar(10) collate utf8_unicode_ci default NULL,
  `passenger1` varchar(10) collate utf8_unicode_ci default NULL,
  `passenger2` varchar(10) collate utf8_unicode_ci default NULL,
  `passenger3` varchar(10) collate utf8_unicode_ci default NULL,
  `match_datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`match_id`),
  KEY `driver` (`driver`),
  KEY `passenger1` (`passenger1`),
  KEY `passenger2` (`passenger2`),
  KEY `passenger3` (`passenger3`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `match`
-- 

INSERT INTO `match` VALUES (1, 26, '0002', NULL, NULL, NULL, '2016-10-05 21:50:15');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `user_id` varchar(10) collate utf8_unicode_ci NOT NULL,
  `username` varchar(15) collate utf8_unicode_ci NOT NULL,
  `password` varchar(15) collate utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) collate utf8_unicode_ci NOT NULL,
  `image` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES ('0001', '564607030008', '1709900767081', 'Sutat', 'Plienpeng', '');
INSERT INTO `user` VALUES ('0002', 'admin', 'admin', 'admin', 'admin', '');
INSERT INTO `user` VALUES ('0003', 'user', 'user', 'user', 'user', '');

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
