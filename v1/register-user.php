<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

// Verificar si los datos están presentes
if (isset($input['nombre'], $input['departamento'], $input['email'], $input['password'])) {
    $nombre = $input['nombre'];
    $departamento = $input['departamento'];
    $email = $input['email'];
    $password = password_hash($input['password'], PASSWORD_DEFAULT);

    // Verificar que los datos no estén vacíos
    if (!empty($nombre) && !empty($departamento) && !empty($email) && !empty($input['password'])) {
        $sql = "INSERT INTO users (nombre, departamento, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$nombre, $departamento, $email, $password])) {
            echo json_encode(['message' => "$nombre registrado exitosamente"]);
        } else {
            echo json_encode(['message' => "Error al registrar $nombre"]);
        }
    } else {
        echo json_encode(['message' => "Todos los campos son obligatorios."]);
    }
} else {
    echo json_encode(['message' => "Faltan datos en la solicitud."]);
}
?>
