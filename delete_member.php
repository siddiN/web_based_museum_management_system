<?php
include 'db.php';

$member_id = $_GET['id'];

$sql = "DELETE FROM members WHERE member_id = $member_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: view_members.php'); // Redirect to the display page after deletion
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
