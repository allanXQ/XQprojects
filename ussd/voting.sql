-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2022 at 01:03 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
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
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `firsname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `votes` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`firsname`, `lastname`, `category`, `votes`) VALUES
('candidate', 'one', 'president', '0'),
('candidate', 'two', 'president', '0'),
('candidate', 'three', 'president', '0'),
('candidate', 'four', 'president', '0'),
('candidate', 'one', 'governor', '0'),
('candidate', 'two', 'governor', '0'),
('candidate', 'three', 'governor', '0'),
('candidate', 'four', 'governor', '0'),
('candidate', 'one', 'senator', '0'),
('candidate', 'two', 'senator', '0'),
('candidate', 'three', 'senator', '0'),
('candidate', 'four', 'senator', '0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`) VALUES
('president'),
('governor'),
('senator');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `voted` varchar(7) NOT NULL,
  `president` varchar(15) DEFAULT 'noone',
  `governor` varchar(15) DEFAULT 'noone',
  `senator` varchar(15) DEFAULT 'noone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`firstname`, `lastname`, `phone`, `voted`, `president`, `governor`, `senator`) VALUES
('voter', 'three', '778765432', 'False', 'noone', 'noone', 'noone'),
('voter', 'two', '788765432', 'False', 'noone', 'noone', 'noone'),
('voter', 'one', '798765432', 'False', 'noone', 'noone', 'noone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
