<?php include __DIR__ . '/../header.php'; ?>

<h2>Listado de Productos</h2>

<a class="btn" href="/tienda_productos/public/index.php?controller=producto&action=create">+ Nuevo Producto</a>

<table>
  <tr>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
  </tr>

  <?php foreach ($productos as $p): ?>
    <tr>
      <td><?= htmlspecialchars($p['nombre']) ?></td>
      <td><?= htmlspecialchars($p['descripcion'] ?? '') ?></td>
      <td>$<?= number_format((float)$p['precio'], 2) ?></td>
      <td><?= (int)$p['stock'] ?></td>
      <td>
        <a href="/tienda_productos/public/index.php?controller=producto&action=edit&id=<?= $p['id'] ?>">Editar</a>
        |
        <a href="/tienda_productos/public/index.php?controller=producto&action=delete&id=<?= $p['id'] ?>">Eliminar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
