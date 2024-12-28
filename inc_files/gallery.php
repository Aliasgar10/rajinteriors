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
        background: black;
        color: whitesmoke;
        font-size: smaller;
        cursor: pointer;
    }
    #loadMoreBtn:hover {
        height: 3em;
        width: 9em;
        border:2px solid black;
        background: transparent;
        color: black;
        font-size: smaller;
        cursor: pointer;
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
                                            $query = "SELECT file_url, file_name, file_type FROM uploads WHERE file_type = 'image' AND category_id=2 LIMIT 9"; // Initial limit
                                            $result = $conn->query($query);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $fileUrl = $row['file_url'];
                                        ?>
                                            <div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                                <div class="post_wrapper">
                                                    <div class="post_img static">
                                                        <div class="post_img_hover">
                                                            <img src="<?php echo $fileUrl; ?>" alt="<?php echo $row['file_name']; ?>" loading="lazy">
                                                            <a href="#"></a>
                                                        </div>
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

                                <script>
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

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>