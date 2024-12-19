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
    while ($row = $result->fetch_assoc()) {
        echo '<div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">';
        echo '    <div class="post_wrapper">';
        echo '        <div class="post_img static">';
        echo '            <div class="post_img_hover">';
        echo '                <img src="' . htmlspecialchars($row['file_url']) . '" alt="' . htmlspecialchars($row['file_name']) . '" loading="lazy">';
        echo '                <a href="#"></a>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "<p>No more images to load.</p>";
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the connection
$conn->close();
?>