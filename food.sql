-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2020 at 08:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--
CREATE DATABASE IF NOT EXISTS `food` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_nonveg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_name`, `user_email`, `user_pass`, `user_id`, `is_nonveg`) VALUES
('efkjn', 'dfkjkd@jkned', 'dfmndfkj', 1, 0),
('akshi', 'A@123', 'A@123', 2, 0),
('akshita', 'gakshita@ga.com', 'jdhgjh', 3, 0),
('Akshita Gupta', 'sakshita@gmail.com', 'Aqws@123', 4, 0),
('akshita', 'nb@bjd.com', 'Aqws@123', 5, 0),
('kartik', 'kartik@gmail.com', 'Aqws@123', 6, 0),
('a', 'ab@c', 'abc', 7, 0),
('garima', 'garima@gmail.com', 'garima', 8, 0),
('suman', 'suman@s.com', 'suman', 9, 0),
('lo', 'lo@lo.com', 'lolo', 10, 0),
('Akshita', 'Gupta@gmail.com', '123123', 11, 1),
('mummy', 'mummy@gmail.com', 'mummy', 12, 1),
('dadda', 'dadda@gmail.com', 'Aqws@123', 13, 1),
('Gunna ', 'Gunna@gungun.com', 'Aqws@123', 14, 0),
('i am user', 'iamuser@gmail.com', 'Aqws@123', 15, 1),
('Foodshala Customer', 'fcustomer@gmail.com', 'password', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` float NOT NULL,
  `image` mediumblob DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `is_nonveg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `items`:
--   `restaurant_id`
--       `restaurant` -> `restaurant_id`
--

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `image`, `restaurant_id`, `is_nonveg`) VALUES
(10, 'Pancakes', 25, 0x53756761722d667265652d50616e63616b65732d65313438363735343130333933382e6a7067, 5, 0),
(11, 'Burger', 50, 0x78397a6133766a6b6967632d667265646469652d6d617272696167652e6a7067, 5, 0),
(12, 'Rice ', 200, 0x547261646974696f6e616c2d4e65772d596f726b2d436865657363616b652d312e6a7067, 6, 1),
(13, 'Chicken', 200, 0x70617374617665675f363430783438302e6a7067, 7, 1),
(14, 'Hubli best', 300, 0x70616e63616b65732e6a7067, 9, 0),
(15, 'Foodshala', 45, 0x4772616e6f6c612d506f7272696467652d776974682d73797275702d312e6a7067, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `item_id`
--       `items` -> `item_id`
--

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`item_id`, `order_id`, `restaurant_id`, `user_id`) VALUES
(11, 30, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `restaurant`:
--

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`name`, `email`, `pass`, `restaurant_id`) VALUES
('lo', 'lo@lo.com', 'lolo', 1),
('lm', 'lm@lm.com', '123', 2),
('aksh', 'abc@123.com', 'aqws@123', 3),
('abc', 'abc@abc.com', '123123', 4),
('pizza hub', 'pizzahub@gmail.com', 'Aqws@123', 5),
('Rice express', 'rice@rice.com', 'rice', 6),
('Biryani Hoob', 'biryani@hoob.com', 'Aqws@123', 7),
('Apni rasoi', 'rasoi@apni.com', 'aq123', 8),
('Hubli', 'hubli@hubli.com', '123123', 9),
('Foodshala', 'Foodshala@gmail.com', 'password', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_to_restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_to_item_id` (`item_id`),
  ADD KEY `fk_to_restaurant_id` (`restaurant_id`) USING BTREE,
  ADD KEY `fk_to_user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_to_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_to_item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
