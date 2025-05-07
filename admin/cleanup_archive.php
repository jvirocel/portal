<?php
require_once '../config/database.php';

try {
    // Get all archived media older than 30 days
    $stmt = $pdo->prepare("SELECT id, file_path FROM media WHERE status = 'archived' AND archived_at < DATE_SUB(NOW(), INTERVAL 30 DAY)");
    $stmt->execute();
    $archived_media = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($archived_media as $media) {
        // Delete the file
        $file_path = '../' . $media['file_path'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        
        // Delete from database
        $stmt = $pdo->prepare("DELETE FROM media WHERE id = ?");
        $stmt->execute([$media['id']]);
    }
    
    echo "Cleanup completed successfully";
} catch (PDOException $e) {
    echo "Error during cleanup: " . $e->getMessage();
} 