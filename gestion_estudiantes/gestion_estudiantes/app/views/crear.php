<?php include 'header.php'; ?>

<h2>Registrar Estudiante</h2>

<form method="POST"
      action="/gestion_estudiantes/public/index.php?accion=guardar"
      onsubmit="return validarFormulario();">

    <label>Nombre</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label>Email</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label>Carrera</label><br>
    <input type="text" id="carrera" name="carrera" required><br><br>

    <button type="submit">Guardar</button>
</form>

<a class="volver" href="/gestion_estudiantes/public/index.php">Volver</a>

<?php include 'footer.php'; ?>
