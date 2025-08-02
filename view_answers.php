<?php
include 'db.php';

$sql = "SELECT * FROM answers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Answers Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            color: black;
        }
        /* Header Navigation */
        header {
            background-color: #800080;
            color: white;
            padding: 15px;
            width: 100%; /* Ensure the header spans the full width */
            display: flex;
            align-items: center; /* Vertically center items */
            position: fixed; /* Fix the header at the top */
            top: 0; /* Position at the top */
            z-index: 1000; /* Ensure it stays above other content */
        }

        /* Logo in the header */
        header .logo {
            height: 50px; /* Adjust the height of the logo */
            margin-left: 20px; /* Add some spacing from the left edge */
        }

        /* Header text centered */
        header h1 {
            flex-grow: 1;
            text-align: center;
            margin: 0;
            font-size: 24px;
        }

        header nav {
            display: none; /* Hide navigation if not needed */
        }

        .container {
            width: 90%;
            margin: 100px auto 50px; /* Adjusted margin to account for header */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Ensures table fits within the container */
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
            background-color: black;
            color: #f9f9f9;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #d3d3d3;
        }
        /* Button */
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #556B2F;
            border-radius: 4px;
            margin: 10px auto;
            display: block;
            text-align: center;
            max-width: 200px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        /* Footer */
        footer {
            background-color: #800080;
            color: white;
            text-align: center;
            padding: 15px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1>KBL MUSEUM</h1>
    </header>

    <div class="container">
        <h2>View Answers Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Object ID</th>
                    <th>Visitor ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['object_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['visitor_id']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No records found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="#" class="btn">Back to Admin Dashboard</a>
    </div>

    <footer>
        <p>&copy; 2025 KBL Museum. All rights reserved.</p>
    </footer>
</body>
</html>
