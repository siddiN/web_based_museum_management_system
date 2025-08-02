<?php
include 'db1.php';

$status_id = $_POST['status_id'];

$sql = "INSERT INTO object_status (status_id,date_created, date_modified) VALUES ('$status_id',NOW(), NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
