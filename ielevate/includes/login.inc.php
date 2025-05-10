<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["pwd"]);

    try {
        // Inkludera nödvändiga filer
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        // Kontrollera om input är tom
        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        // Hämta användardata från databasen
        $result = get_user($pdo, $username);

        // Kontrollera om användarnamnet är felaktigt
        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login information!";
        } 
        // Kontrollera om lösenordet är felaktigt
        else if (is_password_wrong($password, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login information!";
        }

        // Inkludera sessionhantering
        require_once 'config_session.inc.php';

        // Om det finns fel, spara dem i sessionen och omdirigera till index
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        // Skapa ett nytt session ID och sätt det
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        // Sätt sessionvariabler
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION['last_regeneration'] = time();

        // Spara profilbildens namn i sessionen
        $_SESSION['user_profile_pic'] = $result['profile_image'];  // Profilbildens namn sparas i sessionen

        // Omdirigera till index-sidan med en lyckad inloggning
        header("Location: http://localhost/ielevate/index.php?login=success");
        die();

    } catch (PDOException $e) {
        // Om det uppstår ett fel i databaskopplingen, visa ett felmeddelande
        die("Query failed: " . $e->getMessage());
    } 

} else {
    // Om det inte är en POST-förfrågan, omdirigera till index
    header("Location: ../index.php");
    die();
}
