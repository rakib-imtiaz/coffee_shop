<?php
$host = '127.0.0.1';
$dbname = 'little_avenue';
$username = 'root'; 
$password = 'root';     

try {
    // Use PDO to connect to the database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
