<?php

declare(strict_types=1);
include_once 'config_session.inc.php';

/**
 * Kontrollera om användarnamn eller lösenord saknas
 */
function is_input_empty(string $username, string $pwd): bool {
    return empty($username) || empty($pwd);
}

/**
 * Kontrollera om användaren finns i databasen
 */
function is_username_wrong(?array $result): bool {
    return $result === null;
}

/**
 * Kontrollera om lösenordet är felaktigt
 */
function is_password_wrong(string $pwd, string $hashedPwd): bool {
    return !password_verify($pwd, $hashedPwd);
}
