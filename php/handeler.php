<?php
session_start();
$usuario = $_POST["campoUsuario"];
$contrasena = $_POST["campoContrasena"];

$servidor = "localhost";
$usuario_servidor = "root";
$contra_servidor = "";
$bd = "prueba";

$conexion  = new mysqli($servidor,$usuario_servidor,$contra_servidor, $bd);

if ($conexion->connect_error) {
    die("Conexión Fallida: " . $conexion->connect_error);
}

$consulta = "SELECT id_usuario, nombre, contrasena FROM usuarios WHERE BINARY nombre = '". $usuario ."'AND contrasena = '$contrasena'";

$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {

  while($fila = $resultado->fetch_assoc()) {
    $_SESSION ['username'] = $usuario;
    header("Location: ../index_logged.php");//Enviar a pagina con sesion iniciada
    exit;
  }
} else {
  
  header("Location: ../login.php?error=1");//regresar a login, error=1 significa error
    exit;
}
$conexion ->close();
