function calcularIMC() {
    
    const Nombres = document.getElementById("Nombres").value.toUpperCase();
     const peso = parseFloat(document.getElementById("peso").value);
    const talla = parseFloat(document.getElementById("talla").value);

    if (!peso || !talla) {
        document.getElementById("resultado-imc").innerHTML = 
            "⚠️ Ingrese peso y talla correctamente.";
        return;
    }

    const tallaM = talla / 100;
    const imc = peso / (tallaM * tallaM);

    let estado = "";

    if (imc < 18.5) estado = "Bajo peso";
    else if (imc < 25) estado = "Peso ideal";
    else if (imc < 30) estado = "Sobrepeso";
    else estado = "Obesidad";

    document.getElementById("resultado-imc").innerHTML = `
     Nombres: <strong>${Nombres}</strong><br>    
    IMC: <strong>${imc.toFixed(2)}</strong><br>
        Estado: <strong>${estado}</strong>
    `;
}
