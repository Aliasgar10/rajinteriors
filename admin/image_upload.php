<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
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
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="image_upload.php">Upload</a></li>
            <li><a href="setting.php">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="navbar">
            <h1>File Manager</h1>
        </div>

        
        <div class="section">
            <div class="file-section">
                <h2>Images</h2>
                <div class="add-file" onclick="openModal()">+ Add Image</div>
                <div class="file-grid" id="images-grid"></div>
            </div>

            <div class="file-section">
                <h2>PDFs</h2>
                <div class="add-file" onclick="openModal()">+ Add PDF</div>
                <div class="file-grid" id="pdfs-grid"></div>
            </div>
        </div>

        <!-- Upload File Modal -->
        <div id="fileModal" class="modal">
            <div class="modal-content">
                <button class="modal-close" onclick="closeModal()">Close</button>
                <form action="insert_upload.php" method="post" enctype="multipart/form-data">
                    <label for="file">Select file to upload:</label>
                    <input type="file" name="file" id="file" required>

                    <label for="file_name">File Name:</label>
                    <input type="text" name="file_name" id="file_name" required>

                    <label for="section">Section:</label>
                    <input type="text" name="section" id="section" required>

                    <label for="category">Category:</label>
                    <input type="text" name="category" id="category" required>

                    <input type="submit" value="Upload File">
                </form>
            </div>
        </div>

        <!-- View Details Modal -->
        <div id="detailsModal" class="modal">
            <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">×</button>
            <h2>File Details</h2>
                <!-- Details will be loaded here dynamically -->
            </div>
        </div>
    </div>
    <!-- Pop up style -->
    <style>
        /* General Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            max-width: 90%; /* Adjust for smaller screens */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Modal Close Button */
        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 16px;
            line-height: 25px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-close:hover {
            background-color: #c82333;
        }

        /* Modal Headings */
        .modal-content h2 {
            margin-top: 0;
            color: #343a40;
            font-size: 20px;
            text-align: center;
        }

        /* Modal Body Text */
        .modal-content p {
            color: #495057;
            font-size: 16px;
            margin: 10px 0;
            word-wrap: break-word;
        }

        /* Modal Links */
        .modal-content a {
            color: #007bff;
            text-decoration: none;
        }

        .modal-content a:hover {
            text-decoration: underline;
        }

        /* Modal Buttons */
        .modal-content button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .modal-content button:hover {
            background-color: #0056b3;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadFiles(type) {
            $.ajax({
                url: 'insert_upload.php',
                type: 'GET',
                data: { type: type },
                success: function(data) {
                    $('#' + type + '-grid').html(data);
                },
                error: function() {
                    $('#' + type + '-grid').html('<p>Error loading data.</p>');
                }
            });
        }

        function openModal() {
            $('#fileModal').css('display', 'flex');
        }

        function closeModal() {
            $('#fileModal, #detailsModal').css('display', 'none');
        }

        function viewDetails(id) {
            $.ajax({
                url: 'insert_upload.php',
                type: 'GET',
                data: { details_id: id },
                success: function(data) {
                    $('#detailsModal .modal-content').html(data);
                    $('#detailsModal').css('display', 'flex');
                },
                error: function() {
                    alert('Error fetching details.');
                }
            });
        }

        function deleteFile(id, type) {
            if (confirm('Are you sure you want to delete this file?')) {
                $.ajax({
                    url: 'insert_upload.php',
                    type: 'POST',
                    data: { delete_id: id },
                    success: function(response) {
                        alert(response);
                        loadFiles(type); // Refresh the file list
                    },
                    error: function() {
                        alert('Error deleting file.');
                    }
                });
            }
        }

        // Load files on page load
        $(document).ready(function() {
            loadFiles('images');
            loadFiles('pdfs');
        });
    </script>
</body>
</html>
