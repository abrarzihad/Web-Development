-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 02:07 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regformcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) UNSIGNED NOT NULL,
  `university` text NOT NULL,
  `hscbatch` int(25) NOT NULL,
  `department` text NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `university`, `hscbatch`, `department`, `question`, `answer`) VALUES
(1, 'buet', 22, 'cse', 'gfhfghfgh', ''),
(2, 'buet', 33, 'cse', 'gfhfghfghgfgh', ''),
(3, 'buet', 12, 'cse', 'fghfghgfhgfh', ''),
(4, 'buet', 655, 'cse', 'trdygdf', ''),
(5, 'du', 26, 'stat', 'asz', ''),
(6, 'buet', 1, 'cse', 'fxdgfdgdfgfdgdfg', ''),
(7, 'buet', 11, 'cse', 'kkkk', ''),
(8, 'buet', 44444, 'cse', 'hgjghjghj', ''),
(20, '', 0, '', '', 'gfjhgjghjghjhgj');

-- --------------------------------------------------------

--
-- Table structure for table `regtable`
--

CREATE TABLE `regtable` (
  `ID` int(11) NOT NULL,
  `type` text DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `university` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `hscbatch` int(25) DEFAULT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regtable`
--

INSERT INTO `regtable` (`ID`, `type`, `username`, `password`, `email`, `university`, `department`, `hscbatch`, `created_at`, `updated_at`) VALUES
(1, 'Student', 'sdcfs', '123456', 'abc@gmail.com', 'buet', 'me', 9201, '2020-02-02 13:49:50.97612', '2020-02-02 13:49:50.97612'),
(2, 'Student', 'radif620', '123456', '123@4.com', 'kuet', 'cse', 2016, '2020-02-02 14:01:18.77707', '2020-02-02 14:01:18.77707'),
(3, 'Student', 'JIm241', '123456', 'deluttara@gmail.com', 'buet', 'ipe', 2016, '2020-02-02 14:33:16.86535', '2020-02-02 14:33:16.86535'),
(4, 'Student', 'lkkjjjj', '12457', 'asa11@gmail.com', 'buet', 'cse', 26, '2020-03-13 16:00:41.23375', '2020-03-13 16:00:41.23375'),
(5, 'Student', 'fgfgfgfg', '7554545', 'abchjhjhjhjh@gmail.com', 'buet', 'cse', 1, '2020-03-13 16:04:59.05750', '2020-03-13 16:04:59.05750'),
(6, 'Alumni', 'hjkhk', '64570', 'gghhhh@gmail.com', 'cuet', 'me', 44, '2020-03-13 17:21:37.92103', '2020-03-13 17:21:37.92103'),
(7, 'Student', 'gdfgdfgdfgddgdfgfdg', '414141414', 'rrrabc@gmail.com', 'sust', 'me', 88, '2020-03-13 17:28:37.60310', '2020-03-13 17:28:37.60310'),
(8, 'Alumni', 'hjkhksss', '4545454', 'ggjjjhhss@gmail.com', 'ruet', 'me', 21, '2020-03-13 17:37:21.53881', '2020-03-13 17:37:21.53881');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regtable`
--
ALTER TABLE `regtable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `regtable`
--
ALTER TABLE `regtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
