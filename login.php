<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');

        body {
            background: white;
            font-family: babas neue;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            width: 70px;
            height: auto;
            margin-right: 10px;
        }

        .menu-icon {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 24px;
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

        .login-container {
            background:#D8BFD8;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            margin-top: 100px;
            height : 300px;
        
        }

        h2 {
            color: #800080 ;
            font-size: 30px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            box-shadow: 0px 0px 8px white;
        }

        button {
            width: 87%;
            padding: 16px;
            border: none;
            border-radius: 5px;
            
            background: #800080 ;
            color:white;
            font-size: 18px;
            
        
            
        }

        button:hover {
            background: rgb(115, 224, 98);
            color:  #800080;

        }

        .error {
            color: yellow;
            margin-top: 10px;
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
    </style>
    <script>
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="logo-menu">
            <img src="logo7.png" alt="Logo" class="logo"> <!-- Replace with your actual logo path -->
            <div class="menu-icon" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <h2>KBL MUSEUM</h2>
        <div class="menu">
            <a href="">Booking</a>
            <a href="">Artifact</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
        </div>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2025 KBL MUSEUM. All rights reserved.</p>
    </div>
</body>
</html>