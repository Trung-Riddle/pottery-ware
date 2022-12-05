-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 03:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pottery_ware`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bn_id` int(11) NOT NULL,
  `bn_img` varchar(300) NOT NULL,
  `bn_title` varchar(200) NOT NULL,
  `bn_content` text NOT NULL,
  `bn_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(9) NOT NULL COMMENT 'id_giỏ_hàng',
  `c_id_order` int(9) DEFAULT NULL COMMENT 'id_đơn_hàng',
  `c_id_pro` int(9) DEFAULT NULL COMMENT 'id_sản_phẩm',
  `c_price` double(10,0) NOT NULL COMMENT 'giá của sản phẩm đã mua',
  `c_amount` int(3) NOT NULL DEFAULT 0 COMMENT 'số_lượng_sản_phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(9) NOT NULL COMMENT 'id_danh_mục',
  `cate_name` varchar(100) NOT NULL COMMENT 'tên_danh_mục',
  `cate_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng_thái',
  `cate_created_at` date DEFAULT NULL COMMENT 'ngày tạo danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_status`, `cate_created_at`) VALUES
(43, 'Bát đĩa', 1, NULL),
(44, 'Bình cắm hoa', 1, NULL),
(45, 'Tượng', 1, NULL),
(46, 'Tranh treo tường', 1, NULL),
(47, 'Trang trí', 1, NULL),
(48, 'Phong thủy', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(9) NOT NULL COMMENT 'id_comment',
  `cmt_id_user` int(9) DEFAULT NULL COMMENT 'id_user',
  `cmt_id_pro` int(9) DEFAULT NULL COMMENT 'id_sản_phẩm',
  `cmt_content` varchar(500) NOT NULL COMMENT 'nội_dung',
  `cmt_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái của bình luận',
  `cmt_created_at` date DEFAULT NULL COMMENT 'Ngày thêm bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `cmt_id_user`, `cmt_id_pro`, `cmt_content`, `cmt_status`, `cmt_created_at`) VALUES
(61, 5, 1, 'quá tuyệt doiwfiii', 1, '2022-11-20'),
(63, 5, 98, 'quá đẹp đi ạ', 1, '2022-11-24'),
(65, 5, 93, 'ádasdasd', 1, '2022-11-24'),
(66, 5, 88, 'đẹp quá', 1, '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `cts_id` int(9) NOT NULL COMMENT 'id liên hệ',
  `cts_user_name` varchar(50) NOT NULL COMMENT 'tên của khách liên hệ',
  `cts_email` varchar(50) NOT NULL COMMENT 'email của khách liên hệ',
  `cts_title` varchar(100) NOT NULL COMMENT 'tiêu đề của form liên hệ',
  `cts_content` varchar(500) NOT NULL COMMENT 'nội dung của form liên hệ',
  `cts_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'trạng thái của form liên hệ',
  `cts_created_at` date NOT NULL COMMENT 'ngày tạo liên hệ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(9) NOT NULL COMMENT 'id của khách hàng',
  `cus_id_user` int(9) DEFAULT NULL COMMENT 'id của tài khoản',
  `cus_name` varchar(50) DEFAULT NULL COMMENT 'tên đầy đủ của khách hàng',
  `cus_email` varchar(50) NOT NULL COMMENT 'email của khách hàng',
  `cus_phone` varchar(12) DEFAULT NULL COMMENT 'số điện thoại của khách hàng',
  `cus_address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_id_user`, `cus_name`, `cus_email`, `cus_phone`, `cus_address`) VALUES
(5, 5, 'Chung Nhựt Vi', 'nhutvichung@gmail.com', '0366858660', 'không có');

-- --------------------------------------------------------

--
-- Table structure for table `images_prd`
--

