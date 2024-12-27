<?php
header('Content-Type: application/json');

// Include database connection
include 'connection/db_connect.php';

// Query to fetch images
$sql = "SELECT file_name FROM uploads WHERE category_id=28";
$result = $conn->query($sql);

$images = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = [
            'file_name' => $row['file_name']
        ];
    }
}

// Return the images as JSON
echo json_encode($images);

$conn->close();
?>
