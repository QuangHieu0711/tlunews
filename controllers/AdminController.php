<?php
ob_start(); 
class AdminController {
    public function manageNews() {
        // Kiểm tra quyền admin
        if (!isset($_COOKIE['user_role']) || base64_decode($_COOKIE['user_role']) != 1) {
            echo "Bạn không có quyền truy cập hoặc phiên đã hết hạn.";
            header("Location: /tlunews1/views/admin/login.php");
            exit;
        }

        // Khởi tạo các biến cần thiết
        $searchTerm = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';

        // Lấy danh sách tin tức từ model
        if ($searchTerm) {
            $newsList = News::search($searchTerm);
        } else {
            $newsList = News::getAll();
        }

        // Truyền dữ liệu sang view
        require_once "views/admin/news/index.php";
    }


}
ob_end_flush(); 
?>