<?php 
    session_start();
    $usuario = $_SESSION['username'];
    if(!isset($usuario)){
        header("Location: login.php");
    }
    $usuario = strtoupper($usuario);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector</title>
    <link rel="stylesheet" href="css/style_index.css">
</head> 
    <body>
        <header>
            <div class="logo">
                <img src="./files/logo morado.jpg" alt="logo">   
            </div>
            <h2 class="nombre-empresa">Detector de Tumores Cerebrales</h2>
            <nav>
                <a href="perfil.php" class="nav-link"> <?php echo $usuario?> </a>
                <a href="php/finalizar_sesion.php" class="nav-link">SALIR</a>
                    
            </nav>
        </header>
        <div class="caja">
            <main>
                <div class="dropZone">
                    <h2 class="p_interno">Arrastra y suelta la imágen</h2>
                </div>
                <div id= "preview"></div>
            </main>
        </div>
        
    
        <script src="./js/script_logged.js"></script>
    </body>
    </body>
</html>
