<?php
/**
 * Database Helper Functions
 * 
 * Provides backward-compatible database connection functions
 * Uses the new App\Database class under the hood
 */

use App\Database;

/**
 * Get database connection
 * 
 * @return PDO Database connection
 * @throws Exception if connection fails
 */
function getDbConnection(): PDO
{
    return Database::getConnection();
}

/**
 * Legacy function for backward compatibility
 * Kept to maintain compatibility with existing code
 * 
 * @param string|null $root Username (ignored, uses .env instead)
 * @param string|null $pass Password (ignored, uses .env instead)
 * @return PDO|false Database connection or false on failure
 * @deprecated Use getDbConnection() instead
 */
function connect($root = null, $pass = null)
{
    try {
        return getDbConnection();
    } catch (Exception $e) {
        if ($_ENV['APP_DEBUG'] ?? false) {
            print("Error connecting to database: " . $e->getMessage());
        }
        return false;
    }
}
