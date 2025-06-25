<?php
session_start(); // Make sure session is started to access $_SESSION variables

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid order ID.");
}

$order_id = (int) $_GET['id'];

include __DIR__ . '/databasecon.php';

$username = mysqli_real_escape_string($con, $_SESSION['username'] ?? 'unknown');

$updtsql = "UPDATE `orders`
            SET `status` = 'Completed',
                `Completed_By` = '$username'
            WHERE `Order_id` = $order_id";

$updtquery = mysqli_query($con, $updtsql);

if (!$updtquery) {
    die("Update failed: " . mysqli_error($con));
}

header("Location: http://localhost/GPT/dashboard/orders.php");
exit;
?>
