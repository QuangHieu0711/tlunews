<?php
session_start();
require_once 'C:\laragon\www\CngheWEB\tlunews1\models\User.php';

// Kiểm tra quyền người dùng
if (empty($_SESSION['user']) || !isset($_SESSION['user']['role']) || $_SESSION['user']['role'] != 1) {
    // Nếu không phải quản trị viên, chuyển hướng đến trang đăng nhập
    header("Location: /login.php");
    exit;
}

// Lấy danh sách người dùng
$userList = User::getAll(); // Lấy tất cả người dùng
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Quản lý người dùng</h1>
            <!-- Chỉ hiển thị nút thêm người dùng nếu là quản trị viên -->
            <a href="add.php" class="btn btn-success">Thêm người dùng mới</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <?php if (count($userList) > 0): ?>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 20%;">Tên người dùng</th>
                            <th style="width: 15%;">Vai trò</th>
                            <th style="width: 20%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userList as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= $user['role'] == 1 ? 'Quản trị viên' : 'Người dùng' ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Chỉ quản trị viên mới có quyền sửa và xóa -->
                                    <?php if ($_SESSION['user']['role'] == 1): ?>
                                        <a href="../../../../tlunews1/views/admin/user/edit.php?id=<?= urlencode($user['id']) ?>" class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="../../../../tlunews1/views/admin/user/delete.php" method="post" class="d-inline-block">
                                            <input type="hidden" name="id" value="<?= urlencode($user['id']) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?')">Xóa</button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-muted">Bạn không có quyền sửa/xóa người dùng</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p class="text-center text-muted">Không có người dùng nào để hiển thị.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>




</html>
