<?php
if(isset($_FILES["file"])){
    $name = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    $destination = "../files/imagenes/$name";
    $upload = move_uploaded_file($file, $destination);

    if ($upload) {
        $res = array(
            "err" => false,
            "status" => http_response_code(200),
            "statusText" => "Archivo $name subido con éxito",
            "files" => $_FILES["file"]
        );

        // Llamar al script Python para la predicción
        $output = exec("image_processing.py $destination");
        // Manejar la salida del script Python según sea necesario
        // Por ejemplo, puedes mostrarla al usuario o guardarla en una base de datos
        echo $output;
    } else {
        $res = array(
            "err" => true,
            "status" => http_response_code(400),
            "statusText" => "Error al subir el archivo:  $name",
            "files" => $_FILES["file"]
        );
    }
    header('Content-Type: application/json');
    echo json_encode($res);
}
?>

