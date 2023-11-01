-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 01, 2023 at 01:53 PM
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
-- Database: `student_trainning_score`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `permission_id` int DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `teacher_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `begin_year` int DEFAULT NULL,
  `end_year` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_criteria_id` int DEFAULT NULL,
  `max_score` int DEFAULT NULL,
  `default_score` int DEFAULT NULL,
  `is_violent` tinyint(1) DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `parent_criteria_id`, `max_score`, `default_score`, `is_violent`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Đánh giá về ý thức và kết quả học tập', NULL, 20, 20, 0, 1, '2023-10-15', '2023-10-15'),
(2, 'Đánh giá về ý thức và kết quả chấp hành quy chế, nội quy, quy định trong nhà trường', NULL, 25, 25, 0, 2, '2023-10-15', '2023-10-15'),
(3, 'Đánh giá về ý thức và kết quả tham gia các hoạt động chính trị - xã hội, văn hóa, văn nghệ, thể thao, phòng chống các tệ nạn xã hội', NULL, 20, 20, 0, 3, '2023-10-15', '2023-10-15'),
(4, 'Đánh giá ý thức công dân trong quan hệ cộng đồng', NULL, 25, 25, 0, 4, '2023-10-15', '2023-10-15'),
(5, 'Đánh giá về ý thức và kết quả tham gia phụ trách lớp, các đoàn thể trong nhà trường', NULL, 10, 10, 0, 5, '2023-10-15', '2023-10-15'),
(6, 'Tham gia các họat động đặc biệt do nhà trường huy động', NULL, 15, 15, 0, 6, '2023-10-15', '2023-10-15'),
(7, 'Đạt giải thưởng trong các kì thi cấp tỉnh thành trở lên', NULL, 15, 15, 0, 7, '2023-10-15', '2023-10-15'),
(8, 'Kết quả học tập', 1, 14, 14, 0, 1, '2023-10-15', '2023-10-15'),
(9, 'Tinh thần vượt khó trong học tập', 1, 6, 6, 0, 2, '2023-10-15', '2023-10-15'),
(10, 'Tham gia nghiên cứu khoa học (NCKH)', 1, 6, 6, 0, 3, '2023-10-15', '2023-10-15'),
(11, 'Tham gia rèn luyện nghiệp vụ (RLNV)', 1, 6, 6, 0, 4, '2023-10-15', '2023-10-15'),
(12, 'Tham gia câu lạc bộ học thuật', 1, 6, 6, 0, 5, '2023-10-15', '2023-10-15'),
(13, 'Thành viên đội tuyển dự thi Olympic các môn học', 1, 10, 10, 0, 6, '2023-10-15', '2023-10-15'),
(14, 'Chấp hành tốt nội quy, quy chế của nhà trường', 2, 15, 15, 0, 1, '2023-10-15', '2023-10-15'),
(15, 'Tham gia đầy đủ các buổi họp của trường, khoa, CVHT, lớp tổ chức', 2, 10, 10, 0, 2, '2023-10-15', '2023-10-15'),
(16, 'Một lần vi phạm quy chế, quy định của trường (có biên bản xử lý)', 2, 10, 10, 1, 3, '2023-10-15', '2023-10-15'),
(17, 'Vắng 01 buổi họp do trường, khoa, CVHT, lớp tổ chức không lý do', 2, 5, 5, 1, 4, '2023-10-15', '2023-10-15'),
(18, 'Tham gia các hoạt động chính trị – xã hội do nhà trường quy định', 3, 10, 10, 0, 1, '2023-10-15', '2023-10-15'),
(19, 'Tham gia hoạt động văn hóa, văn nghệ, TDTT, phòng chống TNXH…', 3, 5, 5, 0, 2, '2023-10-15', '2023-10-15'),
(20, 'Tham gia trong đội tuyển văn nghệ, TDTT', 3, 15, 15, 0, 3, '2023-10-15', '2023-10-15'),
(21, 'Chấp hành tốt các chủ trương, chính sách, pháp luật của nhà nước', 4, 10, 10, 0, 1, '2023-10-15', '2023-10-15'),
(22, 'Được biểu dương người tốt, việc tốt ở nhà trường hoặc ở địa phương (có giấy chứng nhận)', 4, 5, 5, 0, 2, '2023-10-15', '2023-10-15'),
(23, 'Tham gia các hoạt động tình nguyện trung hạn: MHX, Tiếp sức mùa thi', 4, 10, 10, 0, 3, '2023-10-15', '2023-10-15'),
(24, 'Tham gia các công tác xã hội và các hoạt động tình nguyện ngắn ngày (có xác nhận của đơn vị tổ chức)', 4, 10, 10, 0, 4, '2023-10-15', '2023-10-15'),
(25, 'Có tinh thần chia sẻ, giúp đỡ người có khó khăn, hoạn nạn', 4, 5, 5, 0, 5, '2023-10-15', '2023-10-15'),
(26, 'Tham gia hiến máu tình nguyện', 4, 5, 5, 0, 6, '2023-10-15', '2023-10-15'),
(27, 'Tham gia hội thao GDQP –AN cấp quận, cấp TP', 4, 5, 5, 0, 7, '2023-10-15', '2023-10-15'),
(28, 'Vi phạm ATGT, trật tự công cộng (có giấy báo gửi về trường)', 4, 10, 10, 1, 8, '2023-10-15', '2023-10-15'),
(29, 'Lớp trưởng, BCH Đoàn trường, BCH Hội sinh viên trường', 5, 10, 10, 0, 1, '2023-10-15', '2023-10-15'),
(30, 'Lớp phó, BCH Đoàn khoa, BCH LCH SV; BCH CĐ, BCH chi hội lớp', 5, 8, 8, 0, 2, '2023-10-15', '2023-10-15'),
(31, 'Tổ trưởng, tổ phó', 5, 3, 3, 0, 3, '2023-10-15', '2023-10-15'),
(32, 'Đảng viên', 5, 8, 8, 0, 4, '2023-10-15', '2023-10-15'),
(33, 'Đối tượng Đảng', 5, 8, 8, 0, 5, '2023-10-15', '2023-10-15'),
(34, 'Đoàn viên TNCS Hồ Chí Minh', 5, 5, 5, 0, 6, '2023-10-15', '2023-10-15'),
(35, 'Được Đoàn thanh niên, Hội sinh viên biểu dương, khen thưởng', 5, 3, 3, 0, 7, '2023-10-15', '2023-10-15'),
(36, 'Điểm trung bình chung học kì từ 3,60 đến 4,00', 8, 14, 14, 0, 1, '2023-10-15', '2023-10-15'),
(37, 'Điểm trung bình chung học kì từ 3,20 đến 3,59', 8, 12, 12, 0, 2, '2023-10-15', '2023-10-15'),
(38, 'Điểm trung bình chung học kì từ 2,50 đến 3,19', 8, 10, 10, 0, 3, '2023-10-15', '2023-10-15'),
(39, 'Điểm trung bình chung học kì từ 2,00 đến 2,49', 8, 5, 5, 0, 4, '2023-10-15', '2023-10-15'),
(40, 'Điểm trung bình chung học kì dưới 2,00', 8, 0, 0, 0, 5, '2023-10-15', '2023-10-15'),
(41, 'Kết quả học tập tăng một bậc so với học kỳ trước, ĐTBCHK từ 2,00 trở lên', 9, 3, 3, 0, 1, '2023-10-15', '2023-10-15'),
(42, 'Kết quả học tập tăng hai bậc so với học kỳ trước, ĐTBCHK từ 2,00 trở lên', 9, 6, 6, 0, 2, '2023-10-15', '2023-10-15'),
(43, 'Sinh viên năm thứ I, nếu có kết quả học tập HK I từ 2,00 trở lên', 9, 3, 3, 0, 3, '2023-10-15', '2023-10-15'),
(44, 'Khóa luận tốt nghiệp từ loại giỏi trở lên', 10, 6, 6, 0, 1, '2023-10-15', '2023-10-15'),
(45, 'Đề tài NCKH cấp trường từ loại giỏi trở lên', 10, 6, 6, 0, 2, '2023-10-15', '2023-10-15'),
(46, 'Đề tài NCKH cấp trường từ loại đạt trở lên', 10, 5, 5, 0, 3, '2023-10-15', '2023-10-15'),
(47, 'Tham gia hội thi RLNV cấp khoa', 11, 2, 2, 0, 1, '2023-10-15', '2023-10-15'),
(48, 'Tham gia hội thi RLNV cấp trường', 11, 4, 4, 0, 2, '2023-10-15', '2023-10-15'),
(49, 'Tham gia hội thi RLNV toàn quốc', 11, 4, 4, 0, 3, '2023-10-15', '2023-10-15'),
(50, 'Tham gia đầy đủ các buổi hội thảo khoa học, báo cáo chuyên đề', 11, 2, 2, 0, 4, '2023-10-15', '2023-10-15'),
(51, 'Ban chủ nhiệm câu lạc bộ cấp khoa', 12, 4, 4, 0, 1, '2023-10-15', '2023-10-15'),
(52, 'Ban chủ nhiệm câu lạc bộ cấp trường', 12, 6, 6, 0, 2, '2023-10-15', '2023-10-15'),
(53, 'Thành viên tham gia thường xuyên các câu lạc bộ học thuật', 12, 2, 2, 0, 3, '2023-10-15', '2023-10-15'),
(54, 'Cấp khoa', 13, 4, 4, 0, 1, '2023-10-15', '2023-10-15'),
(55, 'Cấp trường', 13, 6, 6, 0, 2, '2023-10-15', '2023-10-15'),
(56, 'Cấp toàn quốc', 13, 10, 10, 0, 3, '2023-10-15', '2023-10-15'),
(57, 'Tham gia đầy đủ các buổi sinh hoạt chính trị xã hội theo quy định', 18, 10, 10, 0, 1, '2023-10-15', '2023-10-15'),
(58, 'Vắng mặt 01 buổi không lý do', 18, 5, 5, 1, 2, '2023-10-15', '2023-10-15'),
(59, 'Cấp khoa', 20, 5, 5, 0, 1, '2023-10-15', '2023-10-15'),
(60, 'Cấp trường', 20, 10, 10, 0, 2, '2023-10-15', '2023-10-15'),
(61, 'Được khen thưởng toàn quốc', 20, 15, 15, 0, 3, '2023-10-15', '2023-10-15'),
(62, 'Cấp khoa', 35, 5, 5, 0, 1, '2023-10-15', '2023-10-15'),
(63, 'Cấp trường, cấp thành phố', 35, 10, 10, 0, 2, '2023-10-15', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int NOT NULL,
  `semester_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `begin_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `begin_register_time` datetime DEFAULT NULL,
  `end_register_time` datetime DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `student_code` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `id_citizent` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `teacher_code` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `id_citizent` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcripts`
--

CREATE TABLE `transcripts` (
  `id` int NOT NULL,
  `semester_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `evaluate` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_score` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcripts`
--
ALTER TABLE `transcripts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
