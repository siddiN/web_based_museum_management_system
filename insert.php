<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Add your MySQL password here if required
$dbname = "main";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$artifactname = isset($_POST['artifact_name']) ? $_POST['artifact_name'] : '';
$maintenanceDate = isset($_POST['maintenanceDate']) ? $_POST['maintenanceDate'] : '';
$maintenanceType = isset($_POST['maintenanceType']) ? $_POST['maintenanceType'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$details = isset($_POST['details']) ? $_POST['details'] : '';

// SQL to insert the maintenance record
$sql = "INSERT INTO hist (Artifact_Name, Maintenance_Date, Maintenance_Type, Status_, Maintenance_Details)
        VALUES ('$artifactname', '$maintenanceDate', '$maintenanceType', '$status', '$details')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
