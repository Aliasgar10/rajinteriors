<?php
echo "hello";

// Database configuration
$host = "localhost";
$username = "rajinteriors";
$password = "7ku~3AksgI75Edzrp";
$database = "rajinteriors";

// Database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
// Display errors on the screen
ini_set('display_errors', 1);
// Log errors to a file (optional)
ini_set('log_errors', 1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check for POST request
    // Get form data
    $user_name = $_POST['user_name'] ?? 'name';
    $user_email = $_POST['user_email'] ?? 'email';
    $message = $_POST['messages'] ?? 'messege';

    // Debugging: Display received data
    echo "Received Data: <br>";
    echo "Name: $user_name <br>";
    echo "Email: $user_email <br>";
    echo "Message: $message <br>";

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO user_messages (user_name, user_email, messages) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("SQL Prepare Failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $user_name, $user_email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "SQL Execution Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
