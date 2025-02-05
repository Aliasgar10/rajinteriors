<?php
    // Database connection
    $host = "localhost";
    $username = "rajinteriors";
    $password = "7ku~3AksgI75Edzrp";
    $database = "rajinteriors";

    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get category ID from URL
    $parent_id = $_GET['id'] ?? 0;

    // Fetch parent category details
    $parentStmt = $pdo->prepare("SELECT category_name FROM category_table WHERE id = :parent_id");
    $parentStmt->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
    $parentStmt->execute();
    $parentCategory = $parentStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch child categories for the selected parent category
    $childStmt = $pdo->prepare("SELECT id, category_name, thumbnail FROM category_table WHERE parent_id = :parent_id ORDER BY sort_order ASC");
    $childStmt->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
    $childStmt->execute();
    $childCategories = $childStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($parentCategory['category_name'] ?? 'Categories'); ?> - Raj Interiors</title>
    <style>
        /* Reset & Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Child Category Grid */
        .child-category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }

        .child-category-item {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
        }

        .child-category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        .child-category-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .child-category-item p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #444;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #ff9800;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease-in-out;
        }

        .back-btn:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($parentCategory['category_name'] ?? 'Categories'); ?></h1>

    <?php if (!empty($childCategories)): ?>
        <div class="child-category-grid">
            <?php foreach ($childCategories as $child): ?>
                <div class="child-category-item">
                    <a href="categories.php?id=<?php echo $child['id']; ?>">
                        <img src="uploads/assets/categories/<?php echo htmlspecialchars($child['thumbnail']); ?>" alt="<?php echo htmlspecialchars($child['category_name']); ?>">
                        <p><?php echo htmlspecialchars($child['category_name']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No child categories found.</p>
    <?php endif; ?>

    <a href="index.php" class="back-btn">Back to Home</a>
</div>

</body>
</html>
