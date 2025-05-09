<?php

    declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mål & Utmaningar</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="mål-utmaningar-sida">
    
    
    <main>
        <div class="din-resa">
            <!-- "Definiera dina mål"-rutan och "Skriv ner dina mål" -->
            <div class="textinnehåll">
                <h3>Definiera dina mål:</h3>
                <ul>
                    <li><h4>Vad vill du uppnå? Sätt en tydlig intention och en realistisk tidsram.</h4></li>
                    <li><h4>Bryt ner i delmål – Stora mål blir lättare att nå genom små, hanterbara steg.</h4></li>
                    <li><h4>Utmaningar för extra motivation – Delta i gemensamma utmaningar och tävla med andra!</h4></li>
                </ul>
            </div>

            <!-- Formulär för att skriva ner målet -->
            <div class="create-goal">
                <h3>Skriv ner dina mål:</h3>
                <form action="save_goal.php" method="post">
                    <textarea name="goal" rows="4" cols="50" placeholder="Skriv ditt mål här..."></textarea><br>
                    <input type="submit" value="Spara mål">
                </form>
            </div>

            <!-- Bild under Din resa börjar här -->
            <div class="resa-bild">
                <img src="https://i.ibb.co/1GXHr6KL/pixlr-image-generator-ee356873-665d-48c7-a1ea-2c156d036e9e.webp" alt="Bild">
            </div>

            <h2>Din resa börjar här – ta första steget idag!</h2>
        </div>

        <!-- Gemenskap & Motivation -->
        <div class="Gemenskap-Motivation">
            <h2>Gemenskap & Motivation</h2>
            <h3>Vi växer tillsammans!</h3>
            <h3>Delta i vårt community och få stöd, inspiration och motivation från andra medlemmar.</h3>
            <ul>
                <li><h3>Dela dina framsteg – Inspirera andra genom att dela din resa.</h3></li>
                <li><h3>Ge och få stöd – Kommentera, gilla och peppa andra i deras mål.</h3></li>
                <li><h3>Samla motiverande poäng – Få erkännande för dina insatser och lås upp belöningar!</h3></li>
            </ul>

            <h3>Tillsammans når vi längre!</h3>

            <!-- Skriv ett inlägg i communityn -->
            <div class="community-comments">
                <h3>Skriv ett inlägg i vår community!</h3>
                <form action="save_comment.php" method="post">
                    <textarea name="comment" rows="4" cols="50" placeholder="Skriv din kommentar här..."></textarea><br>
                    <input type="submit" value="Ladda upp kommentar">
                </form>
            </div>
        </div>
    </main>

<!-- Footer med fullständig kontaktinformation -->
<footer>
    <div class="footer-container">
        <p>&copy; 2025 ielevate.</p>
        <div class="footer-info">
            <p><strong>Kontaktinformation</strong></p>
            <p>
                <a href="mailto:kontakt@ielevate.se">E-post: kontakt@ielevate.se</a><br>
                <a href="tel:+46-123456789">Telefon: +46 123 456 789</a><br>
                <strong>Adress:</strong> Exempelgatan 123, 123 45 Stockholm<br>
                <strong>Öppettider:</strong> Mån-Fre 09:00-18:00, Lör-Sön Stängt
            </p>
        </div>
    </div>
</footer>

</body>
</html>