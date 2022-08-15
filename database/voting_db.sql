-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 05:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `category`) VALUES
(3, 'Candidates');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1+admin , 2 = users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '1', 1),
(6, 'voter', 'voter', '1', 2),
(21, 'Aida', 'Aida', 'Aida123_', 2);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `voting_opt_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voting_id`, `category_id`, `voting_opt_id`, `user_id`) VALUES
(74, 1, 3, 30, 6),
(75, 1, 3, 33, 6),
(76, 1, 3, 34, 6),
(77, 1, 3, 36, 6),
(78, 1, 3, 37, 6),
(79, 1, 3, 30, 21),
(80, 1, 3, 31, 21),
(81, 1, 3, 32, 21),
(82, 1, 3, 33, 21),
(83, 1, 3, 34, 21);

-- --------------------------------------------------------

--
-- Table structure for table `voting_cat_settings`
--

CREATE TABLE `voting_cat_settings` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `max_selection` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_cat_settings`
--

INSERT INTO `voting_cat_settings` (`id`, `voting_id`, `category_id`, `max_selection`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 5),
(3, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `voting_list`
--

CREATE TABLE `voting_list` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_list`
--

INSERT INTO `voting_list` (`id`, `title`, `description`, `is_default`) VALUES
(1, 'KMK VOTING', 'VOTE FOR YOUR MPPS!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting_opt`
--

CREATE TABLE `voting_opt` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `image_path` text NOT NULL,
  `opt_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_opt`
--

INSERT INTO `voting_opt` (`id`, `voting_id`, `category_id`, `image_path`, `opt_txt`) VALUES
(6, 1, 4, '1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Samad'),
(7, 1, 4, '1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Luqman'),
(8, 1, 4, '1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Faiz'),
(15, 1, 6, '1646671680_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Ali'),
(16, 1, 7, '1646671740_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'a'),
(17, 1, 6, '1646671740_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Ahmad'),
(19, 1, 8, '1646671800_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Aiman'),
(20, 1, 8, '1646671800_1646671560_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Mail'),
(21, 1, 9, '1646723760_1646671680_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'test'),
(30, 1, 3, '1660546200_1600418640_avatar.jpg', 'Candidate 1'),
(31, 1, 3, '1660546200_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 2'),
(32, 1, 3, '1660546260_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 3'),
(33, 1, 3, '1660546260_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 4'),
(34, 1, 3, '1660546260_1646671740_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 5'),
(35, 1, 3, '1660546260_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 6'),
(36, 1, 3, '1660546260_1646671680_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 7'),
(37, 1, 3, '1660546260_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 8'),
(38, 1, 3, '1660546320_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 9'),
(39, 1, 15, '1660546440_1646671680_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'hady'),
(40, 1, 3, '1660546500_1646671740_1646220900_1646220900_1646220900_1646220900_1646220900_1646220900_1600418640_avatar.jpg', 'Candidate 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_cat_settings`
--
ALTER TABLE `voting_cat_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_list`
--
ALTER TABLE `voting_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_opt`
--
ALTER TABLE `voting_opt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `voting_cat_settings`
--
ALTER TABLE `voting_cat_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voting_list`
--
ALTER TABLE `voting_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voting_opt`
--
ALTER TABLE `voting_opt`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
