<?php
    error_reporting(E_ALL); // Report all errors
    ini_set('display_errors', 1); // Display errors on the screen
    ini_set('log_errors', 1); // Enable error logging

    // Include the database connection
    include '../connection/db_connect.php'; // Adjust this path as needed

    // Set default response
    $response = [
        'success' => false,
        'html' => '',
        'message' => 'No images found.'
    ];

    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $images_per_page = 9;

    try {
        // Prepare and execute PDO query
        $stmt = $pdo->prepare("SELECT file_url, file_name FROM uploads WHERE file_type = 'image' AND category_id = :cat_id LIMIT :limit OFFSET :offset");
        $category_id = 2;

        // Bind parameters (LIMIT and OFFSET require PDO::PARAM_INT)
        $stmt->bindValue(':cat_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $images_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($images) {
            $html = '';
            foreach ($images as $row) {
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

            $response['success'] = true;
            $response['html'] = $html;
            $response['message'] = 'Images loaded successfully.';
        }

    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }

    // Output the JSON response
    if (ob_get_contents()) ob_clean(); // Clear buffer if needed
    echo json_encode($response);

?>