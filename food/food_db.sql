-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 01:11 PM
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
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(7, 'ritika', 'ritika'),
(8, 'ritikapoudel', 'ed84116769e5b643376c16fed39287d30834d1e9'),
(9, 'ritss', 'c26b26fce2901b91f9e2e707889e6863b19530a2'),
(11, 'ritikapoudel29@gmail.com', 'c26b26fce2901b91f9e2e707889e6863b19530a2'),
(12, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(19, 4, 6, 'Burger', 300, 1, 'Sandwich.jpg'),
(20, 4, 7, 'Mutton Biryani', 400, 1, 'mutton biryani.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(10, 4, 'Ritika Poudel', '9811383756', 'ritikapoudel@gmail.com', 'cash on delivery', ', Lagankhel, Kathmandu', 'Mutton Chowmein (135 x 1) - ', 135, '2023-08-20', 'pending'),
(16, 11, 'Ritika Poudel', '123456789', 'ritikapoudel13@gmail.com', 'cash on delivery', 'kritipur, Kathmandu', 'Veg Burger (300 x 1) - ', 300, '2023-08-24', 'pending'),
(18, 11, 'Ritika Poudel', '123456789', 'ritikapoudel13@gmail.com', 'cash on delivery', 'kritipur, Kathmandu', 'Veg Burger (300 x 1) - Non veg burger (0 x 1) - ', 300, '2023-08-24', 'completed'),
(19, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Burger (150 x 1) - ', 150, '2023-09-20', 'completed'),
(20, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Veg Pizza (121 x 1) - ', 121, '2023-09-22', 'pending'),
(21, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Burger (150 x 1) - Veg Burger (300 x 1) - Mutton Biryani (400 x 1) - Buff Momo (123 x 1) - Buff Biryani (350 x 3) - ', 2023, '2023-09-23', 'completed'),
(22, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Biryani (400 x 1) - ', 400, '2023-09-23', 'completed'),
(23, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Biryani (400 x 1) - ', 400, '2023-09-23', 'pending'),
(24, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Biryani (400 x 1) - Veg Burger (300 x 1) - Buff Biryani (350 x 1) - Mutton Chowmein (400 x 1) - Buff Momo (123 x 1) - Mutton Burger (150 x 1) - Veg Pizza (121 x 1) - ', 1844, '2023-09-23', 'pending'),
(25, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Biryani (400 x 1) - ', 400, '2023-09-24', 'pending'),
(26, 14, 'Ritika Poudel', '9810853607', 'ritikapoudel29@gmail.coom', 'cash on delivery', 'Lagankhel, Lalitpur', 'Mutton Biryani (400 x 1) - ', 400, '2023-09-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`) VALUES
(5, 'Buff Biryani', 'Biryani', 350, 'Turkey biryani.jpg'),
(6, 'Veg Burger', 'Burger', 300, 'Mutton Burger.jpg'),
(7, 'Mutton Biryani', 'Biryani', 400, 'mutton biryani.jpg'),
(8, 'Mutton Chowmein', 'Chowmein', 400, 'Mutton Chowmein.jpg'),
(9, 'Buff Momo', 'Momo', 123, 'Buff momo.jpg'),
(11, 'Mutton Burger', 'Burger', 150, 'Mutton Burger.jpg'),
(12, 'Veg Pizza', 'Burger', 121, 'mutton biryani.jpg'),
(13, 'VEGGG Pizza', 'Pizza', 121, 'CM.jpg'),
(14, 'Buff Pizza', 'Pizza', 234, 'Pizza.jpg'),
(15, 'Non veg burger', 'Burger', 0, 'Mutton Chowmein.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(4, 'Ritika Poudel', 'ritikapoudel@gmail.com', '9811383756', 'ed84116769e5b643376c16fed39287d30834d1e9', ', Lagankhel, Kathmandu'),
(14, 'Ritika Poudel', 'ritikapoudel29@gmail.coom', '9810853607', 'c26b26fce2901b91f9e2e707889e6863b19530a2', 'Lagankhel, Lalitpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`user_id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
