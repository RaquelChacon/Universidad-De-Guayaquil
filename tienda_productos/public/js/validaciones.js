function validarProducto() {
  const nombre = document.getElementById("nombre").value.trim();
  const precio = document.getElementById("precio").value.trim();
  const stock = document.getElementById("stock").value.trim();

  if (nombre.length < 3) {
    alert("Nombre obligatorio (mínimo 3 caracteres).");
    return false;
  }

  const p = Number(precio);
  if (precio === "" || Number.isNaN(p) || p <= 0) {
    alert("Precio obligatorio y mayor que 0.");
    return false;
  }

  const s = Number(stock);
  if (stock === "" || !Number.isInteger(s) || s < 0) {
    alert("Stock debe ser un entero no negativo.");
    return false;
  }

  return true;
}
