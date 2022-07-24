-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2022 at 11:22 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
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
-- Database: `snakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `player_data`
--

CREATE TABLE `player_data` (
  `game_id` int NOT NULL,
  `player1` varchar(255) DEFAULT NULL,
  `player2` varchar(255) DEFAULT NULL,
  `turn` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'player1',
  `player1_pos` varchar(255) DEFAULT '1',
  `player2_pos` varchar(255) DEFAULT '1',
  `winner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `player_data`
--

INSERT INTO `player_data` (`game_id`, `player1`, `player2`, `turn`, `player1_pos`, `player2_pos`, `winner`) VALUES
(33, 'qwerty1', 'qwerty2', 'player2', '153', '13', 'player1'),
(34, 'qwerty2', 'qwerty3', 'player2', '37', '34', 'player1'),
(35, 'qwerty5', 'qwerty6', 'player1', '34', '27', NULL),
(36, 'qwerty7', 'qwerty8', 'player2', '16', '1', NULL),
(37, '', '', 'player1', '1', '1', NULL),
(38, 'qwerty5', 'qwerty8', 'player1', '16', '40', 'player2'),
(39, 'qwerty4', 'qwerty8', 'player2', '7', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player_data`
--
ALTER TABLE `player_data`
  ADD PRIMARY KEY (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player_data`
--
ALTER TABLE `player_data`
  MODIFY `game_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
