-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 06:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `ID_Administration` varchar(10) NOT NULL COMMENT 'administration table primary key',
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Create_At` datetime NOT NULL,
  `ID_Role` varchar(10) NOT NULL COMMENT 'Foreign key querying the role . table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`ID_Administration`, `First_Name`, `Last_Name`, `Email`, `UserName`, `Password`, `Create_At`, `ID_Role`) VALUES
('Admin001', 'Nguyễn Quốc', 'Châu', 'chauquocnguyen.cun1@gmail.com', 'nguyenquocchauit', 'chauit', '2022-10-19 08:11:00', 'Admin'),
('Admin002', 'Phan Thị Huyền', 'Trâm', 'trampt001@gmail.com', 'huyenchamm', 'tramxinhdep', '2022-10-19 08:17:00', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `ID_Brand` varchar(15) NOT NULL COMMENT 'brand table primary key',
  `Name` varchar(25) NOT NULL COMMENT 'Name brand',
  `Slug` varchar(35) NOT NULL COMMENT 'URL name table brand'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`ID_Brand`, `Name`, `Slug`) VALUES
('Avia', 'Aviator', 'aviator'),
('Baby', 'Baby-G', 'baby-g'),
('Bentley', 'Bentley', 'bentley'),
('Citizen', 'Citizen', 'citizen'),
('Olym', 'Olym Pianus', 'olym-pianus'),
('Shock', 'G-Shock', 'g-shock');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID_Customer` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `Create_At` datetime NOT NULL,
  `ID_Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID_Customer`, `First_Name`, `Last_Name`, `Phone`, `Email`, `UserName`, `Password`, `Address`, `Create_At`, `ID_Role`) VALUES
