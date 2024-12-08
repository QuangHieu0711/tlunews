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

-- Dumping structure for table tlunews.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tlunews.categories: ~8 rows (approximately)
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Hoạt động sinh viên'),
	(2, 'Nghiên cứu khoa học'),
	(3, 'Sự kiện nhà trường'),
	(4, 'Thông báo học vụ'),
	(5, 'Thành tích sinh viên'),
	(6, 'Đời sống giảng viên'),
	(7, 'Hỗ trợ sinh viên'),
	(8, 'Hợp tác quốc tế'),
	(9, 'Kí túc xá');

-- Dumping structure for table tlunews.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tlunews.news: ~10 rows (approximately)
INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
	(2, 'Nghiên cứu giải pháp chống ngập đô thị', 'Nhóm nghiên cứu thuộc Khoa Công trình Đại học Thủy Lợi đã công bố một giải pháp chống ngập đô thị hiệu quả, đáp ứng nhu cầu cấp bách trong bối cảnh biến đổi khí hậu ngày càng nghiêm trọng. Giải pháp này được thiết kế với mục tiêu giảm thiểu tình trạng ngập úng, bảo vệ hạ tầng đô thị và nâng cao chất lượng sống cho người dân. Nhóm nghiên cứu đã ứng dụng các công nghệ mới như hệ thống thoát nước thông minh, các vật liệu chống thấm và công trình xanh để triển khai giải pháp này tại các thành phố lớn. Đây là một bước tiến quan trọng, không chỉ góp phần bảo vệ môi trường mà còn mang lại giá trị lâu dài cho cộng đồng và xã hội.', 'images/image2.jpg', '2024-12-02 10:00:00', 2),
	(3, 'Lễ kỷ niệm 65 năm thành lập trường', 'Đại học Thủy Lợi vừa tổ chức lễ kỷ niệm 65 năm thành lập trường với sự tham gia của đông đảo cựu sinh viên, giảng viên và khách mời. Sự kiện đã diễn ra long trọng, tạo không gian để ôn lại những chặng đường phát triển của trường, từ những ngày đầu thành lập cho đến nay. Các thế hệ sinh viên đã có dịp gặp gỡ, chia sẻ những kỷ niệm, thành tựu trong học tập và công tác. Lễ kỷ niệm cũng là dịp để trường khẳng định vị thế và cam kết tiếp tục phát triển trong tương lai, đáp ứng nhu cầu đào tạo nguồn nhân lực chất lượng cao cho xã hội.', 'images/image3.webp', '2024-12-03 09:30:00', 3),
	(4, 'Thông báo lịch thi học kỳ 1 năm học 2024', 'Phòng Đào tạo Đại học Thủy Lợi vừa thông báo lịch thi học kỳ 1 năm học 2024 cho toàn bộ các hệ đào tạo. Theo thông báo, các môn thi sẽ được tổ chức trong khoảng thời gian từ ngày 10 đến 20 tháng 12, với lịch thi được phân chia hợp lý để đảm bảo quyền lợi cho sinh viên. Đây là một thông tin quan trọng giúp sinh viên chuẩn bị tốt nhất cho kỳ thi, từ việc ôn tập cho đến các thủ tục cần thiết. Phòng Đào tạo cũng nhắc nhở sinh viên kiểm tra kỹ thông tin lịch thi và các yêu cầu khác trước khi bước vào kỳ thi cuối kỳ.', 'images/image4.png', '2024-12-04 14:00:00', 4),
	(5, 'Sinh viên Thủy Lợi đạt giải Nhất cuộc thi Startup 2024', 'Nhóm sinh viên đến từ Khoa Kinh tế Đại học Thủy Lợi đã xuất sắc giành giải Nhất tại cuộc thi khởi nghiệp Startup 2024, một sự kiện lớn dành cho các sinh viên đam mê khởi nghiệp trong toàn quốc. Đề tài của nhóm sinh viên Thủy Lợi tập trung vào việc phát triển sản phẩm sáng tạo và giải quyết các vấn đề thực tiễn trong cuộc sống, thể hiện sự sáng tạo và tiềm năng vượt trội của các bạn trẻ. Thành tích này không chỉ mang lại vinh quang cho trường mà còn là nguồn động lực lớn cho các sinh viên khác trong việc phát triển ý tưởng khởi nghiệp của mình.', 'images/image5.jpg', '2024-12-05 15:00:00', 5),
	(6, 'Ký kết hợp tác với Đại học Kyoto - Nhật Bản', 'Đại học Thủy Lợi và Đại học Kyoto đã ký kết biên bản hợp tác chiến lược về đào tạo và nghiên cứu khoa học. Thỏa thuận hợp tác này mở ra cơ hội cho sinh viên và giảng viên của cả hai trường tham gia vào các chương trình trao đổi, nghiên cứu chung và phát triển các dự án khoa học kỹ thuật. Mối quan hệ hợp tác này không chỉ góp phần nâng cao chất lượng đào tạo mà còn tạo điều kiện cho các sinh viên tiếp cận với những công nghệ tiên tiến, cũng như học hỏi những phương pháp giảng dạy và nghiên cứu hiện đại từ Đại học Kyoto.', 'images/image6.jpg', '2024-12-06 11:00:00', 8),
	(7, 'Hội thảo về biến đổi khí hậu và nguồn nước', 'Hội thảo quốc tế về biến đổi khí hậu và quản lý tài nguyên nước đã thu hút sự tham gia của nhiều nhà khoa học, chuyên gia và các tổ chức trong và ngoài nước. Hội thảo tập trung vào việc thảo luận các giải pháp bảo vệ nguồn nước trong bối cảnh biến đổi khí hậu ngày càng diễn biến phức tạp. Các nghiên cứu và kinh nghiệm từ nhiều quốc gia đã được chia sẻ, giúp tăng cường nhận thức và đưa ra các chiến lược ứng phó hiệu quả. Sự kiện này là cơ hội quý báu để Đại học Thủy Lợi kết nối với các đối tác quốc tế trong việc nghiên cứu và bảo vệ tài nguyên nước cho tương lai.', 'images/image7.webp', '2024-12-07 13:30:00', 2),
	(8, 'Chương trình hỗ trợ học bổng toàn phần năm 2024', 'Đại học Thủy Lợi đã công bố chương trình học bổng toàn phần dành cho sinh viên xuất sắc năm 2024. Chương trình này không chỉ khuyến khích sinh viên có thành tích học tập xuất sắc mà còn giúp các bạn trẻ vượt qua khó khăn tài chính để tiếp tục con đường học vấn. Các sinh viên được nhận học bổng sẽ được hỗ trợ toàn bộ chi phí học tập, sinh hoạt và các hoạt động ngoại khóa tại trường. Đây là một cơ hội tuyệt vời để sinh viên có thể tập trung vào việc học mà không phải lo lắng về vấn đề tài chính.', 'images/image8.webp', '2024-12-08 09:00:00', 7),
	(10, 'Giải bóng đá sinh viên toàn quốc khu vực miền Bắc', 'Đội bóng đá sinh viên Đại học Thủy Lợi đã giành chức vô địch tại giải bóng đá sinh viên toàn quốc khu vực miền Bắc 2024, một sự kiện thể thao quan trọng dành cho sinh viên các trường đại học. Với tinh thần thi đấu quyết tâm và khả năng chiến thuật xuất sắc, đội bóng Đại học Thủy Lợi đã vượt qua nhiều đối thủ mạnh để bước lên ngôi vị cao nhất. Thành tích này không chỉ mang lại vinh quang cho đội bóng mà còn góp phần khẳng định thương hiệu thể thao của trường trong các sự kiện thể thao quốc gia.', 'images/image10.jpg', '2024-12-09 17:30:00', 1);

-- Dumping structure for table tlunews.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- Dumping data for table tlunews.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
	(1, 'Quang Hiếu', '12345678', 1),
	(2, 'Thùy Liên', '12345678', 1),
	(3, 'Hiền Lương', '12345678', 1),
	(4, 'guest', '12345678', 0),
	(5, 'viewer', '12345678', 0);



/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
