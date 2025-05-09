<?php 
session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>ielevate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Toggle-kontroller (osynliga checkboxar) -->
<input type="checkbox" id="login-toggle" hidden>
<input type="checkbox" id="signup-toggle" hidden>

<!-- Inloggningspopup -->
<?php
 if (!isset($_SESSION["user_id"])) {?> 
<div class="form-overlay" id="login-overlay"></div>
<div class="form-box login">
    <label for="login-toggle" class="close-btn">&times;</label>
    <h2>Logga in</h2>
    <form action="includes/login.inc.php" method="post">
        <label for="username">Användarnamn:</label>
        <input type="text" id="username" name="username" required>
        <label for="pwd">Lösenord:</label>
        <input type="pwd" id="pwd" name="pwd" required>
        <button type="submit">Logga in</button>
    </form>
</div>

<?php } ?>
   

<?php
check_login_errors();
output_username();
?>



<!-- Registreringspopup -->
<div class="form-overlay" id="signup-overlay"></div>
<div class="form-box signup">
    <label for="signup-toggle" class="close-btn">&times;</label>
    <h2>Registrera dig</h2>
    <form action="includes/signup.inc.php" method="post">
        <label for="username">Användarnamn:</label>
        <input type="text" id="username" name="username" required>
        <label for="pwd">Lösenord:</label>
        <input type="pwd" id="pwd" name="pwd" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Registrera dig!</button>
    </form>
</div>






<!-- Navbar -->
<header>
    <nav class="navigation">
        <div class="navbrand">ielevate</div>
        <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- User is logged in, show profile picture and logout -->
                    
        <div class="nav-center">
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="mal_utmaningar.php">Mål & Utmaningar</a></li>
                <li><a href="profilsidan.php">Profil</a></li>
                <li><a href="dagliguppf.php">Daglig uppföljning</a></li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="nav-right">
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- User is logged in, show profile picture and logout -->
                    <li><a href="profile.php">
                        <img src="uploads/<?php echo $_SESSION['user_profile_pic']; ?>" alt="Profile" class="profile-pic">
                    </a></li>
                    <li><a href="includes/logout.inc.php">Logout</a></li>
                <?php else: ?>
                    <!-- User is not logged in, show login and signup buttons -->
                    <li><label for="login-toggle" style="cursor:pointer;">Logga in</label></li>
                    <li><label for="signup-toggle" style="cursor:pointer;">Sign Up</label></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

</body>
</html>