('MaKH00001', 'Nguyễn Trần Hoàn', 'Kim', '0926858585', 'nguyentranhoankim.nt@gmail.com', 'bekim', 'kimcute', 'Nha Trang, Khánh Hòa', '2022-10-19 08:20:00', 'User'),
('MaKH00002', 'Nguyễn Khánh', 'Nam', '0926555565', 'nguyenkhanhnam.hn@gmail.com', 'nam123', 'knam123', 'Hà Nội', '2022-10-19 08:25:00', 'User'),
('MaKH00003', 'Nguyễn Yến', 'Nhi', '0926300000', 'nguyenyennhi.dn@gmail.com', 'benhi', 'nynhi123', 'Đà Nẵng', '2022-10-19 08:25:00', 'User'),
('MaKH00004', 'Phạm Hồ Thu', 'Oanh', '0926123456', 'phamhothuoanh.nt@gmail.com', 'phtoanh123', 'thuoanh123', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00005', 'Nguyễn Yến', 'Vy', '0926356789', 'nguyenyenvy.nt@gmail.com', 'yenvy1', 'yenvynhatrang', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00006', 'Nguyễn Anh', 'Thư', '0920023456', 'nguyenanhthu.nt@gmail.com', 'anhthunguyen', 'anhthucute', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00007', 'Phạm Nguyễn Bảo', 'Trân', '0926888888', 'phamnguyenbaotran.nt@gmail.com', 'baotran123', 'baotranxinhdep', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00008', 'Phan Quang', 'Khải', '0920045056', 'phanquankhai.nt@gmail.com', 'quangkhaidz', 'khaidzai', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00009', 'Nguyễn Thành', 'Lãnh', '0921123456', 'nguyenthanhlanh.nt@gmail.com', 'lanhlanh', 'thanhlanh123', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User'),
('MaKH00010', 'Trần Lê Nguyên', 'Hoàng', '0920023888', 'tranlenguyenhoang.nt@gmail.com', 'anhhoangdzai', 'nguyenhoang159', 'Nha Trang, Khánh Hòa', '2022-10-19 08:25:00', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `ID_Gender` varchar(5) NOT NULL COMMENT 'Gender table primary key',
  `Name` varchar(10) NOT NULL COMMENT 'Gender: Men or women',
  `Slug` varchar(20) NOT NULL COMMENT 'URL name table gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`ID_Gender`, `Name`, `Slug`) VALUES
('IDM', 'Men', 'Men'),
('IDWM', 'Women', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `ID_Method` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT 'payment methods'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`ID_Method`, `Name`) VALUES
('Card', 'Debit/Credit Card'),
('Cod', 'Cash On Delivery'),
('Ebp', 'E-Banking Payment'),
('Momo', 'Momo E-Wallet'),
('Zalo', 'ZaloPay');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID_Order` varchar(30) NOT NULL,
  `ID_Customer` varchar(30) NOT NULL COMMENT 'foreign key table customer',
  `Create_At` datetime NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID_Detail` varchar(30) NOT NULL COMMENT 'foreign key table order	',
  `ID_Product` varchar(30) NOT NULL COMMENT 'foreign key table product',
  `Quantity` tinyint(4) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID_Product` varchar(30) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Slug` varchar(70) NOT NULL,
  `Description` text NOT NULL COMMENT 'Product Description',
  `Image` text NOT NULL COMMENT 'store image file names',
  `Quantity` int(4) NOT NULL,
  `Price` int(12) NOT NULL,
  `Discount` float NOT NULL,
  `Create_At` datetime NOT NULL COMMENT 'time the product was first created',
  `Update_At` datetime NOT NULL COMMENT 'when the product was first updated',
  `ID_Brand` varchar(12) NOT NULL COMMENT 'foreign key table brand',
  `ID_Gender` varchar(5) NOT NULL COMMENT 'foreign key table gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID_Product`, `Name`, `Slug`, `Description`, `Image`, `Quantity`, `Price`, `Discount`, `Create_At`, `Update_At`, `ID_Brand`, `ID_Gender`) VALUES
('Product0001', 'DOUGLAS DAY-DATE 41', 'douglas-day-date-41', 'Cách mạng hóa hoạt động du lịch, Douglas DC-3 vận chuyển hành khách với phong cách Hạng Nhất và trở thành công cụ trong Thời kỳ Vàng của ngành hàng không. Bằng cách pha trộn sự tinh tế của chuyến du lịch sang trọng với công nghệ tiên tiến và tay nghề thủ công, chiếc đồng hồ AVIATOR Douglas Day Date 41 vinh danh chiếc máy bay vĩ đại nhất thời đại.', 'douglas-day-date-41-1.png,douglas-day-date-41-2.png,douglas-day-date-41-3.png,douglas-day-date-41-4.png,douglas-day-date-41-5.png', 1000, 18000000, 0, '2022-10-19 08:11:00', '2022-10-19 08:11:00', 'Avia', 'IDM'),
('Product0002', 'DOUGLAS MOONFLIGHT', 'douglas-moonflight', 'Vào những năm 1930, các nhà thiết kế thời trang cao cấp đã mang đến sự quyến rũ cho đường băng và lên chiếc Douglas DC-3, chiếc máy bay đã thiết kế lại hành trình bằng cách mang đến sự sang trọng cho mỗi chuyến bay. Kết hợp các tính năng Art Deco cổ điển được đặt theo các giai đoạn của mặt trăng, AVIATOR MoonFlight cho phép bạn hạ cánh giữa các ngôi sao và tín đồ thời trang với phong cách cao cấp nhằm tôn vinh chiếc máy bay vĩ đại nhất của thời đại đó.', 'douglas-moonflight-1.png,douglas-moonflight-2.png,douglas-moonflight-3.png', 500, 16500000, 0.1, '2022-10-21 08:52:55', '2022-10-21 08:52:55', 'Avia', 'IDWM'),
('Product0003', 'AIRACOBRA P45 CHRONO', 'airacobra-p45-chrono', 'Tận dụng chiến lược tầm nhìn chim của mình trong suốt Thế chiến II, Airacobra là một máy bay chiến đấu ổn định mà Đồng minh có thể dựa vào để hỗ trợ quân đội trên mặt đất. Bằng cách kết hợp tinh thần đáng tin cậy của nó đã chứng tỏ là công cụ trong mọi nhiệm vụ, đồng hồ AVIATOR Airacobra P45 Chrono mang đến một vẻ ngoài giống như một công cụ xứng đáng được đề cập đến.', 'airacobra-p45-chrono-1.png,airacobra-p45-chrono-2.png,airacobra-p45-chrono-3.png', 500, 18500000, 0.5, '2022-10-21 03:59:53', '2022-10-21 03:59:53', 'Avia', 'IDM'),
('Product0004', 'AIRACOBRA P45 CHRONO', 'airacobra-p45-chrono-w', 'Tận dụng chiến lược tầm nhìn chim của mình trong suốt Thế chiến II, Airacobra là một máy bay chiến đấu ổn định mà Đồng minh có thể dựa vào để hỗ trợ quân đội trên mặt đất. Bằng cách kết hợp tinh thần đáng tin cậy của nó đã chứng tỏ là công cụ trong mọi nhiệm vụ, đồng hồ AVIATOR Airacobra P45 Chrono mang đến một vẻ ngoài giống như một công cụ xứng đáng được đề cập đến.', 'airacobra-p45-chrono-1.png,airacobra-p45-chrono-2.png,airacobra-p45-chrono-3.png', 400, 18000000, 0.1, '2022-10-21 04:02:51', '2022-10-21 04:02:51', 'Avia', 'IDWM'),
('Product0005', 'BABY-G BGA-310-7A2', 'baby-g-bga-310-7a2', 'Thỏa sức ngao du ngoài trời với mẫu đồng hồ BGA-310 sành điệu và mạnh mẽ. Ngoài ra bạn cũng có thể chọn màu be sáng nếu yêu thích phong cách ngoài trời. Mặt đồng hồ tròn và rộng kết hợp dây đeo lớn và vạch chỉ giờ nổi làm tôn lên vẻ ngoài nghịch ngợm và giúp bạn dễ đọc. Dây đeo màu sáng giúp hiển thị giờ rõ ràng ngay cả trong bóng tối để bạn xem nhanh hơn. Chiếc đồng hồ có phần vấu nối dây đeo vừa vặn phù hợp với mọi chuyển động. Chiếc đồng hồ này còn cung cấp nhiều chức năng thực tiễn như cấu trúc chống va đập và khả năng chống nước ở độ sâu lên đến 100 mét. Nút bấm phía trước giúp bạn dễ mở đèn LED đôi chiếu sáng mặt đồng hồ và mở màn mình LCD khi đi cắm trại hoặc phiêu lưu.', 'baby-g-bga-310-7a2-1.png,baby-g-bga-310-7a2-2.png,baby-g-bga-310-7a2-3.png,baby-g-bga-310-7a2-4.png,baby-g-bga-310-7a2-5.png', 900, 5000000, 0, '2022-10-21 04:13:42', '2022-10-21 04:13:42', 'Baby', 'IDM'),
('Product0006', 'BABY-G BA-110XSM-2A', 'baby-g-ba-110xsm-2a', 'Từ BABY-G, dòng đồng hồ đơn giản dành cho giới nữ năng động, đã phát triển mẫu đồng hồ mới được hợp tác sản xuất cùng với thương hiệu Thủy thủ Mặt Trăng. Thương hiệu anime Thủy thủ Mặt Trăng và BABY-G nổi tiếng từ những năm 1990 và đã trở thành đối tác hoàn hảo của nhau. Chủ đề của mẫu đồng hồ mới này khả năng biến hình mang phong cách lãng mạn của Thủy thủ Mặt Trăng. Dựa trên mẫu đồng hồ BABY-G BA-110 nổi tiếng, chiếc đồng hồ mới này kết hợp nhiều yếu tố nguyên bản lung linh lấy cảm hứng từ phiên bản biến hình của Thủy thủ Mặt Trăng. Phần thân bán trong suốt màu xanh hải quân gợi lên hình ảnh bầu trời đêm, được trang trí bằng các ngôi sao, mặt trăng, trái tim và các hình ảnh Thủy thủ Mặt Trăng màu xanh lam, đỏ và vàng, tạo nên diện mạo vô cùng quyến rũ. Mặt đồng hồ được trang trí bằng những hình ảnh lấp lánh kết hợp dây đeo màu vàng hồng. Thiết kế đặc biệt này gợi lên hình ảnh Thủy thủ Mặt Trăng biến hình vô cùng cuốn hút và khó quên. Vòng dây đeo in hình Thủy thủ Mặt Trăng cũng được khắc trên nắp sau của đồng hồ. Thiết kế bao bì của mẫu đồng hồ này được lấy cảm hứng từ Thủy thủ Mặt Trăng. Mọi chi tiết liên quan đến mẫu đồng hồ này đều được thiết kế nhằm tôn vinh sự hợp tác đặc biệt giữa BABY-G và Thủy thủ Mặt Trăng, nữ anh hùng trong mơ của mọi cô gái.', 'baby-g-ba-110xsm-2a-1.png,baby-g-ba-110xsm-2a-2.png,baby-g-ba-110xsm-2a-3.png,baby-g-ba-110xsm-2a-4.png,baby-g-ba-110xsm-2a-5.png,baby-g-ba-110xsm-2a-6.png', 500, 5100000, 0.5, '2022-10-21 04:25:28', '2022-10-21 04:25:28', 'Baby', 'IDM'),
('Product0007', 'BABY-G BA-130PM-4A', 'BABY-G BA-130PM-4A', 'Đồng hồ BABY-G pastel nhiều màu kết hợp kim loại vừa dễ thương vừa đơn giản, phù hợp với nhịp sống năng động của bạn. Mẫu đồng hồ với các dải và khối màu tông pastel mang phong cách pop nữ tính, kết hợp với những sắc màu dịu nhẹ tạo nên phong cách thiết kế đẹp mắt. Kim đồng hồ, vạch chỉ giờ và các thành phần mặt số khác đều được phủ lớp kim loại sáng bóng, tinh tế, kết hợp với vỏ và dây đeo mờ tạo nên phong cách độc đáo. Chiếc đồng hồ này không chỉ đẹp mắt mà còn cung cấp nhiều chức năng hữu ích hàng ngày như cấu trúc chống va đập và khả năng chống nước ở độ sâu lên đến 100 mét. Thể hiện phong cách huyền bí cùng sự tương phản ấn tượng bên trong mẫu đồng hồ kim loại mạnh mẽ với màu pastel dịu nhẹ.', 'baby-g-ba-130pm-4a-1.png,baby-g-ba-130pm-4a-2.png,baby-g-ba-130pm-4a-3.png,baby-g-ba-130pm-4a-4.png', 350, 4100000, 0.4, '2022-10-21 04:26:34', '2022-10-21 04:26:34', 'Baby', 'IDWM'),
('Product0008', 'BABY-G BGA-310-4A', 'baby-g-bga-310-4a', 'Thỏa sức ngao du ngoài trời với mẫu đồng hồ BGA-310 sành điệu và mạnh mẽ. Ngoài ra bạn cũng có thể chọn màu be sáng nếu yêu thích phong cách ngoài trời. Mặt đồng hồ tròn và rộng kết hợp dây đeo lớn và vạch chỉ giờ nổi làm tôn lên vẻ ngoài nghịch ngợm và giúp bạn dễ đọc. Dây đeo màu sáng giúp hiển thị giờ rõ ràng ngay cả trong bóng tối để bạn xem nhanh hơn. Chiếc đồng hồ có phần vấu nối dây đeo vừa vặn phù hợp với mọi chuyển động. Chiếc đồng hồ này còn cung cấp nhiều chức năng thực tiễn như cấu trúc chống va đập và khả năng chống nước ở độ sâu lên đến 100 mét. Nút bấm phía trước giúp bạn dễ mở đèn LED đôi chiếu sáng mặt đồng hồ và mở màn mình LCD khi đi cắm trại hoặc phiêu lưu. Bạn đang không rảnh tay? Chỉ cần nghiêng cổ tay và bật chức năng phát sáng tự động để xem giờ ngay cả trong bóng tối. Đồng hồ BABY-G giúp bạn luôn có phong cách riêng dù là khi ở nhà giữa đô thị nhộn nhịp hay đang trên đường leo núi, sẵn sàng đối mặt với mọi chuyện xảy ra trong đời sống năng động của mình.', 'baby-g-bga-310-4a-1.png,baby-g-bga-310-4a-2.png,baby-g-bga-310-4a-3.png,baby-g-bga-310-4a-4.png,baby-g-bga-310-4a-5.png', 500, 2100000, 0.1, '2022-10-21 04:32:44', '2022-10-21 04:32:44', 'Baby', 'IDWM'),
('Product0009', 'BENTLEY BL1831-25MKNN', 'bentley-bl1831-25mknn', 'Đồng hồ Bentley là thương hiệu được thành lập vào năm 1948 tại La Chaux-de-Fonds, Thụy Sĩ. Thị trấn được biết đến như cái nôi của đồng hồ hiện đại. Tuy là thương hiệu của Thụy Sĩ nhưng lại được thiết kế gia công tại Đức – một quốc gia với nền công nghiệp chủ đạo về cơ khí, điện tử, sản xuất ôtô. Vào đầu thập niên 90, Bentley đã phát triển thành Tập đoàn Bentley Luxury Group và mở rộng danh mục sản phẩm của mình bao gồm các phụ kiện thời trang, đồ da cao cấp với phương châm “BE IN CONTROL”.', 'bentley-bl1831-25mknn-1.png,bentley-bl1831-25mknn-2.png,bentley-bl1831-25mknn-3.png,bentley-bl1831-25mknn-4.png,bentley-bl1831-25mknn-5.png,bentley-bl1831-25mknn-6.png', 1000, 5190000, 0.1, '2022-10-21 04:53:08', '2022-10-21 04:53:08', 'Bentley', 'IDM'),
('Product0010', 'BENTLEY BL2080-252MKKI', 'bently-bl2080-252mkki', 'BENTLEY 2080-152MKKI là mẫu đồng hồ cơ mới nhất hiện nay, xuất xứ thương hiệu đồng hồ của Đức nổi tiếng hàng đầu về sự chính xác và bền bỉ trong nghệ thuật chế tác đồng hồ. Nổi bật với 30 viên kim cương ( 12 viên tại cọc số, 18 viên còn lại được trải khắp đường viền của mặt phụ small second) và > 400 viên đá sapphire đầy sang trọng với độ tinh xảo cao mang tới phong cách sang trọng quý tộc và thanh lịch.', 'bently-bl2080-252mkki-1.png,bently-bl2080-252mkki-2.png,bently-bl2080-252mkki-3.png,bently-bl2080-252mkki-4.png,bently-bl2080-252mkki-5.png', 350, 8142000, 0.1, '2022-10-21 04:58:48', '2022-10-21 04:58:48', 'Bentley', 'IDM'),
('Product0011', 'BENTLY BL1805-20LKWD', 'bentley-bl1805-20lkwd', 'Đồng hồ Bentley BL1805-20LKWD là mẫu đồng hồ nữ mới nhất hiện nay, xuất xứ thương hiệu đồng hồ của Đức nổi tiếng hàng đầu về sự chính xác và bền bỉ trong nghệ thuật chế tác đồng hồ, sản phẩm mang phong cách sang trọng quý tộc và thanh lịch, cuốn hút ngay từ cái nhìn đầu tiên với phong cách classic đầy tinh tế.', 'bentley-bl1805-20lkwd-1.png,bentley-bl1805-20lkwd-2.png,bentley-bl1805-20lkwd-3.png,bentley-bl1805-20lkwd-4.png,bentley-bl1805-20lkwd-5.png,bentley-bl1805-20lkwd-6.png', 350, 5000000, 0, '2022-10-21 05:09:26', '2022-10-21 05:09:26', 'Bentley', 'IDWM'),
('Product0012', 'BENTLY BL1707-101LWWW', 'bentley-bl1707-101lwww', 'Đồng hồ Bentley BL1707-101LWWW là mẫu đồng hồ nữ mới nhất hiện nay, xuất xứ thương hiệu đồng hồ của Đức nổi tiếng hàng đầu về sự chính xác và bền bỉ trong nghệ thuật chế tác đồng hồ, sản phẩm mang phong cách sang trọng quý tộc và thanh lịch, cuốn hút ngay từ cái nhìn đầu tiên với phong cách classic đầy tinh tế khi trang bị cho mình vòng bezel đính đá Swarovski', 'bentley-bl1707-101lwww-1.png,bentley-bl1707-101lwww-2.png,bentley-bl1707-101lwww-3.png,bentley-bl1707-101lwww-4.png,bentley-bl1707-101lwww-5.png', 350, 5000000, 0.1, '2022-10-21 05:15:36', '2022-10-21 05:15:36', 'Bentley', 'IDWM'),
('Product0013', 'CITIZEN ECO DRIVE-BM7480', 'citizen-eco-drive-bm7480', 'Đồng hồ Citizen BM7480-81L chính hãng, một thiết kế mới nhất của Citizen Japan năm 2022. Với chất liệu thép không gỉ 316L cao cấp, thiết kế măt số học trò to rõ đễ quan sát cùng bộ kim dạ quang sáng rõ cả trong bóng tối, mặt xanh lam dâyd sang trong. Bộ máy Eco-Drive bền bỉ có thể hoạt động với tuổi thọ trên 10 năm.', 'citizen-eco-drive-bm7480-1.png,citizen-eco-drive-bm7480-2.png,citizen-eco-drive-bm7480-3.png,citizen-eco-drive-bm7480-4.png,citizen-eco-drive-bm7480-5.png', 500, 5000000, 0.1, '2022-10-21 05:26:06', '2022-10-21 05:26:06', 'Citizen', 'IDM'),
('Product0014', 'CITIZEN AG835186E', 'citizen-ag835186e', 'Đồng hồ nam Citizen AG8351-86E nổi bật đồng hồ 6 kim và các chức năng lịch ngày với thiết kế độc đáo phân ra 3 ô riêng biệt mang đậm nét cá tính trên nền mặt số tone đen mạnh mẽ.', 'citizen-ag835186e-1.png,citizen-ag835186e-2.png,citizen-ag835186e-3.png,citizen-ag835186e-4.png,citizen-ag835186e-5.png', 500, 18500000, 0.1, '2022-10-21 05:29:38', '2022-10-21 05:29:38', 'Citizen', 'IDM'),
('Product0015', 'CITIZEN EM0710-54Y', 'citizen-em0710-54y', 'Đồng Hồ Nữ Citizen EM0710-54Y Chính Hãng. Đồng Hồ CitizenEco-Drive Women\'s Jolie Diamond EM0710-54Y có mặt số tròn, kim chỉ thanh mãnh,các nút chỉ giờ đính kim cương nổi bật trên nền số xà cừ màu hồng hiếm có, dây đeo stainless steel đem đến phong cách sang trọng và đẳng cấp cho phái nữ.', 'citizen-em0710-54y-1.png,citizen-em0710-54y-2.png,citizen-em0710-54y-3.png,citizen-em0710-54y-4.png,citizen-em0710-54y-5.png', 660, 2200000, 0.1, '2022-10-21 05:35:37', '2022-10-21 05:35:37', 'Citizen', 'IDWM'),
('Product0016', 'CITIZEN ER0212-50D', 'citizen-er0212-50d', 'Citizen Quartz ER0212-50D có đường kính 30 mm và độ dày 6.7 mm. Mặt kính được làm bằng chất liệu kính khoáng. Khung vỏ được làm bằng chất liệu thép không gỉ 316L. Bên trong khung vỏ là bộ máy quartz có độ chính xác cao. Dây đeo được làm bằng thép không gỉ và được mạ màu vàng gold (yellow gold) bằng công nghệ PVD.', 'citizen-er0212-50d-1.png,citizen-er0212-50d-2.png,citizen-er0212-50d-3.png,citizen-er0212-50d-4.png,citizen-er0212-50d-5.png', 420, 1230000, 0.35, '2022-10-21 05:40:29', '2022-10-21 05:40:29', 'Citizen', 'IDWM');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_Role` varchar(10) NOT NULL COMMENT 'role table primary key',
  `Type` tinyint(1) NOT NULL COMMENT '0 is admin or 1 is user',
  `Type_Name` varchar(20) NOT NULL COMMENT 'Admin or user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_Role`, `Type`, `Type_Name`) VALUES
