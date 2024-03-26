<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
