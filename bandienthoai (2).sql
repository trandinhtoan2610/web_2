-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2024 lúc 04:28 AM
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
  `idDH` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonhang`
--

INSERT INTO `ctdonhang` (`idDH`, `idSP`, `soluong`) VALUES
(1, 14, 1),
(1, 17, 1),
(2, 20, 2),
(3, 25, 1),
(10, 21, 1),
(11, 21, 1),
(12, 21, 1),
(13, 21, 1),
(14, 21, 1),
(15, 21, 1),
(16, 21, 1),
(17, 21, 1),
(18, 21, 1),
(19, 21, 2),
(20, 21, 1),
(21, 21, 1),
(22, 21, 1),
(23, 21, 1),
(24, 21, 1),
(25, 21, 1),
(26, 21, 1),
(27, 21, 2),
(27, 24, 1),
(28, 21, 4),
(28, 23, 1),
(30, 21, 1),
(31, 21, 1),
(32, 21, 1),
(32, 24, 1),
(33, 14, 2),
(33, 25, 1),
(34, 30, 1),
(35, 30, 1),
(36, 30, 1),
(37, 30, 1),
(38, 25, 1),
(38, 33, 1);

--
-- Bẫy `ctdonhang`
--
DELIMITER $$
CREATE TRIGGER `update_luotban_trigger` AFTER INSERT ON `ctdonhang` FOR EACH ROW BEGIN
        UPDATE sanpham
        INNER JOIN ctdonhang ON sanpham.idSP = ctdonhang.idSP
        SET luotban = luotban + soluong
        WHERE sanpham.idSP = NEW.idSP;
END
$$
DELIMITER ;

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
  `diachigiao` varchar(255) NOT NULL,
  `thanhtoan` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDH`, `idTK`, `tongtien`, `ngaytao`, `ngaycapnhat`, `trangthai`, `diachigiao`, `thanhtoan`) VALUES
