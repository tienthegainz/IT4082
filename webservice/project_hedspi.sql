-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2018 at 02:00 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE project_hedspi;
USE project_hedspi;

--
-- Database: `project_hedspi`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_exercises`
--

CREATE TABLE `t_exercises` (
  `id_exercise` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nosets` int(11) NOT NULL,
  `noreps` int(11) NOT NULL,
  `guideline` text NOT NULL,
  `video` varchar(50) NOT NULL COMMENT 'link to the tutorial video'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_exercises`
--

INSERT INTO `t_exercises` (`id_exercise`, `name`, `nosets`, `noreps`, `guideline`, `video`) VALUES
(1, 'Squat', 5, 5, '', ''),
(2, 'Overhead Press', 5, 5, '', ''),
(3, 'Pull Up', 5, 5, '', ''),
(4, 'Bench Press', 5, 5, '', ''),
(5, 'Deadlift', 5, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_programs`
--

CREATE TABLE `t_programs` (
  `id_program` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `t_program_exercise` (
  `program_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
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

CREATE TABLE `t_tracking` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nosets` int(11) NOT NULL,
  `noreps` int(11) NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'in kg',
  `exercise` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user who summit the data',
  `trainer_id` int(11) DEFAULT NULL COMMENT 'trainer who data are sent to'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_trainers`
--

CREATE TABLE `t_trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `field` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'in kilograms',
  `height` int(11) NOT NULL COMMENT 'in kilograms',
  `trainer_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id`, `name`, `username`, `password`, `age`, `gender`, `weight`, `height`, `trainer_id`, `program_id`) VALUES
(1, 'Ha Tien', 'gainzallday', 't123', 20, 'Male', 70, 174, 1, 1),
(2, 'Vu Duc', 'moon_love', 'd123', 23, 'Male', 55, 170, 2, 1),
(3, 'Luu Xuan Son', 'sonbeo_98', 'son123', 21, 'male', 90, 180, 1, 1),
(4, 'Ha Viet Tien', 'tien_gainz', '123', 16, 'male', 61, 167, 1, 1),
(5, 'Pham Chien', 'moonpham', '123', 20, 'female', 60, 165, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_exercises`
--
ALTER TABLE `t_exercises`
  ADD PRIMARY KEY (`id_exercise`);

--
-- Indexes for table `t_programs`
--
ALTER TABLE `t_programs`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `t_program_exercise`
--
ALTER TABLE `t_program_exercise`
  ADD KEY `exercise_id` (`exercise_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `t_tracking`
--
ALTER TABLE `t_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `t_trainers`
--
ALTER TABLE `t_trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `program_id` (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_exercises`
--
ALTER TABLE `t_exercises`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_programs`
--
ALTER TABLE `t_programs`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_tracking`
--
ALTER TABLE `t_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_trainers`
--
ALTER TABLE `t_trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
