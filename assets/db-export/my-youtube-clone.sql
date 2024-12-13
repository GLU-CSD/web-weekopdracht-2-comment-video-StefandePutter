-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 01:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube-clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `poster_path` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `poster_path`, `date_added`) VALUES
(8321, 'In Bruges', '/vz3Vd6nfq9YZrVvyYx5RHFaYKV3.jpg', '2024-12-12 19:21:46'),
(533535, 'Deadpool & Wolverine', '/8cdWjvZQUExUUTzyp4t6EDMubfO.jpg', '2024-12-12 22:26:01'),
(912649, 'Venom: The Last Dance', '/aosm8NMQ3UyoBVpSxyimorCQykC.jpg', '2024-12-11 12:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `movie_id`, `name`, `email`, `message`, `date_added`) VALUES
(1, 912649, 'Pino', 'pino@sesamstraat.nl', 'Dit is de beste Rick Roll ever!', '2024-10-23 05:21:51'),
(2, 912649, 'Tommy', 'tommy@sesamstraat.nl', 'Deze wil ik de hele dag wel draaien', '2024-10-23 05:21:51'),
(11, 912649, 's', 's@s.s', 'this is cool', '2024-12-12 14:43:31'),
(12, 912649, 's', 's@s.s', 'this is cool', '2024-12-12 14:59:47'),
(13, 912649, 's', 's@s.s', 'its working?', '2024-12-12 15:01:16'),
(14, 912649, 's', 's@s.s', 'its working?', '2024-12-12 15:01:19'),
(15, 912649, 's', 's@s.s', 'yeeee', '2024-12-12 15:01:44'),
(28, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:36'),
(29, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:51'),
(30, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:52'),
(31, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:53'),
(32, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:53'),
(33, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:54'),
(34, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:54'),
(35, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:54'),
(36, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:55'),
(37, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:56'),
(38, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:56'),
(39, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:58'),
(40, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:13:59'),
(41, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:14:57'),
(42, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:15:21'),
(43, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:15:22'),
(44, 912649, 'stefan', 's@s.s', 'this is cool', '2024-12-12 15:15:23'),
(47, 8321, 'Stefan', 'bruges@bruges.com', 'Good Movie', '2024-12-12 19:21:46'),
(48, 533535, 'test', 'dead@wolf.com', 'dead wolf', '2024-12-12 22:26:01'),
(49, 533535, 'simon', 'yes@yes.com', 'very dead wolf', '2024-12-12 22:26:36'),
(50, 912649, 'test', 'test@test.test', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '2024-12-12 22:29:40'),
(53, 912649, 'test', 'test@test.test', 'test', '2024-12-12 22:41:05'),
(54, 912649, 'test2', 'test@test.test', 'test2', '2024-12-12 23:11:42'),
(55, 912649, 'test', 'test@test.test', 'test', '2024-12-12 23:22:43'),
(57, 8321, 'stefan', 'test@test.test', 'This movie isn\'t in populair movies only in the db', '2024-12-13 00:11:35'),
(58, 8321, 'Stefan', 'test@test.test', 'So movies that have comments dont get removed when new populair movies come out', '2024-12-13 00:13:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
