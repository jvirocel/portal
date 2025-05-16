<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost:3306';
$dbname = 'virolwmh_portal';
$username = 'virolwmh_portal';
$password = '^@pCd1C#zC5uJ368HK9TNeSYn5gpSqdgNAzgOux^k2O4VbpZh0KVE1!ZFxx^hPBVkZycGV6o1p0Q$D5dfPnIWg&&ALtopcr#dhXQf9GWIROOc65%&zdi@S$dP7ORq4fZ';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 