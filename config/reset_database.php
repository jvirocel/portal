<?php
// Connect to MySQL without selecting a database
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Drop the database if it exists
    $pdo->exec("DROP DATABASE IF EXISTS candon_city");
    
    // Read and execute the SQL file
    $sql = file_get_contents('setup_database.sql');
    $pdo->exec($sql);
    
    echo "Database has been reset successfully!<br>";
    echo "You can now login with:<br>";
    echo "Username: admin<br>";
    echo "Password: admin123";
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?> 