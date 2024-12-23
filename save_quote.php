<?php
// database_config.php: Contains database connection settings
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
    // Retrieve user data
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    
    // Retrieve selections
    $selections = json_decode($_POST['selections'], true); // JSON-decoded selections from JavaScript
    
    // Insert user into users table
    $stmt = $conn->prepare("INSERT INTO users (name, mobile, email, city, pincode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $mobile, $email, $city, $pincode);
    $stmt->execute();
    $user_id = $stmt->insert_id; // Get the last inserted user ID
    $stmt->close();
    
    // Insert selections into quotes table
    foreach ($selections as $section => $choice) {
        $stmt = $conn->prepare("INSERT INTO quotes (user_id, section_name, choice) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $section, $choice);
        $stmt->execute();
    }
    $stmt->close();

    echo json_encode(["status" => "success", "message" => "Data saved successfully!"]);
    $conn->close();
    exit;
}
?>
