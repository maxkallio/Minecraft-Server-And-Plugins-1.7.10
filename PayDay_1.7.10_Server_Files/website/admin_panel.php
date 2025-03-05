<?php
include 'database.php';
session_start();

if ($_SESSION['user_id'] !== 1) {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donation_id = $_POST['donation_id'];
    $stmt = $conn->prepare("UPDATE donations SET payment_status = 'Completed' WHERE id = ?");
    $stmt->bind_param("i", $donation_id);
    $stmt->execute();
}
?>

<h2>Admin Panel</h2>

<h3>Pending Donations</h3>
<form method="post">
    Donation ID: <input type="number" name="donation_id" required>
    <button type="submit">Approve</button>
</form>
