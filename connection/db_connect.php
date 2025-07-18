<?php
    // OLD Database configuration : Server
    // $host = "localhost";
    // $username = "rajinteriors";
    // $password = "7ku~3AksgI75Edzrp";
    // $database = "rajinteriors";

    // NEW Database configuration : Server
    $host = "localhost";
    $username = "raj";
    $password = "F33@x8f3t";
    $database = "admin_";


    // Local Database configuration : Server
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "rajinteriors";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>