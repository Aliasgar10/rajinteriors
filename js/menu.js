/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
    "use strict";

    /*-------------------------------------------------*/
    /* =  Main Nav 
    /*-------------------------------------------------*/

    /*-------------------------------------------------*/
    /* =  Mobile Menu
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

    $("#menu_border_wrapper select").change(function() {
        window.location = $(this).find("option:selected").val();
    });

    /*-------------------------------------------------*/
    /* =  Add Custom Styles for the Select Box
    /*-------------------------------------------------*/
    // Inline CSS for the select dropdown styling
    $("<style>").prop("type", "text/css").html(`
        /* Default Select Box Styles */
        #menu_border_wrapper select {
            font-family: Arial, sans-serif;
            font-size: 16px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f7f7f7;
            color: #333;
            width: 200px;
            transition: all 0.3s ease;
        }

        /* Style the select box when it is focused */
        #menu_border_wrapper select:focus {
            border-color: #4CAF50; /* Green border color when focused */
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4); /* Green shadow */
        }

        /* Add custom arrow to the select dropdown */
        #menu_border_wrapper select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zY2hlbWVzL3htbG5zL3N2ZyIgdmlld0JveD0iMCAwIDAgMCI+PHBhdGggZD0iTTEuMCAyLjUsMTAuMCAyTDEwLjUgM0wzIDIuMCAwIDAuNSIgZmlsbD0iIzAwMCIvPjwvc3ZnPg==') no-repeat scroll right center transparent;
            background-size: 10px;
            padding-right: 30px;
        }

        /* Hover effects for the select */
        #menu_border_wrapper select:hover {
            border-color: #4CAF50; /* Green border when hovered */
            cursor: pointer;
        }

        /* Style the placeholder option (Menu) */
        #menu_border_wrapper select option[value=""] {
            color: #aaa;
        }

        /* ------------------------------ */
        /* Mobile-Specific Styles */
        /* ------------------------------ */
        @media only screen and (max-width: 767px) {
            #menu_border_wrapper select {
                width: 100%; /* Make the select box full-width on mobile */
                padding: 15px;
                font-size: 18px;
                border-radius: 8px;
                background-color: #ffeb3b; /* Yellow background for mobile */
                color: #333;
                border: 2px solid #ff9800; /* Orange border */
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            /* Custom arrow for mobile */
            #menu_border_wrapper select {
                background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zY2hlbWVzL3htbG5zL3N2ZyIgdmlld0JveD0iMCAwIDAgMCI+PHBhdGggZD0iTTEuMCAyLjUsMTAuMCAyTDEwLjUgM0wzIDIuMCAwIDAuNSIgZmlsbD0iIzAwMCIvPjwvc3ZnPg==') no-repeat scroll right center transparent;
                background-size: 12px;
                padding-right: 40px;
            }

            /* Style options inside select for mobile */
            #menu_border_wrapper select option {
                padding: 10px;
                background-color: #fff;
                font-size: 16px;
            }

            #menu_border_wrapper select option:hover {
                background-color: #f1f1f1; /* Hover effect for options */
            }
        }

    `).appendTo("head");

});
