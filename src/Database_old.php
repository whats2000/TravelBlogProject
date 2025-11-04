<?php
/**
 * Database Configuration and Connection
 * 
 * This file provides database connection functionality using environment variables
 */

use Dotenv\Dotenv;

// Load environment variables if not already loaded
if (!isset($_ENV['DB_HOST'])) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

/**
 * Create a PDO database connection
 * 
 * @return PDO Database connection
 * @throws Exception if connection fails
 */
function getDbConnection(): PDO
{
    static $conn = null;
    
    if ($conn === null) {
        try {
            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $port = $_ENV['DB_PORT'] ?? 3306;
            $database = $_ENV['DB_DATABASE'] ?? 'travel_blog';
            $username = $_ENV['DB_USERNAME'] ?? 'root';
            $password = $_ENV['DB_PASSWORD'] ?? '';
            
            $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";
            
            $conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            
            if ($_ENV['APP_DEBUG'] ?? false) {
                throw new Exception("Database connection failed: " . $e->getMessage());
            } else {
                throw new Exception("Database connection failed. Please check your configuration.");
            }
        }
    }
    
    return $conn;
}

/**
 * Legacy function for backward compatibility
 * Kept to maintain compatibility with existing code
 * 
 * @param string $root Username (ignored, uses .env instead)
 * @param string $pass Password (ignored, uses .env instead)
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
