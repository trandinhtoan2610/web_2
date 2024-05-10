-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2024 lúc 06:16 PM
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
  `soluong` int(11) NOT NULL,
  `gialucdat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonhang`
--

INSERT INTO `ctdonhang` (`idDH`, `idSP`, `soluong`, `gialucdat`) VALUES
(55, 25, 1, 29490000),
(55, 27, 2, 21000000),
(56, 14, 1, 14990000),
(56, 23, 1, 15990000),
(57, 14, 2, 14990000),
(57, 28, 1, 21000000),
(58, 25, 3, 29490000),
(59, 27, 1, 21000000),
(59, 28, 1, 21000000),
(60, 14, 1, 15990000),
(60, 33, 1, 11),
(61, 32, 1, 16000000),
(67, 14, 1, 15990000),
(67, 20, 2, 14990000),
(68, 14, 1, 15990000),
(68, 33, 1, 11),
(69, 14, 1, 15990000),
(69, 27, 1, 21000000),
(69, 33, 1, 11),
(70, 20, 1, 14990000),
(71, 20, 1, 14990000),
(72, 14, 3, 15990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDH` int(11) NOT NULL,
  `idTK` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
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
(55, 40, 71490000, '2024-05-09', '2024-05-10', 'huynv', '5 cau ho, nha trang, khanh hoa', 'sau'),
(56, 40, 30980000, '2024-05-09', '2024-05-09', 'ht', '5 cau ho, nha trang, khanh hoa', 'sau'),
(57, 40, 50980000, '2024-05-09', '2024-05-10', 'vc', '5 cau ho, nha trang, khanh hoa', 'sau'),
(58, 40, 88470000, '2024-05-09', '2024-05-09', 'cho', '5 cau ho, nha trang, khanh hoa', 'trc'),
(59, 70, 42000000, '2024-05-09', '2024-05-10', 'cho', '77 Phan Đình Giót, tp Nha Trang', 'sau'),
(60, 68, 15990011, '2024-05-09', '2024-05-09', 'huynv', '5 cau ho, nha trang, khanh hoa', 'sau'),
(61, 68, 16000000, '2024-05-09', '2024-05-09', 'ht', '5 cau ho, nha trang, khanh hoa', 'trc'),
(67, 72, 45970000, '2024-05-09', '2024-05-09', 'ht', '77 Phan Đình Giót, TP Nha Trang', 'trc'),
(68, 72, 15990011, '2024-05-09', '2024-05-09', 'cho', '77 Phan Đình Giót, TP Nha Trang', 'trc'),
(69, 70, 36990011, '2024-05-09', '2024-05-10', 'cho', '77 Phan Đình Giót, tp Nha Trang', 'sau'),
(70, 73, 14990000, '2024-05-10', '2024-05-10', 'cho', '77 Phan Đình Phùng, TP Nha Trang', 'trc'),
(71, 73, 14990000, '2024-05-10', '2024-05-10', 'ht', '77 Phan Đình Giót, TP Nha Trang', 'sau'),
(72, 40, 47970000, '2024-05-10', '2024-05-10', 'cho', '5 cau ho, nha trang, khanh hoa', 'sau');

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `update_inventory_trigger` AFTER UPDATE ON `donhang` FOR EACH ROW BEGIN
	IF NEW.trangthai = "huynv" OR NEW.trangthai = "huykh" THEN
        UPDATE sanpham 
        INNER JOIN ctdonhang ON sanpham.idSP = ctdonhang.idSP
        INNER JOIN donhang ON donhang.idDH = ctdonhang.idDH
        SET tonkho = tonkho + soluong,
        luotban = luotban - soluong
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
(2, 'LENOVO', 'lenovo.png', b'1'),
(4, 'MacBook', '4630.png', b'0');

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
(14, 'lap1.png\r\n', 'Laptop Acer TravelMate P4 TMP414 50HX i5 ', 15990000, 34, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 100),
(17, 'lap3.png', 'Laptop Lenovo V14 G3 ABA R5', 14990000, 11, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 2, b'1', 100),
(20, 'lap2.png', 'Laptop Acer Aspire 3 A314 42P R3B3 R7', 14990000, 20, 'Là một chiếc máy nằm trong phân khúc trên dưới 13 triệu, laptop khá nổi bật khi trang bị một bộ bàn phím layout Fullsize chắc chắn phù hợp cho cá nhân mình hoặc những bạn làm việc văn phòng đặc biệt là những ai cần nhập liệu nhiều trong lĩnh vực kế toán, hành chính,… Bên cạnh đó, khoảng cách giữa các phím xa nhau, không bị hụt tay khi gõ, hành trình phím cũng khá sâu nên khi mình bấm rất nịnh tay luôn. Một điểm trừ duy nhất mình thấy khá là tiếc trên chiếc máy này khi không hỗ trợ sẵn đèn nền khá khó khăn đối với những bạn chưa quen làm việc trong môi trường thiếu sáng. ', 'i5, 11400H, 2.7GHz', 'GTX 1650 Max-Q 4GB', '3-cell, 51Wh', '8GB', 1, b'1', 91),
(21, '253689.jpg', 'Laptop Acer Aspire Vero AV15', 15590000, 10, 'TouchPad có kích thước vừa vặn, cảm giác di vuốt mượt mà hỗ trợ mình tốt trong mọi công việc mà không cần phải kết nối thêm với chuột bên ngoài. Tích hợp thêm là tính năng bảo mật vân tay ngay trên bàn di chuột cũng giúp mình không tốn quá nhiều thời gian khi truy cập vào thiết bị.', 'i51155G72.5GHz', ' Card tích hợp - Intel Iris Xe Graphics', ' 3-cell Li-ion, 48 Wh', ' 8 GB', 1, b'1', 101),
(23, '11901.jpg', 'Laptop Acer Gaming Nitro 5 AN515 57 5669 i5 ', 15990000, 11, 'Laptop Acer Nitro 5 Gaming AN515 57 5669 i5 (NH.QEHSV.001) khơi nguồn mọi cảm hứng game thủ với phong cách thiết kế đậm chất gaming cùng những chuyển động mượt mà với card đồ họa NVIDIA GeForce GTX, mang lại chiến thắng tuyệt đối cho người dùng trên mọi chiến trường ảo.\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', ' 57 Wh Li-ion', ' 8 GB', 1, b'1', 99),
(24, '357340.jpg', 'Laptop Lenovo V15 G4 IRU i5', 15900000, 11, 'Laptop Lenovo V15 G4 IRU i5 1335U (83A1000LVN) mang đến sự kết hợp hoàn hảo giữa vẻ đẹp hiện đại cùng hàng loạt các công nghệ tiên tiến, là một lựa chọn không thể bỏ qua để tối ưu trải nghiệm trong học tập, công việc và giải trí đối với các bạn học sinh - sinh viên hoặc nhân viên văn phòng.', 'i51335U1.3GHz', 'Card tích hợpIntel Iris Xe', '38 Wh', ' 16 GB', 2, b'1', 99),
(25, '351289.jpg', 'Laptop Lenovo LOQ Gaming 15IRH8 i7', 29490000, 18, 'Siêu phẩm laptop gaming đến từ nhà Lenovo sở hữu cấu hình khủng với chip Intel i7 Gen 13, card RTX 40 series cùng thiết kế hầm hố đầy cuốn hút. Laptop Lenovo LOQ Gaming 15IRH8 i7 13620H (82XV00QXVN) chắc chắn sẽ là sự lựa chọn không thể tuyệt vời hơn cho anh em game thủ, mang đến những giờ phút giải trí đỉnh cao cũng như đáp ứng đầy đủ mọi nhu cầu sử dụng hàng ngày.', 'i713620H2.4GHz', 'Card rời RTX 4050 6GB', '60 Wh', ' 16 GB', 2, b'1', 93),
(27, '376100.jpg', 'Laptop Acer Gaming Nitro 6', 21000000, 12, 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng dụng đồ họa kỹ thuật nâng cao như Photoshop, Illustrator, AutoCAD,...  ', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 98),
(28, '33194.jpg', 'Laptop Acer Nitro 5', 21000000, 12, 'abc', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 98),
(29, '799965.jpg', 'Laptop Acer Nitron 5', 21000000, 10, 'abc', 'i511400H2.7GHz', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '57 Wh Li-ion', ' 16 GB', 1, b'1', 100),
(30, '287323.jpg', 'Laptop Acer Gaming ', 16000000, 12, 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng dụng đồ họa kỹ thuật nâng cao như Photoshop, Illustrator, AutoCAD,...  ', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 1, b'1', 197),
(31, '286537.jpg', 'Laptop Acer Aspire 3 A315', 16000000, 10, 'abc\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 1, b'1', 200),
(32, '371042.jpg', 'Laptop Acer Aspire 3 A316', 16000000, 13, 'abc\r\n', ' Intel Core i5 Tiger Lake - 11400H', ' Card rời - NVIDIA GeForce GTX 1650 4 GB', '38 Wh', ' 16 GB', 1, b'1', 197),
(33, '605066.jpg', 'Laptop Lenovo Ideapad Slim 3', 11, 6, 'aa', 'aa', 'aa', 'aa', 'aa', 2, b'1', 50),
(34, '665740.jpg', 'Laptop Lenovo Yoga 7 14IRL8 i5 ', 22990000, 0, 'Laptop Lenovo Yoga được hoàn thiện với lớp vỏ kim loại đầy sang trọng, thêm nữa độ bền chuẩn quân đội MIL STD 810H còn giúp máy chịu đựng tốt trước các tác động của môi trường. Đồng thời, mẫu laptop mỏng nhẹ này có khối lượng chỉ vỏn vẹn 1.49 kg nên bạn có thể mang theo bất cứ đâu mà không cảm thấy quá nặng nề.', 'i5, 1340P, 1.9GHz', 'Card tích hợp, Intel Iris Xe', '71 Wh', '16 GB', 2, b'1', 100),
(35, '907524.jpg', 'Laptop Acer Gaming Nitro 5 Tiger', 21990000, 0, 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng dụng đồ họa kỹ thuật nâng cao như Photoshop, Illustrator, AutoCAD,...  ', 'i7, 12700H, 2.30 GHz', 'Card rời', '4-cell Li-ion, 57.5 Wh', '8 GBDDR4 2 khe', 1, b'1', 100),
(36, '11727.jpg', 'Laptop Acer Aspire 5', 10000000, 0, 'Laptop Acer Aspire 5 A515 58P 34RJ i3 1315U (NX.KHJSV.003) sở hữu cấu hình mạnh mẽ từ bộ vi xử lý Intel thế hệ 13 hoàn toàn mới và ngoại hình thời thượng, sang trọng. Một chiếc laptop học tập - văn phòng đáng để bạn cân nhắc sở hữu cho công việc cũng như giải trí hàng ngày.', ' i3, 1315U, 1.2GHz', 'Card tích hợp, Intel UHD', ' 3-cell Li-ion, 50 Wh', '8 GB', 1, b'1', 50),
(37, '995690.jpg', 'Laptop Acer Gaming Nitro 5 AN', 25000000, 0, 'Laptop Acer Gaming Nitro 5 AN515 57 53F9 i5 11400H (NH.QENSV.008) sở hữu diện mạo hầm hố đậm chất gaming kết hợp cùng card đồ họa RTX 30 series mang hiệu năng mạnh mẽ. Chiếc laptop gaming này sẽ là người bạn đồng hành tuyệt vời giúp bạn chinh phục mọi chiến trường ảo.', 'i5, 11400H, 2.7GHz', 'Card rời, RTX 3050 4GB', ' 4-cell Li-ion, 57.5 Wh', '8 GB', 1, b'1', 20);

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
(69, 'aa', 'aa', 'aa@gmail.com', '0987654321', b'1', 'KH', '12'),
(70, 'Phạm Bình Minh', '77 Phan Đình Giót, tp Nha Trang', 'binhminh123@gmail.com', '0778052785', b'1', 'KH', '123'),
(71, 'Lê Anh Thư', '79 Hoàng Văn Thụ, TP Nha Trang', 'anhthu123@gmail.com', '0778052785', b'1', 'AD', '123'),
(72, 'Nguyễn Hiền Nhân', '77 Phan Đình Giót, TP Nha Trang', 'hiennhan123@gmail.com', '0778052785', b'1', 'KH', '123'),
(73, 'Nguyễn Bánh Bèo', '77 Phan Đình Giót, TP Nha Trang', 'banhbeo123@gmail.com', '0905630032', b'1', 'KH', '123');

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
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `idHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
