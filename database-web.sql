-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2024 at 09:06 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--
CREATE database IF NOT EXISTS `database-web`;
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school_name` varchar(50) DEFAULT NULL,
  `exams_taken` int DEFAULT '0',
  `profile_image` varchar(100) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `school_name`, `exams_taken`, `profile_image`) VALUES
(1, 'ali', 'p@gmail.com', '$2y$10$JMQNeKk7GxGYBuWBn2bJ8uzk7qSM8YY1wXFHgvb1TNDnaxCIDGQjO', NULL, 0, 'wallet.png'),
(3, 'nima', 'poria7896@gmail.com', '$2y$10$umbhhRL9pqSeXRHJurfFJeLgPdAv6l/9aRADU0z22838/m6VS8S.C', NULL, 0, '7577991.webp'),
(9, 'FarnazBoroumand', 'farnazboroumand84@gmail.com', '$2y$10$BHOj9NNP7CKjhNEF34Ak6efqfM3esC/Z6qRMUZ3Ptq.I.LDgc269S', NULL, 0, 'happy.jpg'),
(7, 'fb', 'borumandfarnaz@gmail.com', '$2y$10$PUjVtL7qQnQqT5Iv.Ej/auIeTngIfElOI.Dj4/hj9xpqJiG2Ic0qC', NULL, 0, 'sad.jpg'),
(8, 'fb', '', '6789', NULL, 0, 'default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
