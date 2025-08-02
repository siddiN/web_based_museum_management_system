<?php
include 'db.php';

$appraisal_id = $_GET['id'];
$sql = "SELECT * FROM appraisals WHERE appraisal_id = $appraisal_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appraisals Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            color: black;
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #556B2F;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        <h2>Update Appraisals Record</h2>
        <form method="POST" action="update_appraisal.php" onsubmit="return validateForm()">
            <input type="hidden" name="appraisalId" value="<?php echo $row['appraisal_id']; ?>">

            <!-- Object ID Field -->
            <div class="form-group">
                <label for="objectId">Object ID:</label>
                <input type="number" id="objectId" name="objectId" value="<?php echo $row['object_id']; ?>" required>
            </div>

            <!-- Appraiser Name Field -->
            <div class="form-group">
                <label for="appraiserName">Appraiser Name:</label>
                <input type="text" id="appraiserName" name="appraiserName" value="<?php echo $row['appraiser_name']; ?>" required>
            </div>

            <!-- Appraisal Date Field -->
            <div class="form-group">
                <label for="appraisalDate">Appraisal Date:</label>
                <input type="date" id="appraisalDate" name="appraisalDate" value="<?php echo $row['appraisal_date']; ?>" required>
            </div>

            <!-- Reason Field -->
            <div class="form-group">
                <label for="reason">Reason:</label>
                <input type="text" id="reason" name="reason" value="<?php echo $row['reason']; ?>" required>
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $row['description']; ?></textarea>
            </div>

            <button type="submit">Update Record</button>
        </form>
    </div>
    <script>
        // JavaScript Validation Function
        function validateForm() {
            const appraiserName = document.getElementById('appraiserName').value;
            const reason = document.getElementById('reason').value;
            const description = document.getElementById('description').value;

            // Regex pattern for validation
            const namePattern = /^[a-zA-Z\s]+$/;

            // Validate "Appraiser Name" field
            if (!appraiserName.match(namePattern)) {
                alert("Appraiser Name should only contain letters and spaces.");
                return false;
            }

            // Validate "Reason" field
            if (!reason.match(namePattern)) {
                alert("Reason should only contain letters and spaces.");
                return false;
            }

            // Validate "Description" field
            if (description.trim() === '') {
                alert("Description should not be empty.");
                return false;
            }

            return true; // If all validation passes, allow form submission
        }
    </script>

    <footer>
        <p>&copy; 2025 KBL Museum. All rights reserved.</p>
    </footer>
</body>
</html>
