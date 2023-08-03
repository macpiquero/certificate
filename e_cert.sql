-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 11:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_cert`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `participant_id` varchar(45) NOT NULL,
  `lesson_id` varchar(45) NOT NULL,
  `path` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `participant_id`, `lesson_id`, `path`, `created_at`) VALUES
(1, '5', '2', '', '2023-08-03 05:18:16 AM'),
(2, '7', '3', '', '2023-08-03 05:19:30 AM'),
(3, '7', '2', '', '2023-08-03 05:20:34 AM'),
(4, '7', '2', 'http://localhost/hrm/assets/certificate/gener', '2023-08-03 05:22:33 AM'),
(5, '5', '1', 'http://localhost/hrm/assets/certificate/gener', '2023-08-03 05:23:01 AM'),
(6, '5', '1', 'http://localhost/hrm/assets/certificate/gener', '2023-08-03 05:23:11 AM'),
(7, '7', '1', 'http://localhost/hrm/assets/certificate/gener', '2023-08-03 05:23:33 AM');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`) VALUES
(1, 'Programming Fundamentals'),
(2, 'Dynamic Programming'),
(3, 'Java Programming');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `firstname`, `lastname`, `email`, `created_at`) VALUES
(5, 'Juan', 'Dela Cruz', '', '2023-08-03 02:20:41 AM'),
(7, 'Paolo', 'Fernandez', '', '2023-08-03 03:07:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`) VALUES
(3, 'Mark', 'Piquero', 'macp@gmail.com', 'mark1234', '2023-08-03 01:29:28 AM'),
(4, 'John', 'Smith', 'john@gmail.com', '123456', '2023-08-03 05:03:32 PM'),
(5, 'john1', 'smith1', 'john1@gmail.com', '1234', '2023-08-03 05:04:34 PM'),
(6, 'john2', 'smith2', 'john2@gmail.com', '1234', '2023-08-03 05:06:31 PM');

-- --------------------------------------------------------

--
-- Table structure for table `z_logs`
--

CREATE TABLE `z_logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `activity` varchar(45) NOT NULL,
  `log_time` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_logs`
--

INSERT INTO `z_logs` (`id`, `user_id`, `activity`, `log_time`) VALUES
(1, '3', 'login', '2023-08-03 01:29:42 AM|::1|08-8F-C3-47-18-49 '),
(2, '4', 'login', '2023-08-03 05:03:44 PM|::1|08-8F-C3-47-18-49 '),
(3, '4', 'logout', '2023-08-03 05:04:15 PM|::1|08-8F-C3-47-18-49 '),
(4, '5', 'login', '2023-08-03 05:04:38 PM|::1|08-8F-C3-47-18-49 '),
(5, '5', 'logout', '2023-08-03 05:06:15 PM|::1|08-8F-C3-47-18-49 '),
(6, '6', 'login', '2023-08-03 05:06:37 PM|::1|08-8F-C3-47-18-49 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_logs`
--
ALTER TABLE `z_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `z_logs`
--
ALTER TABLE `z_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
