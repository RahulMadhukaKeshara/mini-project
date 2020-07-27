-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 05:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `phone`, `address`, `reg_time`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$8MQ6QeMIy8gJxLxznoZ3V.wBU2JoJqNuNR5O3gBnyCZynSM9KDGCO', '0776041139', 'karaveddy east,karaveddy', '2020-07-21 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(15) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `isbn_no` int(50) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `author` varchar(25) NOT NULL,
  `copies` int(225) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `publisher`, `isbn_no`, `genre`, `author`, `copies`, `price`, `picture`, `description`) VALUES
(1, 'Harry potter', '', 0, '', '', 0, 0, '', ''),
(2, 'Harry potter', 'jk', 3333, 'fantacy', 'jk rowling', 23, 234, '', ''),
(6, 'Harry potter', 'jk', 7777, 'fantacy', 'jk rowling', 23, 234, '', ''),
(8, 'game of thrones', 'rr', 234566, 'fiction', 'r.r.martin', 50, 500, '', ''),
(9, 'GOT', 'rr', 234566, 'fiction', 'r.r.martin', 50, 500, 'IibDqjf.jpg', ''),
(10, 'Harry potter', 'jk', 2345, 'fantacy', 'jk rowling', 50, 500, '', ''),
(12, 'Ramayana', 'unknown', 1111, 'fiction', 'valmiki', 50, 500, '9788188759118.jpg', ''),
(13, 'Harry potter', 'jk', 1111, 'fiction', 'jk rowling', 100, 1200, 'Harry_Potter_and_the_Order_of_the_Phoenix_poster.jpg', 'famous book'),
(14, 'stargazing', 'reedsy', 2222, 'children', 'Jen wang', 20, 100, 'stargazing.jpg', 'Chilndens book'),
(16, 'ponniyin selvan', 'vikatan publications', 1111, 'fiction', 'kalki', 100, 1200, 'ponniyinselavn.jpg', 'historical fiction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `address`, `picture`, `reg_time`) VALUES
(20, 'rahulan mahendra', 'rahulanm_im17057@stu.kln.ac.lk', '$2y$10$mvToGn8ZtB9c.K3FNGlg9u2CdzkR4jeDMEGSoEBW6Xct0pAv0ah7i', '0776041139', 'karaveddy', 'SLP_8576.jpg', '2020-07-15 15:31:38'),
(25, 'tests', 'test@test.com', '$2y$10$7lgQv1s4nyfbHp1Zha4jdepPj7T34yXdoHz8kEbvE.GfgwQja0Etm', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-26 02:04:30'),
(26, 'test', 'tet@test.com', '$2y$10$2ChPKLqyV7UOMeNy87wzUunRtgJdBAuhN/J0N85BtEaCb.i4tz/BC', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-26 19:27:31'),
(27, 'rahulan mahendra', 'rahulmahendra24@gmail.com', '$2y$10$bRMuwD5dqXWIDQNy5aBozeyXfdg.GvaGeF1I9gpgDZriyRxawzHZu', '0776041139', 'karaveddy east,karaveddy', '', '2020-07-27 07:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
