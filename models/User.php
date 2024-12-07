<?php
require_once __DIR__ . "/database.php";

class User {

    // Xác thực người dùng
    public static function authenticate($username, $password) {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['password'] === $password) {
            return $user; // Trả về thông tin người dùng nếu đúng
        }

        return false; // Trả về false nếu không tìm thấy hoặc mật khẩu sai
    }

    // Thêm người dùng mới
    public static function add($username, $password, $role = 0) {
        $db = Database::connect();

        $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        $stmt->execute(['username' => $username, 'password' => $password, 'role' => $role]);

        return $db->lastInsertId(); 
    }

    // Cập nhật thông tin người dùng
    public static function update($id, $username, $password, $role) {
        $db = Database::connect();

        $stmt = $db->prepare("UPDATE users SET username = :username, password = :password, role = :role WHERE id = :id");
        $stmt->execute(['id' => $id, 'username' => $username, 'password' => $password, 'role' => $role]);

        return $stmt->rowCount(); // Trả về số dòng bị ảnh hưởng (1 nếu thành công)
    }

    // Xóa người dùng
    public static function delete($id) {
        $db = Database::connect();

        $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount(); // Trả về số dòng bị ảnh hưởng (1 nếu thành công)
    }

    // Lấy tất cả người dùng
    public static function getAll() {
        $db = Database::connect();

        $stmt = $db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả người dùng
    }
    public static function getById($id) {
        $db = Database::connect();

        // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // Trả về thông tin người dùng dưới dạng mảng
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>