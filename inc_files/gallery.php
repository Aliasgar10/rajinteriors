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

    .fullwidth-gallery-section {
    width: 100%;
    position: relative;
    margin: 0 auto;
    padding: 50px 0;
    background-color: #fff;
    overflow: hidden;
}

.fullwidth-gallery-section .elementor-container,
.fullwidth-gallery-section .elementor-row,
.fullwidth-gallery-section .elementor-column,
.fullwidth-gallery-section .elementor-column-wrap,
.fullwidth-gallery-section .elementor-widget-wrap {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0;
    padding: 0;
}

/* .fullwidth-gallery-section .blog-posts-grid {
    width: 100%;
    max-width: 30%;
    float: left;
    padding: 10px;
    box-sizing: border-box;
} */

.fullwidth-gallery-section .post_img_hover img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

</style>

<!-- <section id="abcc" data-id="fb4c59e" class="elementor-element elementor-element-fb4c59e animated fadeInUp animated-fast elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible elementor-section elementor-top-section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:200}" data-element_type="section"> -->
<section id="abcc" class="fullwidth-gallery-section">
    
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
                                            $query = "SELECT file_url, file_name, file_type FROM uploads WHERE file_type = 'image' AND category_id = :category_id LIMIT 9";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute(['category_id' => 1]);

                                            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if (!empty($images)) {
                                                foreach ($images as $row) {
                                                    $fileUrl = str_replace('../', '', $row['file_url']); // Or use ltrim()
                                                    $fileName = htmlspecialchars($row['file_name']);
                                                    
                                            ?>
                                                <div class="blog-posts-grid post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-ceilings category-flooring category-landscape tag-libraries tag-living-rooms tag-patios">
                                                    <div class="post_wrapper">
                                                        <div class="post_img static" >
                                                            <div class="post_img_hover" style="background-color:red;">
                                                                <img src="<?php echo $fileUrl; ?>" alt="<?php echo $fileName; ?>" loading="lazy">
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