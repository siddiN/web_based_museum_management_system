<?php
require 'visdb_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $contact = trim($_POST["contact"]);
    $password = trim($_POST["password"]);

    // Check for empty fields
    if (empty($name) || empty($contact) || empty($password)) {
        die("All fields are required.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare SQL Insert
    $sql = "INSERT INTO advisitors (name, contact, password, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $contact, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Visitor registered successfully!'); window.location='booking.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
