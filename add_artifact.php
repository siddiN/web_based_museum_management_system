<?php
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if you have a database password
$database = "main";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $object_code = mysqli_real_escape_string($conn, $_POST['object_code']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    
    $date_of_object = mysqli_real_escape_string($conn, $_POST['date_of_object']);
    $technical_description = mysqli_real_escape_string($conn, $_POST['technical_description']);
    
   
  
    $object_size = mysqli_real_escape_string($conn, $_POST['object_size']);
    $label_description = mysqli_real_escape_string($conn, $_POST['label_description']);
    $image_size = mysqli_real_escape_string($conn, $_POST['image_size']);
    $container_type = mysqli_real_escape_string($conn, $_POST['container_type']);

    

    // Image Upload Handling
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create the folder if it doesn't exist
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
    

    $sql = "INSERT INTO artifacts2 (object_code, first_name, date_of_object, technical_description, object_size, label_description, image_size,image, container_type) 
        VALUES ( '$object_code','$first_name',  '$date_of_object', '$technical_description','$object_size', '$label_description', '$image_size', '$image_name', '$container_type')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Artifact added successfully!'); window.location.href='adartifacts.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Artifact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Add New Artifact</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            

            <label>Object Code:</label>
            <input type="text" name="object_code" class="form-control" required>

            <label>First Name:</label>
            <input type="text" name="first_name" class="form-control" required>

            

            

            <label>Date of Object:</label>
            <input type="date" name="date_of_object" class="form-control" required>

            <label>Technical Description:</label>
            <textarea name="technical_description" class="form-control" required></textarea>

           

           
            

            <label>Object Size:</label>
            <input type="text" name="object_size" class="form-control" required>

            <label>Label Description:</label>
            <textarea name="label_description" class="form-control" required></textarea>

            <label>Image Size:</label>
            <input type="text" name="image_size" class="form-control" required>

            <label>Image:</label>
            <input type="file" name="image" class="form-control" required>

            <label>Container Type:</label>
            <select name="container_type" class="form-control">
                <option>Frame</option>
                <option>Glass Tool</option>
                <option>Wooden Box</option>
                <option>Metal Box</option>
                <option>Paper or Docs</option>
                <option>Plastic Folder</option>
            </select>

           

            <button type="submit" class="btn btn-success mt-3">Save Artifact</button>
        </form>
    </div>
</body>
</html>
