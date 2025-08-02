<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "main");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update payment status
    $sql = "UPDATE bookings SET payment_status = 'Paid' WHERE id = $booking_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: receipt.php?booking_id=" . $booking_id);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
