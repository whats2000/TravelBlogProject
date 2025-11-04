<?php
/**
 * Database Connection Class
 * 
 * Handles database connections using PDO with environment configuration
 */

namespace App;

use PDO;
use PDOException;
use Exception;

class Database
{
    /**
     * @var PDO|null Singleton database connection
     */
    private static ?PDO $connection = null;

    /**
     * Get database connection instance
     * 
     * @return PDO
     * @throws Exception
     */
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::connect();
        }
        
        return self::$connection;
    }

    /**
     * Create database connection
     * 
     * @throws Exception
     */
    private static function connect(): void
    {
        try {
            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $port = $_ENV['DB_PORT'] ?? 3306;
            $database = $_ENV['DB_DATABASE'] ?? 'travel_blog';
            $username = $_ENV['DB_USERNAME'] ?? 'root';
            $password = $_ENV['DB_PASSWORD'] ?? '';
            
            $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";
            
            self::$connection = new PDO($dsn, $username, $password, [
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

    /**
     * Reset connection (useful for testing)
     */
    public static function resetConnection(): void
    {
        self::$connection = null;
    }
}
