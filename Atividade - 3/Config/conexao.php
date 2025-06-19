<?php

// Conexão com o banco de dados usando MySQLi e orientação a objetos.
$host = "localhost";
$dbname = "db_sistema";
$username = "root";
$password = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
