<?php
require_once '../app/config/database.php';

class Estudiante {
    private $conn;
    private $table = "estudiantes";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function obtenerTodos() {
    $sql = "SELECT * FROM $this->table";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function crear($nombre, $email, $carrera) {
        if (empty($nombre) || empty($email) || empty($carrera)) return false;

        $sql = "INSERT INTO {$this->table} (nombre, email, carrera)
                VALUES (:nombre, :email, :carrera)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':carrera' => $carrera
        ]);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $email, $carrera) {
        $sql = "UPDATE {$this->table}
                SET nombre=:nombre, email=:email, carrera=:carrera
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':email' => $email,
            ':carrera' => $carrera
        ]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM {$this->table} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
