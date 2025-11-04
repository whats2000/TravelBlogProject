<?php
/**
 * Application Bootstrap
 * 
 * This file initializes the application and should be included at the top of each page
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Set error reporting based on environment
if ($_ENV['APP_DEBUG'] ?? false) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
}

// Set timezone
date_default_timezone_set('UTC');

// Include database configuration
require_once __DIR__ . '/../config/database.php';

/**
 * Helper function to get environment variable
 */
function env($key, $default = null)
{
    return $_ENV[$key] ?? $default;
}

/**
 * Helper function to get base URL
 */
function baseUrl($path = '')
{
    $url = rtrim($_ENV['APP_URL'] ?? 'http://localhost:8000', '/');
    return $url . '/' . ltrim($path, '/');
}

/**
 * Helper function to get asset URL
 */
function asset($path)
{
    return baseUrl($path);
}

/**
 * Redirect helper
 */
function redirect($url)
{
    header("Location: {$url}");
    exit;
}
