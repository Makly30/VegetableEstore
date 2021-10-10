-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 06:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegetable1`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_vegetable`
--

CREATE TABLE `order_vegetable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `orp_amount` double(8,2) NOT NULL,
  `deliver_choice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `tracking` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_vegetable`
--

INSERT INTO `order_vegetable` (`id`, `product_id`, `customer_id`, `orp_amount`, `deliver_choice_id`, `created_at`, `updated_at`, `tracking`) VALUES
(1, 1, 2, 55.00, 2, '2021-10-02 08:58:51', '2021-10-02 09:03:25', 1),
(2, 1, 2, 34.00, 1, '2021-10-02 18:16:22', '2021-10-02 18:18:08', 2),
(3, 1, 2, 46.00, 1, '2021-10-02 18:22:27', '2021-10-02 18:37:26', 3),
(4, 1, 2, 45.00, 1, '2021-10-02 18:38:07', '2021-10-02 18:45:23', 4),
(5, 1, 2, 65.00, 1, '2021-10-02 18:38:15', '2021-10-02 18:45:42', 5),
(6, 1, 2, 45.00, 2, '2021-10-03 02:41:22', '2021-10-03 02:41:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_vegetable`
--
ALTER TABLE `order_vegetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_id`),
  ADD KEY `fk_cus` (`customer_id`),
  ADD KEY `fk_dc` (`deliver_choice_id`),
  ADD KEY `fk_tracking` (`tracking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_vegetable`
--
ALTER TABLE `order_vegetable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_vegetable`
--
ALTER TABLE `order_vegetable`
  ADD CONSTRAINT `fk_cus` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dc` FOREIGN KEY (`deliver_choice_id`) REFERENCES `deliver_choice` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tracking` FOREIGN KEY (`tracking`) REFERENCES `tracking` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
