<?php
$del_id = (int)$_GET['id'];
include __DIR__ . '/databasecon.php';

// Check if any orders are using this service
$check_query = "SELECT COUNT(*) as total FROM orders WHERE service_id = $del_id";
$check_result = mysqli_query($con, $check_query);
$check_row = mysqli_fetch_assoc($check_result);

if ($check_row['total'] > 0) {
    // Redirect back with an error message
    header("Location: http://localhost/GPT/dashboard/manage.php?error=linked");
    exit();
}

// Safe to delete
$delsql = "DELETE FROM `services` WHERE s_id = $del_id";
$delres = mysqli_query($con, $delsql);

header("Location: http://localhost/GPT/dashboard/manage.php?deleted=success");
exit();
?>
