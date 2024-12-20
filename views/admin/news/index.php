<?php
session_start();
require_once 'C:\laragon\www\tlunews1\models\News.php';
require_once 'C:\laragon\www\tlunews1\models\Category.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
   header("Location: login.php");
   exit;
}
$searchTerm = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

if ($searchTerm) {
    $newsList = News::search($searchTerm); 
} else {
    $newsList = News::getAll(); 
}

$categories = Category::getAll(); 
$categoryMap = [];
foreach ($categories as $category) {
    $categoryMap[$category['id']] = $category['NAME'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Quản lý tin tức</h1>
            <a href="/tlunews1/views/admin/news/add.php" class="btn btn-success">Thêm tin tức mới</a>
        </div>

        <form action="index.php" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tin tức..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="card shadow-sm">
            <div class="card-body">
                <?php if (count($newsList) > 0): ?>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 30%;">Tiêu đề</th>
                            <th style="width: 20%;">Danh mục</th>
                            <th style="width: 20%;">Ngày tạo</th>
                            <th style="width: 25%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newsList as $news): ?>
                        <tr>
                            <td><?= $news['id'] ?></td>
                            <td><?= htmlspecialchars($news['title']) ?></td>
                            <td><?= isset($categoryMap[$news['category_id']]) ? htmlspecialchars($categoryMap[$news['category_id']]) : 'Danh mục không tồn tại' ?></td>
                            <td><?= date("d/m/Y", strtotime($news['created_at'])) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/tlunews1/views/admin/news/edit.php?id=<?= $news['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="/tlunews1/views/admin/news/delete.php" method="post" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= $news['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc muốn xóa tin tức này không?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p class="text-center text-muted">Không có tin tức nào được hiển thị!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

