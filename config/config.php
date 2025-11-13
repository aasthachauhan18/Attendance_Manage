<?php
// Base URL of the project
// define('BASE_URL', 'http://localhost/PHP_DEMO/Project/');

// Detect your project folder path correctly
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];

// Manually set your subfolder (important for XAMPP)
define('BASE_PATH', '/Attendence');

// Final base URL
define('BASE_URL', $protocol . $host . BASE_PATH);