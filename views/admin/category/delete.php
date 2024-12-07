<?php
require_once 'E:\CSE485Web\laragon\www\tlunews1\models\News.php'; // Đảm bảo bạn đang gọi đúng file News.php, không phải Category.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Kiểm tra nếu id là số (hoặc kiểu dữ liệu hợp lệ khác tùy theo yêu cầu)
    if (is_numeric($id)) {
        // Xóa tin tức khỏi cơ sở dữ liệu
        if (News::delete($id)) {
            header("Location: index.php"); // Chuyển hướng về trang index sau khi xóa
            exit;
        } else {
            echo "Xóa tin tức thất bại.";
        }
    } else {
        echo "ID không hợp lệ.";
    }
} else {
    echo "ID không được cung cấp.";
}
?>
