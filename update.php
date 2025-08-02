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

// Get the record ID to update
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id == 0) {
    die("Invalid request.");
}

// Fetch current record data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM hist WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Record not found.");
    }
    $row = $result->fetch_assoc();
}

// Update record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artifact_name = $_POST['artifact_name'];
    $maintenance_date = $_POST['maintenance_date'];
    $maintenance_type = $_POST['maintenance_type'];
    $status = $_POST['status'];
    $details = $_POST['details'];

    $sql = "UPDATE hist SET Artifact_Name = ?, Maintenance_Date = ?, Maintenance_Type = ?, Status_ = ?, Maintenance_Details = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $artifact_name, $maintenance_date, $maintenance_type, $status, $details, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully'); window.location.href='read.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Maintenance History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Maintenance History</h2>
        <form method="POST" action="">
            <label for="artifact_name">Artifact Name:</label>
            <input type="text" name="artifact_name" id="artifact_name" value="<?php echo htmlspecialchars($row['Artifact_Name']); ?>" required>

            <label for="maintenance_date">Maintenance Date:</label>
            <input type="date" name="maintenance_date" id="maintenance_date" value="<?php echo htmlspecialchars($row['Maintenance_Date']); ?>" required>

            <label for="maintenance_type">Maintenance Type:</label>
            <select name="maintenance_type" id="maintenance_type" required>
                <option value="Cleaning" <?php echo ($row['Maintenance_Type'] == 'Cleaning') ? 'selected' : ''; ?>>Cleaning</option>
                <option value="Repair" <?php echo ($row['Maintenance_Type'] == 'Repair') ? 'selected' : ''; ?>>Repair</option>
                <option value="Polishing" <?php echo ($row['Maintenance_Type'] == 'Polishing') ? 'selected' : ''; ?>>Polishing</option>
            </select>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="Pending" <?php echo ($row['Status_'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo ($row['Status_'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                <option value="Completed" <?php echo ($row['Status_'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>

            <label for="details">Maintenance Details:</label>
            <textarea name="details" id="details" rows="4"><?php echo htmlspecialchars($row['Maintenance_Details']); ?></textarea>

            <button type="submit">Update Record</button>
        </form>
    </div>
</body>
</html>
