/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
    "use strict";

    // Toggle Sidebar
    $("#sidebar-toggle").click(function() {
        $("#sidebar").toggle(); // Show or hide the sidebar when the button is clicked
    });

    // Close Sidebar
    $("#close-sidebar").click(function() {
        $("#sidebar").hide(); // Hide the sidebar when the close button is clicked
    });
});
