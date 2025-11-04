<?php
/**
 * Router for PHP Built-in Server (inside public directory)
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$extension = pathinfo($requestUri, PATHINFO_EXTENSION);

// Serve static files in public directory
if ($extension && file_exists(__DIR__ . $requestUri)) {
    return false;
}

// Serve files from static directory (one level up)
if (preg_match('/^\/static\//', $requestUri)) {
    $staticFile = __DIR__ . '/..' . $requestUri;
    if (file_exists($staticFile) && is_file($staticFile)) {
        // Set proper content type based on extension
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject'
        ];
        
        $ext = strtolower(pathinfo($staticFile, PATHINFO_EXTENSION));
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
        }
        
        readfile($staticFile);
        return true;
    }
}

// Serve files from scripts directory (one level up)
if (preg_match('/^\/scripts\//', $requestUri)) {
    $scriptFile = __DIR__ . '/..' . $requestUri;
    if (file_exists($scriptFile) && is_file($scriptFile)) {
        $ext = strtolower(pathinfo($scriptFile, PATHINFO_EXTENSION));
        if ($ext === 'js') {
            header('Content-Type: application/javascript');
        } else if ($ext === 'css') {
            header('Content-Type: text/css');
        }
        
        readfile($scriptFile);
        return true;
    }
}

// All other requests go to index.php
require __DIR__ . '/index.php';
