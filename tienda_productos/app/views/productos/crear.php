<?php include __DIR__ . '/../header.php'; ?>

<h2>Crear Producto</h2>

<form method="POST"
      action="/tienda_productos/public/index.php?controller=producto&action=store"
      onsubmit="return validarProducto();">

  <label>Nombre</label><br>
  <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '') ?>">
  <div class="error"><?= $errors['nombre'] ?? '' ?></div><br>

  <label>Descripción</label><br>
  <textarea id="descripcion" name="descripcion"><?= htmlspecialchars($old['descripcion'] ?? '') ?></textarea><br><br>

  <label>Precio</label><br>
  <input type="text" id="precio" name="precio" value="<?= htmlspecialchars($old['precio'] ?? '') ?>">
  <div class="error"><?= $errors['precio'] ?? '' ?></div><br>

  <label>Stock</label><br>
  <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($old['stock'] ?? '0') ?>">
  <div class="error"><?= $errors['stock'] ?? '' ?></div><br>

  <button type="submit">Guardar</button>
</form>

<a class="volver" href="/tienda_productos/public/index.php?controller=producto&action=index">Volver</a>

<?php include __DIR__ . '/../footer.php'; ?>
