<?php
session_start();
session_destroy();
setcookie(session_name(), '', time() - 3600, '/');
header('Content-Type: application/json');

echo json_encode(['status' => 'success', 'message' => 'Logged out successfully.']);
?>
