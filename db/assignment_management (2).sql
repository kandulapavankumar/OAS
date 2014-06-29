-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2014 at 03:21 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignment_management`
--
CREATE DATABASE IF NOT EXISTS `assignment_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `assignment_management`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_id`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2014-06-13 18:30:00', '2014-06-14 11:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `year` enum('1','2','3','4') NOT NULL,
  `section` enum('A','B','C','D','E','F','G','H','I','J') NOT NULL,
  `submission_final_date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `is_valid` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `lecturer_id` (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `name`, `subject_id`, `lecturer_id`, `year`, `section`, `submission_final_date`, `file`, `is_valid`, `created_at`, `updated_at`) VALUES
(1, 'as1', 1, 1, '1', 'B', '0000-00-00', 'assignment-290614150836-53b02bf49accd.pdf', 1, '0000-00-00 00:00:00', '2014-06-29 15:10:13'),
(2, 'assss1', 1, 1, '1', 'A', '2014-06-11', 'assignment-290614150836-53b02bf49accd.pdf', 1, '2014-06-15 10:55:37', '2014-06-29 15:10:16'),
(3, 'assss1', 1, 1, '1', 'A', '0000-00-00', 'assignment-290614150836-53b02bf49accd.pdf', 1, '2014-06-15 10:55:48', '2014-06-29 15:10:18'),
(4, 'assss1', 1, 1, '1', 'A', '0000-00-00', 'assignment-290614150836-53b02bf49accd.pdf', 1, '2014-06-15 10:55:54', '2014-06-29 15:10:22'),
(8, 'pavan', 1, 1, '1', 'A', '2014-06-23', 'assignment-290614150836-53b02bf49accd.pdf', 1, '2014-06-22 11:58:50', '2014-06-29 15:10:24'),
(10, 'cpp', 1, 1, '1', 'A', '2014-06-30', 'assignment-290614150836-53b02bf49accd.pdf', 1, '2014-06-29 15:08:36', '2014-06-29 15:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE IF NOT EXISTS `assignment_submissions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `marks` int(10) DEFAULT NULL,
  `is_valid` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `assignment_id` (`assignment_id`),
  KEY `assignment_id_2` (`assignment_id`),
  KEY `sudent_id` (`student_id`),
  KEY `assignment_id_3` (`assignment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `assignment_submissions`
--

INSERT INTO `assignment_submissions` (`id`, `assignment_id`, `student_id`, `file`, `marks`, `is_valid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'assignment-answer-290614150932-53b02c2ccd2cb.pdf', NULL, 1, '2014-06-15 10:42:34', '2014-06-29 15:09:59'),
(2, 2, 1, 'assignment-answer-290614150932-53b02c2ccd2cb.pdf', NULL, 1, '2014-06-22 04:56:16', '2014-06-29 15:10:01'),
(3, 2, 1, 'assignment-answer-290614150932-53b02c2ccd2cb.pdf', NULL, 1, '2014-06-22 07:02:04', '2014-06-29 15:10:04'),
(4, 4, 1, 'assignment-answer-290614150932-53b02c2ccd2cb.pdf', NULL, 1, '2014-06-22 07:11:30', '2014-06-29 15:10:06'),
(5, 10, 1, 'assignment-answer-290614150932-53b02c2ccd2cb.pdf', NULL, 1, '2014-06-29 15:09:32', '2014-06-29 15:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `email_id`, `name`, `designation`, `password`, `created_at`, `updated_at`) VALUES
(1, 'lecturer@gmail.com', 'Lecturer', 'HOD', '1dfbba5b5fa79b789c93cfc2911d846124153615', '2014-06-13 18:30:00', '2014-06-14 11:14:23'),
(2, '12345', 'asd', '1', '6dcd4ce23d88e2ee9568ba546c007c63d9131c1b', '2014-06-15 03:45:52', '2014-06-15 03:45:52'),
(3, '6789', 'qwe', '2', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec', '2014-06-15 03:45:52', '2014-06-15 03:45:52'),
(4, 'lecturer1@gmail.com', 'asd', 'HOD', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-06-29 14:53:58', '2014-06-29 14:53:58'),
(5, 'lecturer2@gmail.com', 'qwe', 'Lecturer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-06-29 14:53:58', '2014-06-29 14:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `section_subject_lecturer`
--

CREATE TABLE IF NOT EXISTS `section_subject_lecturer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` enum('1','2','3','4') NOT NULL,
  `section` enum('A','B','C','D','E','F','G','H','I','J') NOT NULL,
  `subject_id` int(10) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `is_valid` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`,`lecturer_id`),
  KEY `lecturer_id` (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `section_subject_lecturer`
--

INSERT INTO `section_subject_lecturer` (`id`, `year`, `section`, `subject_id`, `lecturer_id`, `is_valid`, `created_at`, `updated_at`) VALUES
(8, '1', 'A', 2, 3, 1, '2014-06-15 05:52:39', '2014-06-29 15:10:32'),
(10, '1', 'B', 1, 1, 1, '2014-06-15 06:13:01', '2014-06-29 15:10:37'),
(13, '1', 'A', 1, 2, 1, '2014-06-29 12:57:17', '2014-06-29 15:10:40'),
(14, '1', 'A', 1, 1, 1, '2014-06-29 13:27:25', '2014-06-29 15:10:42'),
(15, '1', 'A', 1, 1, 1, '2014-06-29 14:16:59', '2014-06-29 15:10:45'),
(17, '1', 'A', 1, 1, 1, '2014-06-29 15:03:11', '2014-06-29 15:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` enum('1','2','3','4') NOT NULL,
  `section` enum('A','B','C','D','E','F','G','H','I','J') NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_no`, `name`, `year`, `section`, `password`, `created_at`, `updated_at`) VALUES
(1, 'student', 'Student', '1', 'A', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', '2014-06-13 18:30:00', '2014-06-14 11:15:03'),
(6, '12345', 'asd', '1', 'A', '8cb2237d0679ca88db6464eac60da96345513964', '2014-06-15 02:59:21', '2014-06-15 03:03:23'),
(7, '6789', 'qwe', '2', 'B', '7d695548f82a9589a5b09da95040ad6930ce8b86', '2014-06-15 02:59:21', '2014-06-15 02:59:21'),
(8, '912345', 'asd', '1', 'A', '8cb2237d0679ca88db6464eac60da96345513964', '2014-06-29 14:46:40', '2014-06-29 14:46:40'),
(9, '96789', 'qwe', '2', 'B', '7d695548f82a9589a5b09da95040ad6930ce8b86', '2014-06-29 14:46:40', '2014-06-29 14:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'CF', '1', '2014-06-15 04:03:23', '2014-06-15 04:03:23'),
(2, 'CN', '2', '2014-06-15 04:03:23', '2014-06-15 04:03:23'),
(3, 'cpp', '10', '2014-06-29 14:56:33', '2014-06-29 14:56:33'),
(4, 'c', '20', '2014-06-29 14:56:33', '2014-06-29 14:57:26');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD CONSTRAINT `assignment_submissions_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assignment_submissions_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `section_subject_lecturer`
--
ALTER TABLE `section_subject_lecturer`
  ADD CONSTRAINT `section_subject_lecturer_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `section_subject_lecturer_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
