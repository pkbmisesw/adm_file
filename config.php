<?php

session_start(); // Digunakan untuk memulai session

date_default_timezone_set("Asia/Makassar");
//echo date("Y/m/d h:i:a");

$host = "localhost"; // nama host anda
$user = "root"; // usernames dari host anda
$pass = ""; //password dari host anda
$db   = "sic"; // nama database yang anda miliki

try {
    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}


?>
