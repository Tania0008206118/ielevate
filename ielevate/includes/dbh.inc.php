<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbName = 'myfirstdatabase';
$dbUsername = "root";
$dbPassword = "Mundgesicht123...";

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Set error mode to exception (very important!)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // Connection successful

} catch (PDOException $e) {
    // If connection fails, catch the error
    die("Connection failed: " . $e->getMessage());
}
