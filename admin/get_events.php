<?php
include 'db.php';
$department = isset($_GET['department']) ? $_GET['department'] : '';
$query = "SELECT * FROM events";
if ($department) {
    $query .= " WHERE department='$department'";
}
$result = $conn->query($query);

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}
echo json_encode($events);
?>
