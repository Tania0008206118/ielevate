<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/login_view.inc.php';

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>


<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ielevate</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body>
<?php
 if (!isset($_SESSION["user_id"])) {?> 
     <h3> login </h3>

     <form action="includes/login.inc.php" method="post">
         <input type="text" name="username" placeholder="Username">
         <input type="password" name="pwd" placeholder="Password">
         <button type="submit">Login</button>
     </form>

<?php } ?>
   

            <?php
            check_login_errors();
            output_username();
            ?>
            
<h3> logout </h3>

    <form action="includes/logout.inc.php" method="post">
    <button type="submit">Logout</button>
    </form>


    <h3> Signup </h3>

        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="email" placeholder="E-mail">
            <button type="submit">Signup</button>
        </form>

        <?php
        
        check_signup_errors();
        
        ?>





    <form class= "searchform" action="search.php" method="post">
            <label for="search">Search for user:</label>
            <input id="search" type="text" name="usersearch" placeholder="search...">
            <button type="search">Search</button>
    </form>

    <h3> Change Account </h3>

    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-mail">
        <button type="submit">Update</button>
    </form>

    <h3> Delete Account </h3>

    <form action="includes/userdelete.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit">Delete</button>
    </form>
    <?php
        if (isset($_GET['deleted']) && isset($_GET['user'])) {
            $username = htmlspecialchars($_GET['user']);
            echo "<p>Hej då, $username! Ditt konto är nu raderat. Vi hoppas att vi ses igen!</p>";
        }
        ?>

</body>
</html>

