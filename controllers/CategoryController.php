<?php
require_once "Category.php"; 

class CategoryController {

    // Lấy tất cả danh mục
    public function index() {
        $categories = Category::getAll();
        return $categories;
    }

    // Lấy danh mục theo ID
    public function show($id) {
        $category = Category::getById($id);
        if ($category) {
            return $category;
        } else {
            return "Danh mục không tồn tại.";
        }
    }

    // Thêm danh mục mới
    public function create($name) {
        if (empty($name)) {
            return "Tên danh mục không được để trống.";
        }

        if (Category::create($name)) {
            return "Danh mục đã được thêm thành công.";
        } else {
            return "Thêm danh mục thất bại.";
        }
    }

    // Cập nhật danh mục
    public function update($id, $name) {
        if (empty($name)) {
            return "Tên danh mục không được để trống.";
        }

        if (Category::update($id, $name)) {
            return "Danh mục đã được cập nhật.";
        } else {
            return "Cập nhật danh mục thất bại.";
        }
    }

    // Xóa danh mục
    public function delete($id) {
        if (Category::delete($id)) {
            return "Danh mục đã được xóa.";
        } else {
            return "Xóa danh mục thất bại.";
        }
    }
}
?>
