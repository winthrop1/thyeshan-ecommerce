<?php
// Initialize application configuration
// This file sets up paths and includes necessary files

// Define base paths
define('ROOT_PATH', dirname(dirname(__FILE__)) . '/');
define('CONFIG_PATH', ROOT_PATH . 'config/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('AUTH_PATH', ROOT_PATH . 'auth/');
define('PAGES_PATH', ROOT_PATH . 'pages/');
define('ASSETS_PATH', ROOT_PATH . 'assets/');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require_once(CONFIG_PATH . 'sql_connection.php');

// Include security headers
require_once(CONFIG_PATH . 'mitigations.php');

// Include cookies handling
require_once(CONFIG_PATH . 'cookies.php');

// Helper function for redirects
function redirect($path) {
    header("Location: " . $path);
    exit();
}

// Helper function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['MM_Uid']);
}

// Helper function to require login
function requireLogin() {
    if (!isLoggedIn()) {
        redirect('/auth/login.php');
    }
}
?>