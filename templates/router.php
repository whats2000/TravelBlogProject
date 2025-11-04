<?php
/**
 * Development Server Router
 * Serves the old structure while providing modern composer support
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static files from parent directories
if (preg_match('/\.(css|js|jpg|jpeg|png|gif|svg|ico|woff|woff2|ttf|eot)$/i', $uri)) {
    // Try scripts directory (parent of templates)
    if (preg_match('/^\/scripts\//', $uri)) {
        $file = __DIR__ . '/..' . $uri;
        if (file_exists($file)) {
            return false; // Let PHP serve it
        }
    }
    
    // Try static directory (parent of templates)
    if (preg_match('/^\/static\//', $uri)) {
        $file = __DIR__ . '/..' . $uri;
        if (file_exists($file)) {
            return false; // Let PHP serve it
        }
    }
}

// For all other requests, serve from templates directory (default behavior)
return false;
