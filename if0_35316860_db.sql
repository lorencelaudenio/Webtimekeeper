-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2023 at 06:05 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20750947_timein`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `date`, `timein`, `timeout`, `notes`) VALUES
(1, '2023-10-28', '11:07:11', '11:59:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `hello`
--

CREATE TABLE `hello` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, '2023-10-28', '02:02:49', '02:06:40', ''),
(3, '2023-10-29', '02:22:01', '03:44:07', ''),
(5, '2023-10-31', '15:02:29', '15:02:41', ''),
(6, '2023-11-01', '13:34:19', '15:29:06', '30%'),
(7, '2023-11-06', '10:17:18', '20:30:01', ''),
(8, '2023-11-07', '10:49:04', '00:00:00', ''),
(9, '2023-11-08', '15:08:15', '00:00:00', ''),
(10, '2023-11-09', '10:14:45', '21:42:17', ''),
(11, '2023-11-10', '11:46:53', '19:41:06', ''),
(12, '2023-11-13', '14:50:19', '22:00:42', ''),
(13, '2023-11-14', '11:57:02', '16:40:32', ''),
(14, '2023-11-15', '14:04:22', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `date`, `timein`, `timeout`, `notes`) VALUES
(1, '2023-11-14', '08:42:28', '00:00:00', '');

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
(25, 'lorence', 'lorence', '1234'),
(26, 'guest', 'guest', '1234'),
(27, 'po', 'patry', '1234'),
(28, 'user', 'user', '1234'),
(29, 'user2', 'user2', '1234'),
(30, 'hello', 'hello', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timein` varchar(256) DEFAULT NULL,
  `timeout` varchar(256) DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hello`
--
ALTER TABLE `hello`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lorence`
--
ALTER TABLE `lorence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblUsers`
--
ALTER TABLE `tblUsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hello`
--
ALTER TABLE `hello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lorence`
--
ALTER TABLE `lorence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblUsers`
--
ALTER TABLE `tblUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
