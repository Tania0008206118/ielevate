<?php
    include_once "header.php";
    
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daglig Uppföljning</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="body">
    
    <main>
        <div class="rubrik">
            <h3>Små insatser skapar stora resultat</h3>
            <p>För att lyckas behöver vi reflektera och följa våra framsteg. Här kan du enkelt logga dina dagliga insatser och se hur de påverkar din utveckling.</p>
        </div>
    
        <div class="logprogress">
            <h3>Skriv en daglig logg</h3>
            <form action="save_progress.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea name="progress" rows="4" placeholder="Dokumentera dina framsteg, tankar och insikter..." class="input-field"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" accept="image/*" class="file-input">
                </div>
                <div class="form-group">
                    <input type="url" name="link" placeholder="Lägg till en inspirationslänk..." class="input-field">
                </div>
                <button type="submit" class="btn-submit">Logga framsteg</button>
            </form>
        </div>
    
        <div class="progress-stats">
            <h3>Se din utveckling i realtid</h3>
            <p>Diagram och statistik visar hur långt du har kommit.</p>
            <button onclick="alert('Statistikfunktion kommer snart!')" class="btn-stats">Se statistik</button>
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