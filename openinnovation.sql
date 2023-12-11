-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 11:20 AM
-- Server version: 8.0.13
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openinnovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `street` varchar(1000) COLLATE utf32_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `street`, `city`, `country`, `createdAt`, `updatedAt`, `deletedAt`) VALUES
(1, 'Emma', 'Johnson', 'Broadway 123', 'New York', 'New York', '2023-12-10 17:11:37', NULL, NULL),
(2, 'Liam', 'Williams', 'Hollywood Blvd 456', 'Los Angeles', 'California', '2023-12-10 17:12:15', NULL, NULL),
(3, 'Olivia', 'Smith', 'Michigan Ave 789', 'Chicago', 'Illinois', '2023-12-10 17:13:02', NULL, NULL),
(4, 'Noah', 'Brown', 'Main St 101', 'Houston', 'Texas', '2023-12-10 17:13:35', NULL, NULL),
(5, 'Ava', 'Davis', 'Grand Ave 202', 'Phoenix', 'Arizona', '2023-12-10 17:13:55', NULL, NULL),
(6, 'Sophia', 'Wilson', 'Chestnut St 303', 'Philadelphia', 'Pennsylvania', '2023-12-10 17:14:29', NULL, NULL),
(7, 'Marko', 'Dasic', 'Knez Miahilova 43', 'Belgrade', 'Serbia', '2023-12-11 01:46:16', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