(1, 38, 200000, '2024-04-23', '2024-05-05', 'vc', '77 Phan Dinh Giot', 'trc'),
(2, 40, 33000000, '2024-04-24', '2024-04-24', 'ht', '77 Phan Dinh Giot\r\n', 'sau'),
(3, 38, 22000000, '2024-04-25', '2024-04-25', 'ht', '77 Phan Dinh Giot', 'trc'),
(10, 40, 15590000, '2024-04-28', '2024-04-28', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(11, 40, 15590000, '2024-04-28', '2024-04-28', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(12, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(13, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(14, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(15, 40, 31180000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(16, 40, 15590000, '2024-04-29', '2024-05-04', 'huynv', '5 cau ho, nha trang, khanh hoa', 'sau'),
(17, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(18, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(19, 40, 31180000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(20, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(21, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(22, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(23, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(24, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(25, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'trc'),
(26, 40, 15590000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'trc'),
(27, 40, 47080000, '2024-04-29', '2024-04-29', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(28, 40, 78350000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(29, 40, 15590000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(30, 40, 15590000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(31, 40, 15590000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(32, 40, 31490000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(33, 40, 59470000, '2024-05-04', '2024-05-04', 'vc', '5 cau ho, nha trang, khanh hoa', 'sau'),
(34, 40, 16000000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(35, 40, 16000000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(36, 40, 16000000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(37, 40, 16000000, '2024-05-04', '2024-05-04', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau'),
(38, 69, 29490000, '2024-05-04', '2024-05-04', 'ht', 'aa', 'sau');

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `update_inventory_trigger` AFTER UPDATE ON `donhang` FOR EACH ROW BEGIN
	IF NEW.trangthai = "huynv" OR NEW.trangthai = "huykh" THEN
        UPDATE sanpham 
        INNER JOIN ctdonhang ON sanpham.idSP = ctdonhang.idSP
        INNER JOIN donhang ON donhang.idDH = ctdonhang.idDH
        SET tonkho = tonkho + soluong
        WHERE ctdonhang.idDH = NEW.idDH;
    END IF;
END
$$
DELIMITER ;

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

--
-- Bẫy `hangsanxuat`
--
DELIMITER $$
CREATE TRIGGER `update_category_status` AFTER UPDATE ON `hangsanxuat` FOR EACH ROW BEGIN
    IF NEW.trangthai = 0 THEN
       UPDATE sanpham SET sanpham.trangthai = 0 WHERE sanpham.idHSX = NEW.idHSX AND sanpham.trangthai = 1;
    ELSEIF NEW.trangthai = 1 THEN
       UPDATE sanpham SET sanpham.trangthai = 1 WHERE sanpham.idHSX = NEW.idHSX AND sanpham.trangthai = 0;
    END IF;
END
$$
DELIMITER ;

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
(14, 'lap1.png\r\n', 'Laptop Acer TravelMate P4 TMP414 50HX i5 ', 14990000, 13, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 100),
(17, 'lap3.png', 'Laptop Lenovo V14 G3 ABA R5', 14990000, 11, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 2, b'0', 100),
(20, 'lap2.png', 'Laptop Acer Aspire 3 A314 42P R3B3 R7', 14990000, 10, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 100),
(21, '253689.jpg', 'Laptop Acer Aspire Vero AV15', 15590000, 10, 'TouchPad có kích thước vừa vặn, cảm giác di vuốt mượt mà hỗ trợ mình tốt trong mọi công việc mà không cần phải kết nối thêm với chuột bên ngoài. Tích hợp thêm là tính năng bảo mật vân tay ngay trên bàn di chuột cũng giúp mình không tốn quá nhiều thời gian khi truy cập vào thiết bị.', 'i51155G72.5GHz', ' Card tích hợp - Intel Iris Xe Graphics', ' 3-cell Li-ion, 48 Wh', ' 8 GB', 1, b'1', 101),
(23, 'pic.png', 'Laptop Acer Gaming Nitro 5 AN515 57 5669 i5 ', 15990000, 10, 'Laptop Acer Nitro 5 Gaming AN515 57 5669 i5 (NH.QEHSV.001) khơi nguồn mọi cảm hứng game thủ với phong cách thiết kế đậm chất gaming cùng những chuyển động mượt mà với card đồ họa NVIDIA GeForce GTX, mang lại chiến thắng tuyệt đối cho người dùng trên mọi chiến trường ảo.\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', ' 57 Wh Li-ion', ' 8 GB', 1, b'0', 100),
(24, '357340.jpg', 'Laptop Lenovo V15 G4 IRU i5', 15900000, 10, 'Laptop Lenovo V15 G4 IRU i5 1335U (83A1000LVN) mang đến sự kết hợp hoàn hảo giữa vẻ đẹp hiện đại cùng hàng loạt các công nghệ tiên tiến, là một lựa chọn không thể bỏ qua để tối ưu trải nghiệm trong học tập, công việc và giải trí đối với các bạn học sinh - sinh viên hoặc nhân viên văn phòng.', 'i51335U1.3GHz', 'Card tích hợpIntel Iris Xe', '38 Wh', ' 16 GB', 2, b'1', 100),
(25, '351289.jpg', 'Laptop Lenovo LOQ Gaming 15IRH8 i7', 29490000, 12, 'Siêu phẩm laptop gaming đến từ nhà Lenovo sở hữu cấu hình khủng với chip Intel i7 Gen 13, card RTX 40 series cùng thiết kế hầm hố đầy cuốn hút. Laptop Lenovo LOQ Gaming 15IRH8 i7 13620H (82XV00QXVN) chắc chắn sẽ là sự lựa chọn không thể tuyệt vời hơn cho anh em game thủ, mang đến những giờ phút giải trí đỉnh cao cũng như đáp ứng đầy đủ mọi nhu cầu sử dụng hàng ngày.', 'i713620H2.4GHz', 'Card rời RTX 4050 6GB', '60 Wh', ' 16 GB', 2, b'1', 99),
(26, '591907.jpg', 'Laptop Acer Gaming Nitro 5', 21000000, 10, 'Tốc độ làm tươi khung hình 144 Hz mang đến trải nghiệm mãn nhãn trên các tựa game hành động hấp dẫn hay những bộ phim bom tấn mà không phải lo bị xé hay nhòe hình, cho các chuyển động rõ nét và mượt hơn bao giờ hết. Thêm vào đó, công nghệ Acer ComfyView được tích hợp cho màn hình cũng giúp người dùng tránh được các hiện tượng nhức mỏi mắt khi tiếp xúc với màn hình quá lâu.', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 100),
(27, '376100.jpg', 'Laptop Acer Gaming Nitro 6', 21000000, 10, 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng dụng đồ họa kỹ thuật nâng cao như Photoshop, Illustrator, AutoCAD,...  ', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 100),
(28, '33194.jpg', 'Laptop Acer Nitro 5', 21000000, 10, 'abc', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 100),
(29, '799965.jpg', 'Laptop Acer Nitron 5', 21000000, 10, 'abc', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 100),
(30, '287323.jpg', 'Laptop Acer Gaming ', 16000000, 10, 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng dụng đồ họa kỹ thuật nâng cao như Photoshop, Illustrator, AutoCAD,...  ', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 1, b'1', 199),
(31, '286537.jpg', 'Laptop Acer Aspire 3 A315', 16000000, 10, 'abc\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 1, b'1', 200),
(32, '371042.jpg', 'Laptop Acer Aspire 3 A316', 16000000, 10, 'abc\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 2, b'1', 200),
(33, '969954.png', 'aa', 11, 1, 'aa', 'aa', 'aa', 'aa', 'aa', 2, b'0', 10);

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
  `matkhau` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idTK`, `tenTK`, `diachi`, `email`, `dienthoai`, `trangthai`, `phanquyen`, `matkhau`) VALUES
(3, 'Le Thi Thao Van', '5 Ngo Tat To, Nha Trang, Khanh Hoa', 'thaovan1@gmail.com', '0905630000', b'1', 'AD', '123'),
(38, 'Le Ngoc Thao Mi', '5 cau ho, nha trang, khanh hoa', 'thvy3724@gmail.com', '0794988553', b'0', 'KH', '123'),
(40, 'Le Ngoc Thao Mi', '5 cau ho, nha trang, khanh hoa', 'thaovy3724@gmail.com', '0794988553', b'1', 'KH', '123'),
(56, 'Nguyễn Thảo Mi', '88 nguyễn thái học, tp Nha Trang ', 'minguyen123@gmail.com', '0905630032', b'1', 'KH', '123'),
(58, 'Nguyễn Kiều Diễm', '123 An Dương Vương, q5, tp Hồ Chí Minh', 'kieudiem123@gmail.com', '0778052785', b'1', 'AD', '123'),
(60, 'Nguyễn Ánh Ngọc', '77 Phan Đình Giót, tp Nha Trang', 'thaovy724@gmail.com', '0778052784', b'1', 'AD', '123'),
(61, 'Nguyễn Trọng Hiếu', 'số 1 Võ Văn Ngân, tp Hồ Chí Minh', 'tronghieu123@gmail.com', '0093818215', b'1', 'AD', '123'),
(62, 'Nguyễn Trọng Hiếu', 'số 1 Võ Văn Ngân, tp Hồ Chí Minh', 'tronghieu1@gmail.com', '0193818215', b'1', 'AD', '123'),
(63, 'Huỳnh Ái Ngân', '88 Đào Duy Khương', 'nganhuynh@gmail.com', '0794988551', b'1', 'KH', '123'),
(64, 'Lê Ngọc Quỳnh Hương', '5 cau ho, nha trang, khanh hoa', 'thaovy3222@gmail.com', '0905630032', b'1', 'KH', '123'),
(65, 'Lê Ngọc Quỳnh Hương', '5 cau ho, nha trang, khanh hoa', 'thaovy2222@gmail.com', '0905630032', b'1', 'KH', '123'),
(66, 'Lê Ngọc Quỳnh Hương', '5 cau ho, nha trang, khanh hoa', 'thaovy1222@gmail.com', '0905630032', b'1', 'KH', '123'),
(67, 'Lê Ngọc Quỳnh Hương', '5 cau ho, nha trang, khanh hoa', 'thaovy0222@gmail.com', '0905630032', b'1', 'KH', '123'),
(68, 'Phạm Ngọc Quỳnh Hương', '5 cau ho, nha trang, khanh hoa', 'phamhuong123@gmail.com', '0905630031', b'1', 'KH', '123'),
(69, 'aa', 'aa', 'aa@gmail.com', '0987654321', b'1', 'KH', '12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`idDH`,`idSP`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDH`),
  ADD KEY `idTK` (`idTK`);

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
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `idHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`idDH`) REFERENCES `donhang` (`idDH`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idTK`) REFERENCES `taikhoan` (`idTK`);

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
