-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:47 AM
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
-- Table structure for table `administration`
--
-- Creation: Apr 17, 2023 at 09:15 PM
--

CREATE TABLE `administration` (
  `adID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`adID`, `email`, `password`) VALUES
(1, 'admin@helpline.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

-- --------------------------------------------------------

--
-- Table structure for table `clientfeedback`
--
-- Creation: Apr 18, 2023 at 11:24 PM
-- Last update: Apr 19, 2023 at 02:13 AM
--

CREATE TABLE `clientfeedback` (
  `qID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `q11` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientfeedback`
--

INSERT INTO `clientfeedback` (`qID`, `thID`, `total`, `q11`) VALUES
(1, 15, 30, 'wqd'),
(2, 15, 30, ''),
(3, 15, 29, 'dtthrthuy6jnn');

-- --------------------------------------------------------

--
-- Table structure for table `clientselfassessment`
--
-- Creation: Apr 19, 2023 at 01:28 AM
-- Last update: Apr 19, 2023 at 02:11 AM
--

CREATE TABLE `clientselfassessment` (
  `asID` int(11) NOT NULL,
  `clID` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `subDate` date NOT NULL,
  `subTime` time NOT NULL,
  `q11` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientselfassessment`
--

INSERT INTO `clientselfassessment` (`asID`, `clID`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `subDate`, `subTime`, `q11`) VALUES
(1, 5, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '2023-04-19', '03:27:15', ''),
(2, 5, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '2023-04-19', '03:29:15', 'e5yrtrthr'),
(3, 5, 4, 2, 4, 5, 1, 5, 4, 2, 1, 4, 32, '2023-04-19', '04:11:18', '56uy56u5ut54yytjr');

-- --------------------------------------------------------

--
-- Table structure for table `clienttherapist`
--
-- Creation: Apr 18, 2023 at 12:15 PM
-- Last update: Apr 19, 2023 at 02:47 AM
--

CREATE TABLE `clienttherapist` (
  `clth_ID` int(11) NOT NULL,
  `cl_ID` int(11) NOT NULL,
  `th_ID` int(11) NOT NULL,
  `assignmentStatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttherapist`
--

INSERT INTO `clienttherapist` (`clth_ID`, `cl_ID`, `th_ID`, `assignmentStatus`) VALUES
(1, 1, 14, 'active'),
(3, 3, 14, 'dropped'),
(4, 2, 14, 'active'),
(5, 4, 14, 'active'),
(6, 5, 15, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--
-- Creation: Apr 17, 2023 at 09:15 PM
--

CREATE TABLE `counties` (
  `County_ID` int(11) NOT NULL,
  `CountyName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `messaging`
--
-- Creation: Apr 18, 2023 at 12:10 AM
--

CREATE TABLE `messaging` (
  `messageID` int(11) NOT NULL,
  `clID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `postDate` date NOT NULL,
  `postTime` time NOT NULL,
  `Message` text NOT NULL,
  `clRead` tinyint(1) NOT NULL,
  `thRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduledmeets`
--
-- Creation: Apr 18, 2023 at 07:51 PM
--

CREATE TABLE `scheduledmeets` (
  `meetID` int(11) NOT NULL,
  `clID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `meetDetails` varchar(255) NOT NULL COMMENT 'individual or group sessions',
  `schedule` varchar(25) NOT NULL COMMENT 'daily, weekly monthly e.t.c',
  `meetLink` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signupcl`
--
-- Creation: Apr 17, 2023 at 11:13 PM
-- Last update: Apr 18, 2023 at 05:35 PM
--

CREATE TABLE `signupcl` (
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pic` varchar(32) NOT NULL,
  `psd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signupcl`
--

INSERT INTO `signupcl` (`ID`, `fname`, `lname`, `phone`, `email`, `pic`, `psd`) VALUES
(1, 'Amon', 'Kiprotich', 716822498, 'amonkipchirchir2@gmail.com', '', '5d7d386857c8823682992837f50fc2bcccf6ec528f3aaaef86e20598f6921586af9782d2a131fbb2cf14d6894e06683144080f397cd153d8fb36b39a8c95f8bd'),
(2, 'Mary', 'Anne', 705236987, 'mary@gmail.com', '', '925ece1aeeeec8a68e8921e1a00b889a8895205f2ad3569b38dd1fdf68a909156e893ac49a8c279acd28889e90ed22f53467da7564631189e2f299fe2ad669d7'),
(3, 'Lucy', 'Mint', 796357159, 'lucy@gmail.com', '', '3378489ee852332324a2d6983a220690b80cc0d0f50212b6f3a120663ec5d10f32864c4e456c9ebeb92cf0847eccb071c227b5718951b50c10981f2761a970a1'),
(4, 'Aaden', 'Kip', 715985521, 'aaden@gmail.com', '', 'c35ce3ea0cb4024e784a0794ba65039314f58d3345290d6aebba764698b398a9a9898f1687bfaede72111c4bd42ed1f8dae4bb555dfe8aed88676e552ab3812f'),
(5, 'Elsie', 'Keima', 745236789, 'elsie@gmail.com', 'IMG-643dd40a223099.43951838.png', '6e107d9468abd1a9f4e13ab26b60c61f9d0a22913ed24987c623d86dc6a9229903598187ac49eca79adeb18dc56e39b7bebfd6ad1c97b59c27748d18bad7f956'),
(6, 'Vasco', 'Da Gamma', 715321951, 'vasco@gmail.com', 'IMG-643ed4ed383c94.64401575.jpg', 'a9c0a2c41ce0b5f62405f2b1f6304f0d1e8abdda6a9ccb399a02e283f4ecc37d2539f20f76d3ae7d430a2239eb40f33d04f8fbf468fab5b4f185befbfca74ccf');

-- --------------------------------------------------------

--
-- Table structure for table `thacthrs`
--
-- Creation: Apr 18, 2023 at 07:30 PM
-- Last update: Apr 19, 2023 at 03:42 AM
--

CREATE TABLE `thacthrs` (
  `achrsID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `workdays` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thacthrs`
--

INSERT INTO `thacthrs` (`achrsID`, `thID`, `startTime`, `endTime`, `workdays`) VALUES
(1, 14, '08:00:00', '17:00:00', 'weekdays'),
(2, 14, '09:30:00', '14:30:00', 'weekends');

-- --------------------------------------------------------

--
-- Table structure for table `thdoctbl`
--
-- Creation: Apr 18, 2023 at 06:02 PM
-- Last update: Apr 18, 2023 at 06:12 PM
--

CREATE TABLE `thdoctbl` (
  `docID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `docOrigName` varchar(32) NOT NULL,
  `docNewName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thdoctbl`
--

INSERT INTO `thdoctbl` (`docID`, `thID`, `docOrigName`, `docNewName`) VALUES
(46, 18, 'Document 2.docx', 'DOC-643dcc6a8b51f7.13338174.docx'),
(47, 18, 'Document 3.docx', 'DOC-643dcc6aa413f7.54659151.docx'),
(48, 18, 'Document 4.docx', 'DOC-643dcc6ab65678.37643693.docx'),
(49, 18, 'Document 5.docx', 'DOC-643dcc6adc1ad1.28201123.docx'),
(50, 18, 'Document 6.docx', 'DOC-643dcc6b02ebd6.26067955.docx'),
(51, 18, 'Document 7.docx', 'DOC-643dcc6b0deec1.51082522.docx'),
(58, 1, 'Step 97 Screenshot.docx', 'DOC-643edc0dbef496.73523202.docx'),
(59, 1, 'Step 118 Screenshot.docx', 'DOC-643edc0dcb9018.83005978.docx'),
(60, 1, 'Tecno_BrakeShoe_Packaging_2021 -', 'DOC-643edc0dda7e80.30075611.pdf'),
(61, 22, 'Step 97 Screenshot.docx', 'DOC-643edcab0acd83.46653561.docx'),
(62, 22, 'Step 118 Screenshot.docx', 'DOC-643edcab308027.61305341.docx'),
(63, 22, 'Tecno_BrakeShoe_Packaging_2021 -', 'DOC-643edcab461c69.50717297.pdf'),
(64, 23, 'jeff_report[1].docx', 'DOC-643edd7213f9e2.16253744.docx'),
(65, 23, 'Java.docx', 'DOC-643edd721e78e5.63365108.docx'),
(66, 23, 'Sentiment analysis skeleton.pdf', 'DOC-643edd722c0291.20187894.pdf'),
(67, 23, 'Assignment 5.pdf', 'DOC-643edd7249c078.41230693.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `thinfo`
--
-- Creation: Apr 18, 2023 at 05:43 PM
-- Last update: Apr 18, 2023 at 06:16 PM
--

CREATE TABLE `thinfo` (
  `thID` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `education` varchar(13) NOT NULL,
  `age` int(11) NOT NULL,
  `residence` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pswd` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thinfo`
--

INSERT INTO `thinfo` (`thID`, `fname`, `lname`, `education`, `age`, `residence`, `gender`, `phoneNo`, `email`, `pswd`, `status`) VALUES
(1, 'Kenan', 'Kipchirchir', 'Masters', 35, 'Nairobi City', 'Male', 712547896, 'kenan@gmail.com', 'e8edd3c9416329756dcb87ff4a6578e0716ec865708edb6fbc187a7befb02439f4704ccf7eb313d0da78877675fc8f3b724525905d0370f8025da00857b3baf4', 'declined'),
(14, 'Mike', 'Left', 'Diploma', 26, 'Busia', 'Male', 714569782, 'mike@gmail.com', 'a91d24d7eab7683bc73b857d42dfc48a9577c600ccb5e7d7adabab54eebc112232f3de2539208f22a560ad320d1f2cda5a5f1a127baf6bf871b0e282c2b85220', 'verified'),
(15, 'Peter', 'John', 'Doctorate', 48, 'Mombasa', 'Male', 796258741, 'peter@gmail.com', '1756200d020e803f70ca4ebbd2eeb3ac4d2418724120dc8cb2226d73805a261483686ec9cb4dde1a256ffcfaa0a275b9a6893738133b47f37a853ca21056a8e0', 'verified'),
(16, 'James', 'Bond', 'Masters', 40, 'Machakos', 'Male', 759856321, 'james@gmail.com', '625f7fdb99de7de358ab119ead94c29b436764e1bffb3af4f1ca715b692cf155e62007572ce4101fef09a98130369de7a06ccd57903b4c5a9104d1444a02f4a2', 'declined'),
(18, 'Miles', 'Morales', 'Undergraduate', 25, 'Mandera', 'Male', 745236987, 'miles@gmail.com', '56b0f5aeaf5206be8d96c5f3a9d06e5d4362f80849562a575159bc6f83ebfa90dcd557782f13bdbbacb7dfb14ac60853d984331f1cd11f29c6f8a5619a786b02', 'unverified'),
(22, 'Brandon', 'Henry', 'Diploma', 27, 'Kilifi', 'Male', 13268525, 'brandon@gmail.com', 'c1e9fecb8d12f9443989902c808cde1e6419b783bf33dff0c446e1843db94432ddf6e43790bece2327d6022bbecf9b09c6e65f7eea391a095290aa6ff85082dc', 'verified'),
(23, 'Chelsea', 'Riley', 'Undergraduate', 25, 'Kwale', 'Female', 745213747, 'chelsea@gmail.com', '0f5925f122dd3f517d329b7758db55894208aee5b648d244ec49ab2a9cb9a5dafe656042b2ff7b37b0b98af29bb5afc9383d8cfacbe39050100a1ce0ae0d70fd', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `thpictbl`
--
-- Creation: Apr 17, 2023 at 10:19 PM
-- Last update: Apr 18, 2023 at 06:12 PM
--

CREATE TABLE `thpictbl` (
  `picID` int(11) NOT NULL,
  `thID` int(11) NOT NULL,
  `imgName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thpictbl`
--

INSERT INTO `thpictbl` (`picID`, `thID`, `imgName`) VALUES
(9, 18, 'IMG-643dcc6a62c577.63105239.jpg'),
(11, 22, 'IMG-643edcaaee77f3.71929669.jpg'),
(12, 23, 'IMG-643edd7201f829.08619191.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`adID`);

--
-- Indexes for table `clientfeedback`
--
ALTER TABLE `clientfeedback`
  ADD PRIMARY KEY (`qID`),
  ADD KEY `th_idx` (`thID`);

--
-- Indexes for table `clientselfassessment`
--
ALTER TABLE `clientselfassessment`
  ADD PRIMARY KEY (`asID`),
  ADD KEY `cl_idx` (`clID`);

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
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `cl_idx` (`clID`),
  ADD KEY `th_idx` (`thID`);

--
-- Indexes for table `scheduledmeets`
--
ALTER TABLE `scheduledmeets`
  ADD PRIMARY KEY (`meetID`),
  ADD KEY `cl_idx` (`clID`),
  ADD KEY `th_idx` (`thID`);

--
-- Indexes for table `signupcl`
--
ALTER TABLE `signupcl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thacthrs`
--
ALTER TABLE `thacthrs`
  ADD PRIMARY KEY (`achrsID`),
  ADD KEY `th_idx` (`thID`);

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
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `adID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientfeedback`
--
ALTER TABLE `clientfeedback`
  MODIFY `qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientselfassessment`
--
ALTER TABLE `clientselfassessment`
  MODIFY `asID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  MODIFY `clth_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduledmeets`
--
ALTER TABLE `scheduledmeets`
  MODIFY `meetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signupcl`
--
ALTER TABLE `signupcl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thacthrs`
--
ALTER TABLE `thacthrs`
  MODIFY `achrsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thdoctbl`
--
ALTER TABLE `thdoctbl`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `thinfo`
--
ALTER TABLE `thinfo`
  MODIFY `thID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `thpictbl`
--
ALTER TABLE `thpictbl`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientfeedback`
--
ALTER TABLE `clientfeedback`
  ADD CONSTRAINT `clientfeedback_ibfk_1` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clienttherapist`
--
ALTER TABLE `clienttherapist`
  ADD CONSTRAINT `clienttherapist_ibfk_1` FOREIGN KEY (`cl_ID`) REFERENCES `signupcl` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clienttherapist_ibfk_2` FOREIGN KEY (`th_ID`) REFERENCES `thinfo` (`thID`);

--
-- Constraints for table `messaging`
--
ALTER TABLE `messaging`
  ADD CONSTRAINT `messaging_ibfk_1` FOREIGN KEY (`clID`) REFERENCES `signupcl` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaging_ibfk_2` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scheduledmeets`
--
ALTER TABLE `scheduledmeets`
  ADD CONSTRAINT `scheduledmeets_ibfk_1` FOREIGN KEY (`clID`) REFERENCES `signupcl` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduledmeets_ibfk_2` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thacthrs`
--
ALTER TABLE `thacthrs`
  ADD CONSTRAINT `thacthrs_ibfk_1` FOREIGN KEY (`thID`) REFERENCES `thinfo` (`thID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
