<?php
include 'database.php';

function logActivity($user_id, $action) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO activity_logs (user_id, action, timestamp) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $user_id, $action);
    $stmt->execute();
}
?>
