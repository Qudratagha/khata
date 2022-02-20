-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 12:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tayab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `contact`) VALUES
(1, 'tayyabparacha@gmail.com', '68530ef957798826ae158063776b4c6b', 366362619);

-- --------------------------------------------------------

--
-- Table structure for table `clientdetails`
--

CREATE TABLE `clientdetails` (
  `id` int(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cphone` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clientkhata`
--

CREATE TABLE `clientkhata` (
  `id` int(50) NOT NULL,
  `rid` int(50) NOT NULL,
  `cid` int(50) NOT NULL,
  `Lid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logkhata`
--

CREATE TABLE `logkhata` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pquantity` int(50) NOT NULL,
  `tafseel` varchar(50) NOT NULL,
  `jama` int(50) NOT NULL,
  `banam` int(50) NOT NULL,
  `jamaNbanam` varchar(50) NOT NULL,
  `baqaya` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roznamcha`
--

CREATE TABLE `roznamcha` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pquantity` int(50) NOT NULL,
  `tafseel` varchar(50) NOT NULL,
  `jama` int(50) NOT NULL,
  `banam` int(50) NOT NULL,
  `jamaOrBanam` varchar(50) NOT NULL,
  `baqaya` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stockm`
--

CREATE TABLE `stockm` (
  `id` int(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pquantity` int(50) NOT NULL,
  `pprice` int(50) NOT NULL,
  `aquantity` int(50) NOT NULL,
  `ksl` varchar(100) NOT NULL,
  `godam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientdetails`
--
ALTER TABLE `clientdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientkhata`
--
ALTER TABLE `clientkhata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indeX` (`rid`),
  ADD KEY `index2` (`cid`),
  ADD KEY `LogkhataIndex` (`Lid`);

--
-- Indexes for table `logkhata`
--
ALTER TABLE `logkhata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roznamcha`
--
ALTER TABLE `roznamcha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockm`
--
ALTER TABLE `stockm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientdetails`
--
ALTER TABLE `clientdetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientkhata`
--
ALTER TABLE `clientkhata`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logkhata`
--
ALTER TABLE `logkhata`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roznamcha`
--
ALTER TABLE `roznamcha`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockm`
--
ALTER TABLE `stockm`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientkhata`
--
ALTER TABLE `clientkhata`
  ADD CONSTRAINT `clientkhata_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `clientdetails` (`id`),
  ADD CONSTRAINT `clientkhata_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `roznamcha` (`id`),
  ADD CONSTRAINT `clientkhata_ibfk_3` FOREIGN KEY (`Lid`) REFERENCES `logkhata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
