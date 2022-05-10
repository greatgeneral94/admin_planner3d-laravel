-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: mai 05, 2022 la 11:27 PM
-- Versiune server: 10.3.27-MariaDB
-- Versiune PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `r46221mobi_frest`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bplanner_versions`
--

CREATE TABLE `bplanner_versions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `planner_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `bplanner_versions`
--

INSERT INTO `bplanner_versions` (`id`, `user_id`, `planner_id`, `created_at`, `updated_at`) VALUES
(11, 47, 14, '2022-04-03 00:02:00', '2022-04-03 05:02:00'),
(12, 48, 14, '2022-04-05 02:06:30', '2022-04-05 07:06:30'),
(13, 50, 14, '2022-04-07 03:00:28', '2022-04-07 08:00:28'),
(14, 54, 14, '2022-04-07 09:43:30', '2022-04-07 14:43:30'),
(15, 55, 14, '2022-04-09 02:13:00', '2022-04-09 07:13:00'),
(16, 56, 16, '2022-04-18 04:34:47', '2022-04-22 11:55:48'),
(17, 56, 14, '2022-04-19 05:09:58', '2022-04-19 08:09:58'),
(18, 57, 14, '2022-04-19 08:18:40', '2022-04-19 13:11:32'),
(19, 58, 16, '2022-04-22 08:57:15', '2022-04-22 11:57:15');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `ch_messages`
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
-- Eliminarea datelor din tabel `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1693380877, 'user', 56, 53, 'rgtrgtrtrhtrh', NULL, 1, '2022-04-19 05:10:09', '2022-04-19 05:10:22'),
(1694844311, 'user', 1, 52, 'uy', NULL, 1, '2022-04-22 03:47:52', '2022-04-24 03:00:57'),
(1707364105, 'user', 52, 1, 'tyhyhyth', NULL, 1, '2022-04-22 03:47:19', '2022-04-22 03:47:28'),
(1760884474, 'user', 52, 1, 'tyhy', NULL, 1, '2022-04-22 03:47:20', '2022-04-22 03:47:28'),
(1818074813, 'user', 59, 52, 'Hi', NULL, 0, '2022-05-02 14:31:59', '2022-05-02 14:31:59'),
(1883048131, 'user', 59, 1, 'rthrthty', NULL, 1, '2022-05-04 14:43:16', '2022-05-04 14:43:29'),
(2094828521, 'user', 1, 52, 'uyjuy', NULL, 1, '2022-04-22 03:47:51', '2022-04-24 03:00:57'),
(2169407525, 'user', 52, 1, 'fhyhjytyt', NULL, 1, '2022-04-22 03:47:16', '2022-04-22 03:47:28'),
(2375764817, 'user', 1, 52, 'uyjkuy', NULL, 1, '2022-04-22 03:47:51', '2022-04-24 03:00:57'),
(2382181194, 'user', 56, 52, 'fhyytyt', NULL, 1, '2022-04-24 03:00:43', '2022-04-24 03:00:59'),
(2414134416, 'user', 1, 52, 'jyujuyjuy', NULL, 1, '2022-04-22 03:47:49', '2022-04-24 03:00:57'),
(2428626306, 'user', 52, 1, 'tyhtyhyt', NULL, 1, '2022-04-22 03:47:18', '2022-04-22 03:47:28'),
(2516700883, 'user', 1, 52, 'tyjuyjuy', NULL, 1, '2022-04-22 03:47:50', '2022-04-24 03:00:57');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `conversations`
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
-- Structură tabel pentru tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start_date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start_time` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_end_date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_end_time` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `events`
--

