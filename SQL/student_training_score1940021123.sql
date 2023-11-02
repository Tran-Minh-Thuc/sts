-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 02, 2023 at 12:42 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `permission_id` int DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `permission_id`, `user_name`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin', 'TRUE', '2023-10-15', '2023-10-15'),
(2, 2, '123456780', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(3, 2, '123456781', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(4, 4, '3119410420', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(5, 3, '3119410421', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(6, 3, '3119410422', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(7, 3, '3119410423', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(8, 3, '3119410424', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(9, 3, '3119410425', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(10, 3, '3119410426', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(11, 3, '3119410427', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(12, 3, '3119410428', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(13, 3, '3119410429', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(14, 3, '3119410430', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(15, 3, '3119410431', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(16, 3, '3119410432', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(17, 3, '3119410433', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(18, 3, '3119410434', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(19, 3, '3119410435', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(20, 3, '3119410436', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(21, 3, '3119410437', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(22, 3, '3119410438', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(23, 3, '3119410439', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(24, 3, '3119410440', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(25, 3, '3119410441', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(26, 3, '3119410442', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(27, 3, '3119410443', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(28, 4, '3119410444', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(29, 3, '3120320426', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(30, 3, '3120320427', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(31, 3, '3120320428', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(32, 3, '3120320429', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(33, 3, '3120320430', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(34, 3, '3120320431', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(35, 3, '3120320432', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(36, 3, '3120320433', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(37, 3, '3120320434', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(38, 3, '3120320435', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(39, 3, '3120320436', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(40, 3, '3120320437', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(41, 3, '3120320438', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(42, 3, '3120320439', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(43, 3, '3120320440', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(44, 3, '3120320441', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(45, 3, '3120320442', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(46, 3, '3120320443', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(47, 3, '3120320444', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(48, 3, '3120320445', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(49, 3, '3120320446', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(50, 3, '3120320447', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(51, 3, '3120320448', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(52, 3, '3120320449', '123', 'TRUE', '2023-10-15', '2023-10-15'),
(53, 3, '3120320450', '123', 'TRUE', '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `teacher_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `teacher_id`, `name`, `department_name`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'DCT1198', 'Công nghệ thông tin', 1, '2023-10-15', '2023-10-15'),
(2, 2, 'DKE1201', 'Tài chính kế toán', 2, '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `begin_year` int DEFAULT NULL,
  `end_year` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `begin_year`, `end_year`, `created_at`, `updated_at`) VALUES
(1, 'Khóa 19', 2019, 2023, '2023-10-15', '2023-10-15'),
(2, 'Khóa 20', 2020, 2024, '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_criteria_id` int DEFAULT NULL,
  `max_score` int DEFAULT NULL,
  `default_score` int DEFAULT NULL,
  `is_violent` tinyint(1) DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `field_level` int DEFAULT NULL,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `parent_criteria_id`, `max_score`, `default_score`, `is_violent`, `weight`, `field_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đánh giá về ý thức và kết quả học tập', 1, 20, 20, 0, 1, 2, '0', '2023-10-15', '2023-11-02'),
(2, 'Đánh giá về ý thức và kết quả chấp hành quy chế, nội quy, quy định trong nhà trường', NULL, 25, 25, 0, 2, 1, '1', '2023-10-15', '2023-10-15'),
(3, 'Đánh giá về ý thức và kết quả tham gia các hoạt động chính trị - xã hội, văn hóa, văn nghệ, thể thao, phòng chống các tệ nạn xã hội', NULL, 20, 20, 0, 3, 1, '1', '2023-10-15', '2023-10-15'),
(4, 'Đánh giá ý thức công dân trong quan hệ cộng đồng', NULL, 25, 25, 0, 4, 1, '1', '2023-10-15', '2023-10-15'),
(5, 'Đánh giá về ý thức và kết quả tham gia phụ trách lớp, các đoàn thể trong nhà trường', NULL, 10, 10, 0, 5, 1, '1', '2023-10-15', '2023-10-15'),
(6, 'Tham gia các họat động đặc biệt do nhà trường huy động', NULL, 15, 15, 0, 6, 1, '1', '2023-10-15', '2023-10-15'),
(7, 'Đạt giải thưởng trong các kì thi cấp tỉnh thành trở lên', NULL, 15, 15, 0, 7, 1, '1', '2023-10-15', '2023-10-15'),
(8, 'Kết quả học tập', 1, 14, 14, 0, 1, 2, '1', '2023-10-15', '2023-10-15'),
(9, 'Tinh thần vượt khó trong học tập', 1, 6, 6, 0, 2, 2, '1', '2023-10-15', '2023-10-15'),
(10, 'Tham gia nghiên cứu khoa học (NCKH)', 1, 6, 6, 0, 3, 2, '1', '2023-10-15', '2023-10-15'),
(11, 'Tham gia rèn luyện nghiệp vụ (RLNV)', 1, 6, 6, 0, 4, 2, '1', '2023-10-15', '2023-10-15'),
(12, 'Tham gia câu lạc bộ học thuật', 1, 6, 6, 0, 5, 2, '1', '2023-10-15', '2023-10-15'),
(13, 'Thành viên đội tuyển dự thi Olympic các môn học', 1, 10, 10, 0, 6, 2, '1', '2023-10-15', '2023-10-15'),
(14, 'Chấp hành tốt nội quy, quy chế của nhà trường', 2, 15, 15, 0, 1, 2, '1', '2023-10-15', '2023-10-15'),
(15, 'Tham gia đầy đủ các buổi họp của trường, khoa, CVHT, lớp tổ chức', 2, 10, 10, 0, 2, 2, '1', '2023-10-15', '2023-10-15'),
(16, 'Một lần vi phạm quy chế, quy định của trường (có biên bản xử lý)', 2, 10, 10, 1, 3, 2, '1', '2023-10-15', '2023-10-15'),
(17, 'Vắng 01 buổi họp do trường, khoa, CVHT, lớp tổ chức không lý do', 1, 5, 5, 0, 4, 3, '1', '2023-10-15', '2023-11-02'),
(18, 'Tham gia các hoạt động chính trị – xã hội do nhà trường quy định', 3, 10, 10, 0, 1, 2, '1', '2023-10-15', '2023-10-15'),
(19, 'Tham gia hoạt động văn hóa, văn nghệ, TDTT, phòng chống TNXH…', 3, 5, 5, 0, 2, 2, '1', '2023-10-15', '2023-10-15'),
(20, 'Tham gia trong đội tuyển văn nghệ, TDTT', 3, 15, 15, 0, 3, 2, '1', '2023-10-15', '2023-10-15'),
(21, 'Chấp hành tốt các chủ trương, chính sách, pháp luật của nhà nước', 4, 10, 10, 0, 1, 2, '1', '2023-10-15', '2023-10-15'),
(22, 'Được biểu dương người tốt, việc tốt ở nhà trường hoặc ở địa phương (có giấy chứng nhận)', 4, 5, 5, 0, 2, 2, '1', '2023-10-15', '2023-10-15'),
(23, 'Tham gia các hoạt động tình nguyện trung hạn: MHX, Tiếp sức mùa thi', 4, 10, 10, 0, 3, 2, '1', '2023-10-15', '2023-10-15'),
(24, 'Tham gia các công tác xã hội và các hoạt động tình nguyện ngắn ngày (có xác nhận của đơn vị tổ chức)', 4, 10, 10, 0, 4, 2, '1', '2023-10-15', '2023-10-15'),
(25, 'Có tinh thần chia sẻ, giúp đỡ người có khó khăn, hoạn nạn', 4, 5, 5, 0, 5, 2, '1', '2023-10-15', '2023-10-15'),
(26, 'Tham gia hiến máu tình nguyện', 4, 5, 5, 0, 6, 2, '1', '2023-10-15', '2023-10-15'),
(27, 'Tham gia hội thao GDQP –AN cấp quận, cấp TP', 4, 5, 5, 0, 7, 2, '1', '2023-10-15', '2023-10-15'),
(28, 'Vi phạm ATGT, trật tự công cộng (có giấy báo gửi về trường)', 4, 10, 10, 1, 8, 2, '1', '2023-10-15', '2023-10-15'),
(29, 'Lớp trưởng, BCH Đoàn trường, BCH Hội sinh viên trường', 5, 10, 10, 0, 1, 2, '1', '2023-10-15', '2023-10-15'),
(30, 'Lớp phó, BCH Đoàn khoa, BCH LCH SV; BCH CĐ, BCH chi hội lớp', 5, 8, 8, 0, 2, 2, '1', '2023-10-15', '2023-10-15'),
(31, 'Tổ trưởng, tổ phó', 5, 3, 3, 0, 3, 2, '1', '2023-10-15', '2023-10-15'),
(32, 'Đảng viên', 5, 8, 8, 0, 4, 2, '1', '2023-10-15', '2023-10-15'),
(33, 'Đối tượng Đảng', 5, 8, 8, 0, 5, 2, '1', '2023-10-15', '2023-10-15'),
(34, 'Đoàn viên TNCS Hồ Chí Minh', 5, 5, 5, 0, 6, 2, '1', '2023-10-15', '2023-10-15'),
(35, 'Được Đoàn thanh niên, Hội sinh viên biểu dương, khen thưởng', 5, 3, 3, 0, 7, 2, '1', '2023-10-15', '2023-10-15'),
(36, 'Điểm trung bình chung học kì từ 3,60 đến 4,00', 8, 14, 14, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(37, 'Điểm trung bình chung học kì từ 3,20 đến 3,59', 8, 12, 12, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(38, 'Điểm trung bình chung học kì từ 2,50 đến 3,19', 8, 10, 10, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(39, 'Điểm trung bình chung học kì từ 2,00 đến 2,49', 8, 5, 5, 0, 4, 3, '1', '2023-10-15', '2023-10-15'),
(40, 'Điểm trung bình chung học kì dưới 2,00', 8, 0, 0, 0, 5, 3, '1', '2023-10-15', '2023-10-15'),
(41, 'Kết quả học tập tăng một bậc so với học kỳ trước, ĐTBCHK từ 2,00 trở lên', 9, 3, 3, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(42, 'Kết quả học tập tăng hai bậc so với học kỳ trước, ĐTBCHK từ 2,00 trở lên', 9, 6, 6, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(43, 'Sinh viên năm thứ I, nếu có kết quả học tập HK I từ 2,00 trở lên', 9, 3, 3, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(44, 'Khóa luận tốt nghiệp từ loại giỏi trở lên', 10, 6, 6, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(45, 'Đề tài NCKH cấp trường từ loại giỏi trở lên', 10, 6, 6, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(46, 'Đề tài NCKH cấp trường từ loại đạt trở lên', 10, 5, 5, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(47, 'Tham gia hội thi RLNV cấp khoa', 11, 2, 2, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(48, 'Tham gia hội thi RLNV cấp trường', 11, 4, 4, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(49, 'Tham gia hội thi RLNV toàn quốc', 11, 4, 4, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(50, 'Tham gia đầy đủ các buổi hội thảo khoa học, báo cáo chuyên đề', 11, 2, 2, 0, 4, 3, '1', '2023-10-15', '2023-10-15'),
(51, 'Ban chủ nhiệm câu lạc bộ cấp khoa', 12, 4, 4, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(52, 'Ban chủ nhiệm câu lạc bộ cấp trường', 12, 6, 6, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(53, 'Thành viên tham gia thường xuyên các câu lạc bộ học thuật', 12, 2, 2, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(54, 'Cấp khoa', 13, 4, 4, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(55, 'Cấp trường', 13, 6, 6, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(56, 'Cấp toàn quốc', 13, 10, 10, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(57, 'Tham gia đầy đủ các buổi sinh hoạt chính trị xã hội theo quy định', 18, 10, 10, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(58, 'Vắng mặt 01 buổi không lý do', 18, 5, 5, 1, 2, 3, '1', '2023-10-15', '2023-10-15'),
(59, 'Cấp khoa', 20, 5, 5, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(60, 'Cấp trường', 20, 10, 10, 0, 2, 3, '1', '2023-10-15', '2023-10-15'),
(61, 'Được khen thưởng toàn quốc', 20, 15, 15, 0, 3, 3, '1', '2023-10-15', '2023-10-15'),
(62, 'Cấp khoa', 35, 5, 5, 0, 1, 3, '1', '2023-10-15', '2023-10-15'),
(63, 'Cấp trường, cấp thành phố', 35, 10, 10, 0, 2, 3, '1', '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int NOT NULL,
  `semester_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `begin_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `begin_register_time` datetime DEFAULT NULL,
  `end_register_time` datetime DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-10-15', '2023-10-15'),
(2, 'giảng viên', '2023-10-15', '2023-10-15'),
(3, 'sinh viên', '2023-10-15', '2023-10-15'),
(4, 'lớp trưởng', '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Học kì 1 năm 2023', 2023, '2023-10-15', '2023-10-15'),
(2, 'Học kì 2 năm 2023', 2023, '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `student_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `id_citizent` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `account_id`, `class_id`, `full_name`, `sex`, `date_of_birth`, `place_of_birth`, `phone_number`, `id_citizent`, `email`, `created_at`, `updated_at`) VALUES
(1, '3119410420', 4, 1, 'Trần Minh Thức', 'Nam', '2001-02-05', 'Khánh Hòa', 941604852, '225812345', 'tranminhthuc79@gmail.com', '2023-10-15', '2023-10-15'),
(2, '3119410421', 5, 1, 'Lê Đức Thành', 'Nam', '2001-07-13', 'Hồ Chí Minh', 987123456, '225834567', 'example1@gmail.com', '2023-10-15', '2023-10-15'),
(3, '3119410422', 6, 1, 'Trần Thị Hằng', 'Nữ', '2001-04-24', 'Long An', 908234567, '225856789', 'testuser2@yahoo.com', '2023-10-15', '2023-10-15'),
(4, '3119410423', 7, 1, 'Lê Văn Hùng', 'Nam', '2001-09-09', 'Tiền Giang', 919345678, '225878901', 'dummyemail3@hotmail.com', '2023-10-15', '2023-10-15'),
(5, '3119410424', 8, 1, 'Phạm Thị Linh', 'Nữ', '2001-12-18', 'Bến Tre', 970456789, '225890123', 'fakeemail4@gmail.com', '2023-10-15', '2023-10-15'),
(6, '3119410425', 9, 1, 'Hoàng Văn Quang', 'Nam', '2001-03-29', 'Trà Vinh', 961567890, '225812345', 'user5@example.com', '2023-10-15', '2023-10-15'),
(7, '3119410426', 10, 1, 'Ngô Thị Bích', 'Nữ', '2001-06-06', 'Vĩnh Long', 942678901, '225834567', 'tempmail6@yahoo.com', '2023-10-15', '2023-10-15'),
(8, '3119410427', 11, 1, 'Huỳnh Văn Hòa', 'Nam', '2001-08-15', 'Đồng Tháp', 933789012, '225856789', 'sample7@hotmail.com', '2023-10-15', '2023-10-15'),
(9, '3119410428', 12, 1, 'Võ Thị Trang', 'Nữ', '2001-11-01', 'Sóc Trăng', 924890123, '225878901', 'fauxemail8@gmail.com', '2023-10-15', '2023-10-15'),
(10, '3119410429', 13, 1, 'Đặng Văn Thanh', 'Nam', '2001-05-22', 'Cần Thơ', 955901234, '225890123', 'testuser9@example.com', '2023-10-15', '2023-10-15'),
(11, '3119410430', 14, 1, 'Bùi Thị Thu', 'Nữ', '2001-10-04', 'An Giang', 986012345, '225812345', 'fakeemail10@yahoo.com', '2023-10-15', '2023-10-15'),
(12, '3119410431', 15, 1, 'Trịnh Văn Tâm', 'Nam', '2001-01-28', 'Kiên Giang', 977123456, '225834567', 'example11@hotmail.com', '2023-10-15', '2023-10-15'),
(13, '3119410432', 16, 1, 'Đỗ Thị Mai', 'Nữ', '2001-09-17', 'Cà Mau', 968234567, '225856789', 'dummyemail12@gmail.com', '2023-10-15', '2023-10-15'),
(14, '3119410433', 17, 1, 'Hồ Văn Đức', 'Nam', '2001-07-10', 'Bạc Liêu', 959345678, '225878901', 'testuser13@example.com', '2023-10-15', '2023-10-15'),
(15, '3119410434', 18, 1, 'Lý Thị Ngọc', 'Nữ', '2001-04-03', 'Hậu Giang', 940456789, '225890123', 'fauxemail14@yahoo.com', '2023-10-15', '2023-10-15'),
(16, '3119410435', 19, 1, 'Mai Văn Lâm', 'Nam', '2001-12-25', 'Đồng Nai', 931567890, '225812345', 'example15@hotmail.com', '2023-10-15', '2023-10-15'),
(17, '3119410436', 20, 1, 'Đinh Thị Hoài', 'Nữ', '2001-02-14', 'Bà Rịa - Vũng Tàu', 922678901, '225834567', 'fakeemail16@gmail.com', '2023-10-15', '2023-10-15'),
(18, '3119410437', 21, 1, 'Phan Văn Tuấn', 'Nam', '2001-06-19', 'Tây Ninh', 913789012, '225856789', 'tempmail17@example.com', '2023-10-15', '2023-10-15'),
(19, '3119410438', 22, 1, 'Trương Thị Tuyết', 'Nữ', '2001-08-02', 'Bình Dương', 904890123, '225878901', 'user18@yahoo.com', '2023-10-15', '2023-10-15'),
(20, '3119410439', 23, 1, 'Đoàn Văn Trung', 'Nam', '2001-03-11', 'Bình Phước', 985901234, '225890123', 'test19@hotmail.com', '2023-10-15', '2023-10-15'),
(21, '3119410440', 24, 1, 'Nguyễn Thị Hà', 'Nữ', '2001-01-07', 'Lâm Đồng', 976012345, '225812345', 'example20@gmail.com', '2023-10-15', '2023-10-15'),
(22, '3119410441', 25, 1, 'Trần Văn Minh', 'Nam', '2001-10-30', 'Ninh Thuận', 967123456, '225834567', 'dummy21@example.com', '2023-10-15', '2023-10-15'),
(23, '3119410442', 26, 1, 'Lê Thị Phương', 'Nữ', '2001-08-23', 'Bình Thuận', 958234567, '225856789', 'sample22@yahoo.com', '2023-10-15', '2023-10-15'),
(24, '3119410443', 27, 1, 'Phạm Văn Nam', 'Nam', '2001-05-08', 'Khánh Hòa', 949345678, '225878901', 'tempmail23@hotmail.com', '2023-10-15', '2023-10-15'),
(25, '3119410444', 28, 1, 'Hoàng Thị Thu', 'Nữ', '2001-11-21', 'Phú Yên', 930456789, '225890123', 'fake24@gmail.com', '2023-10-15', '2023-10-15'),
(26, '3120320426', 29, 2, 'Lê Thị Mai', 'Nữ', '1995-02-15', 'Bình Thuận', 921567890, '225812345', 'testuser25@example.com', '2023-10-15', '2023-10-15'),
(27, '3120320427', 30, 2, 'Nguyễn Văn Đức', 'Nam', '1988-07-24', 'Bình Thuận', 902678901, '225834567', 'fauxemail26@yahoo.com', '2023-10-15', '2023-10-15'),
(28, '3120320428', 31, 2, 'Trần Thanh Tùng', 'Nam', '1992-04-09', 'Bình Thuận', 983789012, '225856789', 'example27@hotmail.com', '2023-10-15', '2023-10-15'),
(29, '3120320429', 32, 2, 'Hoàng Thị Hà', 'Nữ', '2000-11-03', 'Bình Phước', 914890123, '225878901', 'testuser28@gmail.com', '2023-10-15', '2023-10-15'),
(30, '3120320430', 33, 2, 'Phạm Văn Hoài', 'Nam', '1998-12-18', 'Bình Phước', 975901234, '225890123', 'sample29@example.com', '2023-10-15', '2023-10-15'),
(31, '3120320431', 34, 2, 'Ngô Thị Loan', 'Nữ', '1994-06-29', 'Sóc Trăng', 966012345, '225812345', 'fauxemail30@yahoo.com', '2023-10-15', '2023-10-15'),
(32, '3120320432', 35, 2, 'Bùi Văn Nam', 'Nam', '1990-09-06', 'Sóc Trăng', 957123456, '225834567', 'tempmail31@hotmail.com', '2023-10-15', '2023-10-15'),
(33, '3120320433', 36, 2, 'Đặng Văn Hùng', 'Nam', '1997-08-14', 'Sóc Trăng', 948234567, '225856789', 'user32@example.com', '2023-10-15', '2023-10-15'),
(34, '3120320434', 37, 2, 'Lý Thị Ngọc', 'Nữ', '1986-01-01', 'Bình Phước', 939345678, '225878901', 'example33@yahoo.com', '2023-10-15', '2023-10-15'),
(35, '3120320435', 38, 2, 'Trần Văn Thanh', 'Nữ', '1983-05-22', 'Sóc Trăng', 920456789, '225890123', 'testuser34@hotmail.com', '2023-10-15', '2023-10-15'),
(36, '3120320436', 39, 2, 'Phan Thị Anh', 'Nữ', '1999-10-11', 'Sóc Trăng', 911567890, '225812345', 'fakeemail35@gmail.com', '2023-10-15', '2023-10-15'),
(37, '3120320437', 40, 2, 'Đinh Thị Lan', 'Nữ', '1982-04-28', 'Sóc Trăng', 902678901, '225834567', 'tempmail36@example.com', '2023-10-15', '2023-10-15'),
(38, '3120320438', 41, 2, 'Vũ Văn Tài', 'Nam', '1996-03-17', 'Bình Phước', 983789012, '225856789', 'sample37@yahoo.com', '2023-10-15', '2023-10-15'),
(39, '3120320439', 42, 2, 'Nguyễn Thị Trang', 'Nữ', '1991-07-30', 'Bình Phước', 974890123, '225878901', 'fauxemail38@hotmail.com', '2023-10-15', '2023-10-15'),
(40, '3120320440', 43, 2, 'Hoàng Văn Long', 'Nam', '1989-05-08', 'Vĩnh Long', 965901234, '225890123', 'user39@gmail.com', '2023-10-15', '2023-10-15'),
(41, '3120320441', 44, 2, 'Lê Văn Khánh', 'Nam', '1984-11-21', 'Đồng Tháp', 956012345, '225812345', 'example40@example.com', '2023-10-15', '2023-10-15'),
(42, '3120320442', 45, 2, 'Trịnh Thị Thùy', 'Nữ', '1987-06-04', 'Sóc Trăng', 947123456, '225834567', 'testuser41@yahoo.com', '2023-10-15', '2023-10-15'),
(43, '3120320443', 46, 2, 'Đỗ Văn Đông', 'Nam', '1993-09-13', 'Cần Thơ', 938234567, '225856789', 'dummyemail42@hotmail.com', '2023-10-15', '2023-10-15'),
(44, '3120320444', 47, 2, 'Nguyễn Thanh Hà', 'Nữ', '1997-03-02', 'An Giang', 929345678, '225878901', 'fakeemail43@gmail.com', '2023-10-15', '2023-10-15'),
(45, '3120320445', 48, 2, 'Trần Thị Hương', 'Nữ', '2001-10-16', 'Kiên Giang', 910456789, '225890123', 'example44@example.com', '2023-10-15', '2023-10-15'),
(46, '3120320446', 49, 2, 'Trương Thị Tuyết', 'Nữ', '1992-12-25', 'Vĩnh Long', 901567890, '225812345', 'tempmail45@yahoo.com', '2023-10-15', '2023-10-15'),
(47, '3120320447', 50, 2, 'Đoàn Văn Trung', 'Nam', '1981-08-07', 'Đồng Tháp', 982678901, '225834567', 'user46@hotmail.com', '2023-10-15', '2023-10-15'),
(48, '3120320448', 51, 2, 'Trần Văn Minh', 'Nam', '1998-04-19', 'Sóc Trăng', 973789012, '225856789', 'sample47@gmail.com', '2023-10-15', '2023-10-15'),
(49, '3120320449', 52, 2, 'Võ Thị Trang', 'Nữ', '1985-02-10', 'Cần Thơ', 964890123, '225878901', 'fauxemail48@example.com', '2023-10-15', '2023-10-15'),
(50, '3120320450', 53, 2, 'Phạm Thị Linh', 'Nữ', '1980-01-27', 'An Giang', 955901234, '225624518', 'testuser49@yahoo.com', '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `teacher_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `id_citizent` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_code`, `account_id`, `full_name`, `sex`, `date_of_birth`, `place_of_birth`, `phone_number`, `id_citizent`, `email`, `created_at`, `updated_at`) VALUES
(1, '123456780', 2, 'Đặng Thị Thư', 'Nữ', '1972-06-15', 'Hà Nội', 981234567, '123456789012', 'dangthithu@gmail.com', '2023-10-15', '2023-10-18'),
(2, '123456781', 3, 'Lý Văn Hoàng', 'Nữ', '1979-08-23', 'Hồ Chí Minh', 902345678, '234567890123', 'lyvanhoang@email.com', '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `transcripts`
--

CREATE TABLE `transcripts` (
  `id` int NOT NULL,
  `semester_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `evaluate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_score` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transcripts`
--

INSERT INTO `transcripts` (`id`, `semester_id`, `student_id`, `evaluate`, `total_score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'chưa đánh giá', NULL, '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `transcript_detail`
--

CREATE TABLE `transcript_detail` (
  `id` int NOT NULL,
  `criteria_id` int DEFAULT NULL,
  `transcript_id` int DEFAULT NULL,
  `score` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paren_criteria_id` (`parent_criteria_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_code` (`teacher_code`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `transcript_detail`
--
ALTER TABLE `transcript_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_id` (`criteria_id`),
  ADD KEY `transcript_id` (`transcript_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transcripts`
--
ALTER TABLE `transcripts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transcript_detail`
--
ALTER TABLE `transcript_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `criterias_ibfk_1` FOREIGN KEY (`parent_criteria_id`) REFERENCES `criterias` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD CONSTRAINT `transcripts_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `transcripts_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `transcript_detail`
--
ALTER TABLE `transcript_detail`
  ADD CONSTRAINT `transcript_detail_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `transcript_detail_ibfk_2` FOREIGN KEY (`transcript_id`) REFERENCES `transcripts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
