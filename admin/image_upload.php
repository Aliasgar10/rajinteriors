<?php
    include("../connection/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
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
</body>
</html>
