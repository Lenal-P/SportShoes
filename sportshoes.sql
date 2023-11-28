-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
-- Máy chủ: 127.0.0.1
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Sport Shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `NoiDung` varchar(100) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(20) NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `Mota`) VALUES


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `GhiChu` varchar(30) NOT NULL,
  `GiaTien` float NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `XuLy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ID_NCC` int(11) NOT NULL,
  `TenNCC` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NCC`, `TenNCC`, `Email`, `SoDienThoai`, `DiaChi`, `Img`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `ID_QuanLy` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDiLam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`ID_QuanLy`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDiLam`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `ID_NhaCungCap` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` float NOT NULL,
  `Img` varchar(20) NOT NULL,
  `BanChay` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `ID_DanhMuc`, `ID_NhaCungCap`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `Img`, `BanChay`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID_BinhLuan`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`ID_HoaDon`,`ID_ThanhVien`,`ID_SanPham`),
  ADD KEY `ID_HoaDon` (`ID_HoaDon`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HoaDon`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_QuanLy`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `ID_NhaCungCap` (`ID_NhaCungCap`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_ThanhVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `ID_QuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID_HoaDon`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_NhaCungCap`) REFERENCES `nhacungcap` (`ID_NCC`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID_DanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
