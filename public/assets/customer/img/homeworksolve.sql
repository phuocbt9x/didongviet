-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 23, 2022 lúc 05:12 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `homeworksolve`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL,
  `idCity` int(10) UNSIGNED NOT NULL,
  `idDistrict` int(10) UNSIGNED NOT NULL,
  `idWard` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
(3232815, 1, 2, '2022-10-22 01:00:24', '2022-10-22 01:00:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1936501986, 'user', 1, 2, '', '{\"new_name\":\"dbf60499-2747-4ab9-b07b-783d7e8bee0e.png\",\"old_name\":\"360_F_517877468_8dx0lFR66R6LIgCOUYJWxun1b3Muv272.png\"}', 1, '2022-10-20 09:22:30', '2022-10-20 09:27:19'),
(2293103778, 'user', 1, 2, 'ccc', NULL, 1, '2022-10-20 09:16:06', '2022-10-20 09:27:19'),
(2403901073, 'user', 2, 2, 'alo alo', NULL, 1, '2022-10-19 21:07:08', '2022-10-19 21:07:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `idUsers` int(10) UNSIGNED NOT NULL,
  `idPost` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `isActive`, `idUsers`, `idPost`, `parent_id`, `created_at`, `updated_at`) VALUES
(19, 'Quải đạn', 1, 2, 2, NULL, '2022-10-20 05:41:07', '2022-10-20 08:30:47'),
(22, '123', 1, 2, 2, NULL, '2022-10-20 21:48:48', '2022-10-20 21:48:48'),
(25, '123', 1, 2, 2, 21, '2022-10-20 22:02:11', '2022-10-20 22:02:11'),
(26, 'nói nhiều thế nhỉ', 1, 2, 2, 15, '2022-10-20 22:02:25', '2022-10-20 22:02:25'),
(27, 'gieef', 1, 2, 2, 22, '2022-10-20 23:54:44', '2022-10-20 23:54:44'),
(34, '12331', 1, 1, 2, 15, '2022-10-21 22:46:18', '2022-10-21 22:46:18'),
(50, '123', 1, 1, 2, NULL, '2022-10-21 23:06:08', '2022-10-21 23:06:08'),
(52, 'vãi đạn', 1, 1, 2, NULL, '2022-10-22 02:09:28', '2022-10-22 02:09:28'),
(56, '123', 1, 1, 4, NULL, '2022-10-22 02:51:52', '2022-10-22 02:51:52'),
(59, '123', 1, 1, 4, NULL, '2022-10-22 02:52:56', '2022-10-22 02:52:56'),
(64, '1234', 1, 1, 4, NULL, '2022-10-22 03:02:00', '2022-10-22 03:02:00'),
(65, '1234', 1, 1, 4, NULL, '2022-10-22 03:02:31', '2022-10-22 03:02:31'),
(66, '1234', 1, 1, 4, NULL, '2022-10-22 03:03:01', '2022-10-22 03:03:01'),
(67, 'nhu cc', 1, 2, 4, NULL, '2022-10-22 04:05:15', '2022-10-22 04:05:15'),
(69, 'mệt', 1, 1, 4, NULL, '2022-10-22 04:50:05', '2022-10-22 04:50:05'),
(70, 'mệt cc', 1, 1, 4, NULL, '2022-10-22 04:50:41', '2022-10-22 04:50:50'),
(71, '?', 1, 2, 4, NULL, '2022-10-22 04:54:59', '2022-10-22 04:54:59'),
(73, '123', 1, 2, 4, NULL, '2022-10-22 09:15:34', '2022-10-22 09:15:34'),
(74, '123', 1, 2, 4, NULL, '2022-10-22 09:16:01', '2022-10-22 09:16:01'),
(75, '123', 1, 2, 4, NULL, '2022-10-22 09:16:16', '2022-10-22 09:16:16'),
(76, '123', 1, 2, 4, NULL, '2022-10-22 09:16:34', '2022-10-22 09:16:34'),
(77, '123', 1, 2, 4, NULL, '2022-10-22 09:19:49', '2022-10-22 09:19:49'),
(78, '123', 1, 2, 4, NULL, '2022-10-22 09:20:57', '2022-10-22 09:20:57'),
(79, '123', 1, 2, 4, NULL, '2022-10-22 09:29:06', '2022-10-22 09:29:06'),
(80, '12312323', 1, 2, 4, NULL, '2022-10-22 09:29:45', '2022-10-22 09:29:45'),
(81, '123', 1, 2, 2, NULL, '2022-10-22 09:31:24', '2022-10-22 09:31:24'),
(82, 'aaa', 1, 2, 2, NULL, '2022-10-22 09:34:32', '2022-10-22 09:34:32'),
(83, '1231', 1, 2, 2, NULL, '2022-10-22 09:36:10', '2022-10-22 09:36:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imagepost`
--

CREATE TABLE `imagepost` (
  `id` int(10) UNSIGNED NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idPost` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `imagepost`
--

INSERT INTO `imagepost` (`id`, `path_image`, `idPost`, `created_at`, `updated_at`) VALUES
(3, 'ID-2-Screenshot 2022-07-24 032115.png.png', 2, '2022-10-20 17:41:08', '2022-10-20 17:41:08'),
(5, 'ID-4-Screenshot 2022-07-24 032115.png.png', 4, '2022-10-22 00:45:16', '2022-10-22 00:45:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUsers` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `idUsers`, `remember_token`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'lanhnn.21it@vku.udn.vn', '$2y$10$GZXjw/6eG4W7k8X43O0xLuJ./.V824Kjk0dI2.6.u9mIkwAcsN7LG', 1, 'WvCHn48CMUVQ4MKWD3AjsmPIbakbCydQqFaTb7Ej0Hn9p8HecsL9Q2SJYeQB', 1, NULL, '2022-10-19 08:56:47'),
(2, 'nguyenngoclanh2003516@gmail.com', '$2y$10$RROy7F5D3jqNxsujsx1pOuLzlPaQiXYW8DWoFzAjsMn8cUaCxi/ly', 2, 'zISDfKGFSN7KsuIEzZYqq5hf1VjRhtp57tKAvZ1qv7DpB6EVeZ4QfemlTqP3', 1, NULL, '2022-10-20 21:09:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_30_154106_create_admin_table', 1),
(3, '2022_09_30_154701_create_contact_table', 1),
(4, '2022_10_14_131236_create_table_users', 1),
(5, '2022_10_14_131328_create_table_login', 1),
(6, '2022_10_14_131423_create_table_post', 1),
(7, '2022_10_14_131443_create_table_comment', 1),
(8, '2022_10_14_131504_create_table_imagepost', 1),
(9, '2022_10_14_131549_create_table_numberoflike', 1),
(10, '2022_10_14_131701_create_table_react', 1),
(11, '2022_10_14_131754_create_table_notification', 1),
(12, '2022_10_15_999999_add_active_status_to_users', 1),
(13, '2022_10_15_999999_add_avatar_to_users', 1),
(14, '2022_10_15_999999_add_dark_mode_to_users', 1),
(15, '2022_10_15_999999_add_messenger_color_to_users', 1),
(16, '2022_10_15_999999_create_favorites_table', 1),
(17, '2022_10_15_999999_create_messages_table', 1),
(18, '2022_10_18_155634_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('071d781a-17f0-4b1f-90ca-263e18a7cd60', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 1, '{\"comment\":{\"content\":\"m\\u1ec7t\",\"idUsers\":1,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T11:50:05.000000Z\",\"created_at\":\"2022-10-22T11:50:05.000000Z\",\"id\":69},\"user\":{\"id\":1,\"email\":\"lanhnn.21it@vku.udn.vn\",\"password\":\"$2y$10$GZXjw\\/6eG4W7k8X43O0xLuJ.\\/.V824Kjk0dI2.6.u9mIkwAcsN7LG\",\"idUsers\":1,\"remember_token\":\"V8D1MErAmaZfdOQCpeXCSzKCe0hqgVXBIeGO8McRdTHvLiXQ6cnztaMqXLgZ\",\"isActive\":1,\"created_at\":null,\"updated_at\":\"2022-10-19T15:56:47.000000Z\"}}', NULL, '2022-10-22 04:50:07', '2022-10-22 04:50:07'),
('0c317f99-fa76-4c84-bb21-b4911a15095d', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"12312323\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T16:29:45.000000Z\",\"created_at\":\"2022-10-22T16:29:45.000000Z\",\"id\":80}}', NULL, '2022-10-22 09:29:45', '2022-10-22 09:29:45'),
('11656ef5-b9ca-41ac-9d56-7f0cc4a993d4', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"123\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T16:16:16.000000Z\",\"created_at\":\"2022-10-22T16:16:16.000000Z\",\"id\":75},\"user\":{\"id\":2,\"email\":\"nguyenngoclanh2003516@gmail.com\",\"password\":\"$2y$10$RROy7F5D3jqNxsujsx1pOuLzlPaQiXYW8DWoFzAjsMn8cUaCxi\\/ly\",\"idUsers\":2,\"remember_token\":\"zISDfKGFSN7KsuIEzZYqq5hf1VjRhtp57tKAvZ1qv7DpB6EVeZ4QfemlTqP3\",\"isActive\":1,\"created_at\":null,\"updated_at\":\"2022-10-21T04:09:51.000000Z\"}}', NULL, '2022-10-22 09:16:16', '2022-10-22 09:16:16'),
('16238510-d64b-4a43-aba5-6766289004c6', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"123\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"2\",\"updated_at\":\"2022-10-22T16:31:24.000000Z\",\"created_at\":\"2022-10-22T16:31:24.000000Z\",\"id\":81}}', NULL, '2022-10-22 09:31:24', '2022-10-22 09:31:24'),
('34d38a26-5e84-4543-b0a4-105bbeb46032', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":\"2022-10-22T16:34:32.523800Z\"}', NULL, '2022-10-22 09:34:32', '2022-10-22 09:34:32'),
('3c88e943-024b-4bb5-8d56-0d94b86c88e9', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"12312\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T11:05:36.000000Z\",\"created_at\":\"2022-10-22T11:05:36.000000Z\",\"id\":68},\"user\":{\"id\":2,\"name\":\"User2\",\"email\":\"nguyenngoclanh2003516@gmail.com\",\"phone\":null,\"address\":null,\"avatar\":null,\"birthday\":null,\"gender\":null,\"idCity\":null,\"idDistrict\":null,\"idWard\":null,\"role\":0,\"activeToken\":\"bmd1eWVubmdvY2xhbmgyMDAzNTE2QGdtYWlsLmNvbQ==\",\"created_at\":\"2022-10-20T03:26:05.000000Z\",\"updated_at\":\"2022-10-20T03:26:30.000000Z\",\"active_status\":0,\"dark_mode\":0,\"messenger_color\":\"#2180f3\"}}', NULL, '2022-10-22 04:05:36', '2022-10-22 04:05:36'),
('5264ffd1-6a45-46aa-8b38-e9932e94b18e', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 1, '{\"comment\":{\"content\":\"1234\",\"idUsers\":1,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T10:03:01.000000Z\",\"created_at\":\"2022-10-22T10:03:01.000000Z\",\"id\":66},\"user\":{\"id\":1,\"name\":\"User1\",\"email\":\"lanhnn.21it@vku.udn.vn\",\"phone\":null,\"address\":null,\"avatar\":\"1.avif\",\"birthday\":null,\"gender\":0,\"idCity\":null,\"idDistrict\":null,\"idWard\":null,\"role\":0,\"activeToken\":\"bGFuaG5uLjIxaXRAdmt1LnVkbi52bg==\",\"created_at\":\"2022-10-19T15:56:41.000000Z\",\"updated_at\":\"2022-10-22T08:10:38.000000Z\",\"active_status\":0,\"dark_mode\":1,\"messenger_color\":\"#2196F3\"}}', NULL, '2022-10-22 03:03:01', '2022-10-22 03:03:01'),
('539acb77-dcec-4eed-9c0d-716d54c7dd18', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"?\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T11:54:59.000000Z\",\"created_at\":\"2022-10-22T11:54:59.000000Z\",\"id\":71},\"user\":{\"id\":2,\"email\":\"nguyenngoclanh2003516@gmail.com\",\"password\":\"$2y$10$RROy7F5D3jqNxsujsx1pOuLzlPaQiXYW8DWoFzAjsMn8cUaCxi\\/ly\",\"idUsers\":2,\"remember_token\":\"zISDfKGFSN7KsuIEzZYqq5hf1VjRhtp57tKAvZ1qv7DpB6EVeZ4QfemlTqP3\",\"isActive\":1,\"created_at\":null,\"updated_at\":\"2022-10-21T04:09:51.000000Z\"}}', NULL, '2022-10-22 04:54:59', '2022-10-22 04:54:59'),
('5af19fb8-edc6-4348-bba0-bb5059a35e08', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 1, '{\"comment\":{\"content\":\"m\\u1ec7t\",\"idUsers\":1,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T11:50:41.000000Z\",\"created_at\":\"2022-10-22T11:50:41.000000Z\",\"id\":70},\"user\":{\"id\":1,\"email\":\"lanhnn.21it@vku.udn.vn\",\"password\":\"$2y$10$GZXjw\\/6eG4W7k8X43O0xLuJ.\\/.V824Kjk0dI2.6.u9mIkwAcsN7LG\",\"idUsers\":1,\"remember_token\":\"V8D1MErAmaZfdOQCpeXCSzKCe0hqgVXBIeGO8McRdTHvLiXQ6cnztaMqXLgZ\",\"isActive\":1,\"created_at\":null,\"updated_at\":\"2022-10-19T15:56:47.000000Z\"}}', NULL, '2022-10-22 04:50:42', '2022-10-22 04:50:42'),
('641db8df-1b48-48a5-9c51-d37b9133de01', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"123\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T16:29:06.000000Z\",\"created_at\":\"2022-10-22T16:29:06.000000Z\",\"id\":79}}', NULL, '2022-10-22 09:29:06', '2022-10-22 09:29:06'),
('672cb139-78da-4fa0-85fe-d39cb87ffe50', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"RepliedTime\":\"2022-10-22T16:36:10.962765Z\"}', NULL, '2022-10-22 09:36:10', '2022-10-22 09:36:10'),
('793f1016-2afe-4ebf-9091-a066a5a580a8', 'App\\Notifications\\RepliedToThread', 'App\\Models\\User', 2, '{\"comment\":{\"content\":\"s\\u1ee7a\",\"idUsers\":2,\"isActive\":1,\"idPost\":\"4\",\"updated_at\":\"2022-10-22T12:02:09.000000Z\",\"created_at\":\"2022-10-22T12:02:09.000000Z\",\"id\":72},\"user\":{\"id\":2,\"email\":\"nguyenngoclanh2003516@gmail.com\",\"password\":\"$2y$10$RROy7F5D3jqNxsujsx1pOuLzlPaQiXYW8DWoFzAjsMn8cUaCxi\\/ly\",\"idUsers\":2,\"remember_token\":\"zISDfKGFSN7KsuIEzZYqq5hf1VjRhtp57tKAvZ1qv7DpB6EVeZ4QfemlTqP3\",\"isActive\":1,\"created_at\":null,\"updated_at\":\"2022-10-21T04:09:51.000000Z\"}}', NULL, '2022-10-22 05:02:09', '2022-10-22 05:02:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `numberoflike`
--

CREATE TABLE `numberoflike` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUsers` int(10) UNSIGNED NOT NULL,
  `idComment` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `numberoflike`
--

INSERT INTO `numberoflike` (`id`, `idUsers`, `idComment`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2022-10-19 21:09:46', '2022-10-19 21:09:46'),
(3, 2, 17, '2022-10-20 08:25:36', '2022-10-20 08:25:36'),
(4, 1, 16, '2022-10-20 08:59:39', '2022-10-20 08:59:39'),
(6, 2, 16, '2022-10-20 22:04:28', '2022-10-20 22:04:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `isSolve` tinyint(1) NOT NULL DEFAULT '0',
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `isSolve`, `caption`, `content`, `userID`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 0, 'Nothing', '<p>123</p>', 1, 1, '2022-10-19 20:17:04', '2022-10-19 20:17:04'),
(4, 0, '2', '<p>123</p>', 1, 1, '2022-10-22 00:45:16', '2022-10-22 00:45:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `react`
--

CREATE TABLE `react` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `idUsers` int(10) UNSIGNED NOT NULL,
  `idAuthur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `idCity` int(10) UNSIGNED DEFAULT NULL,
  `idDistrict` int(10) UNSIGNED DEFAULT NULL,
  `idWard` int(10) UNSIGNED DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `activeToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `birthday`, `gender`, `idCity`, `idDistrict`, `idWard`, `role`, `activeToken`, `created_at`, `updated_at`, `active_status`, `dark_mode`, `messenger_color`) VALUES
(1, 'User1', 'lanhnn.21it@vku.udn.vn', NULL, NULL, '1.avif', NULL, 0, NULL, NULL, NULL, 0, 'bGFuaG5uLjIxaXRAdmt1LnVkbi52bg==', '2022-10-19 08:56:41', '2022-10-22 01:10:38', 0, 1, '#2196F3'),
(2, 'User2', 'nguyenngoclanh2003516@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'bmd1eWVubmdvY2xhbmgyMDAzNTE2QGdtYWlsLmNvbQ==', '2022-10-19 20:26:05', '2022-10-19 20:26:30', 0, 0, '#2180f3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_idusers_foreign` (`idUsers`),
  ADD KEY `comment_idpost_foreign` (`idPost`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `imagepost`
--
ALTER TABLE `imagepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagepost_idpost_foreign` (`idPost`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_email_unique` (`email`),
  ADD KEY `login_idusers_foreign` (`idUsers`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `numberoflike`
--
ALTER TABLE `numberoflike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numberoflike_idusers_foreign` (`idUsers`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_userid_foreign` (`userID`);

--
-- Chỉ mục cho bảng `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`id`),
  ADD KEY `react_idusers_foreign` (`idUsers`),
  ADD KEY `react_idauthur_foreign` (`idAuthur`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `imagepost`
--
ALTER TABLE `imagepost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `numberoflike`
--
ALTER TABLE `numberoflike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `react`
--
ALTER TABLE `react`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idpost_foreign` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_idusers_foreign` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `imagepost`
--
ALTER TABLE `imagepost`
  ADD CONSTRAINT `imagepost_idpost_foreign` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`);

--
-- Các ràng buộc cho bảng `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_idusers_foreign` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `numberoflike`
--
ALTER TABLE `numberoflike`
  ADD CONSTRAINT `numberoflike_idusers_foreign` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `react_idauthur_foreign` FOREIGN KEY (`idAuthur`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `react_idusers_foreign` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
