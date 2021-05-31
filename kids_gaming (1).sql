-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 09:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kids_gaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL DEFAULT '0.0',
  `name` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `company` varchar(500) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `game_cato_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `price`, `name`, `description`, `company`, `image`, `game_cato_id`, `status`) VALUES
(7, '0.00', 'Ninja King', 'Ninja King', 'Ninja King', 'game_images/1.jpg', 8, 1),
(8, '0.00', 'Animal kindom', 'Animal kindom\r\n', 'Animal kindom', 'game_images/3.jpg', 8, 1),
(9, '0.00', 'Baby Golf', 'Baby Golf', 'Baby Golf', 'game_images/4.jpg', 8, 1),
(10, '1.75', 'Ben 10', 'Ben 10', 'Ben 10', 'game_images/6.jpg', 9, 1),
(11, '0.79', 'Over Cooked2', 'Over Cooked2', 'Over Cooked2', 'game_images/8.jpg', 9, 1),
(12, '1.00', 'Snakes', 'Snakes', 'Snakes', 'game_images/9.jpg', 10, 1),
(13, '0.00', 'Tower Cruch', 'Tower Cruch', 'Tower Cruch', 'game_images/10.jpg', 10, 1),
(14, '0.00', 'Build City', 'Build City', 'Build City', 'game_images/11c.jpg', 11, 1),
(15, '0.00', 'Plants vs Zombies', 'Plants vs Zombies', 'Plants vs Zombies', 'game_images/12.jpg', 11, 1),
(16, '0.00', 'Super Mario', 'Super Mario', 'Super Mario', 'game_images/13.jpg', 12, 1),
(17, '0.00', 'Township', 'Township', 'Township', 'game_images/15c.jpg', 12, 1),
(18, '1.78', 'Getway Blastf', 'Getway Blastf', 'Getway Blastf', 'game_images/15c7.jpg', 12, 1),
(19, '0.00', 'Skate O Rama', 'Skate O Rama', 'Skate O Rama', 'game_images/20.jpg', 13, 1),
(20, '0.00', 'Minecraft', 'Minecraft', 'Minecraft', 'game_images/17c.jpg', 10, 1),
(21, '0.89', 'Infinity', 'Infinity', 'Infinity', 'game_images/16c.jpg', 12, 1),
(22, '1.00', 'Peg + Cat', 'Peg + Cat', 'Peg + Cat', 'game_images/23.jpg', 13, 1),
(23, '2.00', 'Rayman', 'Rayman', 'Rayman', 'game_images/27.jpg', 8, 1),
(24, '2.00', 'Poptropica', 'Poptropica', 'Poptropica', 'game_images/56.jpg', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id`, `name`, `status`) VALUES
(8, 'Multiplay', 1),
(9, 'Single Play', 1),
(10, 'Puzzle Gaming', 1),
(11, 'Sport Gaming', 1),
(12, 'Action Gaming', 1),
(13, 'Online Gaming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `send_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `firstName`, `lastName`, `email`, `message`, `send_on`, `status`) VALUES
(31, 'test', 'user', 'test@user.com', 'This is test enquiry', '2021-05-31 06:17:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `paid_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `game_id`, `mobile_number`, `price`, `payment_method`, `paid_at`, `status`) VALUES
(22, 17, 10, '1111', '1.75', 'visa', '2021-05-31 06:14:51', 1),
(23, 17, 11, '1111', '0.79', 'visa', '2021-05-31 06:14:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`, `status`, `last_login`) VALUES
(16, 'test', 'admin', 'test@tadmin.com', '1234', 'ROLE_ADMIN', 1, '2021-05-30 22:13:18'),
(17, 'test', 'user', 'test@user.com', '1234', 'ROLE_USER', 1, '2021-05-30 22:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_cato_id` (`game_cato_id`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`game_cato_id`) REFERENCES `game_categories` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `user_games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_games_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
