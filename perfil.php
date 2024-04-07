<?php 
session_start();
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector</title>
    <link rel="stylesheet" href="css/stylen.css">
</head> 
    <body>
        <header>
            <div class="logo">
                <img src="./files/logo morado.jpg" alt="logo">   
            </div>
            <h2 class="nombre-empresa">Detector de Tumores Cerebrales</h2>
            <nav>
                <a href="index_logged.php"> INICIO</a> 
                <a href="php/finalizar_sesion.php" class="nav-link">SALIR</a> 
            </nav>
        </header>

        <h1>Perfil del usuario</h1><br>
        <h2><?php echo $usuario ?></h2>
        <h3>En construnccion...</h3>
        
    </body>
    </body>
</html>