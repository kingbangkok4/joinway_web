

CREATE TABLE `comment` (
  `comment_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `commentator` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(3,0) NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `comment` (`comment_id`, `commentator`, `review`, `detail`, `rating`, `comment_datetime`) VALUES
('0000000001', '0001', '0002', 'ขับรถได้เหี้ยมาก', '0', '2016-08-05 00:00:00'),
('0000000002', '0001', '0002', 'ขับรถได้เหี้ยมาก', '999', '2016-08-03 00:00:00'),
('0000000003', '0002', '0001', 'พ่อมึงตายไอสัส', '15', '2016-08-04 00:00:00'),
('0000000004', '0003', '0001', 'พ่อมึงตายยยยไอสัส', '20', '2016-08-06 00:00:00'),
('0000000005', '0002', '0001', 'ทำไมมึงไม่ขับรถดีๆวะห่ะ', '15', '2016-08-12 00:00:00'),
('0000000006', '0002', '0001', 'lkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja\r\nlkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsjalkdsflls;dfsjdfklsja', '15', '2016-08-06 00:00:00');



CREATE TABLE `map` (
  `map_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `meeting_point` text COLLATE utf8_unicode_ci,
  `license_plate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_datetime` datetime NOT NULL,
  `start_lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start_lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `end_lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `end_lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start` text COLLATE utf8_unicode_ci NOT NULL,
  `end` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user';


INSERT INTO `map` (`map_id`, `meeting_point`, `license_plate`, `map_datetime`, `start_lat`, `start_lng`, `end_lat`, `end_lng`, `start`, `end`, `type`, `user_id`) VALUES
('000001', 'ลานจอดรถ ตึก 10', 'บจ - 7069', '2016-08-05 00:00:00', '', '', '', '', 'มหาวิทยาลัยธุรกิจบัณฑิตย์', 'เดอะมองามวงศ์วาน', 0, '0001'),
('000002', 'ลานจอดรถ ตึก 8', 'บจ - 7016', '2016-08-12 00:00:00', '', '', '', '', 'มหาวิทยาลัยธุรกิจบัณฑิตย์', 'เดอะมอบางกะปิ', 0, '0002');




CREATE TABLE `match` (
  `match_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `passenger1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `passenger2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passenger3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `match_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `user` (
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`) VALUES
('0001', '564607030008', '1709900767081', 'Sutat', 'Plienpeng', ''),
('0002', 'admin', 'admin', 'admin', 'admin', ''),
('0003', 'user', 'user', 'user', 'user', '');


ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commentator` (`commentator`),
  ADD KEY `review` (`review`);


ALTER TABLE `map`
  ADD PRIMARY KEY (`map_id`),
  ADD KEY `user_id` (`user_id`);


ALTER TABLE `match`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `driver` (`driver`),
  ADD KEY `passenger1` (`passenger1`),
  ADD KEY `passenger2` (`passenger2`),
  ADD KEY `passenger3` (`passenger3`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commentator`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`review`) REFERENCES `user` (`user_id`);


ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);


ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`driver`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`passenger1`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_3` FOREIGN KEY (`passenger2`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `match_ibfk_4` FOREIGN KEY (`passenger3`) REFERENCES `user` (`user_id`);

