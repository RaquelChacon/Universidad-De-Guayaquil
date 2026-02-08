<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private Producto $model;

    public function __construct() {
        $this->model = new Producto();
    }

    private function validate(array $input): array {
        $errors = [];

        $nombre = trim($input['nombre'] ?? '');
        $precio = $input['precio'] ?? '';
        $stock  = $input['stock'] ?? '';
        $descripcion = trim($input['descripcion'] ?? '');

        if ($nombre === '' || mb_strlen($nombre) < 3) {
            $errors['nombre'] = "El nombre es obligatorio y debe tener al menos 3 caracteres.";
        }

        if ($precio === '' || !is_numeric($precio) || floatval($precio) <= 0) {
            $errors['precio'] = "El precio es obligatorio y debe ser mayor que 0.";
        }

        if ($stock === '' || filter_var($stock, FILTER_VALIDATE_INT) === false || intval($stock) < 0) {
            $errors['stock'] = "El stock debe ser un entero no negativo.";
        }

        $clean = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => floatval($precio),
            'stock' => intval($stock),
        ];

        return [$errors, $clean];
    }

    public function index(): void {
        $productos = $this->model->all();
        require __DIR__ . '/../views/productos/listar.php';
    }

    public function create(): void {
        $errors = [];
        $old = ['nombre'=>'','descripcion'=>'','precio'=>'','stock'=>'0'];
        require __DIR__ . '/../views/productos/crear.php';
    }

    public function store(): void {
        [$errors, $clean] = $this->validate($_POST);

        if (!empty($errors)) {
            $old = [
                'nombre' => $_POST['nombre'] ?? '',
                'descripcion' => $_POST['descripcion'] ?? '',
                'precio' => $_POST['precio'] ?? '',
                'stock' => $_POST['stock'] ?? '',
            ];
            require __DIR__ . '/../views/productos/crear.php';
            return;
        }

        $this->model->create($clean);
        header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
        exit;
    }

    public function edit(): void {
        $id = intval($_GET['id'] ?? 0);
        $producto = $this->model->find($id);

        if (!$producto) {
            header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
            exit;
        }

        $errors = [];
        $old = $producto;
        require __DIR__ . '/../views/productos/editar.php';
    }

    public function update(): void {
        $id = intval($_GET['id'] ?? 0);
        $producto = $this->model->find($id);

        if (!$producto) {
            header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
            exit;
        }

        [$errors, $clean] = $this->validate($_POST);

        if (!empty($errors)) {
            $old = [
                'id' => $id,
                'nombre' => $_POST['nombre'] ?? '',
                'descripcion' => $_POST['descripcion'] ?? '',
                'precio' => $_POST['precio'] ?? '',
                'stock' => $_POST['stock'] ?? '',
            ];
            require __DIR__ . '/../views/productos/editar.php';
            return;
        }

        $this->model->update($id, $clean);
        header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
        exit;
    }

    // Confirmación
    public function delete(): void {
        $id = intval($_GET['id'] ?? 0);
        $producto = $this->model->find($id);

        if (!$producto) {
            header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
            exit;
        }

        require __DIR__ . '/../views/productos/confirmar_eliminar.php';
    }

    // Eliminar definitivo
    public function destroy(): void {
        $id = intval($_GET['id'] ?? 0);
        $this->model->delete($id);

        header("Location: /tienda_productos/public/index.php?controller=producto&action=index");
        exit;
    }
}
