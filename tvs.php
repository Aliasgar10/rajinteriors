<?php 
    error_reporting(E_ALL);
    // Display errors on the screen
    ini_set('display_errors', 1);
    // Log errors to a file (optional)
    ini_set('log_errors', 1);




?>

<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>

    <link type="text/css" media="all" href="css/style.css" rel="stylesheet">
    <link type="text/css" media="only screen and (max-width: 768px)" href="css/responsive.css" rel="stylesheet">

    <title>TVS</title>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">



    <link rel="icon" href="upload/TG-Thumb.png" sizes="32x32">
    <link rel="icon" href="upload/TG-Thumb.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="upload/TG-Thumb.png">
<style>
    .wrapper{
        padding-top: 0px !important;
    }
</style>

</head>

<body data-rsssl="1" class="page-template-default page page-id-1956 woocommerce-no-js tg_lightbox_black leftalign tg_footer_reveal elementor-default elementor-page elementor-page-1956">
    <div id="perspective" >



        <div id="wrapper">
            <?php include("inc_files/header3.php"); ?>


            <div id="page_content_wrapper">
                <div class="inner">
                    <div class="inner_wrapper">
                        <div class="sidebar_content full_width">
                            <div class="elementor elementor-2203">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section data-id="fe6bb34" style="background-color:#000000f2;" class="elementor-element elementor-element-fe6bb34 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div data-id="c3db2fa" class="elementor-element elementor-element-c3db2fa elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div data-id="2d198d3" class="elementor-element elementor-element-2d198d3 animated fadeInUp animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-element_type="text-editor.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-text-editor elementor-clearfix pl40">
                                                                            <p style="color:#fff;">Explore</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div data-id="17fc4fd" class="elementor-element elementor-element-17fc4fd animated fadeInUp animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-element_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h2 class="elementor-heading-title elementor-size-default pl40" style="color:#fff;">Products</h2>
                                                                    </div>
                                                                </div>
                                                                <div data-id="814c075" class="elementor-element elementor-element-814c075 animated fadeIn animated-fast elementor-invisible elementor-widget elementor-widget-architecturer-portfolio-masonry" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:400}" data-element_type="architecturer-portfolio-masonry.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="portfolio_masonry_container">
                                                                        <div class="portfolio_masonry_content_wrapper gallery_grid_content_wrapper do_masonry portfolio_masonry layout_tg_two_cols" data-cols="2">
                                                                            <?php
                                                                                // Database connection
                                                                                $host = "localhost";
                                                                                $username = "rajinteriors";
                                                                                $password = "7ku~3AksgI75Edzrp";
                                                                                $database = "rajinteriors";

                                                                                $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                                                // Fetch parent categories
                                                                                $stmt = $pdo->prepare("SELECT id, category_name, thumbnail FROM category_table WHERE parent_id = 0");
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
                                                                                    echo '      <img src="assets/CATEGORY/' . htmlspecialchars($category['thumbnail']) . '" alt="">';
                                                                                    echo '  </div>';
                                                                                    echo '  <figure><figcaption>';
                                                                                    echo '      <div class="border one"><div></div></div>';
                                                                                    echo '      <div class="border two"><div></div></div>';
                                                                                    echo '      <div class="portfolio_masonry_content">';
                                                                                    echo '          <h3>' . htmlspecialchars($category['category_name']) . '</h3>';
                                                                                    echo '      </div>';
                                                                                    echo '  </figcaption></figure>';

                                                                                    // Add a button to open popup if child categories exist
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
                                                                                        echo '  <a href="categories.php?id=' . $category['id'] . '" class="parent-category-link"></a>';
                                                                                    }

                                                                                    echo '</div>';
                                                                                }
                                                                            ?>
                                                                                <style>
                                                                                    @media only screen and (max-width: 480px){
                                                                                        .child-category-grid {
                                                                                            grid-template-columns: repeat(2, 1fr) !important;
                                                                                            gap: 10px !important;
                                                                                        }
                                                                                        .popup-content {
                                                                                            position: absolute;
                                                                                            top: 63% !important;
                                                                                            height: 713px !important;
                                                                                        }
                                                                                        .child-category-link {
                                                                                            border: none !important;
                                                                                        }

                                                                                    }
                                                                                    .popup-content h2{
                                                                                        color: #fff !important;
                                                                                    }
                                                                                    .child-category-grid {
                                                                                        display: grid;
                                                                                        grid-template-columns: repeat(3, 1fr);
                                                                                        gap: 20px;
                                                                                        margin-top: 20px;
                                                                                    }

                                                                                    .child-category-item {
                                                                                        text-align: center;
                                                                                    }

                                                                                    .child-category-img {
                                                                                        height: 120px;
                                                                                        width: 120px;
                                                                                        margin: 0 auto 10px auto;
                                                                                        display: flex;
                                                                                        justify-content: center;
                                                                                        align-items: center;
                                                                                        overflow: hidden;
                                                                                    }

                                                                                    .child-category-img img {
                                                                                        max-width: 100%;
                                                                                        max-height: 100%;
                                                                                        object-fit: contain;
                                                                                        border-radius: 8px;
                                                                                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                                                                    }

                                                                                    .child-category-link {
                                                                                        display: block;
                                                                                        color: orange;
                                                                                        text-decoration: none;
                                                                                        /* border: 2px solid white; */
                                                                                        padding: 5px;
                                                                                        border-radius: 5px;
                                                                                        transition: background-color 0.3s, color 0.3s;
                                                                                        position: relative !important;
                                                                                        color: #fff;
                                                                                        text-decoration: none;
                                                                                        margin: 10px 0;
                                                                                    }

                                                                                    .child-category-link:hover {
                                                                                        background-color: orange;
                                                                                        color: white;
                                                                                    }

                                                                                    .popup-overlay {
                                                                                        display: none;
                                                                                        position: fixed;
                                                                                        top: 0;
                                                                                        left: 0;
                                                                                        width: 100%;
                                                                                        height: 100%;
                                                                                        background: rgba(0, 0, 0, 0.8);
                                                                                        z-index: 10000;
                                                                                    }

                                                                                    .popup-content {
                                                                                        position: absolute;
                                                                                        top: 53%;
                                                                                        left: 50%;
                                                                                        transform: translate(-50%, -50%);
                                                                                        background: #222;
                                                                                        padding: 20px;
                                                                                        border-radius: 8px;
                                                                                        text-align: center;
                                                                                        color: #fff;
                                                                                        width: 100%;
                                                                                        max-width: 600px;
                                                                                        height: 690px;
                                                                                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
                                                                                    }

                                                                                    .close-popup-btn {
                                                                                        margin-top: 20px;
                                                                                        background: #ff0000;
                                                                                        color: #fff;
                                                                                        border: none;
                                                                                        padding: 10px 20px;
                                                                                        cursor: pointer;
                                                                                        border-radius: 5px;
                                                                                    }

                                                                                    .close-popup-btn:hover {
                                                                                        background: #cc0000;
                                                                                    }
                                                                                </style>                                                                                
                                                                                <script>
                                                                                    document.querySelectorAll('.open-popup-btn').forEach(button => {
                                                                                        button.addEventListener('click', function () {
                                                                                            const popupId = `popup-${this.getAttribute('data-category')}`;
                                                                                            document.getElementById(popupId).style.display = 'block';
                                                                                        });
                                                                                    });

                                                                                    document.querySelectorAll('.close-popup-btn').forEach(button => {
                                                                                        button.addEventListener('click', function () {
                                                                                            this.closest('.popup-overlay').style.display = 'none';
                                                                                        });
                                                                                    });

                                                                                    document.querySelectorAll('.popup-overlay').forEach(overlay => {
                                                                                        overlay.addEventListener('click', function (e) {
                                                                                            if (e.target === this) {
                                                                                                this.style.display = 'none';
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- <section data-id="9573317" class="elementor-element elementor-element-9573317 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div data-id="c750648" class="elementor-element elementor-element-c750648 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div data-id="afe4d90" class="elementor-element elementor-element-afe4d90 elementor-widget elementor-widget-architecturer-background-list" data-element_type="architecturer-background-list.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="tg_background_list_wrapper four_cols">
                                                                            <div class="tg_background_list_column ">
                                                                                <div class="tg_background_list_content">
                                                                                    <div class="tg_background_list_title">
                                                                                        <h3>Planning</h3>
                                                                                    </div>
                                                                                    <div class="tg_background_list_link">
                                                                                        <div class="tg_background_list_desc">Leather detail shoulder contrastic colour contour stunning silhouette working peplum.</div>
                                                                                        <a class="button ghost" href="#">Learn More</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <figure class="tg_background_img hover">
                                                                                <div class="tg_background_list_overlay"></div>
                                                                                <img src="upload/xModern-Eco-friendly-House-2.jpg.pagespeed.ic_.el4ZtL7FI9.jpg" alt="">
                                                                            </figure>
                                                                            <div class="tg_background_list_column ">
                                                                                <div class="tg_background_list_content">
                                                                                    <div class="tg_background_list_title">
                                                                                        <h3>Construction</h3>
                                                                                    </div>
                                                                                    <div class="tg_background_list_link">
                                                                                        <div class="tg_background_list_desc">Leather detail shoulder contrastic colour contour stunning silhouette working peplum.</div>
                                                                                        <a class="button ghost" href="#">Learn More</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <figure class="tg_background_img ">
                                                                                <div class="tg_background_list_overlay"></div>
                                                                                <img src="upload/modern-wood-house-1.jpg" alt="">
                                                                            </figure>
                                                                            <div class="tg_background_list_column ">
                                                                                <div class="tg_background_list_content">
                                                                                    <div class="tg_background_list_title">
                                                                                        <h3>Interior</h3>
                                                                                    </div>
                                                                                    <div class="tg_background_list_link">
                                                                                        <div class="tg_background_list_desc">Leather detail shoulder contrastic colour contour stunning silhouette working peplum.</div>
                                                                                        <a class="button ghost" href="#">Learn More</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <figure class="tg_background_img ">
                                                                                <div class="tg_background_list_overlay"></div>
                                                                                <img src="upload/Sleek-and-Modern-Interior-by-Marcelo-Mota-Arquitectura-3.jpg" alt="">
                                                                            </figure>
                                                                            <div class="tg_background_list_column last">
                                                                                <div class="tg_background_list_content">
                                                                                    <div class="tg_background_list_title">
                                                                                        <h3>Landscape</h3>
                                                                                    </div>
                                                                                    <div class="tg_background_list_link">
                                                                                        <div class="tg_background_list_desc">Leather detail shoulder contrastic colour contour stunning silhouette working peplum.</div>
                                                                                        <a class="button ghost" href="#">Learn More</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <figure class="tg_background_img ">
                                                                                <div class="tg_background_list_overlay"></div>
                                                                                <img src="upload/A1KvjZmiERL.jpg" alt="">
                                                                            </figure>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>

        </div>
        <?php include("inc_files/footer.php"); ?>
        <a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
        <input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="1">
        <input type="hidden" id="tg_sidebar_sticky" name="tg_sidebar_sticky" value="1">
        <input type="hidden" id="pp_topbar" name="pp_topbar" value="">
    </div>


    <script src="js/plugins/jquery.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery-migrate.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/core.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/widget.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/mouse.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/resizable.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/draggable.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/button.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/position.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/dialog.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/menu.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/imagesloaded.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/masonry.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.lazy.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/modulobox.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/typed.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/typed.fe.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.blockUI.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/js.cookie.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/effect.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/waypoints.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/tilt.jquery.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.stellar.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/custom_plugins.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/custom.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.sticky-kit.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.tooltipster.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/tweenmax.min.js" defer="defer" type="text/javascript"></script>
    <script type='text/javascript'>
        var tgAjax = {
            "ajaxurl": "https:\/\/themes.themegoods.com\/architecturer\/demo\/wp-admin\/admin-ajax.php",
            "ajax_nonce": "8d4e4ec118"
        };
    </script>
    <script src="js/plugins/architecturer-elementor.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery.cookie.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/dialog-man.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/coffescript.min.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/swiper.jquery.min.js" defer="defer" type="text/javascript"></script>
    <script type='text/javascript'>
        var elementorFrontendConfig = {
            "isEditMode": "",
            "is_rtl": "",
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "version": "2.3.5",
            "urls": {
                "assets": "https:\/\/themes.themegoods.com\/architecturer\/demo\/wp-content\/plugins\/elementor\/assets\/"
            },
            "settings": {
                "page": [],
                "general": {
                    "elementor_global_image_lightbox": "yes",
                    "elementor_enable_lightbox_in_editor": "yes"
                }
            },
            "post": {
                "id": 1877,
                "title": "Home 2",
                "excerpt": ""
            }
        };
    </script>
    <script src="js/plugins/frontend.min.js" defer="defer" type="text/javascript"></script>

</body>
</html>
