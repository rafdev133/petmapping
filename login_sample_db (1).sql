-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 04:18 PM
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
-- Database: `login_sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dogprofile`
--

CREATE TABLE `dogprofile` (
  `id` int(11) NOT NULL,
  `petname` varchar(20) NOT NULL,
  `vacstatus` text NOT NULL,
  `breed` varchar(15) NOT NULL,
  `petownername` varchar(20) NOT NULL,
  `mobilenum` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `vacsdate` varchar(15) NOT NULL,
  `expiredate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogprofile`
--

INSERT INTO `dogprofile` (`id`, `petname`, `vacstatus`, `breed`, `petownername`, `mobilenum`, `address`, `vacsdate`, `expiredate`) VALUES
(1, 'sanji', 'Vaccinated Pet 1', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '2023-06-20', '2023-12-20'),
(2, 'samson', 'Unvaccinated Pet 2', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '', ''),
(3, 'chichay', 'Vaccinated Pet 3', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '2023-05-20', '2023-11-20'),
(4, 'maxpein', 'Vaccinated Pet 4', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '2023-11-21', '2024-05-21'),
(5, 'robin', 'Unvaccinated Pet 5', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '', ''),
(6, 'blacky', 'Vaccinated Pet 6', 'Aspin', 'rafael porgatorio', '09610979529', 'Blk 1 Lot 1 Phase 1 Section 1 Pabahay 2000, muzon, San jose del monte, Bulacan', '2023-11-21', '2024-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `dogprofile_archive`
--

CREATE TABLE `dogprofile_archive` (
  `id` int(11) NOT NULL,
  `petname` varchar(20) NOT NULL,
  `vacstatus` text NOT NULL,
  `breed` varchar(15) NOT NULL,
  `petownername` varchar(20) NOT NULL,
  `mobilenum` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `vacsdate` varchar(15) NOT NULL,
  `expiredate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(71, 24142141, 'rafael', 'petmapping123@@', '2023-11-13'),
(79, 12345464, 'petmapping', 'petmapping123@@', '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `users_archive`
--

CREATE TABLE `users_archive` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(59) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_archive`
--

INSERT INTO `users_archive` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(76, 12311, 'aryan11', 'petmapping123@@', '2023-11-13'),
(77, 12313213, 'raf', '012899aryan25@@1', '2023-11-13'),
(78, 12312, 'rafael112', '012899aryan25@@1', '2023-11-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogprofile`
--
ALTER TABLE `dogprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogprofile_archive`
--
ALTER TABLE `dogprofile_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_archive`
--
ALTER TABLE `users_archive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dogprofile`
--
ALTER TABLE `dogprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dogprofile_archive`
--
ALTER TABLE `dogprofile_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users_archive`
--
ALTER TABLE `users_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
