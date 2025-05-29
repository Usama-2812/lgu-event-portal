<?php
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h2>Admin Dashboard - Manage Events</h2>
    
    <a href="add_event.php">➕ Add New Event</a>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Department</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php
        $query = "SELECT * FROM events";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='edit_event.php?id={$row['id']}'>✏ Edit</a> | 
                        <a href='delete_event.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>❌ Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>
