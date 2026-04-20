<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}

$response = [
    "status" => "success",
    "user" => [
        "id" => $_SESSION['user_id'],
        "username" => $_SESSION['username']
    ]
];
echo json_encode($response);
?>
