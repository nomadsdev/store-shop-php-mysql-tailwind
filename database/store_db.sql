-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 06:14 PM
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
-- Database: `store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'Windows', 'windows 11', 299.00, 'https://geeks.co.uk/wp-content/uploads/2019/11/MicrosoftTeams-image.png'),
(5, 'GTA VI', 'rockstar', 1999.00, 'https://lafayetteledger.org/wp-content/uploads/2023/12/IMG_1231.jpeg'),
(10, 'Fortnite', 'ss 16', 599.00, 'https://media.wired.com/photos/5c070213d5a8c02cd43f9f47/1:1/w_1015,h_1015,c_limit/Fortnite-FA.jpg'),
(11, 'GTA V', 'online', 999.00, 'https://assets-prd.ignimgs.com/2021/12/17/gta-5-button-2021-1639777058682.jpg?width=300&crop=1%3A1%2Csmart&auto=webp'),
(12, 'COD MWIII', 'ss 3', 1399.00, 'https://www.compgamer.com/mainpage/wp-content/uploads/2023/12/MWIII-S1-ANNOUNCEMENT-001.jpg'),
(13, 'RTX 4090', 'geforce', 4999.00, 'https://storage.googleapis.com/file-computeandmore/images/6509d26a-358b-4f3c-9a5a-203d4b3de2d2.png');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_image_url` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `purchase_time`, `product_image_url`, `product_name`) VALUES
(23, 12, '2024-01-15 17:12:23', 'https://www.compgamer.com/mainpage/wp-content/uploads/2023/12/MWIII-S1-ANNOUNCEMENT-001.jpg', 'COD MWIII'),
(24, 13, '2024-01-15 17:12:28', 'https://storage.googleapis.com/file-computeandmore/images/6509d26a-358b-4f3c-9a5a-203d4b3de2d2.png', 'RTX 4090'),
(25, 11, '2024-01-15 17:12:33', 'https://assets-prd.ignimgs.com/2021/12/17/gta-5-button-2021-1639777058682.jpg?width=300&crop=1%3A1%2Csmart&auto=webp', 'GTA V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
