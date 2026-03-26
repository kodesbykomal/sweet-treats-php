-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 08:41 AM
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
-- Database: `sweet_treats`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2b$12$oBtSHvpM0UBnpjKE1xSiyuiK3Y51up7MiOEa3YWO6Rv3UbXOCoHdy');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `timestamp`) VALUES
(1, 'user', 'user@123gmail.com', 'The Sweets are very tasty', '2025-06-26 14:53:36'),
(2, 'Sophie L', 'sophie.l@example.com', 'The croissants were heavenly! Definitely coming back again.', '2025-06-26 16:04:22'),
(3, 'Michael T', 'michael.t@example.com', 'Loved the chocolate muffin. Soft, moist, and delicious!', '2025-06-26 16:04:47'),
(4, 'Aarav S', 'aarav.s@example.com', 'Very friendly service. The menu was a bit limited today, though.', '2025-06-26 16:05:22'),
(5, 'Daniel K', 'daniel.k@example.com', 'Could you please add more sugar-free options? Otherwise, amazing bakery!', '2025-06-26 16:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item_name`, `description`, `price`, `date_posted`) VALUES
(2, 'Vanilla Cupcake', 'Soft vanilla sponge with creamy frosting and sprinkles', 1.75, '2025-06-26'),
(7, 'Almond Croissant', 'Flaky croissant filled with almond cream and topped with sliced almonds.', 3.20, '2025-06-26'),
(8, 'Lemon Tart', 'Tangy lemon filling in a buttery tart crust.', 3.10, '2025-06-26'),
(9, 'Almond Croissant', 'Flaky croissant filled with almond cream and topped with sliced almonds.', 3.20, '2025-06-26'),
(13, 'Classic Chocolate Muffin', 'Moist and rich chocolate muffin topped with chocolate chips.', 2.50, '2025-06-27'),
(14, 'Strawberry Tart', 'Fresh strawberries on a sweet custard base in a buttery crust.', 3.25, '2025-06-27'),
(15, 'Classic Chocolate Muffin', 'Moist and rich chocolate muffin topped with chocolate chips.', 2.50, '2025-06-27'),
(16, 'Strawberry Cheesecake Slice', 'Creamy cheesecake with fresh strawberry topping on a biscuit base.', 3.80, '2025-06-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
