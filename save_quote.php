<?php
header('Content-Type: application/json');

// Your PHP processing logic here
$response = [
    'status' => 'success', // or 'error'
    'message' => 'Data submitted successfully!'
];

echo json_encode($response);
?>
