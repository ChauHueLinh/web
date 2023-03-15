-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2023 at 02:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haisansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_password` varchar(50) NOT NULL,
  `level_id` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_password`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'suqihan', '47a8d450486c4e1494c4813d91e80675', 2, '2013-03-23', '2013-03-23'),
(2, 'dlynn', '47a8d450486c4e1494c4813d91e80675', 1, '2013-03-23', '2023-03-14'),
(3, 'userr', '47a8d450486c4e1494c4813d91e80675', 4, '2013-03-23', '2013-03-23'),
(4, 'staff', '47a8d450486c4e1494c4813d91e80675', 2, '2013-03-23', '2013-03-23'),
(5, 'chanyien', '47a8d450486c4e1494c4813d91e80675', 4, '2013-03-23', '2013-03-23'),
(6, 'testt', '47a8d450486c4e1494c4813d91e80675', 4, '2015-03-23', '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `girls`
--

CREATE TABLE `girls` (
  `girl_id` int NOT NULL,
  `girl_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `girl_info` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `girl_avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` int NOT NULL,
  `origin_id` int NOT NULL,
  `folder` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `girls`
--

INSERT INTO `girls` (`girl_id`, `girl_name`, `girl_info`, `girl_avatar`, `price`, `origin_id`, `folder`, `created_at`, `updated_at`) VALUES
(3, 'Hà Hoàng', 'https://www.instagram.com/ha_hoang0104/', '.\\photos\\HAHOANG_09-03-23\\HAHOANG1678350972.jpg', 5000, 7, 'HAHOANG_09-03-23', '2023-03-09', '2023-03-09'),
(5, 'Kiligkira', 'https://www.instagram.com/kiligkira/', '.\\photos\\KILIGKIRA_09-03-23\\KILIGKIRA1678351316.jpg', 5000, 8, 'KILIGKIRA_09-03-23', '2023-03-09', '2023-03-09'),
(6, 'Trương Ngọc Ánh', 'https://www.instagram.com/howabt.me/', '.\\photos\\TRUONGNGOCANH_09-03-23\\TRUONGNGOCANH1678351416.jpg', 5000, 7, 'TRUONGNGOCANH_09-03-23', '2023-03-09', '2023-03-09'),
(7, 'Phạm Trần hải Băng', 'https://www.instagram.com/phw.bang_/', '.\\photos\\PHAMTRANHAIBANG_09-03-23\\PHAMTRANHAIBANG1678351629.jpg', 3000, 7, 'PHAMTRANHAIBANG_09-03-23', '2023-03-09', '2023-03-09'),
(8, 'Mai Ngọc Thy', 'https://www.instagram.com/_victoria.darius_/', '.\\photos\\MAINGOCTHY_09-03-23\\MAINGOCTHY1678351765.jpg', 4000, 7, 'MAINGOCTHY_09-03-23', '2023-03-09', '2023-03-09'),
(9, 'h_h__n_n', 'https://www.instagram.com/h_h__n_n/', '.\\photos\\H_H__N_N_09-03-23\\H_H__N_N1678351899.jpg', 3000, 9, 'H_H__N_N_09-03-23', '2023-03-09', '2023-03-09'),
(10, 'lenlennn', 'https://www.instagram.com/_lenlennn/', '.\\photos\\LENLENNN_09-03-23\\LENLENNN1678352001.jpg', 4000, 8, 'LENLENNN_09-03-23', '2023-03-09', '2023-03-09'),
(11, 'Quỳnh Anh', 'https://www.instagram.com/wyn.anh/', '.\\photos\\QUYNHANH_09-03-23\\QUYNHANH1678352175.jpg', 3000, 7, 'QUYNHANH_09-03-23', '2023-03-09', '2023-03-09'),
(12, 'Insjinyuan', 'https://www.instagram.com/insjinyuan', '.\\photos\\INSJINYUAN_09-03-23\\INSJINYUAN1678352244.jpg', 4000, 8, 'INSJINYUAN_09-03-23', '2023-03-09', '2009-03-23'),
(14, 'Duyên Híp', 'https://www.instagram.com/duyenn.hipp/', '.\\photos\\DUYENHIP_10-03-23\\DUYENHIP1678441846.jpg', 4000, 7, 'DUYENHIP_10-03-23', '2023-03-10', '2023-03-10'),
(15, 'Đông Thy', 'https://www.instagram.com/_ndthy.10/', '.\\photos\\DONGTHY_10-03-23\\DONGTHY1678442056.jpg', 2000, 7, 'DONGTHY_10-03-23', '2023-03-10', '2023-03-10'),
(16, 'Meihui', 'https://www.instagram.com/meihui720/', '.\\photos\\MEIHUI_10-03-23\\MEIHUI1678442200.jpg', 4000, 8, 'MEIHUI_10-03-23', '2023-03-10', '2023-03-10'),
(17, 'Phạm Thảo Anh', 'https://www.instagram.com/thao.ankk/', '.\\photos\\PHAMTHAOANH_10-03-23\\PHAMTHAOANH1678442276.jpg', 4000, 7, 'PHAMTHAOANH_10-03-23', '2023-03-10', '2023-03-10'),
(18, 'Nguyễn Thùy Trang', 'https://www.instagram.com/trang_miemie/', '.\\photos\\NGUYENTHUYTRANG_10-03-23\\NGUYENTHUYTRANG1678442345.jpg', 1000, 7, 'NGUYENTHUYTRANG_10-03-23', '2023-03-10', '2023-03-10'),
(19, 'Kim Oanh', 'https://www.instagram.com/kimoanhh312/', '.\\photos\\KIMOANH_10-03-23\\KIMOANH1678442483.jpg', 1000, 7, 'KIMOANH_10-03-23', '2023-03-10', '2023-03-10'),
(20, 'Ayako', 'https://www.instagram.com/ayakoayako731/', '.\\photos\\AYAKO_10-03-23\\AYAKO1678442602.jpg', 1000, 8, 'AYAKO_10-03-23', '2023-03-10', '2023-03-10'),
(21, 'Trần Thị Hiền', 'https://www.instagram.com/tranthihien2004/', '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN1678448550.jpg', 1000, 7, 'TRANTHIHIEN_10-03-23', '2023-03-10', '2023-03-10'),
(23, 'Boram__jj', 'https://www.instagram.com/boram__jj/', '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ1678883951.jpg', 3000, 9, 'BORAM__JJ_15-03-23', '2023-03-15', '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level_name`) VALUES
(4, 'Boss'),
(3, 'Manager'),
(2, 'Staff'),
(1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `origin_id` int NOT NULL,
  `origin_name` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`origin_id`, `origin_name`, `created_at`, `updated_at`) VALUES
(7, 'Việt Nam', '2023-03-08', '2023-03-08'),
(8, 'Trung Quốc', '2023-03-08', '2023-03-08'),
(9, 'Hàn Quốc', '2023-03-08', '2008-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `girl_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `url`, `girl_id`) VALUES
(1, '.\\photos\\INSJINYUAN_09-03-23\\INSJINYUAN1678352244.jpg', 12),
(2, '.\\photos\\QUYNHANH_09-03-23\\QUYNHANH1678352175.jpg', 11),
(3, '.\\photos\\LENLENNN_09-03-23\\LENLENNN1678352001.jpg', 10),
(4, '.\\photos\\H_H__N_N_09-03-23\\H_H__N_N1678351899.jpg', 9),
(5, '.\\photos\\MAINGOCTHY_09-03-23\\MAINGOCTHY1678351765.jpg', 8),
(6, '.\\photos\\PHAMTRANHAIBANG_09-03-23\\PHAMTRANHAIBANG1678351629.jpg', 7),
(7, '.\\photos\\TRUONGNGOCANH_09-03-23\\TRUONGNGOCANH1678351416.jpg', 6),
(8, '.\\photos\\KILIGKIRA_09-03-23\\KILIGKIRA1678351316.jpg', 5),
(10, '.\\photos\\HAHOANG_09-03-23\\HAHOANG1678350972.jpg', 3),
(11, '.\\photos\\INSJINYUAN_09-03-23\\INSJINYUAN1678375252.jpg', 12),
(12, '.\\photos\\DUYENHIP_10-03-23\\DUYENHIP1678441846.jpg', 14),
(13, '.\\photos\\DONGTHY_10-03-23\\DONGTHY1678442056.jpg', 15),
(14, '.\\photos\\MEIHUI_10-03-23\\MEIHUI1678442200.jpg', 16),
(15, '.\\photos\\PHAMTHAOANH_10-03-23\\PHAMTHAOANH1678442276.jpg', 17),
(16, '.\\photos\\NGUYENTHUYTRANG_10-03-23\\NGUYENTHUYTRANG1678442345.jpg', 18),
(17, '.\\photos\\KIMOANH_10-03-23\\KIMOANH1678442483.jpg', 19),
(18, '.\\photos\\AYAKO_10-03-23\\AYAKO1678442602.jpg', 20),
(19, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN1678448550.jpg', 21),
(24, '.\\photos\\HAHOANG_09-03-23\\HAHOANG0.99997000 1678777291.jpg', 3),
(25, '.\\photos\\HAHOANG_09-03-23\\HAHOANG0.04403300 1678777292.jpg', 3),
(26, '.\\photos\\HAHOANG_09-03-23\\HAHOANG0.06809800 1678777292.jpg', 3),
(27, '.\\photos\\HAHOANG_09-03-23\\HAHOANG0.08447000 1678777292.jpg', 3),
(28, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.58572500 1678802080.jpg', 21),
(29, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.70336200 1678802080.jpg', 21),
(30, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.72192700 1678802080.jpg', 21),
(31, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.73647900 1678802080.jpg', 21),
(32, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.77024400 1678802080.jpg', 21),
(33, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.79717700 1678802080.jpg', 21),
(34, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.81207100 1678802080.jpg', 21),
(35, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.87192000 1678802080.jpg', 21),
(36, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.88702200 1678802080.jpg', 21),
(37, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.92197300 1678802080.jpg', 21),
(38, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.93673000 1678802080.jpg', 21),
(39, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.05096000 1678802379.jpg', 21),
(40, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.10933200 1678802379.jpg', 21),
(41, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.12875100 1678802379.jpg', 21),
(42, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.14188300 1678802379.jpg', 21),
(43, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.16222000 1678802379.jpg', 21),
(44, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.17535000 1678802379.jpg', 21),
(45, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.19561100 1678802379.jpg', 21),
(46, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.21678900 1678802379.jpg', 21),
(47, '.\\photos\\TRANTHIHIEN_10-03-23\\TRANTHIHIEN0.23723600 1678802379.jpg', 21),
(49, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ1678883951.jpg', 23),
(50, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ0.47642600 1678883976.jpg', 23),
(51, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ0.53968400 1678883976.jpg', 23),
(52, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ0.55489900 1678883976.jpg', 23),
(53, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ0.58927400 1678883976.jpg', 23),
(54, '.\\photos\\BORAM__JJ_15-03-23\\BORAM__JJ0.63793900 1678883976.jpg', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_name` (`account_name`);

--
-- Indexes for table `girls`
--
ALTER TABLE `girls`
  ADD PRIMARY KEY (`girl_id`),
  ADD UNIQUE KEY `folder` (`folder`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `level_name` (`level_name`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`origin_id`),
  ADD UNIQUE KEY `origin_name` (`origin_name`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `girls`
--
ALTER TABLE `girls`
  MODIFY `girl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `origin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
