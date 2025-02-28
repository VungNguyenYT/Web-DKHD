-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `max_slots` int(11) NOT NULL,
  `registered_slots` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `max_slots`, `registered_slots`) VALUES
(1, 'Hoạt động về nguồn', 'Tham quan Đền thờ Bác', 30, 1),
(3, 'Hỗ trợ trang trí tết tại chùa Long Khánh', 'trang trí tết', 5, 3),
(4, 'Về nguồn Ao bà om', 'Địa điểm Ao Bà Om\r\nThời gian: 8h', 4, 4),
(5, 'Chuyến về nguồn tại Bảo tàng Văn hóa Dân tộc Khmer kết hợp tổ chức Dã ngoại tại khu di tích Ao Bà Om nhân dịp kỷ niệm 94 năm ngày Thành lập Đoàn Thanh niên Cộng sản Hồ Chí Minh (26/3/1931 – 26/3/2025)', '? Ngày diễn ra: Ngày 02/03/2025 (Chủ nhật)\r\n? Địa điểm: Bảo tàng Văn hóa Dân tộc Khmer, tọa lạc tại Khóm 4, Phường 8, TP Trà Vinh (nằm cạnh khu Di tích Ao Bà Om.\r\n?Trang phục: Áo Đoàn Thanh Niên + áo thun để tham gia trò chơi dã ngoại (khuyến khích áo tối màu).                                                                                                                                                                                                                              \r\n✅ Quyền lợi: Được lập danh sách cộng điểm  rèn luyện.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `zalo_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `activity_id`, `full_name`, `student_id`, `class_id`, `zalo_phone`) VALUES
(9, 3, 'Nguyễn Văn Vửng', '110121132', 'DA21TTA', '03474872012'),
(10, 3, 'Nguyễn Thị Thùy Trang', '115621097', 'DA21DC', '3543435625'),
(11, 3, 'A', 'A', 'A', 'A'),
(12, 4, 'Nguyễn Văn Vửng', '110121132', 'DA21TTA', '0347482012'),
(13, 4, 'Nguyễn Thị Thùy Trang', '115621097', 'DA21DC', '0123456789'),
(14, 4, 'Nguyễn Thị Thùy Trang', '115621097', 'DA21DC', '0123456789'),
(15, 4, 'Nguyễn Thị Thùy Trang', '115621097', 'DA21DC', '0123456789'),
(16, 1, 'a', 'a', 'a', 'a'),
(17, 5, 'Nguyễn Thị Thùy Trang', '115621097', 'DA21DC', '0347482012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
