<?php
include_once 'config_session.inc.php';
include_once 'dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $description = trim($_POST['description']);
    $stmt = $pdo->prepare("UPDATE users SET description = ? WHERE id = ?");
    $stmt->execute([$description, $user_id]);
}

header("Location: /profilsidan.php");
exit();
