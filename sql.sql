-- Tạo cơ sở dữ liệu ecommerce
CREATE DATABASE IF NOT EXISTS `ecommerce`;
USE `ecommerce`;

-- Tạo bảng size
CREATE TABLE `size` (
  `size_id` int NOT NULL AUTO_INCREMENT,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng product
CREATE TABLE `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int DEFAULT '0',
  `adding_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_url` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'In Stock',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng coupon
CREATE TABLE `coupon` (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `expiration_date` date NOT NULL,
  `min_order_value` decimal(10,2) NOT NULL,
  `status` enum('active','expired','used') DEFAULT 'active',
  PRIMARY KEY (`coupon_id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng customer
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng orders
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) DEFAULT 'pending',
  `quantity` int DEFAULT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `shipping_address` text,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `order_ibfk_1` (`product_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng payment
CREATE TABLE `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('credit_card','paypal','cash_on_delivery') NOT NULL,
  `status` enum('pending','completed','failed') DEFAULT 'pending',
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tạo bảng product_size
CREATE TABLE `product_size` (
  `product_size_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `quantity` int DEFAULT '0',
  PRIMARY KEY (`product_size_id`),
  KEY `product_id` (`product_id`),
  KEY `size_id` (`size_id`),
  CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


----------------------------------------------------- data----------------------------------------------------------------------------

USE `ecommerce`;
-- Inserting data for table `product`
INSERT INTO `product` (name, price, quantity, adding_time, image_url, status)
VALUES
('Giày Ván chính hãng Old Skool Dark', 1350000, 10, '2024-11-26 18:43:28', 'uploads/images/img1.jpg', 'In Stock'),
('Giày Nike Air Force 1 Shadow Pastel Macaroon Candy CI0919 106', 3960000, 20, '2024-11-26 18:43:28', 'uploads/images/img2.jpg', 'In Stock'),
('Giày MLB Chunky Liner Denim Basic New York Yankees Blue - Code 3ASXCVT4N-50BLS', 2900000, 50, '2024-11-26 18:43:28', 'uploads/images/img3.jpg', 'In Stock'),
('Giày Thể Thao Lacoste L003 0722 Textile Color Block Sneakers Phối Màu', 1950000, 10, '2024-11-29 04:45:18', 'uploads/images/img4.jpg', 'In Stock'),
('Giày Air Force 1 ’07 LV8 ‘Overbranding’ AJ7747-001', 2000000, 10, '2024-11-29 04:54:27', 'uploads/images/img5.jpg', 'In Stock'),
('Giày Nike Dunk Low ‘UNC’ CW1590-103', 3500000, 10, '2024-11-29 07:11:36', 'uploads/images/img6.jpg', 'In Stock'),
('Giày Nike Air Max 1 ’87 ‘Safety Orange’ DZ2628-002', 4000000, 10, '2024-11-29 07:11:36', 'uploads/images/img7.jpg', 'In Stock');

-- Inserting data for table `customer`
INSERT INTO `customer` (name, email, phone, address, username, password, role) 
VALUES 
('Hung', 'leessang304@gmail.com', NULL, NULL, 'hung1', '202cb962ac59075b964b07152d234b70', 'admin'),
('Linhh', 'linhh@gmail.com', NULL, 'Mễ Trì', NULL, NULL, 'user'),
('Hung', 'hungg@gmail.com', NULL, 'Phú Lương', NULL, NULL, 'user'),
('Dũng', 'dung@gmail.com', NULL, 'Phùng Khoang', NULL, NULL, 'user'),
('Ngọc Ánh', 'ngocanh@gmail.com', NULL, 'Mễ Trì Hạ', NULL, NULL, 'user');

-- Inserting data for table `size`
INSERT INTO `size` (size) VALUES
('36'), ('37'), ('38'), ('39'), ('40'), ('41'), ('42');

-- Inserting data for table `product_size`
INSERT INTO `product_size` (product_id, size_id, quantity)
VALUES
(1, 1, 0), (1, 2, 20), (1, 3, 15), (1, 4, 15), (1, 5, 15), (1, 6, 10), (1, 7, 10),
(2, 1, 10), (2, 2, 20), (2, 3, 15), (2, 4, 15), (2, 5, 15), (2, 6, 10), (2, 7, 10),
(3, 1, 10), (3, 2, 20), (3, 3, 15), (3, 4, 15), (3, 5, 15), (3, 6, 10), (3, 7, 10),
(4, 1, 10), (4, 2, 20), (4, 3, 15), (4, 4, 15), (4, 5, 15), (4, 6, 10), (4, 7, 10);

-- Inserting data for table `orders`
INSERT INTO `orders` (product_id, customer_id, order_date, status, quantity, total_amount, shipping_address)
VALUES
(1, 2, '2024-12-04 19:12:52', 'Trả lại hàng', 1, 1350000, 'Mễ Trì'),
(2, 2, '2024-12-05 19:13:33', 'Đang trên đường giao', 1, 3960000, 'Hà Đông'),
(3, 3, '2024-12-07 09:34:36', 'Đã giao', 1, 4000000, 'Nam Định'),
(3, 4, '2024-12-07 09:34:36', 'Đã giao', 2, 5000000, 'La Khê');