CREATE TABLE `images_prd` (
  `img_id` int(9) NOT NULL COMMENT 'id của ảnh sản phẩm',
  `img_prd` varchar(200) DEFAULT NULL COMMENT 'ảnh sản phẩm',
  `img_created_at` date DEFAULT NULL COMMENT 'ngày thêm ảnh sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images_pts`
--

CREATE TABLE `images_pts` (
  `img_id` int(9) NOT NULL COMMENT 'id của ảnh bài viết',
  `img_pts` varchar(200) DEFAULT NULL COMMENT 'ảnh của bài viết',
  `content_pts` text NOT NULL COMMENT 'nội dung của bài viết',
  `img_created_at` date DEFAULT NULL COMMENT 'ngày tạo bài viết'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` int(9) NOT NULL COMMENT 'id_đơn_hàng',
  `ord_id_customer` int(9) DEFAULT NULL COMMENT 'id_khách_hàng',
  `ord_code` varchar(20) NOT NULL COMMENT 'mã_đơn_hàng',
  `ord_cus_name` varchar(50) NOT NULL COMMENT 'tên của khách hàng đặt hàng',
  `ord_payment` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'phương_thức_thanh_toán',
  `ord_address` varchar(200) NOT NULL COMMENT 'địa_chỉ_khách_hàng',
  `ord_email` varchar(50) NOT NULL COMMENT 'email_khách_hàng',
  `ord_phone` varchar(12) NOT NULL COMMENT 'số_điện_thoại_khách_hàng',
  `ord_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'trạng_thái_đơn_hàng',
  `ord_created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pts_id` int(9) NOT NULL COMMENT 'id_bài_viết',
  `pts_id_img` int(9) DEFAULT NULL COMMENT 'id của ảnh bài viết',
  `pts_img` varchar(200) NOT NULL COMMENT 'ảnh chính của bài viết',
  `pts_title` varchar(200) NOT NULL COMMENT 'tiêu_đề_bài_viết',
  `pts_created_at` date NOT NULL COMMENT 'ngày tạo bài viết',
  `pts_view` int(10) DEFAULT 0 COMMENT 'số lượt xem bài viết'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(9) NOT NULL COMMENT 'id_sản_phẩm',
  `prd_id_cate` int(9) DEFAULT NULL COMMENT 'id_danh_mục',
  `prd_id_img` int(9) DEFAULT NULL COMMENT 'id của ảnh sản phẩm',
  `prd_img` varchar(200) DEFAULT NULL COMMENT 'ảnh chính của sản phẩm',
  `prd_name` varchar(100) NOT NULL COMMENT 'tên_sản_phẩm',
  `prd_price` double(10,0) NOT NULL COMMENT 'giá_sản_phẩm',
  `prd_del` double(10,0) DEFAULT NULL COMMENT 'giảm giá sản phẩm',
  `prd_description` varchar(500) DEFAULT NULL COMMENT 'mô_tả_sản_phẩm',
  `prd_featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sản phẩm nổi bật',
  `prd_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng_thái_sản_phẩm',
  `prd_view` int(11) DEFAULT 0 COMMENT 'số_lượt_xem',
  `prd_created_at` date NOT NULL COMMENT 'ngày_nhập_sản_phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_id_cate`, `prd_id_img`, `prd_img`, `prd_name`, `prd_price`, `prd_del`, `prd_description`, `prd_featured`, `prd_status`, `prd_view`, `prd_created_at`) VALUES
(1, 43, NULL, 'pottery-ware-Bộ-2-bát-cao-cấp-gốm-sứ.jpg', 'Bộ 2 bát cao cấp gốm sứ\r\n', 3100000, NULL, '1ádsad', 0, 1, 333, '2022-11-08'),
(88, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-sứ-đại-dương.jpg', 'Bộ bát đĩa sứ đại dương', 2500000, NULL, '12', 0, 1, 67, '2022-11-08'),
(90, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-giọt-dầu.jpg', 'Bộ bát đĩa giọt dầu', 3500000, NULL, '1ádasdasd', 0, 1, 37, '0000-00-00'),
(91, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-sứ-lục-bảo.jpg', 'Bộ bát đĩa sứ lục bảo', 2100000, NULL, '1qwerwqerw', 0, 1, 3, '0000-00-00'),
(92, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-sa-mạc.jpg', 'Bộ bát đĩa sa mạc', 3500000, NULL, '1dsfadfdsf', 0, 1, 127, '0000-00-00'),
(93, 43, NULL, 'pottery-ware-Bộ-đĩa-đen-huyền-bí.jpg', 'Bộ đĩa đen huyền bí', 1700000, NULL, 'dvdsvasw', 0, 1, 67, '0000-00-00'),
(94, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-sứ-xanh-ngọc.jpg', 'Bộ bát đĩa sứ xanh ngọc', 3500000, NULL, 'ádfdsafsdaf', 0, 1, 13, '0000-00-00'),
(95, 43, NULL, 'pottery-ware-Bộ-bát-đĩa-mặt-trời.jpg', 'Bộ bát đĩa mặt trời', 1700000, NULL, 'ádfsdfsdf', 0, 1, 6, '0000-00-00'),
(96, 43, NULL, 'pottery-ware-Bộ-đĩa-sứ-xanh-huyền.jpg', 'Bộ đĩa sứ xanh huyền', 8500000, 0, 'ádfasfsdf', 0, 1, 211, '2022-11-30'),
(97, 43, NULL, 'pottery-ware-Bộ-xanh-dương-chim-hạt.jpg', 'Bộ xanh dương chim hạt', 3800000, NULL, 'dvzdxcvcx', 0, 1, 82, '0000-00-00'),
(98, 43, NULL, 'pottery-ware-Bộ-đĩa-mùa-thu.jpg', 'Bộ đĩa mùa thu', 1800000, 0, 'cxvzvxcvxc', 0, 1, 7, '2022-11-30'),
(99, 43, NULL, 'pottery-ware-Bộ-đĩa-cao-cấp-trời-sao.jpg', 'Bộ đĩa cao cấp trời sao', 6500000, 0, 'zdvcxvxczv', 0, 1, 37, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ur_id` int(9) NOT NULL COMMENT 'id_user',
  `ur_name` varchar(50) NOT NULL COMMENT 'tên_user',
  `ur_pass` varchar(100) NOT NULL COMMENT 'mật_khẩu_user',
  `ur_avatar` varchar(200) DEFAULT NULL COMMENT 'ảnh_đại_diện_user',
  `ur_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng_thái_tài_khoản',
  `ur_role` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'vai trò của tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ur_id`, `ur_name`, `ur_pass`, `ur_avatar`, `ur_status`, `ur_role`) VALUES
(1, 'potteryware', 'admin*duan1', NULL, 1, 2),
(5, 'chungdi', '123123123', 'pottery-ware-chungdi.png', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `id_order` (`c_id_order`),
  ADD KEY `id_pro` (`c_id_pro`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD UNIQUE KEY `name_cate` (`cate_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `id_user` (`cmt_id_user`),
  ADD KEY `id_pro` (`cmt_id_pro`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`cts_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_email` (`cus_email`),
  ADD UNIQUE KEY `cus_phone` (`cus_phone`),
  ADD KEY `cus_id_user` (`cus_id_user`);

--
-- Indexes for table `images_prd`
--
ALTER TABLE `images_prd`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `images_pts`
--
ALTER TABLE `images_pts`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`),
  ADD UNIQUE KEY `code_order` (`ord_code`),
  ADD KEY `id_user` (`ord_id_customer`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pts_id`),
  ADD KEY `pts_id_img` (`pts_id_img`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD UNIQUE KEY `name_pro` (`prd_name`),
  ADD UNIQUE KEY `prd_img` (`prd_img`),
  ADD KEY `prd_id_img` (`prd_id_img`),
  ADD KEY `prd_id_cate` (`prd_id_cate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ur_id`),
  ADD UNIQUE KEY `user_name` (`ur_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_giỏ_hàng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_danh_mục', AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_comment', AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `cts_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id liên hệ';

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id của khách hàng', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images_prd`
--
ALTER TABLE `images_prd`
  MODIFY `img_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id của ảnh sản phẩm';

--
-- AUTO_INCREMENT for table `images_pts`
--
ALTER TABLE `images_pts`
  MODIFY `img_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id của ảnh bài viết';

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ord_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_đơn_hàng', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pts_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_bài_viết', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_sản_phẩm', AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ur_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_user', AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id_order`) REFERENCES `order` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`c_id_pro`) REFERENCES `product` (`prd_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`cmt_id_pro`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`cmt_id_user`) REFERENCES `user` (`ur_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cus_id_user`) REFERENCES `user` (`ur_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `images_prd`
--
ALTER TABLE `images_prd`
  ADD CONSTRAINT `images_prd_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `product` (`prd_id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images_pts`
--
ALTER TABLE `images_pts`
  ADD CONSTRAINT `images_pts_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `posts` (`pts_id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ord_id_customer`) REFERENCES `customer` (`cus_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prd_id_cate`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
