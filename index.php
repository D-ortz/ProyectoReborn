<?php 
       session_start();
       if(isset($_SESSION['username'])){
        session_destroy();
        header("Location: index.php");
    }
       
?>
<!DOCTYPE html>
<html lang="es">
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
                <a href="login.php" class="nav-link">LOGIN</a>
                <a href="nosotros.php" class="nav-link">NOSOTROS</a>
                    
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
        
    
        <script src="./js/script.js"></script>
    </body>
    </body>
</html>