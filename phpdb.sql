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
(1, 'Prasad', '643755c1e03e3ed218ffcc55cea987e8037128a55786f3cb6b32751e52df5e327804dca3e86079b93756c8cf3b7961ba147c773eedd7feb4017050cdb6dcb3d4', 'CSE-4C', 20),
(2, 'Rama', 'a4dcf4975c723fe6fa2bd03831d6e1cc150b565b4587ca640a0eb6722e304fdf999b9339ca146a84436c313421315dbd4a3b4930ade6a30fce4b9e8ba7806f1e', 'CSE-4B', 20),
(3, 'Laxmi', '47b9ea22e0fbb547aa58270dd25b5d606fd80267a9cf6d12223855ec1baba615333cae421f649f06b402437471ead6e8720576c613628198df81ecde1091c7b9', 'CSE-4A', 20),
(4, 'Suresh', '5dd7b94dcb228c943ab633fc448eef225a6e0e00f12d63c844a0d10180a94d19449157fa46040d3defc069e85b5a4a746e48eb954bdd2dcdead546d647f1611d', 'CSE-4D', 20);

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
  `LeaveType` varchar(60) NOT NULL,
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
