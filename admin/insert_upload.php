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

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'], $_POST['file_name'], $_POST['section'], $_POST['category'])) {
        $file_name = $_POST['file_name'];
        $section = $_POST['section'];
        $category = $_POST['category'];
        $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        // Determine file directory
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

        // Upload file and insert into database
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO uploads (image_url, image_name, section, category) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $target_file, $file_name, $section, $category);
            $stmt->execute();
            $stmt->close();
            header("Location: index.html");
        } else {
            die("Error uploading file.");
        }
    }
}

// Fetch images and PDFs based on query parameter
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $query = ($type === "images") ? "image_url LIKE '../uploads/assets/images/%'" : "image_url LIKE '../uploads/assets/pdf/%'";
    $result = $conn->query("SELECT * FROM uploads WHERE $query");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="file-item">';
            if ($type === "images") {
                echo '<img src="' . $row['image_url'] . '" alt="Image">';
            } else {
                echo '<p>' . basename($row['image_url']) . '</p>';
            }
            echo '<button>Details</button>';
            echo '<button>Delete</button>';
            echo '</div>';
        }
    } else {
        echo '<p>No data found.</p>';
    }
    $conn->close();
    exit;
}
?>
