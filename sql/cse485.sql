-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 20, 2018 lúc 10:11 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cse485`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baigiang`
--

CREATE TABLE `baigiang` (
  `id_bg` int(11) NOT NULL,
  `ten_bg` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `id_mh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baigiang`
--

INSERT INTO `baigiang` (`id_bg`, `ten_bg`, `noidung`, `file`, `id_mh`) VALUES
(21, 'Bài 1', 'Hello world', 'uploads/files/5b7a71fce52c8.pdf', 20),
(22, 'Bài 1', 'Hello world', 'uploads/files/5b7a7236eeb7d.pdf', 22),
(25, 'Bài 1', 'Hello world', 'uploads/files/5b7a73265d184.pdf', 18),
(26, 'Bài 1', 'Hello world', 'uploads/files/5b7a74aa0cb64.pdf', 21),
(27, 'Bài 1', 'Hello world', 'uploads/files/5b7a74e201499.pdf', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `img_gv` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `id_gv` int(11) NOT NULL,
  `ten_gv` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `monhoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL DEFAULT b'0',
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`img_gv`, `id_gv`, `ten_gv`, `monhoc`, `gioitinh`, `sdt`, `thongtin`) VALUES
('uploads/5b78ede7b978d.jpg', 14, 'Nguyễn Anh Đức', ' Học máy', b'1', '098652344', 'Tốt nghiệp Đại học Bách khoa  Hà Nội  năm 2004\r\n\r\nThạc sỹ năm 2010  tại Bách khoa Hà Nội'),
('uploads/5b78ede7b978d.jpg', 25, 'Trần Ngọc Long', 'Mạng Máy Tính', b'0', '463284', 'Tin Học ứng dụng được xây dựng một cách có hệ thống và khoa học nhằm trang bị cho người học những kiến thức về lý thuyết và kỹ năng thực hành cơ bản của chuyên ngành Tin học'),
('uploads/5b78ede7b978d.jpg', 36, 'Vũ Huy Hoàng', 'Tin học ứng dụng', b'0', '09874635', 'Tốt nghiệp Đại học Quốc gia Hà Nội  năm 2001\r\n\r\nThạc sỹ năm 2006  tại ĐH Quốc gia Hà Nội'),
('uploads/5b7a200a1e9e0.jpg', 37, 'Lê Văn Nhật', 'Tin học ứng dụng', b'0', '097546754', 'Tin Học ứng dụng được xây dựng một cách có hệ thống và khoa học nhằm trang bị cho người học những kiến thức về lý thuyết và kỹ năng thực hành cơ bản của chuyên ngành Tin học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id_mh` int(11) NOT NULL,
  `ten_mh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL,
  `ten_gv` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id_mh`, `ten_mh`, `thongtin`, `ten_gv`) VALUES
(18, 'Ngôn ngữ lập trình nâng cao v1', 'Object Oriented and Advanced Programming', '    Lê Văn Nhật'),
(20, 'Ngôn ngữ lập trình nâng cao v4', 'Object Oriented and Advanced Programming', '      Lê Văn Nhật'),
(21, 'Công nghệ Web', 'Công nghệ web và ứng dụng trình bày về các kiến thức cơ bản về phát triển ứng dụng web và các kỹ thuật liên quan; và là môn học tự chọn cho sinh viên công nghệ thông tin trong một học kỳ.', ' Lê Văn Nhật'),
(22, 'Ngôn ngữ lập trình nâng cao v1', '............', ' Lê Văn Nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_tb` int(11) NOT NULL,
  `ten_tb` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `tacgia` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id_tb`, `ten_tb`, `noidung`, `tacgia`) VALUES
(1, 'Thông báo nghỉ học', 'Mới đây, Sở GD-ĐT Hà Nội gửi văn bản đến các phòng GD-ĐT quận, huyện, thị xã, các đơn vị trực thuộc, thông báo về việc nghỉ lễ giỗ Tổ', '   admin'),
(2, 'Thông báo nghỉ học', 'Nhà trường sẽ cho dừng chương trình học khi số lượng học sinh đi học dưới ¾ sĩ số học sinh trong lớp và sẽ dạy bù chương trình sau đợt rét.', 'admin'),
(3, 'Thông báo nghỉ học', 'Mới đây, Sở GD-ĐT Hà Nội gửi văn bản đến các phòng GD-ĐT quận, huyện, thị xã, các đơn vị trực thuộc, thông báo về việc nghỉ lễ giỗ Tổ', 'admin'),
(5, 'Thông báo nghỉ học', 'Mới đây, Sở GD-ĐT Hà Nội gửi văn bản đến các phòng GD-ĐT quận, huyện, thị xã, các đơn vị trực thuộc, thông báo về việc nghỉ lễ giỗ Tổ', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tt` int(11) NOT NULL,
  `ten_tt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Lê Trọng Kiên', 'kienlt32@wru.vn', '12345', 'admin'),
(2, 'Trần Văn Vũ', 'vutv32@wru.vn', '1234', 'normal'),
(3, 'Nguyễn Văn Thành', 'thanhnv@wru.vn', '12345', 'normal'),
(4, 'Nguyễn Thị Dịu', 'diunt32@wru.vn', '12345', 'normal'),
(6, 'Lê Trọng Kiên', '  kienstar2871995@gmail.com', '  12345', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`id_bg`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id_gv`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id_mh`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id_tb`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tt`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baigiang`
--
ALTER TABLE `baigiang`
  MODIFY `id_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id_gv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id_mh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
