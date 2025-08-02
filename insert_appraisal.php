<?php
include 'app_db.php';

$object_id = $_POST['objectId'];
$appraiser_name = $_POST['appraiserName'];
$appraisal_date = $_POST['appraisalDate'];
$reason = $_POST['reason'];
$description = $_POST['description'];

$sql = "INSERT INTO appraisals (object_id, appraiser_name, appraisal_date, reason, description) VALUES ('$object_id', '$appraiser_name', '$appraisal_date', '$reason', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: view_appraisals.php'); // Redirect to the display page after insertion
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
