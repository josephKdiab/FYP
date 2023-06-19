-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2023 at 05:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsem1`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `individual_profile`
--

INSERT INTO `individual_profile` (`user_id`, `Name`, `Email`, `Location`, `Gender`, `Date-of-birth`, `education`, `skills`, `last_name`, `experience`) VALUES
(18, 'joseph', 'Diab@hotmail.com', 'ain ebel', 'male', '1999-11-22', 'civil engineering', 'sport', '', '');

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `register_id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`register_id`, `Name`, `email`, `password`, `user_type`) VALUES
(27, 'joseph', 'Diab@hotmail.com', '123', 'user'),
(28, 'joseph', '123b@hotmail.com', '123', 'user'),
(29, 'joseph', '21iab@hotmail.com', '123', 'user'),
(30, 'joseph', 'Di232ab@hotmail.com', '123', 'user'),
(31, 'joseph', 'company@hotmail.com', '123', 'company'),
(32, 'murex', 'murex@hotmail.com', '123', 'company'),
(33, 'murex', 'murex@icloud.com', '123', 'company');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
