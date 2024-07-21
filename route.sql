-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2016 at 12:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `route`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('namaskar', 'admin@namaskar.com', 'namaskar');

-- --------------------------------------------------------

--
-- Table structure for table `businfo`
--

CREATE TABLE IF NOT EXISTS `businfo` (
  `busno` varchar(15) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `travels` varchar(80) NOT NULL,
  `bus` varchar(50) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `seats` int(10) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businfo`
--

INSERT INTO `businfo` (`busno`, `source`, `destination`, `travels`, `bus`, `departure`, `seats`, `price`) VALUES
('Ga10Pa2332', 'Pokhara', 'Kathmandu', 'Pokhara Travels', 'Facebook Deluxe', '07:00', 41, 750),
('Ga10pa53923', 'Pokhara', 'Syangja', 'Manakamana Travels', 'Pokhara Deluxe', '11:00', 41, 600),
('Ga3pa342302', 'Pokhara', 'Kathmandu', 'Lumbini Travels', 'PKR Bus', '07:00', 51, 700);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `id` int(40) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phno` varchar(50) NOT NULL,
  `bus` varchar(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `transactionnum` varchar(10) NOT NULL,
  `payable` varchar(13) NOT NULL,
  `status` varchar(100) NOT NULL,
  `seatnumber` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `address`, `phno`, `bus`, `source`, `destination`, `departure`, `transactionnum`, `payable`, `status`, `seatnumber`, `date`, `email`) VALUES
(31, 'Binaya Gurung', 'Lekhnath 3, Rithepani RD', '+9779806789958', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'gg5mx6wy', '0', 'PAID', '6, 7, 8, 9, ', '2072-12-02', 'binaygurung2@gmail.com'),
(32, 'Paras', 'Pokhara', '+9779840603310', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', '6aqxm5jj', '0', 'PAID', '10, 11, 12, 13, 14, ', '2072-12-02', ''),
(34, 'batman', 'amar singh', '9816635970', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'pnxspxqr', '0', 'PAID', '1, 2, 3, 4, 5, 6, 7, 8, 9, ', '2072-12-03', 'batman@yahoo.com'),
(35, 'batman', 'amar singh', '9816635970', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'c4frppph', '0', 'PAID', '10, 11, 12, 13, 14, 15, 16, 17, 18, ', '2072-12-03', 'batman@yahoo.com'),
(36, 'batman', 'amar singh', '9816635970', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'jvpr3n40', '0', 'PAID', '19, 20, 21, 22, 23, 24, 25, 26, 27, ', '2072-12-03', 'batman@yahoo.com'),
(37, 'batman', 'amar singh', '9816635970', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'dru8gasj', '0', 'PAID', '28, 29, 30, 31, 32, 33, 34, 35, 36, ', '2072-12-03', 'batman@yahoo.com'),
(38, 'batman', 'amar singh', '9816635970', 'Ga10pa53923', 'Pokhara', 'Syangja', '11:00', 'hhib6ob0', '0', 'PAID', '2, 3, 4, 5, 6, 7, 8, 9, ', '0000-00-00', 'batman@yahoo.com'),
(39, 'Binaya Gurung', 'Lekhnath 3, Rithepani RD', '+9779806789958', 'Ga2pa394023', 'Pokhara', 'Damauli', '07:00', 'nma3sbw6', '0', 'PAID', '15, ', '2072-12-02', ''),
(40, 'Binaya Gurung', 'Lekhnath 3, Rithepani RD', '+9779806789958', 'Ga3pa342302', 'Pokhara', 'Kathmandu', '07:00', 'yfnizo0t', '0', 'PAID', '1, ', '2016-03-14', ''),
(41, 'Binaya Gurung', 'rewrwr', '+9779806789958', 'Ga3pa342302', 'Pokhara', 'Kathmandu', '07:00', '4zvaikq3', '2100', 'Not Paid', '1, 2, 3, ', '2016-03-16', ''),
(42, 'Binaya', 'Lekhnath', '+9779806789958', 'Ga3pa342302', 'Pokhara', 'Kathmandu', '07:00', 'nb762hoj', '6300', 'Not Paid', '4, 5, 6, 7, 8, 9, 10, 11, 12, ', '2016-03-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `passengerinfo`
--

CREATE TABLE IF NOT EXISTS `passengerinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phno` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengerinfo`
--

INSERT INTO `passengerinfo` (`id`, `name`, `email`, `password`, `address`, `phno`) VALUES
(3, 'Binaya Gurung', 'binaygurung2@gmail.com', 'binaya', 'Lekhnath 3, Rithepani RD', '+9779806789958'),
(4, 'Mukta Gurung', 'Mekaligurung@gmail.com', 'jaishambhoo', 'Amarsing 10, Pokhara', '+9770817163618');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `bus` varchar(11) NOT NULL,
  `seat_reserve` varchar(11) NOT NULL,
  `transactionnum` varchar(11) NOT NULL,
  `seat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `date`, `bus`, `seat_reserve`, `transactionnum`, `seat`) VALUES
(33, '', '', '', 'jeo5ob5v', ''),
(34, '2072-11-30', 'ga10pa2323', '1', 'mgr6tuaf', '1, '),
(35, '2072-11-30', 'ga10pa2323', '3', 'zx55eaya', '2, 3, 4, '),
(36, '2072-11-30', 'ga10pa2323', '1', '5cwxhhqi', '5, '),
(37, '2072-11-27', 'ga10pa2323', '1', 'phif4cb6', '1, '),
(38, '2072-11-30', 'sga32ad', '3', 'n2pxjjq4', '6, 7, 8, '),
(39, '2072-11-30', 'sga32ad', '8', 'fmqbz0jy', '9, 10, 11, 12, 13, 14, 15, 16, '),
(40, '2072-11-30', 'Ga10Pa2332', '6', 'qhwxahkd', '17, 18, 19, 20, 21, 22, '),
(41, '2072-11-30', 'Ga10Pa2332', '2', 'bzxmvb0u', '23, 24, '),
(42, '2072-11-29', 'Ga10Pa2332', '1', '8sgvw5rv', '1, '),
(43, '2072-11-29', 'Ga10Pa2332', '1', 'c4qcyqhr', '2, '),
(44, '2072-11-30', 'Ga10Pa2332', '1', '8605ei3w', '25, '),
(47, '2072-11-30', 'Ga10Pa2332', '4', '7sk454kr', '29, 30, 31, 32, '),
(48, '2072-11-16', 'Ga10pa53923', '1', 'ye6itqbm', '1, '),
(49, '2072-11-16', 'Ga10pa53923', '1', '28qhufwe', '2, '),
(50, '2072-12-02', 'Ga10pa53923', '5', 'zqbujbte', '1, 2, 3, 4, 5, '),
(51, '2072-12-02', 'Ga10pa53923', '4', 'gg5mx6wy', '6, 7, 8, 9, '),
(52, '2072-12-02', 'Ga10pa53923', '5', '6aqxm5jj', '10, 11, 12, 13, 14, '),
(53, '', 'Ga10pa53923', '1', 'bt6xpcpg', '1, '),
(54, '2072-12-03', 'Ga10pa53923', '9', 'pnxspxqr', '1, 2, 3, 4, 5, 6, 7, 8, 9, '),
(55, '2072-12-03', 'Ga10pa53923', '9', 'c4frppph', '10, 11, 12, 13, 14, 15, 16, 17, 18, '),
(56, '2072-12-03', 'Ga10pa53923', '9', 'jvpr3n40', '19, 20, 21, 22, 23, 24, 25, 26, 27, '),
(57, '2072-12-03', 'Ga10pa53923', '9', 'dru8gasj', '28, 29, 30, 31, 32, 33, 34, 35, 36, '),
(58, '', 'Ga10pa53923', '8', 'hhib6ob0', '2, 3, 4, 5, 6, 7, 8, 9, '),
(59, '2072-12-02', 'Ga2pa394023', '1', 'nma3sbw6', '15, '),
(60, '2016-03-14', 'Ga3pa342302', '1', 'yfnizo0t', '1, '),
(61, '2016-03-16', 'Ga3pa342302', '3', '4zvaikq3', '1, 2, 3, '),
(62, '2016-03-16', 'Ga3pa342302', '9', 'nb762hoj', '4, 5, 6, 7, 8, 9, 10, 11, 12, ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businfo`
--
ALTER TABLE `businfo`
  ADD PRIMARY KEY (`busno`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengerinfo`
--
ALTER TABLE `passengerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `passengerinfo`
--
ALTER TABLE `passengerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
