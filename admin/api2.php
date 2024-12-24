<!-- use for categories page -->

<?php
error_reporting(E_ALL);
// Display errors on the screen
ini_set('display_errors', 1);
// Log errors to a file (optional)
ini_set('log_errors', 1);


// Include PHPSpreadsheet library
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection
$host = "localhost";
$username = "rajinteriors";
$password = "7ku~3AksgI75Edzrp";
$database = "rajinteriors";

$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch the file path from google_sheet table where status == 0
$stmt = $pdo->prepare("SELECT path FROM google_sheet WHERE status = 0 LIMIT 1");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    die("No valid file path found for status = 0.");
}

$filePath = $result['path'];

try {
    // Load the spreadsheet
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray(null, true, true, true);

    // Truncate existing tables
    $pdo->exec("TRUNCATE TABLE products");
    $pdo->exec("TRUNCATE TABLE category_table");

    // Cache for categories to avoid duplicate entries
    $categoriesCache = [];

    foreach ($rows as $key => $row) {
        // Skip header row
        if ($key === 1) {
            continue;
        }

        // Only process rows where status == 0 (if status column exists, adjust column accordingly)
        // Assuming status is in column F

        $productName = trim($row['A']); // Product Name
        $categoryName = trim($row['C']); // Category
        $childCategoryName = trim($row['D']); // Child Category
        $thumbnail = trim($row['E']); // Thumbnail
        $image1 = trim($row['G']); // Image-1

        // Insert or get parent category ID
        if (!isset($categoriesCache[$categoryName])) {
            $stmt = $pdo->prepare("INSERT INTO category_table (category_name, parent_id, thumbnail) VALUES (?, ?, ?)");
            $stmt->execute([$categoryName, 0, $thumbnail]); // Parent ID set to 0 for top-level categories
            $parentId = $pdo->lastInsertId();
            $categoriesCache[$categoryName] = $parentId;
        } else {
            $parentId = $categoriesCache[$categoryName];
        }

        // Insert or get child category ID
        $categoryId = $parentId;
        if ($childCategoryName) {
            $childKey = $categoryName . '>' . $childCategoryName;
            if (!isset($categoriesCache[$childKey])) {
                $stmt = $pdo->prepare("INSERT INTO category_table (category_name, parent_id, thumbnail) VALUES (?, ?, ?)");
                $stmt->execute([$childCategoryName, $parentId, null]);
                $categoryId = $pdo->lastInsertId();
                $categoriesCache[$childKey] = $categoryId;
            } else {
                $categoryId = $categoriesCache[$childKey];
            }
        }

        // Insert product into the products table
        $stmt = $pdo->prepare("INSERT INTO products (name, category_id, images) VALUES (?, ?, ?)");
        $stmt->execute([$productName, $categoryId, $image1]);
    }

    echo "Data imported successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

