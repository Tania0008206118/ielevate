<?php 
// Visa alla fel under utveckling (ta bort i produktion)
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Säkra sessionsinställningar – måste sättas innan session_start()
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Sätt sessionens cookie-parametrar innan session_start()
session_set_cookie_params([
    'lifetime' => 1800, // 30 min
    'domain' => 'webbutveckling-taniadaloi0008206118.codeanyapp.com',
    'path' => '/',
    'secure' => true,  // Endast om HTTPS används
    'httponly' => true,
    'samesite' => 'Strict'
]);

// Starta sessionen här
session_start();

// Inkludera databasanslutning
include_once 'dbh.inc.php';

// === SESSIONREGLER ===

$interval = 60 * 10; // 10 minuter

if (isset($_SESSION["user_id"])) {
    // Inloggad användare – kontrollera om det är dags att förnya ID
    if (!isset($_SESSION['last_regeneration']) || time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id_loggedin();
    }
} else {
    // Gäst – använd enklare session-ID-förnyelse
    if (!isset($_SESSION['last_regeneration']) || time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id();
    }
}

// === FUNKTIONER ===

// För inloggade användare – skapar nytt ID med användarens ID i namnet
function regenerate_session_id_loggedin() {
    if (!isset($_SESSION["user_id"])) {
        return;
    }

    session_regenerate_id(true);

    // Valfritt: skapa ett anpassat session-ID (inte nödvändigt, kan tas bort om du vill)
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    session_id($newSessionId . "_" . $userId); // OBS! Inte nödvändigt för säkerhet

    $_SESSION['last_regeneration'] = time();
}

// För gäster
function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
?>
