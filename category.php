<?php
// Database connection
$host = "localhost";
$username = "rajinteriors";
$password = "7ku~3AksgI75Edzrp";
$database = "rajinteriors";

$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch parent categories
$stmt = $pdo->prepare("SELECT id, category_name, thumbnail FROM category_table WHERE parent_id = 0 ORDER BY sort_order ASC");
$stmt->execute();
$parentCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output parent categories as HTML
foreach ($parentCategories as $category) {
    // Check if the category has child categories
    $childStmt = $pdo->prepare("SELECT id, category_name, thumbnail FROM category_table WHERE parent_id = :parent_id");
    $childStmt->bindParam(':parent_id', $category['id'], PDO::PARAM_INT);
    $childStmt->execute();
    $childCategories = $childStmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="portfolio_masonry_grid_wrapper gallery_grid_item tg_two_cols portfolio-1 tile scale-anm all no_filter">';
    echo '  <div class="portfolio_masonry_img">';
    echo '      <img src="uploads/assets/images/' . htmlspecialchars($category['thumbnail']) . '" alt="">';
    echo '  </div>';
    echo '  <figure><figcaption>';
    echo '      <div class="border one"><div></div></div>';
    echo '      <div class="border two"><div></div></div>';
    echo '      <div class="portfolio_masonry_content">';
    echo '          <h3>' . htmlspecialchars($category['category_name']) . '</h3>';
    echo '      </div>';
    echo '  </figcaption></figure>';

    // If child categories exist, open a popup
    if (!empty($childCategories)) {
        echo '  <a class="open-popup-btn" data-category="' . $category['id'] . '"></a>';
        echo '  <div class="popup-overlay" id="popup-' . $category['id'] . '">';
        echo '      <div class="popup-content">';
        echo '          <h2>' . htmlspecialchars($category['category_name']) . '</h2>';
        echo '          <div class="child-category-grid">';
        foreach ($childCategories as $child) {
            echo '          <div class="child-category-item">';
            echo '              <a href="categories.php?id=' . $child['id'] . '" class="child-category-link">';
            echo '              <div class="child-category-img">';
            echo '                  <img src="uploads/assets/categories/' . htmlspecialchars($child['thumbnail']) . '" alt="">';
            echo '              </div>';
            echo '              ' . htmlspecialchars($child['category_name']) . '</a>';
            echo '          </div>';
        }
        echo '          </div>';
        echo '          <button class="close-popup-btn">Close</button>';
        echo '      </div>';
        echo '  </div>';
    } else {
        // If no child categories exist, redirect to category.page instead of categories.php
        echo '  <a href="category.page?id=' . $category['id'] . '" class="parent-category-link"></a>';
    }

    echo '</div>';
}
?>
