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
  `NoiDung` varchar(11) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(32, 11, 3015, 'Giày đẹp', '2022-11-08 07:10:52'),
(33, 11, 3016, 'Giày xịn', '2022-11-08 07:10:52');

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
(1, 'Giày cỏ nhân tạo', 'Phù hợp với sân 5-7 người'),
(2, 'Giày cỏ tự nhiên', 'Phù hợp với sân 11 người'),
(3, 'Giày Futsal', 'Phù hợp với sân trong nhà');


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
(83, '11', '2023-11-30 15:22:43', 'Quan 9', '', '2750000', '0968268268', '1');

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
(1, 'Giày chính hãng', 'giaychinhhang@gmail.com', '0321221221', 'Kiên Giang', 'avatar.png'),
(2, 'Giày xém chính hãng', 'giayxemchinhhang@gmail.com', '0321221222', 'An Giang', 'avatar.png');

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
(1, 'admin', '123', '20h1120238@ut.edu.vn', 'ADMIN VIP', 'Kiên Giang', '0988888888', '2022-11-01');

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
(3015, 1, 1, 'PUMA FUTURE ULTIMATE CAGE TT', 'Với sức nóng của một mùa UEFA CHAMPIONS LEAGUE sắp tới, PUMA chính thức ra mắt bộ sưu tập mới mang tên “Gear Up”. Lấy cảm hứng từ những ánh đèn sân vận động lấp lánh, những silo hàng đầu của nhà Báo: Future, Ultra và King được thiết kế với những gam màu cực ấn tượng hứa hẹn sẽ được mang bởi những cầu thủ nổi tiếng như Neymar Jr., Kingsley Coman, Ingrid Engen, Fridolina Rolfö, Julia Grosso, Jack Grealish và Xavi Simon trong các trận đấu sắp tới.', 2790000, 10, 'shoeshot_4.jpg', 'co'),
(3016, 1, 1, 'NIKE MERCURIAL SUPERFLY 9 TF', 'Nike Air Zoom Mercurial Superfly 9 Academy TF Mbappé Personal Edition - Baltic Blue/White được kết hợp giữa màu Baltic Blue với Swoosh màu Sundial và logo màu trắng/đen một cách hài hòa và bắt mắt. Điểm nổi bật so với các phiên bản thông thường khác là chữ Zoom lớn trên phần ngoài thân giày và logo KM (Kylian Mbappé) nhỏ ở phía sau gót.', 2250000, 6, 'shoeshot_7.jpg', 'ko'),
(3017, 2, 2, 'NIKE TIEMPO LEGEND 10 ELITE FG', 'Một mùa hè với nhiều giải đấu lớn sôi động đang đến gần, để tiếp thêm sức mạnh cho các cầu thủ khi ra sân, Nike hé lộ những hình ảnh đầu tiên cho BST mới của mình mang tên Ready Pack. BST này được coi là một bản phối màu rực lửa nhất dành cho cả 3 phiên bản Air Zoom Mercurial, Tiempo và Phantom GX từ đầu năm tới nay.', 5250000, 5, 'shoeshot_8.jpg', 'ko'),
(3018, 3, 1, 'MIZUNO MORELIA SALA ELITE', 'Morelia là dòng giày đã được ra mắt từ năm 1985 với thiết kế truyền thống mang tính chuẩn mực cho một đôi giày bóng đá. Trải qua gần 40 năm, những mẫu Morelia mới nhất vẫn giữ những nét truyền thống đó pha lẫn với những chi tiết hiện đại tạo nên một đôi giày tinh tế phù hợp với nhiều cầu thủ.', 2850000, 4, 'shoeshot_9.jpg', 'ko'),
(3019, 3, 2, 'NIKE TIEMPO LEGEND 9 PRO IC', 'Sau khi bst Generation với gam trầm ấm (màu nâu chủ đạo là nắng và gió của sa mạc) để phù hợp với đất nước Qatar - nơi đăng cai World Cup 2022 thì đầu năm 2023, NIKE - thương hiệu giày bóng đá lớn nhất thế giới tiếp tục tung ra 1 bst có thể nói là hoàn hảo mang tên: \"Blast Pack\". ', 2490000, 7, 'shoeshot_10.jpg', 'ko'),
(3020, 2, 1, 'NIKE MERCURIAL SUPERFLY 9 MG', 'Nike Air Zoom Mercurial Vapor 15 Academy MG Mbappé Personal Edition - Dark Beetroot/Metallic Vivid Gold là mẫu giày dành cho sân tự nhiên 11 người. Nike Air Zoom Mercurial Superfly 9 Academy MG Mbappé Personal Edition - Baltic Blue/White được kết hợp giữa màu Baltic Blue với Swoosh màu Sundial và logo màu trắng/đen một cách hài hòa và bắt mắt. Điểm nổi bật so với các phiên bản thông thường khác là chữ Zoom lớn trên phần ngoài thân giày và logo KM (Kylian Mbappé) nhỏ ở phía sau gót.', 2350000, 11, 'shoeshot_12.jpg', 'ko'),
(3021, 1, 2, 'MIZUNO MORELIA NEO IV PRO TF', 'Morelia là dòng sản phẩm lâu đời nhất của Mizuno (ra mắt năm 1985), nhưng trải qua gần 30 năm hình thành và phát triển, Moreila đang không ngừng cải tiến từng ngày, từ thiết kế đến công nghệ nhằm bắt kịp xu thế hiện đại. Morelia III Beta cũng là dòng sản phẩm được Sergio Ramos làm đại diện trước khi chuyển qua Mizuno Alpha. Giữa thị trường giày bóng đá ngày càng đa dạng với nhiều thương hiệu đình đám, chúng ta vẫn phải công nhận những cải tiến và đột phá của mình đã giúp Mizuno có chỗ đứng vững chắc trong lòng người hâm mộ.', 2790000, 12, 'shoeshot_6.jpg', 'ko'),
(3022, 2, 1, 'ADIDAS X CRAZYFAST .1 FG', 'Sau khi giới thiệu đôi giày COPA Pure 2 màu xanh biển vào cuối tuần trước, mới đây, thương hiệu adidas chính thức trình làng BST hoàn chỉnh mang tên Marine Rush Pack với hai phiên bản X Crazyfast và Predator Accuracy. Silo này được coi là phiên bản đáng được trải nghiệm nhiều nhất nhờ sở hữu công nghệ AEROPLATE, làm cho đế giày nhẹ hơn 5g, mang lại sự thoải mái tốt nhất cho người chơi. ', 5250000, 15, 'shoeshot_1.jpg', 'ko');
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
(11, 'lethanhphat', '123', 'lenalpiggy@gmail.com', 'Phát', 'Quan 9', '0968268268', '2022-11-10');
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
