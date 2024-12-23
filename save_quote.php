<?php
// Database configuration
$host = "localhost";
$username = "rajinteriors";
$password = "7ku~3AksgI75Edzrp";
$database = "rajinteriors";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    if (!isset($_POST['name'], $_POST['mobile'], $_POST['email'], $_POST['city'], $_POST['pincode'], $_POST['selections'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields."]);
        exit;
    }

    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $city = $conn->real_escape_string($_POST['city']);
    $pincode = $conn->real_escape_string($_POST['pincode']);
    $selections = json_decode($_POST['selections'], true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(["status" => "error", "message" => "Invalid JSON format in selections."]);
        exit;
    }

    // Insert user into `users` table
    $stmt = $conn->prepare("INSERT INTO users (name, mobile, email, city, pincode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $mobile, $email, $city, $pincode);

    if (!$stmt->execute()) {
        echo json_encode(["status" => "error", "message" => "Failed to insert user: " . $stmt->error]);
        exit;
    }
    $user_id = $stmt->insert_id; // Get last inserted user ID
    $stmt->close();

    // Insert selections into `quotes` table
    foreach ($selections as $section => $choice) {
        $stmt = $conn->prepare("INSERT INTO quotes (user_id, section_name, choice) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $section, $choice);

        if (!$stmt->execute()) {
            echo json_encode(["status" => "error", "message" => "Failed to insert selection: " . $stmt->error]);
            exit;
        }
    }
    $stmt->close();

    // Success response
    echo json_encode(["status" => "success", "message" => "Data saved successfully!"]);
    // $conn->close();
    exit;
}
?>
