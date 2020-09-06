-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 08:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calibration`
--

-- --------------------------------------------------------

--
-- Table structure for table `costcenter1`
--

CREATE TABLE `costcenter1` (
  `costcenterId` int(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `costCenterManagerId` int(255) NOT NULL,
  `equipmentResponsibleId` int(255) NOT NULL,
  `foremanId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costcenter1`
--

INSERT INTO `costcenter1` (`costcenterId`, `plant`, `costCenterManagerId`, `equipmentResponsibleId`, `foremanId`) VALUES
(1, '123', 11, 12, 10),
(2, '1', 11, 12, 10),
(3, '1', 111, 12, 10),
(4, '2', 111, 12, 10),
(5, '', 111, 12, 10),
(6, '', 111, 12, 10),
(7, '', 111, 12, 10),
(8, '3', 111, 12, 10),
(9, 'aaaaaaa', 111, 11, 10),
(10, '1', 111, 11, 12),
(11, '123', 111, 12, 12),
(12, '123', 111, 12, 12),
(13, '123', 111, 11, 10),
(14, '123', 111, 11, 10),
(15, '1', 111, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentId` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `owner` int(255) NOT NULL,
  `location` int(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `calibrationDate` varchar(255) NOT NULL,
  `lastCalibration` date NOT NULL,
  `inspectionPlan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `type`, `owner`, `location`, `model`, `serialNumber`, `calibrationDate`, `lastCalibration`, `inspectionPlan`) VALUES
(1, 'electric', 0, 11, 'mae', 'aass', '0000-00-00', '0000-00-00', 'dc ps'),
(2, 'electric', 0, 11, 'mae', 'aass', '0000-00-00', '0000-00-00', 'dc ps'),
(3, 'electric', 0, 11, 'mae', 'aass', '0000-00-00', '0000-00-00', 'dc ps'),
(4, 'electric', 0, 11, 'mae', 'aass', '0000-00-00', '0000-00-00', 'dc ps'),
(5, 'electric', 0, 11, 'mae', 'aass', 'No', '0000-00-00', 'dc ps'),
(6, 'electric', 11, 11, 'mae', 'aass', 'No', '0000-00-00', 'dc ps'),
(7, 'electric', 1, 11, 'mae', 'aass', 'Yes', '0000-00-00', 'dc ps');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(255) NOT NULL COMMENT 'person id',
  `salutation` varchar(256) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `plant` varchar(256) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `salutation`, `firstName`, `lastName`, `plant`, `phoneNumber`, `email`, `password`, `user`) VALUES
(6, '', '', '', '', '', '', 'b0e8a3d7b0f5004fcb918eafbdaeb741', 'IAS4CLJ'),
(7, '', '', '', '', '', '', 'b0e8a3d7b0f5004fcb918eafbdaeb741', 'IAS4CLJ'),
(8, 'Mr', 'Adam', 'Iamandi', 'Cluj', '0748105660', 'szabiadam&commat;yahoo&period;com', '96e79218965eb72c92a549dd5a330112', 'szabi'),
(9, 'MR&period;', 'Adam', 'Iamandi', 'Cluj', '0748105660', 'szabiadam&commat;yahoo&period;com', '96e79218965eb72c92a549dd5a330112', 'aaaaa'),
(10, 'MR&period;', 'Adam', 'Iamandi', 'Cluj', '0748105660', 'szabiadam&commat;yahoo&period;com', 'e10adc3949ba59abbe56e057f20f883e', 'kakadu'),
(11, 'MR&period;', 'Szabi', 'Iamandi', 'Cluj', '0748105660', 'szabiadam&commat;yahoo&period;com', 'e10adc3949ba59abbe56e057f20f883e', 'Szabi2'),
(12, 'MR&period;', 'aaa', 'aaa', 'aaa', '0748105660', 'szabiadam&commat;yahoo&period;com', '68fb03950263d351dd0122051de70256', 'aaaaaa'),
(13, 'MR&period;', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', '0748105660', 'szabiadam&commat;yahoo&period;com', 'd41d8cd98f00b204e9800998ecf8427e', 'aaaaaaa'),
(14, 'MR&period;', 'Szabi', 'Iamandi', 'Cluj', '0748105660', 'szabiadam&commat;yahoo&period;com', 'a37b2a637d2541a600d707648460397e', 'IAS07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costcenter1`
--
ALTER TABLE `costcenter1`
  ADD PRIMARY KEY (`costcenterId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costcenter1`
--
ALTER TABLE `costcenter1`
  MODIFY `costcenterId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'person id', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
