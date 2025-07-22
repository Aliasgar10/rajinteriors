<?php
    // Set content type to JSON
    header('Content-Type: application/json');

    // Include the database connection
    include 'connection/db_connect.php'; // Adjust this path as needed

    // Set category ID (hardcoded or dynamically via GET if needed)
    $categoryId = 28;

    // Prepare and execute query using PDO
    try {
        $stmt = $pdo->prepare("SELECT file_name FROM uploads WHERE category_id = ?");
        $stmt->execute([$categoryId]);

        $images = [];

        while ($row = $stmt->fetch()) {
            $images[] = [
                'file_name' => $row['file_name'] ?? ''
            ];
        }

        if (count($images) > 0) {
            echo json_encode($images, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode(['error' => 'No images found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
?>
