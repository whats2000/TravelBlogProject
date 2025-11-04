<?php
/**
 * Application Configuration Class
 * 
 * Provides helper functions for configuration access
 */

namespace App;

class Config
{
    /**
     * Get environment variable
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function env(string $key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }

    /**
     * Get base URL
     * 
     * @param string $path
     * @return string
     */
    public static function baseUrl(string $path = ''): string
    {
        $url = rtrim($_ENV['APP_URL'] ?? 'http://localhost:8000', '/');
        return $url . '/' . ltrim($path, '/');
    }

    /**
     * Get asset URL
     * 
     * @param string $path
     * @return string
     */
    public static function asset(string $path): string
    {
        return self::baseUrl($path);
    }

    /**
     * Check if app is in debug mode
     * 
     * @return bool
     */
    public static function isDebug(): bool
    {
        return filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get app name
     * 
     * @return string
     */
    public static function appName(): string
    {
        return $_ENV['APP_NAME'] ?? 'TravelBlog';
    }
}
