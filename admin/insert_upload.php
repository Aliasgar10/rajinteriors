<?php
// Database configuration
// $host = "localhost";
// $username = "rajinteriors";
// $password = "7ku~3AksgI75Edzrp";
// $database = "rajinteriors";

    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "rajinteriors";
    
// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    if (isset($_POST['file_name'], $_POST['section_id'], $_POST['category_id'])) {
        $file_name = $_POST['file_name'];
        $section = $_POST['section_id'];
        $category = $_POST['category_id'];
        $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($fileType, ["jpg", "jpeg", "png", "gif"])) {
            $target_dir = "../uploads/assets/images/";
        } elseif ($fileType === "pdf") {
            $target_dir = "../uploads/assets/pdf/";
        } else {
            die("Unsupported file type.");
        }

        $target_file = $target_dir . basename($_FILES['file']['name']);
        if ($_FILES['file']['size'] > 5000000) {
            die("File is too large.");
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO uploads (file_url, file_name, section, category) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $target_file, $file_name, $section, $category);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Error uploading file.");
        }
    }
}

// Fetch images and PDFs
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['file_type'])) {
    $type = $_GET['file_type'];
    $query = ($type === "image") ? "file_url LIKE '../uploads/assets/images/%'" : "file_url LIKE '../uploads/assets/pdf/%'";
    $result = $conn->query("SELECT * FROM uploads WHERE $query");

    while ($row = $result->fetch_assoc()) {
        echo '<div class="file-item">';
        if ($type === "image") {
            echo '<div class="img-item" style="width: 150px; height: 150px;"><img src="' . $row['file_url'] . '" alt="Image"></div>';
        } else {
            echo '<p>' . basename($row['file_url']) . '</p>';
        }
            echo '<div class="btnn" style="height:40px; display:flex; gap:10px;">';
            echo '<button onclick="viewDetails(' . $row['id'] . ')">Details</button>';
            echo '<button onclick="deleteFile(' . $row['id'] . ', \'' . $type . '\')">Delete</button>';
            echo '</div>';
        echo '</div>';
    }
    exit;
}

// View file details
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['details_id'])) {
    $id = intval($_GET['details_id']);
    $result = $conn->query("SELECT * FROM uploads WHERE id = $id");

    if ($row = $result->fetch_assoc()) {
        echo '<p><strong>File Name:</strong> ' . $row['file_name'] . '</p>';
        echo '<p><strong>Section:</strong> ' . $row['section'] . '</p>';
        echo '<p><strong>Category:</strong> ' . $row['category'] . '</p>';
        echo '<p><strong>File URL:</strong> <a href="' . $row['file_url'] . '" target="_blank">' . $row['file_url'] . '</a></p>';
    } else {
        echo '<p>No details found.</p>';
    }
    exit;
}

// Delete file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $result = $conn->query("SELECT * FROM uploads WHERE id = $id");

    if ($row = $result->fetch_assoc()) {
        $file_path = $row['file_url'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $conn->query("DELETE FROM uploads WHERE id = $id");
        echo "File deleted successfully.";
    } else {
        echo "File not found.";
    }
    exit;
}
?>
