<?php
// Database connection settings
$host = "localhost";        // or use "127.0.0.1"
$db_user = "root";          // your DB username
$db_password = "";          // your DB password (empty if default)
$db_name = "sweet_treats";  // your database name

// Create connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
