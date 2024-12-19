<?php
    // Database configuration
    $host = "localhost";
    $username = "rajinteriors";
    $password = "7ku~3AksgI75Edzrp";
    $database = "rajinteriors";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the form was submitted and file uploaded
        if (isset($_FILES['file']) && isset($_POST['file_name']) && isset($_POST['section']) && isset($_POST['category'])) {
            $file_name = $_POST['file_name'];
            $section = $_POST['section'];
            $category = $_POST['category'];

            // File upload configuration
            $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            $uploadOk = 1;
            
            // Determine target directory based on file type
            if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png" || $fileType == "gif") {
                $target_dir = "../uploads/assets/images/";
            } elseif ($fileType == "pdf") {
                $target_dir = "../uploads/assets/pdf/";
            } else {
                echo "Unsupported file type.";
                $uploadOk = 0;
            }

            if ($uploadOk) {
                $target_file = $target_dir . basename($_FILES['file']['name']);

                // Check file size (limit to 5MB)
                if ($_FILES['file']['size'] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // If upload is valid, proceed
                if ($uploadOk) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                        $file_url = $target_file;
                        $stmt = $conn->prepare("INSERT INTO uploads (image_url, image_name, section, category) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $file_url, $file_name, $section, $category);
                        if ($stmt->execute()) {
                            echo "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded and saved to the database.";
                        } else {
                            echo "Database error: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        switch ($_FILES['file']['error']) {
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                echo "File exceeds the maximum allowed size.";
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                echo "The file was only partially uploaded.";
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                echo "No file was uploaded.";
                                break;
                            case UPLOAD_ERR_NO_TMP_DIR:
                                echo "Missing a temporary folder.";
                                break;
                            case UPLOAD_ERR_CANT_WRITE:
                                echo "Failed to write file to disk.";
                                break;
                            case UPLOAD_ERR_EXTENSION:
                                echo "A PHP extension stopped the file upload.";
                                break;
                            default:
                                echo "Unknown upload error.";
                                break;
                        }
                    }
                }
            }
        } else {
            echo "All fields are required.";
        }
    }

    // Fetch images and PDFs
    $images = $conn->query("SELECT * FROM uploads WHERE image_url LIKE '../uploads/assets/images/%'");
    $pdfs = $conn->query("SELECT * FROM uploads WHERE image_url LIKE '../uploads/assets/pdf/%'");

    $conn->close();
?>

<?php include("layout_open.php"); ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-grow: 1;
            overflow: hidden;
        }

        .file-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .file-section h2 {
            margin-bottom: 10px;
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
            max-height: 100px;
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

    <div class="container">
        <div class="file-section">
            <h2>Images</h2>
            <div class="file-grid">
                <?php while ($row = $images->fetch_assoc()): ?>
                    <div class="file-item">
                        <img src="<?php echo $row['image_url']; ?>" alt="File">
                        <button>Details</button>
                        <button>Delete</button>
                    </div>
                <?php endwhile; ?>
                <div class="add-file" onclick="openModal()">+ Add Image</div>
            </div>
        </div>

        <div class="file-section">
            <h2>PDFs</h2>
            <div class="file-grid">
                <?php while ($row = $pdfs->fetch_assoc()): ?>
                    <div class="file-item">
                        <p><?php echo basename($row['image_url']); ?></p>
                        <button>Details</button>
                        <button>Delete</button>
                    </div>
                <?php endwhile; ?>
                <div class="add-file" onclick="openModal()">+ Add PDF</div>
            </div>
        </div>
    </div>

    <div id="fileModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">Close</button>
            <form action="" method="post" enctype="multipart/form-data">
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
    </div>

    <script>
        function openModal() {
            document.getElementById('fileModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('fileModal').style.display = 'none';
        }
    </script>

<?php include("layout_close.php"); ?>



