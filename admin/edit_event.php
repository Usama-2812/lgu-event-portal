<?php
include '../includes/db.php';

$id = $_GET["id"];
$query = "SELECT * FROM events WHERE id=$id";
$result = $conn->query($query);
$event = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $date = $_POST["date"];
    $department = $_POST["department"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("UPDATE events SET title=?, date=?, department=?, description=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $date, $department, $description, $id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Failed to update event.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
</head>
<body>

    <h2>Edit Event</h2>
    <form method="POST">
        Title: <input type="text" name="title" value="<?= $event['title'] ?>" required><br>
        Date: <input type="date" name="date" value="<?= $event['date'] ?>" required><br>
        Department: 
        <select name="department">
            <option value="CS" <?= ($event['department'] == 'CS') ? 'selected' : '' ?>>CS</option>
            <option value="SE" <?= ($event['department'] == 'SE') ? 'selected' : '' ?>>SE</option>
            <option value="IT" <?= ($event['department'] == 'IT') ? 'selected' : '' ?>>IT</option>
        </select><br>
        Description: <textarea name="description"><?= $event['description'] ?></textarea><br>
        <input type="submit" value="Update Event">
    </form>

</body>
</html>
