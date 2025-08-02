<?php
include 'db.php';

$object_id = $_POST['objectId'];
$member_name = $_POST['memberName'];
$date = $_POST['date'];

$sql = "INSERT INTO members (object_id, member_name, date) VALUES ('$object_id', '$member_name', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: view_members.php'); // Redirect to the display page after insertion
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
