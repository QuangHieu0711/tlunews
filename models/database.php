<?php
class Database {
    private static $instance = null;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ktpm3";
    private $conn;

    private function __construct() {
        try {
            // Tạo kết nối PDO
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // Thiết lập chế độ lỗi cho PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Hàm lấy kết nối (Singleton pattern)
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
?>
