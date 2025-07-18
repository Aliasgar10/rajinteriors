<?php 
    error_reporting(E_ALL);
    // Display errors on the screen
    ini_set('display_errors', 1);
    // Log errors to a file (optional)
    ini_set('log_errors', 1);
?>

<?php
    // Database connection
    // $host = "localhost";
    // $username = "rajinteriors";
    // $password = "7ku~3AksgI75Edzrp";
    // $database = "rajinteriors";
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "rajinteriors";
    // Database connection
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $categoryId = $_GET['id'];

    // Display products for the category
    $stmt = $pdo->prepare("SELECT name, images FROM products WHERE category_id = ?");
    $stmt->execute([$categoryId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>

    <link type="text/css" media="all" href="css/style.css" rel="stylesheet">
    <link type="text/css" media="only screen and (max-width: 768px)" href="css/responsive.css" rel="stylesheet">

    <title>TVS-Products</title>


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

        .type-post.blog-posts-grid {
            display:flex;
            justify-content:center;
            align-items: center;
        }
        .elementor-section-stretched {
            z-index: 0 !important;
        }
    </style>

</head>

<body data-rsssl="1" class="page-template-default page page-id-1956 woocommerce-no-js tg_lightbox_black leftalign tg_footer_reveal elementor-default elementor-page elementor-page-1956">
    <div id="perspective" >



        <div id="wrapper">
            <?php include("header3.php"); ?>


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
                                                                        <style>
                                                                            #h11{
                                                                                padding-left: 5px;
                                                                                font-size: 'xx-large';
                                                                                font-weight: 500;
                                                                                padding-top: 50px;
                                                                            }
                                                                            @media only screen and (max-width: 480px) and (orientation: portrait) {
                                                                                #abcc {
                                                                                    margin-top: 30vh !important;
                                                                                }
                                                                                #h11{
                                                                                    margin-left: 20px;
                                                                                }
                                                                                #post{
                                                                                    width: 300px !important;
                                                                                }
                                                                            }
                                                                            @font-face {
                                                                            font-family: 'Operetta Bold';
                                                                            src: url('inc_files/Operetta52-Bold.otf') format('opentype');
                                                                            font-weight: bold;
                                                                            font-style: normal;
                                                                            }
                                                                            #h11{
                                                                                font-family: 'Operetta Bold';
                                                                                font-weight: bold;
                                                                                font-size:40px;
                                                                                text-align: center;
                                                                            }                                                                            
                                                                            #post{
                                                                                margin: 5px;
                                                                                border: 6px solid wheat;
                                                                                padding: 5px;
                                                                                width:100%;
                                                                            }
                                                                            .text {
                                                                                /* text-align: center; */
                                                                                color: #fff;
                                                                                display: flex;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                                height: 30px;                                                    
                                                                                font-weight: 900;
                                                                                font-size: medium;
                                                                            }
                                                                            /* .text:hover{
                                                                                background:#fff;
                                                                                color:#000;
                                                                            } */
                                                                            .post_img img {
                                                                                max-width: 100%;
                                                                                /* height: auto !important; */
                                                                                object-fit: contain !important;
                                                                                height: 100% !important;
                                                                            }
                                                                            .post_imgg_hover {
                                                                                position: relative;
                                                                                display: inline-block;
                                                                                /* width: 250px; */
                                                                                height: 220px !important;
                                                                                min-height: 150px;
                                                                                display: flex !important;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                                background: #fff !important;
                                                                            }
                                                                            .post_img {
                                                                                margin-bottom: 10px !important;
                                                                            }
                                                                        </style>
                                                                        <!-- For popup -->
                                                                        <style>
                                                                            /* Style for the popup overlay */
                                                                            .popup-overlay-12345 {
                                                                                position: fixed;
                                                                                top: 0;
                                                                                left: 0;
                                                                                width: 100%;
                                                                                height: 100%;
                                                                                background: rgba(0, 0, 0, 0.8);
                                                                                display: none;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                                z-index: 1000;
                                                                            }

                                                                            /* Style for the popup image */
                                                                            .popup-image-12345 {
                                                                                max-width: 70%; /* Reduced size to fit better with sticky headers */
                                                                                max-height: 70%;
                                                                                border: 3px solid white;
                                                                                border-radius: 8px;
                                                                            }

                                                                            /* Style for close button */
                                                                            .close-btn-12345 {
                                                                                position: absolute;
                                                                                top: 10px; /* Adjusted for sticky header */
                                                                                right: 10px;
                                                                                color: white;
                                                                                font-size: 24px; /* Slightly smaller icon */
                                                                                cursor: pointer;
                                                                                font-weight: bold;
                                                                                background: rgba(0, 0, 0, 0.5);
                                                                                border-radius: 50%;
                                                                                width: 36px;
                                                                                height: 36px;
                                                                                display: flex;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                            }

                                                                            /* Ensure body does not scroll when popup is open */
                                                                            body.popup-active {
                                                                                overflow: hidden;
                                                                            }
                                                                        </style>
                                                                        <div class="elementor-container elementor-column-gap-default">
                                                                            <div class="elementor-row">
                                                                                <div data-id="27d6030" class="elementor-element elementor-element-27d6030 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                                        <div class="elementor-widget-wrap">
                                                                                            <div data-id="ef36638" class="elementor-element elementor-element-ef36638 elementor-widget elementor-widget-photographer-blog-posts" data-element_type="photographer-blog-posts.default">
                                                                                                <div class="elementor-widget-container">
                                                                                                    <div class="blog_post_content_wrapper layout_grid">

                                                                                                    <div id="imageContainer">
                                                                                                        <?php foreach ($products as $product) { ?>
                                                                                                            <div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                                                                                                <div class="post_wrapper" id="post">
                                                                                                                    <div class="post_img static">
                                                                                                                        <div class="post_imgg_hover">
                                                                                                                            <img src="uploads/assets/categories/<?php echo htmlspecialchars($product['images']); ?>" 
                                                                                                                                alt="<?php echo htmlspecialchars($product['images']); ?>" 
                                                                                                                                loading="lazy" 
                                                                                                                                class="clickable-image-12345">
                                                                                                                            <a href="#"></a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="text">
                                                                                                                        <?php echo htmlspecialchars($product['name']); ?>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                                                                    </div>
                                                                                                    <!-- Popup Overlay -->
                                                                                                    <div class="popup-overlay-12345" id="popupOverlay">
                                                                                                        <span class="close-btn-12345" id="closeBtn">&times;</span>
                                                                                                        <img src="" alt="Popup Image" class="popup-image-12345" id="popupImage">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        // Get the popup elements
                                                                                                        const popupOverlay = document.getElementById('popupOverlay');
                                                                                                        const popupImage = document.getElementById('popupImage');
                                                                                                        const closeBtn = document.getElementById('closeBtn');

                                                                                                        // Add click event listener to all images
                                                                                                        document.querySelectorAll('.clickable-image-12345').forEach(image => {
                                                                                                            image.addEventListener('click', (e) => {
                                                                                                                popupImage.src = e.target.src; // Set the popup image source
                                                                                                                popupOverlay.style.display = 'flex'; // Show the popup
                                                                                                            });
                                                                                                        });

                                                                                                        // Close the popup when the close button is clicked
                                                                                                        closeBtn.addEventListener('click', () => {
                                                                                                            popupOverlay.style.display = 'none';
                                                                                                        });

                                                                                                        // Close the popup when clicking outside the image
                                                                                                        popupOverlay.addEventListener('click', (e) => {
                                                                                                            if (e.target === popupOverlay) {
                                                                                                                popupOverlay.style.display = 'none';
                                                                                                            }
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
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>

        </div>
        <?php include("inc_files/vogue_footer.php"); ?>
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
