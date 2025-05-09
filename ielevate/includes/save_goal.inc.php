<?php
include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $goal = trim($_POST['goal']);

    if (!empty($goal)) {
        $stmt = $pdo->prepare("INSERT INTO goals (content, created_at) VALUES (?, NOW())");
        $stmt->execute([$goal]);
    }
}

header("Location: mål-utmaningar.php");
exit;
?>