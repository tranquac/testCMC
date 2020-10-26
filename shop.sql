-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 01:36 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Van Quac', 'quac@gmail.com', 'quacadmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'cmcInfosec', 'cmcInfosec@gmail.com', 'cmc', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `nguoibinhluan` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`binhluan_id`, `nguoibinhluan`, `binhluan`, `product_id`) VALUES
(9, 'Văn Quắc', 'bài viết rất bổ ích', 16),
(11, 'CMC', 'Em làm rất tốt', 16),
(12, 'Tống Hồng', 'Sản phẩm rất tuyệt. Tôi thích nó!', 16),
(20, 'Văn Quắc', 'hay!', 17),
(21, 'Tống Hồng', 'GOOD', 21),
(22, 'Văn Quắc', 'Rất đẹp', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(12, 'Lamborghini'),
(13, 'Ferrari '),
(14, 'Porsche'),
(15, 'Mountain Biking');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(25, 16, 'uva8668iqndvhev5a6db311qs3', 'SFD841', '9840', 1, '7118d10352.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(7, 'Super car'),
(8, 'Pro Car'),
(9, 'Best Car');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `money` int(255) NOT NULL DEFAULT 0,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `money`, `password`) VALUES
(4, 'Quắc Trần', 'Văn Quán - Hà Nội', 'Hà Nội', 'VN', '100000', '357721650', 'tranquac0312@gmail.com', 5000, 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Tấn Dũng', 'Triều Khúc', 'Hà Nội', 'VN', '100000', '98150000', 'tandung@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Ngọc Hiếu', 'Sơn Tây', 'Hà Nội', 'VN', '100000', '9886500', 'ngochieu@gmail.com', 55000, 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'Tống Hồng', 'Bắc Giang', 'Hà Nội', 'VN', '100000', '0328027737', 'tonghong@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Đình Thanh', 'Thanh Trì', 'Hà Nội', 'VN', '100000', '0981003510', 'dinhthanh@gmail.com', 5000, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL,
  `tratien` bit(1) NOT NULL DEFAULT b'0',
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `tratien`, `date_order`) VALUES
(1, 27, 'UI223', 4, 1, '7599', 'ae6589ee6e.jpg', b'1', b'0', '2020-10-23 10:31:57'),
(8, 16, 'SFD841', 5, 6, '59040', '7118d10352.jpg', b'0', b'0', '2020-10-23 10:31:57'),
(9, 16, 'SFD841', 5, 1, '9840', '7118d10352.jpg', b'0', b'0', '2020-10-23 10:35:47'),
(11, 27, 'UI223', 6, 1, '7599', 'ae6589ee6e.jpg', b'0', b'1', '2020-10-25 02:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(4, 'RX234', 7, 12, '<p>Perfect!</p>', 1, '10000', '40aae6686b.jpg'),
(7, 'GZ220', 7, 13, '<p>Good!</p>', 1, '15000', '28b7a29d48.jpg'),
(10, 'NX812', 7, 13, '<p>Good!</p>', 1, '30000', '11084e2463.jpg'),
(11, 'PUR770', 7, 13, '<p>Perfect!</p>', 0, '7200', '44255e1871.jpg'),
(13, 'SFS111', 7, 12, '<p>Oke!</p>', 1, '40000', '1e1f4e9c0c.jpg'),
(16, 'SFD841', 8, 12, '<p>Good!</p>', 0, '9840', '7118d10352.jpg'),
(17, 'FSD98415', 7, 13, '<p>Perfect!</p>', 0, '7400', '99d1770893.jpg'),
(19, 'WE111', 7, 13, '<p>Not bad!</p>', 1, '9480', 'bc08f3ddc3.jpg'),
(20, 'EF222', 9, 15, '<p>Pro!</p>', 1, '4960', 'd528b92412.jpg'),
(21, 'BIUGI25', 9, 14, '<p>NICE!</p>', 0, '8400', '437f569e32.jpg'),
(25, 'FSS12', 9, 15, '<p>Very good!</p>', 1, '4100', 'cc9dd29f6e.jpg'),
(27, 'UI223', 7, 13, '<p>Very Good!</p>', 1, '7599', 'ae6589ee6e.jpg'),
(28, '415SDF', 9, 12, '<p>OKE!</p>', 1, '11000', 'ea96927a12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
