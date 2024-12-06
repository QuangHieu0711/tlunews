<?php
require_once "database.php"; 

class Category {
    // Lấy tất cả danh mục
    public static function getAll() {
        $db = database::getConnection();
        $stmt = $db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public static function getById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public static function create($name) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    // Cập nhật danh mục
    public static function update($id, $name) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE categories SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public static function delete($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
}