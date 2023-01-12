-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 11:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psm_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `Coordinator_ID` varchar(10) NOT NULL,
  `Coordinator_Name` varchar(255) NOT NULL,
  `Coordinator_Faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` varchar(10) NOT NULL,
  `Technician_ID` varchar(10) NOT NULL,
  `Item_Name` varchar(255) NOT NULL,
  `Item_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `Lect_ID` varchar(10) NOT NULL,
  `Lect_Name` varchar(255) NOT NULL,
  `Lect_PhoneNo` int(11) NOT NULL,
  `Lect_OfficeNo` int(11) NOT NULL,
  `Lect_Email` varchar(50) NOT NULL,
  `Lect_OfficeAdd` varchar(50) NOT NULL,
  `Lect_Faculty` varchar(50) NOT NULL,
  `Lect_Position` varchar(50) NOT NULL,
  `Lect_Expertise` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `Meeting_ID` varchar(10) NOT NULL,
  `Lect_ID` varchar(10) NOT NULL,
  `Stud_ID` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(10) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_ID` varchar(10) NOT NULL,
  `Technician_ID` varchar(10) NOT NULL,
  `Stud_ID` varchar(10) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Request_Amount` int(11) NOT NULL,
  `Request_Date` date NOT NULL,
  `Request_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stud_ID` varchar(10) NOT NULL,
  `Stud_Name` varchar(255) NOT NULL,
  `Stud_PhoneNo` int(11) NOT NULL,
  `Stud_Email` varchar(50) NOT NULL,
  `Stud_Add` varchar(50) NOT NULL,
  `Stud_Faculty` varchar(50) NOT NULL,
  `Stud_Course` varchar(50) NOT NULL,
  `Stud_Skills` varchar(255) NOT NULL,
  `Stud_Interest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `SV_ID` varchar(10) NOT NULL,
  `Lect_ID` varchar(10) NOT NULL,
  `SV_Achievement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor slot`
--

CREATE TABLE `supervisor slot` (
  `SV_SlotID` varchar(10) NOT NULL,
  `SV_ID` varchar(10) NOT NULL,
  `SV_SlotNo` int(11) NOT NULL,
  `SV_SlotStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sv hunting information`
--

CREATE TABLE `sv hunting information` (
  `InformationID` varchar(10) NOT NULL,
  `SV_ID` varchar(10) NOT NULL,
  `SV_SlotID` varchar(10) NOT NULL,
  `SV_InfoNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `Technician_ID` varchar(10) NOT NULL,
  `Technician_Name` varchar(255) NOT NULL,
  `Technician_Faculty` varchar(50) NOT NULL,
  `Technician_Email` varchar(50) NOT NULL,
  `Technician_Contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time slot information`
--

CREATE TABLE `time slot information` (
  `TimeSlotID` varchar(10) NOT NULL,
  `Stud_ID` varchar(10) NOT NULL,
  `Lect_ID` varchar(10) NOT NULL,
  `Coordinator_ID` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `TimeStart` int(11) NOT NULL,
  `TimeEnd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `Title_No` int(11) NOT NULL,
  `Lect_ID` varchar(10) NOT NULL,
  `Stud_ID` varchar(10) NOT NULL,
  `Title_Name` varchar(255) NOT NULL,
  `Title_Description` varchar(255) NOT NULL,
  `Title_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`Coordinator_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`Lect_ID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`Meeting_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stud_ID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`SV_ID`);

--
-- Indexes for table `supervisor slot`
--
ALTER TABLE `supervisor slot`
  ADD PRIMARY KEY (`SV_SlotID`);

--
-- Indexes for table `sv hunting information`
--
ALTER TABLE `sv hunting information`
  ADD PRIMARY KEY (`InformationID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`Technician_ID`);

--
-- Indexes for table `time slot information`
--
ALTER TABLE `time slot information`
  ADD PRIMARY KEY (`TimeSlotID`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`Title_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
