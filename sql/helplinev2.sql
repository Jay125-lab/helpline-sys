-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2023 at 07:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

DROP TABLE IF EXISTS `clienttherapist`;
CREATE TABLE `clienttherapist` (
  `clth_ID` int(11) NOT NULL,
  `cl_ID` int(11) NOT NULL,
  `th_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienttherapist`
--

INSERT INTO `clienttherapist` (`clth_ID`, `cl_ID`, `th_ID`) VALUES
(1, 1, 16),
(3, 3, 15),
(4, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
CREATE TABLE `counties` (
  `County_ID` int(11) NOT NULL,
  `CountyName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`County_ID`, `CountyName`) VALUES
(1, ' Mombasa'),
(2, 'Kwale'),
(3, 'Kilifi'),
(4, 'Tana River'),
(5, 'Lamu'),
(6, 'Taita/Taveta'),
(7, 'Garissa'),
(8, 'Wajir'),
(9, 'Mandera'),
(10, 'Marsabit'),
(11, 'Isiolo'),
(12, 'Meru'),
(13, 'Tharaka-Nithi'),
(14, 'Embu'),
(15, 'Kitui'),
(16, 'Machakos'),
(17, 'Makueni'),
(18, 'Nyandarua'),
(19, 'Nyeri'),
(20, 'Kirinyaga'),
(21, 'Murang\'a'),
(22, 'Kiambu'),
(23, 'Turkana'),
(24, 'West Pokot'),
(25, 'Samburu'),
(26, 'Trans Nzoia'),
(27, 'Uasin Gishu'),
(28, 'Elgeyo/Marakwet'),
(29, 'Nandi'),
(30, 'Baringo'),
(31, 'Laikipia'),
(32, 'Nakuru'),
(33, 'Narok'),
(34, 'Kajiado'),
(35, 'Kericho'),
(36, 'Bomet'),
(37, 'Kakamega'),
(38, 'Vihiga'),
(39, 'Bungoma'),
(40, 'Busia'),
(41, 'Siaya'),
(42, 'Kisumu'),
(43, 'Homa Bay'),
(44, 'Migori'),
(45, 'Kisii'),
(46, 'Nyamira'),
(47, 'Nairobi City');

-- --------------------------------------------------------

--
-- Table structure for table `imgtbl`
--

DROP TABLE IF EXISTS `imgtbl`;
CREATE TABLE `imgtbl` (
  `picID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imgName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signupcl`
--

DROP TABLE IF EXISTS `signupcl`;
CREATE TABLE `signupcl` (
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signupcl`
--

INSERT INTO `signupcl` (`ID`, `fname`, `lname`, `phone`, `email`, `psd`) VALUES
(1, 'Amon', 'Kiprotich', 716822498, 'aminkipchirchir2@gmail.com', '5d7d386857c8823682992837f50fc2bcccf6ec528f3aaaef86e20598f6921586af9782d2a131fbb2cf14d6894e06683144080f397cd153d8fb36b39a8c95f8bd'),
(2, 'Mary', 'Anne', 705236987, 'mary@gmail.com', '925ece1aeeeec8a68e8921e1a00b889a8895205f2ad3569b38dd1fdf68a909156e893ac49a8c279acd28889e90ed22f53467da7564631189e2f299fe2ad669d7'),
(3, 'Lucy', 'Mint', 796357159, 'lucy@gmail.com', '3378489ee852332324a2d6983a220690b80cc0d0f50212b6f3a120663ec5d10f32864c4e456c9ebeb92cf0847eccb071c227b5718951b50c10981f2761a970a1');

-- --------------------------------------------------------

--
-- Table structure for table `thdoctbl`
--

DROP TABLE IF EXISTS `thdoctbl`;
CREATE TABLE `thdoctbl` (
  `docID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `docName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thinfo`
--

DROP TABLE IF EXISTS `thinfo`;
CREATE TABLE `thinfo` (
  `thID` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `education` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `residence` varchar(25) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pswd` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thinfo`
--

INSERT INTO `thinfo` (`thID`, `fname`, `lname`, `education`, `age`, `residence`, `gender`, `phoneNo`, `email`, `pswd`, `status`) VALUES
(1, 'Kenan', 'Kipchirchir', 'Masters', 35, 'Nairobi City', 'Male', 712547896, 'amon.kip.kip@gmail.com', 'e8edd3c9416329756dcb87ff4a6578e0716ec865708edb6fbc187a7befb02439f4704ccf7eb313d0da78877675fc8f3b724525905d0370f8025da00857b3baf4', 'unverified'),
(14, 'Mike', 'Left', 'Diploma', 26, 'Busia', 'Male', 714569782, 'mike@gmail.com', 'a91d24d7eab7683bc73b857d42dfc48a9577c600ccb5e7d7adabab54eebc112232f3de2539208f22a560ad320d1f2cda5a5f1a127baf6bf871b0e282c2b85220', 'unverified'),
(15, 'Peter', 'John', 'Doctorate', 48, 'Mombasa', 'Male', 796258741, 'peter@gmail.com', '1756200d020e803f70ca4ebbd2eeb3ac4d2418724120dc8cb2226d73805a261483686ec9cb4dde1a256ffcfaa0a275b9a6893738133b47f37a853ca21056a8e0', 'unverified'),
(16, 'James', 'Bond', 'Masters', 40, 'Machakos', 'Male', 759856321, 'james@gmail.com', '625f7fdb99de7de358ab119ead94c29b436764e1bffb3af4f1ca715b692cf155e62007572ce4101fef09a98130369de7a06ccd57903b4c5a9104d1444a02f4a2', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `thpictbl`
--

DROP TABLE IF EXISTS `thpictbl`;
CREATE TABLE `thpictbl` (
  `picID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `imgName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `thdoctbl`
--
ALTER TABLE `thdoctbl`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `th_idx` (`thID`);

--
-- Indexes for table `thinfo`
--
ALTER TABLE `thinfo`
  ADD PRIMARY KEY (`thID`);

--
-- Indexes for table `thpictbl`
--
ALTER TABLE `thpictbl`
  ADD PRIMARY KEY (`picID`),
  ADD KEY `th_idx` (`thID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  MODIFY `clth_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imgtbl`
--
ALTER TABLE `imgtbl`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signupcl`
--
ALTER TABLE `signupcl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thdoctbl`
--
ALTER TABLE `thdoctbl`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thinfo`
--
ALTER TABLE `thinfo`
  MODIFY `thID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `thpictbl`
--
ALTER TABLE `thpictbl`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  ADD CONSTRAINT `clienttherapist_ibfk_1` FOREIGN KEY (`cl_ID`) REFERENCES `signupcl` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clienttherapist_ibfk_2` FOREIGN KEY (`th_ID`) REFERENCES `thinfo` (`thID`);

--
-- Constraints for table `thdoctbl`
--
ALTER TABLE `thdoctbl`
  ADD CONSTRAINT `thdoctbl_ibfk_1` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thpictbl`
--
ALTER TABLE `thpictbl`
  ADD CONSTRAINT `thpictbl_ibfk_1` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
