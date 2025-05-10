<?php
include_once 'includes/config_session.inc.php';
include_once 'includes/dbh.inc.php';
include_once 'header.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT username, profile_image, description, email, created_at FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Användare hittades inte.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="body-profilsidan">
<main>
    <div class="profil-container">
        <h3>Välkommen, <?php echo htmlspecialchars($user['username']); ?>!</h3>

        <!-- Profile Image -->
        <div class="profile-image">
            <img src="uploads/<?php echo htmlspecialchars($user['profile_image'] ?? 'default.jpg'); ?>" alt="Profilbild" width="150" height="150">
            <a href="javascript:void(0);" class="edit-icon" onclick="toggleEditProfileImage()">
                <i class="fas fa-edit"></i>
            </a>
        </div>

        <!-- Edit Profile Image Form -->
        <div id="editProfileImageForm" style="display:none;">
            <form action="includes/profile_upload.inc.php" method="POST" enctype="multipart/form-data">
                <label for="profile_image">Välj en profilbild:</label>
                <input type="file" name="profile_image" id="profile_image" required>
                <button type="submit">Ladda upp bild</button>
            </form>
        </div>

        <!-- Profile Info -->
        <div class="kort_info">
            <h3><?php echo htmlspecialchars($user['username']); ?></h3>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Medlem sedan:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>


            
            <!-- Edit Form for Name and Email -->
            <div id="editPersonalInfoForm" style="display:none;">
                <form action="includes/profile_save.inc.php" method="post">
                    <label for="username">Användarnamn:</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    <br>
                    <input type="submit" value="Spara ändringar">
                </form>
            </div>

            <!-- Description Section -->
            <div class="profil-details">
                <p><strong>Beskrivning:</strong> <?php echo htmlspecialchars($user['description'] ?? 'Ingen beskrivning ännu.'); ?></p>
                <a href="javascript:void(0);" class="edit-icon" onclick="toggleEditDescription()">
                    <i class="fas fa-edit"></i> Redigera beskrivning
                </a>
            </div>

            <!-- Edit Description Form -->
            <div id="editDescriptionForm" style="display:none;">
                <form action="includes/profile_save.inc.php" method="post">
                    <textarea name="description" rows="4" cols="50" placeholder="Skriv om dig själv..."><?php echo htmlspecialchars($user['description']); ?></textarea><br>
                    <input type="submit" value="Spara beskrivning">
                </form>
            </div>
        </div>

    </div>
</main>

<!-- Footer -->
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

<script>
    // Toggle visibility of the form to edit profile image
    function toggleEditProfileImage() {
        var form = document.getElementById('editProfileImageForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    // Toggle visibility of the form to edit personal information
    function toggleEditPersonalInfo() {
        var form = document.getElementById('editPersonalInfoForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    // Toggle visibility of the form to edit description
    function toggleEditDescription() {
        var form = document.getElementById('editDescriptionForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

</body>
</html>