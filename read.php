<?php 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from 'hist' table
$sql = "SELECT id, object_id, Maintenance_Date, Maintenance_Type, Status_, Maintenance_Details FROM hist";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance History of Museum Artifacts</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:whitesmoke;
            margin: 0;
            padding: 0;
            color:black;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            background: #D8BFD8;
            padding: 20px;
            border-radius: 8px;
            box-shadow: #9ACD32;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color:black;
            color: #f9f9f9;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #d3d3d3;;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            background-color:#800080;
            border-radius: 4px;
            margin-right: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color:#800080;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }

        header {
            background-color:#800080;
            color: white;
            padding: 10px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo {
            width: 70px;
            height: auto;
            position: absolute;
            left: 10px;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 1px;
            background-color:blue;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            display: block;
        }
    </style>
</head>
<body>

<header>
        <img src="logo7.png" alt="Museum Logo" class="logo">
        <h1>KBL MUSEUM</h1>
</header>
    <div class="container">
        <!-- Add Maintenance history Button -->
    <a href="form.php" class="btn btn-primary mb-3">Add Maintenance History</a>

        <h2>Maintenance History of Museum Artifacts</h2>
        <table>
            <thead>
                <tr>
                    <th>Object Name</th>
                    <th>Maintenance Date</th>
                    <th>Maintenance Type</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['object_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Maintenance_Date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Maintenance_Type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Status_']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Maintenance_Details']) . "</td>";
                        echo "<td>
                                <a class='btn' href='update.php?id=" . $row['id'] . "'>Update</a>
                                <a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>No records found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 Museum Management System. All rights reserved.</p>
    </footer>
</body>
</html>
