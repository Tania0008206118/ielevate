<?php

        // Anslutningar och funktioner
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'config_session.inc.php';

        
// Visa fel vid utveckling
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ta emot data och rensa den
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["pwd"]);

    try {


        // Felhantering
        $errors = [];

        if (empty($username) || empty($password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        // Hämta användaren från databasen
        $user = get_user($pdo, $username);

        if (!$user) {
            $errors["login_incorrect"] = "Incorrect login information!";
        } else {
            // Kontrollera lösenord
            if (!password_verify($password, $user["pwd"])) {
                $errors["login_incorrect"] = "Incorrect login information!";
            }
        }

        // Om det finns fel, spara dem i sessionen och skicka tillbaka till formuläret
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: /index.php");
            exit();
        }

        // Sätt sessionsvariabler
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_username"] = htmlspecialchars($user["username"]);
        $_SESSION["user_profile_pic"] = $user["profile_image"] ?? null;
        $_SESSION["last_regeneration"] = time();

        // Omdirigera till startsidan
        header("Location: /index.php?login=success");
        exit();

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }

} else {
    // Om någon försöker komma hit direkt
    header("Location: /index.php");
    exit();
}
