<?php
    include("../connection/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raj Interiors</title>
    <link rel="icon" href="../upload/TG-Thumb.png">
    <link rel="icon" href="../upload/TG-Thumb.png">
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
        margin-bottom: 20px;
    }

    .navbar h1 {
        margin: 0;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #343a40;
    }

    form input[type="text"], 
    form input[type="file"], 
    form input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 16px;
    }

    form input[type="text"]:focus, 
    form input[type="file"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    form input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        form {
            padding: 15px;
        }

        form label {
            font-size: 14px;
        }

        form input[type="text"], 
        form input[type="file"], 
        form input[type="submit"] {
            font-size: 14px;
        }
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
            <input type="file" name="file" id="file" required>

            <label for="file_name">File Name:</label>
            <input type="text" name="file_name" id="file_name" placeholder="Enter file name" required>

            <label for="section">Section:</label>
            <input type="text" name="section" id="section" placeholder="Enter section name" required>

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" placeholder="Enter category name" required>

            <input type="submit" value="Upload File">
        </form>
    </div>
</body>
</html>