INSERT INTO `events` (`id`, `created_at`, `updated_at`, `event_title`, `event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`, `event_description`, `user_id`) VALUES
(11, '2022-04-30 13:59:15', '2022-04-30 13:59:15', 'ttt', '2022-04-30', '7:58 PM', '2022-04-30', '7:59 PM', NULL, 56),
(14, '2022-05-01 08:50:32', '2022-05-01 08:50:32', 'ghnhgnhgnhghg', '2022-05-01', '12:00 AM', '2022-05-01', '11:59 PM', NULL, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
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
-- Structură tabel pentru tabel `gift_days`
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
-- Eliminarea datelor din tabel `gift_days`
--

INSERT INTO `gift_days` (`id`, `name`, `code`, `email`, `price`, `days`, `commession`, `commession_type`, `description`, `created_at`, `updated_at`) VALUES
(8, '10 day', 'EXeq@kxLm7jpR', 'iuhasz_zoltan@yahoo.com', '123', '10', '10', '%', 'test', '2022-04-19 07:34:19', '2022-04-19 07:34:19'),
(9, 'fdbdfnb', 'YPVXB%MpyROve', 'youthmobtm@gmail.com', '123', '20', '10', '%', 'fref', '2022-04-25 07:08:37', '2022-04-25 07:08:37');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `messages`
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
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
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
(18, '2017_05_11_170321_create_attachments_table', 7),
(19, '2022_04_13_072654_create_events_table', 8),
(20, '2018_08_10_034632_create_events_table', 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 31),
(1, 'App\\Models\\User', 51),
(1, 'App\\Models\\User', 52),
(1, 'App\\Models\\User', 53),
(1, 'App\\Models\\User', 59),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(2, 'create', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(3, 'edit', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31'),
(4, 'delete', 'web', '2022-03-05 17:04:31', '2022-03-05 17:04:31');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal_access_tokens`
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
-- Structură tabel pentru tabel `planners`
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
-- Eliminarea datelor din tabel `planners`
--

INSERT INTO `planners` (`id`, `title`, `planner`, `version`, `created_at`, `updated_at`) VALUES
(16, 'version 2', 'planner/planner3d_1 (2)_127ddf7901ec73cbdd446ade7b6f868e.zip', '2.00', '2022-04-22 08:55:26', '2022-04-22 11:55:26');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `projects`
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
-- Structură tabel pentru tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Every Thing', 'web', '2022-03-05 17:05:04', '2022-03-06 06:00:08'),
(3, 'Only Read', 'web', '2022-03-06 06:00:39', '2022-03-06 06:00:39'),
(4, 'Only Create', 'web', '2022-03-06 06:00:56', '2022-03-06 06:00:56'),
(5, 'Only Edit', 'web', '2022-03-06 06:01:08', '2022-03-06 06:01:08'),
(6, 'Only Delete', 'web', '2022-03-06 06:01:21', '2022-03-06 06:01:21');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `role_has_permissions`
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
-- Structură tabel pentru tabel `sessions`
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
-- Structură tabel pentru tabel `subscriptions`
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
-- Eliminarea datelor din tabel `subscriptions`
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
(34, 2, 47, 'toXVPJSPbuJhD', '1', '2022-04-04 06:19:47', '2022-04-04 06:19:47'),
(35, 20, 56, 'b92owdYuZW', '0', '2022-04-19 07:33:17', '2022-04-19 07:33:17'),
(36, 10, 56, 'EXeq@kxLm7jpR', '1', '2022-04-19 07:34:31', '2022-04-19 07:34:31'),
(37, 20, 56, 'YPVXB%MpyROve', '1', '2022-04-25 07:08:48', '2022-04-25 07:08:48');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subscription_histories`
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
-- Eliminarea datelor din tabel `subscription_histories`
--

INSERT INTO `subscription_histories` (`id`, `days`, `user_id`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 10, 44, '2022-04-20 11:27:21', '2022-04-01 06:27:21', '2022-04-01 06:27:21'),
(4, 10, 44, '2022-04-30 11:28:56', '2022-04-01 06:28:56', '2022-04-01 06:28:56'),
(5, 10, 47, '2022-04-23 10:31:19', '2022-04-04 05:31:19', '2022-04-04 05:31:19'),
(6, 360, 47, '2023-05-03 11:11:36', '2022-04-04 06:11:36', '2022-04-04 06:11:36'),
(7, 5, 47, '2023-05-13 11:18:14', '2022-04-04 06:18:14', '2022-04-04 06:18:14'),
(8, 2, 47, '2023-05-15 11:19:47', '2022-04-04 06:19:47', '2022-04-04 06:19:47'),
(9, 10, 56, '2022-05-08 10:34:31', '2022-04-19 07:34:31', '2022-04-19 07:34:31'),
(10, 20, 56, '2022-05-29 10:08:48', '2022-04-25 07:08:48', '2022-04-25 07:08:48');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `todo_tasks`
--

CREATE TABLE `todo_tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `comment` text DEFAULT NULL,
  `due_date` varchar(191) NOT NULL,
  `favorite` enum('0','1') NOT NULL DEFAULT '0',
  `complete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `todo_tasks`
--

INSERT INTO `todo_tasks` (`id`, `title`, `assign_to`, `assign_by`, `description`, `comment`, `due_date`, `favorite`, `complete`, `created_at`, `updated_at`) VALUES
(9, 'fgbfgbgfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 52, 1, '<p>fgbgfbgf<img src=\"data:image/jpeg;base64,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zHcj5kYfN7dqsvqsKxbg2T2HeqzQTWJIQCWI/wAJGf0pqvhvktMN6nJxUgJcvIbRVfl5X3AegrTT5UA9BiqtnYsJvNmOX7D0q2eKAFzRSZpc0AIeKM0tIaADNLSZozQAtFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUmaCaAAmjOaM5NKKAEApaKQmgAJoJoJoFAAKWikJoACaCaCaBTQC0UUhNWAE0hbFBam5zSbAKQmlpCagAJpaQUtABSE0E0dTQACloooAQmjOTQTQKAFpCaWkJoACeaWkFLVoApCaCaax4pgITk0UUVmAUh4NLSHpQAA0tIDS0AIaAaWkzQAtKpxSZopgPBpaaDTqsBDRmlpDxUsBc0UmaWpATPNLSGgGgBaQ0tFACZpaQ8UZoAWkzilpDQAZpaTNLQAqmnZplKGqkwH5opM0uaoBDxRmlpDxUtALmikzS5qQEPFGaWkNAC0UmaM0ALSHilooATNGaCKM4oAWikzRmgBaKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikzQAtITRmjOaAAmgc0YpaACijNITQAE0ZzRnNFAABS0UhNAATQTQTQKYAKWikJqwAmgmgmms2aAEJzRRSE1mAE0DmjOTS0AFITS0hNAATSikHNLQAUhNBNBNAAOTS0UUAITQTzQTQKaAWiikJqwAmmE5NKx4pKlgFJmgmkLVIDqKKKACiiigAooooAKKKKAHJ0p1FFaAFFFFJ7AFFFFQAUUUUAFFFFABRRRQAUUUUAFFFFABQOtFFMCSiiirAKKKKACiiiswCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiirQBRRRTAQ9KZRRUyAKKKKkAooooAKKKKACiiigAooooAKKKKACiiiqQBRRRVAMfrSUUVD3AKKKKQH/9k=\"></p>', '<p>fgbgfbgfg</p><p><br></p>', '19-04-2022', '0', '0', '2022-04-19 07:32:50', '2022-05-02 18:21:16'),
(10, 'fdvgbdfbfgfg', 59, 58, '<p>fgbgfbgf</p>', '<p>gfbgfbgf</p>', '05-05-2022', '0', '0', '2022-05-05 15:07:38', '2022-05-05 18:07:38');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `trails`
--

CREATE TABLE `trails` (
  `id` int(11) NOT NULL,
  `trail_days` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `trails`
--

INSERT INTO `trails` (`id`, `trail_days`, `created_at`, `updated_at`) VALUES
(3, 10, '2022-03-29 13:14:43', '2022-03-29 13:14:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
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
  `show_in_chat` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `chat_show_internal` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country`, `company_name`, `image_path`, `email_verified_at`, `role`, `user_id`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `last_active_at`, `trial_until`, `plan_until`, `active_status`, `show_in_chat`, `chat_show_internal`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'dev', 'dev@admin.com', NULL, NULL, 'app-assets/images/profile/user-uploads/1649317116.jpg', NULL, '0', NULL, 1, '$2y$10$6VWHCsS9XA/msGKOGvEWT.yZ9vV7ce9nXooskLClj/QC4AvdJdEJS', 'dzZmwGDZkfUFOGEpm0ppFOtvb469KUmlu9nDGklbKnMpq0StmqQywnoYecuA', '2022-03-04 15:09:19', '2022-05-05 15:57:50', '2022-05-05 15:57:50', NULL, NULL, 0, '1', '1', 'app-assets/images/profile/user-uploads/animation_Default_twnuk8jg.gif-d6fbb646-802a-40ad-9500-2001a6d165af.gif', 0, '#2180f3'),
(52, 'Seller', 'seller@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$XcGAeps81VWOaw1TauGpGeftZjYf9xXJ2Hqzda3HZaFtd3PzfGacu', NULL, '2022-04-07 09:41:37', '2022-05-04 14:53:13', NULL, NULL, NULL, 0, '1', '1', 'avatar.png', 0, '#2180f3'),
(53, 'Billing', 'billing@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$hBfuBZZras0u71jQwCWZdeNkxm6X.qoiwcXLmMgNRbPTF2Ydeoc/W', NULL, '2022-04-07 09:42:02', '2022-04-11 07:57:48', NULL, NULL, NULL, 0, '1', '1', 'avatar.png', 0, '#2180f3'),
(56, 'test', 'test@gmail.com', 'Romania', 'freelancer', 'app-assets/images/profile/user-uploads/1650612583.jpg', NULL, '2', NULL, 1, '$2y$10$Hx62p6ENDJaMvkcEYcvVUeKuXoubM76CDiQVC75t3FEcckjatJTt6', NULL, '2022-04-18 04:34:44', '2022-04-25 07:08:48', '2022-04-22 04:31:34', '2022-04-28 04:34:44', '2022-05-29 07:08:48', 0, '0', '0', 'avatar.png', 0, '#2180f3'),
(57, 'iuhasz zoltan', 'iuhasz_zoltan@yahoo.com', 'Romania', 'youthmob', NULL, NULL, '2', NULL, 1, '$2y$10$Dm6ZMfjN5WJ4OLTA3B/umu0a8deCUhfxMfvRjRxb3h/CA0QmLqq42', NULL, '2022-04-19 08:18:39', '2022-04-19 08:19:02', '2022-04-19 08:19:02', '2022-04-29 08:18:39', NULL, 0, '0', '0', 'avatar.png', 0, '#2180f3'),
(58, 'Youthmob', 'youthmobtm@gmail.com', 'Romania', 'youthmob1', NULL, NULL, '2', NULL, 1, '$2y$10$9sipamuB3IxCICiJ8.Evwe.09wkqeuYnErB7nnXjR.I1ha4Ghhf2a', NULL, '2022-04-22 08:57:15', '2022-04-22 08:57:28', '2022-04-22 08:57:28', '2022-05-02 08:57:15', NULL, 0, '0', '0', 'avatar.png', 0, '#2180f3'),
(59, 'Test admin', 'test@admin.com', NULL, NULL, NULL, NULL, '1', NULL, 1, '$2y$10$ME3C.YrW13MWyuKhGY6dw.0FOsO767Oo3k.ggSAt5NmOQPUwnANY2', 'u5ITRq9AFrW92sxhFMNZv3VwpYf8IYZzXS4MxA0p3s4FB1dcFylsKnRl7ggs', '2022-05-02 10:20:04', '2022-05-05 17:27:04', '2022-05-05 17:27:04', NULL, NULL, 0, '0', '0', 'avatar.png', 0, '#2180f3'),
(60, 'Bucatarii', 'test1@admin.com', NULL, NULL, NULL, NULL, '3', 58, 1, '$2y$10$.7dstX1ppTufyAGK2RDfeOYLOsoOEEZox.BjcUhiHZQlzQ9vlqLcO', NULL, '2022-05-02 10:20:56', '2022-05-02 14:29:25', '2022-05-02 14:29:25', NULL, NULL, 0, '0', '0', 'avatar.png', 0, '#2180f3');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `bplanner_versions`
--
ALTER TABLE `bplanner_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexuri pentru tabele `gift_days`
--
ALTER TABLE `gift_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexuri pentru tabele `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexuri pentru tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexuri pentru tabele `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexuri pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexuri pentru tabele `planners`
--
ALTER TABLE `planners`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexuri pentru tabele `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexuri pentru tabele `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexuri pentru tabele `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `todo_tasks`
--
ALTER TABLE `todo_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `trails`
--
ALTER TABLE `trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `bplanner_versions`
--
ALTER TABLE `bplanner_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `gift_days`
--
ALTER TABLE `gift_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `planners`
--
ALTER TABLE `planners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pentru tabele `subscription_histories`
--
ALTER TABLE `subscription_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `todo_tasks`
--
ALTER TABLE `todo_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `trails`
--
ALTER TABLE `trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
