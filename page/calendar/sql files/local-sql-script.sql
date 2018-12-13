USE mango_screen ;
DROP TABLE IF EXISTS user_cal_item ;
CREATE TABLE `user_cal_item`(
   `cal_id` int NOT NULL AUTO_INCREMENT,
   `title` longtext,
   `start_event` datetime,
   `end_event` datetime,
    PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
