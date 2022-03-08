-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2022 lúc 04:47 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_old` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_update` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `image_banner`, `image`, `time_old`, `time_update`) VALUES
(11, 'Điện thoại IPhone', 'bannercollection_men_ring.jpg', 'family-iphone.webp', '26-05-2021 10:21:45', '2022-03-07 14:44:55'),
(12, 'Phụ kiện Iphone chính hãng', 'AuraBanner-Desktop.jpg', 'banner300x300-03-1.webp', '26-05-2021 10:19:30', '2022-03-07 14:42:25'),
(15, 'iPad', 'Melis.jpg', 'Untitled-1___-removebg-preview-pd6f51mwtt6qe5sps0yj210hvd2ntomimwxxi8gfq8.webp', '26-05-2021 10:19:40', '2022-03-07 14:42:53'),
(16, 'Macbook', 'AuraBanner-Desktop.jpg', 'MacBook_Pro_16-in_Silver_MacBook_Pro_14..webp', '26-05-2021 10:19:55', '2022-03-07 14:43:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_rep` bit(1) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `product`, `id_product`, `username`, `content`, `admin_rep`, `time`) VALUES
(37, 25, 'Đồng hồ nam 14466', 16, 'dung123', 'sản phẩm đẹp quá\r\n', b'1', '2021-06-05 23:48:54'),
(38, 25, 'HURRICANE', 10, 'dung123', 'sản phẩm này đẹp quá\r\n', b'0', '2021-06-10 15:13:34'),
(39, 25, 'HURRICANE', 10, 'dung123', 'tôi đã dùng thử và rất hài lòng\r\n', b'0', '2021-06-10 15:13:54'),
(40, 25, 'PRE-ORDER', 17, 'dung123', 'sản phẩm này oke quá\r\n', b'1', '2021-06-13 23:49:08'),
(42, 25, 'Đồng hồ nam 14466', 16, 'dung123', 'tôi rất hài lòng về sản phẩm này', b'0', '2021-06-19 09:55:58'),
(43, 33, 'HURRICANE', 10, 'dung369', 'tôi rất hài lòng về sản phẩm này', b'0', '2021-06-24 13:20:16'),
(44, 34, 'PRE-ORDER', 17, 'maimai', 'tôi rất hài lòng về sản phẩm này', b'1', '2021-06-24 14:58:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonggia` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `updatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_user`, `name`, `email`, `phone`, `address`, `ghichu`, `tonggia`, `time`, `updatetime`) VALUES
(15, 29, 'hoàng anh', 'hustlehard25032000@gmail.com', 55, '5', 'sa', 53400000, '2021-06-10 23:11:20', '2021-06-10 23:11:20'),
(16, 24, 'Dũng admin', 'truongmanhdung04@gmail.com', 365727226, 'Ngõ 80 Xuân Phương', '<br>', 48000000, '2021-06-24 13:04:42', '2021-06-24 13:04:42'),
(17, 34, 'maimai', 'maimai@1', 4554, 'sâs', 'asasa', 49500000, '2021-06-24 15:02:09', '2021-06-24 15:02:09'),
(18, 35, 'dungtsdadsa', 'dung@123', 972571117, 'tiên phong', '<br>', 59900000, '2022-03-07 14:45:57', '2022-03-07 14:45:57'),
(19, 35, 'dungtsdadsa', 'dung@123', 972571117, 'tiên phong', '<br>', 119800000, '2022-03-08 21:16:55', '2022-03-08 21:16:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `time_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `soluong`, `gia`, `time`, `time_update`) VALUES
(15, 15, 16, 3, 1800000, '2021-06-10 23:11:20', '2021-06-10 23:11:20'),
(16, 15, 17, 3, 16000000, '2021-06-10 23:11:20', '2021-06-10 23:11:20'),
(17, 16, 17, 3, 16000000, '2021-06-24 13:04:42', '2021-06-24 13:04:42'),
(18, 17, 10, 3, 15300000, '2021-06-24 15:02:09', '2021-06-24 15:02:09'),
(19, 17, 16, 2, 1800000, '2021-06-24 15:02:09', '2021-06-24 15:02:09'),
(20, 18, 10, 2, 29950000, '2022-03-07 14:45:57', '2022-03-07 14:45:57'),
(21, 19, 10, 4, 29950000, '2022-03-08 21:16:55', '2022-03-08 21:16:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_trademark` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_trademark` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_old` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_update` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `name_product`, `product_detail`, `product_category`, `product_trademark`, `id_trademark`, `product_price`, `view`, `image`, `time_old`, `time_update`) VALUES
(10, 11, 'iPhone 13 Pro Max', 'Điện thoại iphone chính hãng', 'Điện thoại IPhone', 'WEIMAR', 1, 29950000, 43, 'iphone-13-pro-max-silver-select-254x300.webp', '27-05-2021 08:14:30', '2022-03-07 10:35:29'),
(16, 11, 'iPhone 13 Pro', 'JACKSON - 40MM', 'Điện thoại IPhone', 'WEIMAR', 1, 26750000, 42, 'iphone-13-pro-blue-select-254x300.webp', '27-05-2021 20:58:03', '2022-03-07 10:37:43'),
(17, 11, 'iPhone 13', 'Futura - 40mm', 'Điện thoại IPhone', 'WEIMAR', 1, 21490000, 35, 'iphone-13-product-red-select-2021-254x300.webp', '27-05-2021 22:44:38', '2022-03-07 10:38:21'),
(18, 11, 'iPhone 13 mini', 'Futura - 40mm', 'Điện thoại IPhone', 'WEIMAR', 1, 18350000, 16, 'iphone-13-mini-pink-select-2021-254x300.webp', '27-05-2021 22:45:56', '2022-03-07 10:38:50'),
(19, 11, 'iPhone 12', 'Futura - 40mm', 'Điện thoại IPhone', 'WEIMAR', 1, 18190000, 5, 'iphone-12-green-select-2020-254x300.webp', '27-05-2021 22:47:09', '2022-03-07 10:39:18'),
(20, 11, 'iPhone 12 mini', 'Futura - 40mm', 'Điện thoại IPhone', 'WEIMAR', 1, 14950000, 9, 'iphone-12-mini-purple-select-2021-254x300.webp', '27-05-2021 22:48:01', '2022-03-07 10:39:53'),
(21, 11, 'iPhone 11', 'Detroit - 40mm', 'Điện thoại IPhone', 'WEIMAR', 1, 13390000, 7, 'ip-11-resize-254x300.webp', '27-05-2021 22:49:02', '2022-03-07 10:40:19'),
(22, 15, 'iPad gen 9 (2021)', 'Detroit - 40mm', 'iPad', 'WEIMAR', 1, 9650000, 6, 'ipad-gen-9-copy.webp', '27-05-2021 22:51:06', '2022-03-07 10:41:19'),
(23, 15, 'iPad mini 6 (2021)', 'JACKSON - 40MM', 'iPad', 'WEIMAR', 1, 13450000, 1, 'ipad-mini-6.webp', '27-05-2021 22:52:31', '2022-03-07 10:42:19'),
(24, 15, 'iPad Pro 11 inch (M1, 2021)', 'Weimar - 40mm', 'iPad', 'WEIMAR', 1, 19850000, 0, 'ipad-11inch-M1.png', '27-05-2021 22:53:38', '2022-03-07 10:43:10'),
(25, 15, 'iPad Pro 12.9 inch (M1, 2021)', 'Colosseum - 42mm', 'iPad', 'WEIMAR', 1, 26290000, 5, 'ipad-12inch-M1.webp', '27-05-2021 22:54:26', '2022-03-07 10:43:50'),
(26, 12, 'Củ sạc Apple iPhone 5W', 'Mykonos - 32mm', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 399000, 4, 'cu-sac-iphone-zin-boc-may-min.webp', '27-05-2021 22:55:14', '2022-03-07 10:55:22'),
(27, 15, 'iPad Air 4', 'Mykonos - 32mm', 'iPad', 'WEIMAR', 1, 15250000, 0, 'ipad-air-4-254x300.webp', '27-05-2021 22:55:57', '2022-03-07 10:44:31'),
(28, 15, 'iPad Pro 2020', 'Colosseum - 42mm', 'iPad', 'WEIMAR', 1, 1630000, 0, 'ipad-pro-2020-12inch-254x300.png', '27-05-2021 22:56:50', '2022-03-07 10:45:10'),
(29, 12, 'Cáp USB-C to Lightning Cable 1m', 'Florenge - 34mm', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 590000, 5, 'cáp-111.webp', '27-05-2021 23:10:58', '2022-03-07 10:55:50'),
(30, 12, 'Cáp USB-C Charge Cable 2m', 'Hamilton - 32mm', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 2299000, 1, 'sac00.webp', '27-05-2021 23:11:44', '2022-03-07 10:56:14'),
(49, 16, 'MacBook Pro 16 M1 Max', 'Kashmir - 40mm', 'Macbook', 'WEIMAR', 1, 89950000, 0, 'MacBook_Pro_16-in_Space_Gray-400x400.webp', '02-06-2021 21:03:53', '2022-03-07 10:45:56'),
(50, 16, 'MacBook Pro 16 M1 Pro', 'Kashmir - 40mm', 'Macbook', 'WEIMAR', 1, 62750000, 3, 'MacBook_Pro_16-in_Silver-400x400.webp', '02-06-2021 21:05:02', '2022-03-07 10:46:35'),
(51, 16, 'MacBook Pro 14 M1 Max', 'Kashmir - 40mm', 'Macbook', 'WEIMAR', 1, 76750000, 1, 'MacBook_Pro_16-in_Space_Gray-400x400.webp', '02-06-2021 21:07:13', '2022-03-07 10:47:13'),
(52, 16, 'MacBook Pro 14 M1 Pro', 'Kashmir - 40mm', 'Macbook', 'WEIMAR', 1, 49950000, 0, 'MacBook_Pro_14-in_Silver-400x400.webp', '02-06-2021 21:07:52', '2022-03-07 10:47:52'),
(54, 16, 'iMac M1 2021 24 inch', 'Kashmir - 40mm', 'Macbook', 'WEIMAR', 1, 31450000, 1, 'iMac-M1-2021-1-400x400.webp', '02-06-2021 21:10:16', '2022-03-07 10:49:31'),
(55, 16, 'iMac 2020', 'Weimar - 40mm', 'Macbook', 'WEIMAR', 1, 24550000, 2, 'iMac-2020-400x400.webp', '02-06-2021 21:11:34', '2022-03-07 10:50:01'),
(56, 16, 'MacBook Air M1 2020', 'Weimar - 40mm', 'Macbook', 'WEIMAR', 1, 23990000, 1, 'MacBook-Air-M1-400x400.webp', '02-06-2021 21:12:13', '2022-03-07 10:50:34'),
(57, 16, 'MacBook Pro M1 2020', 'Weimar - 40mm', 'Macbook', 'WEIMAR', 1, 31290000, 1, 'MacBook-Pro-M1.webp', '02-06-2021 21:14:48', '2022-03-07 10:51:10'),
(58, 16, 'Mac mini M1', 'Weimar - 40mm', 'Macbook', 'WEIMAR', 1, 17450000, 0, 'Mac-Mini-M1-400x400.webp', '02-06-2021 21:15:26', '2022-03-07 10:51:39'),
(59, 12, 'Ví da iPhone Leather Wallet with MagSafe', '', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 1480000, 0, 'MHLP3.webp', '02-06-2021 21:16:09', '2022-03-07 10:52:19'),
(60, 12, 'Ví da iPhone Leather Wallet with MagSafe', 'Colosseum - 42mm', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 1550000, 0, 'MHLQ3-600x600-1.webp', '02-06-2021 21:19:02', '2022-03-07 10:52:49'),
(61, 12, 'Sạc Magsafe charger', 'Colosseum - 42mm', 'Phụ kiện Iphone chính hãng', 'WEIMAR', 1, 1590000, 0, 'MHXH3_AV4_GEO_US.webp', '02-06-2021 21:19:46', '2022-03-07 10:53:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id_product` int(11) NOT NULL,
  `id_product_detail` int(11) NOT NULL,
  `name_product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichthuocmat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maumat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaimay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichcoday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatlieuday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_old` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_update` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id_product`, `id_product_detail`, `name_product`, `detail`, `kichthuocmat`, `doday`, `maumat`, `loaimay`, `kichcoday`, `matkinh`, `chatlieuday`, `time_old`, `time_update`) VALUES
(10, 13, 'HURRICANE', 'Lấy cảm hứng từ vẻ đẹp thiên nhiên hoang sơ được ví như \"nàng tiên bước ra từ thần thoại\", Melissani mang đầy đủ những nét đẹp của chiếc đồng hồ đáng mơ ước cho phái nữ: cá tính, quyến rũ và đầy bí ẩn. Đường kính 32mm, dễ dàng kết hợp cùng dây da và dây kim loại, phù hợp với mọi phong cách thời trang bạn yêu thích.', '32MM', '7MM', 'PINK', 'MIYOTA QUARTZ', '14MM', '3ATM', 'DÂY KIM LOẠI', '27-05-2021 09:10:40', '27-05-2021 09:10:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `repcomment`
--

CREATE TABLE `repcomment` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `repcomment`
--

INSERT INTO `repcomment` (`id`, `id_comment`, `id_user`, `comment`, `time`, `user_name`) VALUES
(37, 37, 24, 'cảm ơn bạn nhé!!!', '2021-06-10 14:40:04', 'dung0401'),
(38, 38, 29, 'sản phẩm oke không bạn', '2021-06-10 15:14:58', 'hoàng anh'),
(39, 40, 24, 'cảm ơn bạn nhé!!!', '2021-06-13 23:51:31', 'dung0401'),
(40, 42, 25, 'oke', '2021-06-19 09:56:16', 'dung123'),
(41, 39, 33, 'bạn dùng sản phẩm bao lâu rồi', '2021-06-24 13:20:08', 'dung369'),
(42, 40, 34, 'oke', '2021-06-24 14:58:56', 'maimai'),
(43, 44, 24, 'cảm ơn bạn nhé!!!', '2021-06-24 15:01:10', 'Dũng admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `h5_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `h3_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `logo`, `h5_banner`, `h3_banner`, `slogan`, `address`, `note`, `time`) VALUES
(6, 'logo-iphone (1).jpg', 'SUMMER SALE', 'MUA 1 ĐIỆN THOẠI TẶNG 1 VÒNG TAY', 'Chương trình kéo dài từ 19/5 - 23/5', '© 2019 - Bản quyền của CTCP PHÁT TRIỂN SẢN PHẨM SÁNG TẠO VIỆT', 'Giấy chứng nhận ĐKKD số 0108150321 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 29/01/2018 123C Thụy Khuê, Tây Hồ, Hà Nội', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `link`, `time`) VALUES
(2, '233be77758a6373022bcda83dabbf31d.jfif', 'category.php?id=11', '2022-03-07 14:29:28'),
(5, 'Banner-PC.jpeg', 'category.php?id=11', '2022-03-07 11:31:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademark`
--

CREATE TABLE `trademark` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trademark`
--

INSERT INTO `trademark` (`id`, `name`, `description`, `id_category`, `name_category`, `image`, `time`) VALUES
(1, 'WEIMAR', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Là thành phố được biết đến như cái nôi của nghệ thuật Bauhaus đỉnh cao, Weimar đại diện cho những giá trị khởi nguồn đầy cảm hứng. Với thiết kế theo hơi hướng cổ điển nhưng không hề rườm rà, đồng hồ Weimar chính là điểm nhấn trên cổ tay của các tín đồ yêu sự tối giản.</span>', 11, 'Đồng Hồ Nam', 'Weimar.jpg', '02-06-2021 08:41:28'),
(2, 'COLOSSEUM', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Lấy cảm hứng từ Đấu trường La Mã lịch sử, Colosseum ra đời đại diện cho sự mãnh mẽ, phiêu lưu và lòng quyết tâm chinh phục mọi khao khát của một người đàn ông trưởng thành. Thiết kế mặt 42mm hiện đại, vững chắc cùng 2 sub-dial độc đáo sẽ khiến bạn trở nên nổi bật và cá tính hơn bao giờ hết.</span><br>', 11, 'Đồng Hồ Nam', 'Colosseum.jpg', '02-06-2021 08:46:54'),
(3, 'MYKONOS', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Dòng đồng hồ mặt chữ nhật đầu tiên cho nam của Curnon ra đời với tiếng nói góc cạnh, dám dấn thân và khác biệt.</span>', 11, 'Đồng Hồ Nam', 'Mykonos.jpg', '02-06-2021 08:48:52'),
(4, 'MELISSANI', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Lấy cảm hứng từ vẻ đẹp thiên nhiên hoang sơ được ví như \"nàng tiên bước ra từ thần thoại\", Melissani mang đầy đủ những nét đẹp của chiếc đồng hồ đáng mơ ước cho phái nữ: cá tính, quyến rũ và đầy bí ẩn. Đường kính 32mm, dễ dàng kết hợp cùng dây da và dây kim loại, phù hợp với mọi phong cách thời trang bạn yêu thích.</span><br>', 12, 'Đồng Hồ Nữ', 'Melis.jpg', '02-06-2021 08:56:45'),
(5, 'KASHMIR', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Là dòng đồng hồ đầu tiên của Curnon, Kashmir định hình một triết lí thiết kế tối giản, hiện đại và đại diện cho sự tự tin. Thời trang, kiến tạo và khát khao tuổi trẻ chính là tuyên ngôn bạn sẽ mang theo bên mình cùng với Kashmir.</span><br>', 11, 'Đồng Hồ Nam', 'Kashmir.jpg', '02-06-2021 08:26:07'),
(6, 'JACKSON', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Unbreakable Watches for Unbreakable Men - Dòng Đồng hồ Lặn đầu tiên đến từ một thương hiệu Việt. Thiết kế mạnh mẽ, chống chịu mọi áp lực.</span><br>', 11, 'Đồng Hồ Nam', 'Collection-Jackson-Desktop.jpg', '02-06-2021 08:50:59'),
(7, 'DETROIT', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Lấy cảm hứng từ chất đường phố bụi bặm, Detroit với thiết kế mạnh mẽ, nguyên bản sẽ giúp bạn thể hiện cá tính \"không pha trộn\" và nổi bật của riêng mình</span><br>', 11, 'Đồng Hồ Nam', 'Banner-collection-detroit-desktop.jpg', '02-06-2021 08:52:27'),
(8, 'FUTURA', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Futura là dòng đồng hồ Chronograph đầu tiên của Curnon, sở hữu tính năng bấm giờ mang đến sự chính xác tuyệt đối. Thiết kế hiện đại, thể thao đại diện cho sự mạnh mẽ của người đàn ông luôn sẵn sàng tiến về phía trước và nắm bắt mọi cơ hội.</span><br>', 11, 'Đồng Hồ Nam', 'Banner-collection-futura-desktop.jpg', '02-06-2021 08:53:35'),
(9, 'MORAINE', '<span style=\"color: rgb(34, 34, 34); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">Là dòng đồng hồ 28mm đầu tiên của Curnon, Moraine dành cho những cô gái có cổ tay nhỏ và yêu thích sự tối giản theo triết lí \"Less is more\". Các tông màu trung tính hay vàng hồng sang trọng luôn phù hợp để bạn tỏa sáng trong mọi dịp.</span><br>', 12, 'Đồng Hồ Nữ', 'Moraine_4.jpg', '02-06-2021 08:55:11'),
(10, 'BEVERLY', '<span style=\"color: rgb(0, 0, 0); font-family: Montserrat, -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px; letter-spacing: 0.28px; background-color: rgb(255, 255, 255);\">Cảm giác bước đi trên ngọn đồi Beverly Hills sang trọng bậc nhất Hollywood sẽ thế nào? Đó chính là sự mềm mại, thanh lịch được truyền tải qua thiết kế tối giản với điểm nhấn là hình ảnh chiếc lá của Beverly.</span><br>', 12, 'Đồng Hồ Nữ', 'Beverly_2.jpg', '02-06-2021 08:58:15'),
(11, 'HAMILTON', '<span style=\"color: rgb(0, 0, 0); font-family: Montserrat, -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px; letter-spacing: 0.28px; background-color: rgb(255, 255, 255);\">Là hòn đảo thơ mộng ở nước Úc xa xôi, Hamilton đại diện cho sự vui vẻ và tinh thần tràn đầy năng lượng của những cô gái hiện đại. Hơn thế nữa, đây chính là dòng sản phẩm đầu tiên dành cho nữ có mặt kính vòm giúp bạn thêm phần cuốn hút và thanh lịch.</span><br>', 12, 'Đồng Hồ Nữ', 'hamil.jpg', '02-06-2021 08:59:17'),
(12, 'SANTORINI', '<span style=\"color: rgb(0, 0, 0); font-family: Montserrat, -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px; letter-spacing: 0.28px; background-color: rgb(255, 255, 255);\">Là dòng đồng hồ mặt chữ nhật đầu tiên của Curnon dành cho nữ, Santorini mang đến tiếng nói góc cạnh, khác biệt và đầy cá tính cho những cô gái hiện đại.</span><br>', 12, 'Đồng Hồ Nữ', 'Santo_-_Size_1920x450_1_1.jpg', '02-06-2021 09:00:04'),
(13, 'FLORENGE', '<span style=\"color: rgb(0, 0, 0); font-family: Montserrat, -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px; letter-spacing: 0.28px; background-color: rgb(255, 255, 255);\">BST Florenge cùng 5 phối màu mang đậm dấu ấn hài hoà giữa cổ điển và hiện đại trong từng chi tiết với mặt đồng hồ được chạm khắc vân Guilloche - biểu tượng của nghệ thuật chế tác, sẽ là 5 bông hoa luôn nở rộ nhắc bạn rằng không cần phải đợi tới những cột mốc quan trọng để xinh đẹp và toả sáng.</span><br>', 12, 'Đồng Hồ Nữ', 'Florenge-desktop.jpg', '02-06-2021 09:01:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` bit(1) NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_update` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `address`, `password`, `image`, `admin`, `time`, `time_update`) VALUES
(24, 'Dũng admin', 'truongmanhdung04@gmail.com', 55752445, 'Ngõ 80 Xuân Phương', '4a8d301df768757aaf279f11fc15ef3f', 'TIMY0581 (1).jpg', b'1', '28-05-2021 11:42:24', '2021-06-24 13:09:02'),
(25, 'dung123', 'dung@0401', 365727226, 'Ngõ 80 Xuân Phương', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'TIMY0581 (1).jpg', b'1', '28-05-2021 11:47:49', '2021-06-19 09:58:20'),
(26, 'dung789', 'dung@789', 0, '', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'user.jpg\r\n', b'0', '28-05-2021 13:00:17', ''),
(27, 'dung1234', 'dung@1234', 365727226, '', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'user.jpg', b'0', '30-05-2021 13:39:27', '30-05-2021 14:09:07'),
(28, 'mạnh dũng 2000', 'dung@123456', 0, '', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'user.jpg', b'0', '02-06-2021 23:01:37', ''),
(29, 'hoàng anh', 'hustlehard25032000@gmail.com', 0, '', '1de0d240ff0a43e6a0d1f2cdeaab231d', 'user.jpg', b'0', '2021-06-10 15:14:35', ''),
(30, 'dung1233', 'dung@45612', 0, '', 'b7d6bfcbefb4c8d6ec77b7e92413f720', 'user.jpg', b'0', '2021-06-15 12:37:31', ''),
(31, 'dung123', 'dungm2989@gmail.com', 0, '', '625d45c587033e8970af8b4e3fdb575c', 'user.jpg', b'0', '2021-06-22 23:16:50', ''),
(32, 'du', 'dungnn1105@gmail.com', 0, '', 'e4f3733aaf8ffc6dd509bb546900946c', 'user.jpg', b'0', '2021-06-22 23:21:34', ''),
(33, 'dung369', 'dung@369', 0, '', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'user.jpg', b'0', '2021-06-24 13:19:36', ''),
(34, 'maimai', 'maimai@1', 0, '', '2b28587f6d880ea9fc27c6c48fe3f1eb', 'IMG_7071.jpg', b'1', '2021-06-24 14:57:48', '2021-06-24 14:58:25'),
(35, 'dungtsdadsa', 'dung@123', 0, '', '72b1bb52f4b2d2468f5c24d3d804975c', 'user.jpg', b'1', '2022-03-07 10:23:46', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `products_ibfk_2` (`id_trademark`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id_product_detail`),
  ADD KEY `product_detail_ibfk_1` (`id_product`);

--
-- Chỉ mục cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comment` (`id_comment`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trademark_ibfk_1` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id_product_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `trademark`
--
ALTER TABLE `trademark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_trademark`) REFERENCES `trademark` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD CONSTRAINT `repcomment_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repcomment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `trademark`
--
ALTER TABLE `trademark`
  ADD CONSTRAINT `trademark_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
