-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2024 at 02:20 PM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_test`
--

CREATE TABLE `student_test` (
  `id` int(11) NOT NULL,
  `test` varchar(200) NOT NULL,
  `student` int(11) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_test`
--

INSERT INTO `student_test` (`id`, `test`, `student`, `start_time`, `end_time`) VALUES
(8, 'networking', 967211873, '2024-03-26 18:41:29', '2024-03-26 16:11:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_test`
--
ALTER TABLE `student_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

CREATE TABLE `test_time` (
  `id` int(11) NOT NULL,
  `test` varchar(200) NOT NULL,
  `test_hours` int(11) NOT NULL,
  `test_minutes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_time`
--

INSERT INTO `test_time` (`id`, `test`, `test_hours`, `test_minutes`) VALUES
(1, 'networking', 0, 30),
(2, 'software', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_time`
--
ALTER TABLE `test_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_time`
--
ALTER TABLE `test_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

--
-- AUTO_INCREMENT for table `student_test`
--
ALTER TABLE `student_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
