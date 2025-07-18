<?php
    // Database configuration : Serever
    // $host = "localhost";
    // $username = "rajinteriors";
    // $password = "7ku~3AksgI75Edzrp";
    // $database = "rajinteriors";

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "rajinteriors";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>