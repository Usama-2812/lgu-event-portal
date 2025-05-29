<?php
require_once '../includes/db.php';

parse_str(file_get_contents("php://input"), $data);
$id = $_GET['id'] ?? null;

if ($id && $data) {
    $sql = "UPDATE events SET title = :title, date = :date, department = :department, description = :description WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'title' => $data['title'],
        'date' => $data['date'],
        'department' => $data['department'],
        'description' => $data['description'],
        'id' => $id
    ]);
    echo json_encode(['status' => 'updated']);
} else {
    echo json_encode(['status' => 'error']);
}
