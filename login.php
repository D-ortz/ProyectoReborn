<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <form class="caja-formulario" action="php/handeler.php" method="post">
            <h2 class="titulo2">Acceder a mi cuenta</h2>
            <div class="entradas <?php if(isset($_GET['error']) && $_GET['error'] == 1) echo 'error'; ?>">
                <label for="campoUsuario">Usuario</label>
                <input type="text" id="campoUsuario" name="campoUsuario" required>
            </div>
            <div class="entradas <?php if(isset($_GET['error']) && $_GET['error'] == 1) echo 'error'; ?>">
                <label for="campoContrasena">Contraseña</label>
                <input type="password" id="campoContrasena" name="campoContrasena" required>
            </div>
            <div id="mensaje-error">
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "Usuario o contraseña incorrectos";
                }
                ?>
            </div>
            <button type="submit">Acceder</button>
            <div class="link-registro">
                ¿No tienes una cuenta? <a href="crear_usuario.php" class ="reg">Regístrate</a>
            </div>
        </form>
    </div>
</body>
</html>

