<?php

include 'dbh.inc.php';
require_once 'config_session.inc.php';


$username = $_SESSION['user_username'] ?? 'Anonym'; // Använd 'Anonym' om ingen användare är inloggad


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = trim($_POST['comment']);

    if (!empty($comment)) {
       $stmt = $pdo->prepare("INSERT INTO comments (username, comment_text, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$username, $comment]); // Skicka med användarnamn och kommentar
    }
}

header("Location: http://localhost/ielevate/mal_utmaningar.php");
die(); 

?>