/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
    "use strict";

    /*-------------------------------------------------*/
    /* =  Mobile Menu (Three Dots Icon)
    /*-------------------------------------------------*/
    // Show the three-dots icon on mobile screens
    function toggleMobileMenu() {
        if ($(window).width() <= 768) {
            $("#three-dots-menu").show(); // Show the three dots icon
            $("#mobile-menu").hide(); // Initially hide the menu
        } else {
            $("#three-dots-menu").hide(); // Hide the three dots icon on larger screens
            $("#mobile-menu").hide(); // Ensure the menu is hidden on desktop
        }
    }

    // Initial check
    toggleMobileMenu();

    // Check on window resize to adjust the menu for mobile
    $(window).resize(function() {
        toggleMobileMenu();
    });

    // Toggle mobile menu when the three dots icon is clicked
    $("#three-dots-menu").click(function() {
        $("#mobile-menu").toggle(); // Show/Hide the mobile menu when clicked
    });

    // When a menu item is clicked, hide the mobile menu
    $("#mobile-menu a").click(function() {
        $("#mobile-menu").hide();
    });
});
