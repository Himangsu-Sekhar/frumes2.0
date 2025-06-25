<?php 
$del_id = $_GET['id'];


include __DIR__ .'/databasecon.php';

$delsql = "DELETE FROM `brands` WHERE b_id = {$del_id}";
$delres = mysqli_query($con, $delsql);

header("Location: http://{$hostname}/GPT/dashboard/mng-clients.php");


?>