-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 07:46 PM
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
-- Table structure for table `costcenter`
--

CREATE TABLE `costcenter` (
  `costCenterId` int(11) NOT NULL,
  `plant` varchar(256) DEFAULT NULL,
  `costCenterManagerId` int(11) DEFAULT NULL,
  `equipmentResponsibleId` int(11) DEFAULT NULL,
  `foremanId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentId` int(11) NOT NULL,
  `type` varchar(256) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `model` varchar(256) DEFAULT NULL,
  `serialNumber` varchar(256) DEFAULT NULL,
  `calibrationDate` date DEFAULT NULL,
  `calibration` tinyint(1) DEFAULT NULL,
  `inspectionPlan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(8) NOT NULL COMMENT 'person id',
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
(12, 'MR&period;', 'aaa', 'aaa', 'aaa', '0748105660', 'szabiadam&commat;yahoo&period;com', '68fb03950263d351dd0122051de70256', 'aaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costcenter`
--
ALTER TABLE `costcenter`
  ADD PRIMARY KEY (`costCenterId`),
  ADD KEY `costCenterManagerId` (`costCenterManagerId`),
  ADD KEY `equipmentResponsibleId` (`equipmentResponsibleId`),
  ADD KEY `foremanId` (`foremanId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD KEY `owner` (`owner`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'person id', AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `costcenter`
--
ALTER TABLE `costcenter`
  ADD CONSTRAINT `costcenter_ibfk_1` FOREIGN KEY (`costCenterManagerId`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `costcenter_ibfk_2` FOREIGN KEY (`equipmentResponsibleId`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `costcenter_ibfk_3` FOREIGN KEY (`foremanId`) REFERENCES `person` (`id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`location`) REFERENCES `costcenter` (`costCenterId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
