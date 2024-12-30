<?php
    error_reporting(E_ALL);
    // Display errors on the screen
    ini_set('display_errors', 1);
    // Log errors to a file (optional)
    ini_set('log_errors', 1);
// echo "hello";
// Database configuration
$host = 'localhost';
$db_name = 'rajinteriors';
$db_user = 'rajinteriors';
$db_password = '7ku~3AksgI75Edzrp';

// Create a connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $message = $_POST['messages'];
echo $user_name;
echo $user_email;
echo $message;
die;
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