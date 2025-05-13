<?php
include_once 'config_session.inc.php';


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
date_default_timezone_set('Europe/Stockholm');
$host = '127.0.0.1';
$dbName = 'myfirstdatabase';
$dbUsername = "root";
$dbPassword = ''; // No password for root

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // Connection successful

} catch (PDOException $e) {
    // If connection fails, catch the error
    die("Connection failed: " . $e->getMessage());
}
