<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);


// coge datos del create-qr.http (los datos de ese archivo)

$data = $input['data'];
$nombre_ref = $input['nombre_ref'];
$description = $input['description'];
$created_by = $input['created_by'];

$sql = "INSERT INTO qr_codes (data,nombre_ref, description, created_by) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);


// si eso se ejecuta validamente, me das un mensaje en array asociativo (=>) de codigo creado bien

if ($stmt->execute([$data, $nombre_ref, $description, $created_by])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Código QR creado exitosamente', 'estado'=> 'genial']);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Error al crear código QR']);
}
?>
