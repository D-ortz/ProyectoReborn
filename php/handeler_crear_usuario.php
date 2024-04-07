<?php
 //Captar datos de formulario
$usuario = $_POST["campoUsuario"];
$contrasena = $_POST["campoContrasena"];

header("Location: ../login.php");//Regresar a login

$servidor = "localhost";
$usuario_servidor = "root";
$contra_servidor = "";
$bd = "prueba";

$conexion  = new mysqli($servidor,$usuario_servidor,$contra_servidor, $bd);

if ($conexion->connect_error) {
    die("Conexión Fallida: " . $conexion->connect_error);
}
// echo "Conexión satisfactoria\n";

$consulta = "INSERT INTO usuarios (nombre, contrasena)
VALUES ('".$usuario ."','".$contrasena ."')";

if ($conexion->query($consulta) === TRUE) {
    $ultimo_id = $conexion -> insert_id;
  echo "Se ha agregado satisfactoriamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conexion ->close();
exit;
?>