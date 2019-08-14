-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 02:40 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngohieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `coso`
--

CREATE TABLE `coso` (
  `id` int(11) NOT NULL,
  `tencs` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` mediumtext COLLATE utf8mb4_unicode_ci,
  `diachi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `id` int(11) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `idphong` int(11) NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `songuoi` int(11) DEFAULT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci,
  `batdau` datetime NOT NULL,
  `ketthuc` datetime NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `ykien` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '123',
  `hoten` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `datphong` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `username`, `password`, `hoten`, `diachi`, `email`, `sdt`, `remember_token`, `admin`, `datphong`) VALUES
(1, 'admin', '$2y$10$LAl1NBC97qM7SknFCe6qyuLtmjAEqEb3DlTgrVGkSNKJ2lB9fXy1.', 'Quản trị viên', 'LA', 'admin@ngohieu.com', '123456789', 'ZpdjWNXf37PqfLb1WFJV7hM4q7w7QynYlbqdS69gIk2CPhehJGl3GZTn3vRz', 1, 1),
(2, 'u1', '$2y$10$B1iVkUmVADyeAQA5vbjMq.if7E8h5vwTxZyQ.N8t1AQEZnZIz9UAm', 'User 1', NULL, NULL, NULL, 'tVDhKyzupZy7KrXg3N7wpjG0oqMSqeI0v0zc9gzR9MpIZPGCRIrb574C0zMv', 0, 0),
(3, 'u2', '$2y$10$H85bz4051WrosVUz5o62DOtddXG7yIUyIcLXOtsl7t/foDIo9YdSy', 'Trần Văn A', NULL, NULL, NULL, '2eVkrL7tNvHIJMMczcG0M2J4smHUsU1wNbCmFQGT4CCh0PuTFp8sRbButmMR', 0, 1),
(4, 'u3', '$2y$10$fy0ICaqibyHhdPW218I3NenL6WBedPSMslg7eAfUQRfKBWc8l/ixS', 'U3', 'HG', NULL, '23131', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL,
  `tenphong` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcoso` int(11) NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coso`
--
ALTER TABLE `coso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_phong_dp` (`idphong`),
  ADD KEY `fk_nd_dp` (`idnguoidung`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coso_phong` (`idcoso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coso`
--
ALTER TABLE `coso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `fk_nd_dp` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_phong_dp` FOREIGN KEY (`idphong`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `fk_coso_phong` FOREIGN KEY (`idcoso`) REFERENCES `coso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
