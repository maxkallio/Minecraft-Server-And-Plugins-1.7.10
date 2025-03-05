<?php
include 'database.php';
session_start();

if ($_SESSION['user_id'] !== 1) {
    die("Access Denied");
}

$result = $conn->query("SELECT * FROM activity_logs ORDER BY timestamp DESC");
?>

<h2>Server Logs</h2>
<table border="1">
<tr><th>User</th><th>Action</th><th>Time</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['user_id'] ?></td>
        <td><?= $row['action'] ?></td>
        <td><?= $row['timestamp'] ?></td>
    </tr>
<?php endwhile; ?>
</table>
