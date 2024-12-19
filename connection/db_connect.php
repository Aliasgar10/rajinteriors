<?php
    // Database configuration
    $host = "localhost";
    $username = "rajinteriors";
    $password = "7ku~3AksgI75Edzrp";
    $database = "rajinteriors";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>