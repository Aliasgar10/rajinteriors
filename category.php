<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <style>
        /* ============================ */
        /*         GLOBAL STYLES       */
        /* ============================ */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            color: #333;
        }
        
        /* Container for all category items */
        .parent-categories-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ============================ */
        /*     CATEGORY ITEM CARD      */
        /* ============================ */
        .portfolio_masonry_grid_wrapper {
            position: relative;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .portfolio_masonry_grid_wrapper:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .portfolio_masonry_img img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }
        figure {
            margin: 0;
        }
        figcaption {
            padding: 15px;
        }
        .portfolio_masonry_content h3 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
            color: #333;
        }

        /* Optional borders used in your snippet */
        .border.one, .border.two {
            display: none; /* Hidden for cleaner look, remove if you want them */
        }

        /* Invisible link that covers the entire card if there's no children */
        .parent-category-link {
            position: absolute;
            top: 0; left: 0; 
            width: 100%; height: 100%;
            z-index: 10;
            text-decoration: none;
        }

        /* ============================ */
        /*       POPUP STYLES          */
        /* ============================ */
        .open-popup-btn {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            text-decoration: none;
            z-index: 10;
        }

        /* Overlay background for popup */
        .popup-overlay {
            position: fixed;
            display: none; /* Hidden by default */
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 9999; 
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }

        /* Popup box */
        .popup-content {
            background: #fff;
            padding: 20px;
            position: relative;
            max-width: 600px;
            width: 90%;
            margin: 40px auto;
            border-radius: 6px;
        }

        .popup-content h2 {
            margin: 0 0 15px;
            font-size: 22px;
        }

        /* Grid layout for child categories inside popup */
        .child-category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .child-category-item {
            background: #f9f9f9;
            border-radius: 4px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .child-category-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .child-category-link {
            display: block;
            text-decoration: none;
            color: #333;
        }

        .child-category-img img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .child-category-item:hover .child-category-link {
            color: #007bff; /* change text color on hover */
        }

        /* Close button for popup */
        .close-popup-btn {
            cursor: pointer;
            background: #666;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="parent-categories-container">
    <?php
        // Database connection
        $host = "localhost";
        $username = "rajinteriors";
        $password = "7ku~3AksgI75Edzrp";
        $database = "rajinteriors";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch parent categories
            $stmt = $pdo->prepare("SELECT id, category_name, thumbnail 
                                   FROM category_table 
                                   WHERE parent_id = 0 
                                   ORDER BY sort_order ASC");
            $stmt->execute();
            $parentCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Output parent categories as HTML
            foreach ($parentCategories as $category) {
                // Check if the category has child categories
                $childStmt = $pdo->prepare("SELECT id, category_name, thumbnail 
                                            FROM category_table 
                                            WHERE parent_id = :parent_id");
                $childStmt->bindParam(':parent_id', $category['id'], PDO::PARAM_INT);
                $childStmt->execute();
                $childCategories = $childStmt->fetchAll(PDO::FETCH_ASSOC);

                echo '<div class="portfolio_masonry_grid_wrapper gallery_grid_item tg_two_cols portfolio-1 tile scale-anm all no_filter">';
                echo '  <div class="portfolio_masonry_img">';
                // Display parent category's thumbnail
                echo '      <img src="uploads/assets/images/' . htmlspecialchars($category['thumbnail']) . '" alt="">';
                echo '  </div>';
                echo '  <figure><figcaption>';
                echo '      <div class="border one"><div></div></div>';
                echo '      <div class="border two"><div></div></div>';
                echo '      <div class="portfolio_masonry_content">';
                echo '          <h3>' . htmlspecialchars($category['category_name']) . '</h3>';
                echo '      </div>';
                echo '  </figcaption></figure>';

                // If child categories exist, add a button (invisible link) to open popup
                if (!empty($childCategories)) {
                    echo '  <a class="open-popup-btn" data-category="' . $category['id'] . '"></a>';
                    // Popup Overlay
                    echo '  <div class="popup-overlay" id="popup-' . $category['id'] . '">';
                    echo '      <div class="popup-content">';
                    echo '          <h2>' . htmlspecialchars($category['category_name']) . '</h2>';
                    echo '          <div class="child-category-grid">';
                    foreach ($childCategories as $child) {
                        echo '              <div class="child-category-item">';
                        echo '                  <a href="category.page?id=' . $child['id'] . '" class="child-category-link">';
                        echo '                      <div class="child-category-img">';
                        echo '                          <img src="uploads/assets/categories/' . htmlspecialchars($child['thumbnail']) . '" alt="">';
                        echo '                      </div>';
                        echo '                      ' . htmlspecialchars($child['category_name']);
                        echo '                  </a>';
                        echo '              </div>';
                    }
                    echo '          </div>';
                    echo '          <button class="close-popup-btn">Close</button>';
                    echo '      </div>';
                    echo '  </div>';
                } else {
                    // No child categories => Link directly to parent
                    echo '  <a href="category.page?id=' . $category['id'] . '" class="parent-category-link"></a>';
                }

                echo '</div>';
            }
        } catch (PDOException $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
    ?>
</div>

<script>
    // Simple JS to open/close popup overlays
    document.addEventListener('DOMContentLoaded', function() {
        const openBtns = document.querySelectorAll('.open-popup-btn');
        const closeBtns = document.querySelectorAll('.close-popup-btn');
        
        // When we click the "open popup" link
        openBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = this.getAttribute('data-category');
                const popup = document.getElementById('popup-' + categoryId);
                if (popup) {
                    popup.style.display = 'flex'; // Show the popup
                }
            });
        });

        // When we click "Close" inside the popup
        closeBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const popupContent = this.closest('.popup-overlay');
                popupContent.style.display = 'none';
            });
        });

        // Also close popup if user clicks outside the .popup-content
        document.querySelectorAll('.popup-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    overlay.style.display = 'none';
                }
            });
        });
    });
</script>

</body>
</html>
