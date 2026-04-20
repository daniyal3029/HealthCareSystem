<?php
require_once 'check_auth.php'; // Ensure user is logged in
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $disease = $_POST['disease'] ?? '';
    $status = $_POST['status'] ?? 'admitted';

    if (empty($name) || empty($age) || empty($disease)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO patients (name, age, disease, status) VALUES (?, ?, ?, ?)');
    if ($stmt->execute([$name, $age, $disease, $status])) {
        echo json_encode(['status' => 'success', 'message' => 'Patient added successfully.']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to add patient.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed.']);
}
?>
