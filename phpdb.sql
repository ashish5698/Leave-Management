-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2016 at 12:47 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `SetSickLeave` int(11) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `Dept`, `SetSickLeave`) VALUES
(1, 'Prasad', '89ee5b531e66483a496ea14c750547740b8535a93e0c9532b1643c61fe2a4d6b9f04ded650c5309964822a63c027ed6a817597482ee4a91c2df60ea3a051871f', 'CSE-4C', 20),
(2, 'Rama', 'b9b7da0a2733f1218bf7021f44129267ea596c1daca69652b561b06f66465d83c97f8851129510ee391fbdb3ea02afa62a0657f74f9c8e53e0b429aa1de86f76', 'CSE-4B', 20),
(3, 'Laxmi', '167d407017d2077f1fd99c117a276ce327e967ec6efca746d31706c62c1370ed5949d204226cc897e41b63ba141ca40c8d0484736b1aff73b87c71ad6aebed16', 'CSE-4A', 20),
(4, 'Suresh', 'da7a040bce600e656a1e5d02b472b916e9688c607a608bab58b27310166e4569bcfd82661fafd1868868292e6348eb61674f16db489057cb8c00822db27f08f2', 'CSE-4D', 20);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `StuName` varchar(50) NOT NULL,
  `StuEmail` varchar(40) NOT NULL,
  `Dept` varchar(30) NOT NULL,
  `SickLeave` int(5) UNSIGNED NOT NULL,
  `DateOfJoin` date NOT NULL,
  `DateOfBirth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stu_leaves`
--

CREATE TABLE `stu_leaves` (
  `id` int(11) NOT NULL,
  `StuName` varchar(50) NOT NULL,
  `LeaveReason` varchar(100) NOT NULL,
  `RequestDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LeaveDays` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Requested',
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Dept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_leaves`
--
ALTER TABLE `stu_leaves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stu_leaves`
--
ALTER TABLE `stu_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
