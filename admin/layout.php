<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rajinteriors</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .section{
            display: flex;
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

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
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

        .file-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            padding: 20px;
            gap: 10px;
            border: 4px solid red;
            overflow-y: scroll;
            height: 84vh;

        }

        .file-section h2 {
            margin-bottom: 5px;
        }

        .file-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }

        .file-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            position: relative;
        }

        .file-item img {
            max-width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .file-item button {
            display: block;
            width: 100%;
            margin: 5px 0;
            padding: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .file-item button:hover {
            background-color: #0056b3;
        }

        .add-file {
            width: 150px;
            height: 150px;
            border: 2px dashed #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-weight: bold;
            color: #007bff;
            transition: background-color 0.3s;
        }

        .add-file:hover {
            background-color: #f0f8ff;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
        }

        .modal-close {
            background-color: red;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Sidebar Menu</h2>
        <?php include("sidebar.php"); ?>
    </div>
    <div class="container">
        <div class="navbar">
            <h1>File Manager</h1>
        </div>

        
    </div>
</body>
</html>
