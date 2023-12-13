<?php

$server = "localhost";
$username = "root";
$password = 'C?E@K$h6wsiK(y7';
$database_name ="crudifix";

$kon = mysqli_connect($server, $username, $password, $database_name);
if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>