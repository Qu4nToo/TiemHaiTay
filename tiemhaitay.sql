-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 10, 2024 lúc 04:12 PM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tiemhaitay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_price`, `status`) VALUES
('order_67522589571848.57499814', 'user_67521143376d24.48788066', '2024-12-05 22:13:29', 9000000.00, 'pending'),
('order_67584d4a9daa13.90512511', 'user_67521143376d24.48788066', '2024-12-10 14:16:42', 14000000.00, 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(32) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orderdetails_orders` (`order_id`),
  KEY `fk_orderdetails_product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(16, 'order_67522589571848.57499814', 'prod_6751f674bc1977.61883657', 1, 4000000.00),
(17, 'order_67522589571848.57499814', 'prod_6751f65c2d5615.91873566', 1, 5000000.00),
(20, 'order_67584d4a9daa13.90512511', 'prod_6751f65c2d5615.91873566', 2, 5000000.00),
(21, 'order_67584d4a9daa13.90512511', 'prod_6751f674bc1977.61883657', 1, 4000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(32) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `screen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `camera` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `rom` varchar(50) DEFAULT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_type`, `product_name`, `screen`, `cpu`, `camera`, `ram`, `rom`, `warranty`, `price`, `card`, `status`, `description`, `image`) VALUES
('prod_6751f62bf23634.66891509', 'DELL', 'Laptop Dell Inspiron 15 3520-5810BLK 102F0', '23\"', 'Intel Core I5', '1080p', '8GB', '512GB', '12', 30000000, '0', 1, 'Đặc điểm nổi bật\r\nThiết kế đơn giản, trẻ trung với tone màu đen bao phủ.\r\nMàn hình cảm ứng 15.6 inch Full HD cho trải nghiệm hình ảnh vô cùng sắc nét.\r\nCPU Intel core i5-1155G7 cùng 8 GB RAM DDR4 xử lý mượt các tác vụ văn phòng: Word, Excel,...\r\nCard đồ họa Intel Iris Xe Graphics hỗ trợ chỉnh ảnh đơn giản.\r\nKhông gian lưu trữ vừa phải với ổ cứng 256 GB SSD.\r\n', 'dellLaptop.png'),
('prod_6751f65c2d5615.91873566', 'Avita', 'Laptop Avita Liber V14', '23', 'Intel Core I5', '1080p', '8GB', '512GB', '12 tháng', 5000000, '0', 1, 'Đặc điểm nổi bật\r\nThiết kế thời trang, màu sắc đa dạng - Thiết kế mỏng nhẹ, viền màn hình mỏng, nhiều màu sắc độc đáo\r\nXử lí trơn tru, mượt mà mọi tác vụ - Intel Core i5-10210U, tốc độ tối đa 4.2GHz, RAM 8GB\r\nMàn hình sắc nét cho trải nghiệm hình ảnh hoàn hảo - Màn hình 14', 'laptop avita.png'),
('prod_6751f674bc1977.61883657', 'Asus', 'Asus Tuf 16', '23\"', 'Intel Core I5', '15mp', '8GB', '512GB', '12', 4000000, '0', 1, 'Laptop Asus TUF Gaming A16 Advantage Edition FA617NS-N3486W - Hiệu năng xử lý vượt trội\r\nNhắc tới các sản phẩm laptop Asus Tuf Gaming, chúng ta không thể không đề cập tới laptop Asus TUF Gaming A16 Advantage Edition FA617NS-N3486W. Dòng laptop Gaming này với kiểu dáng hầm hố, mạnh mẽ cùng vi xử lý đầu bảng AMD Ryzen 7 sẽ đem tới cho người sử dụng những trải nghiệm chiến mượt mà nhất.\r\n\r\nThiết kế mạnh mẽ, màn hình hiển thị siêu sắc nét\r\nLaptop Asus TUF Gaming A16 Advantage Edition FA617NS-N3486W thu hút người dùng nhờ diện mạo hầm hố, kiểu dáng chắc chắn, bền bỉ. Với trọng lượng không quá lớn - 2.2 kg cùng các thông số kích thước lần lượt là 35.5 x 25.2 x 2.21~2.68 cm, bạn có thể dễ dàng cất gọn laptop trong balo và mang theo tới bất kỳ đâu.', 'laptopAsus.png'),
('prod_67585752dba795.40403516', 'Laptop', 'MSI Mordern 15', '15.6\"', 'I5-5900H', '1080p', '8GB', '256GB', '12', 15000000, 'Graphic Intels', 1, 'Đặc điểm nổi bật\r\nThiết kế thời thượng - vỏ kim loại, mỏng nhẹ\r\nVận hành mượt mà - Intel Core i5 Gen 11 xử lý tốt mọi tác vụ văn phòng như Word, Exel, Powerpoint\r\nIntel Iris Xe Graphics - Chỉnh sửa ảnh trên AI, PTS hay giải trí với các tựa game nhẹ nhàng\r\n8GB Ram + 1 khe trống cho khả năng nâng cấp tối đa 64GB', 'msimodern15.png'),
('prod_675858e6dec161.54617906', 'Apple', 'Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB I Chính hãng Apple Việt Nam', '13.6\"', 'Chip M2', '2K ', '8GB', '512GB', '12', 25000000, '8 nhân GPU, 16 nhân Neural Engine', 1, 'Đặc điểm nổi bật\r\nThiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\nHiệu năng hàng đầu - Chip Apple m2, 8 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\nĐa nhiệm mượt mà - Ram 16GB, SSD 256GB cho phép vừa làm việc, vừa nghe nhạc\r\nMàn hình sắc nét - Độ phân giải 2560 x 1664 cùng độ sáng 500 nits\r\nÂm thanh sống động - 4 loa tramg bị công nghệ dolby atmos và âm thanh đa chiều', 'macbook.png'),
('prod_6758598d3bef62.88954794', 'Acer', 'Laptop Acer Aspire 3 Spin A3SP14-31PT-387Z', '15.6', ' I3-N305', '720p', '8GB', '256GB', '12', 12000000, '0', 1, 'Đặc điểm nổi bật\r\nThiết kế 2-trong-1 linh hoạt, kết hợp giữa laptop và máy tính bảng với màn hình cảm ứng xoay 360 độ.\r\nMàn hình 14 inch Full HD+ cung cấp hình ảnh sắc nét và góc nhìn rộng, phù hợp cho cả công việc và giải trí.\r\nBộ vi xử lý Intel Core i3-N305 thế hệ mới đảm bảo hiệu suất ổn định cho các tác vụ hàng ngày và đa nhiệm nhẹ.\r\nVới 8GB RAM và ổ cứng SSD 512GB, máy cho phép khởi động nhanh, mở ứng dụng mượt mà và lưu trữ dữ liệu đủ dùng.\r\nThiết kế màu xám trang nhã kết hợp với khung máy mỏng nhẹ, giúp dễ dàng mang theo khi di chuyển.\r\nLaptop Acer Aspire 3 Spin 14 A3SP14-31PT-387Z với chip Intel Core i3-N305, 8GB RAM và SSD 512GB, mang lại hiệu năng ổn định cho các tác vụ, kể cả đồ hoạ. Thiết bị này còn có màn hình cảm ứng 14 inch, giúp thao tác trực quan và tiện lợi hơn. Đặc biệt hơn, phân khúc laptop Acer Aspire này cũng thể xoay 360 độ, dễ dàng biến hoá thành một chiếc tablet nhanh chóng và linh hoạt.\r\n\r\n', 'acerLaptop.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `email`, `address`) VALUES
('user_6752040ce31166.44108767', '123', '$2y$10$84e.G38S0UQu9FSmFk3WsuOFCx.h8Az9eEb7KIMZtP9NBFqvSYhUm', '0356132475', '123@gmail.com', '2397 Pham The Hien Ward 7 District 8 Ho Chi Minh City.'),
('user_67521143376d24.48788066', 'Đỗ Minh Trí', '$2y$10$iVY9XIBRzeVh7wuNLH9uIeVDmMpvBSA1ZDD8WnTigbubqCJ.Nid1.', '0123456789', '456@gmail.com', '221B phố Barker');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetails_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
