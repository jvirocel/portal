<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Check if required fields are provided
if (!isset($_POST['id']) || !isset($_POST['title'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'] ?? '';

try {
    $stmt = $pdo->prepare("UPDATE media SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Database error']);
} 