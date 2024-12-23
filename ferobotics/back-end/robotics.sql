-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2024 lúc 02:23 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `robotics`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(9) NOT NULL,
  `IDUSER` int(9) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `note` varchar(900) NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `makhuyenmai` int(11) NOT NULL,
  `loaikhuyenmai` varchar(70) NOT NULL,
  `giatrikm` int(11) NOT NULL,
  `ngaybdkm` date DEFAULT NULL,
  `ngayktkm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`makhuyenmai`, `loaikhuyenmai`, `giatrikm`, `ngaybdkm`, `ngayktkm`) VALUES
(1, 'khongkm', 0, NULL, NULL),
(2, 'giamgia', 300000, '2024-10-31', '2024-11-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `IDLSP` int(11) NOT NULL,
  `phanloaihang` int(11) NOT NULL,
  `ten` varchar(70) NOT NULL,
  `loai` varchar(70) NOT NULL,
  `thongtinmota` varchar(900) NOT NULL,
  `gia` int(11) NOT NULL,
  `makhuyenmai` int(11) NOT NULL,
  `hinhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `IDLSP`, `phanloaihang`, `ten`, `loai`, `thongtinmota`, `gia`, `makhuyenmai`, `hinhanh`) VALUES
(0, 4, 1, 'Robot hút bụi tự động Roomba® j9+', 'Robot Hút Bụi', 'Chỉ từ 38 đô la /tháng với Affirm . Kiểm tra sức mua của bạn', 15000000, 1, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwca0f3083/images/large/roomba/I555620_1.jpg?sw=646'),
(1, 1, 1, 'Robot hút bụi tự động Roomba® i5+', 'Robot Hút Bụi', 'Quá rẻ', 14200000, 1, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dw98421001/images/large/roomba/j955020_0.jpg?sw=646'),
(2, 1, 1, 'Robot lau nhà iRobot® Braava jet® m6', 'Robot Lau Nhà', 'Tiết kiệm 1.999.999đ. Ưu đãi có thời hạn.', 18000000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwd4d6227f/images/large/braava/m611320_0.jpg?sw=646'),
(3, 1, 2, 'Roomba Combo® j9+ Robot hút bụi và lau nhà tự động', 'Robot 2 Trong 1', 'Giảm giá lên đến 5.000.000đ', 31000000, 1, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dw11325a42/images/large/combo/C975020_00.jpg?sw=646'),
(4, 1, 2, 'Robot hút bụi và lau nhà tự động Roomba Combo® j5+', 'Robot 2 trong 1', 'Giảm giá đặc biệt lên đến 2.000.000đ', 17300000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dw1e233268/images/large/roomba/j557020_01.jpg?sw=646'),
(5, 1, 3, 'Robot hút bụi và lau nhà Roomba Combo® j5', 'Robot 2 trong 1', 'Tiết kiệm 3,000,000đ khi mua Roomba Combo j5, giá chỉ còn 17,500,000đ. Khuyến mãi có thời hạn.', 17500000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwda24d80c/images/large/roomba/J517020.jpg?sw=646'),
(6, 1, 3, 'Roomba Combo® Essential Robot', 'Robot 2 trong 1', 'Giảm giá!!!', 15000000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dw8c37a111/images/large/combo/Y014020_0.jpg?sw=646'),
(7, 1, 1, 'Robot Roomba Combo® 2 Essential + đế AutoEmpty™', 'Robot 2 trong 1', 'Robot 2 trong 1 thế hệ mới.', 15800000, 1, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwf69f60f9/images/large/combo/Y054020_Black.jpg?sw=646'),
(8, 1, 1, 'Robot hút bụi và lau nhà tự động Roomba Combo® i5+', 'Robot 2 trong 1', 'Robot thế hế 6', 18700000, 1, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwe13d161d/images/large/combo/i557020_01.jpg?sw=646'),
(9, 2, 2, 'Robot hút bụi và lau nhà Roomba Combo® i5', 'Robot 2 trong 1 ', 'Robot thế hệ 5', 76000000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dw7b16aec4/images/large/combo/i517020_01.jpg?sw=646'),
(10, 2, 2, 'Robot Roomba Combo® 10 Max + đế AutoWash™', 'Robot 2 trong 1', 'Robot thế hệ 10 mới nhất !!!', 30000000, 2, 'https://www.irobot.com/dw/image/v2/BFXP_PRD/on/demandware.static/-/Sites-master-catalog-irobot/default/dwe55aefa6/images/large/combo/X085020_1.jpg?sw=646');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ykien`
--

CREATE TABLE `ykien` (
  `IDYK` int(9) NOT NULL,
  `IDUSER` int(9) NOT NULL,
  `thongtin` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ykien`
--

INSERT INTO `ykien` (`IDYK`, `IDUSER`, `thongtin`) VALUES
(1, 2, ' ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHD`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`makhuyenmai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `ykien`
--
ALTER TABLE `ykien`
  ADD PRIMARY KEY (`IDYK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
