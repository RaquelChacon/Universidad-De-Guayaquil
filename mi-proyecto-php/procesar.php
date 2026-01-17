<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Formulario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .info-box {
            background-color: #e8f4fc;
            border-left: 4px solid #3498db;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .data-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        
        .data-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .data-label {
            font-weight: bold;
            color: #2c3e50;
        }
        
        .data-value {
            color: #34495e;
        }
        
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            margin-top: 10px;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .method-badge {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .post-method {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Datos Recibidos del Formulario</h1>
        
        <div class="method-badge post-method">Método POST</div>
        
        <div class="info-box">
            <h2>Información Procesada</h2>
            <p>Los siguientes datos fueron recibidos del formulario:</p>
        </div>
        
        <?php
        // Verificar si se enviaron datos por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y sanitizar los datos
            $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No proporcionado';
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'No proporcionado';
            $asunto = isset($_POST['asunto']) ? htmlspecialchars($_POST['asunto']) : 'No proporcionado';
            $mensaje = isset($_POST['mensaje']) ? htmlspecialchars($_POST['mensaje']) : 'No proporcionado';
            
            // Mostrar los datos recibidos
            echo '<div class="data-box">';
            echo '<div class="data-item">';
            echo '<span class="data-label">Nombre: </span>';
            echo '<span class="data-value">' . $nombre . '</span>';
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="data-label">Correo Electrónico: </span>';
            echo '<span class="data-value">' . $email . '</span>';
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="data-label">Asunto: </span>';
            echo '<span class="data-value">' . $asunto . '</span>';
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="data-label">Mensaje: </span>';
            echo '<span class="data-value">' . $mensaje . '</span>';
            echo '</div>';
            echo '</div>';
            
            // Información técnica adicional
            echo '<div class="info-box">';
            echo '<h3>Información Técnica</h3>';
            echo '<p><strong>Método utilizado:</strong> ' . $_SERVER['REQUEST_METHOD'] . '</p>';
            echo '<p><strong>Archivo procesador:</strong> ' . $_SERVER['PHP_SELF'] . '</p>';
            echo '<p>Los datos enviados por POST no son visibles en la URL del navegador.</p>';
            echo '</div>';
            
        } else {
            echo '<div class="info-box">';
            echo '<h3>Error: No se recibieron datos por POST</h3>';
            echo '<p>Esta página está diseñada para procesar datos enviados mediante el método POST.</p>';
            echo '<p>Por favor, utiliza el formulario de contacto para enviar información.</p>';
            echo '</div>';
        }
        ?>
        
        <div style="text-align: center; margin-top: 30px;">
            <a href="index.php?enviado=true" class="btn">Volver al Inicio</a>
            <a href="index.php?seccion=contacto" class="btn">Volver al Formulario</a>
        </div>
    </div>
</body>
</html>