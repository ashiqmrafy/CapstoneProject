-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2021 at 08:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AutoMatrix`
--

CREATE DATABASE AutoMatrix;

USE AutoMatrix;

-- --------------------------------------------------------

--
-- Table structure for table `carquotes`
--

CREATE TABLE `carquotes` (
  `quoteid` int(11) NOT NULL,
  `vehicleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documentsid` int(100) NOT NULL,
  `licence` blob NOT NULL,
  `insurancehistory` blob NOT NULL,
  `creditreport` blob NOT NULL,
  `userid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packageid` int(11) NOT NULL,
  `packagename` varchar(100) NOT NULL,
  `monthlyCost` double NOT NULL,
  `monthlyInsurance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`packageid`, `packagename`, `monthlyCost`, `monthlyInsurance`) VALUES
(1, 'Economy', 899.99, 180),
(2, 'Mid-Range', 1299.99, 220),
(3, 'Preminum', 1699.99, 260),
(4, 'Premium+', 1999.99, 300);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quoteid` int(100) NOT NULL,
  `packageid` int(100) DEFAULT NULL,
  `qoutePrice` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usedid` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Vehicles`
--

CREATE TABLE `Vehicles` (
  `vehicleid` int(11) NOT NULL,
  `vehiclebrand` varchar(255) NOT NULL,
  `vehiclemodel` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `specs` text NOT NULL,
  `price` double NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `image3` longblob NOT NULL,
  `packageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `carquotes`
--
ALTER TABLE `carquotes`
  ADD KEY `quoteid` (`quoteid`),
  ADD KEY `vehicleid` (`vehicleid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packageid`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quoteid`),
  ADD KEY `packageid` (`packageid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usedid`);

--
-- Indexes for table `Vehicles`
--
ALTER TABLE `Vehicles`
  ADD PRIMARY KEY (`vehicleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quoteid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usedid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Vehicles`
--
ALTER TABLE `Vehicles`
  MODIFY `vehicleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carquotes`
--
ALTER TABLE `carquotes`
  ADD CONSTRAINT `carquotes_ibfk_1` FOREIGN KEY (`quoteid`) REFERENCES `quotes` (`quoteid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carquotes_ibfk_2` FOREIGN KEY (`vehicleid`) REFERENCES `Vehicles` (`vehicleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`packageid`) REFERENCES `packages` (`packageid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
