<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Check if ID is provided
if (!isset($_POST['id'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'No media ID provided']);
    exit;
}

$id = $_POST['id'];

try {
    // Get the file path before archiving
    $stmt = $pdo->prepare("SELECT file_path, title, description, file_type FROM media WHERE id = ?");
    $stmt->execute([$id]);
    $media = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($media) {
        // Create archive directory if it doesn't exist
        $archive_dir = '../assets/archive/';
        if (!file_exists($archive_dir)) {
            mkdir($archive_dir, 0777, true);
        }
        
        // Move the file to archive
        $original_path = '../' . $media['file_path'];
        $archive_path = $archive_dir . basename($media['file_path']);
        
        if (file_exists($original_path)) {
            // Move file to archive
            if (rename($original_path, $archive_path)) {
                // Update the file path in database to point to archive
                $archive_file_path = 'assets/archive/' . basename($media['file_path']);
                try {
                    $stmt = $pdo->prepare("UPDATE media SET file_path = ?, status = 'archived', archived_at = NOW() WHERE id = ?");
                    $stmt->execute([$archive_file_path, $id]);
                } catch (PDOException $e) {
                    // If archived_at column doesn't exist, try without it
                    $stmt = $pdo->prepare("UPDATE media SET file_path = ?, status = 'archived' WHERE id = ?");
                    $stmt->execute([$archive_file_path, $id]);
                }
                
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Media archived successfully']);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Error moving file to archive']);
            }
        } else {
            // If file doesn't exist, just update the status
            try {
                $stmt = $pdo->prepare("UPDATE media SET status = 'archived', archived_at = NOW() WHERE id = ?");
                $stmt->execute([$id]);
            } catch (PDOException $e) {
                // If archived_at column doesn't exist, try without it
                $stmt = $pdo->prepare("UPDATE media SET status = 'archived' WHERE id = ?");
                $stmt->execute([$id]);
            }
            
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Media status updated to archived']);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Media not found']);
    }
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Database error']);
} 