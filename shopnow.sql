-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 06:34 AM
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
-- Database: `shopnow`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'fruits'),
(3, 'bread'),
(4, 'bread11'),
(6, 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `category_id`) VALUES
(1, 'grapes', 400, 'eeweddc ggggg nnnn', '[\"1\",\"2\",\"3\"]'),
(2, 'raddish', 100, 'eeweddc ggggg nnnn', '[\"1\",\"2\"]'),
(3, 'apple', 500, 'eeweddc ggggg nnnn', '[\"1\"]'),
(6, 'onion', 400, 'sdsdnj jkhdhhhdh kkllkd', '[\"1\"]'),
(7, 'noodles', 70, 'djdjiu kdjkjjjedn d mmekdjdj', '[\"3\",\"4\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(10000) NOT NULL,
  `user_otp` varchar(200) NOT NULL,
  `user_session_expiry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_role` varchar(100) NOT NULL,
  `user_verify_flag` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_otp`, `user_session_expiry`, `user_role`, `user_verify_flag`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$l3R4k7j6Yq4oojDzKaA8uOQpaEljl/wrga1TpYqaK9DPPOkG1I4U6', '123123', '2024-05-06 18:49:50', 'admin', 0),
(2, 'jin', 'jincysusanabraham01@gmail.com', '$2y$10$l3R4k7j6Yq4oojDzKaA8uOQpaEljl/wrga1TpYqaK9DPPOkG1I4U6', '665919', '2024-05-06 21:57:40', 'customer', 1),
(4, 'jincy', 'jincysusanabraham@gmail.com1', '$2y$10$YcJLGItzaS2EFZakM6.IHugnXFwLUK4BYffdZBRpQYqg3n0bRVDRi', '528523', '2024-05-06 22:50:02', 'customer', 0),
(5, 'qq', 'jincysusanabraham@gmail.co', '$2y$10$MhJoTZe1tWhAE0cNtb4O4eu.0d.st3aMVU7cw.v8zptbB5URhBcaS', '218648', '2024-05-06 22:32:27', 'customer', 1),
(6, 'anu', 'anu@gmail.com', '$2y$10$XGfFe6LFqyTL7DSmGNxf1uqRpQHO9cQ4mDRI1NI3Z4RILhFMvwLxu', '671864', '2024-05-06 15:22:24', 'customer', 0),
(7, 'abc', 'abc@gmail.com', '$2y$10$5LskZH4BX5UUOVe57cDeUuY4n0knI8fmTMF2GiLgXbFrNqVoCoAkK', '763087', '2024-05-06 15:44:37', 'customer', 0),
(8, 'qq', 'shop@gmail.com', '$2y$10$57rCTJQOdhM5ixh24SacaeDZGaxuoktWHWKPCRjlq8P2W1mz7DTW6', '743218', '2024-05-06 23:04:28', 'customer', 0),
(9, 'hh', 'jincysusanabraham@gmail.com', '$2y$10$wtU742GuovWxrG.BuwEtIeI2FdXgFPtFqrUS/fD.7aUvu/Vhh9llq', '968887', '2024-05-06 23:34:02', 'customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
