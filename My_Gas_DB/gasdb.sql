-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 05:12 AM
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
-- Database: `gasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `name` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`name`, `phone_number`, `department`, `email`, `subject`, `message`) VALUES
('Sotirios Dimitrakoulakos', 2147483647, 'Τμήμα Υποστήριξης', 'sdimitrakoulakos@gmail.com', 'IT Support', 'Πελάτης αντιμετώπισε πρόβλημα με τη σύνδεση στην πλατφόρμα μας.'),
('Alexander Great', 2147483647, 'Τμήμα Πωλήσεων', 'george1@gmail.com', 'Sales Conflict', 'Δεν συμφωνούμε στις διαπραγματεύσεις.'),
('Alice Wonder', 2147483647, 'Τμήμα Βλαβών', 'alice2@gmail.com', 'Major Malfunction', 'Πολύ σοβαρή ζημία στις εργοστασιακές υποδομές.'),
('Γιώργος Ανδρέου', 2147483647, 'Λογιστήριο', 'george1@gmail.com', 'Μεγάλος Φόρτος', 'Μεγάλος φόρτος εργασίας και γενικά πολύ δουλεία.'),
('Bob Builder', 2147483647, 'Τμήμα Βλαβών', 'bob3@gmail.com', 'Ready', 'Ήρθα και είμαι έτοιμος να φτιάξω τη βλάβη.');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`username`, `name`, `email`) VALUES
('sotiris1', 'Σωτήρης', 'sdimitrakoulakos@gmail.com'),
('giorgos1', 'Γιώργος', 'george1@gmail.com'),
('alice2', 'Alice', 'alice2@gmail.com'),
('bob3', 'Bob', 'bob3@gmail.com'),
('charlie4', 'Charlie', 'charlie4@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
