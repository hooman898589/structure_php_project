<?php
namespace Conn;
// برای مثال هلپر کانکشن رو قرار دادم
class pdo {
    private $connection;

    public function __construct() {
        try {
            $this->connection = new \PDO(
                "mysql:host=localhost;dbname=laravelpro_app;charset=utf8",
                "root",
                "",
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
