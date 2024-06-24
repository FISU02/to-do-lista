<?php
$servername="todo-lista-server.mysql.database.azure.com";
$username="rzaztnvlxd@todo-lista-server";
$password="Alamakota123";
$dbname = "todo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
