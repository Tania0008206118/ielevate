<?php

declare (strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);


    } else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {

        echo '<br>';
        echo '<p class="form-success">Signup success!</p>';
    }

}