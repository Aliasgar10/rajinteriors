<!-- use for categories page -->
 
<?php
// Database configuration
$host = "localhost";
$username = "rajinteriors";
$password = "7ku~3AksgI75Edzrp";
$database = "rajinteriors";

// Database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
// Display errors on the screen
ini_set('display_errors', 1);
// Log errors to a file (optional)
ini_set('log_errors', 1);

// Truncate all tables before processing
$conn->query("TRUNCATE TABLE categories");
$conn->query("TRUNCATE TABLE sections");
$conn->query("TRUNCATE TABLE uploads");

// Utility function to extract YouTube video ID
if (!function_exists('getYouTubeID')) {
    function getYouTubeID($url) {
        preg_match('/(?:youtube\\.com.*(?:\\/|v=|u\\/\\w\\/|embed\\/|shorts\\/)|youtu\\.be\\/)([^#&?\\n\\r]*)/', $url, $matches);
        return $matches[1] ?? null;
    }
}

// Fetch the sheet data from google_sheet table where status == 0
$sheetQuery = "SELECT id, path FROM google_sheet WHERE status = 0 LIMIT 1";
$sheetResult = $conn->query($sheetQuery);

if ($sheetResult->num_rows > 0) {
    $sheetRow = $sheetResult->fetch_assoc();
    $sheetId = $sheetRow['id'];
    $filePath = $sheetRow['path'];

    // Fetch the CSV content from the Google Sheets URL
    $csvContent = file_get_contents($filePath);
    if ($csvContent === false) {
        die("Failed to fetch the CSV file from URL: " . $filePath);
    }

    // Parse the CSV content
    $lines = explode("\n", $csvContent);
    $rowIndex = 0;

    $categoriesAdded = 0;
    $sectionsAdded = 0;
    $filesAdded = 0;
    $failedFiles = [];

    foreach ($lines as $line) {
        $row = str_getcsv($line);
        if ($rowIndex == 0) { // Skip the header row
            $rowIndex++;
            continue;
        }

        if (empty($row)) {
            continue;
        }

        $categoryName = $row[0] ?? ''; // CATEGORY (Column A)
        $sectionName = $row[1] ?? '';  // SECTION (Column B)

        // Insert category into categories table if not exists
        $categoryId = null;
        if (!empty($categoryName)) {
            $categoryQuery = "SELECT id FROM categories WHERE category_name = ? LIMIT 1";
            $categoryStmt = $conn->prepare($categoryQuery);
            $categoryStmt->bind_param("s", $categoryName);
            $categoryStmt->execute();
            $categoryStmt->bind_result($categoryId);
            $categoryStmt->fetch();
            $categoryStmt->close();

            if (!$categoryId) {
                $insertCategoryQuery = "INSERT INTO categories (category_name) VALUES (?)";
                $insertCategoryStmt = $conn->prepare($insertCategoryQuery);
                $insertCategoryStmt->bind_param("s", $categoryName);
                $insertCategoryStmt->execute();
                $categoryId = $insertCategoryStmt->insert_id;
                $insertCategoryStmt->close();
                $categoriesAdded++;
            }
        }

        // Insert section into sections table if not exists
        $sectionId = null;
        if (!empty($sectionName)) {
            $sectionQuery = "SELECT id FROM sections WHERE section_name = ? LIMIT 1";
            $sectionStmt = $conn->prepare($sectionQuery);
            $sectionStmt->bind_param("s", $sectionName);
            $sectionStmt->execute();
            $sectionStmt->bind_result($sectionId);
            $sectionStmt->fetch();
            $sectionStmt->close();

            if (!$sectionId) {
                $insertSectionQuery = "INSERT INTO sections (section_name) VALUES (?)";
                $insertSectionStmt = $conn->prepare($insertSectionQuery);
                $insertSectionStmt->bind_param("s", $sectionName);
                $insertSectionStmt->execute();
                $sectionId = $insertSectionStmt->insert_id;
                $insertSectionStmt->close();
                $sectionsAdded++;
            }
        }

        // Process Videos
        // if (!empty($row[2])) { // VIDEOS (Column C)

        //     $extension = pathinfo($row[2], PATHINFO_EXTENSION); // for get path type mean mp4 or other 

            
        //     $filePath = $row[2];
        //     $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section_id`, `category_id`) VALUES (?, ?, ?, ?, ?, ?)");
        //     $fileType = "video";
        //     $extension ="potriat";
           
        //     if (!$stmt->bind_param("ssssii", $filePath, $row[2], $fileType, $extension, $sectionId, $categoryId) || !$stmt->execute()) {
        //         $failedFiles[] = $row[2];
        //     } else {
        //         $filesAdded++;
        //     }
        // }

        // Process Videos
        if (!empty($row[2])) { // VIDEOS (Column C)
            $filePath = $row[2];

            // Extract the video ID
            $videoID = getYouTubeID($filePath);
            if ($videoID) {
                // Prepare the statement for inserting video data
                $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section_id`, `category_id`) VALUES (?, ?, ?, ?, ?, ?)");
                // Determine file type and extension dynamically
                $fileType = "video";
                $isShort = strpos($filePath, 'shorts') !== false;
                $extension = $isShort ? "portrait" : "landscape";
                // Create the embeddable URL
                $embedUrl = "https://www.youtube.com/embed/" . $videoID;

                // Bind parameters and execute the statement
                if (!$stmt->bind_param("ssssii", $embedUrl, $videoID, $fileType, $extension, $sectionId, $categoryId) || !$stmt->execute()) {
                    $failedFiles[] = $row[2];
                } else {
                    $filesAdded++;
                }
            } else {
                $failedFiles[] = $filePath; // Add to failed if ID cannot be extracted
            }
        }

        // Process PDFs
        if (!empty($row[3])) { // PDF (Column D)
            $filePath = "../uploads/assets/pdf/" . $row[3];
            $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section_id`, `category_id`) VALUES (?, ?, ?, ?, ?, ?)");
            $fileType = "pdf";
            $extension = pathinfo($row[3], PATHINFO_EXTENSION);
            if (!$stmt->bind_param("ssssii", $filePath, $row[3], $fileType, $extension, $sectionId, $categoryId) || !$stmt->execute()) {
                $failedFiles[] = $row[3];
            } else {
                $filesAdded++;
            }
        }

        // Process Images
        for ($i = 4; $i < count($row); $i++) {
            if (!empty($row[$i])) {
                $filePath = "../uploads/assets/images/" . $row[$i];
                $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section_id`, `category_id`) VALUES (?, ?, ?, ?, ?, ?)");
                $fileType = "image";
                $extension = pathinfo($row[$i], PATHINFO_EXTENSION);
                if (!$stmt->bind_param("ssssii", $filePath, $row[$i], $fileType, $extension, $sectionId, $categoryId) || !$stmt->execute()) {
                    $failedFiles[] = $row[$i];
                } else {
                    $filesAdded++;
                }
            }
        }

        $rowIndex++;
    }

    // After processing, update the status of the row in google_sheet table
    $updateQuery = "UPDATE google_sheet SET status = 1 WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("i", $sheetId);
    $updateStmt->execute();

    // Display summary
    echo "Processing Complete:\n";
    echo "$sectionsAdded sections added.\n";
    echo "$categoriesAdded categories added.\n";
    echo "$filesAdded files added.\n";
    if (!empty($failedFiles)) {
        echo "Failed to insert files: " . implode(", ", $failedFiles) . "\n";
    }
    echo "Sheet ID: $sheetId has been updated to status 1.\n";
} else {
    echo "No sheets with status 0 found.";
}

// Close the database connection
$conn->close();
?>
