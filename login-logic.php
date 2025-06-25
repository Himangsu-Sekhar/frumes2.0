<?php
include __DIR__.'/databasecon.php';
session_start();

if(!isset($_SESSION["username"])){
    header("Location: http://{$hostname}/GPT/admin.php");
    exit();
}


?>