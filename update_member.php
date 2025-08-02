<?php
include 'db.php';

$member_id = $_POST['memberId'];
$object_id = $_POST['objectId'];
$member_name = $_POST['memberName'];
$date = $_POST['date'];

$sql = "UPDATE members SET 
            object_id='$object_id', 
            member_name='$member_name', 
            date='$date' 
        WHERE member_id=$member_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location: view_members.php'); // Redirect to the display page after update
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
