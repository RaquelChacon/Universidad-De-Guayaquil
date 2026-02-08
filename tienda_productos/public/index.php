<?php
$controllerName = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'index';

switch (strtolower($controllerName)) {
    case 'producto':
        require_once '../app/controllers/ProductoController.php';
        $controller = new ProductoController();
        break;
    default:
        die("Controlador no encontrado");
}

$allowedActions = ['index','create','store','edit','update','delete','destroy'];

if (!in_array($action, $allowedActions, true)) {
    die("Acción no permitida");
}

$controller->$action();
