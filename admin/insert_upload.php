<?php
    include("../connection/db_connect.php");

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
                        // Insert file info into the database
                        $file_url = $target_file;

                        $stmt = $conn->prepare("INSERT INTO images (image_url, image_name, section, category) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $file_url, $file_name, $section, $category);

                        if ($stmt->execute()) {
                            echo "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded and saved to the database.";
                        } else {
                            echo "Error: " . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "All fields are required.";
        }
    }

    $conn->close();
?>