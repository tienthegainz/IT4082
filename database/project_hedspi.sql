-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2018 at 03:32 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_hedspi`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_exercises`
--

CREATE TABLE `t_exercises` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `calo_csm` int(11) NOT NULL,
  `nosets` int(11) NOT NULL,
  `noreps` int(11) NOT NULL,
  `guideline` text NOT NULL,
  `video` varchar(50) NOT NULL COMMENT 'link to the tutorial video',
  `trainer_id` int(11) DEFAULT NULL COMMENT 'trainer who help with the exercise'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_programs`
--

CREATE TABLE `t_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_program_exercise`
--

CREATE TABLE `t_program_exercise` (
  `program_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `t_exercises`
--
ALTER TABLE `t_exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `t_programs`
--
ALTER TABLE `t_programs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_programs`
--
ALTER TABLE `t_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tracking`
--
ALTER TABLE `t_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_trainers`
--
ALTER TABLE `t_trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_exercises`
--
ALTER TABLE `t_exercises`
  ADD CONSTRAINT `t_exercises_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `t_trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_program_exercise`
--
ALTER TABLE `t_program_exercise`
  ADD CONSTRAINT `t_program_exercise_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `t_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_program_exercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `t_exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `t_users_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `t_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
