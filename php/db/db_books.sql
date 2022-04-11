-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 25 มี.ค. 2022 เมื่อ 11:02 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET FOREIGN_KEY_CHECKS=0;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdata`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_book`
--

CREATE TABLE `tb_book` (
  `book_id` int NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_detail` varchar(255) NOT NULL,
  `book_user` text NOT NULL,
  `book_techer` varchar(255) NOT NULL,
  `book_year` int NOT NULL,
  `book_date` datetime NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `book_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- dump ตาราง `tb_book`
--

INSERT INTO `tb_book` (`book_id`, `book_name`, `book_detail`, `book_user`, `book_techer`, `book_year`, `book_date`, `book_status`, `book_code`) VALUES
(1, 'หนังสือวิทยาศาสตร์', '', '', '', 2560, '2021-10-20 00:00:00', 'ปกติ', ''),
(2, 'หนังสือวิทยาศาสตร์ ระดับมัธยมศึกษา', '', '', '', 2560, '2022-10-20 00:00:00', 'ปกติ', ''),
(4, 'วันพีช', '', '', '', 2560, '2022-10-24 00:00:00', 'ปกติ', 'A0001'),
(5, 'python', '', 'uoi', '', 2561, '2022-03-24 00:00:00', 'ปกติ', 'j21'),
(6, 'css', '', 'qq', '', 2564, '2022-03-24 00:00:00', 'ปกติ', 'i9'),
(7, 'Html', '', 'aa', '', 2563, '2022-03-24 00:00:00', 'ปกติ', 's89');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_detail`
--

CREATE TABLE `tb_detail` (
  `detail_id` int NOT NULL,
  `history_id` int NOT NULL,
  `book_id` int NOT NULL,
  `status_lend` int NOT NULL,
  `fine` int NOT NULL,
  `lent_date_strat` datetime NOT NULL,
  `lend_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- dump ตาราง `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `history_id`, `book_id`, `status_lend`, `fine`, `lent_date_strat`, `lend_date_end`) VALUES
(14, 27, 1, 1, 0, '2022-03-25 07:35:14', '2022-04-24 00:00:00'),
(15, 28, 4, 1, 0, '2022-03-25 08:24:26', '2022-04-24 00:00:00'),
(16, 29, 6, 1, 0, '2022-03-25 09:21:16', '2022-04-24 00:00:00'),
(17, 30, 5, 1, 0, '2022-03-25 09:27:03', '2022-04-24 00:00:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_history`
--

CREATE TABLE `tb_history` (
  `history_id` int NOT NULL,
  `user_id` int NOT NULL,
  `history_date` datetime NOT NULL,
  `history_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- dump ตาราง `tb_history`
--

INSERT INTO `tb_history` (`history_id`, `user_id`, `history_date`, `history_status`) VALUES
(27, 23, '2022-03-25 07:35:14', 0),
(28, 23, '2022-03-25 08:24:26', 0),
(29, 23, '2022-03-25 09:21:16', 0),
(30, 23, '2022-03-25 09:27:03', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- dump ตาราง `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `student_id`, `password`, `name`, `lastname`, `address`, `number`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', 1),
(2, '1234', '1234', 'test1', 'ta', '', '', 0),
(23, 'test2', '1234', 'test2', 'qq', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `history_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
