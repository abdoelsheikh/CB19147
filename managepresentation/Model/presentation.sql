-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 04:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presentation`
--

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(11) NOT NULL,
  `Lect_Name` varchar(50) NOT NULL,
  `Lect_ID` varchar(10) NOT NULL,
  `Lect_Faculty` varchar(50) NOT NULL,
  `Lect_Expertise` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `TimeStart` int(11) NOT NULL,
  `TimeEnd` int(11) NOT NULL,
  `Stud_ID` varchar(10) NOT NULL,
  `Stud_Name` varchar(50) NOT NULL,
  `Stud_Faculty` varchar(50) NOT NULL,
  `Stud_Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `Lect_Name`, `Lect_ID`, `Lect_Faculty`, `Lect_Expertise`, `Date`, `TimeStart`, `TimeEnd`, `Stud_ID`, `Stud_Name`, `Stud_Faculty`, `Stud_Course`) VALUES
(18, 'DR KAMARULZAMAN', 'AS11111', 'FK', 'WEB DEVELOPMENT', '2022-01-17', 10, 12, 'CB19111', 'NURUL AQILAH ZAMRI', 'FK', 'SOFTWARE ENGINEERING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
