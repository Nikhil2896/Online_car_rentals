-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 02:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cid` int(100) NOT NULL,
  `drivid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cyear` int(100) NOT NULL,
  `ctype` varchar(100) NOT NULL,
  `cdays` int(100) NOT NULL,
  `cprice` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cid`, `drivid`, `cname`, `cyear`, `ctype`, `cdays`, `cprice`, `image`) VALUES
(11, 5, 'Verna', 2018, 'Sedan', 4, 5000, 'th.jpg'),
(12, 9, 'Ford Figo', 2019, 'Hatchbag', 7, 4500, 'figo.jpg'),
(13, 9, 'Xylo', 2019, 'SUV', 7, 6500, 'xylo.png'),
(14, 9, 'Swift', 2018, 'Hatchbag', 10, 4000, 'Swift SZ5.jpg'),
(15, 5, 'Hyundai Creta', 2018, 'SUV', 6, 7000, 'creta.jpg'),
(16, 9, 'Nexon', 2019, 'Crossover', 15, 4000, 'nexon.png'),
(17, 13, 'Maruthi Ertiga', 2017, 'SUV', 22, 4000, 'ertiga.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `demail` varchar(100) NOT NULL,
  `dphone` bigint(100) NOT NULL,
  `dgid` varchar(100) NOT NULL,
  `dpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `dname`, `demail`, `dphone`, `dgid`, `dpassword`) VALUES
(5, 'Nikhil', 'nikhil@gmail.com', 9876543210, '987654', 'pass'),
(9, 'Ravi', 'ravi@gmail.com', 9876543210, 'kfhc46', 'password'),
(13, 'Sheldon', 'sheldon@gmail.com', 9876753210, 'sfgv56543', 'Sheldon@123'),
(14, 'Howard', 'howard@gmail.com', 9835953210, 'sfgv5ss21', 'howard@753'),
(16, 'Howard', 'howard@gmail.com', 9835953210, 'sfgv5ss21', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(100) NOT NULL,
  `cusid` int(100) NOT NULL,
  `carid` int(100) NOT NULL,
  `cdivid` int(100) NOT NULL,
  `date` date NOT NULL,
  `days` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `cusid`, `carid`, `cdivid`, `date`, `days`, `address`, `status`) VALUES
(29, 7, 11, 5, '2019-10-12', 5, 'H.no : 16, secundrabad', 'pending'),
(30, 2, 12, 9, '2019-10-23', 3, 'H.no : 171, yapral, hyderabad', 'accepted'),
(31, 2, 15, 5, '2019-10-15', 6, 'Flat.No B-16, secundrabad', 'pending'),
(32, 2, 13, 9, '2019-10-17', 2, 'Plot.no: B-16, secundrabad.', 'rejected'),
(33, 2, 12, 9, '2019-10-23', 5, 'Plot.no: B-16, secundrabad.', 'rejected'),
(34, 2, 12, 9, '2019-10-18', 6, 'H.no : 171, yapral', 'accepted'),
(35, 3, 17, 13, '2019-10-17', 4, 'H.no : 171, yapral', 'accepted'),
(36, 3, 17, 13, '2019-10-17', 4, 'H.no : 171, yapral', 'rejected'),
(37, 3, 17, 13, '2019-10-25', 5, 'H.no : 171, yapral, hyderabad', 'rejected'),
(38, 2, 15, 5, '2019-10-31', 5, 'Plot.no: B-16, secundrabad.', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `rid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`rid`, `name`, `email`, `phone`, `password`) VALUES
(2, 'Nikhil', 'nikhil@gmail.com', 2147483647, 'password123'),
(3, 'Ram', 'ram@gmail.com', 2147483647, 'ram@123'),
(4, 'Sam', 'sam@gmail.com', 2147483647, 'sam@123'),
(7, 'Raj', 'raj@gmail.com', 9876543210, 'raj'),
(8, 'Rahul', 'rahul@gmail.com', 9845343210, 'rahul@eer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `did` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
