<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector</title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head> 
    <body>
        <header>
            <div class="logo">
                <img src="./files/logo morado.jpg" alt="logo">   
            </div>
            <h2 class="nombre-empresa">Detector de Tumores Cerebrales</h2>
            <nav>
                <a href="index.php" class="nav-link">INICIO</a>
                <a href="nosotros.php" class="nav-link">NOSOTROS</a>    
            </nav>
        </header>
        <div class="caja-contenedor">
        <form class="caja-formulario" action="php/handeler_crear_usuario.php" method="post">
            <h2 class="titulo2">Crear cuenta</h2>
            <div class="entradas">
                <label for="campoUsuario">Usuario</label>
                <input type="tex" id="campoUsuario" name="campoUsuario" required>
            </div>
            <div class="entradas">
                <label for="campoContrasena">Contraseña</label>
                <input type="password" id="campoContrasena" name="campoContrasena" required>
            </div>
            <button type="submit">Crear</button>
            <div class="link-registro">
                <a href="login.php" class ="reg">Regresar</a>
            </div>
        </form>
    </div>
    </body>
</html>