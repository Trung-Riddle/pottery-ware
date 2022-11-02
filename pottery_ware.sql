-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 11:22 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(9) NOT NULL COMMENT 'id_giỏ_hàng',
  `id_order` int(9) DEFAULT NULL COMMENT 'id_đơn_hàng',
  `id_pro` int(9) DEFAULT NULL COMMENT 'id_sản_phẩm',
  `amount` int(3) NOT NULL DEFAULT 0 COMMENT 'số_lượng_sản_phẩm',
  `name_pro` varchar(100) NOT NULL COMMENT 'tên_sản_phẩm',
  `price_pro` double(10,0) NOT NULL COMMENT 'giá_sản_phẩm',
  `img_pro` varchar(200) NOT NULL COMMENT 'ảnh_sản_phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL COMMENT 'id_danh_mục',
  `name_cate` varchar(100) NOT NULL COMMENT 'tên_danh_mục',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'trạng_thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_cate`, `status`) VALUES
(1, 'vi', 1),
(2, 'hoa', 1),
(3, 'quả', 1),
(4, 'xoài', 1),
(5, 'xczxc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(9) NOT NULL COMMENT 'id_comment',
  `id_user` int(9) DEFAULT NULL COMMENT 'id_user',
  `id_pro` int(9) DEFAULT NULL COMMENT 'id_sản_phẩm',
  `user_name` varchar(50) NOT NULL COMMENT 'tên_user',
  `name_pro` varchar(100) NOT NULL COMMENT 'tên_sản_phẩm',
  `content` varchar(500) NOT NULL COMMENT 'nội_dung',
  `date_add` date NOT NULL COMMENT 'ngày_post',
  `status_cmt` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_pro`, `user_name`, `name_pro`, `content`, `date_add`, `status_cmt`) VALUES
(1, NULL, NULL, 'chungdi', 'bình hoa', 'hello', '2022-11-02', 0),
(2, NULL, NULL, 'trung', 'bình den', 'hello', '2022-11-02', 1),
(3, NULL, NULL, 'kien', 'hoa tuoi', 'hello', '2022-11-02', 1),
(5, NULL, NULL, 'duyen', 'bình hoa', 'hello', '2022-11-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(9) NOT NULL COMMENT 'id_đơn_hàng',
  `id_user` int(9) DEFAULT NULL COMMENT 'id_khách_hàng',
  `code_order` varchar(20) NOT NULL COMMENT 'mã_đơn_hàng',
  `total_order` double(10,0) NOT NULL COMMENT 'tổng_giá_trị_đơn_hàng',
  `payment_method` varchar(50) NOT NULL COMMENT 'phương_thức_thanh_toán',
  `user_name` varchar(50) NOT NULL COMMENT 'tên_khách_hàng',
  `address` varchar(200) NOT NULL COMMENT 'địa_chỉ_khách_hàng',
  `email` varchar(50) NOT NULL COMMENT 'email_khách_hàng',
  `number_phone` varchar(12) NOT NULL COMMENT 'số_điện_thoại_khách_hàng',
  `status_order` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'trạng_thái_đơn_hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(9) NOT NULL COMMENT 'id_sản_phẩm',
  `id_cate` int(9) DEFAULT NULL COMMENT 'id_danh_mục',
  `name_cate` varchar(100) NOT NULL COMMENT 'tên_danh_mục',
  `name_pro` varchar(100) NOT NULL COMMENT 'tên_sản_phẩm',
  `price_pro` double(10,0) NOT NULL COMMENT 'giá_sản_phẩm',
  `img_pro` varchar(200) NOT NULL COMMENT 'ảnh_sản_phẩm',
  `detail` varchar(500) DEFAULT NULL COMMENT 'mô_tả_sản_phẩm',
  `del` double(10,0) DEFAULT NULL COMMENT 'giảm_giá_sản_phẩm',
  `status_pro` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng_thái_sản_phẩm',
  `top_view` int(11) DEFAULT NULL COMMENT 'số_lượt_xem',
  `date_add` date NOT NULL COMMENT 'ngày_nhập_sản_phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_cate`, `name_cate`, `name_pro`, `price_pro`, `img_pro`, `detail`, `del`, `status_pro`, `top_view`, `date_add`) VALUES
(4, NULL, 'vi', 'makima', 25000, 'pottery-ware-makima.jpg', NULL, 20000, 0, NULL, '2022-11-02'),
(5, NULL, 'vi', 'vi', 30000, 'pottery-ware-vi.jpg', NULL, NULL, 1, NULL, '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL COMMENT 'id_user',
  `user_name` varchar(50) NOT NULL COMMENT 'tên_user',
  `password` varchar(100) NOT NULL COMMENT 'mật_khẩu_user',
  `avatar` varchar(200) DEFAULT NULL COMMENT 'ảnh_đại_diện_user',
  `email` varchar(50) NOT NULL COMMENT 'email_user',
  `phone_number` int(12) NOT NULL COMMENT 'số_điện_thoại_user',
  `status_user` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng_thái_tài_khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_cate` (`name_cate`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_order` (`code_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_pro` (`name_pro`),
  ADD UNIQUE KEY `img_pro` (`img_pro`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_giỏ_hàng';

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_danh_mục', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_comment', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_đơn_hàng';

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_sản_phẩm', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id_user';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
