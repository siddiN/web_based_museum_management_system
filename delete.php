<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is safe for query

    // Delete query
    $sql = "DELETE FROM hist WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
