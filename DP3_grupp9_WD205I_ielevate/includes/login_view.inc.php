<?php function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_login"]);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo "<p>Login successful!</p>";  // Debugging line to check success message
    }
}

function output_username() {
    // Debugging: Check if session variables are set
    if (isset($_SESSION["user_id"])) {
        echo "Välkommen, " . $_SESSION["user_username"] . "!";
    } else {
        echo "Du är inte inloggad!";
    }
}
