<?php
include '../includes/db.php';

$id = $_GET["id"];
$query = "DELETE FROM events WHERE id=$id";

if ($conn->query($query)) {
    header("Location: dashboard.php");
} else {
    echo "Failed to delete event.";
}
?>
