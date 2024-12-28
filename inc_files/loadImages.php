<?php
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the screen
ini_set('log_errors', 1); // Enable error logging

     // Database configuration
     $host = "localhost";
     $username = "rajinteriors";
     $password = "7ku~3AksgI75Edzrp";
     $database = "rajinteriors";
 
     // Create a database connection
     $conn = new mysqli($host, $username, $password, $database);
 
     // Check the connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

// Set headers for JSON response
header('Content-Type: application/json');

// Set default response
$response = [
    'success' => false,
    'html' => '',
    'message' => 'No images found.'
];

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$images_per_page = 9;

// Fetch images from the database
$query = "SELECT file_url, file_name FROM uploads WHERE file_type = 'image' AND category_id='2' LIMIT $images_per_page OFFSET $offset";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $html = '';
    while ($row = $result->fetch_assoc()) {
        $html .= '<div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">';
        $html .= '    <div class="post_wrapper">';
        $html .= '        <div class="post_img static">';
        $html .= '            <div class="post_img_hover">';
        $html .= '                <img src="' . htmlspecialchars($row['file_url']) . '" alt="' . htmlspecialchars($row['file_name']) . '" loading="lazy">';
        $html .= '                <a href="#"></a>';
        $html .= '            </div>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }

    // Update the response
    $response['success'] = true;
    $response['html'] = $html;
    $response['message'] = 'Images loaded successfully.';
}

// Clear any output buffer and output the JSON response
ob_clean();
echo json_encode($response);

// Close the connection
$conn->close();
?>