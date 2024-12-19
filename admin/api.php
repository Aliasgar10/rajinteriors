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

    foreach ($lines as $line) {
        $row = str_getcsv($line);
        if ($rowIndex == 0) { // Skip the header row
            $rowIndex++;
            continue;
        }

        if (empty($row)) {
            continue;
        }

        $category = $row[0] ?? ''; // CATEGORY (Column A)
        $section = $row[1] ?? '';  // SECTION (Column B)

        // Process Videos
        if (!empty($row[2])) { // VIDEOS (Column C)
            $filePath = "../uploads/assets/videos/" . $row[2];
            $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
            $fileType = "video";
            $extension = pathinfo($row[2], PATHINFO_EXTENSION);
            $stmt->bind_param("ssssss", $filePath, $row[2], $fileType, $extension, $section, $category);
            $stmt->execute();
        }

        // Process PDFs
        if (!empty($row[3])) { // PDF (Column D)
            $filePath = "../uploads/assets/pdf/" . $row[3];
            $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
            $fileType = "pdf";
            $extension = pathinfo($row[3], PATHINFO_EXTENSION);
            $stmt->bind_param("ssssss", $filePath, $row[3], $fileType, $extension, $section, $category);
            $stmt->execute();
        }

        // Process Images
        for ($i = 4; $i < count($row); $i++) {
            if (!empty($row[$i])) {
                $filePath = "../uploads/assets/images/" . $row[$i];
                $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
                $fileType = "image";
                $extension = pathinfo($row[$i], PATHINFO_EXTENSION);
                $stmt->bind_param("ssssss", $filePath, $row[$i], $fileType, $extension, $section, $category);
                $stmt->execute();
            }
        }

        $rowIndex++;
    }

    // After processing, update the status of the row in google_sheet table
    $updateQuery = "UPDATE google_sheet SET status = 1 WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("i", $sheetId);
    $updateStmt->execute();
} else {
    echo "No sheets with status 0 found.";
}

// Close the database connection
$conn->close();
?>
