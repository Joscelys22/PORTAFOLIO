<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bioderma";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>