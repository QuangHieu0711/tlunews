-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Hoạt động sinh viên'),
	(2, 'Nghiên cứu khoa học'),
	(3, 'Sự kiện nhà trường'),
	(4, 'Thông báo học vụ'),
	(5, 'Thành tích sinh viên'),
	(6, 'Đời sống giảng viên'),
	(7, 'Hỗ trợ sinh viên'),
	(8, 'Hợp tác quốc tế');


INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
	(1, 'Ngày hội Tân sinh viên Đại học Thủy Lợi 2024', 'Đại học Thủy Lợi vừa tổ chức Ngày hội Chào tân sinh viên 2024 với các hoạt động văn nghệ, thể thao và giao lưu ý nghĩa.', 'images/image1.jpg', '2024-12-01 08:00:00', 1),
	(2, 'Nghiên cứu giải pháp chống ngập đô thị', 'Nhóm nghiên cứu thuộc Khoa Công trình Đại học Thủy Lợi đã công bố giải pháp chống ngập hiệu quả tại các thành phố lớn.', 'images/image2.jpg', '2024-12-02 10:00:00', 2),
	(3, 'Lễ kỷ niệm 65 năm thành lập trường', 'Lễ kỷ niệm 65 năm thành lập Đại học Thủy Lợi đã diễn ra long trọng với sự tham dự của nhiều cựu sinh viên và khách mời danh dự.', 'images/image3.webp', '2024-12-03 09:30:00', 3),
	(4, 'Thông báo lịch thi học kỳ 1 năm học 2024', 'Phòng Đào tạo thông báo lịch thi học kỳ 1 cho toàn bộ các hệ đào tạo của Đại học Thủy Lợi.', 'images/image4.jpg', '2024-12-04 14:00:00', 4),
	(5, 'Sinh viên Thủy Lợi đạt giải Nhất cuộc thi Startup 2024', 'Nhóm sinh viên đến từ Khoa Kinh tế Đại học Thủy Lợi đã xuất sắc giành giải Nhất tại cuộc thi khởi nghiệp toàn quốc.', 'images/image5.png', '2024-12-05 15:00:00', 5),
	(6, 'Ký kết hợp tác với Đại học Kyoto - Nhật Bản', 'Đại học Thủy Lợi và Đại học Kyoto đã ký kết biên bản hợp tác về đào tạo và nghiên cứu khoa học.', 'images/image6.jpg', '2024-12-06 11:00:00', 8),
	(7, 'Hội thảo về biến đổi khí hậu và nguồn nước', 'Hội thảo quốc tế với chủ đề Biến đổi khí hậu và Quản lý tài nguyên nước đã thu hút sự quan tâm của các nhà khoa học trong và ngoài nước.', 'images/image7.webp', '2024-12-07 13:30:00', 2),
	(8, 'Chương trình hỗ trợ học bổng toàn phần năm 2024', 'Đại học Thủy Lợi công bố chương trình học bổng toàn phần dành cho sinh viên xuất sắc năm 2024.', 'images/image8.webp', '2024-12-08 09:00:00', 7),
	(9, 'Kỷ niệm ngày Nhà giáo Việt Nam 20/11', 'Trường tổ chức lễ tri ân các thầy cô nhân ngày Nhà giáo Việt Nam với nhiều hoạt động ý nghĩa.', 'images/image9.jpg', '2024-11-20 16:00:00', 6),
	(10, 'Giải bóng đá sinh viên toàn quốc khu vực miền Bắc', 'flowersĐội bóng đá sinh viên Đại học Thủy Lợi đã giành chức vô địch tại giải bóng đá khu vực miền Bắc.', 'images/image10.jpg', '2024-12-09 17:30:00', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
