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
            $("#menu_border_wrapper select").hide(); // Hide the select box (we will use it for mobile)
        } else {
            $("#three-dots-menu").hide(); // Hide the three dots icon
            $("#menu_border_wrapper select").show(); // Show the select box for larger screens
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
        $("#mobile-menu").toggle(); // Show/Hide the mobile menu
    });

    // When a menu item is clicked, hide the mobile menu
    $("#mobile-menu a").click(function() {
        $("#mobile-menu").hide();
    });

    /*-------------------------------------------------*/
    /* =  Dropdown Menu (Desktop Mode)
    /*-------------------------------------------------*/
    // Create the dropdown base
    $("<select />").appendTo("#menu_border_wrapper");

    // Create default option "Go to..."
    $("<option />", {
        "selected": "selected",
        "value"   : "",
        "text"    : "Menu"
    }).appendTo("#menu_border_wrapper select");

    // Populate dropdown with menu items
    $(".nav a").each(function() {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo("#menu_border_wrapper select");
    });

    // Redirect to the selected menu item
    $("#menu_border_wrapper select").change(function() {
        window.location = $(this).find("option:selected").val();
    });
});
