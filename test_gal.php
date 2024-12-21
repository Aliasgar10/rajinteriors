<?php

error_reporting(E_ALL);
// Display errors on the screen
ini_set('display_errors', 1);
// Log errors to a file (optional)
ini_set('log_errors', 1);

    // Database configuration
    $host = "localhost";
    $username = "rajinteriors";
    $password = "7ku~3AksgI75Edzrp";
    $database = "rajinteriors";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>

    <link type="text/css" media="all" href="css/style.css" rel="stylesheet">
    <link type="text/css" media="only screen and (max-width: 768px)" href="css/responsive.css" rel="stylesheet">

    <title>Gallery</title>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">



    <link rel="icon" href="upload/TG-Thumb.png" sizes="32x32">
    <link rel="icon" href="upload/TG-Thumb.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="upload/TG-Thumb.png">


</head>

<body data-rsssl="1" class="page-template-default page page-id-1956 woocommerce-no-js tg_lightbox_black leftalign tg_footer_reveal elementor-default elementor-page elementor-page-1956">
    <div id="perspective" style="">



        <div id="wrapper" class=" ">
            <?php include("inc_files/header2.php"); ?>


            <div id="page_content_wrapper" class="" style="width:100%;">
                <div class="inner">
                    <div class="inner_wrapper">
                        <div class="sidebar_content full_width">
                            <div class="elementor elementor-305">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <style>
                                            /* .videos .gallery-item video iframe[allow] {
                                                autoplay: true;
                                                muted: true;
                                                loop: true;
                                            } */
                                            .sec{
                                                background:#000 !important;
                                                border-radius:10px;
                                            }
                                            @media only screen and (max-width: 520px) {
                                                #c197fe7{
                                                    margin-top: 0px;
                                                    margin-bottom: 0px;
                                                }
                                                /* #wrapper{
                                                    margin-bottom: 0px;
                                                } */
                                              #a1373f09{
                                                    margin-bottom: 600px;
                                                }

                                                #a{
                                                    top:1580px !important;
                                                }
                                                #b{
                                                    top:1878px !important;
                                                }
                                                #c{
                                                    top:2176px !important;
                                                }
                                                #d{
                                                    top:2474px !important;
                                                }
                                                #e{
                                                    top:2772px !important;
                                                }
                                                #f{
                                                    top:3240px !important;
                                                }
                                                #g{
                                                    top:3538px !important;
                                                }
                                                #h{
                                                    top:3960px !important;
                                                }
                                                #i{
                                                    top:4258px !important;
                                                }
                                            }
                                        </style>
                                        
                                                <style>
                                                    
                                                    @font-face {
                                                        font-family: 'Operetta Bold';
                                                        src: url('inc_files/Operetta52-Bold.otf') format('opentype');
                                                        font-weight: bold;
                                                        font-style: normal;
                                                        }
                                                        .section-name h2{
                                                            font-family: 'Operetta Bold';
                                                            font-weight: bold;
                                                            font-size:40px;
                                                            text-align: center;
                                                            color:#fff;
                                                            margin-top: 20px;
                                                        }
                                                        .section-name{
                                                            display: flex;
                                                            justify-content: center;
                                                            align-items: center;
                                                            width: 100%;
                                                        }
                                                </style>
                                                <style>
                                                    .gallery{
                                                        display:flex;
                                                        column-gap: 10px; /* Space between columns */
                                                        padding: 10px;
                                                        width: 100%;
                                                        max-width: 1200px;
                                                        margin: auto;
                                                    }
                                                    .images {
                                                        /* with video */
                                                        /* column-count: 2; 
                                                        column-gap: 20px; 
                                                        padding: 20px;
                                                        width: 65%;
                                                        max-width: 800px;
                                                        margin: auto; */

                                                        /* without video */
                                                        
                                                        column-count: 3;
                                                        column-gap: 20px; 
                                                        padding: 20px;
                                                        justify-content: center;
                                                        flex-direction: column;
                                                        width: 100%;
                                                        margin: auto;
                                                    }
                                                    .videos {
                                                        /* with video */
                                                        /* column-count: 1; 
                                                        column-gap: 20px; 
                                                        padding: 20px;
                                                        width: 30%;
                                                        max-width: 400px;
                                                        margin: auto; */
                                                    }

                                                    .gallery-item {
                                                        display: inline-block; /* Ensure items align correctly in columns */
                                                        margin-bottom: 20px; /* Space between items */
                                                        background: #fff;
                                                        border-radius: 10px;
                                                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                                        overflow: hidden;
                                                        width: 100%; /* Ensure item width is adjusted for the column */
                                                    }

                                                    .gallery-item img,
                                                    .gallery-item video {
                                                        width: 100%;
                                                        height: auto; /* Preserve aspect ratio */
                                                        display: block;
                                                    }

                                                    .gallery-item video {
                                                        border-radius: 10px;
                                                    }

                                                    /* Responsive Design */
                                                    @media (max-width: 768px) {
                                                        .gallery {
                                                            column-count: 2; /* Reduce columns on smaller screens */
                                                        }
                                                    }

                                                    @media (max-width: 480px) {
                                                        .gallery {
                                                            column-count: 1; /* Single column on very small screens */
                                                            display: flex;
                                                            flex-direction: column;
                                                        }
                                                        .images{
                                                            display: flex;
                                                            justify-content: center;
                                                            flex-direction: column;
                                                            width: 100%;
                                                        }
                                                    } 
                                                    
                                                    /* Modal Styles */
                                                    .modal {
                                                        display: none; /* Hidden by default */
                                                        position: fixed;
                                                        z-index: 1000;
                                                        left: 0;
                                                        top: 0;
                                                        width: 100%;
                                                        height: 100%;
                                                        overflow: auto;
                                                        background-color: rgba(0,0,0,0.8); /* Black with transparency */
                                                    }

                                                    .modal-content {
                                                        margin: auto;
                                                        display: block;
                                                        width: 80%;
                                                        max-width: 700px;
                                                        position: relative;
                                                        top: 20%;
                                                    }

                                                    .modal-close {
                                                        position: absolute;
                                                        top: 10px;
                                                        right: 25px;
                                                        color: white;
                                                        font-size: 35px;
                                                        font-weight: bold;
                                                        cursor: pointer;
                                                    }
                                                </style>
                                                <div id="imageModal" class="modal">
                                                    <span class="modal-close">&times;</span>
                                                    <img class="modal-content" id="modalImage">
                                                </div>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const modal = document.getElementById('imageModal');
                                                        const modalImg = document.getElementById('modalImage');
                                                        const modalClose = document.querySelector('.modal-close');

                                                        document.querySelectorAll('.gallery-item img').forEach(img => {
                                                            img.addEventListener('click', function () {
                                                                modal.style.display = 'block';
                                                                modalImg.src = this.src;
                                                            });
                                                        });

                                                        modalClose.addEventListener('click', function () {
                                                            modal.style.display = 'none';
                                                        });

                                                        modal.addEventListener('click', function (e) {
                                                            if (e.target === modal) {
                                                                modal.style.display = 'none';
                                                            }
                                                        });
                                                    });
                                                </script>
                                        <?php
                                            // Fetch all categories except IDs 1 and 11
                                            $categoryQuery = "SELECT id, category_name FROM categories WHERE id NOT IN (1, 12) ORDER BY id ASC";
                                            $categoryResult = $conn->query($categoryQuery);

                                            if ($categoryResult->num_rows > 0) {
                                                while ($categoryRow = $categoryResult->fetch_assoc()) {
                                                    $categoryId = $categoryRow['id'];
                                                    $categoryName = ucwords($categoryRow['category_name']);
                                        ?>
                                        <br><br>
                                            <div class="sec">
                                                <section id="category_<?php echo $categoryId; ?>">
                                                    <div class="section-name">
                                                        <h2><?php echo htmlspecialchars($categoryName); ?></h2>
                                                    </div>

                                                    <div class="gallery">
                                                        <div class="images">
                                                            <?php
                                                            // Fetch files for the current category
                                                            $query = "SELECT u.file_url, u.file_name, u.file_type, s.section_name 
                                                                    FROM uploads u 
                                                                    INNER JOIN sections s ON u.section_id = s.id 
                                                                    WHERE u.category_id = ? 
                                                                    ORDER BY s.section_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("i", $categoryId);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $fileType = $row['file_type'];
                                                                    $fileUrl = $row['file_url'];
                                                                    $fileName = $row['file_name'];

                                                                    if ($fileType === 'image') {
                                                                        echo "<div class='gallery-item gallery-grid-tilt'>";
                                                                        echo "<img src='uploads/assets/images/" . htmlspecialchars($fileName) . "' alt='Gallery Image'>";
                                                                        echo "</div>";
                                                                    }
                                                                }
                                                            } else {
                                                                echo "<p>No Contents found.</p>";
                                                            }
                                                            $stmt->close();
                                                            ?>
                                                        </div>
                                                        <!-- <div class="videos">
                                                            <?php
                                                            // Reset the query for videos
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("i", $categoryId);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $fileType = $row['file_type'];
                                                                    $fileUrl = $row['file_url'];

                                                                    if ($fileType === 'video') {
                                                                        echo "<div class='gallery-item gallery-grid-tilt'>";
                                                                        echo "<iframe src='" . htmlspecialchars($fileUrl) . "' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
                                                                        echo "</div>";
                                                                    }
                                                                }
                                                            }
                                                            $stmt->close();
                                                            ?> -->
                                                            <!-- echo "<iframe src='https://youtube.com/shorts/dHVefo9LmA8?si=PdKDnCWfMLKkKqxW' allow='autoplay; encrypted-media' allowfullscreen></iframe>"; -->
                                                        <!-- </div> -->
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="rr" style="width:100%; height:15px; background:white;"></div>
                                        <?php
                                                }
                                            } else {
                                                echo "<p>No categories found.</p>";
                                            }
                                        ?>
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
    <script type='text/javascript'>
        var tgAjax = {
            "ajaxurl": "https:\/\/themes.themegoods.com\/architecturer\/demo\/wp-admin\/admin-ajax.php",
            "ajax_nonce": "8d4e4ec118"
        };
    </script>
    <script src="js/plugins/architecturer-elementor.js" defer="defer" type="text/javascript"></script>
    <script src="js/plugins/jquery-numerator.min.js" defer="defer" type="text/javascript"></script>
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
