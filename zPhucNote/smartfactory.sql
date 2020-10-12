-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2020 lúc 02:10 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `smartfactory`
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

--
-- Đang đổ dữ liệu cho bảng `course_activity`
--

INSERT INTO `course_activity` (`id`, `course_info_id`, `user_id`, `active_date`, `paid`, `deadline`, `price`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, 1, '2020-06-29 23:59:59', 200000, NULL, '2020-03-29 10:28:53', '2020-03-29 10:28:53'),
(2, 4, 6, NULL, NULL, '2020-07-12 23:59:59', NULL, NULL, '2020-04-11 17:10:34', '2020-04-11 17:10:34');

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
(1, 'PLC', NULL, '2019-10-21 02:41:25', '2019-10-21 02:41:25'),
(2, 'SCADA', NULL, '2020-03-30 03:39:01', '2020-03-30 03:39:01'),
(3, 'abc', NULL, '2020-05-04 08:42:29', '2020-05-04 08:42:29');

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

--
-- Đang đổ dữ liệu cho bảng `course_comment`
--

INSERT INTO `course_comment` (`id`, `course_lesson_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 45, 1, 'baif hoc nay hay ghe', '2020-04-15 08:48:07', '2020-04-15 08:48:07'),
(3, 45, 1, 'chans quas de', '2020-04-15 10:09:38', '2020-04-15 10:09:38'),
(4, 45, 1, 'fadf', '2020-04-15 10:09:45', '2020-04-15 10:09:45'),
(5, 45, 1, 'hihi', '2020-04-15 10:10:46', '2020-04-15 10:10:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_content`
--

CREATE TABLE `course_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_display` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `priority` smallint(6) NOT NULL DEFAULT 500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_content`
--

INSERT INTO `course_content` (`id`, `course_lesson_id`, `user_id`, `type_id`, `title`, `content`, `is_display`, `note`, `created_at`, `updated_at`, `priority`) VALUES
(1, 1, 1, 1, 'Giới thiệu', '<p>PLC&nbsp;viết tắt của&nbsp;Programmable Logic Controller l&agrave;&nbsp;bộ Điều khiển Logic lập tr&igrave;nh được.</p>\r\n\r\n<p>Đối với những mạch điện đơn giản, người ta d&ugrave;ng c&aacute;c thiết bị kh&iacute; cụ điện như CB, Role, Timer để điều khiển.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, đối với những b&agrave;i to&aacute;n phức tạp người ta sử dụng&nbsp;PLC d&ugrave;ng để thay thế c&aacute;c mạch relay (rơ le) trong thực tế.</p>\r\n\r\n<p>Hiện nay c&oacute; nhiều h&atilde;ng sản xuất PLC như Rockwell, Siemens, Mitsu, Omron.</p>\r\n\r\n<p>Trong c&aacute;c b&agrave;i viết n&agrave;y, m&igrave;nh sử dụng PLC của h&atilde;ng Siemens.</p>', 1, NULL, '2020-01-03 16:55:38', '2020-01-03 17:03:15', 500),
(2, 1, 1, 1, 'PLC S7 1200', '<p>Năm 2009, Siemens ra d&ograve;ng sản phẩm S7-1200 d&ugrave;ng để thay thế dần cho S7-200. Nh&igrave;n bề ngo&agrave;i S7 1200 đẹp hơn S7 200, thiết kế nhỏ gọn v&agrave; t&iacute;ch hợp c&aacute;c IO v&agrave;o trong PLC.</p>\r\n\r\n<p>S7 1200 gồm 1 CPU, C&aacute;c đầu v&agrave;o (DI, AI), đầu ra output (DO).</p>\r\n\r\n<p>S7 1200 hỗ trợ truyền th&ocirc;ng: PROFINET, truyền th&ocirc;ng theo chuẩn Ethernet, TCP/IP. Ngo&agrave;i ra S7 1200 c&ograve;n hỗ trợ chuẩn truyền th&ocirc;ng RS 485, RS 232 với c&aacute;c module mở rộng.</p>', 1, NULL, '2020-01-03 17:08:52', '2020-01-03 17:08:52', 500),
(3, 1, 1, 1, 'Nhận biết S7 1200', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/6es7214-1ag40-0xb0.jpg\" style=\"border-style:solid; border-width:0px; float:right; height:300px; width:300px\" />C&oacute; 3 loại CPU S7 1200</p>\r\n\r\n<p>+ DC/DC/DC</p>\r\n\r\n<p>+ DC/DC/Relay</p>\r\n\r\n<p>+ AC/DC/Relay</p>\r\n\r\n<p>Giải th&iacute;ch:</p>\r\n\r\n<ul>\r\n	<li>K&iacute; hiệu đầu ti&ecirc;n: Nguồn cấp DC: 24VDC , AC l&agrave; 220 VAC.</li>\r\n	<li>K&iacute; hiệu thứ hai: T&iacute;n hiệu đầu v&agrave;o&nbsp;DC: 24VDC.</li>\r\n	<li>K&iacute; hiệu thứ ba: T&iacute;n hiệu đầu ra DC: 24VDC, Relay: ng&otilde; ra relay.</li>\r\n</ul>\r\n\r\n<p>Ở b&agrave;i hướng dẫn n&agrave;y m&igrave;nh sử dụng CPU 1214 DC/DC/DC</p>', 1, NULL, '2020-01-05 15:13:42', '2020-01-05 15:14:20', 500),
(4, 26, 1, 1, 'Giới thiệu', '<p>Viết chương tr&igrave;nh cơ bản. Điều khiển ON-OFF một Motor/ Pump.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(2).png\" style=\"height:301px; width:750px\" /></p>\r\n\r\n<p>Khi ấn v&agrave;o n&uacute;t Start th&igrave; Motor hoạt động. Khi ấn v&agrave;o n&uacute;t Stop th&igrave; Motor dừng.</p>\r\n\r\n<p>CPU l&agrave; S7 1500.</p>', 1, NULL, '2020-03-25 03:55:57', '2020-03-25 06:10:33', 500),
(5, 26, 1, 1, 'Khai báo tag', '<p>Ở chương tr&igrave;nh m&igrave;nh sử dụng 3 Tag</p>\r\n\r\n<ul>\r\n	<li>START (Input)</li>\r\n	<li>STOP&nbsp;(Input)</li>\r\n	<li>MOTOR&nbsp;(Output)</li>\r\n</ul>\r\n\r\n<p>Đối với PLC S71500 thật, ch&uacute;ng ta sẽ khai b&aacute;o địa chỉ của Input tag l&agrave; Ix.x.</p>\r\n\r\n<p>Tuy nhi&ecirc;n trong b&agrave;i học n&agrave;y m&igrave;nh sử d&ugrave;ng PLC Sim Advance để m&ocirc; phỏng n&ecirc;n sử dụng biến Mx.x</p>', 1, NULL, '2020-03-25 06:09:47', '2020-03-25 06:09:47', 500),
(6, 26, 1, 1, 'Viết chương trình điều khiển Motor', '<p>Chương tr&igrave;nh được viết bằng ng&ocirc;n ngữ Ladder</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(4).png\" style=\"height:178px; width:534px\" /></p>', 1, NULL, '2020-03-25 06:27:32', '2020-03-26 06:05:56', 500),
(7, 26, 1, 1, 'Cài đặt mô phỏng', '<p>Để m&ocirc; phỏng được bằng chương tr&igrave;nh PLC Sim advance, bạn v&agrave;o Properties &gt;&gt; Protection &gt;&gt; Support simulation during block compilation</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(5).png\" style=\"height:291px; width:798px\" /></p>', 1, NULL, '2020-03-25 06:28:35', '2020-03-26 06:08:29', 500),
(8, 26, 1, 1, 'Hướng dẫn bằng Video của bài học', '<p>Để xem chi tiết hơn c&aacute;c bạn c&oacute; thể tham khảo Video</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/0iqnX76qjMw\" width=\"560\"></iframe></p>', 1, NULL, '2020-03-25 06:29:42', '2020-03-26 06:02:11', 500),
(9, 25, 1, 1, 'Giới thiệu', '<p>Hệ thống điều khiển đơn giản gồm 2 n&uacute;t nhấn. Để điều khiển 1 bơm.</p>\r\n\r\n<p>Trong kh&oacute;a học n&agrave;y bạn sẽ l&agrave;m được:</p>\r\n\r\n<ul>\r\n	<li>Điều khiển Motor bằng n&uacute;t nhấn.</li>\r\n	<li>Điều khiển Motor qua Web server với mạng LAN</li>\r\n	<li>Điều khiển Motor qua Web server với mạng Wifi</li>\r\n	<li>Điều khiển Motor qua Web server với mạng Internet.</li>\r\n</ul>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(3).png\" style=\"height:449px; width:732px\" /></p>', 1, NULL, '2020-03-25 06:42:47', '2020-03-25 06:42:47', 500),
(10, 25, 1, 1, 'Yêu cầu', '<p>C&aacute;c y&ecirc;u cầu cơ bản</p>\r\n\r\n<p><strong>Phần cứng:</strong></p>\r\n\r\n<ul>\r\n	<li>Laptop/ m&aacute;y t&iacute;nh (Win 10 Professional update 1903, RAM 8GB trở l&ecirc;n, HDD 50GB)</li>\r\n	<li>PLC, C&aacute;p mạng&nbsp;(nếu c&oacute;)</li>\r\n</ul>\r\n\r\n<p><strong>Phần mềm:</strong></p>\r\n\r\n<ul>\r\n	<li>TIA Portal v15</li>\r\n	<li>PLC Sim advance 2.0 SP1</li>\r\n</ul>\r\n\r\n<p>(Do m&aacute;y m&igrave;nh c&oacute; d&ugrave;ng những phần mềm n&agrave;y, ngo&agrave;i ra c&aacute;c bạn cũng c&oacute; thể sử dụng&nbsp;bản TIA Portal v16, PLC Sim advance 3.0)</p>\r\n\r\n<p><strong>Kiến thức:</strong></p>\r\n\r\n<ul>\r\n	<li>Biết về điện điều khiển cơ bản.</li>\r\n	<li>Biết về hệ thống số cơ bản (Kiểu dữ liệu, v&ugrave;ng nhớ của S7 1500)</li>\r\n	<li>Biết sử dụng phần mềm TIA Portal, WinCC cơ bản.</li>\r\n	<li>C&oacute; nghe n&oacute;i qua về tự động h&oacute;a.</li>\r\n	<li>Nếu kh&ocirc;ng c&oacute; những điều kiện tr&ecirc;n, kh&ocirc;ng sao cả, quay ra trang chủ v&agrave; đọc những b&agrave;i học S7 1200/S7 1500, n&oacute; cũng dễ &ograve;m &agrave;.</li>\r\n</ul>', 1, NULL, '2020-03-25 06:49:21', '2020-03-25 06:49:21', 500),
(11, 45, 1, 1, 'Mở chương trình PLC Sim Advance 2.0', '<p>Để mở chương tr&igrave;nh PLC Sim advance 2.0 SP1&nbsp;(hoặc 3.0 sau n&agrave;y) bạn bấm v&agrave;o icon tr&ecirc;n m&agrave;n h&igrave;nh.&nbsp;</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(6).png\" style=\"height:155px; width:389px\" /></p>\r\n\r\n<p>Sau khi mở l&ecirc;n chương tr&igrave;nh sẽ c&oacute; giao diện</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(7).png\" style=\"height:489px; width:423px\" /></p>', 1, NULL, '2020-03-29 03:45:55', '2020-03-29 03:45:55', 500),
(12, 45, 1, 1, 'Tạo 1 PLC S7-1500 ảo', '<p>Để tạo 1 PLC ảo S7-1500. C&aacute;c bạn chọn:</p>\r\n\r\n<ol>\r\n	<li>Online Access: PLCSIM Virtual Eth. Adapter</li>\r\n	<li>TCP/IP communication with <s>Local</s>&nbsp;<strong>Ethernet</strong></li>\r\n	<li>Instant Name: T&ecirc;n PLC bạn muốn đặt để dễ ph&acirc;n biệt nếu c&oacute; nhiều PLC</li>\r\n	<li>Địa chỉ IP: Địa chỉ IP của PLC</li>\r\n	<li>Subnet mark: 255.255.255.0 (Thường l&agrave; vậy :D )</li>\r\n	<li>Sau đ&oacute; bấm Start 1</li>\r\n</ol>\r\n\r\n<p>Kết quả l&agrave; 1 PLC ảo đ&atilde; được tạo ra, v&agrave; bạn c&oacute; thể sử dụng như PLC thật.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(9).png\" /></p>\r\n\r\n<p>Ch&uacute; &yacute;:</p>\r\n\r\n<p>Bạn c&oacute; thể tạo nhiều PLC ảo trong PLCSim Advanced 2.0 SP1. Tuy nhi&ecirc;n mỗi PLC ảo n&agrave;y chiếm khoảng 1GB RAM của m&aacute;y t&iacute;nh.</p>', 1, NULL, '2020-03-29 09:49:44', '2020-04-16 07:49:52', 500),
(13, 45, 1, 1, 'Các lỗi thường gặp', '<p>1. Chạy quyền admin khi mở chương tr&igrave;nh M&ocirc; phỏng.</p>\r\n\r\n<p>2. Khi khởi động kh&ocirc;ng đ&uacute;ng card mạng, nhớ set PG/PC Interface cho ph&ugrave; hợp</p>\r\n\r\n<p>3.&nbsp;Tắt pass bảo vệ &ldquo;know-how protection&rdquo;</p>\r\n\r\n<p>Để PLC Sim Advanced 2.0 SP1 c&oacute; thể m&ocirc; phỏng được, bạn nhập password mở kh&oacute;a khối block (nếu c&oacute;) trước khi m&ocirc; phỏng.</p>', 1, NULL, '2020-03-29 09:53:09', '2020-03-29 09:53:09', 500),
(14, 45, 1, 1, 'Video hướng dẫn chi tiết', '<p><a href=\"https://www.youtube.com/watch?v=fWSUXToVH1M\">https://www.youtube.com/watch?v=fWSUXToVH1M</a></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"400\" scrolling=\"no\" src=\"https://www.youtube.com/embed/fWSUXToVH1M\" width=\"700\"></iframe></p>', 1, NULL, '2020-03-29 10:17:14', '2020-03-29 10:21:07', 500),
(15, 46, 1, 1, 'Cài đặt địa chỉ PLC', '<p>Để c&agrave;i đặt địa chỉ PLC bạn Click v&agrave;o biểu tượng PLC</p>\r\n\r\n<p>Device configuration</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(10).png\" style=\"height:324px; width:240px\" /></p>\r\n\r\n<p>Sau đ&oacute; nhấp đ&uacute;p v&agrave;o biểu tượng Ethernet</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(11).png\" style=\"height:326px; width:632px\" /></p>', 1, NULL, '2020-03-31 17:51:20', '2020-03-31 17:51:20', 500),
(16, 46, 1, 1, 'Đặt địa chỉ PLC', '<p>Bạn n&ecirc;n đặt địa chỉ IP của PLC c&ugrave;ng địa chỉ&nbsp;với IP đ&atilde; c&oacute; sẵn.</p>\r\n\r\n<p>Nếu kh&ocirc;ng biết PLC c&oacute; sẵn,&nbsp; bạn c&oacute; thể đặt địa chỉ IP c&ugrave;ng lớp mạng với IP của PLC thật.</p>\r\n\r\n<p>Nếu kh&ocirc;ng biết lớp mạng của&nbsp;địa chỉ PLC c&oacute; sẵn nữa th&igrave; d&ugrave;ng c&ocirc;ng cụ t&igrave;m kiếm địa chỉ.</p>\r\n\r\n<p>Do PLC c&oacute; địa chỉ l&agrave;: 192.168.1.210</p>\r\n\r\n<p>N&ecirc;n m&igrave;nh c&oacute; thể đặt c&ugrave;ng lu&ocirc;n.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(12).png\" style=\"height:242px; width:610px\" /></p>', 1, NULL, '2020-03-31 17:55:41', '2020-03-31 17:55:41', 500),
(17, 46, 1, 1, 'Download chương trình xuống PLC', '<p>Sau khi bạn config xong. Bạn sẽ&nbsp;Download chương tr&igrave;nh xuống PLC để PLC chạy chương tr&igrave;nh.</p>\r\n\r\n<p>Bước 1: Bạn compile trước.</p>\r\n\r\n<p>Bước 2: Bấm v&agrave;o biểu tượng download để download chương tr&igrave;nh PLC</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(13).png\" style=\"height:256px; width:410px\" /></p>', 1, NULL, '2020-03-31 17:58:33', '2020-03-31 17:58:33', 500),
(18, 46, 1, 1, 'Video hướng dẫn chi tiết', '<p>Để tham khảo th&ecirc;m hướng dẫn chi tiết bạn vui l&ograve;ng xem video như b&ecirc;n dưới</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/w2TEQgY5VJ8\" width=\"560\"></iframe></p>', 1, NULL, '2020-03-31 17:59:33', '2020-03-31 17:59:33', 500),
(19, 47, 1, 1, 'Cấu trúc chương trình web', '<p>1 trang web được viết bằng ng&ocirc;n ngữ HTML gồm 2 phần</p>\r\n\r\n<ul>\r\n	<li>Header</li>\r\n	<li>Body</li>\r\n</ul>\r\n\r\n<p>Đối với trang web viết cho PLC cũng tương tự gồm 2 phần&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Khai b&aacute;o biến (trong Header)</li>\r\n	<li>Sử dụng biến để ghi v&agrave; đọc (trong Body)</li>\r\n</ul>\r\n\r\n<p>hihi</p>', 1, NULL, '2020-04-01 05:52:36', '2020-04-16 08:58:34', 500),
(20, 47, 1, 1, 'Chương trình HTML', '<p>Phần code HTML</p>\r\n\r\n<pre>\r\n<code class=\"language-html\">&lt;!DOCTYPE html&gt;\r\n&lt;!-- AWP_In_Variable Name=\'\"START\"\' --&gt;\r\n&lt;!-- AWP_In_Variable Name=\'\"STOP\"\' --&gt;\r\n&lt;!-- AWP_In_Variable Name=\'\"MOTOR\"\' --&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n    &lt;meta charset = \"utf-8\"&gt;\r\n    &lt;title&gt; WebServer S7 1500&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n    &lt;h2 style=\"color: green\"&gt; WEBSERVER S7 1500 - PLC SIM ADVANCE 2.1 &lt;/h2&gt;\r\n    &lt;marquee&gt;0968 460 480&lt;/marquee&gt;\r\n    &lt;!-- Start --&gt;\r\n    &lt;p&gt;\r\n        &lt;form&gt;\r\n            &lt;input type=\"hidden\" name=\'\"START\"\' value =\"0\"&gt;\r\n            &lt;input type=\"submit\" value=\"START = 0\"&gt;\r\n        &lt;/form&gt;\r\n        &lt;form&gt;\r\n            &lt;input type=\"hidden\" name=\'\"START\"\' value =\"1\"&gt;\r\n            &lt;input type=\"submit\" value=\"START = 1\"&gt;\r\n        &lt;/form&gt;\r\n    &lt;/p&gt;\r\n\r\n    &lt;!-- Stop --&gt;\r\n    &lt;p&gt;\r\n        &lt;form&gt;\r\n            &lt;input type=\"hidden\" name=\'\"STOP\"\' value =\"0\"&gt;\r\n            &lt;input type=\"submit\" value=\"STOP = 0\"&gt;\r\n        &lt;/form&gt;\r\n        &lt;form&gt;\r\n            &lt;input type=\"hidden\" name=\'\"STOP\"\' value =\"1\"&gt;\r\n            &lt;input type=\"submit\" value=\"STOP = 1\"&gt;\r\n        &lt;/form&gt;\r\n    &lt;/p&gt;\r\n\r\n\r\n    &lt;h1&gt;Motor &lt;span style=\"color: blue\"&gt;:=\"MOTOR\":&lt;/span&gt;&lt;/h1&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\n\r\n</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 1, NULL, '2020-04-01 05:59:43', '2020-04-03 04:34:29', 500),
(21, 48, 1, 1, 'Active chức năng webserver', '<p>Sau khi bạn đ&atilde; ho&agrave;n th&agrave;nh xong chương tr&igrave;nh web file index.html. Bạn v&agrave;o config để active t&iacute;nh năng webserver.</p>\r\n\r\n<p>Chọn PLC v&agrave; chọn Device configuration.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(14).png\" style=\"height:302px; width:397px\" /></p>\r\n\r\n<p>Trong phần properties &gt;&gt; Web server &gt;&gt; General &gt;&gt; Activate web server on this module.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(15).png\" style=\"height:359px; width:942px\" /></p>', 1, NULL, '2020-04-03 05:40:03', '2020-04-03 05:40:03', 500),
(22, 48, 1, 1, 'Import file HTML vào chương trình PLC', '<p>Để import file HTML v&agrave;o chương tr&igrave;nh PLC.</p>\r\n\r\n<p>Bạn chọn Web server &gt;&gt; User-defined pages</p>\r\n\r\n<ul>\r\n	<li>HTML directory: Bạn chọn đường dẫn đến mục chứa web.</li>\r\n	<li>Default HTML page: Bạn chọn file trang mặc định khi webserver hoạt động.</li>\r\n	<li>Application name: T&ecirc;n ứng dụng (N&ecirc;n đặt kh&ocirc;ng dấu v&agrave; kh&ocirc;ng khoảng c&aacute;ch nh&eacute;)</li>\r\n	<li>Bấm n&uacute;t Generate blocks</li>\r\n</ul>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(16).png\" style=\"height:353px; width:1127px\" /></p>', 1, NULL, '2020-04-03 05:44:16', '2020-04-03 05:44:16', 500),
(23, 48, 1, 1, 'Thêm khối WWW vào chương trình PLC', '<p>B&acirc;y giờ bạn quay lại chương tr&igrave;nh PLC, th&ecirc;m Network 2</p>\r\n\r\n<p>Th&ecirc;m khối WWW v&agrave;o chương tr&igrave;nh</p>\r\n\r\n<p>Note: Rất nhiều bạn thiếu bước n&agrave;y (Kể cả m&igrave;nh khi l&acirc;u l&acirc;u mới l&agrave;m)</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(17).png\" style=\"height:282px; width:999px\" /></p>', 1, NULL, '2020-04-03 05:46:29', '2020-04-03 05:46:29', 500),
(24, 48, 1, 1, 'Video hướng dẫn chi tiết', '<p>Để xem chi tiết hơn c&aacute;c bước bạn c&oacute; thể tham khảo Video</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/AvJ59DU0FlI\" width=\"560\"></iframe></p>', 1, NULL, '2020-04-03 05:48:04', '2020-04-03 05:48:04', 500),
(25, 2, 1, 1, 'Phần mềm TIA v16', '<p>Hiện tại đến thời điểm n&agrave;y, Phần mềm TIA Portal c&oacute; phi&ecirc;n bản mới nhất l&agrave; V16.</p>\r\n\r\n<p>Phần mềm d&ugrave;ng để lập tr&igrave;nh PLC, HMI, SCADA,... cho c&aacute;c sản phẩm của Siemens.</p>\r\n\r\n<p>Ở kh&oacute;a học n&agrave;y, m&igrave;nh cũng d&ugrave;ng phần mềm TIA Portal V16 để lập tr&igrave;nh cho PLC S7-1200.</p>', 1, NULL, '2020-04-08 17:27:25', '2020-04-08 17:38:13', 500),
(26, 2, 1, 1, 'Yêu cầu', '<p>Phần mềm:</p>\r\n\r\n<ul>\r\n	<li>TIA PORTAL V16</li>\r\n	<li>PLC SIM V16 (D&ugrave;ng để m&ocirc; phỏng PLC S7-1200 nếu c&aacute;c bạn kh&ocirc;ng c&oacute; PLC thật)</li>\r\n	<li>Sử dụng hệ điều h&agrave;nh Windows&nbsp;10 (Bản update 1909)</li>\r\n</ul>\r\n\r\n<p>Phần cứng</p>\r\n\r\n<ul>\r\n	<li>PLC S7-1200</li>\r\n	<li>C&aacute;p mạng (C&aacute;p ethernet), Nguồn 220VAC - 24VDC, d&acirc;y điện, v&iacute;t,...</li>\r\n</ul>', 1, NULL, '2020-04-08 17:31:30', '2020-04-08 17:31:30', 500),
(27, 2, 1, 1, 'Tải phần mềm', '<p>Phần mềm TIA V16 cơ bản khoảng 5GB.</p>\r\n\r\n<p>Bạn c&oacute; thể tải tại trang chủ Siemens hoặc Xem c&oacute; ai tải rồi, xin copy cho nhanh.</p>\r\n\r\n<p>H&igrave;nh dưới l&agrave; bản DVD01 m&igrave;nh đ&atilde; tải.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(18).png\" style=\"height:181px; width:739px\" /></p>', 1, NULL, '2020-04-08 17:32:52', '2020-04-08 17:32:52', 500),
(28, 2, 1, 1, 'Trước khi cài', '<p>Bạn nhớ Enable .NET Framework 3.5 như h&igrave;nh dưới nha.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(19).png\" style=\"height:242px; width:273px\" /></p>', 1, NULL, '2020-04-08 17:36:33', '2020-04-08 17:36:33', 500),
(29, 48, 1, 2, 'Bản này demo', '<p>đ&agrave; demo th&ocirc;i</p>', 1, 'ad', '2020-05-06 03:19:32', '2020-05-06 03:19:32', 500),
(30, 7, 1, 3, 'ada', '<p>d&agrave;d</p>', 1, 'ada', '2020-05-12 05:54:16', '2020-05-12 05:54:16', 500),
(31, 47, 1, 3, 'ađa', '<p>dầd</p>', 1, NULL, '2020-05-12 05:55:20', '2020-05-12 05:55:20', 500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_content_type`
--

CREATE TABLE `course_content_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` bigint(20) UNSIGNED DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `priority` bigint(20) UNSIGNED NOT NULL DEFAULT 100,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_content_type`
--

INSERT INTO `course_content_type` (`id`, `user_id`, `name`, `code`, `label`, `is_active`, `priority`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Content', 10, NULL, 1, 100, NULL, '2020-05-04 09:07:53', '2020-05-06 02:21:32'),
(2, 1, 'Demo', 20, 'fad', 1, 100, 'fdada', '2020-05-04 09:08:45', '2020-05-06 02:22:24'),
(3, 1, 'Exercise', 30, NULL, 1, 100, NULL, '2020-05-06 02:22:01', '2020-05-06 02:22:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_count`
--

CREATE TABLE `course_count` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_count`
--

INSERT INTO `course_count` (`id`, `course_lesson_id`, `ip`, `location`, `browser`, `user_id`, `note`, `lon`, `lat`, `state_name`, `state`, `city`, `country`, `iso_code`, `created_at`, `updated_at`) VALUES
(1, 45, '165.225.112.186', 'Viet Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 09:25:36', '2020-04-08 09:25:36'),
(2, 26, '171.253.176.30', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:00:44', '2020-04-08 10:00:44'),
(3, 47, '171.253.176.30', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:01:21', '2020-04-08 10:01:21'),
(4, 26, '171.253.176.30', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:04:22', '2020-04-08 10:04:22'),
(5, 46, '171.253.176.30', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:04:36', '2020-04-08 10:04:36'),
(6, 45, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:56:11', '2020-04-08 10:56:11'),
(7, 47, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:56:23', '2020-04-08 10:56:23'),
(8, 47, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:56:30', '2020-04-08 10:56:30'),
(9, 47, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:56:42', '2020-04-08 10:56:42'),
(10, 25, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:57:07', '2020-04-08 10:57:07'),
(11, 25, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:57:17', '2020-04-08 10:57:17'),
(12, 26, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:57:26', '2020-04-08 10:57:26'),
(13, 46, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:57:40', '2020-04-08 10:57:40'),
(14, 46, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:57:48', '2020-04-08 10:57:48'),
(15, 45, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:58:12', '2020-04-08 10:58:12'),
(16, 25, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:58:18', '2020-04-08 10:58:18'),
(17, 25, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 10:58:23', '2020-04-08 10:58:23'),
(18, 4, '42.113.219.34', 'VN-Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 17:15:14', '2020-04-08 17:15:14'),
(19, 2, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 17:37:09', '2020-04-08 17:37:09'),
(20, 2, '42.113.219.34', 'VN-Vietnam', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 17:39:47', '2020-04-08 17:39:47'),
(21, 46, '::1', 'US-United States', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-09 09:36:12', '2020-04-09 09:36:12'),
(22, 48, '::1', 'US-United States', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-09 09:36:31', '2020-04-09 09:36:31'),
(23, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-10 06:21:20', '2020-04-10 06:21:20'),
(24, 26, '::1', 'US-United States-New Haven', NULL, 6, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:10:50', '2020-04-11 17:10:50'),
(25, 26, '::1', 'US-United States-New Haven', NULL, 6, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:10:57', '2020-04-11 17:10:57'),
(26, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:11:17', '2020-04-11 17:11:17'),
(27, 46, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:11:21', '2020-04-11 17:11:21'),
(28, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:17:36', '2020-04-11 17:17:36'),
(29, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-11 17:19:08', '2020-04-11 17:19:08'),
(30, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:11:13', '2020-04-15 08:11:13'),
(31, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:11:58', '2020-04-15 08:11:58'),
(32, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:13:39', '2020-04-15 08:13:39'),
(33, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:15:28', '2020-04-15 08:15:28'),
(34, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:16:03', '2020-04-15 08:16:03'),
(35, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:16:22', '2020-04-15 08:16:22'),
(36, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:18:01', '2020-04-15 08:18:01'),
(37, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:19:26', '2020-04-15 08:19:26'),
(38, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:20:47', '2020-04-15 08:20:47'),
(39, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:21:18', '2020-04-15 08:21:18'),
(40, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:21:59', '2020-04-15 08:21:59'),
(41, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:36:12', '2020-04-15 08:36:12'),
(42, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:37:22', '2020-04-15 08:37:22'),
(43, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:37:35', '2020-04-15 08:37:35'),
(44, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:43:18', '2020-04-15 08:43:18'),
(45, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:43:42', '2020-04-15 08:43:42'),
(46, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:45:13', '2020-04-15 08:45:13'),
(47, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:45:31', '2020-04-15 08:45:31'),
(48, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:45:50', '2020-04-15 08:45:50'),
(49, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:46:20', '2020-04-15 08:46:20'),
(50, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:46:58', '2020-04-15 08:46:58'),
(51, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:47:17', '2020-04-15 08:47:17'),
(52, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:47:30', '2020-04-15 08:47:30'),
(53, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:48:08', '2020-04-15 08:48:08'),
(54, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:48:27', '2020-04-15 08:48:27'),
(55, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:48:51', '2020-04-15 08:48:51'),
(56, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:49:43', '2020-04-15 08:49:43'),
(57, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:50:17', '2020-04-15 08:50:17'),
(58, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:51:06', '2020-04-15 08:51:06'),
(59, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:52:04', '2020-04-15 08:52:04'),
(60, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:54:35', '2020-04-15 08:54:35'),
(61, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:55:43', '2020-04-15 08:55:43'),
(62, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 08:58:44', '2020-04-15 08:58:44'),
(63, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:01:04', '2020-04-15 09:01:04'),
(64, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:02:05', '2020-04-15 09:02:05'),
(65, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:03:45', '2020-04-15 09:03:45'),
(66, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:04:27', '2020-04-15 09:04:27'),
(67, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:06:38', '2020-04-15 09:06:38'),
(68, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:06:57', '2020-04-15 09:06:57'),
(69, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:08:02', '2020-04-15 09:08:02'),
(70, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:08:50', '2020-04-15 09:08:50'),
(71, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:29:06', '2020-04-15 09:29:06'),
(72, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:45:38', '2020-04-15 09:45:38'),
(73, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:46:49', '2020-04-15 09:46:49'),
(74, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:47:34', '2020-04-15 09:47:34'),
(75, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:50:22', '2020-04-15 09:50:22'),
(76, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:55:40', '2020-04-15 09:55:40'),
(77, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:56:04', '2020-04-15 09:56:04'),
(78, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:56:16', '2020-04-15 09:56:16'),
(79, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:56:39', '2020-04-15 09:56:39'),
(80, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:56:56', '2020-04-15 09:56:56'),
(81, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 09:59:24', '2020-04-15 09:59:24'),
(82, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:00:26', '2020-04-15 10:00:26'),
(83, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:02:02', '2020-04-15 10:02:02'),
(84, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:02:09', '2020-04-15 10:02:09'),
(85, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:08:48', '2020-04-15 10:08:48'),
(86, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:09:27', '2020-04-15 10:09:27'),
(87, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:09:38', '2020-04-15 10:09:38'),
(88, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:09:45', '2020-04-15 10:09:45'),
(89, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:10:31', '2020-04-15 10:10:31'),
(90, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:10:47', '2020-04-15 10:10:47'),
(91, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:11:13', '2020-04-15 10:11:13'),
(92, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:11:13', '2020-04-15 10:11:13'),
(93, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:17:21', '2020-04-15 10:17:21'),
(94, 45, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-15 10:17:38', '2020-04-15 10:17:38'),
(95, 26, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:40:39', '2020-04-16 07:40:39'),
(96, 26, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:45:34', '2020-04-16 07:45:34'),
(97, 26, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:46:07', '2020-04-16 07:46:07'),
(98, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:46:46', '2020-04-16 07:46:46'),
(99, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:48:18', '2020-04-16 07:48:18'),
(100, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:48:42', '2020-04-16 07:48:42'),
(101, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:49:40', '2020-04-16 07:49:40'),
(102, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 07:49:57', '2020-04-16 07:49:57'),
(103, 4, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 08:57:51', '2020-04-16 08:57:51'),
(104, 47, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 08:58:02', '2020-04-16 08:58:02'),
(105, 47, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 08:58:21', '2020-04-16 08:58:21'),
(106, 47, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 08:58:44', '2020-04-16 08:58:44'),
(107, 47, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-16 08:58:57', '2020-04-16 08:58:57'),
(108, 2, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-04-23 08:57:51', '2020-04-23 08:57:51'),
(109, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:19:43', '2020-05-06 03:19:43'),
(110, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:21:25', '2020-05-06 03:21:25'),
(111, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:22:58', '2020-05-06 03:22:58'),
(112, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:25:09', '2020-05-06 03:25:09'),
(113, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:30:58', '2020-05-06 03:30:58'),
(114, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:32:32', '2020-05-06 03:32:32'),
(115, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:33:23', '2020-05-06 03:33:23'),
(116, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:40:11', '2020-05-06 03:40:11'),
(117, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:40:56', '2020-05-06 03:40:56'),
(118, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:49:30', '2020-05-06 03:49:30'),
(119, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:52:03', '2020-05-06 03:52:03'),
(120, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 03:52:07', '2020-05-06 03:52:07'),
(121, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:00:04', '2020-05-06 04:00:04'),
(122, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:22:30', '2020-05-06 04:22:30'),
(123, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:22:45', '2020-05-06 04:22:45'),
(124, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:27:14', '2020-05-06 04:27:14'),
(125, 46, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:27:31', '2020-05-06 04:27:31'),
(126, 46, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:33:46', '2020-05-06 04:33:46'),
(127, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:33:55', '2020-05-06 04:33:55'),
(128, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:34:06', '2020-05-06 04:34:06'),
(129, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 04:38:33', '2020-05-06 04:38:33'),
(130, 48, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-06 05:26:30', '2020-05-06 05:26:30'),
(131, 48, '::1', 'US-United States-New Haven', NULL, NULL, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-07 02:23:44', '2020-05-07 02:23:44'),
(132, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-12 03:02:02', '2020-05-12 03:02:02'),
(133, 45, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-12 04:27:31', '2020-05-12 04:27:31'),
(134, 2, '::1', 'US-United States-New Haven', NULL, 1, NULL, '-72.92', '41.31', NULL, 'CT', 'New Haven', 'United States', 'US', '2020-05-12 04:34:12', '2020-05-12 04:34:12');

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

--
-- Đang đổ dữ liệu cho bảng `course_dislike`
--

INSERT INTO `course_dislike` (`id`, `course_lesson_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 25, 1, NULL, '2020-04-08 10:58:23', '2020-04-08 10:58:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_exercise`
--

CREATE TABLE `course_exercise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `is_display` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `priority` smallint(6) NOT NULL DEFAULT 500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_info`
--

INSERT INTO `course_info` (`id`, `course_category_id`, `name`, `duration`, `price`, `promote_price`, `category_id`, `professor`, `linkpicture`, `is_display`, `note`, `user_id`, `created_at`, `updated_at`, `priority`) VALUES
(1, 1, 'S7 1200 CƠ BẢN', 20, 200000, 200000, NULL, 'Phuc Truong', 's71200_20200325142939.jpg', 1, NULL, 1, '2019-10-21 02:44:02', '2020-03-26 04:31:54', 500),
(2, 1, 'S7 1200 NÂNG CAO', 10, 250000, 170000, NULL, 'Phuc Truong', 'S71200-advance_20200325144421.jpg', 1, NULL, 1, '2019-10-24 13:09:28', '2020-03-25 07:44:21', 500),
(3, 1, 'Webserver S71200', 10, 500000, 250000, NULL, 'Phuc Truong', 's71200webserver_20200325142707.jpg', 1, NULL, 1, '2019-10-24 13:11:05', '2020-03-25 07:27:07', 500),
(4, 1, 'Webserver S71500', 40, 500000, 400000, NULL, 'Phuc Truong', 'S71500-webserver_20200325144114.jpg', 1, NULL, 1, '2020-03-25 03:39:05', '2020-03-25 07:41:14', 500),
(5, 1, 'Modbus', 20, 500000, 400000, NULL, 'Phuc Truong', NULL, 0, NULL, 1, '2020-03-26 04:44:44', '2020-03-30 06:20:21', 500),
(6, 2, 'HMI CƠ BẢN', 2, 200000, 100000, NULL, 'Phuc Truong', NULL, 0, NULL, 1, '2020-03-30 03:40:13', '2020-03-30 06:20:09', 500),
(7, 2, 'WINCC CƠ BẢN', 2, 200000, 100000, NULL, 'Phuc Truong', 'wincc-7.5_20200330104227.jpg', 0, NULL, 1, '2020-03-30 03:40:35', '2020-03-30 06:19:58', 500);

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
  `priority` smallint(6) NOT NULL DEFAULT 500,
  `is_video` tinyint(1) NOT NULL DEFAULT 0,
  `is_member` tinyint(1) NOT NULL DEFAULT 0,
  `is_fee` tinyint(1) NOT NULL DEFAULT 0,
  `is_display` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_lesson`
--

INSERT INTO `course_lesson` (`id`, `name`, `content`, `pdf_link`, `video_link`, `exercise_link`, `course_info_id`, `priority`, `is_video`, `is_member`, `is_fee`, `is_display`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu tổng quan', 'Giới thiệu tổng quan S7 1200', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2019-10-21 03:09:39', '2020-01-03 16:48:22'),
(2, 'Giới thiệu phần mềm', 'Cài đặt phần mềm TIA V16', NULL, NULL, NULL, 1, 500, 1, 0, 0, 1, NULL, 1, '2019-10-24 13:02:03', '2020-04-08 17:39:44'),
(4, 'Viết chương trình PLC', 'Viết chương trình PLC đơn giản', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:51:25', '2020-03-10 16:51:25'),
(5, 'Giới thiệu S7 1200 thực tế', 'Giới thiệu S7 1200 thực tế', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:52:07', '2020-03-10 16:52:07'),
(6, 'Download chương trình xuống PLC S7 1200', 'Download chương trình xuống PLC S7 1200', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:52:58', '2020-03-10 16:52:58'),
(7, 'Lập trình web cơ bản', 'Lập trình web cơ bản cho PLC S7 1200', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:53:26', '2020-03-10 16:53:26'),
(8, 'Tích hợp web vào chương trình PLC', 'Tích hợp web vào chương trình PLC', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:53:52', '2020-03-10 16:53:52'),
(9, 'Chạy chương trình trên trình duyệt web', 'Chạy chương trình trên trình duyệt web', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:56:16', '2020-03-10 16:56:16'),
(10, 'Tìm hiểu HTML', 'Tìm hiểu HTML', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:56:37', '2020-03-10 16:56:37'),
(11, 'Tìm hiểu CSS', 'Tìm hiểu CSS', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:56:48', '2020-03-10 16:56:48'),
(12, 'Tìm hiểu JS', 'Tìm hiểu JS', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:57:01', '2020-03-10 16:57:01'),
(13, 'Tag trong webserver', 'Tag (Biến) trong webserver', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:57:34', '2020-03-10 16:57:34'),
(14, 'Đọc data với phương thức get', 'Đọc data với phương thức get', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:58:04', '2020-03-10 16:58:04'),
(15, 'Đọc data với phương thức post', 'Đọc data với phương thức post', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:58:14', '2020-03-10 16:58:14'),
(16, 'Kỹ thuật AJAX trong xử lí data', 'Kỹ thuật AJAX trong xử lí data', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:58:37', '2020-03-10 16:58:37'),
(17, 'Điều khiển PLC qua Wifi', 'Điều khiển PLC qua Wifi', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:59:02', '2020-03-10 16:59:02'),
(18, 'Điều khiển PLC qua Internet - Giới thiệu', 'Điều khiển PLC qua Internet - Giới thiệu', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:59:40', '2020-03-10 16:59:40'),
(19, 'Điều khiển PLC qua Internet - Tên miền', 'Điều khiển PLC qua Internet - Tên miền', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 16:59:57', '2020-03-10 16:59:57'),
(20, 'Điều khiển PLC qua Internet - Kết nối PLC', 'Điều khiển PLC qua Internet - Kết nối PLC', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 17:00:17', '2020-03-10 17:00:17'),
(21, 'Điều khiển PLC qua Internet - NAT Port', 'Điều khiển PLC qua Internet - NAT Port', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 17:00:35', '2020-03-10 17:00:35'),
(22, 'Điều khiển PLC qua Internet - Thực hiện demo', 'Điều khiển PLC qua Internet - Thực hiện demo', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 17:00:54', '2020-03-10 17:00:54'),
(23, 'Hướng phát triển', 'Hướng phát triển', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 17:01:13', '2020-03-10 17:01:13'),
(24, 'Làm một Project thực tế', 'Làm một Project thực tế', NULL, NULL, NULL, 3, 500, 0, 0, 0, 1, NULL, 1, '2020-03-10 17:01:40', '2020-03-10 17:01:40'),
(25, 'Giới thiệu webserver S7 1500', 'Giới thiệu webserver S7 1500', NULL, NULL, NULL, 4, 500, 0, 0, 0, 1, NULL, 1, '2020-03-25 03:40:21', '2020-03-27 09:42:48'),
(26, 'Viết chương trình PLC', 'Viết chương trình PLC	đầu tiên', NULL, NULL, NULL, 4, 500, 1, 0, 0, 1, NULL, 1, '2020-03-25 03:40:44', '2020-03-27 09:43:06'),
(27, 'Giới thiệu phần cứng', 'Giới thiệu phần cứng S7 1200', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 03:54:57', '2020-03-26 03:54:57'),
(28, 'Chương trình đầu tiên', 'Tạo dự án mới', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 03:56:04', '2020-03-26 03:56:04'),
(29, 'Cấu trúc chương trình PLC', 'Cấu trúc chương trình PLC', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 03:57:58', '2020-03-26 03:57:58'),
(30, 'Kết nối IO device', 'Kết nối, đấu nối IO device', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:01:53', '2020-03-26 04:01:53'),
(31, 'Làm quen với Tag trong PLC S7 1200', 'Làm quen với Tag trong PLC S7 1200, vùng nhớ của PLC', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:03:22', '2020-03-26 04:03:22'),
(32, 'Tổng quan về kiểu dữ liệu trong S7 1200', 'Tổng quan về kiểu dữ liệu trong S7 1200', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:04:19', '2020-03-26 04:04:19'),
(33, 'Các kiểu dữ liệu thường dùng', 'Các kiểu dữ liệu thường dùng (Bit, Số nguyên, Số thực)', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:05:46', '2020-03-26 04:05:46'),
(34, 'Chương trình với Bitlogic', 'Chương trình với Bitlogic', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:06:22', '2020-03-26 04:06:22'),
(35, 'Timer TON', 'Viết chương trình sử dụng Timer TON', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:16:52', '2020-03-26 04:16:52'),
(36, 'Counter', 'Viết chương trình sử dụng Counter', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:17:21', '2020-03-26 04:17:21'),
(37, 'Download chương trình xuống PLC', 'Download chương trình xuống PLC', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:18:45', '2020-03-26 04:18:45'),
(38, 'Hàm toán học', 'Sử dụng các hàm toán học (Cộng, trừ, nhân, chia)', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:21:17', '2020-03-26 04:21:17'),
(39, 'Copy vùng nhớ, dữ liệu', 'Copy vùng nhớ, dữ liệu (MOVE)', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:22:54', '2020-03-26 04:22:54'),
(40, 'Các khối hàm', 'Các khối hàm', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:25:09', '2020-03-26 04:25:09'),
(41, 'Xử lý tín hiệu analog', 'Xử lý tín hiệu analog', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:26:52', '2020-03-26 04:26:52'),
(42, 'Xử lý tín hiệu analog - Output', 'Xử lý tín hiệu analog - Output', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:27:56', '2020-03-26 04:27:56'),
(43, 'Tóm tắt khóa học', 'Tóm tắt khóa học', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:28:56', '2020-03-26 04:28:56'),
(44, 'Hỏi đáp', 'Hỏi đáp', NULL, NULL, NULL, 1, 500, 0, 0, 0, 1, NULL, 1, '2020-03-26 04:29:05', '2020-03-26 04:29:05'),
(45, 'Sử dụng PLC SIM Advanced', 'Sử dụng PLC SIM Advanced 2.0 SP1', NULL, NULL, NULL, 4, 500, 1, 0, 0, 1, NULL, 1, '2020-03-29 03:27:58', '2020-03-29 10:35:32'),
(46, 'Cài đặt địa chỉ PLC và download chương trình', 'Cài đặt địa chỉ PLC và download chương trình xuống PLC', NULL, NULL, NULL, 4, 500, 1, 0, 1, 1, NULL, 1, '2020-03-31 17:46:13', '2020-04-11 17:11:50'),
(47, 'Lập trình web cho PLC', 'Lập trình web cho PLC', NULL, NULL, NULL, 4, 500, 1, 0, 0, 1, NULL, 1, '2020-04-01 05:48:46', '2020-04-01 05:49:03'),
(48, 'Tích hợp web vào PLC', 'Tích hợp web vào PLC', NULL, NULL, NULL, 4, 500, 1, 0, 0, 1, NULL, 1, '2020-04-02 17:33:24', '2020-04-03 05:49:23');

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

--
-- Đang đổ dữ liệu cho bảng `course_like`
--

INSERT INTO `course_like` (`id`, `course_lesson_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 45, 1, NULL, '2020-04-03 09:55:29', '2020-04-03 09:55:29'),
(2, 47, 1, NULL, '2020-04-08 10:56:30', '2020-04-08 10:56:30'),
(3, 26, 6, NULL, '2020-04-11 17:10:56', '2020-04-11 17:10:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpdesk_activity`
--

CREATE TABLE `helpdesk_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `solution` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_display` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `helpdesk_activity`
--

INSERT INTO `helpdesk_activity` (`id`, `ticket_id`, `solution`, `status_id`, `user_id`, `is_display`, `created_at`, `updated_at`) VALUES
(1, 1, 'jịdj', 5, 1, 1, '2020-04-11 17:09:57', '2020-04-11 17:09:57'),
(2, 2, 'daf', 1, 1, 1, '2020-04-20 09:01:01', '2020-04-20 09:01:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpdesk_attach`
--

CREATE TABLE `helpdesk_attach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_display` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpdesk_category`
--

CREATE TABLE `helpdesk_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_display` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `helpdesk_category`
--

INSERT INTO `helpdesk_category` (`id`, `name`, `note`, `is_display`, `created_at`, `updated_at`) VALUES
(1, 'S7-1200', NULL, 1, '2020-04-08 08:44:39', '2020-04-08 08:44:39'),
(2, 'HMI', NULL, 1, '2020-04-08 08:44:50', '2020-04-08 08:44:50'),
(3, 'WINCC', NULL, 1, '2020-04-08 08:44:57', '2020-04-08 08:44:57'),
(4, 'SCADA', NULL, 1, '2020-04-08 08:45:03', '2020-04-08 08:45:03'),
(5, 'Other', NULL, 1, '2020-04-08 08:45:17', '2020-04-08 08:45:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpdesk_status`
--

CREATE TABLE `helpdesk_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `helpdesk_status`
--

INSERT INTO `helpdesk_status` (`id`, `name`, `code`, `label`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Logged', 10, NULL, NULL, '2020-04-08 08:45:59', '2020-04-08 08:45:59'),
(2, 'Active', 20, NULL, NULL, '2020-04-08 08:46:07', '2020-04-08 08:46:07'),
(3, 'Pending', 30, NULL, NULL, '2020-04-08 08:46:15', '2020-04-08 08:46:15'),
(4, 'Delayed', 40, NULL, NULL, '2020-04-08 08:46:25', '2020-04-08 08:46:25'),
(5, 'Completed', 50, NULL, NULL, '2020-04-08 08:46:39', '2020-04-08 08:46:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpdesk_ticket`
--

CREATE TABLE `helpdesk_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL,
  `assign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `helpdesk_ticket`
--

INSERT INTO `helpdesk_ticket` (`id`, `title`, `content`, `priority`, `assign_id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ada', 'đa', 1, 1, 1, 6, '2020-04-11 17:07:15', '2020-04-11 17:09:57'),
(2, 'fd', 'daf', 1, 1, 2, 3, '2020-04-20 09:00:00', '2020-04-20 09:01:01'),
(3, 'da', 'ad', 1, NULL, 2, 1, '2020-04-21 01:27:55', '2020-04-21 01:27:55');

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
(17, '2019_12_17_153430_create_new_soft_table', 2),
(18, '2020_02_20_162011_create_news_table', 3),
(19, '2020_03_25_151033_add_column_into_course_info_table', 4),
(20, '2020_03_30_113505_add_new_column_into_course', 5),
(21, '2020_04_06_124431_add_role_into_user_table', 6),
(22, '2020_04_06_135850_add_user_id_123_into_couser_info_and_course_lesson_table', 6),
(23, '2020_04_07_090854_create_new_helpdesk_table', 7),
(24, '2020_04_08_160821_create_new_tabel_course_count_table', 8),
(26, '2020_04_10_121637_add_column_city_into_course_count_table', 9),
(28, '2020_04_17_091019_add_info_into_user_table', 10),
(30, '2020_04_17_141102_add_info_into_reset_password_table', 11),
(33, '2020_04_20_143059_add_new_column_into_user_table', 12),
(36, '2020_05_04_133952_add_demo_exercise_course_table', 13),
(39, '2020_05_06_093124_add_new_column_into_content_course_table', 14),
(41, '2020_06_06_092934_create_new_warehouse_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_category`
--

CREATE TABLE `news_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `description`, `active`, `note`, `created_at`, `updated_at`) VALUES
(1, 'S7 1200', NULL, 1, NULL, '2020-03-01 07:36:19', '2020-03-01 07:36:19'),
(2, 'S7 1500', NULL, 1, NULL, '2020-03-09 15:19:21', '2020-03-09 15:19:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_content`
--

CREATE TABLE `news_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_content`
--

INSERT INTO `news_content` (`id`, `info_id`, `user_id`, `title`, `content`, `priority`, `note`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Giới thiệu Webserver', '<p>Webserver trong S7 1200 sử dụng TIA v16</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;&nbsp;- L&agrave; một t&iacute;nh năng mới cho ph&eacute;p điều khiển v&agrave; gi&aacute;m hoạt động PLC qua qua một tr&igrave;nh duyệt web.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;- Truy cập th&ocirc;ng qua Standard Page hoặc User Page</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;- Lập tr&igrave;nh web bằng phần mềm, Notpad+, VSCode, Sublime text 3&hellip;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;- Tr&igrave;nh duyệt Coccoc , Chrome,...</p>', 100, NULL, 1, '2020-03-01 07:37:44', '2020-03-01 14:31:22'),
(2, 1, 1, 'Hướng dẫn webserver cơ bản bằng Video', '<p>Hướng dẫn Webserver cơ bản v&agrave; chi tiết&nbsp;được thực hiện tr&ecirc;n phần mềm TIA v16</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=4wnVOT6RPn0\">https</a><a href=\"https://www.youtube.com/watch?v=4wnVOT6RPn0\">://www.youtube.com/watch?v=4wnVOT6RPn0</a></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/4wnVOT6RPn0\" width=\"560\"></iframe></p>', 100, NULL, 1, '2020-03-01 14:52:13', '2020-03-01 15:57:33'),
(3, 2, 1, 'Giới thiệu', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><span style=\"font-size:16px\"><samp><tt><span style=\"font-family:Arial\"><span style=\"color:black\">PLC Sim Advanced 3.0 l&agrave;</span></span> <span style=\"font-family:Arial\"><span style=\"color:black\">chương</span></span> <span style=\"font-family:Arial\"><span style=\"color:black\">tr&igrave;nh</span></span> <span style=\"font-family:Arial\"><span style=\"color:black\">m&ocirc;</span></span> <span style=\"color:black; font-family:Arial\">phỏng PLC S71500 v&agrave;</span>&nbsp;</tt></samp><span style=\"background-color:#eeeeee\"><span style=\"font-family:Arial\"><span style=\"color:black\">ET200SP</span></span></span></span></div>\r\n\r\n<p>C&oacute; thể d&ugrave;ng PLC Sim Advanced 3.0 như một PLC thật.</p>\r\n\r\n<p>C&oacute; thể giao tiếp giữa PLC thật v&agrave; PLC ảo (PLC Sim Advanced 3.0)</p>\r\n\r\n<p>Kết nối mạng thật ảo với PLC Sim Advanced 3.0&nbsp;</p>', 100, NULL, 1, '2020-03-09 15:21:02', '2020-03-30 01:53:21'),
(4, 2, 1, 'Cài đặt', '<p>Để c&agrave;i đặt PLC Sim Advanced 3.0 anh/chị vui l&ograve;ng v&agrave;o trang chủ Siemens<a href=\"https://support.industry.siemens.com/cs/document/109772889/trial-download%3A-simatic-s7-plcsim-advanced-v3-0?dti=0&amp;lc=en-PE\" target=\"_blank\"> tại đ&acirc;y&nbsp;</a>&nbsp;(Dung lượng khoảng 750MB)</p>\r\n\r\n<p>C&aacute;c y&ecirc;u cầu về c&agrave;i đặt:</p>\r\n\r\n<p>Hệ điều h&agrave;nh x64</p>\r\n\r\n<ul>\r\n	<li>Windows 10 Pro Version 1809, 1903</li>\r\n	<li>Windows 7 Professional SP1</li>\r\n	<li>Windows Server 2019 Standard (complete installation)</li>\r\n	<li>N&oacute;i chung c&aacute;c hệ điều h&agrave;nh 64 bit l&agrave; được.</li>\r\n</ul>\r\n\r\n<p>RAM&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Cần 4GB RAM cho chương tr&igrave;nh chạy</li>\r\n	<li>1 GB for each started instance\r\n	<ul>\r\n		<li>Nghĩa l&agrave; mỗi khi bạn tạo 1 PLC ảo, n&oacute; sẽ ngốn 1 GB RAM của bạn.</li>\r\n		<li>Nếu bạn tạo 2 PLC ảo, n&oacute; sẽ ngốn hết 2 GB RAM của bạn.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>HDD/SSD</p>\r\n\r\n<p>Theo t&agrave;i liệu: Cần &iacute;t nhất l&agrave; 5GB bộ nhớ. Thực tế bạn c&oacute; c&agrave;ng nhiều c&agrave;ng tốt :D&nbsp;</p>\r\n\r\n<p><strong>Supported virtualization platforms:</strong></p>\r\n\r\n<ul>\r\n	<li>VMware vSphere Hypervisor (ESXi) 6.7</li>\r\n	<li>VMware Workstation Pro 15.0.2</li>\r\n	<li>VMware Player 15.0.2</li>\r\n</ul>', 100, NULL, 1, '2020-03-09 15:37:17', '2020-03-30 01:52:20'),
(5, 2, 1, 'Hướng dẫn sử dụng.', '<p>Sau khi c&agrave;i đặt xong được kết quả như h&igrave;nh</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image.png\" style=\"height:94px; width:92px\" />&nbsp;</p>\r\n\r\n<p>Để mở chương tr&igrave;nh c&aacute;c bạn chạy bằng quyền admin</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/image(1).png\" style=\"height:714px; width:461px\" /></p>\r\n\r\n<p>Đ&acirc;y l&agrave; giao diện chương tr&igrave;nh PLC Sim Advanced 3.0. N&oacute; c&oacute; địa chỉ 192.168.1.127.</p>\r\n\r\n<p>Sau khi bạn viết chương tr&igrave;nh b&ecirc;n TIA v16 rồi download xuống theo thiết bị n&agrave;y.</p>\r\n\r\n<p>Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng.</p>', 100, NULL, 1, '2020-03-09 15:45:25', '2020-03-30 01:51:42'),
(6, 2, 1, 'Lỗi thường gặp (nếu có)', '<p>C&oacute; những bạn khởi động chương tr&igrave;nh n&oacute; bị lỗi.</p>\r\n\r\n<p>Do bạn chưa c&oacute; license key hoặc thiếu driver.</p>\r\n\r\n<p>Trong trường hợp thiếu driver c&aacute;c bạn vui l&ograve;ng c&agrave;i driver <strong>Winpcap</strong>.</p>\r\n\r\n<p><a href=\"https://www.winpcap.org/default.htm\">https://www.winpcap.org/default.htm</a></p>', 100, NULL, 1, '2020-03-09 15:48:13', '2020-03-09 15:48:13'),
(7, 3, 1, 'Tìm địa chỉ PLC của PLC', '<p>Để t&igrave;m địa chỉ của PLC</p>\r\n\r\n<p>&nbsp;</p>', 100, NULL, 1, '2020-04-04 18:07:28', '2020-04-04 18:07:28'),
(8, 3, 1, 'Hướng dẫn bằng video', '<p>Để xem chi tiết c&aacute;c bạn c&oacute; thể xem video.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"450\" scrolling=\"no\" src=\"https://www.youtube.com/embed/CO1-Xvu9EEk\" width=\"700\"></iframe></p>', 100, NULL, 1, '2020-04-04 18:08:15', '2020-04-04 18:09:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_info`
--

CREATE TABLE `news_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_display` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_info`
--

INSERT INTO `news_info` (`id`, `category_id`, `name`, `description`, `rate`, `user_id`, `is_display`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Webserver trong S7 1200 TIA V16', 'Webserver trong S7 1200 TIA V16', 10, 1, 1, NULL, '2020-03-01 07:36:55', '2020-03-01 07:36:55'),
(2, 2, 'PLC Sim Advanced 3.0', 'Chương trình mô phỏng PLC thực tế bằng PLC Sim Advanced 3.0', 10, 1, 1, NULL, '2020-03-09 15:20:03', '2020-03-30 01:51:18'),
(3, 1, 'Tìm địa chỉ IP của PLC S7-1200', 'Tìm địa chỉ IP của PLC S7-1200 khi không biết địa chỉ IP của PLC', 10, 1, 1, NULL, '2020-04-04 17:59:58', '2020-04-04 17:59:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_rate`
--

CREATE TABLE `news_rate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `updated_at`, `created_at`) VALUES
('phuc.truong@bluescope.com', '$2y$10$rhDvXyWvrFDf2Pl3TewBruyqislLvTZTDF70Oh1cLBj1CrZDLaXq2', '2020-04-17 07:15:07', '2020-04-17 07:15:07'),
('phuc.truong@bluescope.com', '$2y$10$UEcZhH.IVwbxIySyPHkWo.4EAEAL9trLaoEGU6sw4sLgOrDDiSR22', '2020-04-17 07:16:05', '2020-04-17 07:16:05'),
('phuc.truong@bluescope.com', '$2y$10$aBOuuUbrtzTreFZYL8mgUeWqC25t0/K/v.f6gbZnf7dfGktgaXBii', '2020-04-21 01:41:23', '2020-04-21 01:41:23');

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

--
-- Đang đổ dữ liệu cho bảng `product_attach`
--

INSERT INTO `product_attach` (`id`, `product_info_id`, `name`, `link`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'sonoff', 'https://media3.scdn.vn/img3/2019/11_17/K62cgj_simg_d0daf0_800x1200_max.jpg', NULL, '2020-03-06 04:25:39', '2020-03-06 04:25:39');

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
  `active` tinyint(1) NOT NULL DEFAULT 1,
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
(1, 'CÔNG TẮC S ON/OFF', 5, 150000, 100000, 'hihi', 'a', '2019-10-23 16:59:13', '2020-03-10 12:41:56');

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
(1, 'Customer Support', 'Support 24/7', 'fas fa-gem', NULL, '2020-01-01 13:45:11', '2020-03-06 02:52:07'),
(2, 'Programming', 'Programming as customer', 'fas fa-code', NULL, '2020-03-01 16:04:26', '2020-03-06 02:48:09'),
(3, 'Consultant', 'Project & Architecture Consultant', 'fas fa-project-diagram', NULL, '2020-03-06 02:50:18', '2020-03-06 02:50:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_users`
--

CREATE TABLE `social_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_users`
--

INSERT INTO `social_users` (`id`, `name`, `social_id`, `social_name`, `user_id`, `birthday`, `gender`, `picture`, `created_at`, `updated_at`) VALUES
(4, 'Phuc Truong', '5310238700606247607', 'zalo', 33, '1994-01-18', 'male', 'https://s120.avatar.talk.zdn.vn/9/5/c/9/11/120/71dc71fcbea9a874cb1e94572ee33411.jpg', '2020-04-20 14:07:31', '2020-04-20 14:07:31');

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
(2, 1, 1, 'TIA V16', 'TIA V16', 'https://support.industry.siemens.com/cs/document/109772803/simatic-step-7-incl-safety-and-wincc-v16-trial-download?dti=0&lc=en-DE', 'https://support.industry.siemens.com/cs/document/109772803/simatic-step-7-incl-safety-and-wincc-v16-trial-download?dti=0&lc=en-DE', '1', '2019-12-20 03:06:05', '2020-01-02 16:22:35'),
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
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soft_content`
--

INSERT INTO `soft_content` (`id`, `info_id`, `user_id`, `title`, `content`, `priority`, `note`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Giới thiệu', '<h1>Totally Integrated Automation Portal</h1>\r\n\r\n<p>TIA Portal l&agrave; phần mềm d&ugrave;ng để lập tr&igrave;nh c&aacute;c thiết bị của h&atilde;ng Siemens (PLC, HMI,...).</p>\r\n\r\n<p>Hiện nay phi&ecirc;n bản mới nhất l&agrave; TIA v16.</p>\r\n\r\n<p>C&aacute;c phi&ecirc;n bản trước l&agrave;: TIA v15, TIA v14, TIA v13, TIA v11.</p>', 100, NULL, 1, '2019-12-19 03:49:50', '2020-01-02 16:00:31'),
(2, 1, 1, 'Gói cài đặt', '<p>Để sử dụng những&nbsp;chức năng cơ bản. Bạn chỉ cần tải DVD1 Setup l&agrave; đủ.</p>\r\n\r\n<p>Dung lượng khoảng 6GB.&nbsp;</p>\r\n\r\n<p><strong>DVD 1 Setup: bao gồm</strong></p>\r\n\r\n<p><br />\r\nSTEP 7 Basic / Professional</p>\r\n\r\n<p>STEP 7 Safety Basic / Advanced</p>\r\n\r\n<p>WinCC Basic / Comfort / Advanced</p>\r\n\r\n<p>WinCC Unified</p>\r\n\r\n<p><a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.001\"><img src=\"https://support.industry.siemens.com/cs/web-res/css/file.gif\" />&nbsp;<img alt=\"Registrierung notwendig\" src=\"https://support.industry.siemens.com/cs/web-res/css/key.gif\" title=\"Registrierung notwendig\" />&nbsp;&nbsp;</a><a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.001\">DVD_1.001&nbsp;(2,0 GB)</a><br />\r\n<a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.002\"><img src=\"https://support.industry.siemens.com/cs/web-res/css/file.gif\" />&nbsp;<img alt=\"Registrierung notwendig\" src=\"https://support.industry.siemens.com/cs/web-res/css/key.gif\" title=\"Registrierung notwendig\" />&nbsp;&nbsp;</a><a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.002\">DVD_1.002&nbsp;(2,0 GB)</a><br />\r\n<a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.003\"><img src=\"https://support.industry.siemens.com/cs/web-res/css/file.gif\" />&nbsp;<img alt=\"Registrierung notwendig\" src=\"https://support.industry.siemens.com/cs/web-res/css/key.gif\" title=\"Registrierung notwendig\" />&nbsp;&nbsp;</a><a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.003\">DVD_1.003&nbsp;(1,3 GB)</a><br />\r\n<a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.exe\"><img src=\"https://support.industry.siemens.com/cs/web-res/css/file.gif\" />&nbsp;<img alt=\"Registrierung notwendig\" src=\"https://support.industry.siemens.com/cs/web-res/css/key.gif\" title=\"Registrierung notwendig\" />&nbsp;&nbsp;</a><a href=\"https://support.industry.siemens.com/cs/attachments/109772803/TIA_Portal_STEP7_Prof_Safety_WINCC_Adv_Unified_V16.exe\">DVD_1.exe&nbsp;(2,8 MB)</a></p>\r\n\r\n<p>C&aacute;c link n&agrave;y m&igrave;nh lấy từ trang chủ Siemens. Bạn n&ecirc;n đăng k&iacute; t&agrave;i khoản ở trang Siemens Support v&agrave; tải về nha.</p>', 100, NULL, 1, '2019-12-19 03:51:26', '2020-01-02 16:12:41'),
(3, 1, 1, 'Yêu cầu máy tính', '<p><strong>Để phần mềm TIA Portal v16 hoạt động tốt, Phần cứng m&aacute;y t&iacute;nh cũng tốt tốt ch&uacute;t x&iacute;u.</strong></p>\r\n\r\n<p><strong>Cấu h&igrave;nh cơ bản m&aacute;y c&oacute; thể chạy được TIA v16.</strong></p>\r\n\r\n<p><strong>Y&ecirc;u cầu cơ bản:</strong></p>\r\n\r\n<ul style=\"margin-left:40px\">\r\n	<li><span style=\"color:#2c3e50\">CPU: Intel Core i5</span></li>\r\n	<li><span style=\"color:#2c3e50\">RAM: 8GB</span></li>\r\n	<li><span style=\"color:#2c3e50\">HDD: 20GB</span></li>\r\n	<li><span style=\"color:#2c3e50\">Độ ph&acirc;n giải: 1024 x 768</span></li>\r\n</ul>\r\n\r\n<p><strong>Khuyến kh&iacute;ch:</strong></p>\r\n\r\n<ul style=\"margin-left:40px\">\r\n	<li>CPU: Intel Core i7</li>\r\n	<li>RAM: 16GB</li>\r\n	<li>SSD: 120GB</li>\r\n	<li>Độ ph&acirc;n giải: 1920x 1080</li>\r\n</ul>', 100, NULL, 1, '2019-12-20 02:51:12', '2020-01-02 17:01:58');

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
  `is_display` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soft_info`
--

INSERT INTO `soft_info` (`id`, `name`, `description`, `rate`, `user_id`, `is_display`, `note`, `created_at`, `updated_at`) VALUES
(1, 'TIA PORTAL V16', 'TIA PORTAL V16', 10, 1, 1, NULL, '2019-12-19 03:49:26', '2019-12-19 03:49:26'),
(2, 'PLC Sim Advanced', 'PLC Sim Advanced', 10, 1, 1, NULL, '2019-12-19 07:19:48', '2020-03-30 01:50:22'),
(3, 'WINCC 7.5', 'WINCC 7.5', 1, 1, 1, 'a', '2019-12-19 07:21:48', '2020-03-26 01:55:38');

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
  `active` tinyint(1) NOT NULL DEFAULT 1,
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
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_social` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `role`, `confirmation_code`, `avata`, `is_social`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phuc Truong', '0968460480', 'phuchong94@gmail.com', 4, NULL, NULL, 0, '2019-12-17 19:00:00', '$2y$10$tC6Zr/YRemtCfEW.UiDQ/e2dc5s5Plo31SjdorO8Kv8cqkljb.Vrm', NULL, NULL, '2020-05-05 02:04:54'),
(3, 'Phuc 2', '123456', 'phuchong942@gmail.com', 0, NULL, NULL, 0, NULL, '$2y$10$4kyP5t3rEdqMioy1b6W5ieqnxVjHdNaO/pzQ/0qjhMO3f.YahJNEm', NULL, '2019-12-29 18:05:50', '2020-01-01 08:19:32'),
(5, 'Phuc 3', '0986', 'phuchong943@gmail.com', 0, NULL, NULL, 0, NULL, '$2y$10$TxTookz/fBqL96YVekwU8uRNhT8faBmIma/hFGUFoCD556UhSOq7u', NULL, '2019-12-31 09:32:36', '2020-01-01 08:21:23'),
(6, 'Phuc 4', '123456789', 'phuchong944@gmail.com', 1, NULL, NULL, 0, NULL, '$2y$10$3r3V45NgUJw3I.PhZkCOB.yUjXsj8sEXhNDw4NZanGRSi7m/Z0oQO', NULL, '2020-01-01 17:05:46', '2020-04-11 17:04:56'),
(33, 'Phuc Truong', '0', 'zalo@zalo20200420090731', 0, NULL, 'https://s120.avatar.talk.zdn.vn/9/5/c/9/11/120/71dc71fcbea9a874cb1e94572ee33411.jpg', 1, NULL, '$2y$10$.cRiOAIJ7GXgBAuWKvIfTuJOPzDT2uAEI5qHKbpqpXmDQNARxtPoi', NULL, '2020-04-20 14:07:31', '2020-04-20 14:07:31'),
(34, 'phuc bluescope', '34', 'phuc.truong@bluescope.com', 0, NULL, NULL, 0, '2020-04-21 01:40:45', '$2y$10$7zjCWgAlzyzGzJsLQQHVxOxO/L2.KOZtor3/Ce9MXUl75hc/x8YFy', NULL, '2020-04-21 01:39:18', '2020-04-21 01:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_category`
--

CREATE TABLE `wh_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wh_category`
--

INSERT INTO `wh_category` (`id`, `code`, `name`, `description`, `is_active`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 'AB1', 'AB1', 'AB1', 1, 1, NULL, '2020-06-11 08:24:01', '2020-06-16 09:49:33'),
(2, 'BB1', 'BB1', 'BB1', 1, 1, NULL, '2020-06-11 09:10:33', '2020-06-16 09:49:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_customer`
--

CREATE TABLE `wh_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_facility`
--

CREATE TABLE `wh_facility` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wh_facility`
--

INSERT INTO `wh_facility` (`id`, `code`, `name`, `description`, `is_active`, `note`, `created_at`, `updated_at`) VALUES
(1, 'VN2', 'VN2', 'Vietnam 2', 1, NULL, '2020-06-08 08:31:33', '2020-06-10 04:02:28'),
(2, 'VN3', 'VN3', 'VN3', 1, NULL, '2020-06-08 08:35:40', '2020-06-10 05:28:18'),
(3, 'VN1', 'VN1', 'VN1', 1, NULL, '2020-06-09 14:02:43', '2020-06-10 05:28:39'),
(5, 'a', 'a', 'ad', 1, NULL, '2020-06-10 15:09:25', '2020-06-10 15:09:25'),
(6, 'VN6', 'da', 'đa', 1, NULL, '2020-06-10 15:09:30', '2020-06-10 15:29:56'),
(8, 'VN5', 'VBA', '3đa', 1, NULL, '2020-06-10 15:12:09', '2020-06-10 15:29:39'),
(10, 'PHUC', 'PHUC1', 'DADADF', 1, NULL, '2020-06-11 00:59:12', '2020-06-11 00:59:12'),
(11, 'a', 'a', 'a', 1, NULL, '2020-06-11 02:08:02', '2020-06-11 02:08:02'),
(12, 'A', 'A', 'A', 1, NULL, '2020-06-11 02:09:20', '2020-06-11 02:09:20'),
(13, 'B', 'B', 'BAS', 1, NULL, '2020-06-11 02:09:24', '2020-06-11 02:09:24'),
(14, 'DA', 'DAD', 'ADS', 1, NULL, '2020-06-11 02:09:29', '2020-06-11 02:09:29'),
(15, 'ADS', 'ADA', 'ADADAFDA', 1, NULL, '2020-06-11 02:09:34', '2020-06-11 02:09:34'),
(16, 'DADADS', 'ADAS', 'ASADF', 1, NULL, '2020-06-11 02:09:40', '2020-06-11 02:09:40'),
(17, 'ELE', 'ELE', 'Điện động lực', 1, NULL, '2020-06-11 08:16:13', '2020-06-11 08:16:13'),
(18, 'Z', 'Z', 'Z', 1, NULL, '2020-06-11 08:18:54', '2020-06-11 08:18:54'),
(19, 'z', 'z', 'zzz', 1, NULL, '2020-06-11 08:20:04', '2020-06-11 08:20:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_good_issue`
--

CREATE TABLE `wh_good_issue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `good_issue_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `po_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_good_receipt`
--

CREATE TABLE `wh_good_receipt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `good_receipt_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `po_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) UNSIGNED DEFAULT NULL,
  `other_price` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `vat_price` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_item`
--

CREATE TABLE `wh_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wh_item`
--

INSERT INTO `wh_item` (`id`, `category_id`, `code`, `name`, `description`, `unit`, `partnumber`, `color`, `weight`, `rate`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'M001112', 'PLC', 'fada ee', 'Cái', '123F', 'DA', '1VBĐ', NULL, 1, NULL, '2020-06-17 03:53:51', '2020-06-17 05:54:19'),
(2, 1, 'M001113', 'Bạc đạn SKF', 'DFAD 21', NULL, 'SKF 34', NULL, NULL, NULL, 1, NULL, '2020-06-17 03:54:20', '2020-06-17 04:25:23'),
(3, 1, 'M000001', 'Inverter', 'Inverter', 'Cái', 'ES 15331', 'Red', NULL, NULL, 1, NULL, '2020-06-17 08:35:24', '2020-06-17 08:35:24'),
(4, 1, 'M231009', 'Motor', 'DÂDF JKJIDỊKDJKD', NULL, '1SSFFÁ', 'Blue', NULL, NULL, 1, NULL, '2020-06-17 08:35:48', '2020-06-19 09:14:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_project`
--

CREATE TABLE `wh_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_supplier`
--

CREATE TABLE `wh_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_warehouse`
--

CREATE TABLE `wh_warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wh_warehouse`
--

INSERT INTO `wh_warehouse` (`id`, `facility_id`, `code`, `name`, `description`, `address`, `is_active`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'BH1', 'BIEN HOA 1', 'Biên Hòa 11111', 'Số 3, Đường 9A, KCN Biên Hòa 2, Đồng Nai', 1, NULL, '2020-06-11 02:53:47', '2020-06-11 03:05:27'),
(2, 1, 'BH2', 'BIEN HOA 2', 'Bien hoa 2', 'Số 4, đường 9B, KCN Biên Hòa 2, Đồng Nai', 1, NULL, '2020-06-11 02:54:52', '2020-06-11 02:54:52'),
(4, 1, 'DISTRICT 9', 'DISTRICT 9', 'DISTRICT 9', 'daf', 1, NULL, '2020-06-11 03:17:04', '2020-07-07 15:56:51'),
(6, 1, 'DISTRICT 10', 'DISTRICT 10', 'DISTRICT 10', 'Quận 10, HCM, Vietnam', 1, NULL, '2020-06-11 03:17:19', '2020-07-07 15:57:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wh_warehouse_item`
--

CREATE TABLE `wh_warehouse_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `min_stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `max_stock` int(10) UNSIGNED NOT NULL DEFAULT 10000,
  `start_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_alarm` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wh_warehouse_item`
--

INSERT INTO `wh_warehouse_item` (`id`, `warehouse_id`, `item_id`, `user_id`, `min_stock`, `max_stock`, `start_quantity`, `priority`, `note`, `is_active`, `is_alarm`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 50, 67, 100, NULL, 1, 0, '2020-06-17 09:16:06', '2020-06-17 09:16:06'),
(2, 1, 2, 1, 0, 1000, 0, 100, NULL, 1, 0, '2020-06-18 02:01:23', '2020-06-18 02:01:23'),
(3, 1, 3, 1, 0, 1000, 0, 100, NULL, 1, 0, '2020-06-18 02:02:42', '2020-06-18 02:02:42'),
(4, 2, 4, 1, 1, 112, 5, 100, NULL, 1, 0, '2020-06-18 04:30:29', '2020-06-18 04:30:29'),
(5, 4, 2, 1, 0, 1000, 0, 100, NULL, 1, 0, '2020-07-06 08:21:23', '2020-07-06 08:21:23');

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
  ADD KEY `course_content_user_id_foreign` (`user_id`),
  ADD KEY `course_content_type_id_foreign` (`type_id`);

--
-- Chỉ mục cho bảng `course_content_type`
--
ALTER TABLE `course_content_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_content_type_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_count`
--
ALTER TABLE `course_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_count_user_id_foreign` (`user_id`),
  ADD KEY `course_count_course_lesson_id_foreign` (`course_lesson_id`);

--
-- Chỉ mục cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_dislike_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_dislike_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_exercise`
--
ALTER TABLE `course_exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_exercise_user_id_foreign` (`user_id`),
  ADD KEY `course_exercise_course_lesson_id_foreign` (`course_lesson_id`);

--
-- Chỉ mục cho bảng `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_info_course_category_id_foreign` (`course_category_id`),
  ADD KEY `course_info_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_lesson_course_info_id_foreign` (`course_info_id`),
  ADD KEY `course_lesson_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `course_like`
--
ALTER TABLE `course_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_like_course_lesson_id_foreign` (`course_lesson_id`),
  ADD KEY `course_like_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `helpdesk_activity`
--
ALTER TABLE `helpdesk_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpdesk_activity_ticket_id_foreign` (`ticket_id`),
  ADD KEY `helpdesk_activity_status_id_foreign` (`status_id`),
  ADD KEY `helpdesk_activity_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `helpdesk_attach`
--
ALTER TABLE `helpdesk_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpdesk_attach_ticket_id_foreign` (`ticket_id`),
  ADD KEY `helpdesk_attach_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `helpdesk_category`
--
ALTER TABLE `helpdesk_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `helpdesk_status`
--
ALTER TABLE `helpdesk_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `helpdesk_ticket`
--
ALTER TABLE `helpdesk_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpdesk_ticket_category_id_foreign` (`category_id`),
  ADD KEY `helpdesk_ticket_user_id_foreign` (`user_id`),
  ADD KEY `helpdesk_ticket_assign_id_foreign` (`assign_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_content`
--
ALTER TABLE `news_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_content_info_id_foreign` (`info_id`),
  ADD KEY `news_content_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `news_info`
--
ALTER TABLE `news_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_info_category_id_foreign` (`category_id`),
  ADD KEY `news_info_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `news_rate`
--
ALTER TABLE `news_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_rate_content_id_foreign` (`content_id`),
  ADD KEY `news_rate_user_id_foreign` (`user_id`);

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
-- Chỉ mục cho bảng `social_users`
--
ALTER TABLE `social_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_users_user_id_foreign` (`user_id`);

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
-- Chỉ mục cho bảng `wh_category`
--
ALTER TABLE `wh_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_category_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_customer`
--
ALTER TABLE `wh_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_customer_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_facility`
--
ALTER TABLE `wh_facility`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wh_good_issue`
--
ALTER TABLE `wh_good_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_good_issue_item_id_foreign` (`item_id`),
  ADD KEY `wh_good_issue_project_id_foreign` (`project_id`),
  ADD KEY `wh_good_issue_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_good_receipt`
--
ALTER TABLE `wh_good_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_good_receipt_item_id_foreign` (`item_id`),
  ADD KEY `wh_good_receipt_supplier_id_foreign` (`supplier_id`),
  ADD KEY `wh_good_receipt_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_item`
--
ALTER TABLE `wh_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_item_category_id_foreign` (`category_id`),
  ADD KEY `wh_item_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_project`
--
ALTER TABLE `wh_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_project_customer_id_foreign` (`customer_id`),
  ADD KEY `wh_project_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_supplier`
--
ALTER TABLE `wh_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_supplier_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `wh_warehouse`
--
ALTER TABLE `wh_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_warehouse_facility_id_foreign` (`facility_id`);

--
-- Chỉ mục cho bảng `wh_warehouse_item`
--
ALTER TABLE `wh_warehouse_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wh_warehouse_item_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `wh_warehouse_item_item_id_foreign` (`item_id`),
  ADD KEY `wh_warehouse_item_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `course_activity`
--
ALTER TABLE `course_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `course_attach`
--
ALTER TABLE `course_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `course_content_type`
--
ALTER TABLE `course_content_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `course_count`
--
ALTER TABLE `course_count`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `course_exercise`
--
ALTER TABLE `course_exercise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `course_like`
--
ALTER TABLE `course_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `helpdesk_activity`
--
ALTER TABLE `helpdesk_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `helpdesk_attach`
--
ALTER TABLE `helpdesk_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `helpdesk_category`
--
ALTER TABLE `helpdesk_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `helpdesk_status`
--
ALTER TABLE `helpdesk_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `helpdesk_ticket`
--
ALTER TABLE `helpdesk_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `news_content`
--
ALTER TABLE `news_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `news_info`
--
ALTER TABLE `news_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news_rate`
--
ALTER TABLE `news_rate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_attach`
--
ALTER TABLE `product_attach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `social_users`
--
ALTER TABLE `social_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `wh_category`
--
ALTER TABLE `wh_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wh_customer`
--
ALTER TABLE `wh_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wh_facility`
--
ALTER TABLE `wh_facility`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `wh_good_issue`
--
ALTER TABLE `wh_good_issue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wh_good_receipt`
--
ALTER TABLE `wh_good_receipt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wh_item`
--
ALTER TABLE `wh_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wh_project`
--
ALTER TABLE `wh_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wh_supplier`
--
ALTER TABLE `wh_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wh_warehouse`
--
ALTER TABLE `wh_warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wh_warehouse_item`
--
ALTER TABLE `wh_warehouse_item`
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
  ADD CONSTRAINT `course_content_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `course_content_type` (`id`),
  ADD CONSTRAINT `course_content_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_content_type`
--
ALTER TABLE `course_content_type`
  ADD CONSTRAINT `course_content_type_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_count`
--
ALTER TABLE `course_count`
  ADD CONSTRAINT `course_count_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_count_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_dislike`
--
ALTER TABLE `course_dislike`
  ADD CONSTRAINT `course_dislike_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_dislike_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_exercise`
--
ALTER TABLE `course_exercise`
  ADD CONSTRAINT `course_exercise_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_exercise_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_info`
--
ALTER TABLE `course_info`
  ADD CONSTRAINT `course_info_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_category` (`id`),
  ADD CONSTRAINT `course_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_lesson`
--
ALTER TABLE `course_lesson`
  ADD CONSTRAINT `course_lesson_course_info_id_foreign` FOREIGN KEY (`course_info_id`) REFERENCES `course_info` (`id`),
  ADD CONSTRAINT `course_lesson_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `course_like`
--
ALTER TABLE `course_like`
  ADD CONSTRAINT `course_like_course_lesson_id_foreign` FOREIGN KEY (`course_lesson_id`) REFERENCES `course_lesson` (`id`),
  ADD CONSTRAINT `course_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `helpdesk_activity`
--
ALTER TABLE `helpdesk_activity`
  ADD CONSTRAINT `helpdesk_activity_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `helpdesk_status` (`id`),
  ADD CONSTRAINT `helpdesk_activity_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `helpdesk_ticket` (`id`),
  ADD CONSTRAINT `helpdesk_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `helpdesk_attach`
--
ALTER TABLE `helpdesk_attach`
  ADD CONSTRAINT `helpdesk_attach_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `helpdesk_ticket` (`id`),
  ADD CONSTRAINT `helpdesk_attach_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `helpdesk_ticket`
--
ALTER TABLE `helpdesk_ticket`
  ADD CONSTRAINT `helpdesk_ticket_assign_id_foreign` FOREIGN KEY (`assign_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `helpdesk_ticket_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `helpdesk_category` (`id`),
  ADD CONSTRAINT `helpdesk_ticket_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `news_content`
--
ALTER TABLE `news_content`
  ADD CONSTRAINT `news_content_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `news_info` (`id`),
  ADD CONSTRAINT `news_content_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `news_info`
--
ALTER TABLE `news_info`
  ADD CONSTRAINT `news_info_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `news_category` (`id`),
  ADD CONSTRAINT `news_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `news_rate`
--
ALTER TABLE `news_rate`
  ADD CONSTRAINT `news_rate_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `news_content` (`id`),
  ADD CONSTRAINT `news_rate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Các ràng buộc cho bảng `social_users`
--
ALTER TABLE `social_users`
  ADD CONSTRAINT `social_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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

--
-- Các ràng buộc cho bảng `wh_category`
--
ALTER TABLE `wh_category`
  ADD CONSTRAINT `wh_category_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_customer`
--
ALTER TABLE `wh_customer`
  ADD CONSTRAINT `wh_customer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_good_issue`
--
ALTER TABLE `wh_good_issue`
  ADD CONSTRAINT `wh_good_issue_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `wh_warehouse_item` (`id`),
  ADD CONSTRAINT `wh_good_issue_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `wh_project` (`id`),
  ADD CONSTRAINT `wh_good_issue_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_good_receipt`
--
ALTER TABLE `wh_good_receipt`
  ADD CONSTRAINT `wh_good_receipt_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `wh_warehouse_item` (`id`),
  ADD CONSTRAINT `wh_good_receipt_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `wh_supplier` (`id`),
  ADD CONSTRAINT `wh_good_receipt_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_item`
--
ALTER TABLE `wh_item`
  ADD CONSTRAINT `wh_item_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `wh_category` (`id`),
  ADD CONSTRAINT `wh_item_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_project`
--
ALTER TABLE `wh_project`
  ADD CONSTRAINT `wh_project_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `wh_customer` (`id`),
  ADD CONSTRAINT `wh_project_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_supplier`
--
ALTER TABLE `wh_supplier`
  ADD CONSTRAINT `wh_supplier_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wh_warehouse`
--
ALTER TABLE `wh_warehouse`
  ADD CONSTRAINT `wh_warehouse_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `wh_facility` (`id`);

--
-- Các ràng buộc cho bảng `wh_warehouse_item`
--
ALTER TABLE `wh_warehouse_item`
  ADD CONSTRAINT `wh_warehouse_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `wh_item` (`id`),
  ADD CONSTRAINT `wh_warehouse_item_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wh_warehouse_item_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `wh_warehouse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
