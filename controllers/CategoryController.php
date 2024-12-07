<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryController {
    
    // Hiển thị tất cả danh mục
    public function index() {
        $categories = Category::getAll(); // Gọi dữ liệu từ Model
        // Kiểm tra xem có dữ liệu không, tránh trường hợp không có danh mục
        if ($categories) {
            require_once __DIR__ . '/../views/admin/category/index.php';
        } else {
            echo "Không có danh mục nào.";
        }
    }

    // Hiển thị form tạo mới danh mục
    public function create() {
        require_once __DIR__ . '/../views/admin/category/add.php'; // Gửi view tạo danh mục
    }

    // Xử lý tạo mới danh mục
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name']; // Lấy dữ liệu từ form
            if (empty($name)) {
                echo "Tên danh mục không được để trống.";
                return;
            }
            // Kiểm tra kết quả của phương thức create
            if (Category::create($name)) {
                header('Location: index.php?action=index'); // Chuyển hướng về trang danh sách
                exit; // Dừng script sau khi chuyển hướng
            } else {
                echo "Có lỗi xảy ra khi thêm danh mục.";
            }
        }
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit($id) {
        $category = Category::getById($id); // Lấy danh mục theo ID
        if ($category) {
            require_once __DIR__ . '/../views/admin/category/edit.php'; // Gửi dữ liệu đến view chỉnh sửa
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Xử lý cập nhật danh mục
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name']; // Lấy dữ liệu từ form
            if (empty($name)) {
                echo "Tên danh mục không được để trống.";
                return;
            }
            // Kiểm tra kết quả của phương thức update
            if (Category::update($id, $name)) {
                header('Location: index.php?action=index'); // Chuyển hướng về trang danh sách
                exit; // Dừng script sau khi chuyển hướng
            } else {
                echo "Có lỗi xảy ra khi cập nhật danh mục.";
            }
        }
    }

    // Xử lý xóa danh mục
    public function delete($id) {
        if (Category::delete($id)) {
            header('Location: index.php?action=index'); // Chuyển hướng về trang danh sách
            exit; // Dừng script sau khi chuyển hướng
        } else {
            echo "Có lỗi xảy ra khi xóa danh mục.";
        }
    }
}
?>
