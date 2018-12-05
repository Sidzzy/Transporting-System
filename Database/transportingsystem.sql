-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 11:25 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `working_under` varchar(100) NOT NULL,
  `trips` int(5) NOT NULL,
  `licence` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`username`, `name`, `working_under`, `trips`, `licence`, `password`, `number`) VALUES
('sidzzean', 'Shakaal', 'sidzzy', 0, 'hello world2456', '1234', 9999888822),
('sidzzy', 'sid singhal', 'sidzzy', 0, 'abcd', '1234', 9938272266),
('sidzzzy', 'sid', 'sidzzy', 0, '12', '12345', 7978476922);

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicle`
--

CREATE TABLE `driver_vehicle` (
  `id` int(10) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_vehicle`
--

INSERT INTO `driver_vehicle` (`id`, `driver_id`, `vehicle_id`, `cost`) VALUES
(1, 'sidzzy', 'OD15J1891', 100),
(2, 'sidzzy', 'OD15J1891', 50);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) NOT NULL,
  `passengerusername` varchar(100) NOT NULL,
  `seats` int(10) NOT NULL,
  `driver_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `passengerusername`, `seats`, `driver_id`) VALUES
(2, 'sid1', 1, 'sidzzy');

-- --------------------------------------------------------

--
-- Table structure for table `tsp`
--

CREATE TABLE `tsp` (
  `owner_name` varchar(100) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `licence` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsp`
--

INSERT INTO `tsp` (`owner_name`, `agency_name`, `address`, `contact`, `username`, `licence`, `password`) VALUES
('sid', 'sidzzy', 'sbp', '9938272265', 'sidzz', '123', '81dc9bdb52d04dc20036'),
('sid', 'sidzzy', 'sbp', '9938272266', 'sidzzy', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(100) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `phone`, `username`, `password`) VALUES
('sid', 0, 'sid', 'b8c1a3069167247e3503'),
('sid1', 9, 'sid1', 'sid1'),
('sid2', 8, 'sid2', '14bf4cddb79bb5e7d7a6');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `number` varchar(100) NOT NULL,
  `tspid` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `capacity` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `timing` time NOT NULL,
  `trips` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`number`, `tspid`, `type`, `capacity`, `source`, `destination`, `timing`, `trips`) VALUES
('OD15J1890', 'sidzzy', 'Van', 10, 'Burla', 'Sambalpur', '10:00:00', 0),
('OD15J1891', 'sidzzy', 'Van', 20, 'Burla', 'Sambalpur', '11:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `licence` (`licence`);

--
-- Indexes for table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsp`
--
ALTER TABLE `tsp`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `licence` (`licence`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
