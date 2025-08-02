<?php
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if you have a database password
$database = "main";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artifact Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-btn {
            background-color: green;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        header {
            background-color: #800080;
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

        .logout-btn:hover {
            background-color: darkgreen;
        }

        .logout-btn {
            position: absolute;
            top: 0;
            left: 95%;
            transform: translateX(-50%);
            background: blue;
            color: white;
            padding: 6px 10px;
            border: none;
            cursor: pointer;
        } 

        .container {
            margin: 20px auto;
            background: #D8BFD8;
            padding: 30px;
            border-radius: 8px;
            box-shadow: #9ACD32;
        }

        .table table-bordered table-striped {
            background: #D8BFD8;
        }

        footer {
            background-color: #800080;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 190px;
        }

        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary {
            background-color: #800080;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-info {
            background-color: #800080;
            border: none;
            color: white;
        }

        .btn-info:hover {
            background-color: #117a8b;
         
           transform: scale(1.05);
        }
        
        .btn-warning {
            background-color: #800080;
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #800080;
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            transform: scale(1.05);
        }




    </style>  
</head>
<body>

<header>
    <img src="logo7.png" alt="Museum Logo" class="logo">
    <h1>KBL MUSEUM</h1>
    <div class="content">
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>  
</header>

<div class="container mt-4">
    <h2 class="text-center mb-4">Artifact Management</h2>

    <!-- Add Artifact Button -->
    <a href="add_artifact.php" class="btn btn-primary mb-3">Add Artifact</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>

                <th>Object Code</th>
                <th>Object Name</th>
                <th>Date of Object</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM artifacts2 ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                       
                        <td>{$row['object_code']}</td>
                        <td>{$row['first_name']} </td>
                        <td>{$row['date_of_object']}</td>
                        <td><img src='uploads/{$row['image']}' width='70'></td>
                        <td>
                            <a href='view_artifact.php?id={$row['id']}' class='btn btn-info btn-sm'>View</a>
                            <a href='edit_artifact.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_artifact.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            <a href='read.php?id={$row['id']}' class='btn btn-info btn-sm'>
                            <img src='icon.jpg' alt='Maintenance' width='16' height='16'>
                            </a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No artifacts found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer>
    &copy; 2025 KBL Museum - All Rights Reserved
</footer>

</body>
</html>
