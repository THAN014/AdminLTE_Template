<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$host = "localhost";
$db_username = "root";
$password = "";
$database_name = "014_1st_database-1-it";

$con = mysqli_connect($host, $db_username, $password, $database_name);

//check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
