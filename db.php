<?php
$hostname=todo-lista-server.mysql.database.azure.com;
$username=rzaztnvlxd;
$password='Alamakota123';
$ssl-mode=require;
$dbname = "todo";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
