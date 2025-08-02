<?php
$conn = new mysqli("localhost", "root", "", "main");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
