-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 02:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET CHARACTER SET utf8mb4;

ALTER DATABASE
    `fashion`
    CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `main_pic` varchar(1000) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `para1` text NOT NULL,
  `sub_pic` varchar(1000) DEFAULT NULL,
  `para2` text NOT NULL,
  `sub_pic_quote` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`main_pic`, `type`, `title`, `date`, `para1`, `sub_pic`, `para2`, `sub_pic_quote`, `id`, `status`, `slug`) VALUES
('', 0, '', '2022-11-29', '', '', '', '', 885, 0, ''),
('', 0, '', '2022-11-29', '', '', '', '', 886, 0, ''),
('kinh-nghiem-mac-blazer-cong-so-khong-bi-gia-888main_pic.png', 3, 'Kinh nghiệm mặc blazer công sở không bị già', '2022-12-05', '<p>L&agrave; sản phẩm được y&ecirc;u th&iacute;ch nhất trong thời điểm giao m&ugrave;a thu đ&ocirc;ng. Ch&uacute;ng kh&ocirc;ng chỉ l&agrave; set đồ ho&agrave;n hảo cho m&ocirc;i trường c&ocirc;ng sở m&agrave; thực tế bạn ho&agrave;n to&agrave;n c&oacute; thể biến tấu ch&uacute;ng th&agrave;nh những trang phục trẻ trung, thu h&uacute;t v&agrave; ấn tượng.</p>\r\n\r\n<p>Mặc d&ugrave; l&agrave; một items quen thuộc thế nhưng vẫn kh&ocirc;ng &iacute;t n&agrave;ng c&ocirc;ng sở v&atilde;n rất kh&oacute; khăn trong việc lựa chọn đồ mix ph&ugrave; hợp. Từ đ&oacute; chẳng những kh&ocirc;ng t&ocirc;n l&ecirc;n được vẻ đẹp m&agrave; c&ograve;n trở n&ecirc;n bị &ldquo;gi&agrave;&rdquo; hơn so với tuổi.</p>\r\n', 'kinh-nghiem-mac-blazer-cong-so-khong-bi-gia-888sub_pic.png', '<h2>Lựa chọn set Blazer ph&ugrave; hợp với d&aacute;ng người</h2>\r\n\r\n<p>Để c&oacute; thể mặc Blazer đẹp th&igrave; việc lựa chọn set đồ ph&ugrave; hợp với d&aacute;ng người ch&iacute;nh l&agrave; yếu tố ti&ecirc;n quyết gi&uacute;p che đi những khuyết điểm tr&ecirc;n cơ thể.</p>\r\n\r\n<p>Thực tế mỗi ch&uacute;ng ta sẽ sở hữu những d&aacute;ng người kh&aacute;c nhau với c&aacute;c ưu v&agrave; nhược điểm. Do đ&oacute; để tr&aacute;nh bị gi&agrave; n&agrave;ng n&ecirc;n lựa chọn những chiếc Blazer c&oacute; độ d&agrave;i ngang h&ocirc;ng, tay &aacute;o v&agrave; cổ tay vừa vặn. Từ đ&oacute; t&ocirc;n l&ecirc;n ưu điểm trong v&oacute;c d&aacute;ng của bản th&acirc;n, đảm bảo sự tự tin v&agrave; vẻ đẹp.</p>\r\n&nbsp;\r\n\r\n<h2>Ưu ti&ecirc;n c&aacute;c thiết kế c&aacute;ch điệu, c&aacute; t&iacute;nh (Ve &aacute;o, độ d&agrave;i, cầu vai)</h2>\r\n\r\n<p>B&ecirc;n cạnh về k&iacute;ch thước ph&ugrave; hợp v&agrave; vừa vặn bạn cũng c&oacute; thể sử dụng c&aacute;c thiết kế Blazer c&aacute;ch điệu để tạo&', 'Mặc sao cho đẹp', 888, 1, 'kinh-nghiem-mac-blazer-cong-so-khong-bi-gia'),
('dieu-da-kieu-sa-trong-cac-thiet-ke-vay-dam-gile-den-tu-zofal-890main_pic.jpg', 3, 'Điệu đà kiêu sa trong các thiết kế váy đầm gile đến từ Zofal', '2022-12-06', '<p><span style=\"font-size:14px\">Gile l&agrave; một từ mượn bắt nguồn từ tiếng Ph&aacute;p d&ugrave;ng để chỉ những chiếc &aacute;o c&aacute;nh nhỏ kh&ocirc;ng c&oacute; tay hay b&acirc;u &aacute;o thường được mặc b&ecirc;n ngo&agrave;i. Trước đ&acirc;y gile chủ yếu được ứng dụng trong c&aacute;c trang phục của nam giới. Tuy nhi&ecirc;n trước sự thay đổi của x&atilde; hội gile đ&atilde; dần trở th&agrave;nh m&oacute;n thời trang xịn s&ograve; d&agrave;nh cho c&aacute;c chị em.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">L&agrave; một sản phẩm ghi l&ecirc; được biến tấu c&oacute; sự kết hợp giữa &aacute;o gile v&agrave; v&aacute;y đầm, sản phẩm v&aacute;y đầm gile mang lại một phong c&aacute;ch v&ocirc; c&ugrave;ng mới lạ vừa đẹp, vừa sang, vừa c&aacute; t&iacute;nh.</span><br />\r\nĐi đầu trong xu hướng thời trang mới ưu ti&ecirc;n sự thoải m&aacute;i mới lạ&nbsp;&nbsp;xin giới thiệu tới bạn 5 items v&aacute;y&nbsp;gile v&ocirc; c&ugrave;ng điệu đ&agrave; v&agrave; ki&ecirc;u sa. H&amp;', 'dieu-da-kieu-sa-trong-cac-thiet-ke-vay-dam-gile-den-tu-zofal-890sub_pic.jpg', '<h2>V&aacute;y đầm gile cổ đức b&egrave;o gấu Floral</h2>\r\n\r\n<p>Mang tr&ecirc;n m&igrave;nh m&agrave;u sắc ấn tượng c&ugrave;ng họa tiết hoa l&aacute;, V&aacute;y đầm gile cổ đức b&egrave;o gấu Floral ghi dấu ấn mạnh cho c&aacute;c qu&yacute; c&ocirc; bởi vẻ đẹp sang trọng, ki&ecirc;u sa nhưng kh&ocirc;ng k&eacute;m phần thanh lịch.</p>\r\n\r\n<p>Đặc biệt với chất liệu linen đ&acirc;y sẽ l&agrave; items v&ocirc; c&ugrave;ng tho&aacute;ng m&aacute;t, kh&ocirc;ng cần phối th&ecirc;m nhiều phụ kiện nhưng vẫn trở th&agrave;nh điểm nhấn h&uacute;t mắt.</p>\r\n\r\n<h2>V&aacute;y đầm len gile d&aacute;ng midi Beige</h2>\r\n\r\n<p>V&aacute;y đầm len gile d&aacute;ng midi Beige c&oacute; thiết kế độc đ&aacute;o mới lạ ở phần ngực tạo điểm nhấn nhẹ nh&agrave;ng. Đặc biệt phần hiệu ứng ch&acirc;n v&aacute;y x&ograve;e d&agrave;i trẻ trung, k&iacute;n đ&aacute;o.</p>\r\n\r\n<p>Với chiếc v&aacute;y n&agrave;y bạn c&oacute; thể dễ d&agrave;ng mix match c&ugrave;ng &aacute;o kho&aacute;c mỏng hoặc d&agrave;y t&amp;u', 'Váy đầm gile phối thổ cẩm nửa thân trên Black', 890, 1, 'dieu-da-kieu-sa-trong-cac-thiet-ke-vay-dam-gile-de'),
('khan-lua-da-nang-–-phu-kien-cua-su-sang-trong-va-dang-cap-891main_pic.jpg', 3, 'Khăn lụa đa năng – Phụ kiện của sự sang trọng và đẳng cấp', '2022-12-05', '<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"font-size:16px\">Khăn lụa từ l&acirc;u đ&atilde; trở th&agrave;nh vật dụng quen thuộc v&agrave; kh&ocirc;ng thể thiếu của bất kỳ chị em phụ nữ n&agrave;o. Với chiếc khăn mềm mại xinh xắn n&agrave;y, mọi người c&oacute; thể sử dụng để biến tấu t&ocirc; điểm cho c&aacute;c outfit kh&aacute;c nhau gi&uacute;p tạo điểm nhấn thu h&uacute;t mọi &aacute;nh nh&igrave;n.</span></span></p>\r\n\r\n<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"font-size:16px\">Vậy khăn lụa l&agrave; g&igrave;? V&igrave; sao ch&uacute;ng lại được y&ecirc;u th&iacute;ch đến thế? Dưới đ&acirc;y h&atilde;y c&ugrave;ng&nbsp;t&igrave;m hiểu v&agrave; c&ugrave;ng điểm qua 6 c&aacute;ch sử dụng khăn lụa đỉnh nhất dễ d&agrave;ng thay đổi phong c&aacute;ch từ nhẹ nh&agrave;ng, c&aacute; t&iacute;nh đến sang trọng ki&ecirc;u sa nh&eacute;!</span></span></p>\r\n', 'khan-lua-da-nang-–-phu-kien-cua-su-sang-trong-va-dang-cap-891sub_pic.jpg', '<h1><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\">Khăn lụa l&agrave; g&igrave;?</span></h1>\r\n\r\n<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"font-size:16px\">Khăn lụa l&agrave; loại khăn được dệt từ chất liệu vải lụa cao cấp c&oacute; nguồn gốc từ thi&ecirc;n nhi&ecirc;n. Loại khăn n&agrave;y c&oacute; đặc điểm bề mặt rất mềm mịn mỏng như v&ocirc; c&ugrave;ng chắc chắn.</span></span></p>\r\n\r\n<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"font-size:16px\">Thực tế vải lụa hay vải tơ tằm được tạo ra bằng c&aacute;ch việc nu&ocirc;i tằm tr&ecirc;n diện rộng sau đ&oacute; lấy tơ của ch&uacute;ng se th&agrave;nh sợi tơ rồi dệt thủ c&ocirc;ng ra những tấm vải tơ tằm thượng hạng. Ch&iacute;nh bởi sự cầu kỳ trong việc l&agrave;m ra một tấm vải lụa tơ tằm n&ecirc;n đ&acirc;y được xem l&agrave; loại vải đắt, cao cấp nhất hiện nay.</span></span><br />\r\n&nbsp;</p>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'Khăn lụa đa năng – Phụ kiện của sự sang trọng và đẳng cấp', 891, 1, 'khan-lua-da-nang-–-phu-kien-cua-su-sang-trong-va-d');

-- --------------------------------------------------------

--
-- Table structure for table `blog_types`
--

CREATE TABLE `blog_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(45) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_types`
--

INSERT INTO `blog_types` (`id`, `type_name`, `slug`) VALUES
(1, 'Truyền thống', 'truyen-thong'),
(2, 'Tin tức', 'tin-tuc'),
(3, 'Thời trang', 'thoi-trang'),
(4, 'Hiện đại', 'hien-dai');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_position` int(4) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `supply_id`, `category_position`, `slug`) VALUES
(560, 'Nữ', NULL, NULL, 'nu'),
(2, 'Nam', 1, 2, 'nam');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'author-comment.png',
  `editTime` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT 0,
  `post_id` int(11) DEFAULT 0,
  `page_id` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_comment_id`, `user_id`, `content`, `createDate`, `author`, `email`, `status`, `link_image`, `editTime`, `product_id`, `post_id`, `page_id`) VALUES
