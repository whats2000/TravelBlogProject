<?php
/**
 * Database Installation Script
 * 
 * This script automatically creates the database and imports the SQL schema
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Database configuration from .env
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'] ?? 3306;
$database = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

echo "========================================\n";
echo "  Travel Blog Database Installer\n";
echo "========================================\n\n";

try {
    // Connect to MySQL server (without selecting a database)
    echo "Connecting to MySQL server...\n";
    $pdo = new PDO(
        "mysql:host={$host};port={$port};charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "✓ Connected to MySQL server\n\n";

    // Create database if it doesn't exist
    echo "Creating database '{$database}'...\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✓ Database created or already exists\n\n";

    // Select the database
    $pdo->exec("USE `{$database}`");

    // Read SQL file
    $sqlFile = __DIR__ . '/../database/travel_blog.sql';
    
    if (!file_exists($sqlFile)) {
        // Try old location
        $sqlFile = __DIR__ . '/../travel_blog.sql';
    }
    
    if (!file_exists($sqlFile)) {
        throw new Exception("SQL file not found! Please ensure travel_blog.sql exists.");
    }

    echo "Reading SQL file...\n";
    $sql = file_get_contents($sqlFile);
    echo "✓ SQL file loaded\n\n";

    // Split SQL statements and execute them
    echo "Importing database schema and data...\n";
    $statements = array_filter(
        array_map('trim', explode(';', $sql)),
        function($stmt) {
            return !empty($stmt) && 
                   !preg_match('/^--/', $stmt) && 
                   !preg_match('/^\/\*!/', $stmt);
        }
    );

    $count = 0;
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            try {
                $pdo->exec($statement);
                $count++;
            } catch (PDOException $e) {
                // Ignore certain non-critical errors
                if (strpos($e->getMessage(), 'already exists') === false &&
                    strpos($e->getMessage(), 'Duplicate entry') === false) {
                    echo "Warning: " . $e->getMessage() . "\n";
                }
            }
        }
    }

    echo "✓ Executed {$count} SQL statements\n\n";

    // Verify tables were created
    echo "Verifying database tables...\n";
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (count($tables) > 0) {
        echo "✓ Found " . count($tables) . " tables:\n";
        foreach ($tables as $table) {
            echo "  - {$table}\n";
        }
    } else {
        throw new Exception("No tables found in database!");
    }

    echo "\n========================================\n";
    echo "  Installation Complete! ✓\n";
    echo "========================================\n\n";
    echo "You can now run 'composer dev' to start the development server.\n\n";

} catch (PDOException $e) {
    echo "\n✗ Database Error: " . $e->getMessage() . "\n\n";
    echo "Please check your .env file and ensure:\n";
    echo "  - MySQL server is running\n";
    echo "  - Database credentials are correct\n";
    echo "  - The MySQL user has proper permissions\n\n";
    exit(1);
} catch (Exception $e) {
    echo "\n✗ Error: " . $e->getMessage() . "\n\n";
    exit(1);
}
