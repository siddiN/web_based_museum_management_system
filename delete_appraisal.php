<?php
include 'db.php';

$appraisal_id = $_GET['id'];

$sql = "DELETE FROM appraisals WHERE appraisal_id = $appraisal_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: view_appraisals.php'); // Redirect to the display page after deletion
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
