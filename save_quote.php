<?php
header('Content-Type: application/json');

// Force HTTPS if not already
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

// Log the request method for debugging
file_put_contents('request_method_log.txt', $_SERVER['REQUEST_METHOD'] . PHP_EOL, FILE_APPEND);

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode(["status" => "success", "message" => "Data received successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
