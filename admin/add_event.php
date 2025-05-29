<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $date = $_POST["date"];
    $department = $_POST["department"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("INSERT INTO events (title, date, department, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $date, $department, $description);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Failed to add event.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event</title>
</head>
<body>

    <h2>Add New Event</h2>
    <form method="POST">
        Title: <input type="text" name="title" required><br>
        Date: <input type="date" name="date" required><br>
        Department: 
        <select name="department">
            <option value="CS">CS</option>
            <option value="SE">SE</option>
            <option value="IT">IT</option>
        </select><br>
        Description: <textarea name="description"></textarea><br>
        <input type="submit" value="Add Event">
    </form>

</body>
</html>
