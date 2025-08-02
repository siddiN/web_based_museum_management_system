<?php
include 'app_db.php';

$appraisal_id = $_POST['appraisalId'];
$object_id = $_POST['objectId'];
$appraiser_name = $_POST['appraiserName'];
$appraisal_date = $_POST['appraisalDate'];
$reason = $_POST['reason'];
$description = $_POST['description'];

$sql = "UPDATE appraisals SET 
            object_id='$object_id', 
            appraiser_name='$appraiser_name', 
            appraisal_date='$appraisal_date', 
            reason='$reason', 
            description='$description' 
        WHERE appraisal_id=$appraisal_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location: view_appraisals.php'); // Redirect to the display page after update
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
