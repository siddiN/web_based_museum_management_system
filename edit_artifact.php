<?php
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if you have a database password
$database = "main";

include 'db_connect.php'; // Include your database connection

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $artifact_id = $_GET['id'];

    $sql = "SELECT * FROM artifacts2 WHERE id = $artifact_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Artifact not found!'); window.location.href='adartifacts.php';</script>";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $object_code = $_POST['object_code'];
    $first_name = $_POST['first_name'];
    $date_of_object = $_POST['date_of_object'];
    $technical_description = $_POST['technical_description'];
    $object_size = $_POST['object_size'];
    $label_description = $_POST['label_description'];
    $image_size = $_POST['image_size'];
    $image_name = $_FILES['image']['name'];
    $container_type = $_POST['container_type'];
   

    // Handle image upload if new image is selected
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "UPDATE artifacts2 SET  first_name='$first_name',object_code='$object_code', date_of_object='$date_of_object', technical_description='$technical_description', object_size='$object_size', label_description='$label_description', image_size='$image_size', image='$image_name', container_type='$container_type' WHERE id = $artifact_id";
    } else {
        $sql = "UPDATE artifacts2 SET  first_name='$first_name', object_code='$object_code', date_of_object='$date_of_object', technical_description='$technical_description', object_size='$object_size', label_description='$label_description', image_size='$image_size',image='$image_name', container_type='$container_type' WHERE id = $artifact_id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Artifact updated successfully!'); window.location.href='adartifacts.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artifact_id = $_POST['id']; // Get the artifact ID from hidden input field

    // Retrieve form data
    $first_name = $_POST['first_name'];
    $object_code = $_POST['object_code'];
  
    $date_of_object = $_POST['date_of_object'];
    $technical_description = $_POST['technical_description'];
   
    $object_size = $_POST['object_size'];
    $label_description = $_POST['label_description'];
    $image_size = $_POST['image_size'];
    $image_name = $_FILES["image"]["name"];
    $container_type = $_POST['container_type'];
   

    // Prepare and execute the update query
    $sql = "UPDATE artifacts2 SET 
        
        first_name = ?, 
        object_code = ?,
         
        date_of_object = ?, 
        technical_description = ?, 
        object_size = ?, 
        label_description = ?, 
        image_size = ?, 
        image = ?, 
        container_type = ?, 
    WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssssssssssssi", 
        $first_name,$object_code, $date_of_object, $technical_description, $object_size, $label_description, $image_size, $image_name,$container_type
    );

    if ($stmt->execute()) {
        echo "<script>alert('Artifact updated successfully!'); window.location.href='adartifacts.php';</script>";
    } else {
        echo "<script>alert('Error updating artifact!'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Artifact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Artifact</h2>
        <a href="adartifacts.php" class="btn btn-secondary mb-3">Back to List</a>
        
        <form action="" method="POST" enctype="multipart/form-data">
            
            <label>Object Code:</label>
            <input type="text" name="object_code" value="<?php echo $row['object_code']; ?>" class="form-control" required>

            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" required>

            <label>date_of_object:</label>
            <input type="text" name="date_of_object" value="<?php echo $row['date_of_object']; ?>" class="form-control" required>

            <label>Technical description:</label>
            <input type="text" name="technical_description" value="<?php echo $row['technical_description']; ?>" class="form-control" required>

            <label>Object_size:</label>
            <input type="text" name="object_size" value="<?php echo $row['object_size']; ?>" class="form-control" required>

            <label>Label_description:</label>
            <input type="text" name="label_description" value="<?php echo $row['label_description']; ?>" class="form-control" required>
            <label>Image_Size:</label>
            <input type="text" name="image_size" value="<?php echo $row['image_size']; ?>" class="form-control" required>
            <label>Container Type:</label>
            <select name="container_type" class="form-control">
                <option>Frame</option>
                <option>Glass Tool</option>
                <option>Wooden Box</option>
                <option>Metal Box</option>
                <option>Paper or Docs</option>
                <option>Plastic Folder</option>
            </select>
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
            <p>Current Image:</p>
            <img src="uploads/<?php echo $row['image']; ?>" width="100">

            <button type="submit" class="btn btn-success mt-3">Save Changes</button>
        </form>
    </div>
</body>
</html>

