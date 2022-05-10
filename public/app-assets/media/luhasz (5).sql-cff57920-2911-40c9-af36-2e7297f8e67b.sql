-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 04:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luhasz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bplanner_versions`
--

CREATE TABLE `bplanner_versions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `planner_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bplanner_versions`
--

INSERT INTO `bplanner_versions` (`id`, `user_id`, `planner_id`, `created_at`, `updated_at`) VALUES
(11, 47, 14, '2022-04-03 00:02:00', '2022-04-03 05:02:00'),
(12, 48, 14, '2022-04-05 02:06:30', '2022-04-05 07:06:30'),
(13, 50, 14, '2022-04-07 03:00:28', '2022-04-07 08:00:28'),
(14, 54, 14, '2022-04-07 09:43:30', '2022-04-07 14:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1971795288, 'user', 54, 1, 'hi', NULL, 0, '2022-04-07 09:46:18', '2022-04-07 09:46:18'),
(2175399632, 'user', 54, 51, 'ji', NULL, 0, '2022-04-07 09:47:27', '2022-04-07 09:47:27'),
(2205921375, 'user', 1, 50, '', '{\"new_name\":\"7aaa3613-c451-47e2-9ad9-dbd2ab10e97a.txt\",\"old_name\":\"readme.txt\"}', 1, '2022-04-07 09:22:35', '2022-04-07 09:33:17'),
(2580338677, 'user', 1, 50, 'hi', NULL, 1, '2022-04-07 09:31:42', '2022-04-07 09:33:17'),
(2595064708, 'user', 1, 50, 'hi', NULL, 1, '2022-04-07 03:10:30', '2022-04-07 03:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `gift_days`
--

CREATE TABLE `gift_days` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `days` varchar(11) NOT NULL,
  `commession` varchar(11) NOT NULL,
  `commession_type` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gift_days`
--

INSERT INTO `gift_days` (`id`, `name`, `code`, `email`, `price`, `days`, `commession`, `commession_type`, `description`, `created_at`, `updated_at`) VALUES
(4, 'test', '9h*z#$PI7tbzq', 'abrarumar2@gmail.com', '360', '5', '10', 'fixed', 'test description', '2022-04-01 08:01:43', '2022-04-01 08:06:11'),
(5, 'dev', '#Zegp70d3UeZ4', 'abrarumar2@gmail.com', '360', '5', '10', '%', 'test', '2022-04-04 05:35:29', '2022-04-04 05:35:29'),
(6, 'dev', 'lSowiWhzKDr3u', 'abrarumar2@gmail.com', '360', '5', '10', '%', 'test', '2022-04-04 05:50:59', '2022-04-04 05:50:59'),
(7, 'Khalil', 'toXVPJSPbuJhD', 'urrehman48@gmail.com', '360', '2', '10', '%', 'test', '2022-04-04 06:19:16', '2022-04-04 06:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_from_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_from_receiver` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_05_150246_add_last_active_at_to_users_table', 2),
(6, '2022_03_05_192232_create_sessions_table', 3),
(7, '2022_03_05_214102_create_permission_tables', 3),
(8, '2022_03_25_062838_add_trial_until_field_to_users_table', 4),
(9, '2022_04_02_103657_create_chats_table', 5),
(10, '2022_04_02_999999_add_active_status_to_users', 6),
(11, '2022_04_02_999999_add_avatar_to_users', 6),
(12, '2022_04_02_999999_add_dark_mode_to_users', 6),
(13, '2022_04_02_999999_add_messenger_color_to_users', 6),
(14, '2022_04_02_999999_create_favorites_table', 6),
(15, '2022_04_02_999999_create_messages_table', 6),
(16, '2015_10_05_110608_create_messages_table', 7),
(17, '2015_10_05_110622_create_conversations_table', 7),
(18, '2017_05_11_170321_create_attachments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 31),
(1, 'App\\Models\\User', 51),
(1, 'App\\Models\\User', 52),
(1, 'App\\Models\\User', 53),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(2, 'create', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(3, 'edit', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(4, 'delete', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planners`
--

CREATE TABLE `planners` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `planner` varchar(191) NOT NULL,
  `version` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planners`
--

INSERT INTO `planners` (`id`, `title`, `planner`, `version`, `created_at`, `updated_at`) VALUES
(14, '3D Planner', 'planner/planner3d_893e06fd9a212c94a7b622cb343e663e.zip', '1.0', '2022-03-21 08:29:18', '2022-03-21 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `project_title` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Every Thing', 'web', '2022-03-05 17:05:04', '2022-03-06 06:00:08'),
(3, 'Only Read', 'web', '2022-03-06 06:00:39', '2022-03-06 06:00:39'),
(4, 'Only Create', 'web', '2022-03-06 06:00:56', '2022-03-06 06:00:56'),
(5, 'Only Edit', 'web', '2022-03-06 06:01:08', '2022-03-06 06:01:08'),
(6, 'Only Delete', 'web', '2022-03-06 06:01:21', '2022-03-06 06:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 4),
(3, 1),
(3, 5),
(4, 1),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `subscription` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(191) NOT NULL,
  `use_or_not` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscription`, `user_id`, `code`, `use_or_not`, `created_at`, `updated_at`) VALUES
(21, 1, 44, 'N7ulFURBvW', '1', '2022-04-01 06:00:29', '2022-04-01 06:01:07'),
(22, 1, 44, '6EjJToamfN', '1', '2022-04-01 06:01:21', '2022-04-01 06:01:42'),
(23, 1, 44, 'VJfie44eVL', '1', '2022-04-01 06:18:01', '2022-04-01 06:18:22'),
(24, 10, 44, 'fB93TcHNMD', '1', '2022-04-01 06:23:57', '2022-04-01 06:24:17'),
(25, 10, 44, '0s7APLG06g', '1', '2022-04-01 06:27:02', '2022-04-01 06:27:21'),
(26, 10, 44, 'gRQFhu1G3J', '1', '2022-04-01 06:28:42', '2022-04-01 06:28:56'),
(27, 10, 47, 'uJvdny5fAP', '1', '2022-04-04 05:30:16', '2022-04-04 05:31:19'),
(28, 0, 47, '#Zegp70d3UeZ4', '1', '2022-04-04 05:35:48', '2022-04-04 05:35:48'),
(31, 360, 47, '7nDZU3mHjo', '1', '2022-04-04 06:11:00', '2022-04-04 06:11:36'),
(33, 5, 47, 'lSowiWhzKDr3u', '1', '2022-04-04 06:18:14', '2022-04-04 06:18:14'),
(34, 2, 47, 'toXVPJSPbuJhD', '1', '2022-04-04 06:19:47', '2022-04-04 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_histories`
--

CREATE TABLE `subscription_histories` (
  `id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_histories`
--

INSERT INTO `subscription_histories` (`id`, `days`, `user_id`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 10, 44, '2022-04-20 11:27:21', '2022-04-01 06:27:21', '2022-04-01 06:27:21'),
(4, 10, 44, '2022-04-30 11:28:56', '2022-04-01 06:28:56', '2022-04-01 06:28:56'),
(5, 10, 47, '2022-04-23 10:31:19', '2022-04-04 05:31:19', '2022-04-04 05:31:19'),
(6, 360, 47, '2023-05-03 11:11:36', '2022-04-04 06:11:36', '2022-04-04 06:11:36'),
(7, 5, 47, '2023-05-13 11:18:14', '2022-04-04 06:18:14', '2022-04-04 06:18:14'),
(8, 2, 47, '2023-05-15 11:19:47', '2022-04-04 06:19:47', '2022-04-04 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `trails`
--

CREATE TABLE `trails` (
  `id` int(11) NOT NULL,
  `trail_days` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trails`
--

INSERT INTO `trails` (`id`, `trail_days`, `created_at`, `updated_at`) VALUES
(3, 10, '2022-03-29 13:14:43', '2022-03-29 13:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0=superadmin\r\n1=admin\r\n2=b1\r\n3=c1',
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_active_at` timestamp NULL DEFAULT NULL,
  `trial_until` timestamp NULL DEFAULT NULL,
  `plan_until` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country`, `company_name`, `image_path`, `email_verified_at`, `role`, `user_id`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `last_active_at`, `trial_until`, `plan_until`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'dev', 'dev@admin.com', NULL, NULL, 'app-assets/images/profile/user-uploads/1649317116.jpg', NULL, '0', NULL, 1, '$2y$10$6VWHCsS9XA/msGKOGvEWT.yZ9vV7ce9nXooskLClj/QC4AvdJdEJS', NULL, '2022-03-04 15:09:19', '2022-04-07 09:43:15', '2022-04-07 09:43:15', NULL, NULL, 1, 'app-assets/images/profile/user-uploads/2fed69b7-19e3-4e7f-8904-b273e5591cae.jpg', 0, '#2180f3'),
(51, 'Technical Support', 'technicalsupport@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$1saQxStDzKCZ13d5ekAWCO1HvMoPYgzyLqWbd4SvQIkN7SAurF8Gu', NULL, '2022-04-07 09:41:08', '2022-04-07 09:41:08', NULL, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(52, 'Seller', 'seller@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$XcGAeps81VWOaw1TauGpGeftZjYf9xXJ2Hqzda3HZaFtd3PzfGacu', NULL, '2022-04-07 09:41:37', '2022-04-07 09:41:37', NULL, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(53, 'Billing', 'billing@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$hBfuBZZras0u71jQwCWZdeNkxm6X.qoiwcXLmMgNRbPTF2Ydeoc/W', NULL, '2022-04-07 09:42:02', '2022-04-07 09:42:02', NULL, NULL, NULL, 0, 'avatar.png', 0, '#2180f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bplanner_versions`
--
ALTER TABLE `bplanner_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gift_days`
--
ALTER TABLE `gift_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planners`
--
ALTER TABLE `planners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trails`
--
ALTER TABLE `trails`
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
-- AUTO_INCREMENT for table `bplanner_versions`
--
ALTER TABLE `bplanner_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_days`
--
ALTER TABLE `gift_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planners`
--
ALTER TABLE `planners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trails`
--
ALTER TABLE `trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
