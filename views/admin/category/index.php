<?php
session_start();
require_once 'E:\CSE485Web\laragon\www\tlunews1\models\Category.php';

// Kiểm tra quyền admin
if (empty($_SESSION['user']) || !isset($_SESSION['user']['role']) || $_SESSION['user']['role'] != 1) {
    header("Location: /login.php");
    exit;
}

// Kiểm tra xem có tìm kiếm không
$searchTerm = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';

// Lấy danh sách danh mục nếu có từ khóa tìm kiếm
if ($searchTerm) {
    $categoriesList = Category::search($searchTerm); // Hàm tìm kiếm theo từ khóa
} else {
    $categoriesList = Category::getAll(); // Lấy tất cả danh mục nếu không có từ khóa
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Quản lý danh mục</h1>
            <a href="add.php" class="btn btn-success">Thêm danh mục mới</a>
        </div>

        <!-- Tìm kiếm danh mục -->
        <form action="index.php" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="card-body">
                <?php if (count($categoriesList) > 0): ?>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 70%;">Tên danh mục</th>
                            <th style="width: 25%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categoriesList as $category): ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= htmlspecialchars($category['name']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="edit.php?id=<?= urlencode($category['id']) ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="delete.php" method="post" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= urlencode($category['id']) ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p class="text-center text-muted">Không có danh mục nào để hiển thị.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
