<?php
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Kontrollera att användaren är inloggad
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../index.php?error=notloggedin");
        exit();
    }

    $userId = $_SESSION["user_id"]; // Hämtar användarens ID från sessionen
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        // Hashta lösenordet innan uppdatering
        $options = ['cost' => 12];
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $query = "UPDATE users SET username = :username, pwd = :pwd, email = :email WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $userId);

        $stmt->execute();

        // Rensa och stäng
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?update=success");
        exit();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    exit();
}
