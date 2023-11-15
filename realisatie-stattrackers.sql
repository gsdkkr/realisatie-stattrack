-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 02:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realisatie-stattrackers`
--

-- --------------------------------------------------------

--
-- Table structure for table `assist`
--

CREATE TABLE `assist` (
  `AssistID` int(11) NOT NULL,
  `MatchID` int(11) NOT NULL COMMENT 'FK',
  `PlayerID` int(11) NOT NULL COMMENT 'FK',
  `GoalID` int(11) NOT NULL COMMENT 'FK',
  `MinuteAssisted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `GoalID` int(11) NOT NULL,
  `MatchID` int(11) NOT NULL COMMENT 'FK',
  `PlayerID` int(11) NOT NULL COMMENT 'FK',
  `TeamID` int(11) NOT NULL COMMENT 'FK',
  `MinuteScored` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `MatchID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `Referee` varchar(255) NOT NULL,
  `HomeTeamID` int(11) NOT NULL COMMENT 'FK',
  `AwayTeamID` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `PlayerID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `TeamID` int(11) DEFAULT NULL COMMENT 'FK',
  `PASSWORD_PLAIN` varchar(255) NOT NULL COMMENT 'TEMPORARY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`PlayerID`, `Email`, `Password`, `FirstName`, `LastName`, `DateOfBirth`, `Nationality`, `TeamID`, `PASSWORD_PLAIN`) VALUES
(1, 't@gmail.com', '$2y$10$AXctzTWqZeZpW4dSs0bI5OLQS0PBcQNDQ8GDNJydwTajQAmUm9fiW', 'test2', 'test', '2023-11-22', 'Nederlands', NULL, 'test'),
(3, 'wad@gmail.com', '$2y$10$8hOmPnBUYyiZUDiIvKNtc.H6g1HzBx8ufEYxjZjMK.NiVSnqkYt/.', 'wadawd', 'dawd', '2023-11-01', 'awd', NULL, 'wdadwa'),
(7, 'knakl@gmail.com', '$2y$10$ZXYdMSx3sFMQLd1U0dyDcugnQGXL5FHMYYmrmUuaXqSdfD3HQz9Sa', 'awdawd', 'nwdadnawd', '2023-11-17', 'wad', NULL, 'dawdaw'),
(19, 'h@gmial.com', '$2y$10$e.XYNUDVObmLbYOB3SXuNe0oDH4Au3aTFKdkQOyswgjavZJpMxd72', 'awodi', 'indwaiodn', '4928-09-28', 'uawibd', NULL, 'hoi'),
(20, 'quinten@gmail.com', '$2y$10$sH.UOXGEYM5okzsF87ZNL.UqX1R8iK/uFpyypdA193V02l3tq57ee', 'Quinten', 'von Meijeren', '2004-10-01', 'Nederlands', NULL, 'quinten');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamID` int(11) NOT NULL,
  `TeamName` varchar(255) NOT NULL,
  `CoachName` varchar(255) NOT NULL,
  `FoundationYear` varchar(255) NOT NULL,
  `HomeStadium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assist`
--
ALTER TABLE `assist`
  ADD PRIMARY KEY (`AssistID`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`GoalID`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`MatchID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`PlayerID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assist`
--
ALTER TABLE `assist`
  MODIFY `AssistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `GoalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `MatchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
