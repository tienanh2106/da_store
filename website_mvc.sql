-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2022 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandName`, `brandImg`) VALUES
(1, 'SKAGEN', '0ad5562d10.png'),
(3, 'FOSSIL', '8654349d3f.png'),
(5, 'BABY-G', '9aba91d254.png'),
(6, 'G-SHOCK', '82bce5e5a4.png'),
(7, 'MICHAEL_KORS', 'e5cf0a4548.png'),
(10, 'Omega', 'b7642c385a.png'),
(12, 'Rolex', '354d751255.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `spId` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giasp` varchar(200) NOT NULL,
  `soluong` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `nguoibl` int(11) NOT NULL,
  `binhluan` text COLLATE utf8_unicode_ci NOT NULL,
  `spid` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image_cmt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `nguoibl`, `binhluan`, `spid`, `blog_id`, `image_cmt`) VALUES
(7, 12, '11', 8, 0, ''),
(10, 12, 'Hôm nay trời đẹp thế nhỉ', 8, 0, ''),
(30, 18, 'hehehe', 22, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `gioitinh` int(2) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `lv` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `name`, `address`, `sdt`, `gioitinh`, `email`, `password`, `lv`) VALUES
(1, 'admin', 'admin', 'admin', '0987654321', 1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(12, 'tienanh2106', 'tien anh', '123 nguyen xa 123 123', '123', 1, 'dotienanh21062001@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(18, 'minhhieu', 'Minh Hiếu', 'Sóc Sơn', '0977158962', 1, 'ttanhhh.1010@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(20, 'hoanglinh', 'Trần Hoàng Linh', 'Yên Dũng', '0977158962', 2, 'tuanan10102001@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `catid` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`catid`, `catName`) VALUES
(1, 'Hộp đựng'),
(2, 'Dây đeo'),
(5, 'Đồng hồ nam'),
(6, 'Đồng hồ nữ'),
(7, 'Đồng hồ trẻ nhỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_mxh`
--

CREATE TABLE `tbl_mxh` (
  `idmxh` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_mxh`
--

INSERT INTO `tbl_mxh` (`idmxh`, `facebook`, `twitter`, `google`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100054870397689', 'https://twitter.com/ttanhhh1010', 'ttanhhh.1010@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `spId` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_id` int(11) NOT NULL,
  `soluong_order` int(11) NOT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipid` int(11) NOT NULL,
  `thanhtoan` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `spId`, `username`, `customers_id`, `soluong_order`, `gia`, `image`, `status`, `date_order`, `shipid`, `thanhtoan`) VALUES
(52, 36, 'nhe ngu ngốc', 12, 1, '30000000', '8f3b78b9e0.jpg', 3, '2021-12-28 08:07:13', 6, '1'),
(53, 37, 'nhe ngu ngốc', 12, 1, '43000000', '04277c403c.jpg', 1, '2021-12-28 08:07:13', 6, '1'),
(59, 35, 'Trần Hoàng Linh', 20, 1, '10000000', '57e855c560.jpg', 0, '2022-01-13 04:27:48', 5, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `spId` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `catid` int(11) UNSIGNED NOT NULL,
  `brandid` int(11) UNSIGNED NOT NULL,
  `motasp` text NOT NULL,
  `giasp` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`spId`, `tensp`, `catid`, `brandid`, `motasp`, `giasp`, `type`, `hinhanh`, `soluong`) VALUES
(0, 'Laforce DDHLF-CF-MM', 2, 7, 'Chất liệu: Da cá sấu nhập khẩu 100% Đường may tỉ mỉ, chắc chắn đạt tiêu chuẩn. Khả năng chống nước tốt giúp khắc phục vấn đề mồ hôi tay khi đeo đồng hồ Vân da cá sấu tự nhiên, độc đáo, không trùng lặp. Dây đồng hồ da cá sấu thiết kế sang trọng, phù hợp với mọi mặt đồng hồ hiện nay', '320000', 2, '28faf8c3e3.jpg', 23),
(2, 'G-SHOCK DW-5900DN-1DR', 5, 6, 'Mẫu G-Shock DW-5900DN-1DR phi&ecirc;n bản mặt số điện tử đa chức năng kết hợp c&ugrave;ng khả năng chịu nước l&ecirc;n đến 20atm, thiết kế d&acirc;y vỏ nhựa phối tone m&agrave;u đen năng động.', '2937000', 1, 'a7a82473e4.jpg', 55),
(4, 'G-SHOCK GA-2110ET-8ADR', 5, 6, 'Mẫu G-Shock GA-2110ET-8ADR phi&ecirc;n bản d&acirc;y vỏ nhựa phối tone m&agrave;u x&aacute;m thời trang nam t&iacute;nh c&ugrave;ng với khả năng chịu nước nổi bật l&ecirc;n đến 20atm.', '3726000', 1, 'ac7a7da74c.jpg', 200),
(5, 'G-SHOCK GA-2110ET-2ADR', 5, 6, 'Mẫu G-Shock GA-2110ET-2ADR phi&ecirc;n bản d&acirc;y vỏ nhựa phối tone m&agrave;u xanh thời trang nam t&iacute;nh c&ugrave;ng với khả năng chịu nước nổi bật l&ecirc;n đến 20atm.', '3726000', 1, 'ac05217c3d.jpg', 33),
(6, 'G-SHOCK DW-5600WM-5DR', 5, 6, 'Mẫu G-Shock DW-5600WM-5DR với phần d&acirc;y vỏ nhựa đồng hồ được tạo h&igrave;nh họa tiết v&acirc;n đ&aacute;, tạo n&ecirc;n vẻ thời trang độc đ&aacute;o kết hợp c&ugrave;ng với nền mặt số điện tử hiện thị đa chức năng.', '3381000', 1, '206e3e2cc7.jpg', 25),
(7, 'G-SHOCK GA-900-4ADR', 5, 6, 'Mẫu G-Shock GA-900-4ADR phi&ecirc;n bản d&acirc;y vỏ nhựa chịu va đập phối tone m&agrave;u đỏ đen nổi bật, mặt số điện tử đa chức năng kết hợp c&ugrave;ng khả năng chịu nước l&ecirc;n đến 20atm.', '4072000', 1, '1a1a4fa5c3.jpg', 100),
(8, 'G-SHOCK GBA-900-1ADR', 5, 6, 'Mẫu G-Shock GBA-900-1ADR phi&ecirc;n bản mặt số điện tử đa chức năng kết hợp c&ugrave;ng khả năng chịu nước l&ecirc;n đến 20atm, nổi bật với t&iacute;nh năng Bluetooth kết nối với điện thoại th&ocirc;ng minh.', '4244000', 1, '4cdc20b1bc.jpg', 50),
(9, 'G-SHOCK GM-S5600-1DR ', 5, 6, 'Mẫu G-Shock GM-S5600-1DR phi&ecirc;n bản mức chống nước nổi bật 20atm, d&acirc;y vỏ nhựa phong c&aacute;ch năng động, c&ugrave;ng với thiết kế mặt số vu&ocirc;ng điện tử hiện thị đa chức năng.', '5687000', 1, '48551df24f.jpg', 25),
(10, 'BABY-G BGA-290-5ADR', 7, 6, 'Mẫu Baby-G BGA-290-5ADR phiên bản dây vỏ nhựa được phối cùng tone màu nâu nhạt thời trang, kết hợp cùng với khả năng chịu nước lên đến 10atm.', '3899000', 1, 'bfa4495d7e.jpg', 22),
(11, 'BABY-G MSG-S500G-7A2DR', 7, 5, 'Mẫu Baby-G MSG-S500G-7A2DR phiên bản trang bị công nghệ Solar (năng lượng ánh sáng), mẫu dây đeo cao su trắng được phối tone màu thời trang.', '6490000', 1, '84511a1b16.jpg', 30),
(12, 'BABY-G MSG-S500G-5ADR', 7, 5, 'Mẫu Baby-G MSG-S500G-5ADR phiên bản trang bị công nghệ Solar (năng lượng ánh sáng), mẫu dây đeo cao su được phối tone màu nâu thời trang.', '6490000', 1, 'd71debfc96.jpg', 100),
(13, 'BABY-G BA-130-4ADR', 7, 5, 'Mẫu Baby-G BA-130-4ADR phiên bản năng động với khả năng chịu nước 10atm, dây vỏ nhựa phối tone màu hồng thời trang nổi bật, mặt số kim chỉ kết hợp với ô số điện tử hiện thị đa chức năng tiện ích.', '4343000', 1, '82868c2886.jpg', 25),
(14, 'BABY-G BA-130-7A1DR', 7, 5, 'Mẫu Baby-G BA-130-7A1DR thiết kế thời trang với phần dây vỏ nhựa khả năng chịu va đập, kết hợp cùng ô số điện tử đa chức năng với vẻ ngoài năng động.', '4343000', 1, 'cef01a75e2.jpg', 20),
(15, 'FOSSIL FS5809', 5, 3, 'Mẫu Fossil FS5809 d&acirc;y da n&acirc;u với phi&ecirc;n bản da trơn, phần vỏ m&aacute;y b&ecirc;n h&ocirc;ng thiết kế 3 n&uacute;m vặn điều chỉnh c&aacute;c t&iacute;nh năng Chronograph (đo thời gian) hiện thị tr&ecirc;n nền mặt số với k&iacute;ch thước 44mm.', '3750000', 1, 'e462cc44f6.jpg', 2),
(16, 'FOSSIL FS5863', 5, 3, 'Mẫu Fossil FS5863 d&acirc;y đeo phi&ecirc;n bản d&acirc;y vải thể thao nam t&iacute;nh kết hợp với c&aacute;c chi tiết cọc vạch số c&ugrave;ng kim chỉ được tạo h&igrave;nh d&agrave;y dặn phủ dạ quang nổi bật trong điều kiện thiếu &aacute;nh s&aacute;ng.', '3456000', 1, '7176978168.jpg', 12),
(17, 'FOSSIL ES4898', 6, 3, 'Mẫu Fossil ES4898 thiết kế thời trang sang trọng với 9 vi&ecirc;n đ&aacute; pha l&ecirc; được đ&iacute;nh tương ứng với c&aacute;c m&uacute;i giờ hiện thị tr&ecirc;n nền mặt số được phối tone m&agrave;u v&agrave;ng hồng với k&iacute;ch thước 32mm.', '3426000', 1, '5b5ddb1d2f.jpg', 23),
(18, 'FOSSIL ES4442', 6, 3, 'Mẫu Fossil ES4442 phi&ecirc;n bản d&acirc;y vỏ kim loại phối tone m&agrave;u đen nổi bật l&ecirc;n thiết kế sang trọng đ&iacute;nh 1 vi&ecirc;n pha l&ecirc; tr&ecirc;n nền mặt số size 34mm tại vị tr&iacute; 12 giờ.', '3750000', 1, '26da949256.jpg', 3),
(19, 'SKAGEN SKW2906', 6, 1, 'Mẫu Skagen SKW2906 d&acirc;y da phi&ecirc;n bản da trơn họa tiết đa m&agrave;u sắc kết hợp c&ugrave;ng nền mặt số size 30mm tone m&agrave;u xanh x&agrave; cừ thời trang nổi bật cho ph&aacute;i đẹp.', '3900000', 1, 'b752356263.jpg', 44),
(20, 'SKAGEN SKW2905', 6, 1, 'Mẫu Skagen SKW2905 mặt số size 30mm tone m&agrave;u trắng x&agrave; cừ thời trang nổi bật cho bạn nữ phối c&ugrave;ng bộ d&acirc;y da phi&ecirc;n bản da trơn họa tiết đa m&agrave;u sắc.', '3900000', 1, '86f89f59c3.jpg', 54),
(21, 'SKAGEN SKW6652', 5, 1, 'Mẫu Skagen SKW6652 mặt số xanh kiểu d&aacute;ng 6 kim size 42mm tone m&agrave;u thời trang phối c&ugrave;ng bộ d&acirc;y đeo mạ bạc phi&ecirc;n bản d&acirc;y lưới.', '3500000', 1, 'f4f25d4c7e.jpg', 22),
(22, 'SKAGEN SKW2718', 5, 1, 'Mẫu Skagen SKW2718 mang đến vẻ thanh lịch nữ t&iacute;nh d&agrave;nh cho ph&aacute;i đẹp với nền mặt số hoa văn tạo n&ecirc;n điểm nhấn vẻ ngo&agrave;i thời trang trẻ trung khi kết hợp c&ugrave;ng mẫu d&acirc;y lưới bạc.', '4630000 ', 1, '967290a01e.jpg', 45),
(23, 'MICHAEL KORS MK6642', 6, 7, 'Mẫu Michael Kors MK6642 phi&ecirc;n bản v&agrave;ng hồng tone m&agrave;u trẻ trung tr&ecirc;n phần vạch số kim chỉ được tạo h&igrave;nh mỏng tr&ecirc;n nền mặt số trắng c&oacute; họa tiết thời trang size 36mm.', '6230000', 1, '134e9d0465.jpg', 62),
(24, 'MICHAEL KORS MK6865', 6, 7, 'Mẫu Michael Kors MK6865 thiết kế nổi bật đ&iacute;nh c&aacute;c vi&ecirc;n pha l&ecirc; sang trọng lấp l&aacute;nh tr&ecirc;n phần vỏ viền đồng hồ phối tone m&agrave;u v&agrave;ng hồng thời trang d&agrave;nh cho ph&aacute;i đẹp.', '6900000', 1, '5e529eebde.jpg', 77),
(25, 'HIRSCH VOYAGER', 2, 7, 'Chất liệu:&nbsp;Da c&aacute; sấu handmade Heng Long nhập khẩu 100%.Da l&oacute;t Zermatt (Ph&aacute;p) - d&ograve;ng da l&oacute;t d&acirc;y đồng hồ tốt nhất hiện nay. Khả năng chống nước ho&agrave;n hảo gi&uacute;p khắc phục vấn đề mồ h&ocirc;i tay khi đeo đồng hồ. D&acirc;y đồng hồ da c&aacute; sấu&nbsp;v&acirc;n da tự nhi&ecirc;n, độc đ&aacute;o, kh&ocirc;ng tr&ugrave;ng lặp.Thiết kế sang trọng, ph&ugrave; hợp với mặt đồng hồ tinh tế.', '1687000', 1, '5be08fabaf.jpg', 184),
(27, ' DDHLF-01-D', 2, 3, 'Chất liệu: Da bò nhập khẩu từ châu Âu. Đường may chi tiết, tỉ mỉ theo tiêu chuẩn. Dây đồng hồ da bò thiết kế lịch sự, trẻ trung, phù hợp với mọi loại đồng hồ. Màu sắc độc đáo, phong cách.', '3900000', 2, '9485d14f06.jpg', 44),
(28, 'HIRSCH TRITONE', 2, 1, 'Chất liệu:&nbsp;Da Trăn nhập khẩu 100%. Đường may tỉ mỉ, chắc chắn đạt ti&ecirc;u chuẩn. Khả năng chống nước tốt gi&uacute;p khắc phục vấn đề mồ h&ocirc;i tay khi đeo đồng hồ. D&acirc;y đồng hồ da trăn&nbsp;v&acirc;n da&nbsp;tự nhi&ecirc;n, độc đ&aacute;o, kh&ocirc;ng tr&ugrave;ng lặp. Thiết kế sang trọng, ph&ugrave; hợp với mọi mặt đồng hồ hiện nay ', '1200000', 1, '3e513484b2.jpg', 45),
(29, 'MASAMU MESH (SILVER)', 2, 5, 'L&agrave; d&ograve;ng sản phẩm d&acirc;y đồng hồ mới nhất chất lượng nhất với những chất liệu v&agrave; kiểu d&aacute;ng đa dạng cho c&aacute;c bạn lựa chọn. H&atilde;ng sản xuất: Strap&amp;Co. Xuất xứ: Amazon. Chất liệu: Th&eacute;p kh&ocirc;ng rỉ. K&iacute;ch cỡ: Mắt nhỏ 0.4mm. Cỡ d&acirc;y: 20mm, 22mm. M&agrave;u kh&oacute;a: bạc. Chất liệu kh&oacute;a:d&acirc;y kim loại innox Th&eacute;p kh&ocirc;ng rỉ', '4343000', 1, 'd55e9b3e5e.jpg', 76),
(30, 'MASAMU MESH (GOLD)', 2, 6, 'H&atilde;ng sản xuất: Strap&amp;Co. Xuất xứ: Amazon. Chất liệu: Th&eacute;p kh&ocirc;ng rỉ. K&iacute;ch cỡ Mắt: Giữ to 11mm. Cỡ d&acirc;y: 18mm, 20mm, 22mm, 24mm, 26mm. M&agrave;u kh&oacute;a: Silver/đen/v&agrave;ng. Chất liệu kh&oacute;a: Th&eacute;p kh&ocirc;ng rỉ. C&ocirc;ng nghệ: Mắt kh&uacute;c. Bảo h&agrave;nh: 3 th&aacute;ng. Đem lại cảm gi&aacute;c m&aacute;t tay khi đeo, kh&ocirc;ng lo đi mưa hay mồ h&ocirc;i tay', '500000', 1, '13d31ee5b0.jpg', 65),
(31, 'HIRSCH MASSAI OSTRICH', 2, 10, 'D&acirc;y da Hirsch Massai Ostrich được l&agrave;m từ da đ&agrave; điểu ch&acirc;u Phi ch&iacute;nh h&atilde;ng. Mẫu d&acirc;y da n&agrave;y cũng c&oacute; khả năng kh&aacute;ng nước cơ bản cho người d&ugrave;ng', '400000', 1, '06f4538149.jpg', 33),
(32, 'HIRSCH STONE', 2, 10, 'Mẫu d&acirc;y da Hirsch STONE thiết kế kiểu d&aacute;ng độc đ&aacute;o, được l&agrave;m từ cao su thi&ecirc;n nhi&ecirc;n phủ đ&aacute; phi&ecirc;n hạt mịn, khả năng chịu nước 300m', '2333333', 0, '6e717d0eab.jpg', 33),
(33, 'HIRSCH LUCCA', 2, 10, 'Dây da Hirsch Lucca có nguồn gốc tự nhiên được thuộc từ những phần da tốt nhất của da bê với những đường gân đặc trưng. Khả năng kháng nước của dây cực tốt.', '2342222', 1, '4e58d59ba1.jpg', 20),
(34, 'HIRSCH HEAVY-CALF', 2, 10, 'Dây da Hirsch Heavy-Calf được làm bằng chất liệu da bê Ý chống trầy xước, bền với lớp lót đặc biệt mịn. Khả năng chống nước của dây da lên đến 100m.', '23333222', 1, '1c6c5e1fc1.jpg', 30),
(35, 'HỘP ZRC – WATCH WINDER', 1, 10, 'Hộp đựng đồng hồ cao cấp ZRC WATCH WINDER (EM03201). Dòng hộp chuyên dụng cho dòng đồng hồ tự động. Thiết kế hộp tinh tế, mạnh mẽ và sang trọng.', '10000000', 1, '57e855c560.jpg', 10),
(36, 'FREDERIQUE CONSTANT ', 5, 12, 'Mẫu Frederique Constant FC-206ND1S2B phiên bản sang trọng với thiết kế 8 viên kim cương đính nổi bật trên nền mặt số xanh với kích thước 30mm.', '30000000', 1, '8f3b78b9e0.jpg', 22),
(37, 'LONGINES L4.274.4.27.6', 6, 12, 'Mẫu Longines L4.274.4.27.6 phiên bản sang trọng với 12 viên kim cương đính tương ứng 12 múi giờ, tạo nên vẻ thời trang độc đáo trên nền mặt số kích thước 26mm.', '43000000', 1, '04277c403c.jpg', 25),
(39, 'Rolex Datejust 41 126333 Mặt Số Đen Nạm Kim Cương', 5, 12, 'Đồng hồ Rolex Datejust mang mã hiệu 126333. Chiếc đồng hồ dành cho nam giới này có xuất xứ Thuỵ Sĩ.', '458000000', 1, '5a2c895d19.png', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ship`
--

CREATE TABLE `tbl_ship` (
  `shipid` int(11) NOT NULL,
  `shipname` varchar(200) NOT NULL,
  `shipimg` varchar(200) NOT NULL,
  `shipmota` varchar(200) NOT NULL,
  `shipgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_ship`
--

INSERT INTO `tbl_ship` (`shipid`, `shipname`, `shipimg`, `shipmota`, `shipgia`) VALUES
(5, 'Grap', 'f694b44ffa.png', 'rẻ', 15000),
(6, 'Giao hàng tiết kiệm', '29cc56199d.png', 'Nhanh gọn', 30000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `vitri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `type`, `vitri`) VALUES
(1, 'slider 1', 'ae993285d9.png', 1, 1),
(2, 'slider 12', '63c5e72b41.png', 1, 2),
(3, 'slider 13', '774f783c5b.png', 1, 3),
(5, 'slider 2', '6bf8766465.png', 1, 4),
(7, 'skagen baner', '24f9cc5221.png', 1, 5),
(8, 'omega banner', 'a228732b0b.png', 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `spId` int(11) NOT NULL,
  `tensp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `spId`, `tensp`, `gia`, `image`) VALUES
(1, 12, 28, 'DDHLFDT-N-MM', '1200000', 'f7491d46ff.jpg'),
(2, 12, 27, ' DDHLF-01-D', '3900000', '9485d14f06.jpg'),
(4, 12, 30, 'Dây Đồng Hồ Kim Loại Innox Đúc Khóa Bấm', '500000', '50b4e8cb9e.jpg'),
(5, 12, 22, 'SKAGEN SKW2718', '4630000 ', '967290a01e.jpg'),
(8, 12, 36, 'FREDERIQUE CONSTANT ', '30000000', '8f3b78b9e0.jpg'),
(10, 20, 37, 'LONGINES L4.274.4.27.6', '43000000', '04277c403c.jpg'),
(11, 20, 39, 'Rolex Datejust 41 126333 Mặt Số Đen Nạm Kim Cương', '458000000', '5a2c895d19.png'),
(12, 20, 36, 'FREDERIQUE CONSTANT ', '30000000', '8f3b78b9e0.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `spId` (`spId`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `spid` (`spid`),
  ADD KEY `nguoibl` (`nguoibl`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `tbl_mxh`
--
ALTER TABLE `tbl_mxh`
  ADD PRIMARY KEY (`idmxh`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `spId` (`spId`),
  ADD KEY `customers_id` (`customers_id`),
  ADD KEY `shipid` (`shipid`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`spId`),
  ADD KEY `catid` (`catid`,`brandid`),
  ADD KEY `brandid` (`brandid`);

--
-- Chỉ mục cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  ADD PRIMARY KEY (`shipid`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spId` (`spId`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `catid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `spId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  MODIFY `shipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`spId`) REFERENCES `tbl_sanpham` (`spId`);

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`spid`) REFERENCES `tbl_sanpham` (`spId`),
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`nguoibl`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_comment_ibfk_3` FOREIGN KEY (`nguoibl`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_comment_ibfk_4` FOREIGN KEY (`nguoibl`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`spId`) REFERENCES `tbl_sanpham` (`spId`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customers_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`shipid`) REFERENCES `tbl_ship` (`shipid`),
  ADD CONSTRAINT `tbl_order_ibfk_4` FOREIGN KEY (`customers_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`brandid`) REFERENCES `tbl_brand` (`brandid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_sanpham_ibfk_2` FOREIGN KEY (`catid`) REFERENCES `tbl_danhmuc` (`catid`);

--
-- Các ràng buộc cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`spId`) REFERENCES `tbl_sanpham` (`spId`),
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_wishlist_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_wishlist_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
