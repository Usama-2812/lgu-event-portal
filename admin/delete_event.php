<?php
require_once '../includes/db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['status' => 'deleted']);
} else {
    echo json_encode(['status' => 'error']);
}
