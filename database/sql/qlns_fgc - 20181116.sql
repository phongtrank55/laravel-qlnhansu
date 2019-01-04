-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 05:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns_fgc`
--

-- --------------------------------------------------------

--
-- Table structure for table `calamviec`
--

CREATE TABLE `calamviec` (
  `id` int(11) NOT NULL,
  `tenCa` varchar(100) DEFAULT NULL,
  `tenVietTat` varchar(100) DEFAULT NULL,
  `thuTu` int(11) DEFAULT NULL,
  `ghiChu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calamviec`
--

INSERT INTO `calamviec` (`id`, `tenCa`, `tenVietTat`, `thuTu`, `ghiChu`) VALUES
(1, 'Sáng', 'SA', 1, NULL),
(2, 'Chiều', 'CH', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `macv` varchar(20) NOT NULL,
  `tencv` varchar(100) NOT NULL,
  `TenVietTat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `macv`, `tencv`, `TenVietTat`) VALUES
(1, 'KS', 'Kỹ Sư', 'KS'),
(2, 'KS', 'Kỹ Sư', 'KS'),
(3, 'KT', 'Kế Toán', 'KT'),
(4, 'GĐ', 'Giám Đốc ', 'GĐ'),
(5, 'TEST', 'Kiểm thử ', 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucdoi`
--

CREATE TABLE `hinhthucdoi` (
  `id` int(11) NOT NULL,
  `tenHinhThuc` varchar(100) DEFAULT NULL,
  `ghiChu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhthucdoi`
--

INSERT INTO `hinhthucdoi` (`id`, `tenHinhThuc`, `ghiChu`) VALUES
(1, 'Bổ nhiệm', NULL),
(2, 'Mới vào', NULL),
(3, 'Thăng Chức', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuckhenthuong`
--

CREATE TABLE `hinhthuckhenthuong` (
  `id` int(11) NOT NULL,
  `tenHTKT` varchar(100) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhthuckhenthuong`
--

INSERT INTO `hinhthuckhenthuong` (`id`, `tenHTKT`, `ghichu`) VALUES
(1, 'Thưởng dự án', NULL),
(2, 'Thưởng tết', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hopdonglamviec`
--

CREATE TABLE `hopdonglamviec` (
  `id` int(11) NOT NULL,
  `loaiHopDongId` int(11) DEFAULT NULL,
  `nhanVienId` int(11) DEFAULT NULL,
  `SoHopDong` varchar(100) DEFAULT NULL,
  `NgayBatDau` bigint(20) DEFAULT NULL,
  `NgayKetThuc` bigint(20) DEFAULT NULL,
  `FileDinhKem` varchar(100) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khenthuong`
--

CREATE TABLE `khenthuong` (
  `id` int(11) NOT NULL,
  `HTKTId` int(11) DEFAULT NULL,
  `nhanVienId` int(11) DEFAULT NULL,
  `soTien` bigint(20) DEFAULT NULL,
  `lydo` varchar(100) DEFAULT NULL,
  `soQuyetDinh` varchar(100) DEFAULT NULL,
  `NgayKyQuyetDinh` varchar(100) DEFAULT NULL,
  `fileDinhKem` varchar(100) DEFAULT NULL,
  `ghiChu` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loaihopdong`
--

CREATE TABLE `loaihopdong` (
  `id` int(11) NOT NULL,
  `tenLoaiHopDong` varchar(100) DEFAULT NULL,
  `tenVietTat` varchar(100) DEFAULT NULL,
  `SoThang` int(11) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihopdong`
--

INSERT INTO `loaihopdong` (`id`, `tenLoaiHopDong`, `tenVietTat`, `SoThang`, `ghichu`) VALUES
(1, 'Không xác định thời hạn', 'KXĐ', NULL, NULL),
(2, 'Hợp đồng 1 năm', '1Year', 12, NULL),
(5, 'Thử việc', 'TV', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loainghiphep`
--

CREATE TABLE `loainghiphep` (
  `id` int(11) NOT NULL,
  `maLoai` varchar(100) DEFAULT NULL,
  `TenLoai` varchar(100) NOT NULL,
  `soNgay` int(11) DEFAULT NULL,
  `kiemTraSoNgay` int(11) DEFAULT '0',
  `ghichu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loainghiphep`
--

INSERT INTO `loainghiphep` (`id`, `maLoai`, `TenLoai`, `soNgay`, `kiemTraSoNgay`, `ghichu`) VALUES
(1, 'KP', 'Nghỉ không phép', NULL, 0, NULL),
(2, 'CT', 'Công tác', NULL, 0, NULL),
(3, 'PN', 'Phép năm', 12, 1, NULL),
(4, 'TS', 'Thai sản', 87, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ngaynghi`
--

CREATE TABLE `ngaynghi` (
  `id` int(11) NOT NULL,
  `loaiNghiPhepId` int(11) DEFAULT NULL,
  `nhanVienId` int(11) DEFAULT NULL,
  `NgayNghi` bigint(20) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `caLamViecId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nghiphep`
--

CREATE TABLE `nghiphep` (
  `id` int(11) NOT NULL,
  `loaiNghiPhepId` int(11) DEFAULT NULL,
  `nhanVienId` int(11) DEFAULT NULL,
  `ngayBatDau` bigint(20) DEFAULT NULL,
  `SoNgay` int(11) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `tokenResetPassword` varchar(100) DEFAULT NULL,
  `maNhanVien` varchar(100) NOT NULL,
  `ho` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `ngaySinh` varchar(30) NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `gioiTinh` int(11) NOT NULL,
  `chucVuId` int(11) DEFAULT NULL,
  `soDienThoai` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `quocTich` varchar(100) NOT NULL,
  `danToc` varchar(100) NOT NULL,
  `tonGiao` varchar(100) NOT NULL,
  `honNhan` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ngayVaoLam` varchar(100) DEFAULT NULL,
  `CMND` varchar(100) DEFAULT NULL,
  `noiCapCMND` varchar(100) DEFAULT NULL,
  `NgayCapCMND` varchar(20) DEFAULT NULL,
  `TrinhDoHocVan` varchar(100) DEFAULT NULL,
  `HocVi` varchar(100) DEFAULT NULL,
  `ChuyenNganh` varchar(100) DEFAULT NULL,
  `QueQuan` varchar(100) DEFAULT NULL,
  `PhongBanId` int(11) DEFAULT NULL,
  `DaNghiViec` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `id` int(11) NOT NULL,
  `MaPhong` varchar(100) NOT NULL,
  `TenPhong` varchar(100) NOT NULL,
  `TenVietTat` varchar(30) NOT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`id`, `MaPhong`, `TenPhong`, `TenVietTat`, `SoDienThoai`, `created_at`, `updated_at`) VALUES
(1, 'KT', 'Kế Toán', 'KT', NULL, NULL, NULL),
(2, 'NS', 'Nhân sự', 'NS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quatrinhcongtac`
--

CREATE TABLE `quatrinhcongtac` (
  `id` int(11) NOT NULL,
  `nhanVienId` int(11) DEFAULT NULL,
  `hinhThucDoiId` int(11) DEFAULT NULL,
  `chucVuId` int(11) DEFAULT NULL,
  `phongBanId` int(11) DEFAULT NULL,
  `ngaybatdau` bigint(20) DEFAULT NULL,
  `ngayketthuc` bigint(20) DEFAULT NULL,
  `soquyetdinh` varchar(100) DEFAULT NULL,
  `ngaykyQuyetDinh` varchar(100) DEFAULT NULL,
  `filedinhkem` varchar(100) DEFAULT NULL,
  `ghichu` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calamviec`
--
ALTER TABLE `calamviec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhthucdoi`
--
ALTER TABLE `hinhthucdoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhthuckhenthuong`
--
ALTER TABLE `hinhthuckhenthuong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hopdonglamviec`
--
ALTER TABLE `hopdonglamviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaiHopDongId` (`loaiHopDongId`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `HTKTId` (`HTKTId`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loainghiphep`
--
ALTER TABLE `loainghiphep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaiNghiPhepId` (`loaiNghiPhepId`),
  ADD KEY `nhanVienId` (`nhanVienId`),
  ADD KEY `caLamViecId` (`caLamViecId`);

--
-- Indexes for table `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaiNghiPhepId` (`loaiNghiPhepId`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chucVuId` (`chucVuId`),
  ADD KEY `PhongBanId` (`PhongBanId`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MaPhong` (`MaPhong`),
  ADD UNIQUE KEY `TenVietTat` (`TenVietTat`);

--
-- Indexes for table `quatrinhcongtac`
--
ALTER TABLE `quatrinhcongtac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanVienId` (`nhanVienId`),
  ADD KEY `phongBanId` (`phongBanId`),
  ADD KEY `hinhThucDoiId` (`hinhThucDoiId`),
  ADD KEY `chucVuId` (`chucVuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calamviec`
--
ALTER TABLE `calamviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hinhthucdoi`
--
ALTER TABLE `hinhthucdoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hinhthuckhenthuong`
--
ALTER TABLE `hinhthuckhenthuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hopdonglamviec`
--
ALTER TABLE `hopdonglamviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khenthuong`
--
ALTER TABLE `khenthuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loainghiphep`
--
ALTER TABLE `loainghiphep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nghiphep`
--
ALTER TABLE `nghiphep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quatrinhcongtac`
--
ALTER TABLE `quatrinhcongtac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hopdonglamviec`
--
ALTER TABLE `hopdonglamviec`
  ADD CONSTRAINT `hopdonglamviec_ibfk_1` FOREIGN KEY (`loaiHopDongId`) REFERENCES `loaihopdong` (`id`),
  ADD CONSTRAINT `hopdonglamviec_ibfk_2` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD CONSTRAINT `khenthuong_ibfk_1` FOREIGN KEY (`HTKTId`) REFERENCES `hinhthuckhenthuong` (`id`),
  ADD CONSTRAINT `khenthuong_ibfk_2` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD CONSTRAINT `ngaynghi_ibfk_1` FOREIGN KEY (`loaiNghiPhepId`) REFERENCES `loainghiphep` (`id`),
  ADD CONSTRAINT `ngaynghi_ibfk_2` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `ngaynghi_ibfk_3` FOREIGN KEY (`caLamViecId`) REFERENCES `calamviec` (`id`);

--
-- Constraints for table `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD CONSTRAINT `nghiphep_ibfk_1` FOREIGN KEY (`loaiNghiPhepId`) REFERENCES `loainghiphep` (`id`),
  ADD CONSTRAINT `nghiphep_ibfk_2` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`chucVuId`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`PhongBanId`) REFERENCES `phongban` (`id`);

--
-- Constraints for table `quatrinhcongtac`
--
ALTER TABLE `quatrinhcongtac`
  ADD CONSTRAINT `quatrinhcongtac_ibfk_1` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `quatrinhcongtac_ibfk_2` FOREIGN KEY (`phongBanId`) REFERENCES `phongban` (`id`),
  ADD CONSTRAINT `quatrinhcongtac_ibfk_3` FOREIGN KEY (`hinhThucDoiId`) REFERENCES `hinhthucdoi` (`id`),
  ADD CONSTRAINT `quatrinhcongtac_ibfk_4` FOREIGN KEY (`chucVuId`) REFERENCES `chucvu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
