<?php
declare(strict_types=1);

include_once 'config_session.inc.php';

/**
 * Hämta användare från databasen baserat på användarnamn
 *
 * @param PDO $pdo Databasanslutning
 * @param string $username Användarnamn som ska sökas
 * @return array|null Returnerar användardata eller null om inte hittad
 */
function get_user(PDO $pdo, string $username): ?array {
    $query = "SELECT * FROM users WHERE username = :username LIMIT 1;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
}
