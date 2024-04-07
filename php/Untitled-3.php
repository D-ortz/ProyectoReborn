<?php
if(isset($_FILES["file"])) {
    // Nombre y ruta del archivo de imagen
    $name = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    $destination = "../files/imagenes/$name";
    $upload = move_uploaded_file($file, $destination);

    if ($upload) {
        // Llamar al script de Python para preprocesar la imagen y realizar la predicción
        $python_script = "python3 image_processing.py " . escapeshellarg($destination);
        $output = shell_exec($python_script);
        // Manejar la salida del script de Python como desees
        echo $output;
    } else {
        $res = array(
            "err" => true,
            "status" => http_response_code(400),
            "statusText" => "Error al subir el archivo:  $name",
            "files" => $_FILES["file"]
        );
        header('Content-Type: application/json');
        echo json_encode($res);
    }
}
?>
