-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Aug 03, 2020 at 01:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--
CREATE DATABASE IF NOT EXISTS `bookshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookshop`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` text,
  `password` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `phone`, `address`, `reg_time`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$8MQ6QeMIy8gJxLxznoZ3V.wBU2JoJqNuNR5O3gBnyCZynSM9KDGCO', '0776041139', 'karaveddy east,karaveddy', '2020-07-21 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(15) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `isbn_no` int(50) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `author` varchar(25) NOT NULL,
  `copies` int(225) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `publisher`, `isbn_no`, `genre`, `author`, `copies`, `price`, `picture`, `description`) VALUES
(10, 'Harry potter', 'jk', 2345, 'fantacy', 'jk rowling', 50, 500, 'Harry_Potter_and_the_Order_of_the_Phoenix_poster.jpg', 'famous book'),
(12, 'Ramayana', 'unknown', 1111, 'fiction', 'valmiki', 50, 500, '9788188759118.jpg', ''),
(13, 'Harry potter', 'jk', 1111, 'fiction', 'jk rowling', 100, 1200, 'Harry_Potter_and_the_Order_of_the_Phoenix_poster.jpg', 'famous book'),
(14, 'stargazing', 'reedsy', 2222, 'children', 'Jen wang', 20, 100, 'stargazing.jpg', 'Chilndens book'),
(16, 'ponniyin selvan', 'vikatan publications', 1111, 'fiction', 'kalki', 100, 1200, 'ponniyinselavn.jpg', 'historical fiction'),
(17, 'stargazing', 'reedsy', 2222, 'children', 'Jen wang', 20, 100, 'stargazing.jpg', 'Chilndens book');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `address`, `picture`, `reg_time`) VALUES
(20, 'rahulan mahendra', 'rahulanm_im17057@stu.kln.ac.lk', '$2y$10$mvToGn8ZtB9c.K3FNGlg9u2CdzkR4jeDMEGSoEBW6Xct0pAv0ah7i', '0776041139', 'karaveddy', 'SLP_8576.jpg', '2020-07-15 15:31:38'),
(25, 'tests', 'test@test.com', '$2y$10$7lgQv1s4nyfbHp1Zha4jdepPj7T34yXdoHz8kEbvE.GfgwQja0Etm', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-26 02:04:30'),
(26, 'test', 'tet@test.com', '$2y$10$2ChPKLqyV7UOMeNy87wzUunRtgJdBAuhN/J0N85BtEaCb.i4tz/BC', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-26 19:27:31'),
(27, 'rahulan mahendra', 'rahulmahendra24@gmail.com', '$2y$10$bRMuwD5dqXWIDQNy5aBozeyXfdg.GvaGeF1I9gpgDZriyRxawzHZu', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-27 07:24:05'),
(28, 'chama', 'finaltest@gmail.com', '$2y$10$1y6qt9HTO/wDQn.8kzzZBezlGwjEXC5Qtq.w8JVQT/eZAakr5Msr6', '0717894456', '318/A, Kossinna , Ganemulla', NULL, '2020-08-03 13:23:20');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
