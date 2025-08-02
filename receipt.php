<?php
$booking_id = $_GET['booking_id'] ?? null;

if (!$booking_id) {
    die("Invalid booking ID.");
}

// Database connection
$conn = new mysqli("localhost", "root", "", "main");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking details
$sql = "SELECT * FROM bookings WHERE id = $booking_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();
} else {
    die("Booking not found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background:whitesmoke;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #f5f5f5;
        }
        .container {
            background: #800080;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            text-align: left;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .header .icon {
            font-size: 50px;
            color: #ffcc70;
        }
        .header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #f5f5f5;
            margin: 0;
        }
        .details {
            padding: 20px;
            border: 1px solid #444;
            border-radius: 8px;
            background: #2a2a2a;
            margin-bottom: 20px;
        }
        .details p {
            margin: 8px 0;
            font-size: 16px;
        }
        .details span {
            font-weight: bold;
            color: #ffcc70;
        }
        .footer {
            display: flex;
            justify-content: center;
        }
        .btn {
            padding: 12px 20px;
            background: linear-gradient(135deg, #ffcc70, #ffa45b);
            color: #1c1c1c;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background: linear-gradient(135deg, #ffa45b, #ffcc70);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fas fa-ticket-alt icon"></i>
            <h2>Booking Receipt</h2>
        </div>
        <div class="details">
            <p>Visitor Type: <span><?php echo $booking['visitor_type']; ?></span></p>
            <p>Number of Members: <span><?php echo $booking['members']; ?></span></p>
            <p>Date: <span><?php echo date('F j, Y', strtotime($booking['date'])); ?></span></p>
            <p>Time Slot: <span><?php echo $booking['time_slot']; ?></span></p>
            <p>Payment Status: <span><?php echo ucfirst($booking['payment_status']); ?></span></p>
        </div>
        <div class="footer">
            <button onclick="window.print()" class="btn">Download Receipt</button>
        </div>
    </div>
</body>
</html>
