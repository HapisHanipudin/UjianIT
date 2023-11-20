-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2023 at 01:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(32) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `prod_id` varchar(32) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `prod_id`, `quantity`) VALUES
('6559dfa5e7be3', '6559d76557ccf', '6558c5997ca13', 2),
('655a07cc91852', '6559d76557ccf', '6558c5c277a48', 4),
('655b0fe3de17c', '6559d76557ccf', '6558c5d699300', 2),
('655b257098896', '6559d76557ccf', '655b251e8928c', 2),
('655b2a7923129', '655b2a646f3d6', '6558c5c277a48', 2),
('655b2a7e910c2', '655b2a646f3d6', '655b25390258a', 1),
('655b2b0e7c05f', '655b2a646f3d6', '655b250c9e360', 2),
('655b5f5a1e17d', '655b2a646f3d6', '6558c5997ca13', 2),
('655b602de6b0d', '655b2a646f3d6', '655b23460ce3f', 2),
('655b604a70fdb', '655b604082214', '655b23460ce3f', 1),
('655b605875095', '655b604082214', '655b250c9e360', 2),
('655b608a6debb', '655b604082214', '655b25390258a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descr` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `image`, `name`, `descr`, `price`) VALUES
('6558c5997ca13', 'product-1.png', 'Nordic Chair', 'belum ada ', '750000'),
('6558c5c277a48', 'product-2.png', 'Kruzo Aero Chair', 'belum ada', '125000'),
('6558c5d699300', 'product-3.png', 'Ergonomic Chair', 'belm ada', '175000'),
('655b23460ce3f', 'lemari.png', 'Lemari Ergonomis', 'belum ada', '750000'),
('655b250c9e360', 'Produuk (2).png', 'Meja Kerja', 'belum ada', '275000'),
('655b251e8928c', 'Produuk (1).png', 'Meja Ergonomis', 'belum ada', '350000'),
('655b25390258a', 'Produuk (3).png', 'Lemari', 'belum ada', '645000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
('6559d76557ccf', 'arema', 'arema@gmail.com', '$2y$10$Nox6x6.V0T6yerZN2/m6kecExFZnedbVP7GfIgTy8sa.7y31dX2US'),
('655b2a646f3d6', 'gtau', 'gtaubg@gmail.com', '$2y$10$ispxAbJ0qElYMSpyfX1xR.rtcp0l2YeFkz5XAPchz6PIzAJZM5GbC'),
('655b604082214', 'user', 'user@gmail.com', '$2y$10$ubCM6YrVvkD.dGwLiNamWuIgNk4Ym.kjEzBfq4nwx.jyqrg.5T09i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
