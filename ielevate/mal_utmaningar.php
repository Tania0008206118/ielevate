<?php
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'includes/config_session.inc.php';
include_once 'header.php';
include 'includes/dbh.inc.php';

// Fetch all comments from the database (including users_id)
$comments = [];  // Initialize the variable to ensure it's defined
$goals = []; // Initialize the goals array

// Set a limit for the number of comments and goals per page
$limit = 4;

// Get the current offset (how many comments/goals have been displayed so far)
$offset_comments = isset($_GET['offset_comments']) ? (int) $_GET['offset_comments'] : 0;
$offset_goals = isset($_GET['offset_goals']) ? (int) $_GET['offset_goals'] : 0;

// Fetch comments from the database with the limit and offset for pagination
$stmt_comments = $pdo->prepare("SELECT id, username, comment_text, created_at FROM comments ORDER BY created_at DESC LIMIT ?, ?");
$stmt_comments->bindValue(1, $offset_comments, PDO::PARAM_INT);
$stmt_comments->bindValue(2, $limit, PDO::PARAM_INT);
$stmt_comments->execute();
$comments = $stmt_comments->fetchAll();

// Fetch goals from the database with the limit and offset for pagination
$stmt_goals = $pdo->prepare("SELECT id, content, created_at, username FROM goals WHERE username = ? ORDER BY created_at DESC LIMIT ?, ?");
$stmt_goals->bindValue(1, $_SESSION['user_username'], PDO::PARAM_STR);
$stmt_goals->bindValue(2, $offset_goals, PDO::PARAM_INT);
$stmt_goals->bindValue(3, $limit, PDO::PARAM_INT);
$stmt_goals->execute();
$goals = $stmt_goals->fetchAll();
?>

<body class="body">
    <main class="main-container">
        <div class="goal-container">
            <div class="textinnehåll">
                <h3 class="defineramal">Definiera dina mål:</h3>
                <p>
                    Sätt upp dina mål för en starkare framtid.<br><br>
                    Att sätta mål är ett viktigt steg på vägen mot framgång. Det handlar om att 
                    <span class="mal1">definiera</span> vad du vill uppnå och skapa en plan för att nå dit. Här är några tips för att hjälpa dig på vägen:<br><br>
                    <span class="mal1">Tydlig intention:</span> Tänk på vad du verkligen vill åstadkomma. Sätt en klar vision för vad du vill uppnå och ge det en realistisk tidsram.<br><br>
                    <span class="mal1">Dela upp i små steg:</span> Stora mål kan kännas överväldigande, men när du delar upp dem i mindre delmål blir de lättare att hantera och nå.<br><br>
                    <span class="mal1">Utmaningar för motivation:</span> Sätt upp utmaningar för dig själv och delta i gemensamma aktiviteter för extra inspiration och pepp från andra.<br><br>
                    <span class="mal1">Ta ett djupt andetag och börja skriva dina mål. Kom ihåg att varje steg, stort eller litet, är ett steg närmare ditt mål!</span>
                </p>
            </div>

            <div class="create-goal">
                <h3>Skriv ner dina mål:</h3>
                <form action="includes/save_goal.inc.php" method="post">
                    <textarea name="goal" rows="4" cols="50" placeholder="Skriv ditt mål här..."></textarea><br>
                    <input type="submit" value="Spara mål" class="btn-submit">
                </form>

                <div class="goals-lista">
                    <h3>Dina mål</h3>
                    <?php if (count($goals) > 0): ?>
                        <?php foreach ($goals as $goal): ?>
                            <div class="goals-box">
                                <div class="goals-header">
                                    <strong><?= htmlspecialchars($goal['username']) ?>:</strong>
                                    <span class="goals-datum"><?= htmlspecialchars($goal['created_at']) ?></span>
                                </div>
                                <div class="goals-text"><?= nl2br(htmlspecialchars($goal['content'])) ?></div>
                                <form action="includes/delete_goals.inc.php" method="post" onsubmit="return confirm('Är du säker på att du vill ta bort detta mål?');">
                                    <input type="hidden" name="goal_id" value="<?= $goal['id'] ?>">
                                    <button type="submit" class="btn-delete">Ta bort</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Du har inga mål än. Skriv ner dina mål för att komma igång!</p>
                    <?php endif; ?>

                    <!-- Show More Button for Goals -->
                    <div class="show-more-container">
                        <?php if (count($goals) == $limit): ?>
                            <a href="?offset_goals=<?= $offset_goals + $limit ?>" class="btn-show-more">Visa mer</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="stegetidag">Din resa börjar här – ta första steget idag!</h2>

        <div class="Gemenskap-Motivation">
            <h2>Gemenskap & Motivation</h2>
            <p>
                Välkommen till en gemenskap där varje steg räknas. Här stöttar vi varandra, firar framgångar och lyfter varandra när det känns motigt.
                Tillsammans skapar vi ett utrymme fyllt av inspiration, pepp och genuint engagemang.
            </p>
        </div>

        <!-- Community comments section -->
        <div class="community-comments">
            <h3>Skriv ett inlägg i vår community!</h3>
            <form action="/ielevate/includes/save_comment.inc.php" method="post">
                <textarea name="comment" rows="4" cols="50" placeholder="Skriv din kommentar här..."></textarea><br>
                <input type="submit" value="Ladda upp kommentar" class="btn-submit">
            </form>
        </div>

        <!-- Display comments -->
        <div class="community-comments-list">
            <h3>Community Inlägg</h3>
            <?php if (count($comments) > 0): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-box">
                        <div class="comment-header">
                            <strong><?= htmlspecialchars($comment['username']) ?>:</strong>
                            <span class="comment-date"><?= htmlspecialchars($comment['created_at']) ?></span>
                        </div>
                        <div class="comment-text"><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Det finns inga kommentarer än. Bli den första att skriva!</p>
            <?php endif; ?>

            <!-- Show More Button for Comments -->
            <div class="show-more-container">
                <?php if (count($comments) == $limit): ?>
                    <a href="?offset_comments=<?= $offset_comments + $limit ?>" class="btn-show-more">Visa mer</a>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 ielevate.</p>
        </div>
    </footer>
</body>
</html>
