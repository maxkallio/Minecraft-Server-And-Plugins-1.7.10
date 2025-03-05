<?php
include 'database.php';

$result = $conn->query("SELECT username, total_donations FROM users ORDER BY total_donations DESC LIMIT 10");
?>

<h2>Top Donators</h2>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li><?= $row['username'] ?> - €<?= $row['total_donations'] ?></li>
<?php endwhile; ?>
</ul>
