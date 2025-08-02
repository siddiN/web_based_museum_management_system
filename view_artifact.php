<?php
require 'db_connect.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='adartifacts.php';</script>";
    exit();
}

$artifact_id = intval($_GET['id']); // Sanitize ID

$sql = "SELECT * FROM artifacts2 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $artifact_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Artifact not found!'); window.location.href='adartifacts.php';</script>";
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Artifact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .btn-primary {
            background-color:#800080;
            border: none;
            color: white;
        }
    </style>    
</head>


<body>
    <div class="container mt-4">
        <h2>View Artifact</h2>
        <a href="adartifacts.php" class="btn btn-secondary mb-3">Back to List</a>
        <a href="edit_artifact.php?id=<?php echo $artifact_id; ?>" class="btn btn-primary mb-3">Edit Artifact</a>

        <div class="card">
            <div class="card-body">
                <p><strong>Object Code:</strong> <?php echo htmlspecialchars($row['object_code']); ?></p>
                <p><strong>Object Name:</strong> <?php echo htmlspecialchars($row['first_name']); ?></p>
               
                <p><strong>Date of Object:</strong> <?php echo htmlspecialchars($row['date_of_object']); ?></p>
                <p><strong>Technical Description:</strong> <?php echo htmlspecialchars($row['technical_description']); ?></p>
         
               
      
                <p><strong>Object Size:</strong> <?php echo htmlspecialchars($row['object_size']); ?></p>
                <p><strong>Label Description:</strong> <?php echo htmlspecialchars($row['label_description']); ?></p>
                <p><strong>Image Size:</strong> <?php echo htmlspecialchars($row['image_size']); ?></p>
                <p><strong>Container Type:</strong> <?php echo htmlspecialchars($row['container_type']); ?></p>
                
                
                <p><strong>Image:</strong></p>
                <?php if (!empty($row['image']) && file_exists("uploads/" . $row['image'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" width="300">
                <?php else: ?>
                    <p>No image available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
