<?php
/**
 * Development Server Router
 * Serves from project root with proper routing to templates
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static files directly (scripts and static folders)
if (preg_match('/\.(css|js|jpg|jpeg|png|gif|svg|ico|woff|woff2|ttf|eot)$/i', $uri)) {
    $file = __DIR__ . $uri;
    if (file_exists($file)) {
        return false; // Let PHP serve it
    }
}

// Route all PHP requests to templates directory
if ($uri === '/' || $uri === '') {
    require __DIR__ . '/templates/index.php';
    return true;
}

// Check if it's a PHP file request
if (preg_match('/\.php$/', $uri)) {
    $file = __DIR__ . '/templates' . $uri;
    if (file_exists($file)) {
        require $file;
        return true;
    }
}

// Try to find file in templates directory
$file = __DIR__ . '/templates' . $uri;
if (file_exists($file)) {
    if (is_dir($file)) {
        // Check for index.php in directory
        if (file_exists($file . '/index.php')) {
            require $file . '/index.php';
            return true;
        }
    } else {
        require $file;
        return true;
    }
}

// 404
http_response_code(404);
echo '404 - File Not Found';
return true;
