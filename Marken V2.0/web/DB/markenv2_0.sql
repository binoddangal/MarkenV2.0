-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 01:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markenv2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpa`
--

CREATE TABLE `gpa` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `max_gpa` double NOT NULL,
  `min_gpa` double NOT NULL,
  `status` enum('active','in-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpa`
--

INSERT INTO `gpa` (`id`, `title`, `max_gpa`, `min_gpa`, `status`) VALUES
(1, 'A+', 4, 3.75, 'active'),
(2, 'A', 3.75, 3.5, 'active'),
(3, 'B+', 3.5, 3, 'active'),
(4, 'B', 3, 2.5, 'active'),
(5, 'C', 2.5, 2, 'active'),
(6, 'D', 2, 1.75, 'active'),
(7, 'F', 1.75, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(190) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','admin') DEFAULT NULL,
  `status` enum('active','in-active') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `f_name`, `l_name`, `email`, `password`, `address`, `contact`, `image`, `role`, `status`) VALUES
(1, 'Binod', 'Dangal', 'binod@gmail.com', '1f49756f262ef0b16355bb23eff4f828', 'Thali', '9860098323', '170eba3aea7062b6a483495aea53364a.JPG', 'superadmin', 'active'),
(4, 'Payal', 'Chauhan', 'payal@gmail.com', '64d8a47c30f84958c2cc2181e9382f35', 'KTM', '9808253676', '14a5071cfe9a577cf2a9a56de0de80c5.jpg', 'superadmin', 'active'),
(5, 'Shankar', 'Shrestha', 'shankar@gmail.com', 'e36746428c0084e5444890f46c97b6b8', 'ktm', '785421', '7d727e3a2a183e71e337bd23377ab637.png', 'superadmin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `term_id` varchar(255) DEFAULT NULL,
  `theory` float NOT NULL,
  `semester_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `thgrade` varchar(3) DEFAULT NULL,
  `gradepoint` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `year`, `term_id`, `theory`, `semester_id`, `subject_id`, `thgrade`, `gradepoint`) VALUES
(1, '999', 2076, '1', 20, '2', '1', 'F', 1),
(2, '998', 2076, '1', 60, '2', '1', 'B+', 3),
(3, '999', 2076, '1', 70, '2', '2', 'A', 3.5),
(4, '998', 2076, '1', 76, '2', '2', 'A+', 3.8),
(5, '888', 2076, '1', 70, '4', '3', 'A', 3.5),
(6, '887', 2076, '1', 50, '4', '3', 'B', 2.5),
(7, '888', 2076, '1', 80, '4', '4', 'A+', 4),
(8, '887', 2076, '1', 80, '4', '4', 'A+', 4),
(9, '777', 2076, '1', 75, '6', '5', 'A+', 3.75),
(10, '776', 2076, '1', 78, '6', '5', 'A+', 3.9),
(11, '777', 2076, '1', 70, '6', '6', 'A', 3.5),
(12, '776', 2076, '1', 71, '6', '6', 'A', 3.55),
(13, '666', 2076, '1', 60, '8', '7', 'B+', 3),
(14, '665', 2076, '1', 14, '8', '7', 'F', 0.7),
(15, '666', 2076, '1', 50, '8', '8', 'B', 2.5),
(16, '665', 2076, '1', 55, '8', '8', 'B', 2.75),
(17, '888', 2077, '1', 80, '4', '3', 'A+', 4),
(18, '887', 2077, '1', 75, '4', '3', 'A+', 3.75),
(19, '888', 2080, '1', 80, '4', '4', 'A+', 4),
(20, '887', 2080, '1', 80, '4', '4', 'A+', 4),
(21, '888', 2081, '1', 100, '4', '9', 'A+', 4),
(22, '887', 2081, '1', 80, '4', '9', 'B+', 3.2),
(23, '000', 2090, '4', 100, '9', '9', 'A+', 4),
(24, '1', 2090, '4', 100, '9', '9', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','in-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `title`, `description`, `status`) VALUES
(1, 'First Semester', 'First Semester', 'active'),
(2, 'Second Semester', 'Second Semester', 'active'),
(3, 'Third Semester', 'Third Semester', 'active'),
(4, 'Fourth Semester', 'Fourth Semester', 'active'),
(5, 'Fifth Semester', 'Fifth Semester', 'active'),
(6, 'Sixth Semester', 'Sixth Semester', 'active'),
(7, 'Seventh Semester', 'Seventh Semester', 'active'),
(8, 'Eighth Semester', 'Eighth Semester', 'active'),
(9, 'Ninth Semester', 'half yearly', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `semester_id` varchar(255) NOT NULL,
  `roll` int(10) DEFAULT NULL,
  `student_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`f_name`, `l_name`, `semester_id`, `roll`, `student_id`) VALUES
('Sadikshya', 'Shrestha', '2', 1, '999'),
('Bilson', 'Naga', '2', 2, '998'),
('Payal Singh', 'Chauhan', '4', 1, '888'),
('Sayara', 'Dangol', '4', 2, '887'),
('Rukesh', 'Bashukala', '6', 1, '777'),
('Roshan', 'Shrestha', '6', 2, '776'),
('Keshab', 'Bhadel', '8', 1, '666'),
('Shankar', 'Shrestha', '8', 2, '665'),
('Ram', 'Karki', '9', 45, '000'),
('Ram', 'Karki', '9', 80, '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_name` varchar(50) DEFAULT NULL,
  `fullMarks` int(11) DEFAULT NULL,
  `passMarks` int(11) DEFAULT NULL,
  `credit_hrs` int(11) DEFAULT NULL,
  `subject_id` int(10) NOT NULL,
  `semester_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_name`, `fullMarks`, `passMarks`, `credit_hrs`, `subject_id`, `semester_id`) VALUES
('Digital Logic', 80, 40, 3, 1, 2),
('C++', 80, 40, 3, 2, 2),
('Web-I', 80, 40, 3, 3, 4),
('Database', 80, 40, 3, 4, 4),
('Java', 80, 40, 3, 5, 6),
('Data Mining', 80, 40, 3, 6, 6),
('Software Engineering', 80, 40, 3, 7, 8),
('E-commerce', 80, 40, 3, 8, 8),
('C++', 100, 50, 3, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','in-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `title`, `description`, `status`) VALUES
(1, 'First Term', 'First Term', 'active'),
(2, 'Pre-Board', 'Pre-Board', 'active'),
(3, 'Board', 'Board', 'active'),
(4, 'second term', '1 monthly', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpa`
--
ALTER TABLE `gpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gpa`
--
ALTER TABLE `gpa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
