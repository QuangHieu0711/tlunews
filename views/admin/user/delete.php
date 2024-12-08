<?php
require_once 'C:\laragon\www\CngheWEB\tlunews1\models\User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Xóa người dùng khỏi cơ sở dữ liệu
    if (User::delete($id)) {
        header("Location: index.php"); // Chuyển hướng về trang index sau khi xóa
        exit;
    } else {
        echo "Xóa người dùng thất bại.";
    }
}
?>