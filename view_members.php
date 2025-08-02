<?php
include 'db.php';

$sql = "SELECT * FROM members";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            color: black;
        }
        .container {
            width: 90%;
            margin: 100px auto 50px; /* Adjusted margin to account for header */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            background-color: #556B2F;
            border-radius: 4px;
            margin-right: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #c82333;
        }
        .btn-danger:hover {
            background-color: #a71d2a;
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
        <h2>View Members Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>Object ID</th>
                    <th>Member Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['member_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['object_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['member_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>
                                <a class='btn' href='update_member_form.php?id=" . $row['member_id'] . "'>Update</a>
                                <a class='btn btn-danger' href='delete_member.php?id=" . $row['member_id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No records found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="main_page.php" class="btn">Back to Main Page</a>
    </div>

    <footer>
        <p>&copy; 2025 KBL Museum. All rights reserved.</p>
    </footer>
</body>
</html>
