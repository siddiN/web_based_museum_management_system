<?php
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if you have a database password
$database = "main";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $artifact_id = $_GET['id'];

    // Fetch artifact to delete image
    $sql = "SELECT image FROM artifacts2 WHERE id = $artifact_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    // Delete image from folder
    if (!empty($row['image'])) {
        $image_path = "uploads/" . $row['image'];
        if (file_exists($image_path)) {
            unlink($image_path); // Delete image file
        }
    }

    // Delete record from database
    $sql = "DELETE FROM artifacts2 WHERE id = $artifact_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Artifact deleted successfully!'); window.location.href='adartifacts.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='adartifacts.php';</script>";
}
?>
