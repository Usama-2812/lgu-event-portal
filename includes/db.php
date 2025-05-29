<?php
$host = "localhost";
$user = "root"; // Change this if using a different MySQL user
$pass = "";
$dbname = "lgu_event_portal";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
