<?php
session_start();
require_once "../../../models/User.php";

// Kiểm tra quyền người dùng
if (empty($_SESSION['user']) || !isset($_SESSION['user']['role']) || $_SESSION['user']['role'] != 1) {
    // Nếu không phải quản trị viên, chuyển hướng đến trang đăng nhập
    header("Location: /login.php");
    exit;
}

// Kiểm tra xem ID người dùng có được truyền qua URL không
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: index.php");
    exit;
}

// Lấy thông tin người dùng
$user = User::getById($id);
if (!$user) {
    header("Location: index.php");
    exit;
}

$error = '';
$success = '';

// Cập nhật thông tin nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $role = $_POST['role'];

    // Kiểm tra dữ liệu nhập
    if (empty($username)) {
        $error = "Vui lòng nhập tên người dùng.";
    } else {
        // Cập nhật thông tin người dùng (không thay đổi mật khẩu)
        if (User::update($id, $username, $user['password'], $role)) {
            $success = "Cập nhật người dùng thành công!";
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
    <title>Chỉnh sửa người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Chỉnh sửa người dùng</h1>
            </div>
            <div class="card-body">
                <!-- Thông báo lỗi/thành công -->
                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($error) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($success) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Form chỉnh sửa -->
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>

                    <!-- Hiển thị mật khẩu, nhưng không có trường nhập liệu cho mật khẩu -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= htmlspecialchars($user['password']) ?>">
                    </div>


                    <div class="mb-3">
                        <label for="role" class="form-label">Vai trò</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Quản trị viên</option>
                            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Người dùng</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>