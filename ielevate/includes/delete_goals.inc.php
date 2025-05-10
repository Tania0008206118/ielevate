<?php
declare(strict_types=1);
session_start();
require_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goal_id'], $_SESSION['user_username'])) {
    $goalId = (int) $_POST['goal_id'];
    $username = $_SESSION['user_username'];

    $stmt = $pdo->prepare("DELETE FROM goals WHERE id = ? AND username = ?");
    $stmt->execute([$goalId, $username]);
}

header("Location: ../mal_utmaningar.php");
exit;