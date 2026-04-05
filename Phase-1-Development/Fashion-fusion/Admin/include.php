<?php
$host = "mysql_db";
$user = "root";
$pass = "root";
$db   = "fashionfusion";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// ✅ Set charset (IMPORTANT)
mysqli_set_charset($con, "utf8mb4");
?>