<?php include __DIR__ . '/../header.php'; ?>

<h2>Confirmar eliminación</h2>

<p>¿Seguro que deseas eliminar el producto <strong><?= htmlspecialchars($producto['nombre']) ?></strong>?</p>

<a class="btn" href="/tienda_productos/public/index.php?controller=producto&action=destroy&id=<?= (int)$producto['id'] ?>">Sí, eliminar</a>
<a class="volver" href="/tienda_productos/public/index.php?controller=producto&action=index">Cancelar</a>

<?php include __DIR__ . '/../footer.php'; ?>
