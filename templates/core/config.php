<?php
/**
 * Legacy Config File - Backward Compatibility
 * 
 * This file maintains backward compatibility with old code
 * It loads the new bootstrap which handles everything properly
 */

// Get the correct path to bootstrap
$bootstrapPath = __DIR__ . '/../../config/bootstrap.php';

// Only load if not already loaded
if (!defined('APP_BOOTSTRAPPED')) {
    if (file_exists($bootstrapPath)) {
        require_once $bootstrapPath;
        define('APP_BOOTSTRAPPED', true);
    } else {
        // Fallback for development
        die('Bootstrap file not found. Please run: composer install');
    }
}

// Connection check from https://gist.github.com/RodRitter/5390459
// This function is now defined in config/database.php
// Keeping this comment for reference