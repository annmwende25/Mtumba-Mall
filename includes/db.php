<?php

$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$database = "mtumba_mall";

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>