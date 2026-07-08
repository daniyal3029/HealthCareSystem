<?php
$host = '127.0.0.1';
$db   = 'healthcare_db';
$user = 'root';
$pass = ''; // Adjust to your DB credentials
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

/**
 * Database connection settings
 * @var string $host Hostname or IP address
 * @var string $db Database name
 * @var string $user Database username
 * @var string $pass Database password
 * @var string $charset Character set to use
 */
/**
 * PDO instance
 * @var PDO $pdo
 */

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Return early if we can't connect, helpful for frontend handling
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed. Please make sure the DB exists and credentials are correct. Error: ' . $e->getMessage()]);
    exit;
}

/**
 * Handles database connection errors by returning a JSON error response
 * with a 500 status code and the exception message.
 */

// Added documentation for connection error handling
/**
 * Database connection settings and error handling.
 * Ensure to replace the database credentials with your own.
 */
