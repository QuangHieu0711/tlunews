<?php
class Category {

    // Kết nối đến cơ sở dữ liệu
    private static function connect() {
        return new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    }

    // Lấy tất cả danh mục
    public static function getAll() {
        $conn = self::connect();
        $stmt = $conn->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public static function getById($id) {
        $conn = self::connect();
        $stmt = $conn->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public static function create($name) {
        $conn = self::connect();
        $stmt = $conn->prepare('INSERT INTO categories (name) VALUES (:name)');
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // Cập nhật danh mục
    public static function update($id, $name) {
        $conn = self::connect();
        $stmt = $conn->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // Xóa danh mục
    public static function delete($id) {
        $conn = self::connect();
        $stmt = $conn->prepare('DELETE FROM categories WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
