<?php
include __DIR__.'/databasecon.php';

session_start();

session_unset();

session_destroy();

header("Location: http://{$hostname}/GPT/admin.php");
exit();


?>