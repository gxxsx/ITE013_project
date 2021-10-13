SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `boats` (
`b_id` int(11) NOT NULL,
  `b_name` varchar(35) NOT NULL,
  `b_cpcty` varchar(35) NOT NULL,
  `b_on` varchar(35) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `b_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;



INSERT INTO `boats` (`b_id`, `b_name`, `b_cpcty`, `b_on`, `b_img`, `b_price`) VALUES
(43, 'M/B XAMM I', '10 Persons', 'Lantoy', '../boat_image/xamm.jpg', 5500),
(52, 'M/B XAMM II', '10 Persons', 'Naning', '../boat_image/xamm2.jpg', 5500),
(53, 'M/B ARJELI', '15 Persons', 'Kabal', '../boat_image/arjel.jpg', 7500),
(54, 'M/B ARJEL II', '15 Persons', 'Onyo', '../boat_image/arjel2.jpg', 7500),
(55, 'M/B PAMELA I', '20 Persons', 'Arad', '../boat_image/pamela.jpg', 9500),
(56, 'M/B PAMELA II', '20 Persons', 'Inu', '../boat_image/pamela2.jpg', 9500),
(57, 'M/B 7', '12 Persons', 'Driver1', '../boat_image/3.jpg', 3500),
(58, 'M/B 8', '12 Persons', 'Driver1', '../boat_image/2.jpg', 3000),
(59, 'M/B 9', '12 Persons', 'Driver1', '../boat_image/3.jpg', 3000),
(60, 'M/B 10', '12 Persons', 'Driver1', '../boat_image/4.jpg', 3000),
(61, 'M/B 11', '12 Persons', 'Driver1', '../boat_image/sample.jpg', 3000),
(62, 'M/B 12', '12 Persons', 'Driver1', '../boat_image/4.jpg', 3000),
(64, 'M/B 13', '12 Persons', 'Driver1', '../boat_image/2.jpg', 3000),
(65, 'M/B 14', '12 Persons', 'Driver1', '../boat_image/3.jpg', 3000),
(66, 'M/B 15', '12 Persons', 'Driver1', '../boat_image/4.jpg', 3000),
(74, 'M/B 16', '12 Persons', 'Driver1', '../boat_image/sample.jpg', 3000),
(76, 'M/B 17', '12 Persons', 'Driver1', '../boat_image/2.jpg', 3500);



CREATE TABLE IF NOT EXISTS `reservation` (
`r_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `r_dstntn` varchar(35) NOT NULL,
  `r_date` varchar(35) NOT NULL,
  `r_hr` varchar(35) NOT NULL,
  `r_ampm` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `tourist` (
`tour_id` int(11) NOT NULL,
  `tour_fN` varchar(50) NOT NULL,
  `tour_mN` varchar(50) NOT NULL,
  `tour_lN` varchar(50) NOT NULL,
  `tour_address` varchar(255) NOT NULL,
  `tour_contact` varchar(15) NOT NULL,
  `tour_un` varchar(50) NOT NULL,
  `tour_up` varchar(35) NOT NULL,
  `user_type` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



INSERT INTO `tourist` (`tour_id`, `tour_fN`, `tour_mN`, `tour_lN`, `tour_address`, `tour_contact`, `tour_un`, `tour_up`, `user_type`) VALUES
(2, '', '', '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

ALTER TABLE `boats`
 ADD PRIMARY KEY (`b_id`);

ALTER TABLE `reservation`
 ADD PRIMARY KEY (`r_id`), ADD KEY `b_id` (`b_id`), ADD KEY `tour_id` (`tour_id`);


ALTER TABLE `tourist`
 ADD PRIMARY KEY (`tour_id`);

ALTER TABLE `boats`
MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;

ALTER TABLE `reservation`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tourist`
MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

ALTER TABLE `reservation`
ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `boats` (`b_id`),
ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tourist` (`tour_id`);

