-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2020 lúc 07:53 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `adult_number` int(11) NOT NULL,
  `children_number` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reply_message` varchar(255) NOT NULL,
  `reply_date` datetime NOT NULL,
  `checkin_in` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `customer_name`, `email`, `address`, `checkin_date`, `checkout_date`, `adult_number`, `children_number`, `room_type_id`, `message`, `created_at`, `reply_message`, `reply_date`, `checkin_in`, `reply_by`) VALUES
(2, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', 'Bắc Từ Liêm, Hà Nội', '2020-04-21 17:35:03', '2020-04-22 17:35:07', 2, 3, 1, 'Đây là tin nhắn', '2020-04-26 08:05:24', '123123123123123123123123123123123123123123123123123123', '2020-04-22 17:35:20', 0, 1),
(37, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', 'Xuân Đỉnh Hà Nội', '2020-04-24 00:00:00', '2020-04-25 00:00:00', 2, 2, 1, '', '2020-04-26 08:08:12', 'OK bạn ơi', '0000-00-00 00:00:00', 0, 1),
(38, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', 'Xuân Đỉnh Hà Nội', '2020-04-24 00:00:00', '2020-04-25 00:00:00', 2, 2, 1, '', '2020-04-26 08:08:56', 'xin lỗi bạn ơi', '0000-00-00 00:00:00', 2, 1),
(41, 'Nguyễn Tự Biên', 'nguyentubien040796@gmail.com', 'Tây Tựu Hà Nội', '2020-04-25 00:00:00', '2020-04-27 00:00:00', 2, 2, 1, '', '2020-04-30 07:54:33', 'xin lỗi vì đã không duyệt', '0000-00-00 00:00:00', 2, 1),
(42, 'Nguyễn Tự Biên', 'nguyentubien040796@gmail.com', 'Tây Tựu Hà Nội', '2020-04-26 00:00:00', '2020-04-27 00:00:00', 2, 2, 10, '', '2020-04-26 08:20:45', 'OKE rồi nhé', '0000-00-00 00:00:00', 0, 1),
(43, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', '125 WEST 26TH STREET  SUITE 600 NEW YORK, NY 10011', '2020-04-27 00:00:00', '2020-04-28 00:00:00', 2, 2, 1, 'Cho tôi một phòng gấp', '2020-04-27 04:11:28', '', '0000-00-00 00:00:00', 1, 0),
(44, 'Nguyễn Tự Biên', 'nguyentubien040796@gmail.com', 'Pháp Vân Cầu Giẽ', '2020-04-30 00:00:00', '2020-05-05 00:00:00', 2, 2, 10, 'Mừng giải phóng miền nam', '2020-04-30 07:55:59', 'Ok rồi bạn ơi', '0000-00-00 00:00:00', 0, 1),
(52, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', 'Tây Tựu Thành Phố Hồ Chí Minh', '2020-05-01 00:00:00', '2020-05-02 00:00:00', 2, 2, 10, 'Mừng giải phóng miền nam', '2020-05-01 08:51:34', '', '0000-00-00 00:00:00', 1, 0),
(53, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', 'Tây Tựu Thành Phố Hồ Chí Minh', '2020-05-01 00:00:00', '2020-05-02 00:00:00', 2, 2, 10, 'Mừng giải phóng miền nam', '2020-05-01 08:51:34', '', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `reply_by` varchar(255) NOT NULL,
  `reply_for` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reply_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `reply_by`, `reply_for`, `created_at`, `reply_content`) VALUES
(1, 'Nguyễn Công Nga', 'bienntph09185@fpt.edu.vn', 'Tôi muôn thắc mắc', 'Tin nhắn của tôi đó là abcxyz', '1', '1', '1', '2020-03-30 08:47:08', 'Gửi phan hoi'),
(2, 'Kaisuke Honda', 'ngancph09279@fpt.edu.vn', 'Thử form', 'ádfghjkl;rtyuiopdfghjkl', '1', '1', '2', '2020-03-31 09:28:19', 'Test thử'),
(3, 'Ngolo Kanté', 'nguyentubien040796@gmail.com', 'Tôi cảm thấy không vui', 'Vì khách sạn không được mang theo chó', '1', '1', '3', '2020-04-16 05:51:13', '124ịadfjhádjfh'),
(4, 'Phòng Vip', 'bienntph09185@fpt.edu.vn', 'Thử form', 'adfadfadsfadf', '-1', '', '', '2020-03-31 09:40:49', ''),
(6, 'Kaisuke Honda', 'bienntph09185@fpt.edu.vn', 'Tôi cảm thấy không vui', 'Tôi cảm thấy rất là không vui luôn', '-1', '', '', '2020-04-27 03:09:28', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_galleries`
--

