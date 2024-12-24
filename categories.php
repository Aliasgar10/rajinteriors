<?php 
    include("connection/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>

    <link type="text/css" media="all" href="css/style.css" rel="stylesheet">
    <link type="text/css" media="only screen and (max-width: 768px)" href="css/responsive.css" rel="stylesheet">

    <title>Raj Interiors</title>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">



    <link rel="icon" href="upload/TG-Thumb.png">
    <link rel="icon" href="upload/TG-Thumb.png">
    <!-- <link rel="apple-touch-icon-precomposed" href="upload/TG-Thumb.png"> -->

<style>
    #page_content_wrapper:not(.wide), .page_content_wrapper:not(.wide) {
        width: 100vw !important;
        /* margin: 5px !important; */
        background:#000;
    }
</style>
</head>

<body data-rsssl="1" class="home page-template-default page page-id-1824 woocommerce-no-js tg_menu_transparent tg_lightbox_black leftalign tg_footer_reveal elementor-default elementor-page elementor-page-1824">
    <div id="perspective" style="">



        <div id="wrapper" class="hasbg transparent">
            
        <?php include("inc_files/header3.php"); ?>

            <div id="page_content_wrapper" class="">
                <div class="inner">
                    <div class="inner_wrapper">
                        <div class="sidebar_content full_width">
                            <div class="elementor elementor-1877">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">                                                                       
                                       <!-- Gallery Section -->
                                       <?php 
                                            error_reporting(E_ALL);
                                            // Display errors on the screen
                                            ini_set('display_errors', 1);
                                            // Log errors to a file (optional)
                                            ini_set('log_errors', 1);

                                            ?>
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
                                                #loadMoreBtn{
                                                    height: 3em;
                                                    width: 9em;
                                                    background: white;
                                                    color: #000;
                                                    font-size: smaller;
                                                    cursor: pointer;
                                                }
                                                #loadMoreBtn:hover {
                                                    height: 3em;
                                                    width: 9em;
                                                    border:2px solid white;
                                                    background: transparent;
                                                    color: white;
                                                    font-size: smaller;
                                                    cursor: pointer;
                                                }
                                                #post{
                                                    margin: 5px;
                                                    border: 6px solid wheat;
                                                    padding: 5px
                                                }
                                                .text{
                                                    text-align: center;
                                                    color:#fff;
                                                }
                                            </style>

                                            <section id="abcc" data-id="fb4c59e" class="elementor-element elementor-element-fb4c59e animated fadeInUp animated-fast elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible elementor-section elementor-top-section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:200}" data-element_type="section">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default" id="h11">Gallery</h2>
                                                </div>
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div data-id="27d6030" class="elementor-element elementor-element-27d6030 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div data-id="ef36638" class="elementor-element elementor-element-ef36638 elementor-widget elementor-widget-photographer-blog-posts" data-element_type="photographer-blog-posts.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="blog_post_content_wrapper layout_grid">
                                                                                <div id="imageContainer">
                                                                                    <?php
                                                                                        $query = "SELECT file_url, file_name, file_type FROM uploads WHERE file_type = 'image' AND category_id=1 LIMIT 9"; // Initial limit
                                                                                        $result = $conn->query($query);

                                                                                        if ($result->num_rows > 0) {
                                                                                            while ($row = $result->fetch_assoc()) {
                                                                                                $fileUrl = $row['file_url'];
                                                                                    ?>
                                                                                        <div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                                                                            <div class="post_wrapper" id="post">
                                                                                                <div class="post_img static">
                                                                                                    <div class="post_img_hover">
                                                                                                        <img src="<?php echo $fileUrl; ?>" alt="<?php echo $row['file_name']; ?>" loading="lazy">
                                                                                                        <a href="#"></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="text">
                                                                                                    <?php echo $row['file_name']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php 
                                                                                            }
                                                                                        } else {
                                                                                            echo "No images found.";
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                                

                                                                            </div>
                                                                            <br class="clear">
                                                                            <div class="load" style="display:flex; justify-content:center; align-items:center;">
                                                                                <button id="loadMoreBtn">Load More</button>
                                                                            </div>
                                                                            <br>

                                                                            <!-- <script>
                                                                                let offset = 9; // Initial offset for pagination
                                                                                document.getElementById('loadMoreBtn').addEventListener('click', function () {
                                                                                    fetch(`inc_files/loadImages.php?offset=${offset}`)
                                                                                        .then(response => response.json())
                                                                                        .then(data => {
                                                                                            if (data.success) {
                                                                                                // Append the new HTML to the container
                                                                                                document.getElementById('imageContainer').innerHTML += data.html;
                                                                                                offset += 9; // Increment offset for the next fetch
                                                                                            } else {
                                                                                                // Hide the Load More button
                                                                                                document.getElementById('loadMoreBtn').style.display = 'none';
                                                                                                
                                                                                                // Show a temporary message
                                                                                                const messageDiv = document.createElement('div');
                                                                                                messageDiv.id = 'noMoreImagesMessage';
                                                                                                messageDiv.innerText = data.message;
                                                                                                document.querySelector('.blog_post_content_wrapper').appendChild(messageDiv);

                                                                                                // Remove the message after 10 seconds
                                                                                                setTimeout(() => {
                                                                                                    messageDiv.remove();
                                                                                                }, 10000);
                                                                                            }
                                                                                        })
                                                                                        .catch(error => console.error('Error fetching images:', error));
                                                                                });

                                                                            </script> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        <!-- end Gallery Section -->            
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
