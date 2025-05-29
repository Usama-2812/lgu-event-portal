<?php
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGU Event Management</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/scripts.js" defer></script>
</head>
<body>

    <h2>Upcoming Events</h2>
        
    <label for="deptFilter">Filter by Department:</label>
    <select id="deptFilter" onchange="filterEvents()">
        <option value="" <?php echo (!isset($_GET['department']) || $_GET['department'] == '') ? 'selected' : ''; ?>>All</option>
        <option value="CS" <?php echo (isset($_GET['department']) && $_GET['department'] == 'CS') ? 'selected' : ''; ?>>CS</option>
        <option value="SE" <?php echo (isset($_GET['department']) && $_GET['department'] == 'SE') ? 'selected' : ''; ?>>SE</option>
        <option value="IT" <?php echo (isset($_GET['department']) && $_GET['department'] == 'IT') ? 'selected' : ''; ?>>IT</option>
    </select>


    <div id="eventList">
        <?php
        $department = isset($_GET['department']) ? $_GET['department'] : '';

        $query = "SELECT * FROM events";
        if ($department) {
            $query .= " WHERE department='$department'";
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>" . $row['title'] . "</strong> (" . $row['date'] . ") - " . $row['department'] . "<br>" . $row['description'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No events found.</p>";
        }
        ?>
    </div>

</body>
</html>
