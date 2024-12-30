<?php

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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $message = $_POST['messages'];
    
echo $user_name;
echo $user_email;
echo $message;

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO user_messages (user_name, user_email, messages) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_name, $user_email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>