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

    // Include PHPExcel library
    require 'vendor/autoload.php'; // Ensure PHPExcel is installed via Composer

    // Load the spreadsheet
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    $data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    // Iterate through rows in the spreadsheet
    foreach ($data as $rowIndex => $row) {
        // Skip the header row
        if ($rowIndex == 1) continue;

        $category = $row['A']; // CATEGORY
        $section = $row['B'];  // SECTION

        // Process Videos
        if (!empty($row['C'])) { // VIDEOS
            $filePath = "../uploads/assets/videos/" . $row['C'];
            $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
            $fileType = "video";
            $extension = pathinfo($row['C'], PATHINFO_EXTENSION);
            $stmt->bind_param("ssssss", $filePath, $row['C'], $fileType, $extension, $section, $category);
            $stmt->execute();
        }

        // Process PDFs
        if (!empty($row['D'])) { // PDF
            $filePath = "../uploads/assets/pdf/" . $row['D'];
            $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
            $fileType = "pdf";
            $extension = pathinfo($row['D'], PATHINFO_EXTENSION);
            $stmt->bind_param("ssssss", $filePath, $row['D'], $fileType, $extension, $section, $category);
            $stmt->execute();
        }

        // Process Images
        for ($i = 1; $i <= 31; $i++) {
            $imageColumn = chr(69 + $i - 1); // Dynamically calculate column letters starting from 'E'
            if (!empty($row[$imageColumn])) {
                $filePath = "../uploads/assets/images/" . $row[$imageColumn];
                $stmt = $conn->prepare("INSERT INTO `uploads`(`file_url`, `file_name`, `file_type`, `extension`, `section`, `category`) VALUES (?, ?, ?, ?, ?, ?)");
                $fileType = "image";
                $extension = pathinfo($row[$imageColumn], PATHINFO_EXTENSION);
                $stmt->bind_param("ssssss", $filePath, $row[$imageColumn], $fileType, $extension, $section, $category);
                $stmt->execute();
            }
        }
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
