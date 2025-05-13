<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        // 1. Hämta användaren
        $query = "SELECT * FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($pwd, $user["pwd"])) {
            // Fel användarnamn eller lösenord
            header("Location: /index.php?delete=fail");
            exit();
        }

        // 2. Om allt stämmer – ta bort användaren
        $deleteQuery = "DELETE FROM users WHERE id = :id;";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->bindParam(":id", $user["id"]);
        $deleteStmt->execute();

        // 3. Stäng sessionen och logga ut användaren
        session_start();
        session_unset();
        session_destroy();

        // 4. Redirect to homepage with success message
        header("Location: /index.php?delete=success");
        exit();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: /index.php?deleted=true&user=" . urlencode($username));
    die();
}
