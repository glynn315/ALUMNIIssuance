-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 04:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hccciprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressinformation`
--

CREATE TABLE `addressinformation` (
  `addressID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `permAdd` varchar(100) NOT NULL,
  `currAdd` varchar(100) NOT NULL,
  `homeContact` varchar(50) NOT NULL,
  `perContact` varchar(50) NOT NULL,
  `emAdd` varchar(50) NOT NULL,
  `emerName` varchar(100) NOT NULL,
  `emerCon` varchar(50) NOT NULL,
  `emerAdd` varchar(100) NOT NULL,
  `emerRelation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcementinformation`
--

CREATE TABLE `announcementinformation` (
  `announceID` int(11) NOT NULL,
  `announcedesc` varchar(100) NOT NULL,
  `announceStart` date NOT NULL,
  `announceEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursetable`
--

CREATE TABLE `coursetable` (
  `programCode` varchar(50) NOT NULL,
  `programDesacription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationinformation`
--

CREATE TABLE `educationinformation` (
  `educationID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `preSchool` varchar(100) NOT NULL,
  `preAddress` varchar(100) NOT NULL,
  `preYear` int(11) NOT NULL,
  `preAward` varchar(100) NOT NULL,
  `elemSchool` varchar(100) NOT NULL,
  `elemAddress` varchar(100) NOT NULL,
  `elemYear` int(11) NOT NULL,
  `elemAward` varchar(100) NOT NULL,
  `highSchool` varchar(100) NOT NULL,
  `highAddress` varchar(100) NOT NULL,
  `highYear` int(11) NOT NULL,
  `highAward` varchar(100) NOT NULL,
  `seniorSchool` varchar(100) NOT NULL,
  `seniorAddress` varchar(100) NOT NULL,
  `seniorYear` int(11) NOT NULL,
  `seniorAward` varchar(100) NOT NULL,
  `previousSchool` varchar(100) NOT NULL,
  `previousAddress` varchar(100) NOT NULL,
  `previousYear` int(11) NOT NULL,
  `previousAward` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employmentinformation`
--

CREATE TABLE `employmentinformation` (
  `employmentID` int(11) NOT NULL,
  `jobStatus` varchar(100) NOT NULL,
  `jobDesc` varchar(100) NOT NULL,
  `dateEmployment` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `jobInformation` varchar(100) NOT NULL,
  `studentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exitinterviewinformation`
--

CREATE TABLE `exitinterviewinformation` (
  `infoID` int(11) NOT NULL,
  `studentNumber` int(11) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `yourself` varchar(255) NOT NULL,
  `Ans1` int(10) NOT NULL,
  `Ans2` int(10) NOT NULL,
  `Ans3` int(11) NOT NULL,
  `Ans4` int(11) NOT NULL,
  `Ans5` int(11) NOT NULL,
  `Ans6` int(11) NOT NULL,
  `Ans7` int(11) NOT NULL,
  `Ans8` int(11) NOT NULL,
  `Ans9` int(11) NOT NULL,
  `Ans10` int(11) NOT NULL,
  `Ans11` int(11) NOT NULL,
  `Ans12` int(11) NOT NULL,
  `Ans13` int(11) NOT NULL,
  `Ans14` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `familyinformation`
--

CREATE TABLE `familyinformation` (
  `familyID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `fatherFname` varchar(100) NOT NULL,
  `fatherMname` varchar(100) NOT NULL,
  `fatherLname` varchar(100) NOT NULL,
  `fatherAge` int(10) NOT NULL,
  `fatherDOB` date NOT NULL,
  `fatherContact` bigint(20) NOT NULL,
  `fatherOccupation` varchar(100) NOT NULL,
  `fatherEducation` varchar(100) NOT NULL,
  `fatherReligion` varchar(100) NOT NULL,
  `motherFname` varchar(100) NOT NULL,
  `motherMname` varchar(100) NOT NULL,
  `motherLname` varchar(100) NOT NULL,
  `motherAge` int(10) NOT NULL,
  `motherDOB` date NOT NULL,
  `motherContact` bigint(20) NOT NULL,
  `motherOccupation` varchar(100) NOT NULL,
  `motherEducation` varchar(100) NOT NULL,
  `motherReligion` varchar(100) NOT NULL,
  `parentRelationship` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobhiringdb`
--

CREATE TABLE `jobhiringdb` (
  `jobID` int(11) NOT NULL,
  `jobHiringDescirption` varchar(100) NOT NULL,
  `jobWhen` date NOT NULL,
  `jobWhere` varchar(100) NOT NULL,
  `jobUntil` date NOT NULL,
  `jobDate` date NOT NULL,
  `jobLink` varchar(100) NOT NULL,
  `jobStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personalinformationtable`
--

CREATE TABLE `personalinformationtable` (
  `studentNumber` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `civStatus` varchar(100) NOT NULL,
  `studentStatus` varchar(100) NOT NULL,
  `dateAccomplish` date NOT NULL,
  `studentImage` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestinformation`
--

CREATE TABLE `requestinformation` (
  `requestID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `requestDate` date NOT NULL,
  `requestDescription` varchar(100) NOT NULL,
  `requestStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentuseraccount`
--

CREATE TABLE `studentuseraccount` (
  `studentCount` varchar(50) NOT NULL,
  `studentFname` varchar(100) NOT NULL,
  `studentMname` varchar(100) NOT NULL,
  `studentLname` varchar(100) NOT NULL,
  `studentYear` varchar(100) NOT NULL,
  `programCode` varchar(100) NOT NULL,
  `studentUsername` varchar(100) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `dateRegistry` date NOT NULL,
  `studentStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounttable`
--

CREATE TABLE `useraccounttable` (
  `userAccountID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `registerDate` date NOT NULL,
  `addedBy` varchar(100) NOT NULL,
  `activeStatus` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `passWord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounttable`
--

INSERT INTO `useraccounttable` (`userAccountID`, `firstName`, `middleName`, `lastName`, `birthdate`, `address`, `position`, `registerDate`, `addedBy`, `activeStatus`, `userName`, `passWord`) VALUES
(1, 'Guidance', 'Guidance', 'Guidance', '2000-01-01', 'Guidance', 'Head Guidance', '2023-05-31', 'ADMIN ADMIN', 'USER-ACTIVE', 'Guidance', 'samplepassword'),
(2, 'Assistant', 'Assistant', 'Assistant', '2000-01-01', 'Assistant', 'Assistant Guidance', '2023-06-01', 'ADMIN ADMIN', 'USER-ACTIVE', 'Assistant', 'sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressinformation`
--
ALTER TABLE `addressinformation`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `announcementinformation`
--
ALTER TABLE `announcementinformation`
  ADD PRIMARY KEY (`announceID`);

--
-- Indexes for table `coursetable`
--
ALTER TABLE `coursetable`
  ADD PRIMARY KEY (`programCode`);

--
-- Indexes for table `educationinformation`
--
ALTER TABLE `educationinformation`
  ADD PRIMARY KEY (`educationID`);

--
-- Indexes for table `employmentinformation`
--
ALTER TABLE `employmentinformation`
  ADD PRIMARY KEY (`employmentID`);

--
-- Indexes for table `exitinterviewinformation`
--
ALTER TABLE `exitinterviewinformation`
  ADD PRIMARY KEY (`infoID`);

--
-- Indexes for table `familyinformation`
--
ALTER TABLE `familyinformation`
  ADD PRIMARY KEY (`familyID`);

--
-- Indexes for table `jobhiringdb`
--
ALTER TABLE `jobhiringdb`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `personalinformationtable`
--
ALTER TABLE `personalinformationtable`
  ADD PRIMARY KEY (`studentNumber`);

--
-- Indexes for table `requestinformation`
--
ALTER TABLE `requestinformation`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `studentuseraccount`
--
ALTER TABLE `studentuseraccount`
  ADD PRIMARY KEY (`studentCount`);

--
-- Indexes for table `useraccounttable`
--
ALTER TABLE `useraccounttable`
  ADD PRIMARY KEY (`userAccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressinformation`
--
ALTER TABLE `addressinformation`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcementinformation`
--
ALTER TABLE `announcementinformation`
  MODIFY `announceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationinformation`
--
ALTER TABLE `educationinformation`
  MODIFY `educationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employmentinformation`
--
ALTER TABLE `employmentinformation`
  MODIFY `employmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exitinterviewinformation`
--
ALTER TABLE `exitinterviewinformation`
  MODIFY `infoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `familyinformation`
--
ALTER TABLE `familyinformation`
  MODIFY `familyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobhiringdb`
--
ALTER TABLE `jobhiringdb`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personalinformationtable`
--
ALTER TABLE `personalinformationtable`
  MODIFY `studentNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestinformation`
--
ALTER TABLE `requestinformation`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccounttable`
--
ALTER TABLE `useraccounttable`
  MODIFY `userAccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
