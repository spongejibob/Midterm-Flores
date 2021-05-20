-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 08:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `code` int(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_start` datetime NOT NULL,
  `code_expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `code`, `user_id`, `code_start`, `code_expire`) VALUES
(1, 846787, 0, '2021-05-19 04:28:48', '2021-05-19 04:28:53'),
(2, 436910, 0, '2021-05-19 04:30:58', '2021-05-19 04:31:18'),
(3, 664876, 0, '2021-05-19 15:02:35', '2021-05-19 15:02:55'),
(4, 172115, 0, '2021-05-19 15:05:42', '2021-05-19 15:06:02'),
(5, 286515, 0, '2021-05-19 15:28:54', '2021-05-19 15:29:14'),
(6, 753296, 0, '2021-05-19 15:32:32', '2021-05-19 15:32:52'),
(7, 670531, 0, '2021-05-19 15:55:44', '2021-05-19 15:56:04'),
(8, 621493, 0, '2021-05-20 08:05:36', '2021-05-20 08:05:56'),
(9, 853545, 0, '2021-05-20 08:11:49', '2021-05-20 08:12:09'),
(10, 495494, 0, '2021-05-20 08:13:53', '2021-05-20 08:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `activity`, `date_time`) VALUES
(1, '', 'Register', '2021-05-19 01:37:21'),
(2, '', 'Register', '2021-05-19 01:43:35'),
(3, '', 'Register', '2021-05-19 01:53:23'),
(4, '', 'Register', '2021-05-19 01:56:53'),
(5, 'admin', 'Register', '2021-05-19 02:26:06'),
(6, 'admin', 'Login', '2021-05-19 02:28:38'),
(7, 'admin', 'Login', '2021-05-19 02:28:39'),
(8, 'admin', 'change_pass', '2021-05-19 02:31:43'),
(9, 'admin', 'logout', '2021-05-19 02:32:44'),
(10, 'jiji', 'Register', '2021-05-19 02:57:52'),
(11, 'yey', 'Register', '2021-05-19 03:10:30'),
(12, 'yeyeh', 'Register', '2021-05-19 03:12:50'),
(13, 'yey', 'Register', '2021-05-19 03:15:22'),
(14, 'yey', 'Register', '2021-05-19 03:15:55'),
(15, 'yey', 'Register', '2021-05-19 03:16:23'),
(16, 'admin', 'Login', '2021-05-19 12:44:54'),
(17, 'admin', 'Login', '2021-05-19 12:44:54'),
(18, 'admin', 'Login', '2021-05-19 12:44:54'),
(19, 'admin', 'Login', '2021-05-19 13:00:01'),
(20, 'admin', 'Login', '2021-05-19 13:00:01'),
(21, 'admin', 'Login', '2021-05-19 13:00:01'),
(22, 'admin', 'logout', '2021-05-19 13:05:22'),
(23, 'admin', 'Login', '2021-05-19 13:05:34'),
(24, 'admin', 'Login', '2021-05-19 13:05:37'),
(25, 'admin', 'Login', '2021-05-19 13:05:37'),
(26, 'admin', 'change_pass', '2021-05-19 13:21:40'),
(27, 'admin', 'logout', '2021-05-19 13:22:31'),
(28, 'admin', 'Login', '2021-05-19 13:22:47'),
(29, 'admin', 'Login', '2021-05-19 13:22:47'),
(30, 'admin', 'Login', '2021-05-19 13:22:48'),
(31, 'admin', 'LOGOUT', '2021-05-19 13:32:07'),
(32, 'admin', 'LOGIN', '2021-05-19 13:32:30'),
(33, 'admin', 'LOGIN', '2021-05-19 13:32:31'),
(34, 'admin', 'LOGIN', '2021-05-19 13:32:31'),
(35, 'admin', 'LOGOUT', '2021-05-19 13:33:47'),
(36, 'admin', 'LOGIN', '2021-05-19 13:55:37'),
(37, 'admin', 'LOGIN', '2021-05-19 13:55:37'),
(38, 'admin', 'LOGIN', '2021-05-19 13:55:37'),
(39, 'admin', 'LOGOUT', '2021-05-19 13:58:48'),
(40, 'jissele', 'REGISTER', '2021-05-20 05:59:04'),
(41, 'jissele', 'REGISTER', '2021-05-20 06:03:49'),
(42, 'jissele', 'LOGIN', '2021-05-20 06:04:33'),
(43, 'jissele', 'LOGOUT', '2021-05-20 06:06:10'),
(44, 'flores', 'REGISTER', '2021-05-20 06:11:11'),
(45, 'flores', 'LOGIN', '2021-05-20 06:11:31'),
(46, 'flores', 'change_password', '2021-05-20 06:13:14'),
(47, 'flores', 'LOGOUT', '2021-05-20 06:13:28'),
(48, 'flores', 'LOGIN', '2021-05-20 06:13:44'),
(49, 'flores', 'LOGOUT', '2021-05-20 06:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `datetime`) VALUES
(1, 'admin', 'ji@gmail.com', 'july181999', '2021-05-19 03:33:17'),
(2, 'admin', 'ji@gmail.com', 'july181999', '2021-05-19 03:33:34'),
(3, 'admin', 'ji@gmail.com', 'july181999', '2021-05-19 03:37:17'),
(4, 'admin', 'jurillamiko@gmail.com', 'july181999', '2021-05-19 03:43:35'),
(5, 'jiji', 'ji@gmail.com', 'july181999)', '2021-05-19 03:53:20'),
(6, 'admin', 'ji@gmail.com', 'july181999', '2021-05-19 03:56:49'),
(7, 'admin', 'ji@gmail.com', 'july181999', '2021-05-19 04:25:58'),
(8, 'jiji', 'ji@gmail.com', 'jissele18)', '2021-05-19 04:57:48'),
(9, 'yey', 'ji@gmail.com', 'july181999)', '2021-05-19 05:10:30'),
(10, 'yeyeh', 'ji@gmail.com', 'july181999)', '2021-05-19 05:12:46'),
(11, 'yey', 'ji@gmail.com', 'jissele18)', '2021-05-19 05:15:18'),
(12, 'yey', 'ji@gmail.com', 'jissele18)', '2021-05-19 05:15:53'),
(13, 'yey', 'ji@gmail.com', 'jissele18)', '2021-05-19 05:16:23'),
(14, 'jissele', 'jisseleflores@gmail.com', 'july181999)', '2021-05-20 07:59:03'),
(15, 'jissele', 'ji@gmail.com', 'jissele18)', '2021-05-20 08:03:41'),
(16, 'flores', 'jisseleflores@gmail.com', 'july181999', '2021-05-20 08:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
