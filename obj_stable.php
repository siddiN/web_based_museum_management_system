<?php
include 'db1.php';

$sql = "CREATE TABLE IF NOT EXISTS object_status (
    object_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    status_id INT(11) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (object_id) REFERENCES objects(object_id),
    FOREIGN KEY (status_id) REFERENCES status(status_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table object_status created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
