<?php include 'header.php'; ?>

<h2>Editar Estudiante</h2>

<form method="POST"
      action="/gestion_estudiantes/public/index.php?accion=actualizar"
      onsubmit="return validarFormulario();">

    <input type="hidden" name="id" value="<?= $estudiante['id'] ?>">

    <label>Nombre</label><br>
    <input type="text" id="nombre" name="nombre"
           value="<?= htmlspecialchars($estudiante['nombre']) ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" id="email" name="email"
           value="<?= htmlspecialchars($estudiante['email']) ?>" required><br><br>

    <label>Carrera</label><br>
    <input type="text" id="carrera" name="carrera"
           value="<?= htmlspecialchars($estudiante['carrera']) ?>" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<a class="volver" href="/gestion_estudiantes/public/index.php">Volver</a>

<?php include 'footer.php'; ?>
