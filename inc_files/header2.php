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
?>
<div class="header_style_wrapper">
    <div class="top_bar hasbg">
        <div class="standard_wrapper">
            <div id="logo_wrapper">
                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper hidden" href="index.php">
                            <img src="imagg/logo@2x.png" alt="" width="310" height="70">
                        </a>
                    </div>
                </div>
                <div id="logo_transparent" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo_transparent" class="logo_wrapper default" href="index.php">
                            <img src="imagg/logo@2x.png" alt="" width="310" height="70">
                        </a>
                    </div>
                </div>
            </div>
            <div id="menu_wrapper">
                <style>
                    .nav li a{
                        font-size: 18px !important;
                    }
                    .nav a{
                        text-transform: uppercase !important;
                    }
                </style>
                <!-- Desktop Menu -->
                <div id="nav_wrapper">
                    <div class="nav_wrapper_inner">
                        <div id="menu_border_wrapper">
                            <div class="menu-main-menu-container">
                                <ul id="main_menu" class="nav" style="margin-top: 13px;">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="menu-item menu-item-has-children"><a href="tvs.php">The Vogue Studio</a>
                                        <?php
                                            // Fetch parent categories
                                            $stmt = $pdo->prepare("SELECT id, category_name FROM category_table WHERE parent_id = 0 ORDER BY sort_order");
                                            $stmt->execute();
                                            $parentCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            // Fetch child categories for each parent
                                            $categories = [];
                                            foreach ($parentCategories as $parent) {
                                                $stmt = $pdo->prepare("SELECT id, category_name FROM category_table WHERE parent_id = ? ORDER BY sort_order");
                                                $stmt->execute([$parent['id']]);
                                                $children = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                $categories[] = [
                                                    'id' => $parent['id'],
                                                    'name' => $parent['category_name'],
                                                    'children' => $children
                                                ];
                                            }
                                        ?>
                                        <?php
                                            // Generate the HTML menu
                                            echo '<ul class="menu">';
                                            foreach ($categories as $category) {
                                                echo '<li class="menu-item menu-item-has-children">';
                                                // Check if the parent category has children
                                                if (!empty($category['children'])) {
                                                    echo '<a href="category.php?id='.htmlspecialchars($category['id']).'" style="text-transform: uppercase;">' . htmlspecialchars($category['name']) . '</a>'; // Blank link for parent with children
                                                    echo '<ul class="sub-menu">';
                                                    foreach ($category['children'] as $child) {
                                                        echo '<li class="menu-item">';
                                                        echo '<a href="categories.php?id=' . $child['id'] . '" style="text-transform: uppercase;"><span class="subunder">- </span>' . htmlspecialchars($child['category_name']) . '</a>';
                                                        echo '</li>';
                                                    }
                                                    echo '</ul>';
                                                } else {
                                                    echo '<a href="categories.php?id=' . $category['id'] . '" style="text-transform: uppercase;">' . htmlspecialchars($category['name']) . '</a>'; // Valid link for parent without children
                                                }
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        ?>
                                    </li>
                                    <li class="#"><a href="gallery.php">Gallery</a></li>
                                    <li><a href="service.php">Services</a></li>
                                    <li class="#"><a href="contact-1.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu (Hamburger Icon) -->
                <div id="mobile_menu_wrapper" style="display: none; color: grey;">
                    <button id="hamburger_icon" style="color: #b8b8b8;">&#9776;</button>
                    <div id="mobile_menu" style="display: none;">
                        <ul id="mobile_menu_items">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tvs.php">TVS</a>
                                <!-- <button class="submenu-toggle">+</button>
                                <ul class="sub-menu">
                                    <li><a href="test1.php">ABCD</a></li>
                                    <li><a href="home-10.html">ABCD</a></li>
                                    <li><a href="home-11.html">ABCD</a></li>
                                    <li><a href="home-12.html">ABCD &#8211; bjb</a></li>
                                </ul> -->
                            </li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="service.php">Services</a></li>
                            <li><a href="contact-1.php">Contact</a></li>
                            <li style="background:#000;"><a href="get_started.php" style="color:#fff;">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="get">
                <a href="get_started.php" class="geta">Get Started</a>
            </div>
            <style>
                #get{
                    /* border-radius: 0px; */
                    /* padding: 10px 20px; */
                    /* width: fit-content; */
                    position: absolute;
                    right: 0;
                    margin-top: 26px;
                    margin-right: 20px;
                }
                .geta{
                    padding: 10px 20px;
                    background-color: #333;
                    color:white;
                }  
                #get a:hover{
                    /* background:transparent; */
                    color:white;
                    border:2px solid #fff;
                }
            </style>
        </div>
    </div>
</div>

<style>
    /* #logo_wrapper{
        width: 15rem !important;
        height: 100% !important;
    }
    #logo_wrapper img{
        width: 100% !important;
        height: 100% !important;
    } */
    
    @media screen and (max-width: 480px) {
        #menu_border_wrapper {
            width: 140px !important;
        }
        #logo_wrapper {
            float: left !important;
            width: 0px !important;
        }
        #menu_wrapper {
            margin-top: 21px !important;
        }
    }

    /* Desktop Styles */
    #menu_wrapper #nav_wrapper {
        display: block;
    }

    #mobile_menu_wrapper {
        display: none;
    }
    #main_menu{
        margin-top:13px;
    }
    /* Mobile Styles */
    @media only screen and (max-width: 520px) {
        #menu_wrapper #nav_wrapper {
            display: none; /* Hide the desktop menu */
        }

        #mobile_menu_wrapper {
            display: block; /* Show the hamburger icon */
        }

        #mobile_menu {
            display: none;  /* Mobile menu hidden initially */
            background-color: beige;
            padding: 10px;
            position: absolute; /* Position the menu above other content */
            top: 88px; /* Adjust this to position the menu correctly below the hamburger */
            left: 0;
            width: 100%;
            z-index: 1000;  /* Ensure the mobile menu appears above other elements */
            margin: 1px 5px 0px -10px;
            border-radius: 10px;
        
        }

        #mobile_menu ul {
            list-style-type: none;
            padding-left: 0;
        }

        #mobile_menu li {
            margin: 10px 0;
            border-radius: 10px;
            padding: 5px;
        }
        #mobile_menu li:hover {
            background: #d3ced2;
        }

        #mobile_menu a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 10px;
        }

        /* Optional: Styling for the hamburger icon */
        #hamburger_icon {
            font-size: 30px;
            background: none;
            border: none;
            cursor: pointer;
        }
    }

</style>

<!-- Submenus style -->
<style>
    /* Hide submenus by default */
    .sub-menu {
        display: none;
        padding-left: 15px;
        list-style: none;
    }
    #get{
        display:block;
    }
    /* Submenu toggle button */
    .menu-item-has-children {
        position: relative;
    }

    .submenu-toggle {
        position: absolute;
        left: 57px;
        top: 59px;
        background: none;
        border: none;
        font-size: x-large;
        cursor: pointer;
        color: #333;
    }

    /* Mobile-specific styles */
    @media screen and (max-width: 768px) {
        #main_menu .sub-menu {
            display: none;
        }
        #get{
            display:none;
        }
    }

</style>
<!-- submenus script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const submenuToggles = document.querySelectorAll(".submenu-toggle");

        submenuToggles.forEach((toggle) => {
            toggle.addEventListener("click", function () {
                const submenu = this.nextElementSibling; // Target the submenu
                const isVisible = submenu.style.display === "block";

                submenu.style.display = isVisible ? "none" : "block";
                this.textContent = isVisible ? "+" : "−"; // Change toggle button text
            });
        });
    });

</script>