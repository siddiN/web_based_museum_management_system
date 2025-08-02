<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="advistyle.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #800080;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            position: relative;
        }

        .logout-btn {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background: blue;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: darkblue;
        }
    </style>
</head>
<body>
<header>
    <h1>Visitor Management - Admin Panel</h1>
    <a href="logout.php"><button class="logout-btn">Logout</button></a>
</header>
