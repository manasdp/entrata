<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "fashionfusion";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set charset (important)
mysqli_set_charset($con, "utf8mb4");
?>