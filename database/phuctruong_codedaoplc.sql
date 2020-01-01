-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2020 lúc 05:59 PM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phuctruong_codedaoplc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_activity`
--

CREATE TABLE `course_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `active_date` datetime DEFAULT NULL,
  `paid` int(10) UNSIGNED DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_attach`
--

CREATE TABLE `course_attach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_category`
--

CREATE TABLE `course_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_category`
--

INSERT INTO `course_category` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 'PLC', NULL, '2019-10-21 02:41:25', '2019-10-21 02:41:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_comment`
--

CREATE TABLE `course_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_content`
--

CREATE TABLE `course_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_dislike`
--

CREATE TABLE `course_dislike` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_info`
--

CREATE TABLE `course_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(10) UNSIGNED DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `promote_price` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `professor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkpicture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_info`
--

INSERT INTO `course_info` (`id`, `course_category_id`, `name`, `duration`, `price`, `promote_price`, `category_id`, `professor`, `linkpicture`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'MQTT', 1, 1, 1, NULL, '1', 'Xe dau khong dung vi tri 04 Oct_20191021094402.JPG', '1', '2019-10-21 02:44:02', '2019-10-21 03:09:24'),
(2, 1, 'Webserver', 10, 250000, 170000, NULL, 'Phúc', 'smarthome_20191024200928.jpg', NULL, '2019-10-24 13:09:28', '2019-10-24 13:09:28'),
(3, 1, 'OPC UA', 1, 1, 1, NULL, '1', NULL, NULL, '2019-10-24 13:11:05', '2019-10-24 13:11:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_lesson`
--

CREATE TABLE `course_lesson` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exercise_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_info_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_lesson`
--

INSERT INTO `course_lesson` (`id`, `name`, `content`, `pdf_link`, `video_link`, `exercise_link`, `course_info_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Gioi thieu', 'a', NULL, NULL, NULL, 1, NULL, '2019-10-21 03:09:39', '2019-10-21 03:09:39'),
(2, 'Cài đặt chương trình', 'Cài đặt chương trình', NULL, NULL, NULL, 1, NULL, '2019-10-24 13:02:03', '2019-10-24 13:02:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_like`
--

CREATE TABLE `course_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_02_115401_create_course_table', 1),
(13, '2019_09_24_090834_create_setting_service_table', 1),
(14, '2019_10_14_154421_create_new_product_table', 1),
(17, '2019_12_17_153430_create_new_soft_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attach`
--

CREATE TABLE `product_attach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_info_id`, `title`, `content`, `note`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tính năng', '<p>đẹp</p>\r\n\r\n<p>Nhẹ nh&agrave;ng</p>', NULL, 1, '2019-10-23 16:59:53', '2019-10-23 16:59:53'),
(2, 1, 'Thông số kỹ thuật', '<ol>\r\n	<li>Chống bụi</li>\r\n	<li>Chống nước</li>\r\n	<li>hhihi</li>\r\n</ol>', NULL, 1, '2019-10-25 07:56:17', '2019-10-25 07:56:17'),
(3, 1, 'Hướng dẫn sử dụng', '<p><span style=\"color:#c0392b\">C&aacute;ch sử dụng</span></p>\r\n\r\n<p>Sử dụng b&igrave;nh thường.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/googlelogo_color_272x92dp.png\" style=\"height:92px; width:272px\" /></p>', 'hi', 1, '2019-10-26 17:15:17', '2019-10-26 17:15:17'),
(4, 1, 't1', '<p>ad djakjfi</p>\r\n\r\n<p>dajkfjidjkj dj</p>\r\n\r\n<hr />\r\n<p>fafd</p>', NULL, 1, '2019-10-26 17:16:18', '2019-10-26 17:16:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_info`
--

CREATE TABLE `product_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(10) UNSIGNED DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `promote_price` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `rate`, `price`, `promote_price`, `description`, `note`, `created_at`, `updated_at`) VALUES
(1, 'a', 3, NULL, NULL, 'hihi', 'a', '2019-10-23 16:59:13', '2019-12-18 06:27:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_service`
--

CREATE TABLE `setting_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting_service`
--

INSERT INTO `setting_service` (`id`, `name`, `description`, `icon`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Support', 'Support 24/7', 'fas fa-gem', NULL, '2020-01-01 13:45:11', '2020-01-01 13:52:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soft_attach`
--

CREATE TABLE `soft_attach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_qc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soft_attach`
--

INSERT INTO `soft_attach` (`id`, `info_id`, `user_id`, `name`, `description`, `link`, `link_qc`, `note`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '1', '1', '1', '1', '1', '2019-12-20 03:06:05', '2019-12-20 03:06:05'),
(3, 1, 1, '2', '2', '2', '2', '2', '2019-12-20 03:06:13', '2019-12-20 03:06:13'),
(4, 1, 1, '3', '4', '3', '3', '4', '2019-12-20 03:06:23', '2019-12-20 03:06:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soft_content`
--

CREATE TABLE `soft_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soft_content`
--

INSERT INTO `soft_content` (`id`, `info_id`, `user_id`, `title`, `content`, `priority`, `note`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'gIOIWS THIEU', '<h1>HIHI <span style=\"color:#e74c3c\"><span style=\"font-size:22px\"><span style=\"font-family:Comic Sans MS,cursive\">qfvcv</span></span></span></h1>\r\n\r\n<p>SIMATIC STEP 7, STEP 7 Safety and WinCC V16 TRIAL Download</p>\r\n\r\n<p>TRIAL Download for: SIMATIC STEP 7 (TIA Portal) V16 incl. Safety and PLCSIM V16, as well SIMATIC WinCC (TIA Portal) V16.</p>\r\n\r\n<p>As a registered customer, you can download the trial version for SIMATIC STEP 7 V16 incl. Safety, WinCC V16 und PLCSIM V16 and test it for 21 days.</p>\r\n\r\n<p>New features and changes compared to earlier versions are described in the delivery releases:</p>\r\n\r\n<p>ch&aacute;n muốn chết</p>', 100, 'dg34', 1, '2019-12-19 03:49:50', '2019-12-20 02:55:10'),
(2, 1, 1, 'Chi tiết 1', '<p>SIMATIC STEP 7, STEP 7 Safety and WinCC V16 TRIAL Download</p>\r\n\r\n<p>TRIAL Download for: SIMATIC STEP 7 (TIA Portal) V16 incl. Safety and PLCSIM V16, as well SIMATIC WinCC (TIA Portal) V16.</p>\r\n\r\n<p>As a registered customer, you can download the trial version for SIMATIC STEP 7 V16 incl. Safety, WinCC V16 und PLCSIM V16 and test it for 21 days.</p>\r\n\r\n<p>New features and changes compared to earlier versions are described in the delivery releases:</p>\r\n\r\n<p>&nbsp;</p>', 100, NULL, 1, '2019-12-19 03:51:26', '2019-12-20 02:49:29'),
(3, 1, 1, 'Giới thiệu 2', '<p><strong>Important installation notes:</strong></p>\r\n\r\n<p>The following installation packages are available for V16:</p>\r\n\r\n<blockquote dir=\"ltr\">\r\n<p><strong>STEP 7 Basic/Professional incl. Safety and WinCC Basic/Comfort/Advanced&nbsp;</strong><strong>and WinCC Unified</strong><strong>:</strong></p>\r\n\r\n<blockquote>\r\n<p>This package includes STEP 7 and WinCC with the complete function setup for STEP 7 Professional,WinCC Advanced and WinCC Unified.</p>\r\n\r\n<p>The different editor functionalities are unlocked based on the avialable licences key. This setup can be used for the following products:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Basic</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Professional</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Safety Basic</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Safety Advanced</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Basic</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Comfort</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Advanced</li>\r\n		<li>WinCC Unified</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n</blockquote>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>STEP 7 Basic/Professional and WinCC Professional:</strong></p>\r\n\r\n<blockquote>\r\n<p>This package includes STEP 7 and WinCC with the complete function setup for STEP 7 Professional and WinCC Professional.</p>\r\n\r\n<p>Note: Because of the installations scope of WinCC Professional a Side-by-Side Installation with previous WinCC Professional versions and WinCC V7.x is not supported.</p>\r\n\r\n<p>The different editor functionalities are unlocked based on the avialable licences key. This setup can be used for the following products:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Basic</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Professional</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Safety Basic</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li>STEP 7 Safety Advanced</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Basic</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Comfort</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Advanced</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>WinCC Professional</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n</blockquote>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>', 100, NULL, 1, '2019-12-20 02:51:12', '2019-12-20 02:51:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soft_info`
--

CREATE TABLE `soft_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soft_info`
--

INSERT INTO `soft_info` (`id`, `name`, `description`, `rate`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 'TIA PORTAL V16', 'TIA PORTAL V16', 10, 1, NULL, '2019-12-19 03:49:26', '2019-12-19 03:49:26'),
(2, 'd', 'd', NULL, 1, NULL, '2019-12-19 07:19:48', '2019-12-19 07:19:48'),
(3, 'a', 'a', NULL, 1, 'a', '2019-12-19 07:21:48', '2019-12-19 07:21:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soft_rate`
--

CREATE TABLE `soft_rate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phuc Truong', '0968460480', 'phuchong94@gmail.com', '2019-12-17 19:00:00', '$2y$10$tC6Zr/YRemtCfEW.UiDQ/e2dc5s5Plo31SjdorO8Kv8cqkljb.Vrm', NULL, NULL, '2020-01-01 13:31:18'),
(3, 'Phuc 2', '123456', 'phuchong942@gmail.com', NULL, '$2y$10$4kyP5t3rEdqMioy1b6W5ieqnxVjHdNaO/pzQ/0qjhMO3f.YahJNEm', NULL, '2019-12-29 18:05:50', '2020-01-01 08:19:32'),
(5, 'Phuc 3', '0986', 'phuchong943@gmail.com', NULL, '$2y$10$TxTookz/fBqL96YVekwU8uRNhT8faBmIma/hFGUFoCD556UhSOq7u', NULL, '2019-12-31 09:32:36', '2020-01-01 08:21:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `course_activity`
--
ALTER TABLE `course_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_activity_course_info_id_foreign` (`course_info_id`),
  ADD KEY `course_activity_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_attach`
--
ALTER TABLE `course_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_attach_course_lesson_id_foreign` (`course_lesson_id`);

--
-- Chỉ mục cho bảng `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_comment_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_comment_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_content_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_content_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_dislike_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_dislike_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_info_course_category_id_foreign` (`course_category_id`);

--
-- Chỉ mục cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_lesson_course_info_id_foreign` (`course_info_id`);

--
-- Chỉ mục cho bảng `course_like`
--
ALTER TABLE `course_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_like_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_like_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product_attach`
--
ALTER TABLE `product_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attach_product_info_id_foreign` (`product_info_id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_product_info_id_foreign` (`product_info_id`);

--
-- Chỉ mục cho bảng `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting_service`
--
ALTER TABLE `setting_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `soft_attach`
--
ALTER TABLE `soft_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soft_attach_info_id_foreign` (`info_id`),
  ADD KEY `soft_attach_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `soft_content`
--
ALTER TABLE `soft_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soft_content_info_id_foreign` (`info_id`),
  ADD KEY `soft_content_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `soft_info`
--
ALTER TABLE `soft_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soft_info_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `soft_rate`
--
ALTER TABLE `soft_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soft_rate_content_id_foreign` (`content_id`),
  ADD KEY `soft_rate_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `course_activity`
--
ALTER TABLE `course_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_attach`
--
ALTER TABLE `course_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `course_like`
--
ALTER TABLE `course_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_attach`
--
ALTER TABLE `product_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `setting_service`
--
ALTER TABLE `setting_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `soft_attach`
--
ALTER TABLE `soft_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `soft_content`
--
ALTER TABLE `soft_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `soft_info`
--
ALTER TABLE `soft_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `soft_rate`
--
ALTER TABLE `soft_rate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course_activity`
--
ALTER TABLE `course_activity`
  ADD CONSTRAINT `course_activity_course_info_id_foreign` FOREIGN KEY (`course_info_id`) REFERENCES `course_info` (`id`),
  ADD CONSTRAINT `course_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_attach`
--
ALTER TABLE `course_attach`
  ADD CONSTRAINT `course_attach_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`);

--
-- Các ràng buộc cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  ADD CONSTRAINT `course_comment_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_content_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  ADD CONSTRAINT `course_dislike_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_dislike_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_info`
--
ALTER TABLE `course_info`
  ADD CONSTRAINT `course_info_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_category` (`id`);

--
-- Các ràng buộc cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  ADD CONSTRAINT `course_lesson_course_info_id_foreign` FOREIGN KEY (`course_info_id`) REFERENCES `course_info` (`id`);

--
-- Các ràng buộc cho bảng `course_like`
--
ALTER TABLE `course_like`
  ADD CONSTRAINT `course_like_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_attach`
--
ALTER TABLE `product_attach`
  ADD CONSTRAINT `product_attach_product_info_id_foreign` FOREIGN KEY (`product_info_id`) REFERENCES `product_info` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_info_id_foreign` FOREIGN KEY (`product_info_id`) REFERENCES `product_info` (`id`);

--
-- Các ràng buộc cho bảng `soft_attach`
--
ALTER TABLE `soft_attach`
  ADD CONSTRAINT `soft_attach_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `soft_info` (`id`),
  ADD CONSTRAINT `soft_attach_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `soft_content`
--
ALTER TABLE `soft_content`
  ADD CONSTRAINT `soft_content_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `product_info` (`id`),
  ADD CONSTRAINT `soft_content_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `soft_info`
--
ALTER TABLE `soft_info`
  ADD CONSTRAINT `soft_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `soft_rate`
--
ALTER TABLE `soft_rate`
  ADD CONSTRAINT `soft_rate_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `soft_content` (`id`),
  ADD CONSTRAINT `soft_rate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
