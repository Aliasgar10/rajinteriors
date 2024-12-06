<div class="header_style_wrapper">
    <div class="top_bar hasbg">
        <div class="standard_wrapper">
            <div id="logo_wrapper">
                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper hidden" href="index.php">
                            <img src="upload/logo@2x.png" alt="" width="250" height="50">
                        </a>
                    </div>
                </div>
                <div id="logo_transparent" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo_transparent" class="logo_wrapper default" href="index.php">
                            <img src="upload/logo@2x_white.png" alt="" width="173" height="37">
                        </a>
                    </div>
                </div>

                <!-- Navigation Menu Wrapper -->
                <div id="menu_wrapper">
                    <div id="nav_wrapper">
                        <div class="nav_wrapper_inner">
                            <div id="menu_border_wrapper">
                                <div class="menu-main-menu-container">
                                    <!-- Mobile Menu Sidebar Toggle Icon -->
                                    <button type="button" class="btn d-lg-none mr-3 mr-sm-4 p-0 active" id="sidebar-toggle">
                                        <svg id="Component_43_1" data-name="Component 43 – 1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <rect id="Rectangle_19062" data-name="Rectangle 19062" width="16" height="2" transform="translate(0 7)" fill="#919199"></rect>
                                            <rect id="Rectangle_19063" data-name="Rectangle 19063" width="16" height="2" fill="#919199"></rect>
                                            <rect id="Rectangle_19064" data-name="Rectangle 19064" width="16" height="2" transform="translate(0 14)" fill="#919199"></rect>
                                        </svg>
                                    </button>

                                    <!-- Sidebar Menu -->
                                    <div class="collapse-sidebar c-scrollbar-light text-left" id="sidebar">
                                        <button type="button" class="btn btn-sm p-4 hide-top-menu-bar" id="close-sidebar">
                                            <i class="las la-times la-2x text-primary"></i>
                                        </button>
                                        <ul class="mb-0 pl-3 pb-3 h-100">
                                            <li>
                                                <a href="index.php" class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">Home</a>
                                            </li>
                                            <li>
                                                <a href="#" class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">TVS</a>
                                            </li>
                                            <li>
                                                <a href="gallery.php" class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">Gallery</a>
                                            </li>
                                            <li>
                                                <a href="our-process.php" class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">Services</a>
                                            </li>
                                            <li>
                                                <a href="contact-1.php" class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">Contact</a>
                                            </li>
                                        </ul>
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
<style>
    /* Basic Styles for Header and Logo */
.header_style_wrapper {
    position: relative;
    background-color: #f5f5f5;
}

#logo_wrapper {
    display: inline-block;
}

.logo_container {
    display: inline-block;
}

#logo_normal img,
#logo_transparent img {
    max-width: 100%;
    height: auto;
}

#logo_transparent .logo_wrapper {
    display: none; /* Initially hidden */
}

#menu_wrapper {
    position: relative;
}

#nav_wrapper {
    display: flex;
    justify-content: flex-end;
}

/* Sidebar Styles */
.collapse-sidebar {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #fff;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    z-index: 9999;
    overflow-y: auto;
    padding-top: 20px;
}

.collapse-sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: left;
}

.collapse-sidebar li {
    margin-bottom: 20px;
}

.collapse-sidebar li a {
    font-size: 18px;
    text-decoration: none;
    color: #333;
}

.collapse-sidebar li a:hover {
    color: #007bff;
}

/* Hide Sidebar */
.hide-top-menu-bar {
    background: none;
    border: none;
    color: #333;
    font-size: 20px;
}

/* Mobile View */
@media (max-width: 768px) {
    #sidebar-toggle {
        display: block;
    }
}

</style>