(1, NULL, 220001, '10 điểm nha gái', '2022-12-05 05:21:43', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(2, NULL, 220001, 'Đẹp lắm em\r\n', '2022-12-05 05:21:49', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(3, NULL, 220001, 'fga', '2022-12-05 10:11:10', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 890, 0),
(4, NULL, 220001, 'đẹp lắm bạn', '2022-12-05 10:24:05', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(5, NULL, 220001, 'đẹp lắm bạnad', '2022-12-05 10:24:32', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(6, NULL, 220001, 'a', '2022-12-05 10:24:37', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(7, NULL, 220001, 'a', '2022-12-05 10:24:49', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(9, NULL, 220001, 'aaaa', '2022-12-05 12:56:20', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 891, 0),
(10, NULL, 220001, 'aaaa', '2022-12-05 12:56:23', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', 0, 'author-comment.png', NULL, 0, 891, 0),
(12, NULL, 220003, 'aaaaa', '2022-12-05 12:57:09', 'Đinh Tấn Dũng Nè', 'dtd1201@gmail.com', 0, 'author-comment.png', NULL, 0, 891, 0),
(14, NULL, 220008, 'hay đấy gái', '2022-12-06 02:43:48', 'Nguyễn Phương Mai', 'npm0908@gmail.com', 0, 'author-comment.png', NULL, 0, 888, 0),
(15, NULL, 220008, 'xàm', '2022-12-06 02:43:58', 'Nguyễn Phương Mai', 'npm0908@gmail.com', 0, 'author-comment.png', NULL, 0, 891, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_total` double NOT NULL,
  `createtime` datetime NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `editTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `province`, `address`, `phone`, `cart_total`, `createtime`, `message`, `status`, `user_id`, `editTime`) VALUES
(15, 'sheezy01', 'ád', 'ad', '908113114', 330000, '2022-12-05 11:46:25', '', 1, 220001, '0000-00-00 00:00:00'),
(23, 'sheezy01', 'Thành phố Hồ Chí Minh', 'a', '908113114', 900000, '2022-12-05 18:24:36', '', 1, 220001, '0000-00-00 00:00:00'),
(18, 'sheezy01', 'Thành phố Hồ Chí Minh', 'aaa', '908113114', 2700000, '2022-12-05 16:36:33', '', 2, 220001, '0000-00-00 00:00:00'),
(30, 'lwtprettylaugh', 'Hồ Chí Minh', 'Số 1 Võ Văn Ngân', '9026154822222', 1650000, '2022-12-06 20:35:26', '', 0, 220003, NULL),
(31, 'RobinMeske', 'Thủ Đức', 'Đại học Bách Khoa TPHCM', '909484134', 1455000, '2022-12-06 20:43:20', '', 0, 220008, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(46, 29, 3, 12, 150000),
(45, 27, 3, 1, 150000),
(36, 20, 3, 3, 150000),
(35, 19, 4, 1, 300000),
(34, 19, 3, 1, 150000),
(33, 18, 4, 9, 300000),
(32, 17, 37, 1, 165000),
(31, 17, 4, 1, 300000),
(44, 26, 3, 1, 150000),
(43, 25, 37, 1, 165000),
(42, 24, 3, 20, 150000),
(41, 23, 41, 1, 1000000),
(40, 22, 41, 2, 1000000),
(39, 21, 37, 1, 165000),
(38, 21, 4, 2, 300000),
(37, 20, 4, 3, 300000),
(30, 16, 37, 5, 165000),
(29, 15, 37, 2, 165000),
(47, 29, 37, 1, 165000),
(48, 30, 37, 10, 165000),
(49, 31, 3, 4, 150000),
(50, 31, 37, 7, 165000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `editBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editDate` datetime DEFAULT NULL,
  `totalView` int(11) DEFAULT 0,
  `saleoff` tinyint(11) DEFAULT 0,
  `percentoff` int(11) DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type_id`, `category_id`, `description`, `price`, `color`, `material`, `size`, `detail`, `createBy`, `createDate`, `editBy`, `editDate`, `totalView`, `saleoff`, `percentoff`, `img1`, `img2`, `img3`, `img4`, `slug`) VALUES
(2, 'Áo caro sọc xanh', 3, 2, 'ÁO HOODIE UNISEX là trang phục rất được nhiều người yêu thích trong nước và cả nước ngoài. ', 165000, 'Xanh dương', 'Vải Nỉ Bông', 'Size S,M,L,XL', '<p>- Bảng Size:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Size S: Cao &lt; 1m55, nặng &lt; 40kg</p>\r\n	</li>\r\n	<li>\r\n	<p>Size M: Cao 1m55 &ndash; 1m65, nặng 45 - 55kg</p>\r\n	</li>\r\n	<li>\r\n	<p>Size L: Cao 1m65 &ndash; 1m75, nặng 55 - 65kg</p>\r\n	</li>\r\n	<li>\r\n	<p>Size XL: Cao 1m75 &ndash; 1m80, nặng 65 - 75kg</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>🔥 TH&Ocirc;NG TIN CHI TIẾT :<br />\r\n- T&ecirc;n sản phẩm: &Aacute;o Hoodie Unisex đ&ocirc;i form rộng nam nữ vải Nỉ B&ocirc;ng ADLV<br />\r\n- Chất liệu: Vải Nỉ B&ocirc;ng<br />\r\n- M&agrave;u sắc: ĐEN, TRẮNG, X&Aacute;M, N&Acirc;U, BE - Xuất xứ: Việt Nam<br />\r\n<br />\r\n🔥GIỚI THIỆU SẢN PHẨM &Aacute;O HOODIE UNISEX l&agrave; trang phục rất được nhiều người y&ecirc;u th&iacute;ch trong nước v&agrave; cả nước ngo&agrave;i.<br />\r\n<br />\r\nChiếc &Aacute;O HOODIE FORM RỘNG lu&ocirc;n được sự quan t&acirc;m của giới trẻ mỗi khi sản phẩm lại c&oacute; mẫu thiết kế mới, đa dạng mẫu m&atilde; ph&ugrave; hợp cho cả nam, nữ c&ugrave;ng với nhiều phong c&aacute;ch kh&aacute;c nhau. &Aacute;O HOODIE NỈ B&Ocirc;NG l&agrave; một trang phục kh&ocirc;ng thể thiếu trong tủ quần &aacute;o của m&igrave;nh. Hiện nay &Aacute;O HOODIE Đ&Ocirc;I l&agrave; Item phổ biến v&agrave; rất được nhiều giới trẻ y&ecirc;u th&iacute;ch tại Việt Nam. L&agrave; sản phẩm thời trang xuất ph&aacute;t từ Th&agrave;nh phố New York &ndash; Th&agrave;nh phố kh&ocirc;ng bao giờ ngủ. V&igrave; vậy th&igrave; thiết kế của n&oacute; cũng được hướng tới phong c&aacute;ch thời trang đường phố New York. &Aacute;O HOODIE NAM NỮ tay d&agrave;i form rộng kh&ocirc;ng x&ugrave; thể hiện phong c&aacute;ch casual. Với thiết kế kh&aacute; rộng r&atilde;i, c&oacute; mũ, với độ d&agrave;i đến ngang h&ocirc;ng, mặc thoải m&aacute;i h&agrave;ng ng&agrave;y.<br />\r\n<br />\r\n&Aacute;O HOODIE th&iacute;ch hợp cho c&aacute;c hoạt động ngo&agrave;i trời, đi học, đi l&agrave;m, đi chơi c&ugrave;ng gia đ&igrave;nh hoặc bạn b&egrave;. &Aacute;O HOODIE UNISEX l&agrave; trang phục mang phong c&aacute;ch street style, phong c&aacute;ch d&agrave;nh cho giới trẻ đang ng&agrave;y c&agrave;ng được ưa chuộng bởi thiết kế đơn giản, dễ phối th&iacute;ch hợp cho cả nam lẫn nữ, n&oacute; nhanh ch&oacute;ng chiếm được cảm t&igrave;nh của c&aacute;c bạn trẻ v&agrave; khuấy đảo thị trường. &Aacute;o được may bằng chất liệu nỉ, thun,&hellip; thường c&oacute; kh&oacute;a để mặc như một chiếc &aacute;o kho&aacute;c hoặc kh&ocirc;ng kh&oacute;a như một chiếc &aacute;o ph&ocirc;ng. Đ&acirc;y l&agrave; một loại trang phục m&ugrave;a thu đ&ocirc;ng kh&aacute; l&yacute; tưởng d&agrave;nh cho c&aacute;c teen.</p>\r\n', '', '2020-05-06', 'sheezy01', '2022-12-06 20:21:52', 1167, 1, 12, 'quan-hang-hieu-2img1.jpg', 'quan-hang-hieu-2img2.jpg', 'quan-hang-hieu-2img3.jpg', 'quan-hang-hieu-2img4.jpg', 'ao-caro-soc-xanh'),
(3, ' Áo sơ mi sọc', 3, 2, 'Áo sơ mi nam POLYS Fullbox, Vải Chéo Thái 6 Màu dày dặn, co giãn, thoáng khí. Áo sơ mi tay ngắn Cổ Vest CUBAN SHIRT', 150000, 'Đỏ, Xanh', ' Vải Chéo Thái', 'L,XL,XXL', '<p>✅ CHI TIẾT SẢN PHẨM</p>\r\n\r\n<p>⚜️ &Aacute;o Sơ Mi Nam CUBAN BASIC SHIRT</p>\r\n\r\n<p>- Được thiết kế bởi Team POLYS.</p>\r\n\r\n<p>- Chất liệu: Vải Ch&eacute;o Th&aacute;i cao cấp, d&agrave;y dặn, mềm mịn, &iacute;t nhăn, co gi&atilde;n 4 chiều v&agrave; thấm h&uacute;t tốt. Gi&uacute;p người mặc tho&aacute;ng m&aacute;t, kh&ocirc;ng g&ograve; b&oacute; hay hầm b&iacute;. Cam kết kh&ocirc;ng ra m&agrave;u kh&ocirc;ng bai nh&atilde;u.</p>\r\n\r\n<p>- D&aacute;ng &aacute;o su&ocirc;ng vừa, l&ecirc;n form thoải m&aacute;i nhưng vẫn vừa vặn với người mặc.</p>\r\n\r\n<p>- Thiết kế, trẻ trung, dễ d&agrave;ng kết hợp c&ugrave;ng quần Jeans, Kaki hoặc Short. Đi tiệc, du lịch hay dạo phố c&ugrave;ng bạn b&egrave; đều ph&ugrave; hợp.<br />\r\n&nbsp;</p>\r\n\r\n<p>✅ CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ</p>\r\n\r\n<p>(&Aacute;p dụng trong 7 ng&agrave;y kể từ khi nhận h&agrave;ng)</p>\r\n\r\n<p>- Sản phẩm vẫn c&ograve;n nguy&ecirc;n tag.</p>\r\n\r\n<p>- Sản phẩm chưa qua sử dụng v&agrave; giặt ủi.</p>\r\n\r\n<p>- Sản phẩm kh&ocirc;ng bị lỗi hoặc bẩn do kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Chỉ hỗ trợ đổi size, kh&ocirc;ng đổi m&agrave;u hoặc mẫu kh&aacute;c.</p>\r\n\r\n<p>- Qu&aacute; hạn 7 ng&agrave;y POLYS xin từ chối hỗ trợ với bất cứ l&yacute; do g&igrave;.</p>\r\n', '', '2020-03-18', 'sheezy01', '2022-12-06 20:22:03', 33, 1, 50, 'ao-3img1.jpg', 'ao-3img2.jpg', 'ao-3img3.jpg', 'ao-3img4.jpg', '-ao-so-mi-soc'),
(36, 'Đầm baby doll trắng khoét eo tay bồng - Mi dress', 1, 560, '', 245000, 'Trắng', 'Vải', 'S M', '☀ TH&Ocirc;NG TIN SẢN PHẨM<br />\r\nSize: S M M&agrave;u: Trắng Mẫu: 1m65 52kg mặc size M<br />\r\n☀ CHỌN SIZE S: V1 80 V2 66 V3 86 M: V1 86 V2 70 V3 94<br />\r\nĐộ d&agrave;i:<br />\r\n☀️ CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ Hỗ trợ đổi size trong v&ograve;ng 3 ng&agrave;y sau khi kh&aacute;ch h&agrave;ng nhận được h&agrave;ng.<br />\r\nChỉ hỗ trợ đổi nếu sản phẩm c&ograve;n size. Ph&iacute; đổi trả kh&aacute;ch vui l&ograve;ng thanh to&aacute;n.', 'sheezy01', '2022-12-04', '', '0000-00-00 00:00:00', 0, 0, 0, 'dam-baby-doll-trang-khoet-eo-tay-bong---mi-dress-36img1.jpg', 'dam-baby-doll-trang-khoet-eo-tay-bong---mi-dress-36img2.jpg', NULL, NULL, 'dam-baby-doll-trang-khoet-eo-tay-bong---mi-dress'),
(4, 'Áo Sơ Mi Đủ Màu Trắng Đen Xanh Đỏ Bạc Dành Cho Nam Và Nữ Siêu Sales Hot Nhất NhyNhy-Fashion Trong Năm Nay 1006', 2, 2, 'áo cổ sơ mi, tay dài', 300000, 'Xám, Xanh Rêu', 'Vị dâu , sữa béo, thạch ,pudding, chân châu...', 'M, L, XL', 'Với sự ngọt ng&agrave;o được chiết xuất từ những tr&aacute;i&nbsp;<strong>d&acirc;u t&acirc;y</strong>&nbsp;thơm ngon đ&atilde; cho ra đời một loại<strong>&nbsp;tr&agrave; sữa</strong>&nbsp;hấp dẫn với trẻ nhỏ bởi m&agrave;u sắc được h&ograve;a quyện một c&aacute;ch dễ chịu. M&agrave;u hồng v&agrave; vị ngọt lu&ocirc;n l&agrave; những điểm ưu ti&ecirc;n h&agrave;ng đầu m&agrave; mọi người th&iacute;ch nhất, cộng v&agrave;o đ&oacute; l&agrave; hương thơm của loại quả kỳ diệu n&agrave;y đ&atilde; l&agrave;m m&ecirc; mẩn kh&ocirc;ng chỉ ri&ecirc;ng với c&aacute;c em nhỏ m&agrave; ngay đối với người lớn cũng bị ảnh hưởng theo.<br />\r\n<br />\r\nTr&agrave; sữa vị d&acirc;u thơm vị tr&agrave;, vị sữa beo b&eacute;o..k&egrave;m thạch gi&ograve;n gi&ograve;n, pudding, ch&acirc;n ch&acirc;u nhai mềm dai hấp dẫn.<br />\r\n<br />\r\nĐặt h&agrave;ng ngay qu&aacute;n m&igrave;nh hỗ trợ free ship trong b&aacute;n k&iacute;nh 5km v&agrave; hỗ trợ tận t&igrave;nh cũng như c&oacute; nhiều ưu đ&atilde;i cho c&aacute;c kh&aacute;ch h&agrave;ng th&acirc;n thiết ạ.<br />\r\n<br />\r\nC&aacute;c bạn nhớ tạo 1 t&agrave;i khoản v&agrave; đặt h&agrave;ng để lưu đơn h&agrave;ng thật nhiều, qu&aacute;n m&igrave;nh sẽ c&oacute; nhiều ưu đ&atilde;i cho kh&aacute;ch h&agrave;ng th&acirc;n thiết nh&eacute;! Cảm ơn c&aacute;c bạn.<br />\r\n<br />\r\n<strong>HDSD</strong>: D&ugrave;ng ngay<br />\r\n<br />\r\n<strong>Bảo quản</strong>: Tr&aacute;nh &aacute;nh nắng trực tiếp<br />\r\n<br />\r\nCam Kết Vệ Sinh An To&agrave;n Thực Phẩm.<br />\r\n<br />\r\nQu&yacute; kh&aacute;ch c&oacute; thể t&ugrave;y chọn nhiều thạch hoặc nhiều ch&acirc;n ch&acirc;u( Khi đặt h&agrave;ng qu&yacute; kh&aacute;ch nhớ ghi lời nhắn lại nh&eacute;&nbsp;<img alt=\"heart\" src=\"http://localhost/php-mvc-shop/admin/themes/plugins/ckeditor/plugins/smiley/images/heart.png\" title=\"heart\" />)', '', '2020-03-19', 'sheezy01', '2022-12-05 18:13:21', 212, 1, 7, 'ao-so-mi-du-mau-trang-den-xanh-do-bac-danh-cho-nam-va-nu-sieu-sales-hot-nhat-nhynhy-fashion-trong-nam-nay-1006-4img1.jpg', 'ao-so-mi-du-mau-trang-den-xanh-do-bac-danh-cho-nam-va-nu-sieu-sales-hot-nhat-nhynhy-fashion-trong-nam-nay-1006-4img2.jpg', 'ao-so-mi-du-mau-trang-den-xanh-do-bac-danh-cho-nam-va-nu-sieu-sales-hot-nhat-nhynhy-fashion-trong-nam-nay-1006-4img3.jpg', 'ao-so-mi-du-mau-trang-den-xanh-do-bac-danh-cho-nam-va-nu-sieu-sales-hot-nhat-nhynhy-fashion-trong-nam-nay-1006-4img4.jpg', 'ao-so-mi-du-mau-trang-den-xanh-do-bac-danh-cho-nam-va-nu-sieu-sales-hot-nhat-nhynhy-fashion-trong-nam-nay-1006'),
(37, 'Đầm váy thiên thần dáng xòe xinh xắn 2 màu sắc (Trắng, Đen) thời trang nữ Bonucci', 1, 560, 'Đầm nữ lụa hoa cổ vuông tay phồng dáng xòe siêu xinh, đa dạng màu sắc thích hợp cho nàng dạo phố, dự tiệc', 165000, 'Trắng, Đen', 'Lụa', 'S,M,L', '☘️ Chất lụa. Đ&acirc;y l&agrave; loại vải c&oacute; độ bền m&agrave;u rất cao, chống k&eacute;o d&atilde;n v&agrave; x&ocirc; dạt, tuy nhi&ecirc;n khả năng chống nhăn v&agrave; thấm h&uacute;t mồ h&ocirc;i rất k&eacute;m do c&oacute; th&agrave;nh phần nhung kh&aacute; cao do vậy khi nhận h&agrave;ng kh&aacute;ch nhớ giặt v&agrave; ủi qua 1 lần đảm bảo sẽ rất rất đẹp chẳng kh&aacute;c g&igrave; h&agrave;ng shop 200k 300k đ&acirc;u ạ. Chất vải n&agrave;y do b&ecirc;n shop em tự đi chọn vải v&agrave; gia c&ocirc;ng số lượng lớn để tối ưu chi ph&iacute; n&ecirc;n kh&aacute;ch b&ecirc;n em cứ y&ecirc;n t&acirc;m ạ.<br />\r\n☘️ Nếu kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng với sản phẩm Đầm nữ lụa hoa cổ vu&ocirc;ng tay phồng d&aacute;ng x&ograve;e si&ecirc;u xinh, đa dạng m&agrave;u sắc th&iacute;ch hợp cho n&agrave;ng dạo phố, dự tiệc b&ecirc;n em th&igrave; đừng qu&ecirc;n đ&aacute;nh gi&aacute; k&egrave;m nhận x&eacute;t t&iacute;ch cực cho shop em với nha v&igrave; mỗi 1 đ&aacute;nh gi&aacute; t&iacute;ch cực b&ecirc;n em sẽ gửi tặng voucher mua h&agrave;ng giảm gi&aacute; 10k cho lần sau đ&oacute; ạ.<br />\r\n☘️ Đầm nữ lụa hoa cổ vu&ocirc;ng tay phồng d&aacute;ng x&ograve;e si&ecirc;u xinh, đa dạng m&agrave;u sắc th&iacute;ch hợp cho n&agrave;ng dạo phố, dự tiệc xinh hết nấc cho chị em nh&agrave; m&igrave;nh, xưởng nh&agrave; may bao đẹp chuẩn b&aacute;n shop lu&ocirc;n n&agrave;.', 'sheezy01', '2022-12-04', 'sheezy01', '2022-12-06 20:04:45', 0, 0, 0, 'dam-vay-thien-than-dang-xoe-xinh-xan-2-mau-sac--trang--den--thoi-trang-nu-bonucci-37img1.png', 'dam-vay-thien-than-dang-xoe-xinh-xan-2-mau-sac--trang--den--thoi-trang-nu-bonucci-37img2.png', 'dam-vay-thien-than-dang-xoe-xinh-xan-2-mau-sac--trang--den--thoi-trang-nu-bonucci-37img3.png', 'dam-vay-thien-than-dang-xoe-xinh-xan-2-mau-sac--trang--den--thoi-trang-nu-bonucci-37img4.png', 'dam-vay-thien-than-dang-xoe-xinh-xan-2-mau-sac--trang--den--thoi-trang-nu-bonucci'),
(38, 'Sét bộ thun gân tay ngắn phối quần dài suông sang chảnh, quý phái dạo phố với nhiều màu sắc', 1, 560, 'Sét bộ thun gân tay ngắn phối quần dài suông sang chảnh, quý phái dạo phố với nhiều màu sắc\r\n', 145, 'Vàng, Trắng Đỏ', 'Thun gân', 'Freesize', '☘️ Form: Freesize (40-55kg t&ugrave;y chiều cao)<br />\r\n☘️ V1: dưới 86cm<br />\r\n☘️ V2: dưới 71cm<br />\r\n☘️ 1m50 &ndash; 1m55 từ 40 &ndash; 45kg vừa<br />\r\n☘️ 1m55 &ndash; 1m6 từ 44 &ndash; 50kg vừa<br />\r\n☘️ Tr&ecirc;n 1m6 từ 46 &ndash; 56kg vừa<br />\r\n☘️ Chất: Thun g&acirc;n. Chất vải n&agrave;y do b&ecirc;n shop em tự đi chọn vải v&agrave; gia c&ocirc;ng số lượng lớn để tối ưu chi ph&iacute; n&ecirc;n kh&aacute;ch b&ecirc;n em cứ y&ecirc;n t&acirc;m ạ.<br />\r\n☘️ Nếu kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng với sản phẩm b&ecirc;n em th&igrave; đừng qu&ecirc;n đ&aacute;nh gi&aacute; k&egrave;m nhận x&eacute;t t&iacute;ch cực cho shop em với nha v&igrave; mỗi 1 đ&aacute;nh gi&aacute; t&iacute;ch cực b&ecirc;n em sẽ gửi tặng voucher mua h&agrave;ng giảm gi&aacute; 10k cho lần sau đ&oacute; ạ.', 'sheezy01', '2022-12-04', 'sheezy01', '2022-12-04 00:04:37', 0, 0, 0, 'set-bo-thun-gan-tay-ngan-phoi-quan-dai-suong-sang-chanh--quy-phai-dao-pho-voi-nhieu-mau-sac-38img1.png', 'set-bo-thun-gan-tay-ngan-phoi-quan-dai-suong-sang-chanh--quy-phai-dao-pho-voi-nhieu-mau-sac-38img2.png', 'set-bo-thun-gan-tay-ngan-phoi-quan-dai-suong-sang-chanh--quy-phai-dao-pho-voi-nhieu-mau-sac-38img3.png', 'set-bo-thun-gan-tay-ngan-phoi-quan-dai-suong-sang-chanh--quy-phai-dao-pho-voi-nhieu-mau-sac-38img4.png', 'set-bo-thun-gan-tay-ngan-phoi-quan-dai-suong-sang-chanh--quy-phai-dao-pho-voi-nhieu-mau-sac'),
(41, 'GIÀY ADIDAS SUPERNOVA NAM ĐEN TRẮNG', 1, 2, 'Air Jordan 12 Retro', 1000000, 'Trắng', 'Da', '39,40,41', '<p>No need to call for a ride&mdash;MJ&#39;s game-winning look from &#39;96 will get you where you need to go. This AJ12 is the return of Tinker Hatfield&#39;s celebrated design, the first to bring Zoom Air cushioning to Jordan&#39;s signature line. Premium materials give it a seasonal refresh, while the sunrise-inspired stitch lines on the upper hook back to the original. This is buzzer-beater style, perfected.</p>\r\n&nbsp;\r\n\r\n<p><strong>Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Genuine leather and textile materials in the upper for durability.</li>\r\n	<li>Foam midsole with full-length Zoom Air cushioning for responsiveness.</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Carbon fiber shank</li>\r\n	<li>Rubber outsole</li>\r\n	<li>Shown: Black/Taxi</li>\r\n	<li>Style: CT8013-071</li>\r\n</ul>\r\n', 'sheezy01', '2022-12-05', 'sheezy01', '2022-12-06 20:07:26', 0, 1, 10, 'giay-41img1.png', 'giay-41img2.png', NULL, NULL, 'giay-adidas-supernova-nam-den-trang');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_description`, `slug`) VALUES
(1, 'SẢN PHẨM NỔI BẬT (HOT)', '', 'san-pham-noi-bat'),
(2, 'SẢN PHẨM MỚI', '', 'san-pham-moi'),
(3, 'SẢN PHẨM GIẢM GIÁ', '', 'san-pham-giam-gia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `banned` date DEFAULT NULL,
  `editTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `dob`, `createDate`, `username`, `fullname`, `email`, `phone_num`, `address`, `password`, `avatar`, `role`, `banned`, `editTime`) VALUES
(220001, '2022-12-08', '2022-11-26', 'sheezy01', 'Hồ Hữu An Nè An', 'hha2602@gmail.com', '908113114', '108 Đường số 1,Cư xá Phú Lâm C mở rộng, Phường An Lạc A, Quận Bình Tân, Thành phố Hồ Chí Minh', 'hha123', 'avatar-user220001-sheezy01.png', 1, '2022-11-24', '2022-12-06 20:27:37'),
(220003, NULL, '2022-11-26', 'lwtprettylaugh', 'Đinh Tấn Dũng Nè', 'dtd1201@gmail.com', '9026154822222', '123 Bạch Đằng, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh', 'd0@nx3mp@w0rd', 'avatar-user220003-lwtprettylaugh.png', 0, '0000-00-00', '2022-12-05 17:53:55'),
(220006, '2000-06-19', '2022-11-26', 'monroevicious', 'Lê Tuấn Tú', 'ltt1906@gmail.com', '908154875', '343/18K Tô Hiến Thành, Phường 12, Quận 10, Thành phố Hồ Chí Minh', 'zcnu2494', 'avatar-user220006-monroevicious.png', 0, '2023-01-07', '2022-12-05 16:21:40'),
(220008, '2002-08-09', '2022-11-26', 'RobinMeske', 'Nguyễn Phương Mai', 'npm0908@gmail.com', '909484134', '132A Thân Nhân Trung, Phường 13, Quận Tân Bình, Thành phố Hồ Chí Minh', 'npmireact', 'avatar-user220008-robinmeske.png', 0, '0000-00-00', '2022-12-05 17:53:47'),
(220011, '1997-12-25', '2022-11-26', 'BlissfulEats', 'Phạm Thiên An', 'kathleen97@gmail.com', '982561254', '207/18 Bạch Đằng, Phường 15, Quận Bình Thạnh, Thành phố Hồ Chí Minh', 'avas1312', NULL, 0, '2022-12-10', '2022-11-29 20:33:49'),
(220012, '2004-08-03', '2022-11-26', 'eliseotecleo', 'Trần Ngọc Bảo', 'baobaosyd@gmail.com', '905123345', '256/26/11A Phan Huy Ích, Phường 12, Quận Gò Vấp, Thành phố Hồ Chí Minh', 'sdny24214', NULL, 0, NULL, '0000-00-00 00:00:00'),
(220013, '2000-10-04', '2022-11-26', 'kaylanabrewer_', 'Nguyễn Thanh Danh', 'danh.nthaha@gmai.com', '907070705', '911/7/25 B Tỉnh Lộ 43, Khu phố 2, Phường Bình Chiểu, Thành phố Thủ Đức, Thành phố Hồ Chí Minh', '@jkfasb21', NULL, 0, NULL, '0000-00-00 00:00:00'),
(220014, '2001-12-12', '2022-11-26', 'americacredit', 'Nguyễn Trần Quốc Duy', 'aramurf@gmail.com', '984134875', 'Số 40, Đường 3C, Khu Dân Cư 13C Nguyễn Văn Linh, Xã Phong Phú, Huyện Bình Chánh, Thành phố Hồ Chí Minh', 'nabjf@ba', NULL, NULL, NULL, NULL),
(220021, NULL, NULL, 'k', 'k', '', '', '', '123', 'avatar-user220021-k.png', 0, '2022-12-30', '2022-12-06 09:02:28'),
(220022, NULL, NULL, 'davidhuynh', 'Huỳnh Đại Vinh', 'vinhhuynh@hcmut.edu.vn', '0234234234', '602A Nguyễn Trãi', '123456', 'avatar-user220022-davidhuynh.jpg', 0, NULL, '2022-12-06 20:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_types`
--
ALTER TABLE `blog_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supply_id` (`supply_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product` (`product_id`),
  ADD KEY `fk_id_user` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_id_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_type_id` (`type_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=892;

--
-- AUTO_INCREMENT for table `blog_types`
--
ALTER TABLE `blog_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
