-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 10:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `othman_dern_support`
--
CREATE DATABASE IF NOT EXISTS `othman_dern_support` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `othman_dern_support`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `admins`:
--

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root', 'root@mail.com', '$2y$12$9V6nNGHZS8497QtQupHROeVikQYwDKLxT6tRi12YMC5Dl3SBJ1nVO', 0, NULL, 'ydR55MaDhws20zC2w2K04oxNaMcNeMnsqy6SRrZ0pIr5uawyGK4xs6v7AV3y', '2024-05-18 05:18:17', '2024-05-18 05:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `failed_jobs`:
--

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
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_16_115556_create_services_table', 1),
(6, '2024_05_16_115911_create_categories_table', 1),
(7, '2024_05_17_141021_create_requests_table', 1),
(8, '2024_05_18_063320_create_admins_table', 1),
(9, '2024_05_18_065643_add_is_admin_column_to_admins', 1),
(10, '2024_05_18_071455_add_name_column_to_admins', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_reset_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `personal_access_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('completed','cancelled','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `requests`:
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `services`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ursula Copeland', 'lyvoky@mailinator.com', '$2y$12$7vao7c2SzeIjAx.DSBKarOdV5CdzPgYt09W8xutMwAunTrr5Ny0uG', 'Voluptatem ipsum c', NULL, NULL, '2024-05-18 05:18:27', '2024-05-18 06:49:45'),
(2, 'Cruz Dickerson', 'mefifu@mailinator.com', '$2y$12$KYUCXiooKMs2Dsv.AojK2.HQ5v8OesCMXc7Na8k6Wlb.N/SLlJZG.', 'Pariatur Molestiae ', NULL, NULL, '2024-05-18 05:24:25', '2024-05-18 05:24:25'),
(3, 'Jaquelyn Castillo', 'safajy@mailinator.com', '$2y$12$PD07Xag2Bz094XfHh2qv3.SfxWvQKf7.jis1I7QD/Y7w25xWrfZpu', 'Exercitationem quisq', NULL, NULL, '2024-05-18 05:24:58', '2024-05-18 05:24:58'),
(4, 'Signe Ewing', 'lixuba@mailinator.com', '$2y$12$jbb90Dd6oXo1lxlJuXUjTe816Pi7eEQwhvAXuCtpY1PpwgZXpAgWS', 'Dolor ut et praesent', NULL, NULL, '2024-05-18 05:49:06', '2024-05-18 05:49:06'),
(5, 'Shoshana Mckay', 'zamiqebed@mailinator.com', '$2y$12$lFdziDK.wcDlSeApHEeZteAqnA9yW6Ro73kAooXtBHXsB4Gqc5p.m', 'Necessitatibus bland', NULL, NULL, '2024-05-18 05:49:27', '2024-05-18 05:49:27'),
(6, 'Desirae Shelton', 'goqyjehedo@mailinator.com', '$2y$12$Uq8TtTfHWIVnibHg779lCuKUUHGgSWAVuzw5xS/.fFAT5/H6eYlk2', 'In quaerat nihil in ', NULL, NULL, '2024-05-18 05:50:56', '2024-05-18 05:50:56'),
(8, 'Deanna Cohen', 'rexymerejo@mailinator.com', '$2y$12$6jFsFm1d9XUqa9fsC.Nx9O/Lr2FWZSMIotsmVw7fW/p26ev3ozjia', 'Vero est voluptas do', NULL, NULL, '2024-05-18 08:01:05', '2024-05-18 08:01:05'),
(9, 'Ian Shaw', 'qekyc@mailinator.com', '$2y$12$aVHStzhgQZIObU0J9wm7I.bsj41mk8rDbhcOsuLsCPQyzVHEdPH6u', 'Voluptate aut sed od', NULL, NULL, '2024-05-18 09:00:18', '2024-05-18 09:00:18'),
(10, 'Ahmad Othman', 'trollingosman101@outlook.com', '$2y$12$dA4huJJ6b6wYUiUumpOZpuuVO38q9DBjKTc6WYAZ3JSjH4/xp5QNi', 'Deleniti sint ea ver', NULL, 'YTAfsiZX0Xrl2c0EbBAfLui2lVo3CtPoksOIeXEVyN4NPUNR5nH5nOr7ndEF', '2024-05-18 12:18:52', '2024-05-18 12:21:30'),
(11, 'David Fleming', 'monyhihazo@mailinator.com', '$2y$12$39obx52WYDxWXSGYIYB.0uDdxGdhHgrHRxwp16jaNPbE0qCeSEOw2', 'Qui aliqua Asperior', NULL, NULL, '2024-05-18 13:02:29', '2024-05-18 13:02:29'),
(12, 'Unity Allen', 'pazak@mailinator.com', '$2y$12$khWn6aF.qiZvw5mRiEHRqeovtKvZ1w/MW.Vn/CzoW63M6W1pm2im2', 'aadfadsfsd', NULL, NULL, '2024-05-18 14:04:03', '2024-05-18 14:04:40'),
(13, 'Meredith Christian', 'kepogos@mailinator.com', '$2y$12$7IunXVVhZlFBDvTZf5iQRe07AWqljxD20hJVzE9y8LbFYVZ6enCZa', 'Qui ab quis quos qua', NULL, NULL, '2024-05-18 15:24:50', '2024-05-18 15:24:50'),
(14, 'Tanya Murray', 'hitysuqa@mailinator.com', '$2y$12$BOyeqC0zBAZ.wmpFbRxAoOWBDW8rhDo6AmTjC1CugP5YYjzvhz0Ca', 'Id veritatis minus ', NULL, NULL, '2024-05-18 15:25:18', '2024-05-18 15:25:18'),
(15, 'Olga Whitehead', 'dohavafu@mailinator.com', '$2y$12$0jW9zrRILpX..CoDhgQT.e2NWYPqCI181PgvqyJ7M1wkrNab7bCr6', 'Rerum aut commodo ut', NULL, NULL, '2024-05-18 15:27:43', '2024-05-18 15:27:43'),
(16, 'Rahim Haney', 'zaqefikox@mailinator.com', '$2y$12$tHd1igBvlSPgpD739gerPOQgX/T.jbUiJkEVBvXtSsPlhX8tApG0W', 'Nobis nihil corporis', NULL, NULL, '2024-05-18 15:29:12', '2024-05-18 15:29:12'),
(17, 'Irene Lynn', 'loxuludop@mailinator.com', '$2y$12$emSQr4M.o9iYWbaAbLn.SOmOXE51Qsl4IoGlz2jcXSPS8NVabOqvu', 'Unde omnis exercitat', NULL, NULL, '2024-05-18 15:38:29', '2024-05-18 15:38:29'),
(18, 'Noah Contreras', 'jadavade@mailinator.com', '$2y$12$lhdF.pBtKd0WKEpOWWtZ2.mIuoJ2yPhn.6wB4LspV7ABivmoqJwbC', 'Sint excepturi offi', NULL, NULL, '2024-05-18 16:19:03', '2024-05-18 16:19:03'),
(19, 'Ramona Wilkins', 'satijeqini@mailinator.com', '$2y$12$MeP.36sv13QeExJ.OkcaHeJosdshp6b7nXzNi67U/tABb8albG9DS', 'Aut aut sapiente har', NULL, NULL, '2024-05-18 16:43:48', '2024-05-18 16:43:48'),
(21, 'Karyn Mcguire', 'majyq@mailinator.com', '$2y$12$kQtUS7O3uo5QKzMsbTrLSOZ3a8IhxB180NbBvQyPpqnX9EDcKQKXq', 'Est magni reprehende', NULL, NULL, '2024-05-18 17:13:44', '2024-05-18 17:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
