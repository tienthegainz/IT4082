-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 10:53 PM
-- Server version: 5.5.59-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Database: `hedspi_database`
--

-- --------------------------------------------------------

CREATE DATABASE hedspi_database;
USE hedspi_database;

--
-- Table structure for table `t_exercises`
--

CREATE TABLE IF NOT EXISTS `t_exercises` (
  `id_exercise` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `nosets` int(11) NOT NULL,
  `noreps` int(11) NOT NULL,
  `guideline` text NOT NULL,
  `video` varchar(50) NOT NULL COMMENT 'link to the tutorial video',
  PRIMARY KEY (`id_exercise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_exercises`
--

INSERT INTO `t_exercises` (`id_exercise`, `name`, `nosets`, `noreps`, `guideline`, `video`) VALUES
(1, 'Squat', 5, 5, '', ''),
(2, 'Overhead Press', 5, 5, '', ''),
(3, 'Barbell Row', 5, 5, '', ''),
(4, 'Bench Press', 5, 5, '', ''),
(5, 'Deadlift', 5, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_programs`
--

CREATE TABLE IF NOT EXISTS `t_programs` (
  `id_program` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_programs`
--

INSERT INTO `t_programs` (`id_program`, `name`, `description`) VALUES
(1, 'StrongLift', 'It''s strong to lift'),
(2, 'Push Pull Leg', '3 days per week');

-- --------------------------------------------------------

--
-- Table structure for table `t_program_exercise`
--

CREATE TABLE IF NOT EXISTS `t_program_exercise` (
  `program_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  KEY `exercise_id` (`exercise_id`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_program_exercise`
--

INSERT INTO `t_program_exercise` (`program_id`, `exercise_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_tracking`
--

CREATE TABLE IF NOT EXISTS `t_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nosets` int(11) NOT NULL,
  `noreps` int(11) NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'in kg',
  `exercise` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user who summit the data',
  `trainer_id` int(11) DEFAULT NULL COMMENT 'trainer who data are sent to',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `t_tracking`
--

INSERT INTO `t_tracking` (`id`, `date`, `nosets`, `noreps`, `weight`, `exercise`, `user_id`, `trainer_id`) VALUES
(1, '2018-04-01', 5, 5, 60, 'Squat', 1, 1),
(2, '2018-04-01', 5, 5, 30, 'Overhead Press', 1, 1),
(3, '2018-04-01', 5, 5, 20, 'Barbell Row', 1, 1),
(4, '2018-04-03', 5, 5, 63, 'Squat', 1, 1),
(5, '2018-04-03', 5, 5, 50, 'Bench Press', 1, 1),
(6, '2018-04-03', 5, 5, 80, 'Deadlift', 1, 1),
(7, '2018-04-04', 5, 5, 75, 'Squat', 1, 1),
(8, '2018-04-04', 5, 5, 43, 'Overhead Press', 1, 1),
(9, '2018-04-04', 5, 5, 25, 'Barbell Row', 1, 1),
(10, '2018-04-06', 1, 5, 65, 'Squat', 1, NULL),
(11, '2018-04-06', 1, 5, 52, 'Bench Press', 1, NULL),
(12, '2018-04-06', 1, 5, 82, 'Deadlift', 1, NULL),
(13, '2018-04-06', 5, 5, 77, 'Squat', 1, NULL),
(14, '2018-04-06', 1, 5, 45, 'Overhead Press', 1, NULL),
(15, '2018-04-06', 5, 5, 27, 'Barbell Row', 1, NULL),
(16, '2018-04-13', 5, 5, 54, 'Squat', 3, NULL),
(17, '2018-04-13', 1, 5, 18, 'Overhead Press', 3, NULL),
(18, '2018-04-13', 5, 5, 62, 'Barbell Row', 3, NULL),
(19, '2018-04-15', 5, 5, 54, 'Squat', 3, NULL),
(20, '2018-04-15', 5, 5, 36, 'Bench Press', 3, NULL),
(21, '2018-04-15', 5, 5, 62, 'Deadlift', 3, NULL),
(22, '2018-04-15', 5, 5, 67, 'Squat', 1, NULL),
(23, '2018-04-15', 5, 5, 54, 'Bench Press', 1, NULL),
(24, '2018-04-15', 5, 5, 84, 'Deadlift', 1, NULL),
(25, '2018-04-15', 5, 5, 79, 'Squat', 1, NULL),
(26, '2018-04-15', 5, 5, 47, 'Overhead Press', 1, NULL),
(27, '2018-04-15', 5, 5, 29, 'Barbell Row', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_trainers`
--

CREATE TABLE IF NOT EXISTS `t_trainers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `field` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_trainers`
--

INSERT INTO `t_trainers` (`id`, `name`, `age`, `gender`, `field`) VALUES
(1, 'Rich Piana', 47, 'Male', 'Body Building'),
(2, 'Duy Nguyen', 22, 'Male', 'Body Building');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'in kilograms',
  `height` int(11) NOT NULL COMMENT 'in kilograms',
  `trainer_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trainer_id` (`trainer_id`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id`, `name`, `username`, `password`, `age`, `gender`, `weight`, `height`, `trainer_id`, `program_id`) VALUES
(1, 'Ha Tien', 'gainzallday', 't123', 20, 'male', 70, 174, 1, 1),
(2, 'Vu Duc', 'moon_love', 'd123', 23, 'male', 55, 170, 2, 1),
(3, 'Luu Xuan Son', 'sonbeo_98', 'sontito', 21, 'male', 90, 180, 1, 1),
(4, 'Ha Viet Tien', 'tien_gainz', '123', 16, 'male', 61, 167, 1, 1),
(5, 'Pham Chien', 'moonpham', '123', 20, 'female', 60, 165, 2, 1),
(6, 'Lan Anh', 'lanlan1', '123', 19, 'female', 70, 164, 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_program_exercise`
--
ALTER TABLE `t_program_exercise`
  ADD CONSTRAINT `t_program_exercise_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `t_programs` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_program_exercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `t_exercises` (`id_exercise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tracking`
--
ALTER TABLE `t_tracking`
  ADD CONSTRAINT `t_tracking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_tracking_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `t_trainers` (`id`);

--
-- Constraints for table `t_users`
--
ALTER TABLE `t_users`
  ADD CONSTRAINT `t_users_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `t_trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_users_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `t_programs` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
