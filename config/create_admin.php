<?php
// Connect to MySQL without selecting a database
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS candon_city");
    $pdo->exec("USE candon_city");
    
    // Create tables
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login TIMESTAMP NULL
    )");
    
    // Generate fresh password hash
    $admin_password = 'admin123';
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
    
    // Clear existing admin user if exists
    $pdo->exec("DELETE FROM admin_users WHERE username = 'admin'");
    
    // Insert new admin user with fresh hash
    $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, full_name, email) VALUES (?, ?, ?, ?)");
    $stmt->execute(['admin', $hashed_password, 'Administrator', 'admin@candoncity.gov.ph']);
    
    echo "Admin user created successfully!<br>";
    echo "Username: admin<br>";
    echo "Password: admin123<br>";
    echo "Hash used: " . $hashed_password;
    
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?> 