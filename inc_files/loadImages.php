<?php
    include("../connection/db_connect.php");

// Set default response
$response = [
    'success' => false,
    'images' => [],
    'message' => 'No images found.',
];

// Parameters for pagination
$images_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $images_per_page;

// Fetch images from the database
$query = "SELECT file_url, file_name FROM uploads WHERE file_type = 'image' AND category='HomePage' LIMIT $images_per_page OFFSET $offset";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $images = [];

    while ($row = $result->fetch_assoc()) {
        $images[] = [
            'file_url' => $row['file_url'],
            'file_name' => $row['file_name'],
        ];
    }

    // Update the response
    $response['success'] = true;
    $response['images'] = $images;
    $response['message'] = 'Images fetched successfully.';
} else {
    $response['message'] = 'No images available for the requested page.';
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the connection
$conn->close();
?>