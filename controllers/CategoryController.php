<?php
require_once 'Category.php'; // Bao gồm model Category

class CategoryController {

    // Lấy tất cả danh mục
    public function index() {
        $categories = Category::getAll();
        // Gọi view và truyền dữ liệu
        require_once 'views/admin/category/index.php';
    }

    // Lấy danh mục theo ID
    public function show($id) {
        $category = Category::getById($id);
        if ($category) {
            // Truyền dữ liệu đến view
            require_once 'views/admin/category/show.php';
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Cập nhật danh mục
    public function update($id, $name) {
        if (empty($name)) {
            $message = "Tên danh mục không được để trống.";
        } else {
            if (Category::update($id, $name)) {
                $message = "Danh mục đã được cập nhật.";
            } else {
                $message = "Cập nhật danh mục thất bại.";
            }
        }
        // Truyền thông báo và dữ liệu đến view
        $category = Category::getById($id);
        require_once 'views/admin/category/edit.php';
    }

    // Thêm danh mục mới
    public function create($name) {
        if (empty($name)) {
            $message = "Tên danh mục không được để trống.";
        } else {
            if (Category::create($name)) {
                $message = "Danh mục đã được thêm thành công.";
            } else {
                $message = "Thêm danh mục thất bại.";
            }
        }
        // Truyền dữ liệu đến view
        require_once 'views/admin/category/add.php';
    }

    // Xóa danh mục
    public function delete($id) {
        if (Category::delete($id)) {
            echo "Danh mục đã được xóa.";
        } else {
            echo "Xóa danh mục thất bại.";
        }
    }
}
?>
