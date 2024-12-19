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
</style>
<?php 
    include("../connection/db_connect.php");
?>

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
                                    <?php
                                        // Fetch data from uploads table
                                        $query = "SELECT file_url, file_name, file_type FROM uploads WHERE file_type = 'image' AND category='HomePage'"; // Only fetch images
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $fileUrl = $row['file_url'].$row['file_name'];   // Path to the file                                     

                                    ?>
                                    <div class="blog-posts-grid post-134 post type-post status-publish format-standard has-post-thumbnail hentry category-architecture category-exteriors category-interiors tag-home-offices tag-kitchens tag-staircases">
                                        <div class="post_wrapper">
                                        <div class="post_img static">
                                            <div class="post_img_hover">
                                                <img src="<?php echo $fileUrl; ?>" class="" alt="<?php echo $row['file_name']; ?>">
                                                <a href="#"></a>
                                            </div>
                                        </div>
                                            <div class="post_content_wrapper text_">
                                                <div class="post_header">
                                                    <div class="post_header_title">
                                                        <h5><a href="#" title="Inspiring Presence of Design Thanks to Indoor Plants">Inspiring Presence of Design Thanks to Indoor Plants</a></h5></div>
                                                </div>
                                                <div class="post_header_wrapper">
                                                    <div class="post_button_wrapper">
                                                        <div class="post_attribute">
                                                            <a href="#" title="Inspiring Presence of Design Thanks to Indoor Plants">August 2, 2018</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                            }
                                        } else {
                                            echo "No images found in the uploads table.";
                                        }
                                    ?>

                                    <!-- <div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                        <div class="post_wrapper">
                                            <div class="post_img static">
                                                <div class="post_img_hover ">
                                                    <img src="upload/Gallery_Slide2.jpg" class="" alt="">
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                            <div class="post_content_wrapper text_">
                                                <div class="post_header">
                                                    <div class="post_header_title">
                                                        <h5><a href="#" title="Capturing the Essence of Home in Ultra-Modern Living">Capturing the Essence of Home in Ultra-Modern Living</a></h5></div>
                                                </div>
                                                <div class="post_header_wrapper">
                                                    <div class="post_button_wrapper">
                                                        <div class="post_attribute">
                                                            <a href="#" title="Capturing the Essence of Home in Ultra-Modern Living">August 2, 2018</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-posts-grid post-124 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                        <div class="post_wrapper">
                                            <div class="post_img static">
                                                <div class="post_img_hover ">
                                                    <img src="upload/Gallery_Slide3.jpg" class="" alt="">
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                            <div class="post_content_wrapper text_">
                                                <div class="post_header">
                                                    <div class="post_header_title">
                                                        <h5><a href="#" title="Reinventing Reclaimed Wood for the Modern Hipster Home">Reinventing Reclaimed Wood for the Modern Hipster Home</a></h5></div>
                                                </div>
                                                <div class="post_header_wrapper">
                                                    <div class="post_button_wrapper">
                                                        <div class="post_attribute">
                                                            <a href="#" title="Reinventing Reclaimed Wood for the Modern Hipster Home">August 2, 2018</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>