-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 13, 2018 lúc 02:44 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guests`
--

CREATE TABLE `guests` (
  `guest_pk_id` int(10) UNSIGNED NOT NULL,
  `guest_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_firstname` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_lastname` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_birth` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `guests`
--

INSERT INTO `guests` (`guest_pk_id`, `guest_title`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_password`, `guest_birth`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Mr.', 'nguyễn', 'công sơn', 'guest1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1995-12-16 17:15:09', NULL, NULL, NULL),
(4, NULL, 'fudu', 'scrap', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL),
(5, 'Mr.', '123', '321', 'g1@gmail.com', '4297f44b13955235245b2497399d7a93', '1800-01-01 20:33:28', NULL, NULL, NULL),
(6, NULL, NULL, NULL, 'saxsax1995@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kryptonit3_counter_page`
--

CREATE TABLE `kryptonit3_counter_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kryptonit3_counter_page`
--

INSERT INTO `kryptonit3_counter_page` (`id`, `page`) VALUES
(1, '3a848895-1d85-55f9-87da-c755660b5cf2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kryptonit3_counter_page_visitor`
--

CREATE TABLE `kryptonit3_counter_page_visitor` (
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kryptonit3_counter_page_visitor`
--

INSERT INTO `kryptonit3_counter_page_visitor` (`page_id`, `visitor_id`, `created_at`) VALUES
(1, 1, '2018-02-02 03:15:19'),
(1, 2, '2018-02-12 02:07:20'),
(1, 3, '2018-01-29 04:43:03'),
(1, 4, '2018-02-05 10:01:16'),
(1, 5, '2018-02-04 15:20:38'),
(1, 6, '2018-02-07 15:11:18'),
(1, 7, '2018-02-05 10:23:47'),
(1, 8, '2018-02-06 03:04:08'),
(1, 9, '2018-02-06 03:31:47'),
(1, 10, '2018-02-11 09:43:00'),
(1, 11, '2018-02-06 03:32:31'),
(1, 12, '2018-02-06 14:41:59'),
(1, 13, '2018-02-06 14:52:17'),
(1, 14, '2018-02-06 15:02:58'),
(1, 15, '2018-02-06 15:36:16'),
(1, 16, '2018-02-06 15:40:22'),
(1, 17, '2018-02-06 15:44:00'),
(1, 18, '2018-02-06 15:48:50'),
(1, 19, '2018-02-06 15:51:49'),
(1, 20, '2018-02-07 04:18:28'),
(1, 21, '2018-02-07 04:15:15'),
(1, 22, '2018-02-11 03:05:51'),
(1, 23, '2018-02-07 14:58:58'),
(1, 24, '2018-02-11 03:55:08'),
(1, 25, '2018-02-11 03:57:02'),
(1, 26, '2018-02-11 09:41:06'),
(1, 27, '2018-02-12 02:03:30'),
(1, 28, '2018-02-12 13:37:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kryptonit3_counter_visitor`
--

CREATE TABLE `kryptonit3_counter_visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kryptonit3_counter_visitor`
--

INSERT INTO `kryptonit3_counter_visitor` (`id`, `visitor`) VALUES
(1, '9b9ff7b043980b53a70dd69b4163d9bc15e4dbffe3e4bb50521e04905ad5aee1'),
(2, 'a0bc81448121ff3d2d797bf3260f7e64ad487c9a13f488799359abc4b905c07b'),
(3, 'b922acff35fb987d178c22e6a3df7e6a775844c709491ba711523dd97bb6b4af'),
(4, '86c753f5f50d942567e84fddd484385e8eb883feea90a80ede62fc4b03856c77'),
(5, '852a4f385ed3abe98e263743e8f1f927030cd1394ddd064a5ec0b040c875663b'),
(6, 'd54d485b7fc9b5475d73c9f1dcc69f2f451522fe3f5a5f36c4dff26f24cc68cb'),
(7, '92bd1c36e2818985ac7ae8105ac80e8e50f8c1343ecf971fcc13830b0ec44aee'),
(8, 'a8c9157a898ce61b808937a333020aef008bd3ef8f2563991a3fa22ce01dd1c5'),
(9, 'd715c272a11ea512d0de8d487ec4e956dc9a2415a3721c45c75fb0b7aa807024'),
(10, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(11, 'ef3cddb5ea547dbf2a788e42e61b65d68f5a4d3d14f4ab023c2bbb0b9e18c252'),
(12, '776d5c05e70e71208a6655384f89a74e6b001ec451edc99e9d99ed8bb341838a'),
(13, 'c269076f79f005a250745407f79b60182c477c64662572ac08d67a55550c823d'),
(14, 'ef419f5705acb3c8c31c996224a69c6137d453e1c495c6206a5bb435ba4e2015'),
(15, '62b93785f3fc61795d4d12844f3392063cc1431566745aec7bb662c32d16a442'),
(16, '8eb9ea5851250f0fafc557f104ca804bd3fcdc6fb59e5a67139bcec87feb6846'),
(17, '47a2c56ff54e32b9919e653e580b549ffbba94086fcadad584f7d7961f0ba911'),
(18, 'f390048b0d925455936f542368d38b2ac98f3e7a6b2b834c75d7e0133f41fd1e'),
(19, '11db177c406d2a78c1ecafad1d7f21fe3add58205a8b356942432deebd8aa77e'),
(20, '30121353d6487e64b01e9142de5ec35f7cd97bb1c9a573397cb8aff2eda6dea4'),
(21, 'd3a3cb4ea6b5ea83c6e53d267228298d167983dc482267ecfbda52c4e2743626'),
(22, '2164da26b76cde06eeecff64f5dd7755faf97ba5334b2787e8070868a2dc271b'),
(23, '6db911187a44b6a8bc5a7832d027cc491ec900a42009cc09d9ab8876aabd33ed'),
(24, 'fc82ba2ed03e90a1d153326b6bce4953f461103e570699925476f3be51b9c7ce'),
(25, '5b3baf5e2e9c6902e1dd67cece088defa6c31fa0f19b8afd4a5a1c6b8856b2e2'),
(26, '43b9bfefbbfb5923c9960665c4a51217eb8d1eb7e2b270694f683b05c1e5ef02'),
(27, '0de5532db683888a282e967b301b0954b8245ac1a133ceb6eff589671213174f'),
(28, 'e89fe078e35723b8d28739fac401f508c86a10c47129ddeafe7397c8ba94cad3');

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
(1, '2015_06_21_193059_create_kryptonit3_counter_page_visitor_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_color`
--

CREATE TABLE `product_color` (
  `color_pk_id` int(200) NOT NULL,
  `color_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_color`
--

INSERT INTO `product_color` (`color_pk_id`, `color_name`) VALUES
(1, 'Xanh'),
(2, 'Đỏ'),
(3, 'Tím'),
(4, 'Vàng'),
(5, 'Da Cam'),
(6, 'Trắng'),
(7, 'Xanh Lục'),
(8, 'Hồng'),
(9, 'Xám'),
(10, 'Đen'),
(11, 'Nâu'),
(12, 'Xanh Lam'),
(13, 'Xanh Tía Tô'),
(14, 'Be'),
(15, 'Đỏ Sẫm'),
(16, 'Xanh Lục');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_material`
--

CREATE TABLE `product_material` (
  `material_pk_id` int(11) NOT NULL,
  `material_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_material`
--

INSERT INTO `product_material` (`material_pk_id`, `material_name`) VALUES
(1, 'Phỉ Thúy'),
(2, 'Huyết Thạch'),
(3, 'Đá quý Ruby'),
(4, 'Saphia'),
(5, 'Spinel'),
(6, 'Peridot'),
(7, 'Thạch anh hồng (Rose quartz)'),
(8, 'Opal'),
(9, 'Tourmaline'),
(10, 'Pargacite'),
(11, 'Canxit'),
(12, 'Berin'),
(13, 'Anmetit (thạch anh tím)'),
(14, 'Thạch anh ám khói'),
(15, 'Granat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_adv_top`
--

CREATE TABLE `shop_adv_top` (
  `adv_name` varchar(200) NOT NULL,
  `adv_description` varchar(200) NOT NULL,
  `adv_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_adv_top`
--

INSERT INTO `shop_adv_top` (`adv_name`, `adv_description`, `adv_image`) VALUES
('Giá cả hợp lý', 'Dễ dàng và thuận tiện sử dụng với mọi người', 'bootstrap_free-ecommerce.png'),
('Hợp với mọi người', 'Thân thiện với người tiêu dùng', 'carousel1.png'),
('Nhân viên năng động', 'Giúp đỡ khách hàng trong mọi tình huống', 'carousel3.png'),
('Chăm lo và thấu hiểu ', 'Phục vụ và bảo hành 24/7 trên toàn quốc', 'bootstrap-templates.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_brand`
--

CREATE TABLE `shop_brand` (
  `brand_pk_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `brand_img` varchar(200) NOT NULL,
  `brand_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_brand`
--

INSERT INTO `shop_brand` (`brand_pk_id`, `brand_name`, `brand_img`, `brand_link`) VALUES
(1, 'CASIO', '1.png', 'https://casiovietnam.net/'),
(2, 'VIDA', '2.png', 'https://shopvida.com/'),
(3, 'SPORT', '3.png', 'http://www.hm.com/us/products/sale/ladies/sportswear'),
(4, 'ROLEX', '4.png', 'https://www.rolex.com/vi'),
(5, 'RADO', '5.png', 'https://www.rado.com/'),
(6, 'SEIKO', '6.png', 'http://www.seikowatches.com/'),
(8, 'instagram', '1516788288.4890852_instagram_jpeg81d3fdebc0e0818a2a43d41548545998.jpg', 'https://www.instagram.com/?hl=en'),
(9, 'youtube', '1516790882.youtubelogo.png', 'https://www.youtube.com/'),
(10, 'facebook', '1516791625.1200px-Facebook_New_Logo_(2015).svg.png', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_category`
--

CREATE TABLE `shop_category` (
  `category_pk_id` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_category`
--

INSERT INTO `shop_category` (`category_pk_id`, `category_name`) VALUES
('c01', 'Fashion'),
('c02', 'Watches'),
('c03', 'Fine Jewelry'),
('c04', 'Fashion Jewelry'),
('c05', 'Engagement & Wedding'),
('c06', 'Men\'s Jewelry'),
('c07', 'Vintage & Antique'),
('c08', 'Loose Diamonds'),
('c09', 'Loose Beads');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_checkout`
--

CREATE TABLE `shop_checkout` (
  `checkout_pk_id` int(200) NOT NULL,
  `guest_fk_id` varchar(200) NOT NULL,
  `checkout_place` varchar(200) NOT NULL,
  `checkout_mobile_number` varchar(200) NOT NULL,
  `checkout_totalprice` varchar(200) NOT NULL,
  `checkout_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_checkout`
--

INSERT INTO `shop_checkout` (`checkout_pk_id`, `guest_fk_id`, `checkout_place`, `checkout_mobile_number`, `checkout_totalprice`, `checkout_status`) VALUES
(50, '4', '12 yh', '01679197854', '847000', '1'),
(51, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '847000', '1'),
(52, '5', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '847000', '1'),
(53, '5', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '847000', '1'),
(54, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '847000', '1'),
(55, '3', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(56, '3', 'dsadsa', '01671254321', '4235000', '1'),
(57, '3', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(58, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(59, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(60, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(61, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(62, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(63, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(64, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(65, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(66, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(67, '4', '20 Yên Hòa Cầu Giấy Hà Nội', '01671254321', '1089000', '1'),
(69, '4', 'dsa', '12345678912', '1452000', '0'),
(72, '3', 'YH', '01679845214', '1815000', '0'),
(73, '3', 'dsadas', '12345678912', '10527000', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_checkout_detail`
--

CREATE TABLE `shop_checkout_detail` (
  `checkout_detail_pk_id` int(200) NOT NULL,
  `checkout_fk_id` varchar(200) NOT NULL,
  `product_fk_id` varchar(200) NOT NULL,
  `product_number` int(11) NOT NULL,
  `att_material` varchar(200) DEFAULT NULL,
  `att_color` varchar(200) DEFAULT NULL,
  `product_totalprice` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_checkout_detail`
--

INSERT INTO `shop_checkout_detail` (`checkout_detail_pk_id`, `checkout_fk_id`, `product_fk_id`, `product_number`, `att_material`, `att_color`, `product_totalprice`) VALUES
(35, '50', 'p09', 1, 'Phỉ Thúy', 'Vàng', 847000),
(36, '52', 'p12', 1, 'Phỉ Thúy', 'Vàng', 847000),
(37, '53', 'p12', 1, 'Phỉ Thúy', 'Vàng', 847000),
(38, '54', 'p12', 1, 'Phỉ Thúy', 'Vàng', 847000),
(39, '55', 'p11', 1, 'Phỉ Thúy', 'Vàng', 1089000),
(40, '56', 'p04', 7, 'Phỉ Thúy', 'Vàng', 4235000),
(41, '66', 'p11', 1, 'Phỉ Thúy', 'Vàng', 1089000),
(42, '67', 'p11', 1, 'Phỉ Thúy', 'Vàng', 1089000),
(43, '68', 'p12', 2, 'Phỉ Thúy', 'Vàng', 1694000),
(44, '69', 'p11', 1, 'Phỉ Thúy', 'Vàng', 1089000),
(49, '72', 'p10', 2, 'Đá Phỉ Thúy', 'Đỏ', 726000),
(50, '72', 'p11', 1, 'Tím Huyền Bích', 'Lục', 1089000),
(51, '73', 'p10', 29, 'Đá Phỉ Thúy', 'Đỏ', 10527000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_products`
--

CREATE TABLE `shop_products` (
  `product_pk_id` varchar(200) NOT NULL,
  `category_fk_id` varchar(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_description` varchar(200) DEFAULT NULL,
  `product_content` varchar(5000) DEFAULT NULL,
  `product_img` varchar(200) DEFAULT NULL,
  `product_price` bigint(200) DEFAULT NULL,
  `product_top_huge` int(11) DEFAULT NULL,
  `product_featured` int(11) DEFAULT NULL,
  `product_stock` bigint(200) DEFAULT NULL,
  `product_style` varchar(200) DEFAULT NULL,
  `product_season` varchar(200) DEFAULT NULL,
  `product_usage` varchar(200) DEFAULT NULL,
  `product_sport` varchar(200) DEFAULT NULL,
  `product_brand` varchar(200) DEFAULT NULL,
  `product_common` int(11) DEFAULT NULL,
  `product_comming` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_products`
--

INSERT INTO `shop_products` (`product_pk_id`, `category_fk_id`, `product_name`, `product_description`, `product_content`, `product_img`, `product_price`, `product_top_huge`, `product_featured`, `product_stock`, `product_style`, `product_season`, `product_usage`, `product_sport`, `product_brand`, `product_common`, `product_comming`) VALUES
('p01', 'c01', 'Nhẫn lục quang bảo ngọc', 'Vẻ đẹp của hoa hồng nồng nàn, kiêu sa, luôn toả ngát hương thơm cũng giống như nhan sắc tuyệt vời của người phụ nữ, tạo nên những khoảnh khắc thăng hoa làm đẹp cho đời.', 'Rose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.', 'bootstrap-ring.png', 500000, 0, 0, 29, 'Đồ trang sức , Thể thao', '4 mùa', 'Mọi cỡ', '122855031', 'CASIO', 0, 0),
('p02', 'c02', 'Vòng cổ bích thạch', 'Lấy cảm hứng từ lá ô liu và vòng nguyệt quế - biểu tượng của sự thành công, vinh quang và quyền lực trong thần thoại Hy Lạp, nhẫn PNJ Mystery vàng trắng 10K đính đá ECZ là hiện thân của vẻ đẹp huyền b', 'Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.Nhẫn PNJ Mystery thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K (41,6% vàng nguyên chất) và đá Swarovski Zirconia nhập khẩu chính từ SWAROVSKI GEMTM . Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng. Với những đường nét uốn lượn mềm mại và tinh xảo. Nhẫn vàng trắng 10K PNJ của bộ sưu tập Mystery là mảnh ghép không thể thiếu cho thời trang phái đẹp.', 'i.jpg', 600000, 0, 0, 29, 'Sang trọng , Quý phái', 'Xuân Hạ', 'Mọi cỡ', '122855121', 'VIDA', 0, 1),
('p03', 'c03', 'Nhẫn kim cương ', 'VÒNG TAY PNJ MELODY VÀNG TRẮNG 10K ĐÍNH ĐÁ SYNTHETIC XANH LÁ', 'Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.Phảng phất trong nét thiết kế của vòng tay PNJ Melody Vàng trắng 10K đính đá Synthetic xanh lá chính là câu chuyện gắn với những khoảnh khắc đáng nhớ cũng như điều kì diệu trong cuộc sống của nàng. Với phong cách thời trang từ xu hướng “thanh lịch”, nên sản phẩm giúp tô điểm cho vẻ trang nhã, quý phái cho phái đẹp. PNJ – tôn vinh giá trị đích thực của riêng bạn.', 'g.jpg', 700000, 0, 0, 29, 'Đồ trang sức , Sang trọng', '4 mùa', 'Cân đối', '122255031', 'CASIO', 0, 1),
('p04', 'c04', 'Vòng tay thời trang', 'BỘ SƯU TẬP MELODY PNJ – TRANG SỨC VÒNG TAY BẮT MẮT', 'Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.', 's.png', 500000, 0, 0, 22, 'Thời thượng, Phong cách', 'Xuân Thu', 'Vừa vặn', '112855031', 'SPORT', 0, 1),
('p05', 'c05', 'Vòng cổ bích thạch', 'Vẻ đẹp của hoa hồng nồng nàn, kiêu sa, luôn toả ngát hương thơm cũng giống như nhan sắc tuyệt vời của người phụ nữ, tạo nên những khoảnh khắc thăng hoa làm đẹp cho đời.', 'Rose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.\r\nRose Collection thuộc dòng trang sức ECZ - Excellent Cubic Zirconia của PNJ được làm từ vàng 10K ( 41,6% vàng nguyên chất ) và đá Swarovski Zirconia nhập khẩu chính thức từ SWAROVSKI GEMTM. Những viên đá Swarovski Zirconia có độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến một vẻ đẹp cuốn hút, hiện đại và sang trọng.', 'i.jpg', 600000, 0, 0, 29, 'Tiệc cưới , Đồ trang sức', '4 mùa', 'Vừa vặn', '123855231', 'SPORT', 1, 1),
('p06', 'c06', 'Vòng vàng gắn ngọc thạch', 'BỘ SƯU TẬP MELODY PNJ – TRANG SỨC VÒNG TAY BẮT MẮT', 'Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.Không chỉ ghi dấu ấn trong phong cách thiết kế, bộ sưu tập Melody còn mang một ý nghĩa rất riêng như chính tên gọi của mình – đó là sự pha trộn hoàn hảo giữa những nốt nhạc thăng trầm trong cuộc sống. Đôi lúc là âm vang của giai điệu xanh huyền bí, là giai điệu đỏ đam mê hay rằng giai điệu ngọc lục bảo tươi mới. Tất cả đã tạo nên một bản hòa ca đầy ấn tượng, mang đến vẻ đẹp hoàn mỹ cho phái đẹp.', 'f.jpg', 600000, 0, 1, 29, 'Quý phái , Thời thượng', 'Đông Thu', 'Cân đối', '122225031', 'CASIO', 1, 0),
('p07', 'c07', 'Nhẫn kim cương hợp kim', 'VÒNG TAY PNJ MELODY – TÔ ĐIỂM NÉT KIÊU SA', 'Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.', 'e.jpg', 400000, 0, 1, 29, 'Tiệc cưới , Dạ hội', '4 mùa', 'Cân đối', '122855031', 'ROLEX', 1, 0),
('p08', 'c08', 'Nhẫn bích thạch hợp kim', 'Điểm nhấn nhẫn vàng trắng 10K PNJ của BST “Mystery” lấy cảm hứng chủ đạo từ họa tiết lá ô liu (olive) được cách điệu hoàn hảo với sự nữ tính ẩn hiện trong vẻ huyền bí, nét thanh lịch, sang trọng toát ', 'Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.', 'j.jpg', 600000, 0, 0, 29, 'Thời thượng , Sang trọng', 'Xuân Hạ', 'Cân đối', '122855032', 'RADO', 1, 0),
('p09', 'c09', 'Vòng tay vàng thời thượng', 'ECZ - ROYAL là dòng trang sức hội tụ vẻ đẹp lấp lánh của những viên đá ECZ - Excellence Cubic Zirconia - mang sắc xanh huyền bí, sắc đỏ rực rỡ hay sắc ngọc lục bảo quyến rũ với giác cắt hoàn hảo tựa k', 'Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.', 'b.jpg', 700000, 1, 0, 29, 'Dạ tiệc , Quý phái', 'Xuân Thu', 'Vừa vặn', '122855033', 'RADO', 0, 0),
('p10', 'c01', 'Vòng tay Vital', 'ECZ - ROYAL là dòng trang sức hội tụ vẻ đẹp lấp lánh của những viên đá ECZ - Excellence Cubic Zirconia - mang sắc xanh huyền bí, sắc đỏ rực rỡ hay sắc ngọc lục bảo quyến rũ với giác cắt hoàn hảo tựa k', 'Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.Mặt dây chuyền chất liệu vàng trắng 10K, gắn đá ECZ: 1 viên 2.5 ly + 19 viên 2.0 ly + 21 viên 1.75 ly + 4 viên 1.25 ly + 31 viên 1.0 ly + 1 viên hình tim 10.0 ly màu xanh saphire.', 'c.jpg', 300000, 1, 0, 29, 'Dạ tiệc ', '4 mùa', 'Mọi cỡ', '122855032', 'VIDA', 0, 0),
('p11', 'c02', 'Đồng hồ Rolex vàng', 'Điểm nhấn nhẫn vàng trắng 10K PNJ của BST “Mystery” lấy cảm hứng chủ đạo từ họa tiết lá ô liu (olive) được cách điệu hoàn hảo với sự nữ tính ẩn hiện trong vẻ huyền bí, nét thanh lịch, sang trọng toát ', 'Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.Nhẫn vàng trắng PNJ truyền tải thông điệp cái đẹp gắn liền với sự thành công và những điều tốt đẹp trong cuộc sống. “Mystery collection” sẽ thăng hoa vẻ đẹp của mỗi người phụ nữ và trở thành “trang sức diệu kỳ” dành riêng phái nữ . Hứa hẹn sẽ là một trong những phụ kiện trang sức khiến các nàng xiêu lòng.', 'a.jpg', 900000, 1, 0, 28, 'Lịch thiệp , Thể thao', 'Đông Thu', 'Mọi cỡ', '122855031', 'CASIO', 0, 0),
('p12', 'c03', 'Nhẫn vàng khảm kim cương ', 'VÒNG TAY PNJ MELODY – TÔ ĐIỂM NÉT KIÊU SA', 'Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.Vòng tay PNJ Melody chính là sự kết hợp hài hòa của sắc trắng kiểu sa từ đá Swarovski Zirconia cùng sắc màu rực rỡ của đá Synthetic. Màu xanh lá chủ đạo của sản phẩm còn thể hiện một nét đẹp bắt mắt, cuốn hút mọi ánh nhìn. Với kỹ thuật kết tròn tinh tế, chiếc vòng tạo cảm giác trang nhã nhưng không kém phần kiêu sa dành cho các nàng. Kiểu dáng nhỏ gọn cũng giúp cho phái đẹp dễ dàng mix&match cùng những bộ trang phục khác nhau, từ đó tạo nên điểm nhấn riêng cho bản thân.', 'd.jpg', 700000, 1, 1, 28, 'Tiệc cưới , Quý phái', '4 mùa', 'Cân đối', '122824031', 'SEIKO', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_product_attribute`
--

CREATE TABLE `shop_product_attribute` (
  `att_pk_id` varchar(200) NOT NULL,
  `product_fk_id` varchar(200) NOT NULL,
  `att_material` varchar(200) DEFAULT NULL,
  `att_color` varchar(200) DEFAULT NULL,
  `att_price` int(200) DEFAULT NULL,
  `att_qty` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_product_attribute`
--

INSERT INTO `shop_product_attribute` (`att_pk_id`, `product_fk_id`, `att_material`, `att_color`, `att_price`, `att_qty`) VALUES
('a01', 'p01', 'Phỉ Thúy', 'Xanh', 700000, 30),
('a02', 'p01', 'Ngọc Bích', 'Vàng', 600000, 30),
('a04', 'p02', 'Lục Bích', 'Đỏ', 400000, 30),
('a05', 'p02', 'Vàng', 'Vàng', 500000, 30),
('a06', 'p02', 'Nhiêu Phong', 'Tím', 700000, 30),
('a07', 'p03', 'Đá Lục', 'Vàng', 600000, 30),
('a08', 'p03', 'Lục Đỉnh', 'xám', 700000, 30),
('a09', 'p04', 'Ngọc Bích', 'Vàng', 800000, 30),
('a11', 'p05', 'Phỉ Thúy', 'Vàng', 900000, 30),
('a12', 'p05', 'Đá Lam', 'Đỏ', 500000, 30),
('a13', 'p06', 'Bạc', 'Xanh', 400000, 30),
('a14', 'p06', 'KL Tuyền', 'Lam', 500000, 29),
('a15', 'p07', 'Hợp Kim Bạc', 'Xanh', 800000, 30),
('a16', 'p08', 'Lục Quang', 'Vàng', 700000, 30),
('a17', 'p08', 'Huyết Thạch', 'Đỏ', 800000, 30),
('a18', 'p09', 'Hợp Kim', 'Đỏ', 700000, 30),
('a19', 'p09', 'KL Vàng', 'Vàng', 900000, 30),
('a20', 'p10', 'Đá Phỉ Thúy', 'Đỏ', 700000, -2),
('a21', 'p10', 'Đá Lục Bích', 'Xanh', 700000, 30),
('a22', 'p10', 'Huyền Bích', 'Tím', 900000, 30),
('a23', 'p11', 'Tím Huyền Bích', 'Lục', 900000, 26),
('a24', 'p11', 'Huyết Thạch', 'Đỏ', 700000, 30),
('a25', 'p12', 'Bích Ngọc', 'Tím', 900000, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_ship`
--

CREATE TABLE `shop_ship` (
  `ship_id` int(200) NOT NULL,
  `ship_city` varchar(200) NOT NULL,
  `ship_price` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_ship`
--

INSERT INTO `shop_ship` (`ship_id`, `ship_city`, `ship_price`) VALUES
(1, 'Hà Nội', 'free'),
(2, 'Quảng Ninh', '170000'),
(3, 'Đà Nẵng', '260000'),
(4, 'Hồ Chí Minh', '140000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_upcomming_products`
--

CREATE TABLE `shop_upcomming_products` (
  `product_pk_id` varchar(200) NOT NULL,
  `category_fk_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_content` varchar(5000) NOT NULL,
  `product_img` varchar(200) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_style` varchar(200) NOT NULL,
  `product_season` varchar(200) NOT NULL,
  `product_usage` varchar(200) NOT NULL,
  `product_sport` varchar(200) NOT NULL,
  `product_brand` varchar(200) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_upcomming_products`
--

INSERT INTO `shop_upcomming_products` (`product_pk_id`, `category_fk_id`, `product_name`, `product_description`, `product_content`, `product_img`, `product_price`, `product_style`, `product_season`, `product_usage`, `product_sport`, `product_brand`, `product_stock`) VALUES
('pu01', 'c04', 'Vòng cổ ngọc bích', 'Nhẫn vàng \"Nguyệt Quế\" được lấy cảm hứng từ lá ô liu .', 'Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.Nhẫn PNJ Mystery chế tác trên chất liệu vàng trắng 10K đính đá ECZ với độ trong suốt, cắt mài hoàn hảo và tán sắc rực rỡ như kim cương sẽ mang đến vẻ đẹp cuốn hút, hiện đại và sang trọng. Đặc biệt, kiểu nhẫn vàng nguyệt quế đơn giản, thanh mảnh nổi bật với họa tiết lá nguyệt quế phù hợp với mọi dáng tay.', 'bootstrap-ecommerce-templates.png', 500000, 'Đồ thể thao , Dạ tiệc', '4 Mùa', 'Mọi cỡ', '122855032', 'Ren', 100),
('pu02', 'c05', 'Đồng hồ vàng Ages', 'Như một bản hòa ca muôn màu của cuộc sống “ Mystery Gift Collection” là sự kết hợp của chất liệu vàng quý phái cùng những viên Ngọc Trai, Đá quý, Swarovski CZ', 'trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!trang sức “Nguyệt Quế” còn mang thông điệp vô cùng tuyệt vời như một lời chúc niềm tin chiến thắng và thành công và một tình yêu thuần khiết nên đây sẽ là món quá ý nghĩa dành cho những người yêu thương. Đặc biệt, trong dịp ngày lễ tình nhân, nhẫn nguyệt quế sẽ là món quà tuyệt vời mà phái mạnh dành cho nửa kia của mình. Hãy đến với PNJ để mang may mắn, vững tin và tình yêu đích thực về cho bản thân và cho những người mình yêu nhé!', 'shopping-cart-template.png', 700000, 'Quý phái , Sang trọng', '4 Mùa', 'Cân đối', '122822031', 'NOSBYN', 10),
('pu03', 'c06', 'Nhẫn lục thạch bảo ngọc', 'Được chế tác từ chất liệu vàng 18K cao cấp, giờ đây bạn có thể hoàn toàn yên tâm để trao đến bé chiếc vòng tay trẻ em đáng yêu này. Bên cạnh đó .', 'Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.Sự đơn giản nhưng không kém phần tinh tế của vòng tay PNJ giúp tô điểm cho nét trẻ thơ cho bé. Với một hình ảnh quả thông nhỏ được điểm xuyến trên chiếc vòng, trẻ nhỏ sẽ thêm phần thích thú vì nét lạ mắt và độc đáo này. Vòng tay có kiểu dáng khá nhỏ gọn và dễ đeo nên bạn có thể chọn lựa để dành tặng cho các bé em của mình nhé.', 'bootstrap-template.png', 600000, 'Quý phái , Lịch thiệp', 'Xuân , Hạ', 'Mọi cỡ', '133855031', 'COCOSIN', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_voucher`
--

CREATE TABLE `shop_voucher` (
  `voucher_id` varchar(200) NOT NULL,
  `voucher_status` varchar(200) DEFAULT NULL,
  `voucher_effect` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop_voucher`
--

INSERT INTO `shop_voucher` (`voucher_id`, `voucher_status`, `voucher_effect`) VALUES
('DG6ABSCM', '0', '20'),
('F8Y1ETHP', '0', '10'),
('RBJGHZ52', '1', '50'),
('RBXAZEG9', '1', '20'),
('ZTC8KVJ2', '0', '40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `pk_user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` int(200) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`pk_user_id`, `username`, `password`, `fullname`, `email`, `image`, `sex`, `address`, `mobile_number`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'admin', '202cb962ac59075b964b07152d234b70', 'fudu test', 'admin@gmail.com', '1515939060.21270798_658514281008615_1062913794690311263_n.jpg', 'Nữ', 'HCM2', '01621365214', 0, NULL, '2017-11-29 07:08:22', '2017-11-29 07:08:22'),
(9, 'saxsax199502a', 'e10adc3949ba59abbe56e057f20f883e', 'fudu', 'saxsax199502a@gmail.com', '1516198213.maxresdefault.jpg', 'Nữ', 'HP2', '01678453652', 1, NULL, NULL, NULL),
(14, 'admin5', '26a91342190d515231d7238b0c5438e1', 'dsadsa', 'admin5@gmail.com', 'default_nu.jpg', 'Nam', 'HN2', '01671254321', 0, NULL, NULL, NULL),
(15, 'admin6', 'c6b853d6a7cc7ec49172937f68f446c8', 'dsadsa', 'admin6@gmail.com', '1515939127.12348088_931994220220839_7330458527345697374_n.jpg', 'Nữ', 'HN2', '01671254321', 0, NULL, NULL, NULL),
(16, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'fuuu', 'admin1@gmail.com', 'C4eOVZkVYAA4mT1.jpg', 'Nam', 'HN', '01678452654', 0, NULL, NULL, NULL),
(17, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'fuuu', 'admin2@gmail.com', 'C4eOVZkVYAA4mT1.jpg', 'Nam', 'HN', '01678452654', 0, NULL, NULL, NULL),
(18, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'fuuu', 'admin3@gmail.com', '20770235_258484188006487_3493345649159878791_n.jpg', 'Nam', 'HN', '01678452654', 1, NULL, NULL, NULL),
(19, 'admin7', 'e10adc3949ba59abbe56e057f20f883e', 'admin7', 'admin7@gmail.com', '1517538316.24232828_382215195564001_5452974557844347642_n.jpg', 'Nữ', 'dsadsads', '12345678912', 0, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_pk_id`);

--
-- Chỉ mục cho bảng `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kryptonit3_counter_page_visitor`
--
ALTER TABLE `kryptonit3_counter_page_visitor`
  ADD KEY `kryptonit3_counter_page_visitor_page_id_index` (`page_id`),
  ADD KEY `kryptonit3_counter_page_visitor_visitor_id_index` (`visitor_id`);

--
-- Chỉ mục cho bảng `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`color_pk_id`);

--
-- Chỉ mục cho bảng `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`material_pk_id`);

--
-- Chỉ mục cho bảng `shop_brand`
--
ALTER TABLE `shop_brand`
  ADD PRIMARY KEY (`brand_pk_id`);

--
-- Chỉ mục cho bảng `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`category_pk_id`);

--
-- Chỉ mục cho bảng `shop_checkout`
--
ALTER TABLE `shop_checkout`
  ADD PRIMARY KEY (`checkout_pk_id`);

--
-- Chỉ mục cho bảng `shop_checkout_detail`
--
ALTER TABLE `shop_checkout_detail`
  ADD PRIMARY KEY (`checkout_detail_pk_id`);

--
-- Chỉ mục cho bảng `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`product_pk_id`);

--
-- Chỉ mục cho bảng `shop_product_attribute`
--
ALTER TABLE `shop_product_attribute`
  ADD PRIMARY KEY (`att_pk_id`);

--
-- Chỉ mục cho bảng `shop_ship`
--
ALTER TABLE `shop_ship`
  ADD PRIMARY KEY (`ship_id`);

--
-- Chỉ mục cho bảng `shop_upcomming_products`
--
ALTER TABLE `shop_upcomming_products`
  ADD PRIMARY KEY (`product_pk_id`);

--
-- Chỉ mục cho bảng `shop_voucher`
--
ALTER TABLE `shop_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pk_user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_pk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_pk_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product_material`
--
ALTER TABLE `product_material`
  MODIFY `material_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `shop_brand`
--
ALTER TABLE `shop_brand`
  MODIFY `brand_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `shop_checkout`
--
ALTER TABLE `shop_checkout`
  MODIFY `checkout_pk_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `shop_checkout_detail`
--
ALTER TABLE `shop_checkout_detail`
  MODIFY `checkout_detail_pk_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `shop_ship`
--
ALTER TABLE `shop_ship`
  MODIFY `ship_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `pk_user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `kryptonit3_counter_page_visitor`
--
ALTER TABLE `kryptonit3_counter_page_visitor`
  ADD CONSTRAINT `kryptonit3_counter_page_visitor_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `kryptonit3_counter_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kryptonit3_counter_page_visitor_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `kryptonit3_counter_visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
