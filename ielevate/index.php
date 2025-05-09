<?php
    include_once "header.php";
    
?>


<body>
    <div class="marquee">
        <form class="searchform" action="search.php" method="post">
            <label for="search"></label>
            <input id="search" type="text" name="usersearch" placeholder="Sök efter användare...">
            <button type="submit">Sök</button>
        </form>

        <div class="marquee_blur" aria-hidden="true">
            <p class="marquee_text">Välkommen till ielevate.</p>
        </div>
        <div class="marquee_clear">
            <p class="marquee_text">Välkommen till ielevate.</p>
        </div>
    </div>
    <p class="dashboard_text">Din Plattform för Personlig Utveckling</p>
    <main>
        <section class="dashboard">
            <h3>Om oss</h3>
            <p>Välkommen till iElevate – din plattform för personlig utveckling. Här får du verktygen och stödet du behöver för att växa, utvecklas och nå dina mål. Oavsett om du vill skapa nya vanor, följa dina framsteg eller hantera utmaningar, finns vi här för att hjälpa dig. Sätt upp tydliga mål, få insikter genom statistik och grafer, och låt oss motivera dig varje dag. Små steg leder till stora förändringar, och tillsammans skapar vi en väg mot framgång. Registrera dig idag och ta det första steget mot en bättre version av dig själv.</p>
        </section>

        <section class="mål">
            <h3>Mål & Utmaningar</h3>
            <p>Gör dina drömmar till verklighet genom att skapa och hantera dina mål och utmaningar. Här får du verktygen för att hålla fokus och motivation på vägen mot framgång. Sätt tydliga intentioner, skapa en realistisk tidsplan och bryt ner dina mål i hanterbara steg. Utmana dig själv och delta i inspirerande utmaningar tillsammans med andra för extra motivation. Varje steg du tar för dig närmare din vision – börja din resa idag!</p>
        </section>

        <section class="profil">
            <h3>Profil</h3>
            <p>Din resa, ditt tempo. På din profilsida får du en översikt över dina mål, framsteg och belöningar – din personliga plats för reflektion och utveckling. Anpassa din profil för att göra den till din egen, följ dina framsteg och se vad du har uppnått. Justera dina inställningar så att upplevelsen passar dina behov. Din utveckling är viktig, och här har du verktygen för att ta kontroll över din resa!</p>
        </section>

        <section class="uppföljning">
            <h3>Daglig Uppföljning</h3>
            <p>Små insatser skapar stora resultat. För att lyckas är det viktigt att reflektera och följa sina framsteg. Här kan du enkelt logga dina dagliga insatser och se hur de påverkar din utveckling. Dokumentera dina framsteg, tankar och insikter, visualisera din resa med bilder och inspiration och följ din utveckling i realtid genom tydliga diagram och statistik. Varje steg räknas – börja logga din framgång idag!</p>
        </section>

<!-- Boka Tid Sektion -->
<section class="boka-tid">
    <h3>Boka Tid</h3>
    <p>Har du frågor eller behöver hjälp? Boka en tid med oss.</p>
    <input type="checkbox" id="toggle-kontakt" class="toggle-kontakt">
    <label for="toggle-kontakt" class="boka-now-btn">Boka nu</label>
    
    <!-- Dold kontaktinformation -->
    <div class="kontakt-info">
        <p>
            <a href="mailto:kontakt@ielevate.se">E-post: kontakt@ielevate.se</a><br>
            <a href="tel:+46-123456789">Telefon: +46 123 456 789</a>
        </p>
    </div>
</section>

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
