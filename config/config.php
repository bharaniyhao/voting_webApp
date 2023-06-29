<?php
// Database configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'voting_website';

// Site URLs
define('BASE_URL', 'http://yourwebsite.com/');
define('API_URL', BASE_URL . 'api/');

// Other configuration settings
// ...

// Create a database connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check the database connection
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
