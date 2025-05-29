<?php
require_once '../includes/db.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $sql = "INSERT INTO events (title, date, department, description) VALUES (:title, :date, :department, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'title' => $data['title'],
        'date' => $data['date'],
        'department' => $data['department'],
        'description' => $data['description']
    ]);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
}
