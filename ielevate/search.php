<?php 

if($_SERVER ["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST ["usersearch"];

        try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch", $userSearch);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null; //closing a connection
        }

        catch (PDOException $e) {

            die ("Query failed: " . $e->getMessage());
        }
    }
else {  
    header("Location: ../index.php");
}


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
<section>
<h3>Search resuts:</h3>

<?php 
if (empty($results)) {
    echo "<div>";
        echo "<p>No results!</p>";
            echo "</div>";


}

else {
foreach ($results as $row) {
    echo "<div>";
    echo "<h4>" . htmlspecialchars($row ["username"]) . "</h4>"; 
    echo "<p>" . htmlspecialchars ($row ["comment_text"]) . "</p>";
    echo "<p>" . htmlspecialchars ($row ["created_at"]) . "</p>";
    echo "</div>";
}


}

?>

</section>

</body>
</html>
