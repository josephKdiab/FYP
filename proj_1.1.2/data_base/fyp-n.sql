-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2023 at 12:06 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(1, 2, 1, 'hy\n', 0, '2023-06-20 11:26:41'),
(2, 3, 1, 'hello', 0, '2023-06-20 11:28:19'),
(3, 2, 3, 'hy\n', 1, '2023-06-20 11:28:43'),
(4, 3, 1, 'allo\n', 0, '2023-06-20 11:28:53'),
(5, 3, 2, 'how are you\n', 1, '2023-06-20 11:30:00'),
(6, 2, 3, 'shu malo', 1, '2023-06-20 11:30:47'),
(7, 3, 2, 'ma shi\n', 1, '2023-06-20 11:34:48'),
(8, 3, 2, 'nfokho', 1, '2023-06-20 11:34:52'),
(9, 2, 3, 'aa rase', 1, '2023-06-20 11:34:55'),
(10, 7, 6, 'hello\n', 0, '2023-06-20 17:09:54'),
(11, 8, 6, 'hello', 0, '2023-06-20 22:04:58'),
(12, 7, 8, 'hyyy', 1, '2023-06-20 22:05:19'),
(13, 8, 7, 'kifak', 1, '2023-06-20 22:05:34'),
(14, 7, 8, 'mnih', 1, '2023-06-20 22:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE IF NOT EXISTS `company_profile` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Num_employees` int NOT NULL,
  `industry` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Sections_num` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`user_id`, `Name`, `Num_employees`, `industry`, `Location`, `Sections_num`, `email`, `description`) VALUES
(8, 'joseph', 123, 'developement', 'ain ebel', 5, 'company@hotmail.com', ''),
(9, 'murex', 1234, 'engineering', 'beirut', 4, 'murex@icloud.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `conversation_id` int NOT NULL AUTO_INCREMENT,
  `user_1` int NOT NULL,
  `user_2` int NOT NULL,
  PRIMARY KEY (`conversation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 2, 3),
(4, 7, 6),
(5, 8, 6),
(6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `individual_profile`
--

DROP TABLE IF EXISTS `individual_profile`;
CREATE TABLE IF NOT EXISTS `individual_profile` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Date-of-birth` date NOT NULL,
  `education` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `skills` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `individual_profile`
--

INSERT INTO `individual_profile` (`user_id`, `Name`, `Email`, `Location`, `Gender`, `Date-of-birth`, `education`, `skills`, `last_name`, `experience`) VALUES
(18, 'joseph', 'Diab@hotmail.com', 'ain ebel', 'male', '1999-11-22', 'civil engineering', 'sport', '', ''),
(19, 'joseph', 'diab@diab.com', 'beiruth', 'male', '2023-06-22', 'asda', 'asdas', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job-post`
--

DROP TABLE IF EXISTS `job-post`;
CREATE TABLE IF NOT EXISTS `job-post` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `description` varchar(50) NOT NULL,
  `requirements` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `contact-email` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `industry` text NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `p_p` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user-default.png',
  `last_seen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `user_type`, `username`, `p_p`, `last_seen`, `name`) VALUES
(27, 'Diab@hotmail.com', '123', 'user', '', '', '2023-06-21 11:31:18', ''),
(28, '123b@hotmail.com', '123', 'user', '', '', '2023-06-21 11:31:18', ''),
(29, '21iab@hotmail.com', '123', 'user', '', '', '2023-06-21 11:31:18', ''),
(30, 'Di232ab@hotmail.com', '123', 'user', '', '', '2023-06-21 11:31:18', ''),
(31, 'company@hotmail.com', '123', 'company', '', '', '2023-06-21 11:31:18', ''),
(32, 'murex@hotmail.com', '123', 'company', '', '', '2023-06-21 11:31:18', ''),
(33, 'murex@icloud.com', '123', 'company', '', '', '2023-06-21 11:31:18', ''),
(34, 'diab@diab.com', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(35, 'latte@hotmail.com', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(36, 'joseph_c_farah@hotmail.com', 'joefarah1231998', 'user', '', '', '2023-06-21 11:31:18', ''),
(37, 'jospeh@diab.com', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(38, 'asdiasd@hasdasd', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(39, 'joseph2@diab.com', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(40, 'elise@hotmail.com', '1234', 'user', '', '', '2023-06-21 11:31:18', ''),
(41, 'asdasd@koussa.com', '12323424', 'user', '', '', '2023-06-21 11:31:18', ''),
(42, '', '$2y$10$aXrLtemw6wjF2XUfZx', '', 'titi', 'user-default.png', '2023-06-21 11:38:00', 'toto'),
(43, '', '$2y$10$9hrNLyFUgg.F/3ZLhZ', '', 'anthony', 'user-default.png', '2023-06-21 11:40:02', 'anthony'),
(44, '', '1234', '', 'ammar', 'user-default.png', '2023-06-21 12:08:12', 'peter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
