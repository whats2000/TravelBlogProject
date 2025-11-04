<?php
/**
 * Public Entry Point
 * 
 * This is the main entry point for the application
 */

// Handle static files for built-in PHP server
if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    // Serve static files from static directory
    if (preg_match('/\.(css|js|jpg|jpeg|png|gif|svg|ico|woff|woff2|ttf|eot)$/i', $path)) {
        // Check in static directory
        $staticFile = __DIR__ . '/../static' . $path;
        if (file_exists($staticFile)) {
            return false; // Let PHP built-in server handle it
        }
        
        // Check in scripts directory
        $scriptFile = __DIR__ . '/../scripts' . $path;
        if (file_exists($scriptFile)) {
            return false; // Let PHP built-in server handle it
        }
    }
}

require_once __DIR__ . '/../config/bootstrap.php';

// Store last URL for redirects
$_SESSION['last_url'] = $_SERVER['REQUEST_URI'] ?? '/';

// Simple routing based on request
$page = $_GET['page'] ?? 'index';

// Sanitize page parameter
$page = preg_replace('/[^a-z0-9_-]/i', '', $page);

// Map routes to template files
$routes = [
    'index' => 'index.php',
    'post' => 'post.php',
    'posts' => 'posts.php',
    'profile' => 'profile.php',
    'profile_edit' => 'profile_edit.php',
    'post_edit' => 'post_edit.php',
    'search' => 'search.php',
    'tips' => 'tips.php',
    'user_intro' => 'user_intro.php',
];

// Get template file
$templateFile = $routes[$page] ?? $routes['index'];
$templatePath = __DIR__ . '/../templates/' . $templateFile;

// Load the template
if (file_exists($templatePath)) {
    require $templatePath;
} else {
    http_response_code(404);
    echo "Page not found";
}
