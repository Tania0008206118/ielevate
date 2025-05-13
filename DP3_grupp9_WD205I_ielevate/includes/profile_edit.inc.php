<?php
include_once 'config_session.inc.php';
include_once 'dbh.inc.php';

// Kontrollera att användaren är inloggad
if (!isset($_SESSION['user_id'])) {
    header("Location: /profilsidan.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Hämta användardata
$stmt = $pdo->prepare("SELECT username, profile_image, description FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Användare hittades inte.";
    exit();
}

// Hantera profilbildsändring
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $imageFile = $_FILES['profile_image'];
    $imageName = $imageFile['name'];
    $imageTmpName = $imageFile['tmp_name'];
    $imageSize = $imageFile['size'];
    $imageError = $imageFile['error'];
    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    // Tillåtna filtyper
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

    // Kontrollera om filen är en giltig bild
    if (in_array($imageExt, $allowedExtensions) && $imageError === 0) {
        if ($imageSize < 5000000) { // Begränsning på 5MB
            $newImageName = uniqid('', true) . "." . $imageExt;
            $imageDestination = 'uploads/' . $newImageName;
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // Uppdatera profilbilden i databasen
                $stmt = $pdo->prepare("UPDATE users SET profile_image = ? WHERE id = ?");
                $stmt->execute([$newImageName, $user_id]);
            } else {
                echo "Kunde inte flytta filen. Försök igen.";
            }
        } else {
            echo "Filen är för stor.";
        }
    } else {
        echo "Ogiltig bildtyp eller fel vid uppladdning.";
    }
}

// Hantera uppdatering av beskrivning
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $description = trim($_POST['description']);
    // Uppdatera beskrivningen i databasen
    $stmt = $pdo->prepare("UPDATE users SET description = ? WHERE id = ?");
    $stmt->execute([$description, $user_id]);
}

// Efter att ändringarna har sparats, omdirigera till profilsidan
header("Location: /profilsidan.php");
exit();
