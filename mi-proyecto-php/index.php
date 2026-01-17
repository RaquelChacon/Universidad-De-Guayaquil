<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institución Educativa</title>
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
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        nav {
            background-color: #3498db;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        
        nav a:hover {
            background-color: #2980b9;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border-left: 4px solid #3498db;
            background-color: #f9f9f9;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        button {
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #27ae60;
        }
        
        .message {
            padding: 15px;
            border-radius: 3px;
            margin: 20px 0;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Institución Educativa</h1>
            <p>Para Desarrolladores Web Del Ecuador</p>
        </header>
        
        <nav>
            <ul>
                <li><a href="index.php?seccion=inicio">Inicio</a></li>
                <li><a href="index.php?seccion=unidades">Unidades</a></li>
                <li><a href="index.php?seccion=acerca">Acerca de</a></li>
                <li><a href="index.php?seccion=contacto">Contacto</a></li>
            </ul>
        </nav>
        
        <main>
            <?php
            //  Método GET
            if (isset($_GET['seccion'])) {
                $seccion = htmlspecialchars($_GET['seccion']);
                echo '<div class="message info">';
                echo '<h2>Biembenido</h2>';
                echo '<p>Has seleccionado la sección: <strong>' . $seccion . '</strong></p>';
                
                echo '</div>';
                
                // Mostrar contenido según la sección
                echo '<div class="section">';
                switch ($seccion) {
                    case 'inicio':
                        echo '<h2>Bienvenido a la Página de Inicio</h2>';
                        echo '<p>Esta es la página principal de nuestra institución educativa.</p>';
                        break;
                    case 'unidades':
                        echo '<h2>Unidades Académicas</h2>';
                        echo '<p>Contenido sobre las diferentes unidades de estudio.</p>';
                        echo '<ul>';
                        echo '<li>Unidad 1: Introducción a PHP</li>';
                        echo '<li>Unidad 2: Métodos GET y POST</li>';
                        echo '<li>Unidad 3: Formularios en PHP</li>';
                        echo '</ul>';
                        break;
                    case 'acerca':
                        echo '<h2>Acerca de Nosotros</h2>';
                        echo '<p>Información sobre nuestra institución educativa.</p>';
                        break;
                    case 'contacto':
                        echo '<h2>Contacto</h2>';
                        echo '<p>Utiliza el formulario a continuación para contactarnos.</p>';
                        break;
                }
                echo '</div>';
            } else {
                echo '<div class="section">';
                echo '<h2>Bienvenido</h2>';
                echo '<p>Selecciona una sección del menú de navegación para comenzar.</p>';
                echo '<p>Observa cómo se envía el parámetro "seccion" mediante el método GET.</p>';
                echo '</div>';
            }
            ?>
            
            <!-- Parte B: Formulario con método POST -->
            <div class="section">
                <h2>Formulario de Contacto </h2>
                <p>Completa el formulario para enviarnos un mensaje:</p>
                
                <form action="procesar.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="asunto">Asunto:</label>
                        <input type="text" id="asunto" name="asunto" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit">Enviar Mensaje</button>
                </form>
            </div>
            
            <?php
            // Mostrar mensaje si se redirige desde procesar.php
            if (isset($_GET['enviado']) && $_GET['enviado'] == 'true') {
                echo '<div class="message success">';
                echo '<h3>¡Formulario enviado exitosamente!</h3>';
                echo '<p>Los datos han sido procesados correctamente.</p>';
                echo '<p><a href="index.php">Volver al inicio</a></p>';
                echo '</div>';
            }
            ?>
        </main>
        
        <footer style="margin-top: 30px; text-align: center; color: #7f8c8d; font-size: 14px;">
            <p>Institución Educativa &copy; 2026 - Desarrollo con PHP</p>
            <p>Autor: Raquel Virginia Chacon Ballen</p>
        </footer>
    </div>
</body>
</html>