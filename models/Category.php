<?php
require_once "database.php"; // Include file Database.php

class Category {
    // Lấy tất cả danh mục
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public static function create($name) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    // Thêm danh mục mới (phương thức add)
    public static function add($name) {
        return self::create($name); // Gọi phương thức create để thêm danh mục
    }

    // Cập nhật danh mục
    public static function update($id, $name) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE categories SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Tìm kiếm danh mục theo tên
    public static function search($searchTerm) {
        $db = Database::connect();
        // Tìm kiếm với từ khóa trong tên danh mục (sử dụng LIKE trong SQL)
        $stmt = $db->prepare("SELECT * FROM categories WHERE name LIKE ?");
        $stmt->execute(['%' . $searchTerm . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
