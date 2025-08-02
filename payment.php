<?php
session_start();
if (!isset($_SESSION['visitor_type']) || !isset($_SESSION['num_members']) || !isset($_POST['selected_slot'])) {
    header("Location: booking.php");
    exit();
}

$visitorType = $_SESSION['visitor_type'];
$numMembers = $_SESSION['num_members'];
$selectedSlot = $_POST['selected_slot'];
$date = $_POST['selected_date'];
$amountPerPerson = 150;
$totalAmount = $numMembers * $amountPerPerson;

$conn = new mysqli("localhost", "root", "", "con");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
///further date

$query = $conn->prepare("INSERT INTO bookings (visitor_type, num_members, slot, date) VALUES (?, ?, ?, ?)");
$query->bind_param("siss", $visitorType, $numMembers, $selectedSlot, $date);
$query->execute();
$query->close();
$conn->close();
?>

<!DOCTYPE html>
<html>,
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="pstyle.css">
</head>
<body>
<div class="container mt-5">
    <h2>Payment </h2>
    <p>Visitor Type: <?= $visitorType ?></p>
    <p>Number of Members: <?= $numMembers ?></p>
    <p>Selected Slot: <?= $selectedSlot ?></p>
    <p>Total Amount: ₹<?= $totalAmount ?></p>
    <p>Booking Successful!</p>
   
    <a href="g.jpg" class="btn btn-primary">Pay Now</a>
</div>

</body>
</html>
