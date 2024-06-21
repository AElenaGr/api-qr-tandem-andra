<?php
include "../config/database.php";
$sql = "SELECT * FROM users";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $qr_codes = $stmt->fetchAll();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['qr_codes' => $qr_codes]);
    ?>