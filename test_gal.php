<?php
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
                                            .videos .gallery-item video iframe[allow] {
                                                autoplay: true;
                                                muted: true;
                                                loop: true;
                                            }
                                            .sec{
                                                background:#000 !important;
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
                                        <div class="sec">
                                            <section id="c197fe7" data-id="c197fe7" class="elementor-element elementor-element-c197fe7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <style>
                                                            #c197fe7{
                                                                margin-top: 40px;
                                                                margin-bottom: 60px;
                                                            }

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
                                                        <div class="section-name">
                                                            <h2>living room 1</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            
                                            <section id="a009">
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
                                                        column-count: 2; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 65%;
                                                        max-width: 800px;
                                                        margin: auto;
                                                    }
                                                    .videos {
                                                        column-count: 1; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 30%;
                                                        max-width: 400px;
                                                        margin: auto;
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
                                                        }
                                                    }
                                                </style>
                                                <div class="gallery">
                                                    <!-- Image Items -->
                                                    <div class="images">
                                                        <?php
                                                            $query = "SELECT file_url, section, category, file_name FROM uploads WHERE file_type = 'image' AND category='living room 1'"; // Initial limit
                                                            $result = $conn->query($query);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $fileUrl = $row['file_url'];
                                                        ?>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="uploads/assets/images/<?php echo $row['file_name']; ?>" alt="Gallery Image 5">
                                                        </div>
                                                        <?php 
                                                                }
                                                            } else {
                                                                echo "No Contents found.";
                                                            }
                                                        ?> 
                                                        <!-- <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_6.jpg" alt="Gallery Image 5">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_7.jpg" alt="Gallery Image 4">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_8.jpg" alt="Gallery Image 5">
                                                        </div> -->
                                                    </div>
                                                    <div class="videos">
                                                        <div class="gallery-item gallery-grid-tilt">                                                            
                                                            <iframe src="https://www.youtube.com/embed/frGAZ34UEc4?autoplay=1&mute=1&loop=1&playlist=frGAZ34UEc4" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </section>
                                        </div>
                                        <div class="rr" style="width:100%; height:15px; background:white;"></div>   

                                        <!-- Sec 2 -->
                                        <div class="sec">
                                            <section id="c197fe7" style="margin-bottom: 10px;" data-id="c197fe7" class="elementor-element elementor-element-c197fe7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <style>
                                                            #c197fe7{
                                                                margin-top: 40px;
                                                                margin-bottom: 60px;
                                                            }

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
                                                                }
                                                                .section-name{
                                                                    display: flex;
                                                                    justify-content: center;
                                                                    align-items: center;
                                                                    width: 100%;
                                                                }
                                                        </style>
                                                        <div class="section-name">
                                                            <h2>kitchen 1</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section id="a009">
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
                                                        column-count: 2; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 65%;
                                                        max-width: 800px;
                                                        margin: auto;
                                                    }
                                                    .videos {
                                                        column-count: 1; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 30%;
                                                        max-width: 400px;
                                                        margin: auto;
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
                                                        }
                                                    }
                                                </style>
                                                <div class="gallery">
                                                    <!-- Image Items -->
                                                    <div class="images">
                                                        <?php
                                                            $query = "SELECT file_url, section, category, file_name FROM uploads WHERE file_type = 'image' AND category='kitchen 1'"; // Initial limit
                                                            $result = $conn->query($query);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $fileUrl = $row['file_url'];
                                                        ?>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="uploads/assets/images/<?php echo $row['file_name']; ?>" alt="Gallery Image 5">
                                                        </div>
                                                        <?php 
                                                                }
                                                            } else {
                                                                echo "No Contents found.";
                                                            }
                                                        ?> 
                                                        <!-- <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_6.jpg" alt="Gallery Image 5">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_7.jpg" alt="Gallery Image 4">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_8.jpg" alt="Gallery Image 5">
                                                        </div> -->
                                                    </div>                                                    
                                                    <div class="videos">
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <iframe src="https://www.youtube.com/embed/wbWItCkHYnc?autoplay=1&mute=1&loop=1&playlist=wbWItCkHYnc" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div> 
                                        <div class="rr" style="width:100%; height:15px; background:white;"></div>  

                                        <!-- Sec 3 -->
                                        <div class="sec">
                                            <section id="c197fe7" data-id="c197fe7" class="elementor-element elementor-element-c197fe7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <style>
                                                            #c197fe7{
                                                                margin-top: 40px;
                                                                margin-bottom: 60px;
                                                            }

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
                                                                }
                                                                .section-name{
                                                                    display: flex;
                                                                    justify-content: center;
                                                                    align-items: center;
                                                                    width: 100%;
                                                                }
                                                        </style>
                                                        <div class="section-name">
                                                            <h2>living room 3</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section id="a009">
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
                                                        column-count: 2; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 65%;
                                                        max-width: 800px;
                                                        margin: auto;
                                                    }
                                                    .videos {
                                                        column-count: 1; /* Number of columns */
                                                        column-gap: 20px; /* Space between columns */
                                                        padding: 20px;
                                                        width: 30%;
                                                        max-width: 400px;
                                                        margin: auto;
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
                                                        }
                                                    }
                                                </style>
                                                <div class="gallery">
                                                    
                                                    <!-- Image Items -->
                                                    <div class="images">
                                                    <?php
                                                        $query = "SELECT file_url, section, category, file_name FROM uploads WHERE file_type = 'image' AND category='living room 3'"; // Initial limit
                                                        $result = $conn->query($query);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $fileUrl = $row['file_url'];
                                                    ?>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="uploads/assets/images/<?php echo $row['file_name']; ?>" alt="Gallery Image 5">
                                                        </div>
                                                        <?php 
                                                                }
                                                            } else {
                                                                echo "No Contents found.";
                                                            }
                                                        ?> 
                                                        <!-- <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_6.jpg" alt="Gallery Image 5">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_7.jpg" alt="Gallery Image 4">
                                                        </div>
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <img src="upload/gallery_8.jpg" alt="Gallery Image 5">
                                                        </div> -->
                                                    </div>
                                                    
                                                    <div class="videos">
                                                        <div class="gallery-item gallery-grid-tilt">
                                                            <video controls>
                                                                <source src="upload/Lights_1.mp4" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                    
                                                            <!-- Video Item -->
                                                    
                                                    <!-- More Image Items -->
                                                    
                                                </div>
                                            </section>
                                        </div> 
                                        <div class="rr" style="width:100%; height:15px; background:white;"></div>                          
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
