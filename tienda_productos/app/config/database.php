<?php
class Database {
    private string $host = "localhost";
    private string $db_name = "tienda";
    private string $username = "root";
    private string $password = "administrador";
    public PDO $conn;

    public function connect(): PDO {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
