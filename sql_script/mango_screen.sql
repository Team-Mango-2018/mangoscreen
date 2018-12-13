-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
--
-- Host: custsql-ipg108.eigbox.net
-- Generation Time: Nov 17, 2018 at 03:54 PM
-- Server version: 5.6.41
-- PHP Version: 4.4.9
--
-- Database: `mango_screen`
--
DROP DATABASE IF EXISTS `mango_screen`;
CREATE DATABASE `mango_screen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mango_screen`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
USE mango_screen ;

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `college` longtext,
  `course` longtext,
  `fname` longtext,
  `lname` longtext,
  PRIMARY KEY (`username`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

USE mango_screen ;
DROP TABLE IF EXISTS `notes_tbl`;
CREATE TABLE IF NOT EXISTS `notes_tbl` (
    `notes_id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(50),
    `image` longblob NOT NULL,
    `notes_name` varchar(50) NOT NULL,
    `rating` int,
    `comment` longtext,
    `tag1` longtext,
    `tag2` longtext,
    `tag3` longtext,
    PRIMARY KEY (`notes_id`),
    FOREIGN KEY (`username`) REFERENCES user(`username`)
  -- !!! Insert more Album References here

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

USE mango_screen ;
DROP TABLE IF EXISTS user_cal_item ;
CREATE TABLE `user_cal_item`(
   `cal_id` int NOT NULL AUTO_INCREMENT,
   `title` longtext,
   `start_event` datetime,
   `end_event` datetime,
   `user_id` longtext,
    PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `college`, `course`, `fname`, `lname`) VALUES ('johnnysins', 'faketaxi@lube.com', 'b1282c1dbc170a3f4bf470b7edb080c3', NULL, NULL, NULL, NULL);
