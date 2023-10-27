-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 08:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f0_35316860_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lorence`
--

CREATE TABLE `lorence` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lorence`
--

INSERT INTO `lorence` (`id`, `date`, `timein`, `timeout`, `notes`) VALUES
(2, '2023-10-28', '02:02:49', '02:06:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblUsers`
--

CREATE TABLE `tblUsers` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblUsers`
--

INSERT INTO `tblUsers` (`id`, `username`, `fullname`, `password`) VALUES
(25, 'lorence', 'lorence', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lorence`
--
ALTER TABLE `lorence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblUsers`
--
ALTER TABLE `tblUsers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lorence`
--
ALTER TABLE `lorence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblUsers`
--
ALTER TABLE `tblUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
