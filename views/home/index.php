<?php
require_once "models/News.php";
require_once "models/Category.php";
// Kiểm tra xem có tìm kiếm không
$searchTerm = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

// Lấy danh sách tin tức nếu có từ khóa tìm kiếm
if ($searchTerm) {
    $newsList = News::search($searchTerm); // Hàm tìm kiếm theo từ khóa
} else {
    $newsList = News::getAll(); // Lấy tất cả tin tức nếu không có từ khóa
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Đảm bảo các card có kích thước đều */
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1;
        }

        /* Điều chỉnh hình ảnh trong card */
        .card-img-top {
            height: 250px;
            /* Cố định chiều cao cho ảnh */
            object-fit: cover;
            /* Cắt ảnh để không bị biến dạng */
        }

        /* Khoảng cách giữa navbar và tiêu đề */
        h1 {
            margin-top: 20px;
            /* Giảm khoảng cách trên tiêu đề */
            font-size: 48px;
            color: #333;
            font-weight: bold;
            text-align: center;
        }
        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            margin-top: 30px;
            /* Khoảng cách giữa footer và nội dung trên */
        }
    </style>
</head>

<body>
    <h1>DANH SÁCH TIN TỨC</h1>
    <div class="container mt-5">

        <!-- Tìm kiếm tin tức -->
        <?php if (count($newsList) > 0): ?>
            <div class="row">
                <?php foreach ($newsList as $news): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?= $news['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($news['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars(substr($news['content'], 0, 100)) ?>...</p>
                                <a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Không có tin tức nào để hiển thị.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>