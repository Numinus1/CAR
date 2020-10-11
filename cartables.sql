-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2018 at 01:38 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartables`
--

-- --------------------------------------------------------

--
-- Table structure for table `carbasic`
--

CREATE TABLE `carbasic` (
  `ID` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL DEFAULT '',
  `Date` date DEFAULT NULL,
  `Type` varchar(128) DEFAULT NULL,
  `Source` varchar(128) DEFAULT NULL,
  `Process` varchar(128) DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Description` text,
  `Status` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carbasic`
--

INSERT INTO `carbasic` (`ID`, `Name`, `Date`, `Type`, `Source`, `Process`, `Priority`, `Description`, `Status`, `EmployeeID`) VALUES
(1, '1', '2018-09-25', 'corrective action', 'external audit', 'sales - quoting to order', 0, 'fewed', 0, 0),
(2, 'newrequest', '2018-09-26', 'corrective action', 'testing', 'sales - quoting to order', 0, 'this is the second test CAR', 0, 0),
(3, '', '2018-11-23', '', '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `id` int(11) NOT NULL,
  `userid` varchar(128) NOT NULL DEFAULT '',
  `key` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`id`, `userid`, `key`, `email`) VALUES
(3, '3', 'c21849ce0d23207b0d03d38f3925c487', 'mrb@jayashree.in');

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE `tester` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tester`
--

INSERT INTO `tester` (`id`, `username`, `pwd`) VALUES
(6, 'a', 'b'),
(7, 'qwd', 'dwq'),
(8, 'fed', 'fed'),
(9, 'zzz', 'zzza');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '30'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`) VALUES
(4, 'rajas', '5d41402abc4b2a76b9719d911017c592', 'rajas.joshi@gmail.com', 1),
(2, 'raman', '5d41402abc4b2a76b9719d911017c592', 'raj@jayashree.in', 1),
(3, 'mrb', 'f30aa7a662c728b7407c54ae6bfd27d1', 'mrb@jayashree.in', 0),
(5, 'rajas', 'd1810874e8705f98e18527eb996fde3c', 'rajas.joshi@gmail.com', 1),
(6, 'raj', 'cac5ff630494aa784ce97b9fafac2500', 'raj@jayashree.in', 1),
(7, 'rajas', '5d41402abc4b2a76b9719d911017c592', 'rajas.joshi@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carbasic`
--
ALTER TABLE `carbasic`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester`
--
ALTER TABLE `tester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carbasic`
--
ALTER TABLE `carbasic`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `confirm`
--
ALTER TABLE `confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tester`
--
ALTER TABLE `tester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
