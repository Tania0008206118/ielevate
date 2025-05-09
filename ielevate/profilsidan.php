<?php
    include_once "header.php";
    
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
</head>



    <main>
        <div class="rubrikprofil">
            <h3>Välkommen, Förnamn Efternamn! Din personliga utveckling börjar här.</h3>
        </div>

        <div class="textinnehåll">
            <!-- Profilbild uppdaterad -->
            <img src="https://i.ibb.co/rKsq8BLN/preview.webp" alt="Profilbild">
            <h3>Din profilsida</h3>
            <p>Här kan du hantera din personliga information, följa dina mål och se din utveckling.</p>
            <button onclick="alert('Redigera profil möjligheten kommer inom kort!')">Redigera profil</button>
        </div>

        <div class="create-goal">
            <h3>Beskriv dig själv:</h3>
            <form action="save_profile.php" method="post">
                <textarea name="description" rows="4" cols="50" placeholder="Skriv en kort beskrivning om dig själv..."></textarea><br>
                <input type="submit" value="Spara beskrivning">
            </form>
        </div>

        <div class="Gemenskap & Motivation">
            <h2>Din resa & Framsteg</h2>
        </div>

        <div class="textrader">
            <h3>Spåra och fira dina framgångar!</h3>
            <ul>
                <li><h3>Se dina framsteg – Få en överblick över vad du har uppnått.</h3></li>
                <li><h3>Sätt nya mål – Håll din motivation uppe genom att kontinuerligt utvecklas.</h3></li>
                <li><h3>Belöningar – Samla poäng och lås upp utmärkelser för dina insatser.</h3></li>
            </ul>
            <button onclick="alert('Se framsteg kommer inom kort!')">Se framsteg</button>
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
