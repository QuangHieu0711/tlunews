<?php

class Database {
    private static $instance = null;
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "Hienluong2709@";
    private static $dbname = "tlunews";

    public static function connect() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::$servername . ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