CREATE TABLE `home_galleries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `main_text` varchar(255) NOT NULL,
  `small_text` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `home_galleries`
--

INSERT INTO `home_galleries` (`id`, `name`, `img_url`, `main_text`, `small_text`, `link_url`, `created_at`) VALUES
(1, 'Slide', 'public/flawleshotel/img/slide/slide-1.jpg', 'Đây là Slide của chúng tôi', 'Đây là small text', 'public/flawleshotel/blog.php', '2020-04-22 09:44:22'),
(5, 'Phòng Vip', 'public/flawleshotel/img/slide/slide-2.jpg', 'Hinh anh noi bat cua khach san', 'Hinh anh dep cua khach san', 'public/flawleshotel/blog.php', '0000-00-00 00:00:00'),
(7, 'Kaisuke Honda', 'public/flawleshotel/img/slide/slide-3.jpg', '<p>Hình ảnh của khách sạn về đêm , những khoảnh khắc đẹp nhất.....</p>', 'hình ảnh đẹp của khách sạn', 'public/flawleshotel/blog.php', '2020-04-26 21:33:00'),
(8, 'Yamaha', 'public/flawleshotel/img/bg-contact.jpg', '<p>Phòng đẹp là một lợi thế của chúng tôi</p>', 'Hình ảnh phòng tiếp khách của chúng tôi', 'http://localhost/du-an-1/public/flawleshotel/blog.php', '1970-01-01 01:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature_img` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `views` int(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `feature_img`, `content`, `views`, `author_id`, `created_at`) VALUES
(2, 'Khách sạn với tiêu chẩn 5 SAO', 'public/images/5ea5a95ade40e-demo1.jpg', 'Integer eu mollis magna. Praesent tincidunt mi id urna sodales congue. Aenean imperdiet nisl tristique nunc viverra, eu sollicitudin erat bibendum. Duis lacinia augue tellus, ut lobortis metus adipiscing eu. Quisque et sollicitudin metus. Aenean porttitor', 100, 1, '2020-04-22 13:03:00'),
(7, 'Biên123213123', 'public/images/5ea2f2d6a63f9-1111.jpg', 'Integer eu mollis magna. Praesent tincidunt mi id urna sodales congue. Aenean imperdiet nisl tristique nunc viverra, eu sollicitudin erat bibendum. Duis lacinia augue tellus, ut lobortis metus adipiscing eu. Quisque et sollicitudin metus. Aenean porttitor', 0, 1, '2020-04-17 13:03:00'),
(8, 'Bể bơi lớn nhất làng hoa Tây Tựu', 'public/images/5ea5a9dfdd9e2-demo4.jpg', 'Integer eu mollis magna. Praesent tincidunt mi id urna sodales congue. Aenean imperdiet nisl tristique nunc viverra, eu sollicitudin erat bibendum. Duis lacinia augue tellus, ut lobortis metus adipiscing eu. Quisque et sollicitudin metus. Aenean porttitor', 0, 1, '2020-04-28 13:03:00'),
(9, 'Ông chủ của chúng tôi là một người rất thân thiện', 'public/images/5ea5aa0aef499-demo3.jpg', '<p>Tất cả những ai tên Biên sẽ được nhận voucher giảm giá phòng lên đến 1%</p>', 0, 1, '2020-04-11 12:52:00'),
(10, 'Với chúng tôi chất lượng là tất cả', 'public/images/5ea5aa4fdd4b2-bg-contact.jpg', '<p>Tìm mọi cách để có thể nâng cao chất lượng dịch vụ của mình giúp cho khách hàng có những trải nghiệm tốt nhất để không phải lãng phí tiền của mình bỏ ra</p>', 0, 1, '2020-04-05 12:53:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Thành Viên', 1),
(2, 'Quản Trị Viên', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_galleries`
--

CREATE TABLE `room_galleries` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_galleries`
--

INSERT INTO `room_galleries` (`id`, `room_id`, `img_url`) VALUES
(1, 1, 'public/flawleshotel/img/slide/slide-4.jpg'),
(2, 1, 'public/flawleshotel/img/slide/slide-5.jpg'),
(3, 1, 'public/flawleshotel/img/slide/slide-1.jpg'),
(4, 1, 'public/flawleshotel/img/slide/slide-2.jpg'),
(5, 1, 'public/flawleshotel/img/slide/slide-3.jpg'),
(6, 10, 'public/flawleshotel/img/slide/slide-1.jpg'),
(9, 10, 'public/flawleshotel/img/slide/slide-2.jpg'),
(10, 10, 'public/flawleshotel/img/slide/slide-3.jpg'),
(11, 10, 'public/flawleshotel/img/slide/slide-4.jpg'),
(12, 7, 'public/flawleshotel/img/slide/slide-1.jpg'),
(13, 7, 'public/flawleshotel/img/slide/slide-2.jpg'),
(14, 7, 'public/flawleshotel/img/slide/slide-3.jpg'),
(15, 7, 'public/flawleshotel/img/slide/slide-4.jpg'),
(16, 7, 'public/flawleshotel/img/slide/slide-1.jpg'),
(17, 8, 'public/flawleshotel/img/slide/slide-2.jpg'),
(18, 8, 'public/flawleshotel/img/slide/slide-3.jpg'),
(19, 8, 'public/flawleshotel/img/slide/slide-4.jpg'),
(20, 9, 'public/flawleshotel/img/slide/slide-1.jpg'),
(21, 9, 'public/flawleshotel/img/slide/slide-2.jpg'),
(22, 9, 'public/flawleshotel/img/slide/slide-3.jpg'),
(23, 9, 'public/flawleshotel/img/slide/slide-4.jpg'),
(24, 11, 'public/flawleshotel/img/slide/slide-1.jpg'),
(25, 11, 'public/flawleshotel/img/slide/slide-2.jpg'),
(26, 11, 'public/flawleshotel/img/slide/slide-3.jpg'),
(27, 11, 'public/flawleshotel/img/slide/slide-4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_service`
--

CREATE TABLE `room_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_service`
--

INSERT INTO `room_service` (`id`, `name`, `status`) VALUES
(1, 'Wifi-free', 1),
(2, 'Dọn Phòng', 1),
(3, 'Pool', 1),
(4, 'Massage', 1),
(5, 'Free Parking', 1),
(6, 'Landry', 1),
(7, 'Smoking area', 1),
(8, 'Wi-Fi in public areas', 1),
(9, 'Wi-Fi in public areas', 1),
(10, 'Free LAN and WiFi access', 1),
(11, 'Executive floor', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_service_xref`
--

CREATE TABLE `room_service_xref` (
  `room_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_service_xref`
--

INSERT INTO `room_service_xref` (`room_id`, `service_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `about` varchar(255) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `feature_img` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `price`, `about`, `adult`, `children`, `status`, `feature_img`, `short_desc`) VALUES
(1, 'NORMAL ROOM', 100, 'Phòng thường phục vụ cho những người có nhu cầu ăn ở bình thường', 2, 2, 1, 'public/images/5ea40cb641adb-demo1.jpg', 'Phòng chúng tôi với đầy đủ tiện nghi'),
(7, 'KING ROOM', 120, 'Phòng được thiết kế theo phong cách quí tộc giúp khách hàng được trải nghiệm cảm giác hoàng tộc', 1, 1, 1, 'public/images/5ea40cbda747f-demo2.jpg', 'Phòng chúng tôi với đầy đủ tiện nghi'),
(8, 'LUXURY ROOM', 1000, 'Phòng được thiết kế theo phong cách sang trọng giúp khách hàng cảm thấy thoải mái nhất có thể', 2, 2, 1, 'public/images/5ea40cc8700a9-demo3.jpg', 'Phòng chúng tôi với đầy đủ tiện nghi'),
(9, 'DELUXE ROOM', 1200, 'Phòng Deluxe được rất nhiều khách hàng yêu thích về sự tiện nghi và sang trọng của nó', 2, 2, 1, 'public/images/5ea40cd1a6228-demo4.jpg', 'Phòng chúng tôi với đầy đủ tiện nghi'),
(10, 'PRESIDENT ROOM', 1500, 'Phòng được thiết kế dành cho tổng thống chúng tôi đã từng được phục vụ tổng thống Mỹ Đỗ Nam Trung', 2, 2, 1, 'public/images/5ea40d8fe2c70-demo1.jpg', 'Phòng có hệ thống camera giám sát nghiệm ngặt'),
(11, 'SINGLE ROOM', 100, 'Nếu không có người yêu thì căn phòng này của chúng tôi rất phù hợp với các bạnnnnnnnn', 1, 1, 1, 'public/images/5ea7bef91e274-demo4.jpg', 'Dành cho những người cô đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `postion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `avatar`, `content`, `postion`) VALUES
(1, 'Nguyễn Tự Biên', 'public/images/5e800a4ecf402-81929145_783530105456363_6748535550740791296_n.jpg', 'Là một khách du lịch thường xuyên ghé thăm khách sạn rất vui vì được ở một khách sạn đẹp như vậy', 'Một du khách đến từ châu Phi'),
(2, 'Kaisuke Honda', 'public/images/5e800ac7c3a88-tivi.jpg', 'Đẹp aa chúng tôi muốn ở đây lâu nhất có thể', 'VĐV bóng ném');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `avatar`, `phone_number`, `role_id`) VALUES
(1, 'Nguyễn Tự Biên', 'bienntph09185@fpt.edu.vn', '$2y$10$tAxJ0RHV2nIJjIMggZHx/edLJm73Z5/76Q8p6hP6aA7saLfJH2g4K', '1', 'public/images/5e7cca652e419-82310946_2492049131035801_3589477303693869056_n.jpg', 123456789, 2),
(2, 'Đỗ Thị Ánh', 'dothianh@gmail.com', '$2y$10$lMfvDpPqFIJnJ.srO2UBsO09uE.8DvUdfQpdV288gnwBqula.zjUu', '', 'public/images/5e7ccb708ab2f-82323201_627860257966116_2566838241827225600_n.jpg', 326548798, 2),
(3, 'nguyenthuychi', 'nguyenthuychi@gmail.com', '$2y$10$tL51rAZicRZHyzW9pY7S.O82OGMzJNjnTey/XCANjzbrxoRSm1RSe', '', 'public/images/5e7ffe1c88571-anhgame.jpg', 2147483647, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `map_url` varchar(255) NOT NULL,
  `fb_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `introduce_content` varchar(255) NOT NULL,
  `blog_new_id` int(11) NOT NULL,
  `ceo_introduce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `status`, `logo`, `email`, `phone_number`, `address`, `map_url`, `fb_url`, `youtube_url`, `twitter_url`, `introduce_content`, `blog_new_id`, `ceo_introduce`) VALUES
(2, 'FLAWLES HOTEL', '1', 'public/images/5ea6837e75408-bg-contact.jpg', 'bienntph09185@gmail.com', 2147483647, '125 WEST 26TH STREET  SUITE 600 NEW YORK, NY 10011', 'https://www.google.com/maps/place/Hoan+Kiem+Lake,+Hoàn+Kiếm+District,+Hanoi,+Vietnam/@21.0287542,105.8523605,17z/data=!3m1!4b1!4m2!3m1!1s0x3135ab953357c995:0x1babf6bb4f9a20e', 'https://www.facebook.com/tung.tien.332', 'https://www.facebook.com/tung.tien.332', 'https://www.facebook.com/tung.tien.332', 'Đây là một khách sạn thuộc hệ thống khách sạn của nhà bạn Nguyễn Tự Biên', 2, 'MỘT KHÁCH SẠN THẬT SỰ TUYỆT VỜI CÁC BẠN NÊN ĐẾN ĐÂY ĐỂ TRẢI NGHIỆM 1 LẦN TRONG ĐỜI');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roomtype` (`room_type_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `home_galleries`
--
ALTER TABLE `home_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`author_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_galleries`
--
ALTER TABLE `room_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`room_id`);

--
-- Chỉ mục cho bảng `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_service_xref`
--
ALTER TABLE `room_service_xref`
  ADD KEY `FK` (`room_id`),
  ADD KEY `FK1` (`service_id`);

--
-- Chỉ mục cho bảng `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`role_id`) USING BTREE;

--
-- Chỉ mục cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`blog_new_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `home_galleries`
--
ALTER TABLE `home_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `room_galleries`
--
ALTER TABLE `room_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `room_service`
--
ALTER TABLE `room_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_roomtype` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `room_galleries`
--
ALTER TABLE `room_galleries`
  ADD CONSTRAINT `room_galleries_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `room_service_xref`
--
ALTER TABLE `room_service_xref`
  ADD CONSTRAINT `room_service_xref_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_service_xref_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `room_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  ADD CONSTRAINT `web_setting_ibfk_1` FOREIGN KEY (`blog_new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
