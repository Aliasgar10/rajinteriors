<?php
    include("../connection/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            box-sizing: border-box;
        }

        .navbar {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Sidebar Menu</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Upload</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="navbar">
            <h1>Upload File</h1>
        </div>
        <form action="insert_upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Select file to upload:</label>
            <input type="file" name="file" id="file" required><br><br>

            <label for="file_name">File Name:</label>
            <input type="text" name="file_name" id="file_name" required><br><br>

            <label for="section">Section:</label>
            <input type="text" name="section" id="section" required><br><br>

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" required><br><br>

            <input type="submit" value="Upload File">
        </form>
    </div>
</body>
</html>