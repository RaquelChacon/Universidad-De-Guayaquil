function validarFormulario() {
    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const carrera = document.getElementById("carrera").value.trim();

    if (nombre === "" || email === "" || carrera === "") {
        alert("Todos los campos son obligatorios");
        return false;
    }

    // Validación básica de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Ingrese un correo electrónico válido");
        return false;
    }

    return true;
}
