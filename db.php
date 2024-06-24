<?php
$hostname=to-do-list-filip-kuba-server.mysql.database.azure.com
$username=pytqhbqrtu
$password=Alamakota123
$dbname = "todo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
