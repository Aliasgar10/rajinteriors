<div class="header_style_wrapper">
    <div class="top_bar hasbg">
        <div class="standard_wrapper">
            <div id="logo_wrapper">
                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper hidden" href="index.php">
                            <img src="upload/logo@2x.png" alt="" width="173" height="50">
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
            </div>
            <div id="menu_wrapper">
                <!-- Desktop Menu -->
                <div id="nav_wrapper">
                    <div class="nav_wrapper_inner">
                        <div id="menu_border_wrapper">
                            <div class="menu-main-menu-container">
                                <ul id="main_menu" class="nav">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">TVS</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="our-process.php">Services</a></li>
                                    <li><a href="contact-1.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu (Hamburger Icon) -->
                <div id="mobile_menu_wrapper" style="display: none;">
                    <button id="hamburger_icon">&#9776; Menu</button>
                    <div id="mobile_menu" style="display: none;">
                        <ul id="mobile_menu_items">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">TVS</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="our-process.php">Services</a></li>
                            <li><a href="contact-1.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media screen and (max-width: 480px) {
        #menu_border_wrapper {
            width: 140px !important;
        }
        #logo_wrapper {
            float: left !important;
            width: 0px !important;
        }
        #menu_wrapper {
            margin-top: 25px !important;
        }
    }

/* Desktop Styles */
#menu_wrapper #nav_wrapper {
    display: block;
}

#mobile_menu_wrapper {
    display: none;
}

/* Mobile Styles */
@media only screen and (max-width: 767px) {
    #menu_wrapper #nav_wrapper {
        display: none; /* Hide the desktop menu */
    }

    #mobile_menu_wrapper {
        display: block; /* Show the hamburger icon */
    }

    #mobile_menu {
        display: none;  /* Mobile menu hidden initially */
        background-color: #ffeb3b;
        padding: 10px;
    }

    #mobile_menu ul {
        list-style-type: none;
        padding-left: 0;
    }

    #mobile_menu li {
        margin: 10px 0;
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