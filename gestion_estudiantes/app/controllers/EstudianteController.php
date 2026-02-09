<?php
require_once __DIR__ . '/../models/Estudiante.php';

class EstudianteController {

    private $model;

    public function __construct() {
        $this->model = new Estudiante();
    }

    public function listar() {
        $estudiantes = $this->model->obtenerTodos();
        require __DIR__ . '/../views/listar.php';
    }

    public function crear() {
        require __DIR__ . '/../views/crear.php';
    }

    public function guardar() {
        $this->model->crear(
            $_POST['nombre'],
            $_POST['email'],
            $_POST['carrera']
        );
        header("Location: index.php");
        exit;
    }

    public function editar() {
        $estudiante = $this->model->obtenerPorId($_GET['id']);
        require __DIR__ . '/../views/editar.php';
    }

    public function actualizar() {
        $this->model->actualizar(
            $_POST['id'],
            $_POST['nombre'],
            $_POST['email'],
            $_POST['carrera']
        );
        header("Location: index.php");
        exit;
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header("Location: index.php");
        exit;
    }
} 
