<?php include 'header.php'; ?>

<h2>Listado de Estudiantes</h2>

<a href="/gestion_estudiantes/public/index.php?accion=crear">Nuevo Estudiante</a>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Carrera</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($estudiantes as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e['nombre']) ?></td>
            <td><?= htmlspecialchars($e['email']) ?></td>
            <td><?= htmlspecialchars($e['carrera']) ?></td>
            <td>
                <a href="/gestion_estudiantes/public/index.php?accion=editar&id=<?= $e['id'] ?>">Editar</a>
                |
                <a href="/gestion_estudiantes/public/index.php?accion=eliminar&id=<?= $e['id'] ?>"
                   onclick="return confirm('¿Eliminar estudiante?')">
                   Eliminar
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
