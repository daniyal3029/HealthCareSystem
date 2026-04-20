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

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Return early if we can't connect, helpful for frontend handling
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed. Please make sure the DB exists.']);
    exit;
}
?>
