-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time:  2 ное 2017 в 15:04
-- Версия на сървъра: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2017_10_31_104003_create_profiles_table', 1),
(14, '2017_10_31_111000_create_results_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `result` decimal(8,2) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `country`, `picture`, `result`, `published`, `created_at`, `updated_at`) VALUES
(9, 10, NULL, '2017-11-02_103337000000.jpg', NULL, 0, '2017-11-02 08:02:32', '2017-11-02 08:33:37'),
(10, 11, NULL, '2017-11-02_103419000000.jpg', NULL, 0, '2017-11-02 08:02:59', '2017-11-02 08:34:19'),
(11, 12, NULL, '2017-11-02_103444000000.jpg', NULL, 0, '2017-11-02 08:03:20', '2017-11-02 08:34:44'),
(12, 13, 'България', '2017-11-02_130114000000.jpg', NULL, 0, '2017-11-02 11:01:14', '2017-11-02 11:01:14'),
(13, 14, 'Великобритания', '2017-11-02_130420000000.jpg', NULL, 0, '2017-11-02 11:04:20', '2017-11-02 11:04:20'),
(14, 15, 'Гърция', '2017-11-02_130910000000.jpg', NULL, 0, '2017-11-02 11:09:10', '2017-11-02 11:09:10'),
(15, 16, 'България', '2017-11-02_132036000000.jpg', NULL, 0, '2017-11-02 11:18:40', '2017-11-02 11:20:36');

-- --------------------------------------------------------

--
-- Структура на таблица `results`
--

CREATE TABLE `results` (
  `arbiter_id` int(10) UNSIGNED NOT NULL,
  `first_criterion` int(10) UNSIGNED NOT NULL,
  `second_criterion` int(10) UNSIGNED NOT NULL,
  `third_criterion` int(10) UNSIGNED NOT NULL,
  `dancer_id` int(10) UNSIGNED NOT NULL,
  `invalid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Радослав Дмитров', 'radodi@abv.bg', '$2y$10$5W8AksX3mma36EARou8e6O/xYRTOhpELEuivF2gB6GngA36IDKGrK', 'admin', 'y4sgSuw0vJe22B1wri0UknDL6ZgII9C2Ug6O3YXSfEkujYa2TuiyslYitx6z', '2017-11-02 07:10:57', '2017-11-02 07:10:57'),
(10, 'Нешка Робева', 'neshka@mail.com', '$2y$10$gmM9h0zbHc6Oqv7dBsDijuESgzRPsiDtkNyXDMggDM2nmHlDhIpWi', 'arbiter', NULL, '2017-11-02 08:02:32', '2017-11-02 08:33:37'),
(11, 'Памбос Агапиу', 'pambos@mail.com', '$2y$10$GqSThPDoDRu12p9rh866Ye3BaAdNrADX4xfSI69luM8/VK2h5nxs6', 'arbiter', NULL, '2017-11-02 08:02:59', '2017-11-02 08:34:19'),
(12, 'Галена Великова', 'galena@mail.com', '$2y$10$EWK0XMEj8veMj6rYWToiJO4uR08/Qm2rN2EJATvnsrUrfNxpV81X6', 'arbiter', NULL, '2017-11-02 08:03:20', '2017-11-02 08:34:44'),
(13, 'Петя Стоянова', 'petia@abv.bg', '$2y$10$Bosi/E9QqXgQuqFxuL3e5umcdo3jsouygyo.8/ASxmMomKCp2w5Cu', 'dancer', NULL, '2017-11-02 11:01:14', '2017-11-02 11:01:14'),
(14, 'John Doe', 'john@abv.bg', '$2y$10$9BrkRbvCKwgR/KPgNJKU3OFbnZjZNS9mW4w2IJ/VqPnUNgdAfGqHO', 'dancer', NULL, '2017-11-02 11:04:20', '2017-11-02 11:04:20'),
(15, 'Alexandros Angelis', 'alexandros@abv.bg', '$2y$10$HhpUp/nyTeqr0ytuUez2p.iuj5mCDyQDeRoLyamldX2Z604OYWjiO', 'dancer', NULL, '2017-11-02 11:09:10', '2017-11-02 11:09:10'),
(16, 'Иван Петканов', 'ivan@abv.bg', '$2y$10$yMsE0qEF6VaBZhQtcffu9OHFjtZQldfbL/0/oHL5CmX5JUMpztSZW', 'dancer', NULL, '2017-11-02 11:18:40', '2017-11-02 11:20:36');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`arbiter_id`,`dancer_id`),
  ADD KEY `results_dancer_id_foreign` (`dancer_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения за таблица `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_arbiter_id_foreign` FOREIGN KEY (`arbiter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_dancer_id_foreign` FOREIGN KEY (`dancer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
