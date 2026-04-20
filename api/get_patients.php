<?php
require_once 'check_auth.php'; // Ensure user is logged in
require_once 'db.php';
// check_auth.php already starts session and outputs headers

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query('SELECT * FROM patients ORDER BY created_at DESC');
    $patients = $stmt->fetchAll();
    // We clear output buffer slightly to ensure clean JSON if needed, but not necessary.
    echo json_encode(['status' => 'success', 'data' => $patients]);
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed.']);
}
?>
