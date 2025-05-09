<?php
include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = trim($_POST['comment']);

    if (!empty($comment)) {
        $stmt = $pdo->prepare("INSERT INTO comments (content, created_at) VALUES (?, NOW())");
        $stmt->execute([$comment]);
    }
}

header("Location: mål-utmaningar.php");
exit;
?>
