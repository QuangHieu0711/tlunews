<?php
session_start();

require_once "../../../models/Category.php";

// Kiểm tra quyền admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Kiểm tra dữ liệu nhập
    if (empty($name)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
    } else {
        // Lưu danh mục vào cơ sở dữ liệu
        if (Category::add($name)) {
            $success = "Thêm danh mục thành công!";
            header("Refresh: 2; url=index.php");
        } else {
            $error = "Có lỗi xảy ra, vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Thêm danh mục</h1>
            </div>
            <div class="card-body">
                <!-- Thông báo lỗi/thành công -->
                <?php if (isset($error) && $error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $success ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Form nhập liệu -->
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <a href="index.php" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
