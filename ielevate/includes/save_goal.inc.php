<?php
declare(strict_types=1);
require_once 'config_session.inc.php';

require_once 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $goal = trim($_POST['goal'] ?? '');

    // Rätt sessionsnyckel + kontroll
    if (!empty($goal) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username'];

        // Lägg till mål
        $stmt = $pdo->prepare("INSERT INTO goals (username, content, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$username, $goal]);
    }
}

// Skicka användaren tillbaka
header("Location: http://localhost/ielevate/mal_utmaningar.php");
exit();
