-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 11:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helplinev1`
--
DROP DATABASE IF EXISTS `helplinev1`;
CREATE DATABASE IF NOT EXISTS `helplinev1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `helplinev1`;

-- --------------------------------------------------------

--
-- Table structure for table `clienttherapist`
--

CREATE TABLE `clienttherapist` (
  `clth_ID` int(11) NOT NULL,
  `cl_ID` int(11) NOT NULL,
  `th_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `County_ID` int(11) NOT NULL,
  `CountyName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `imgtbl`
--

CREATE TABLE `imgtbl` (
  `picID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imgName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signupcl`
--

CREATE TABLE `signupcl` (
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `therapisttbl`
--

CREATE TABLE `therapisttbl` (
  `therapist_ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  ADD PRIMARY KEY (`clth_ID`),
  ADD KEY `clindex` (`cl_ID`),
  ADD KEY `thindex` (`th_ID`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`County_ID`);

--
-- Indexes for table `imgtbl`
--
ALTER TABLE `imgtbl`
  ADD PRIMARY KEY (`picID`);

--
-- Indexes for table `signupcl`
--
ALTER TABLE `signupcl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `therapisttbl`
--
ALTER TABLE `therapisttbl`
  ADD PRIMARY KEY (`therapist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  MODIFY `clth_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgtbl`
--
ALTER TABLE `imgtbl`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signupcl`
--
ALTER TABLE `signupcl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapisttbl`
--
ALTER TABLE `therapisttbl`
  MODIFY `therapist_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  ADD CONSTRAINT `clienttherapist_ibfk_1` FOREIGN KEY (`cl_ID`) REFERENCES `signupcl` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clienttherapist_ibfk_2` FOREIGN KEY (`th_ID`) REFERENCES `therapisttbl` (`therapist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
