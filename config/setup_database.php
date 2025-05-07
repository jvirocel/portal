<?php
// Connect to MySQL without selecting a database
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Read and execute the SQL file
    $sql = file_get_contents('setup_database.sql');
    $pdo->exec($sql);
    
    echo "Database and tables created successfully!";
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?> 