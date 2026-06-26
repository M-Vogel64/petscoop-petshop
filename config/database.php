<?php
class Database{
    private static $host = "localhost";
    private static $dbname = "petshop_db";
    private static $username = "root";
    private static $password = "";
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn == null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8",
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
