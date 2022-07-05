-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 05:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills_ban`
--

CREATE TABLE `bills_ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kh` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `kh_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bills_nhap`
--

CREATE TABLE `bills_nhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ncc` int(11) DEFAULT NULL,
  `id_nhanvien` int(10) NOT NULL,
  `date_order` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL COMMENT 'tổng tiền',
  `thanh_toan` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail_ban`
--

CREATE TABLE `bill_detail_ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill_ban` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `sl` int(11) NOT NULL COMMENT 'số lượng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail_nhap`
--

CREATE TABLE `bill_detail_nhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill_nhap` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `sl` int(11) NOT NULL COMMENT 'số lượng',
  `don_vi` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `email`, `dia_chi`, `sdt`, `note`, `created_at`, `updated_at`) VALUES
(28, 'Đoàn Thùy Linh', 'doanlinh1098@gmail.com', 'Bình Nguyên-Đa Lộc-Ân Thi-Hưng Yên', '0983017991', NULL, '2019-04-18 22:50:19', '2019-04-18 22:50:19'),
(32, 'Đoàn Văn Việt', 'tuan@gmail.com', 'Đa Lộc-Ân Thi-Hưng Yên', '0983756482', NULL, '2019-05-05 18:19:04', '2019-05-05 18:19:04'),
(34, 'Đoàn Linh', 'doanlinh@gmail.com', 'Đa Lộc- Ân Thi-Hưng Yên', '01628470872', NULL, '2019-05-09 01:27:05', '2019-05-09 01:27:05'),
(27, 'Nguyễn Văn Hùng', 'hung@gmail.com', 'Nguyễn Xá- Nhân Hòa-Mỹ Hào-Hưng yên', '0983017763', NULL, '2019-04-22 08:11:30', '2019-04-18 22:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`id`, `id_sp`, `sl`) VALUES
(1, 1, 12),
(2, 2, 23),
(3, 3, 23),
(4, 4, 23),
(5, 5, 34),
(6, 6, 34),
(7, 7, 56),
(8, 8, 25),
(9, 9, 45),
(10, 10, 27),
(11, 11, 43),
(12, 12, 44),
(13, 13, 29),
(14, 14, 55),
(15, 15, 58),
(16, 31, 77),
(17, 32, 55);

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenloai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`id`, `tenloai`, `created_at`, `updated_at`, `anh`) VALUES
(324, 'Nam', NULL, NULL, '1650428563959.jpeg'),
(325, 'Nữ', '2022-06-08 20:19:29', '2022-06-08 20:19:29', 'n1 - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_new` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_new`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '10 thức uống giải độc cho thận tốt nhất', 'Nếu thận của bạn không khoẻ mạnh, nó sẽ mất khả năng lọc ra chất thải và chất độc sẽ bắt đầu tích tụ trong cơ thể, dẫn đến sỏi thận.', 'thuc-uong-giai-doc.jpg', '2022-06-02 14:21:56', '2022-06-02 14:21:56'),
(2, 'Bí quyết về ăn uống giúp bạn mau chóng khỏi ốm', 'Cách thức ăn uống giúp người ốm mau phục hồi Bổ sung các loại trái cây chứa nhiều chất xơ tiêu hóa và vitamin Trái cây và rau củ như quýt, cam, dâu tây, xoài, chuối, kiwi, bưởi… là các loại quả chứa nhiều loại vitamin trong đó có vitaminC là một chất chống oxy hóa, tốt cho sức khỏe và nâng cao sức đề kháng cho người bệnh, giúp giảm sốt cũng như bù đắp các chất điện giải cho cơ thể. Các loại trái cây, rau củ chứa nhiều chất xơ sẽ giúp người bệnh tiêu hóa tốt hơn. Thức ăn chứa nhiều chất xơ nhất là bánh mì nâu, bánh mì đen.', 'thuc-don-cho-nguoi-moi-om-day-7.webp', '2022-06-06 02:12:21', '2022-06-06 02:12:21'),
(3, '9 công dụng chữa bệnh của đậu nành', '1. Ngừa ung thư vú ở phụ nữ   Một cuộc khảo sát của các nhà khoa học thuộc Đại học Georgetown (Mỹ) cho thấy bổ sung đậu nành ở mức độ vừa phải giúp giảm nguy cơ bị ung thư vú. Theo Hiệp hội Ung thư Mỹ, dùng 3 khẩu phần đậu nành mỗi ngày đem lại nhiều ích lợi cho phụ nữ có nguy cơ hoặc có tiền sử gia đình mắc bệnh ung thư vú.  Bổ sung 20-133g protein từ đậu nành mỗi ngày có thể giúp giảm 7-10% hàm lượng cholesterol xấu LDL trong cơ thể.  2. Tác dụng trên tim mạch  Theo một cuộc khảo sát, bổ sung 20-133g protein từ đậu nành mỗi ngày có thể giúp giảm 7-10% hàm lượng cholesterol xấu LDL trong cơ thể. “Dùng đậu nành là một phần của chế độ dinh dưỡng giúp giảm nguy cơ mắc bệnh tim”, Wahida Karmally – Giám đốc dinh dưỡng tại Viện Nghiên cứu Irving – nói.  Còn theo Cơ quan Quản lý dược phẩm và thực phẩm Mỹ (FDA), thêm 25g protein từ đậu nành mỗi ngày có tác dụng giảm lượng chất béo bão hòa, qua đó giảm nguy cơ mắc bệnh tim mạch.  Các nhà khoa học thuộc Hội mãn kinh ở Bắc Mỹ đã kết luận: Đậu nành và các chất chiết từ đậu nành có tác dụng giảm huyết áp tâm trương, giảm cholesterol toàn phần, giảm cholesterol xấu (tức LDL-cholesterol), ngăn chặn sự tiến triển của các mãng xơ vữa, cải thiện tính đàn hồi của động mạch. Do đó, ở Mỹ, cơ quan quản lý thực phẩm và thuốc (FDA) từ năm 1999 đã cho phép dùng đậu nành để làm giảm nguy cơ động mạch vành.  3. Cung cấp đủ dưỡng chất  Các chuyên gia dinh dưỡng Mỹ khẳng định chế phẩm từ đậu nành rất giàu dinh dưỡng và ăn một khẩu phần đậu nành mỗi ngày giúp bổ sung đầy đủ dưỡng chất. “Đậu nành cung cấp nhiều chất quan trọng như kali, ma-giê, chất xơ, chất chống ô-xy hóa”, hãng tin New Kerala dẫn lời chuyên gia Katherine Tucker cho biết.', 'thuc-uong-giai-doc.jpg', '2022-06-06 02:13:11', '2022-06-06 02:13:11'),
(4, 'Những thực phẩm \"khắc tinh\" của đột quỵ, đừng bỏ lỡ', 'Ăn hải sản không chiên rán một hoặc hai lần một tuần có thể làm giảm nguy cơ đột quỵ, theo đánh giá của các nghiên cứu được công bố trên tạp chí Circulation. Chất béo omega-3 trong cá có dầu như cá hồi, cá ngừ và cá thu làm giảm viêm trong động mạch, cải thiện lưu lượng máu và giảm nguy cơ đông máu.  Ăn nhiều cá cũng có nghĩa là chế độ ăn sẽ chứa ít những thực phẩm không lành mạnh như thịt đỏ và thịt chế biến sẵn, có nhiều chất béo no làm tắc nghẽn động mạch. Đặc mục tiêu khoảng 2 lạng, hoặc hai phần, hải sản không chiên rán mỗi tuần.  Cà chua  9-thuc-pham-khac-tinh-giup-phong-chong-dot-quy-hieu-qua-ai-cung-nen-an-thuong-xuyen--2020-12-12-09-57 Công dụng thanh nhiệt giải độc, lương huyết bình can và hạ huyết áp. Là thực phẩm rất giàu vitamin C và P, nếu ăn thường xuyên mỗi ngày 1-2 quả cà chua sống sẽ có khả năng phòng chống cao huyết áp rất tốt, đặc biệt là khi có biến chứng xuất huyết đáy mắt.  Tỏi  Công dụng hạ mỡ máu và hạ huyết áp. Hàng ngày nếu kiên trì ăn đều đặn 2 tép tỏi sống hoặc đã ngâm dấm hay uống 5ml dấm ngâm tỏi thì có thể duy trì huyết áp ổn định ở mức bình thường.  Yến mạch  Dưới đây là cách ngăn ngừa đột quỵ bằng cách giảm cholesterol LDL \"xấu\": Làm nóng một bát yến mạch hấp! Một nghiên cứu, được công bố vào năm 2019 trên báo cáo khoa học, cho thấy ăn yến mạch làm giảm nguy cơ mắc bệnh tim mạch như đột quỵ. Những người ăn yến mạch có mức LDL và triglyceride thấp hơn, tỷ lệ cholesterol toàn phần/cholesterol HDL (tốt) thấp hơn và mức độ thấp hơn của các chỉ dấu viêm.  Nếu bạn có nhiều nguy cơ mắc bệnh tim mạch, hãy đặt mục tiêu giảm cholesterol LDL dưới 100 mg/dl. Và cố gắng để nhận được 20g chất xơ hòa tan mỗi ngày để kiểm soát cholesterol. Bắt đầu ngày mới với một phần cháo yến mạch 3/4 cup, nhưng đừng dùng loại ăn liền mà thay vào đó hãy chọn yến mạch cắt hạt chứa gần 30% lượng chất xơ hòa tan khuyến nghị hàng ngày.  Đậu đen  Thực hiện bước tiến lớn trong mục tiêu chất xơ hàng ngày bằng một bát đậu đen cho bữa trưa. Một tổng kết các nghiên cứu được công bố trên Public Health Nutrition cho thấy chế độ ăn nhiều đậu đỗ như đậu đen có liên quan đến nguy cơ mắc bệnh tim mạch thấp hơn.  Các nhà nghiên cứu cho rằng kết quả này là nhờ những đặc tính thực sự tốt của đậu đỗ và thực tế là chúng thường thay thế cho các nguồn protein không lành mạnh. 3/4 chén đậu đen sẽ cung cấp cho bạn 27% nhu cầu khuyến nghị hàng ngày.  Hành tây  Có thể thêm gia vị xào hoặc luộc, kiêng dùng mỡ động vật. Mỗi ngày ăn 100g, dùng cho người chứng bệnh mỡ máu cao, tăng huyết áp.  Bưởi  Trong bưởi có hợp chất naringenin, một chất chống oxy hóa có thể giúp gan đốt cháy lượng mỡ dư thừa. Đồng thời bưởi giúp cải thiện quá trình kiểm soát lượng đường trong máu, làm hạ đường huyết, rất tốt cho những người mắc bệnh tim mạch hay béo phì.', 'tin1.png', '2022-06-02 08:43:17', '2022-06-02 08:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ten_nhanvien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capbac` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten_nhanvien`, `gioitinh`, `ngaysinh`, `quequan`, `sdt`, `email`, `capbac`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Thùy', 'Nữ', '1989-10-04', 'Nguyễn Xá-Nhân Hòa-Mỹ Hào-Hưng Yên', '0986253821', 'thuynguyen@gmail.com', '1', '2019-04-04 14:45:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten_ncc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi_ncc` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Delet` int(11) NOT NULL COMMENT '0:hien,1:an',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten_ncc`, `diachi_ncc`, `email`, `sdt`, `Delet`, `created_at`, `updated_at`) VALUES
(1, 'CÔNG TY CỔ PHẦN ĐẦU TƯ EXP VIỆT NAM', 'Nhà D21, dãy D, khu tập thể sư đoàn 361, P. Xuân Đỉnh, Q. Bắc Từ Liêm, Hà Nội', 'thucphamexp@gmail.com', '024 3750294', 0, '2019-04-04 14:48:55', '0000-00-00 00:00:00'),
(2, 'Công Ty TNHH Chế Biến Nông Sản Thực Phẩm Thiên Hà', 'Lầu 10, Toà Nhà Vinaconex, 47 Điện Biên Phủ, P. Đa Kao, Q. 1, Tp. Hồ Chí Minh (TPHCM)', 'nancy@galaxy-vn.com', '(028) 39103066', 0, '2019-04-04 14:48:55', '0000-00-00 00:00:00'),
(3, 'Nông Sản Galaxy Agro - Công Ty TNHH Galaxy Agro', 'Số 14/16, Đường 990, Khu Phố 4, Phường Phú Hữu, Quận 9, Tp. Hồ Chí Minh (TPHCM)', 'nancy@galaxy-vn.com', '(028) 39103066', 0, '2019-04-04 14:48:55', '0000-00-00 00:00:00'),
(4, 'Công ty QTY', 'Phố 4, Quận 7 Tp.Hồ Chí Minh', 'QTY@gmail.com', '09648359821', 0, '2019-05-09 03:40:05', '2019-05-08 20:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id_phan_hoi` int(11) NOT NULL,
  `id_tk` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phan_hoi`
--

INSERT INTO `phan_hoi` (`id_phan_hoi`, `id_tk`, `id_sp`, `level`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'Nếu mua nhiều có được chiết khấu không vậy?', '2019-04-15 05:27:42', '0000-00-00 00:00:00'),
(2, 1, 7, 5, 'Mình đã mua hoa quả đúng chất lượng.', '2019-04-15 05:27:43', '0000-00-00 00:00:00'),
(3, 1, 2, 3, 'Ngon.Ngon', '2019-04-15 05:27:43', '0000-00-00 00:00:00'),
(4, 1, 1, 0, 'Quả này đẻ', '2019-04-15 05:27:43', '2019-04-10 02:20:29'),
(5, 1, 1, 0, 'uk', '2019-04-15 05:27:43', '2019-04-10 02:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `quang_cao`
--

CREATE TABLE `quang_cao` (
  `id` int(11) NOT NULL,
  `tittle` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_loai_sp` int(10) UNSIGNED DEFAULT NULL,
  `id_ncc` int(11) NOT NULL,
  `mota_sp` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `gia_km` float DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `don_vi_tinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `id_loai_sp`, `id_ncc`, `mota_sp`, `unit_price`, `gia_km`, `so_luong`, `image`, `don_vi_tinh`, `new`, `created_at`, `updated_at`, `gender`) VALUES
(95, 'Man Shirt', 324, 1, NULL, 419000, NULL, 40, 'Premium Linen Shirt.jpeg', 'VNĐ', 0, '2022-06-08 20:32:12', '2022-06-08 20:32:12', 0),
(98, 'Bei Linen Shirt', 324, 1, NULL, 430000, NULL, 100, '1654069934393.jpeg', 'VNĐ', 0, '2022-06-08 20:46:45', '2022-06-08 20:46:45', 0),
(99, 'Sunflower Shirt', 324, 1, NULL, 330000, NULL, 100, '1653720497792.jpeg', 'VNĐ', 0, '2022-06-08 20:47:46', '2022-06-08 22:17:59', 0),
(100, 'Raglan Linen Shirt', 324, 1, NULL, 200000, NULL, 100, '1650429741553.jpeg', 'VNĐ', 0, '2022-06-08 20:48:27', '2022-06-08 22:19:13', 0),
(101, 'Laplace Shirt', 324, 1, NULL, 300000, NULL, 20, '1651047134340.jpeg', 'VNĐ', 0, '2022-06-08 20:49:09', '2022-06-08 20:49:09', 0),
(102, 'Fit Shirt', 324, 1, NULL, 430000, NULL, 20, '1651048625466.jpeg', NULL, 0, '2022-06-08 20:49:46', '2022-06-08 20:49:46', 0),
(103, 'Venice Shirt', 324, 1, NULL, 300000, NULL, 20, '1650428563959.jpeg', NULL, 0, '2022-06-08 20:50:34', '2022-06-08 20:50:34', 0),
(104, 'Sss\' Oval Shirt', 324, 1, NULL, 320000, NULL, 30, '1639024601129.jpeg', NULL, 0, '2022-06-08 20:52:47', '2022-06-08 20:52:47', 0),
(105, 'Letter Shirt', 324, 1, NULL, 340000, NULL, 20, '1639018137793.jpeg', NULL, 0, '2022-06-08 20:53:43', '2022-06-08 20:53:43', 0),
(106, 'Classic Shirt', 324, 1, NULL, 400000, NULL, 40, '1634092094313.jpeg', NULL, 0, '2022-06-08 20:54:15', '2022-06-08 20:54:15', 0),
(107, 'Kore Lined Shirt', 324, 1, NULL, 340000, NULL, 20, '1634092251490.jpeg', NULL, 0, '2022-06-08 20:54:49', '2022-06-08 20:54:49', 0),
(108, 'Collar Shirt', 324, 1, NULL, 200000, NULL, 20, '1649827597361.jpeg', NULL, 0, '2022-06-08 20:55:44', '2022-06-08 20:55:44', 0),
(109, 'Bei Linen Shorts', 324, 1, NULL, 240000, NULL, 40, '1653713481773.jpeg', NULL, 0, '2022-06-08 20:56:27', '2022-06-08 20:56:27', 0),
(110, 'Sunflower Trousers', 324, 1, NULL, 300000, NULL, 30, '1653899933875.jpeg', NULL, 0, '2022-06-08 20:57:22', '2022-06-08 20:57:22', 0),
(111, 'Stone Shorts', 324, 1, NULL, 446000, NULL, 30, '1653711048198.jpeg', NULL, 0, '2022-06-08 20:57:58', '2022-06-08 20:57:58', 0),
(112, 'Dore Trousers', 324, 1, NULL, 300000, NULL, 40, '1654068217498.jpeg', NULL, 0, '2022-06-08 20:58:35', '2022-06-08 20:58:35', 0),
(113, 'Great Life Tee - Loose', 324, 1, NULL, 290000, NULL, 30, '1653661900873.jpeg', NULL, 0, '2022-06-08 20:59:14', '2022-06-08 20:59:14', 0),
(114, 'Blank Backpack', 324, 1, NULL, 500000, NULL, 10, '1653557364749.jpeg', NULL, 0, '2022-06-08 20:59:43', '2022-06-08 20:59:43', 0),
(115, 'Sss Raglan Tee', 324, 1, NULL, 249000, NULL, 35, '1651118155834.jpeg', NULL, 0, '2022-06-08 21:00:49', '2022-06-08 21:00:49', 0),
(116, 'Great Tee', 324, 1, NULL, 270000, NULL, 34, '1650424137205.jpeg', NULL, 0, '2022-06-08 21:01:30', '2022-06-08 21:01:30', 0),
(117, 'Elastic Pants', 324, 1, NULL, 3400000, NULL, 30, '1650461025461.jpeg', NULL, 0, '2022-06-08 21:02:01', '2022-06-08 21:02:01', 0),
(118, 'Strap Pants Ⅱ', 324, 1, NULL, 300000, NULL, 40, '1650440410916.jpeg', NULL, 0, '2022-06-08 21:02:43', '2022-06-08 21:02:43', 0),
(119, 'Paris Tee', 325, 1, NULL, 299000, NULL, 40, '1650509003566.jpeg', NULL, 0, '2022-06-08 21:03:26', '2022-06-08 21:03:26', 1),
(120, 'Paris Pocket Tee', 325, 1, NULL, 299000, NULL, 40, '1650349639100.jpeg', NULL, 0, '2022-06-08 21:04:05', '2022-06-08 21:04:05', 1),
(121, 'Dots Mini Skirt', 325, 1, NULL, 300000, NULL, 34, '1650366524094.jpeg', NULL, 0, '2022-06-08 21:04:34', '2022-06-08 21:04:34', 1),
(122, 'Pocket Mini Skirt', 325, 1, NULL, 349000, NULL, 35, '1650366524094.jpeg', NULL, 0, '2022-06-08 21:05:03', '2022-06-08 21:05:03', 1),
(123, 'Birdie Pants', 324, 1, NULL, 349000, NULL, 93, '1650365006720.jpeg', NULL, 0, '2022-06-08 21:05:29', '2022-06-08 21:05:29', 0),
(124, 'Bird Shirt 2022', 324, 1, NULL, 400000, NULL, 34, '1650365368131.jpeg', NULL, 0, '2022-06-08 21:06:55', '2022-06-08 21:06:55', 0),
(125, 'Paris Shirt', 324, 1, NULL, 340000, NULL, 40, '1650365579163.jpeg', NULL, 0, '2022-06-08 21:07:21', '2022-06-08 21:07:21', 0),
(126, 'Paris Tote Bag', 325, 1, NULL, 190000, NULL, 20, '1650351287335.jpeg', NULL, 0, '2022-06-08 21:07:51', '2022-06-08 21:07:51', 1),
(127, 'Jubilee Dress', 324, 1, NULL, 290000, NULL, 24, '1642495495370.jpeg', NULL, 0, '2022-06-08 21:08:19', '2022-06-08 21:08:19', 0),
(128, 'Venus Knit', 325, 1, NULL, 300000, NULL, 40, '1642495373926.jpeg', NULL, 0, '2022-06-08 21:08:43', '2022-06-08 21:08:43', 1),
(129, 'Lady Knit', 325, 1, NULL, 300000, NULL, 45, '1642494967532.jpeg', NULL, 0, '2022-06-08 21:09:07', '2022-06-08 21:09:07', 1),
(130, 'Compo Jeans', 325, 2, NULL, 340000, NULL, 30, '1638357103280.jpeg', NULL, 0, '2022-06-08 21:09:34', '2022-06-08 21:09:34', 1),
(131, 'Compo Bodysuit', 325, 1, NULL, 290000, NULL, 52, '1638183521302.jpeg', NULL, 0, '2022-06-08 21:10:08', '2022-06-08 21:10:08', 1),
(132, 'Spaghetti Strap Dress', 325, 1, NULL, 340000, NULL, 30, '1634091329117.jpeg', NULL, 0, '2022-06-08 21:10:43', '2022-06-08 21:10:43', 1),
(133, 'Corea Shirt', 325, 1, NULL, 430000, NULL, 23, '1635911006693.jpeg', NULL, 0, '2022-06-08 21:11:13', '2022-06-08 21:11:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `users_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `users_name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Đoàn Linh', 'DoanLinh', 'doanlinh@gmail.com', '$2y$10$qwkACRebVrq1PxDhpFQTUeof.5.Qr1lVayiJrXx8NgfLYdoWQH4m6', '01628470872', NULL, NULL),
(5, 'DoanThiLinh', 'LinhD', 'vinh@gmail.com', '$2y$10$9nFyWml4BRW1seMuzicLqOz9/EP5BeHSi9j.TxR.vdR.GEVB6VaIi', '983715373', NULL, NULL),
(7, 'Đoàn Thị Thùy Linh', 'LinhDoan', 'doanlinh101998@gmail.com', '$2y$10$TE8Q0ak2lz3W7.pWUQMW7.Li5O7KkGFwlI/ci8McxtPtKpLkWybbK', '0983017992', NULL, NULL),
(8, 'Đoàn Thị Linh', 'Linh', 'doanlinh1098@gmail.com', '$2y$10$E2tUqHVotdoL8T9d2DhBlepbHod5zuTTVYVafvLl1caMG2t67NYrS', '0983017991', NULL, NULL),
(10, 'a', 'b', 'd@gmail.com', 'c', '13131313', '2022-05-28', '2022-05-28'),
(11, 'nguyen hong duong', 'duong', 'a@gmail.com', '1', '099212312', '2022-06-05', '2022-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(50) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills_ban`
--
ALTER TABLE `bills_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_nhap`
--
ALTER TABLE `bills_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail_ban`
--
ALTER TABLE `bill_detail_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail_nhap`
--
ALTER TABLE `bill_detail_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenloai` (`tenloai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id_phan_hoi`);

--
-- Indexes for table `quang_cao`
--
ALTER TABLE `quang_cao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `full_name` (`full_name`),
  ADD UNIQUE KEY `users_name` (`users_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills_ban`
--
ALTER TABLE `bills_ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bills_nhap`
--
ALTER TABLE `bills_nhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_detail_ban`
--
ALTER TABLE `bill_detail_ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bill_detail_nhap`
--
ALTER TABLE `bill_detail_nhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id_phan_hoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quang_cao`
--
ALTER TABLE `quang_cao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
