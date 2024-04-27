-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2024 lúc 01:11 PM
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
-- Cơ sở dữ liệu: `bandienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `id` int(11) NOT NULL,
  `idHD` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonhang`
--

INSERT INTO `ctdonhang` (`id`, `idHD`, `idSP`, `quantity`) VALUES
(1, 1, 15, 3),
(2, 1, 16, 3),
(3, 1, 17, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDH` int(11) NOT NULL,
  `idTK` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaycapnhat` date NOT NULL,
  `trangthai` varchar(5) NOT NULL,
  `diachigiao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDH`, `idTK`, `tongtien`, `ngaytao`, `ngaycapnhat`, `trangthai`, `diachigiao`) VALUES
(1, 38, 100000, '2024-04-27', '2024-04-27', '0', '123 Nguyễn Thị Thập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `idHSX` int(11) NOT NULL,
  `tenHSX` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `trangthai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`idHSX`, `tenHSX`, `logo`, `trangthai`) VALUES
(1, 'ACER', 'acer.png\r\n', b'1'),
(2, 'LENOVO', 'lenovo.png', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `hinhanh` varchar(30) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `giaban` float NOT NULL,
  `luotban` int(11) NOT NULL,
  `mota` text NOT NULL,
  `cpu` varchar(40) NOT NULL,
  `card` varchar(40) NOT NULL,
  `pin` varchar(40) NOT NULL,
  `ram` varchar(40) NOT NULL,
  `idHSX` int(11) NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `tonkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `hinhanh`, `tenSP`, `giaban`, `luotban`, `mota`, `cpu`, `card`, `pin`, `ram`, `idHSX`, `trangthai`, `tonkho`) VALUES
(14, 'lap1.png\r\n', 'Laptop Acer TravelMate P4 TMP414 51 50HX i5 ', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 0),
(15, 'lap2.png', 'Laptop Acer Aspire Lite 15 51M 5542 i5', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'0', 0),
(16, 'lap1.png\r\n', 'Laptop Acer TravelMate P4 TMP414 51 50HX i5 ', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 0),
(17, 'lap3.png', 'Laptop Lenovo V14 G3 ABA R5', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 2, b'1', 0),
(18, 'lap3.png', 'Laptop Lenovo V14 G3 ABA R5', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 2, b'1', 0),
(19, 'lap3.png', 'Laptop Lenovo V14 G3 ABA R5', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 2, b'1', 0),
(20, 'lap2.png', 'Laptop Acer Aspire 3 A314 42P R3B3 R7', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 0),
(21, '253689.jpg', 'Laptop Acer Aspire Vero AV15', 15590000, 0, 'TouchPad có kích thước vừa vặn, cảm giác di vuốt mượt mà hỗ trợ mình tốt trong mọi công việc mà không cần phải kết nối thêm với chuột bên ngoài. Tích hợp thêm là tính năng bảo mật vân tay ngay trên bàn di chuột cũng giúp mình không tốn quá nhiều thời gian khi truy cập vào thiết bị.', 'i51155G72.5GHz', ' Card tích hợp - Intel Iris Xe Graphics', ' 3-cell Li-ion, 48 Wh', ' 8 GB', 1, b'1', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idTK` int(11) NOT NULL,
  `tenTK` varchar(30) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dienthoai` char(10) NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `phanquyen` char(2) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idTK`, `tenTK`, `diachi`, `email`, `dienthoai`, `trangthai`, `phanquyen`, `avatar`, `password`) VALUES
(3, 'Le Thi Thao Van', '5 Ngo Tat To, Nha Trang, Khanh Hoa', 'thaovan123@gmail.com', '0905630032', b'1', 'AD', '986482.jpg', '123123'),
(38, 'Le Ngoc Thao Mi', '5 cau ho, nha trang, khanh hoa', 'thaovy3724@gmail.com', '0794988553', b'0', 'KH', '959723.jpg', '123123'),
(40, 'Le Ngoc Thao Mi', '5 cau ho, nha trang, khanh hoa', 'thaovy3724@gmail.com', '0794988553', b'1', 'KH', 'person.png', '123123'),
(56, 'Nguyễn Thảo Mi', '88 nguyễn thái học, tp Nha Trang ', 'minguyen123@gmail.com', '0905630032', b'1', 'KH', 'person.png', '123123'),
(58, 'Nguyễn Kiều Diễm', '123 An Dương Vương, q5, tp Hồ Chí Minh', 'kieudiem123@gmail.com', '0778052785', b'1', 'AD', '354196.jpg', '123123'),
(60, 'Nguyễn Ánh Ngọc', '77 Phan Đình Giót, tp Nha Trang', 'thaovy724@gmail.com', '0778052784', b'1', 'AD', 'person.png', '123123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHD` (`idHD`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDH`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`idHSX`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idHSX` (`idHSX`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `idHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`idHD`) REFERENCES `donhang` (`idDH`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_hangsanxuat` FOREIGN KEY (`idHSX`) REFERENCES `hangsanxuat` (`idHSX`),
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idHSX`) REFERENCES `hangsanxuat` (`idHSX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
