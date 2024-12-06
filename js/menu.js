/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
    "use strict";

    // Toggle the mobile menu when hamburger icon is clicked
    $("#hamburger_icon").click(function() {
        $("#mobile_menu").toggle();  // Show or hide the mobile menu
    });

    /*-------------------------------------------------*/
    /* = Mobile Menu Setup */
    /*-------------------------------------------------*/

    /* For desktop, hide mobile menu and show regular menu */
    if (window.innerWidth >= 520) {
        $("#mobile_menu_wrapper").hide();  // Hide the mobile menu
        $("#menu_wrapper > #nav_wrapper").show();  // Show the desktop menu
    }

    /* For mobile, show mobile menu and hide regular menu */
    if (window.innerWidth < 768) {
        $("#menu_wrapper > #nav_wrapper").hide();  // Hide desktop menu
        $("#mobile_menu_wrapper").show();  // Show mobile menu (hamburger)
    }

    // Optional: If window is resized, adjust the menu visibility
    $(window).resize(function() {
        if (window.innerWidth >= 520) {
            $("#mobile_menu_wrapper").hide();
            $("#menu_wrapper > #nav_wrapper").show();
        } else {
            $("#menu_wrapper > #nav_wrapper").hide();
            $("#mobile_menu_wrapper").show();
        }
    });
});
