<?php
require_once '../config/database.php';

try {
    // Add new columns for archiving if they don't exist
    $pdo->exec("ALTER TABLE media 
        ADD COLUMN IF NOT EXISTS status VARCHAR(20) DEFAULT 'active',
        ADD COLUMN IF NOT EXISTS archived_at DATETIME DEFAULT NULL");
    
    // Update any existing records that don't have a status
    $pdo->exec("UPDATE media SET status = 'active' WHERE status IS NULL");
    
    echo "Media table updated successfully";
} catch (PDOException $e) {
    echo "Error updating media table: " . $e->getMessage();
} 