<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Please login to donate.");
    }
    $user_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $rank = $_POST['rank'];

    if ($amount < 5 || $amount > 100) {
        die("Invalid donation amount.");
    }

    $stmt = $conn->prepare("INSERT INTO donations (user_id, amount, rank_given, payment_status) VALUES (?, ?, ?, 'Pending')");
    $stmt->bind_param("ids", $user_id, $amount, $rank);
    $stmt->execute();

    echo "Thank you for donating! Your rank will be applied soon.";
}
?>

<form method="post">
    Amount (€): <input type="number" name="amount" required><br>
    Rank:
    <select name="rank">
        <option value="VIP">VIP (€10)</option>
        <option value="MVP">MVP (€25)</option>
        <option value="LEGEND">LEGEND (€50)</option>
        <option value="TITAN">TITAN (€100)</option>
    </select>
    <button type="submit">Donate</button>
</form>
