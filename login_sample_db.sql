-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 04:33 AM
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
  `address` varchar(100) NOT NULL,
  `creationdate` varchar(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogprofile`
--

INSERT INTO `dogprofile` (`id`, `petname`, `vacstatus`, `breed`, `address`, `creationdate`) VALUES
(27, 'raon1', 'Vaccinated Pet 1', 'Bulldog', 'Blk 1 lot 2 section 1 Phase 3 pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-08 '),
(29, 'blacky', 'Vaccinated Pet 1', 'Askal', 'Blk 1 lot 2 section 2 Phase 2 pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-08 '),
(34, 'shasha1', 'Unvaccinated Pet 1', 'Askal', 'Blk 19 Lot 15 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(35, 'chichi', 'Unvaccinated Pet 1', 'Maltese', 'Blk 20 Lot 6 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(36, 'midnight', 'Unvaccinated Pet 1', 'Askal', 'Blk 16 Lot 5 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(37, 'ketket', 'Vaccinated Pet 1', 'Labrador Retrie', 'Blk 19 Lot 19 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(38, 'whity', 'Unvaccinated Pet 1', 'Askal', 'Blk 20 Lot 4 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(39, 'browney', 'Unvaccinated Pet 1', 'Shih Tzu', 'Blk 19 Lot 13 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(40, 'hope', 'Vaccinated Pet 1', 'Golden Retrieve', 'Blk 19 Lot 1 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(41, 'pennut', 'Vaccinated Pet 2', 'Labrador Retrie', 'Blk 19 Lot 1 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(42, 'uno', 'Unvaccinated Pet 1', 'Askal', 'Blk 19 Lot 16 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(43, 'toki', 'Vaccinated Pet 1', 'Chihuahua', 'Blk 8 Lot 4 Section 8 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(44, 'blue', 'Vaccinated Pet 2', 'Shih Tzu', 'Blk 8 Lot 4 Section 8 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(45, 'garen', 'Vaccinated Pet 3', 'Labrador Retrie', 'Blk 8 Lot 4 Section 8 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(46, 'browny', 'Vaccinated Pet 1', 'Askal', 'Blk 19 Lot 9 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(47, 'bruno', 'Vaccinated Pet 2', 'Askal', 'Blk 19 Lot 9 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(48, 'spike', 'Vaccinated Pet 1', 'Rottweiler', 'Blk 16 Lot 3 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(49, 'shylo', 'Vaccinated Pet 1', 'Poddle', 'Blk 16 Lot 8 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(50, 'sniper', 'Unvaccinated Pet 1', 'Askal', 'Blk 16 Lot 6 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(51, 'pochi', 'Unvaccinated Pet 1', 'Askal', 'Blk 20 Lot 8 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(52, 'tetsu', 'Unvaccinated Pet 1', 'Askal', 'Blk 1 Lot 6 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(53, 'putchi', 'Unvaccinated Pet 1', 'Askal', 'Blk 3 Lot 7 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(54, 'maxx', 'Unvaccinated Pet 1', 'American Bully', 'Blk 3 Lot 14 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(55, 'shadow', 'Vaccinated Pet 1', 'Askal', 'Blk 3 Lot 16 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(56, 'tat', 'Vaccinated Pet 1', 'Shih Tzu', 'Blk 4 Lot 1 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(57, 'doobi', 'Vaccinated Pet 2', 'Doobie', 'Blk 4 Lot 7 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(58, 'covid', 'Vaccinated Pet 1', 'Dobberman', 'Blk 18 Lot 1 Section 13 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(59, 'milo', 'Vaccinated Pet 2', 'Doobie', 'Blk 18 Lot 4 Section 13 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(60, 'choco', 'Vaccinated Pet 1', 'Askal', 'Blk 18 Lot 6 Section 13 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(61, 'asher', 'Unvaccinated Pet 1', 'Askal', 'Blk 17 Lot 7 Section 13 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(62, 'dolly', 'Vaccinated Pet 1', 'Askal', 'Blk 10 Lot 2 Section 12 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(63, 'beau', 'Unvaccinated Pet 1', 'Askal', 'Blk 22 Lot 10 Section 13 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(64, 'nyang', 'Unvaccinated Pet 1', 'Askal', 'Blk 10 Lot 4 Section 14 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(65, 'brownie', 'Unvaccinated Pet 1', 'Askal', 'Blk 17 Lot 11 Section 15 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(66, 'casper', 'Vaccinated Pet 1', 'Chow Chow', 'Blk 21 Lot 1 Section  15 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(67, 'ginger', 'Unvaccinated Pet 1', 'Askal', 'Blk 21 Lot 11 Section  15 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(68, 'spot', 'Vaccinated Pet 1', 'Askal', 'Blk 22 Lot 14 Section 15 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(69, 'solen', 'Unvaccinated Pet 1', 'Askal', 'Blk 7 Lot 1 Section 19 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(70, 'sunyang', 'Unvaccinated Pet 1', 'Askal', 'Blk 7 Lot 2 Section 19 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(71, 'togon', 'Unvaccinated Pet 1', 'St Bernard', 'Blk 3 Lot 3 Section 20 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(72, 'miko', 'Vaccinated Pet 1', 'Askal', 'Blk 17 Lot 16 Section 15 Phase 2 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(73, 'dogie', 'Unvaccinated Pet 1', 'Askal', 'Blk 1 Lot 3 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(74, 'coco', 'Vaccinated Pet 1', 'Shih Tzu', 'Blk 1 Lot 5 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(75, 'copper', 'Unvaccinated Pet 1', 'Askal', 'Blk 1 Lot 11 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(76, 'chewy', 'Vaccinated Pet 1', 'Askal', 'Blk 4 Lot 5 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(77, 'stella', 'Vaccinated Pet 1', 'Shih Tzu', 'Blk 7 Lot 4 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(78, 'riley', 'Unvaccinated Pet 1', 'Askal', 'Blk 12 Lot 5 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(79, 'bailey', 'Vaccinated Pet 1', 'Siberian Husky', 'Blk 14 Lot 3 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(80, 'roxie', 'Vaccinated Pet 1', 'Pomeranian', 'Blk 14 Lot 14 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(81, 'bubbles', 'Vaccinated Pet 2', 'Pomeranian', 'Blk 14 Lot 14 Section 22 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(82, 'apple', 'Unvaccinated Pet 1', 'Shih Tzu', 'Blk 1 Lot 3 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(83, 'bron', 'Unvaccinated Pet 1', 'Beagle', 'Blk 3 Lot 1 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(84, 'fez', 'Unvaccinated Pet 1', 'Askal', 'Blk 9 Lot 10 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(85, 'cookie', 'Vaccinated Pet 1', 'Boxer', 'Blk 11 Lot 8 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(86, 'luis', 'Unvaccinated Pet 1', 'French Bulldog', 'Blk 11 Lot 10 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(87, 'rocky', 'Unvaccinated Pet 1', 'Chow Chow', 'Blk 11 Lot 11 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(88, 'clover', 'Unvaccinated Pet 1', 'Askal', 'Blk 11 Lot 16 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(89, 'kirby', 'Unvaccinated Pet 2', 'Askal', 'Blk 11 Lot 16 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(90, 'browny', 'Unvaccinated Pet 1', 'Askal', 'Blk 12 Lot 4 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(91, 'stewie', 'Vaccinated Pet 1', 'Sharpei', 'Blk 13 Lot 16 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(92, 'umie', 'Vaccinated Pet 1', 'Papillon', 'Blk 15 Lot 16 Section 23 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(93, 'bella', 'Vaccinated Pet 1', 'Siberian Husky', 'Blk 23 Lot 11 Section 24 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(94, 'angel', 'Unvaccinated Pet 1', 'Shih Tzu', 'Blk 2 Lot 6 Section 25 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(95, 'shiela', 'Vaccinated Pet 1', 'Cairn Terrier', 'Blk 3 Lot 11 Section 25 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(96, 'nica', 'Vaccinated Pet 2', 'Yorkshire Terri', 'Blk 3 Lot 11 Section 25 Phase 3 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-09 '),
(120, 'raf', 'Vaccinated Pet 4', 'Askal', 'Blk 16 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(121, 'jonas', 'Vaccinated Pet 5', 'Bulldog', 'Blk 16 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(122, 'alfred', 'Unvaccinated Pet 6', 'Askal', 'Blk 16 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(123, 'orayt', 'Unvaccinated Pet 7', 'Golden Retrieve', 'Blk 16 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(124, 'harvey1', 'Vaccinated Pet 1', 'Aspin', 'Blk 6 lot 9 sec 6 Phase 1 pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(125, 'ara ara', 'Vaccinated Pet 2', 'Askal', 'Blk 6 lot 9 sec 6 Phase 1 pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-12 '),
(126, 'sa', 'Vaccinated Pet 5', 'Aspin', 'Blk 16 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-14 '),
(127, 'ape', 'Vaccinated Pet 1', 'Aspin', 'Blk 11 Lot 7 Section 9 Phase 1 Pabahay 2000 Brgy. Muzon CSJDM Bulacan', '2023-11-14 ');

-- --------------------------------------------------------

--
-- Table structure for table `dogprofile_archive`
--

CREATE TABLE `dogprofile_archive` (
  `id` int(11) NOT NULL,
  `petname` varchar(20) NOT NULL,
  `vacstatus` text NOT NULL,
  `breed` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `creationdate` varchar(11) NOT NULL DEFAULT current_timestamp()
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
(76, 12311, 'aryan11', 'petmapping123@@', '2023-11-13'),
(77, 12313213, 'raf', '012899aryan25@@1', '2023-11-13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `dogprofile_archive`
--
ALTER TABLE `dogprofile_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users_archive`
--
ALTER TABLE `users_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
