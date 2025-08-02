<?php
include 'db1.php';

$sql = "SELECT * FROM object_status";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Status</title>
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
            margin: 50px auto;
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
            background-color: #556B2F;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Object Status</h2>
        <table>
            <thead>
                <tr>
                    <th>Object ID</th>
                    <th>Status ID</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['object_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_created']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_modified']) . "</td>";
                        echo "<td>
                                <a class='btn' href='delete.php?id=" . $row['object_id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>No records found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
