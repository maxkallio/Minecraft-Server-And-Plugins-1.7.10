<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO forum_posts (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM forum_posts ORDER BY created_at DESC");
?>

<h2>Community Forum</h2>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Message: <textarea name="message" required></textarea><br>
    <button type="submit">Post</button>
</form>

<h3>Latest Posts:</h3>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li><b><?= $row['username'] ?></b>: <?= $row['message'] ?></li>
<?php endwhile; ?>
</ul>
