<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');

        body {
            font-family: 'Anton', sans-serif;
            background:white;
            color: white;
            padding-top: 80px;
            margin: 0;
            font: size 20px;
        }

        .header {
            width: 100%;
            background: #800080;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .logo-menu {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .menu-icon {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 22px;
        }

        .menu-icon div {
            width: 30px;
            height: 3px;
            background-color: white;
        }

        .header h2 {
            flex-grow: 1;
            text-align: center;
            margin: 0;
            color: white;
        }

        .menu {
            display: none;
            flex-direction: column;
            align-items: flex-start;
            position: absolute;
            top: 50px;
            left: 0;
            width: 200px;
            height: calc(100vh - 50px);
            background: #800080;
            padding: 10px;
            border-radius: 5px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 20px 0;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
            
        }

        h2 {
            color: white;
            font-size: 30px;
            font-weight: bold;
        }
        h1{
            font-size: 24px;
            font-weight: bold;
            color:#D8BFD8;
            margin: 20px 0;
        }



        p {
            font-size: 20px;
          
            color: white;
            margin: 20px 0;
        }

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

        .footer {
            width: 100%;
            background: #800080;
            color: white;
            text-align: center;
            padding: 5px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }
.image-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('background.jpg') no-repeat center center/cover;
    z-index: -1;
}

/* Center content both vertically & horizontally */
.content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    color: white; /* Adjust based on background */
    text-align: center;
    font-size: 2rem;
    width: 100%;
    padding: 20px;
}
  

       

       


    </style>
    <script>
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        }
    </script>
</head>
<body>
      <!-- Image Background -->
<div class="img-background" style="background: url('we.jpg') no-repeat center center/cover; width: 100%; height: 100vh;">
</div>

    <div class="header">
        <div class="logo-menu">
            <img src="logo7.png" alt="Logo" class="logo"> <!-- Replace with actual logo path -->
            <div class="menu-icon" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <h2>KBL MUSEUM</h2>
        <div class="menu">
            <a href="FRONTEND2.HTML">Home</a>
            <a href="booking.html">Booking</a>
            <a href="artificat.html">Artifact</a>
            <a href="aboutus.html">About Us</a>
            <a href="contact">Contact</a>
            <a href="form.html">Maintenance History</a>
            <a href="advissubmit.php">visitor records</a>
            <a href="adartifacts.php">Artefact Management</a>

        </div>
    </div>

    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p></p>
        
    </div>

    <footer class="footer">
        <p>&copy; 2025 KBL Museum. All rights reserved.</p>
        
    </footer>

</body>
</html>