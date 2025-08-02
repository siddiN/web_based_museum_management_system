<?php
require('visdb_connect.php'); // Include database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare the DELETE query
    $sql = "DELETE FROM advisitors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='advissubmit.php';</script>";
    } else {
        echo "<script>alert('Error deleting record.'); window.location.href='advissubmit.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
