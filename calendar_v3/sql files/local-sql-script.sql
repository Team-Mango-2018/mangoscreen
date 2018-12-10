USE mango_screen ;
DROP TABLE IF EXISTS events ;
CREATE TABLE `events`(
   `id` int NOT NULL AUTO_INCREMENT,
   `title` longtext,
   `start_event` datetime,
   `end_event` datetime,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
