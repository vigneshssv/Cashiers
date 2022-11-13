-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashiers`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2022_11_12_051432_create_products_table', 1),
(22, '2014_10_12_000000_create_users_table', 2),
(23, '2019_05_03_000001_create_customer_columns', 2),
(24, '2019_05_03_000002_create_subscriptions_table', 2),
(25, '2019_05_03_000003_create_subscription_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uuid`, `name`, `price`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '425dacb4-6253-11ed-8914-3024a99ebe53', 'Chair', '100.00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'active', 1, 1, NULL, '2022-11-12 00:58:45', '2022-11-12 00:58:45', NULL),
(2, '427280bc-6253-11ed-ba0c-3024a99ebe53', 'Laptop', '200.00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'active', 1, 1, NULL, '2022-11-12 00:58:45', '2022-11-12 00:58:45', NULL),
(3, '42796eae-6253-11ed-812e-3024a99ebe53', 'Keyboard', '100.00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'active', 1, 1, NULL, '2022-11-12 00:58:45', '2022-11-12 00:58:45', NULL),
(4, '42845d64-6253-11ed-bb51-3024a99ebe53', 'Mourse', '300.00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'active', 1, 1, NULL, '2022-11-12 00:58:45', '2022-11-12 00:58:45', NULL),
(5, '428b8fe4-6253-11ed-a561-3024a99ebe53', 'Laptop Charger', '1000.00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'active', 1, 1, NULL, '2022-11-12 00:58:45', '2022-11-12 00:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_price`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chair', 'pi_3M3aNJSEOx8Jxo911N1yxzKt', 'succeeded', '100.00', NULL, NULL, NULL, '2022-11-13 01:43:05', '2022-11-13 01:43:05'),
(2, 1, 'Chair', 'pi_3M3aNrSEOx8Jxo910hrYYm34', 'succeeded', '100.00', NULL, NULL, NULL, '2022-11-13 01:43:38', '2022-11-13 01:43:38'),
(3, 1, 'Mourse', 'pi_3M3aQOSEOx8Jxo9113o09DbV', 'succeeded', '300.00', NULL, NULL, NULL, '2022-11-13 01:46:15', '2022-11-13 01:46:15'),
(4, 2, 'Laptop Charger', 'pi_3M3aRWSEOx8Jxo911PgCJwlw', 'succeeded', '1000.00', NULL, NULL, NULL, '2022-11-13 01:47:26', '2022-11-13 01:47:26'),
(5, 2, 'Laptop', 'pi_3M3aTsSEOx8Jxo911xfW0wm6', 'succeeded', '200.00', NULL, NULL, NULL, '2022-11-13 01:49:51', '2022-11-13 01:49:51'),
(6, 2, 'Chair', 'pi_3M3aWgSEOx8Jxo910EhwuXL7', 'succeeded', '100.00', NULL, NULL, NULL, '2022-11-13 01:52:46', '2022-11-13 01:52:46'),
(7, 2, 'Laptop', 'pi_3M3aYuSEOx8Jxo911MqWxX5c', 'succeeded', '200.00', NULL, NULL, NULL, '2022-11-13 01:55:03', '2022-11-13 01:55:03'),
(8, 2, 'Laptop Charger', 'pi_3M3aaESEOx8Jxo9101mZPYFF', 'succeeded', '1000.00', NULL, NULL, NULL, '2022-11-13 01:56:27', '2022-11-13 01:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_product` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_product`, `stripe_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 'pi_3M3aNrSEOx8Jxo910hrYYm34', '100', '10000', NULL, '2022-11-13 01:43:38', '2022-11-13 01:43:38'),
(2, 3, 'pi_3M3aQOSEOx8Jxo9113o09DbV', '4', '300.00', NULL, '2022-11-13 01:46:15', '2022-11-13 01:46:15'),
(3, 4, 'pi_3M3aRWSEOx8Jxo911PgCJwlw', '5', '1000.00', NULL, '2022-11-13 01:47:26', '2022-11-13 01:47:26'),
(4, 5, 'pi_3M3aTsSEOx8Jxo911xfW0wm6', '2', '200.00', NULL, '2022-11-13 01:49:51', '2022-11-13 01:49:51'),
(5, 6, 'pi_3M3aWgSEOx8Jxo910EhwuXL7', '1', '100.00', NULL, '2022-11-13 01:52:46', '2022-11-13 01:52:46'),
(6, 7, 'pi_3M3aYuSEOx8Jxo911MqWxX5c', '2', '200.00', NULL, '2022-11-13 01:55:04', '2022-11-13 01:55:04'),
(7, 8, 'pi_3M3aaESEOx8Jxo9101mZPYFF', '5', '1000.00', NULL, '2022-11-13 01:56:27', '2022-11-13 01:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ez55ZLttk.dXEw15Soq5z.ZbnSAMnICcqQI0kHVzQYxrexN3kN7S.', '13/15, sasthiri street', NULL, '2022-11-12 09:44:26', '2022-11-12 09:49:27', 'cus_MmvLZl74dEk50z', 'visa', '4242', NULL),
(2, 'vignesh', 'vignesh@gmail.com', NULL, '$2y$10$jjZA1TXxfHY3jB3FG5ZkI.EEW/jHgSv0gdkdQSpQvAhpe/LXDAayW', NULL, NULL, '2022-11-13 01:47:07', '2022-11-13 01:47:07', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
