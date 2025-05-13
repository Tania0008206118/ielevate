<?php
include_once 'config_session.inc.php';
include_once 'dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location:/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
    $max_size = 5 * 1024 * 1024;

    $file = $_FILES['profile_image'];

    if (in_array($file['type'], $allowed_types) && $file['size'] <= $max_size) {
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = uniqid('', true) . '.' . $file_ext;
        $upload_path = __DIR__ . '/../uploads/' . $file_name;

        if (move_uploaded_file($file['tmp_name'], $upload_path)) {
            // Update the database with the new profile image path
            $stmt = $pdo->prepare("UPDATE users SET profile_image = ? WHERE id = ?");
            $stmt->execute([$file_name, $user_id]);

            // Update the profile image in the session for real-time reflection
            $_SESSION['profile_image'] = $file_name;

            // Redirect the user back to the profile page
            header("Location: /profilsidan.php?upload=success");
            exit();
        } else {
            // Redirect with an error message
            header("Location: /profilsidan.php?upload=error");
            exit();
        }
    } else {
        // Redirect with an error message if the file is invalid
        header("Location: /profilsidan.php?upload=invalid");
        exit();
    }
}
?>
