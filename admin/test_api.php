<?php
error_reporting(E_ALL);
// Display errors on the screen
ini_set('display_errors', 1);
// Log errors to a file (optional)
ini_set('log_errors', 1);

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

// Fetch CSV content from URL
$csvContent = @file_get_contents($filePath);
if ($csvContent === false) {
    die("File not found or inaccessible: $filePath");
}

// Parse CSV data
$rows = array_map('str_getcsv', explode(PHP_EOL, $csvContent));
$header = array_shift($rows); // Remove header row

// Truncate existing tables
$pdo->exec("TRUNCATE TABLE products");
$pdo->exec("TRUNCATE TABLE category_table");

// Cache for categories to avoid duplicate entries
$categoriesCache = [];

$categoriesAdded = 0;
$productsAdded = 0;

// Temporary storage for parent category thumbnails
$parentThumbnails = [];

foreach ($rows as $row) {
    if (count($row) < count($header)) {
        continue; // Skip incomplete rows
    }
    $row = array_combine($header, $row); // Map header row to values

    $productName = trim($row['Product-Name']); // Product Name
    $categoryName = trim($row['Category']); // Category
    $childCategoryName = trim($row['Child-category']); // Child Category
    $thumbnail = trim($row['Thumbnail']); // Thumbnail
    $image1 = trim($row['Image-1']); // Image-1
    $parentOrder = trim($row['Parent-order']); // Parent Order

    // Insert or get parent category ID
    if (!isset($categoriesCache[$categoryName])) {
        $stmt = $pdo->prepare("INSERT INTO category_table (category_name, parent_id, thumbnail, sort_order) VALUES (?, ?, NULL, ?)");
        $stmt->execute([$categoryName, 0, $parentOrder]); // Initialize thumbnail as NULL
        $parentId = $pdo->lastInsertId();
        $categoriesCache[$categoryName] = $parentId;
        $categoriesAdded++;

        // Store the first image as a potential thumbnail for the parent category
        if (!isset($parentThumbnails[$categoryName])) {
            $parentThumbnails[$categoryName] = $thumbnail;
        }
    } else {
        $parentId = $categoriesCache[$categoryName];
    }

    // Insert or get child category ID
    $categoryId = $parentId;
    if ($childCategoryName) {
        $childKey = $categoryName . '>' . $childCategoryName;
        if (!isset($categoriesCache[$childKey])) {
            $stmt = $pdo->prepare("INSERT INTO category_table (category_name, parent_id, thumbnail, sort_order) VALUES (?, ?, ?, NULL)");
            $stmt->execute([$childCategoryName, $parentId, $thumbnail]); // Save thumbnail for child category
            $categoryId = $pdo->lastInsertId();
            $categoriesCache[$childKey] = $categoryId;
            $categoriesAdded++;
        } else {
            $categoryId = $categoriesCache[$childKey];
        }

        // Update parent thumbnail if not already set
        if ($parentThumbnails[$categoryName] === null) {
            $parentThumbnails[$categoryName] = $thumbnail;
        }
    }

    // Insert product into the products table
    $stmt = $pdo->prepare("INSERT INTO products (name, category_id, images) VALUES (?, ?, ?)");
    $stmt->execute([$productName, $categoryId, $image1]);
    $productsAdded++;
}

// Update parent categories with their thumbnails
foreach ($parentThumbnails as $categoryName => $thumbnail) {
    if ($thumbnail) {
        $stmt = $pdo->prepare("UPDATE category_table SET thumbnail = ? WHERE category_name = ? AND parent_id = 0");
        $stmt->execute([$thumbnail, $categoryName]);
    }
}

// Update the status of the processed file
$updateStmt = $pdo->prepare("UPDATE google_sheet SET status = 1 WHERE path = ?");
$updateStmt->execute([$filePath]);

// Display summary
echo "Data imported successfully.<br>";
echo "Categories added: $categoriesAdded<br>";
echo "Products added: $productsAdded<br>";

?>
