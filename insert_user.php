<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $user_name = $_POST['user_name'] ?? '';
    $user_email = $_POST['user_email'] ?? '';
    $message = $_POST['messages'] ?? '';

    // Check for empty fields
    if (empty($user_name) || empty($user_email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Database connection
    $conn = new mysqli('localhost', 'rajinteriors', '7ku~3AksgI75Edzrp', 'rajinteriors');
    if ($conn->connect_error) {
        echo "Database Connection Failed: " . $conn->connect_error;
        exit;
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("INSERT INTO user_messages (user_name, user_email, messages) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo "SQL Prepare Failed: " . $conn->error;
        exit;
    }

    $stmt->bind_param("sss", $user_name, $user_email, $message);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "SQL Execution Failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid Request.";
}
?>
