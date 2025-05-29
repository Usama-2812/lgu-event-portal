<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container mt-4">
    <h2>All Events</h2>
    <form method="get" class="mb-3">
        <select name="department" onchange="this.form.submit()">
            <option value="">All Departments</option>
            <option value="CS">CS</option>
            <option value="IT">IT</option>
            <option value="SE">SE</option>
        </select>
    </form>

    <?php
    $department = $_GET['department'] ?? null;
    $sql = "SELECT * FROM events";
    if ($department) {
        $sql .= " WHERE department = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$department]);
    } else {
        $stmt = $pdo->query($sql);
    }

    while ($event = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5><?= $event['title'] ?></h5>
                <p><strong>Department:</strong> <?= $event['department'] ?> | <strong>Date:</strong> <?= $event['date'] ?></p>
                <p><?= $event['description'] ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php include '../includes/footer.php'; ?>
