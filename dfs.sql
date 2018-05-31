-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2017 at 12:51 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayati`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `input` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `input`, `type`, `hits`) VALUES
(1, 'rrahim@gmail.com', 'Query 1', 4),
(2, 'Rubin Baseball', 'Query 2', 4),
(3, 'jken@gmail.com,sroy@gmail.com', 'Query 3', 4),
(4, 'jwalter@gmail.com,jshaw@gmail.com', 'Query 3', 4),
(5, 'mjoe@gmail.com', 'Query 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_data`
--

CREATE TABLE `school_data` (
  `id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `club` varchar(255) NOT NULL,
  `kid` varchar(255) NOT NULL,
  `kid_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_data`
--

INSERT INTO `school_data` (`id`, `school`, `club`, `kid`, `kid_email`) VALUES
(1, 'Rubin Elementary', 'Rubin Soccer', 'Joseph Walter', 'jwalter@gmail.com'),
(2, 'Rubin Elementary', 'Rubin Soccer', 'John Ken', 'jken@gmail.com'),
(3, 'Rubin Elementary', 'Rubin Soccer', 'Jeevan Bal', 'jbal@gmail.com'),
(4, 'Rubin Elementary', 'Rubin Soccer', 'Arun Bal', 'abal@gmail.com'),
(5, 'Rubin Elementary', 'Rubin Baseball', 'John Ken', 'jken@gmail.com'),
(6, 'Rubin Elementary', 'Rubin Baseball', 'Shameer Roy', 'sroy@gmail.com'),
(7, 'Rubin Elementary', 'Rubin Baseball', 'Joseph Walter', 'jwalter@gmail.com'),
(8, 'Rubin Elementary', 'Rubin SoftBall', 'Chico Johny', 'cjohny@gmail.com'),
(9, 'Rubin Elementary', 'Rubin SoftBall', 'Joseph Walter', 'jwalter@gmail.com'),
(10, 'Rubin Elementary', 'Rubin Tennis', 'Chico Johny', 'cjohny@gmail.com'),
(11, 'Rubin Elementary', 'Rubin Tennis', 'Drew Bart', 'dbart@gmail.com'),
(12, 'Chelsey High', 'Chelsey Football', 'Ram Rahim', 'rrahim@gmail.com'),
(13, 'Chelsey High', 'Chelsey Football', 'Joe Shaw', 'jshaw@gmail.com'),
(14, 'Chelsey High', 'Chelsey Football', 'Ram Rahim', 'rrahim@gmail.com'),
(15, 'Chelsey High', 'Chelsey Hockey', 'Vamsee Krishna', 'vkrishna@gmail.com'),
(16, 'Chelsey High', 'Chelsey Hockey', 'Cho Wu', 'cwu@gmail.com'),
(17, 'Berkeley Middle', 'Berkeley Squash', 'Charley Baker', 'cbaker@gmail.com'),
(18, 'Berkeley Middle', 'Berkeley Swimming', 'Vaishnavi', 'vaish@gmail.com'),
(19, 'Berkeley Middle', 'Berkeley Swimming', 'Ram Patel', 'rpatel@gmail.com'),
(20, 'Berkeley Middle', 'Berkeley Polo', 'Mike Joe', 'mjoe@gmail.com'),
(21, 'Stanford School', 'Stanford Tennis', 'Kim Jong', 'kjon@gmail.com'),
(22, 'Stanford School', 'Stanford Poker', 'Robert Chase', 'rchase@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_data`
--
ALTER TABLE `school_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `school_data`
--
ALTER TABLE `school_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
