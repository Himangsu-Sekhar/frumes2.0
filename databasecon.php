<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "frumes";



$con = mysqli_connect($hostname, $username, $password, $database);

if(!$con){
    die("error".mysqli_connect_error());
}
?>