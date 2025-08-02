<?php
include 'db1.php';

$object_id = $_GET['id'];

$sql = "DELETE FROM object_status WHERE object_id = $object_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: index.php'); // Redirect to the main page
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
