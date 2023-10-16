-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 02:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bingogame`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamecards`
--

CREATE TABLE `gamecards` (
  `ID` int(11) NOT NULL,
  `game_code` varchar(10) NOT NULL,
  `card_header` varchar(1) NOT NULL,
  `card_detail` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gameresults`
--

CREATE TABLE `gameresults` (
  `ID` int(11) NOT NULL,
  `game_code` varchar(10) NOT NULL,
  `card_header` varchar(1) NOT NULL,
  `card_detail` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playergames`
--

CREATE TABLE `playergames` (
  `ID` int(11) NOT NULL,
  `game_code` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `password`, `name`) VALUES
(1, 'player1', 'player123', 'Mardy Llaneta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamecards`
--
ALTER TABLE `gamecards`
  ADD PRIMARY KEY (`ID`,`game_code`,`card_header`,`card_detail`);

--
-- Indexes for table `gameresults`
--
ALTER TABLE `gameresults`
  ADD PRIMARY KEY (`ID`,`game_code`,`card_header`,`card_detail`);

--
-- Indexes for table `playergames`
--
ALTER TABLE `playergames`
  ADD PRIMARY KEY (`ID`,`game_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamecards`
--
ALTER TABLE `gamecards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gameresults`
--
ALTER TABLE `gameresults`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playergames`
--
ALTER TABLE `playergames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
