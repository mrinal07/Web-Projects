-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 09:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `sid` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL,
  `intime` varchar(35) NOT NULL,
  `outtime` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arrival`
--

INSERT INTO `arrival` (`sid`, `sname`, `contact`, `date`, `intime`, `outtime`) VALUES
('1234', 'Mrinal', '7387467342', '2020-02-18', '11:38:01', ''),
('1234', 'Mrinal', '7387467342', '2020-02-19', '01:24:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(10) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `branch`, `class`) VALUES
(1, 'Computer Science', '1st year'),
(2, 'Civil Engineer', '4th year');

-- --------------------------------------------------------

--
-- Table structure for table `ldetail`
--

CREATE TABLE `ldetail` (
  `sid` varchar(50) NOT NULL,
  `ldetail` varchar(200) NOT NULL,
  `fdate` varchar(15) NOT NULL,
  `tdate` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldetail`
--

INSERT INTO `ldetail` (`sid`, `ldetail`, `fdate`, `tdate`, `date`) VALUES
('1234', 'Typhoid', '2020-02-02', '2020-02-05', '2020-02-19'),
('1234', 'dfasf', '', '', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `branch`, `class`, `image`, `address`, `pname`, `contact`, `email`, `username`, `password`) VALUES
('1234', 'Mrinal', 'Computer Science', '1st year', 'imgmrinal pic.jpg', 'Flat no 101 Geeta Sankul', 'Nekraj', '7387467342', 'Mrinal7331@gmail.com', 'Mrinal', '1234'),
('12345', 'Kunal', 'Civil Engineer', '4th year', 'imgrsz_1pic-1.jpg', 'Flat no 101 Geeta Sankul', 'Nekraj', '7387467342', 'Mrinal7331@gmail.com', 'Kunal', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`sid`,`date`,`intime`,`outtime`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
