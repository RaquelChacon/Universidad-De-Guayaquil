<?php
class Database {
    private $host = "localhost";
    private $db_name = "gestion_estudiantes";
    private $username = "root";
    private $password = "administrador"; // usa tu password real si tienes
    public $conn;

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión a la BD");
        }
    }
}
