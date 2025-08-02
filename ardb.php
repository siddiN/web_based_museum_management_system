<?php
$servername = "localhost"; // Adjust if necessary
$username = "root"; // Change if using a different username
$password = ""; // Add password if required
$database = "main"; // Ensure this is correct

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
