<?php
require_once '../includes/db.php';

$department = isset($_GET['department']) ? $_GET['department'] : null;

$sql = "SELECT * FROM events";
if ($department) {
    $sql .= " WHERE department = :department";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['department' => $department]);
} else {
    $stmt = $pdo->query($sql);
}
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($events);