('Admin', 0, 'administration'),
('User', 1, 'customter');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction` varchar(20) NOT NULL,
  `ID_Order` varchar(30) NOT NULL COMMENT 'foreign key table order',
  `ID_Customer` varchar(30) NOT NULL COMMENT 'foreign key table customer',
  `Create_At` datetime NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Update_At` datetime NOT NULL,
  `Description` text NOT NULL,
  `ID_Method` varchar(20) NOT NULL COMMENT 'foreign key table payment methods'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`ID_Administration`),
  ADD KEY `ID_Role` (`ID_Role`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID_Brand`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `ID_Role` (`ID_Role`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`ID_Gender`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`ID_Method`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_Order`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID_Detail`),
  ADD KEY `ID_Product` (`ID_Product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID_Product`),
  ADD KEY `ID_Gender` (`ID_Gender`),
  ADD KEY `ID_Brand` (`ID_Brand`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Role`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `ID_Customer` (`ID_Customer`),
  ADD KEY `ID_Order` (`ID_Order`),
  ADD KEY `ID_Method` (`ID_Method`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administration`
--
ALTER TABLE `administration`
  ADD CONSTRAINT `administration_ibfk_1` FOREIGN KEY (`ID_Role`) REFERENCES `roles` (`ID_Role`) ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`ID_Role`) REFERENCES `roles` (`ID_Role`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ID_Customer`) REFERENCES `customers` (`ID_Customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ID_Order`) REFERENCES `order_details` (`ID_Detail`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ID_Product`) REFERENCES `products` (`ID_Product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ID_Brand`) REFERENCES `brands` (`ID_Brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`ID_Gender`) REFERENCES `gender` (`ID_Gender`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`ID_Method`) REFERENCES `method` (`ID_Method`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ID_Customer`) REFERENCES `customers` (`ID_Customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`ID_Order`) REFERENCES `orders` (`ID_Order`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
