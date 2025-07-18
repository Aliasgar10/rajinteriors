

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

// For Live Database credentials
// $host = '127.0.0.1'; // Always use IP to avoid socket issues
// $db   = 'admin_';  // ✅ replace with actual DB name
// $user = 'raj';
// $pass = 'F33@x8f3t';
// $charset = 'utf8mb4';

// For Local DB
$host = '127.0.0.1'; // Always use IP to avoid socket issues
$db   = 'rajinteriors';  // ✅ replace with actual DB name
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // safer error handling
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // cleaner array results
    PDO::ATTR_EMULATE_PREPARES   => false,                  // use real prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connected successfully"; // (optional debug)
} catch (PDOException $e) {
    die("PDO Connection failed: " . $e->getMessage());
}
?>
