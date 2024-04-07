<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la imagen de la solicitud POST
    $imageData = file_get_contents('php://input');

    // Guardar la imagen en un archivo temporal (opcional)
    $imagePath = '/ruta/a/tu/proyecto/temp/image.jpg';
    file_put_contents($imagePath, $imageData);

    // Llamar a tu función de Python para procesar la imagen y obtener las predicciones
    $pythonScriptPath = '/ruta/a/tu/proyecto/predict.py';
    $prediction = shell_exec("python3 $pythonScriptPath $imagePath");

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode(['prediction' => $prediction]);
} else {
    // Si no es una solicitud POST, devolver un error
    http_response_code(405); // Método no permitido
    echo json_encode(['error' => 'Método no permitido']);
}
?>
