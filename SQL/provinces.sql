-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 08, 2023 at 01:01 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_training_score`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Hà Nội'),
(2, 'Hồ Chí Minh'),
(3, 'Hà Giang'),
(4, 'Cao Bằng'),
(5, 'Lai Châu'),
(6, 'Lào Cai'),
(7, 'Tuyên Quang'),
(8, 'Lạng Sơn'),
(9, 'Bắc Kạn'),
(10, 'Thái Nguyên'),
(11, 'Yên Bái'),
(12, 'Sơn La'),
(14, 'Phú Thọ'),
(15, 'Hòa Bình'),
(17, 'Hải Dương'),
(18, 'Hải Phòng'),
(19, 'Hưng Yên'),
(20, 'Thái Bình'),
(21, 'Hà Nam'),
(22, 'Nam Định'),
(23, 'Ninh Bình'),
(24, 'Quảng Ninh'),
(25, 'Thanh Hóa'),
(26, 'Nghệ An'),
(27, 'Hà Tĩnh'),
(28, 'Quảng Bình'),
(29, 'Quảng Trị'),
(30, 'Thừa Thiên-Huế'),
(31, 'Đà Nẵng'),
(32, 'Quảng Nam'),
(33, 'Quảng Ngãi'),
(34, 'Bình Định'),
(35, 'Phú Yên'),
(36, 'Khánh Hòa'),
(37, 'Ninh Thuận'),
(38, 'Bình Thuận'),
(39, 'Kon Tum'),
(40, 'Gia Lai'),
(41, 'Đắk Lắk'),
(42, 'Đắk Nông'),
(43, 'Lâm Đồng'),
(44, 'Bình Phước'),
(45, 'Tây Ninh'),
(46, 'Bình Dương'),
(47, 'Đồng Nai'),
(48, 'Bà Rịa-Vũng Tàu'),
(49, 'Long An'),
(50, 'Tiền Giang'),
(51, 'Bến Tre'),
(52, 'Trà Vinh'),
(53, 'Vĩnh Long'),
(54, 'Dong Thap'),
(55, 'An Giang'),
(56, 'Kiên Giang'),
(57, 'Cần Thơ'),
(58, 'Hậu Giang'),
(59, 'Sóc Trăng'),
(60, 'Bạc Liêu'),
(61, 'Cà Mau'),
(62, 'Long An'),
(63, 'Vĩnh Phúc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
