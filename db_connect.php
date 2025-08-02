<?php
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if you have a database password
$database = "main";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting

try {
    $conn = new mysqli($servername, $username, $password, $database);
    $conn->set_charset("utf8mb4"); // Set character encoding
} catch (mysqli_sql_exception $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
