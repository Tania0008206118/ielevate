<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
'lifetime' => 1800,
'domain' => 'localhost',
'path' => '/',
'secure' => true,
'httponly' => true,
]);

session_start();



if(isset($_SESSION["user_id"])) {

    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_loggedin();
    } else {
     $interval = 60 * 10;
    
} } else{

if (!isset($_SESSION['last_regeneration'])) {
    regenerate_session_id_loggedin();
} else {
 $interval = 60 * 10;
}
}

if (!isset($_SESSION['last_regeneration'])) {
    regenerate_session_id();
} else {
 $interval = 60 * 10;

if (time() - $_SESSION['last_regeneration'] >= $interval) {
    regenerate_session_id();
}
}

function regenerate_session_id_loggedin() {
    if (!isset($_SESSION["user_id"])) {
        return; // Skydd: användaren är inte inloggad
    }

    session_regenerate_id(true);
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;

    $_SESSION['last_regeneration'] = time();
}


function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();

}
