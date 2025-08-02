<?php
require('visdb_connect.php');
// Include database connection

// Fetch visitor data
$sql = "SELECT id, name, contact, created_at FROM advisitors ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Visitor Records</title>
    <link rel="stylesheet" href="advistyle.css">
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

.logout-btn:hover {
    background-color: darkgreen;
}
* Container */
.container {
    background: #D8BFD8; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 800px;
    text-align: center;
}


.logout-btn {
    position: absolute;
    top: 0;
    left:95%;
    transform: translateX(-50%);
    background: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}    

</style>

    
    
   
</head>
<body>
<div class="content">
  <a href="logout.php"><button class="logout-btn">Logout</button></a>
</div>  


    <div class="container">
        <h2>Visitor Records</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Registered On</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= htmlspecialchars($row["name"]); ?></td>
                    <td><?= htmlspecialchars($row["contact"]); ?></td>
                    <td><?= $row["created_at"]; ?></td>
                    <td>
                        <a href ="advis_delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="delete-btn">Delete</a>
                    </td>    
                </tr>
            <?php endwhile; ?>
        </table>
    </div>


</body>
</html>

<?php
$conn->close();
?>
