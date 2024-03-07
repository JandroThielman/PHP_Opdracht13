<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body class="body-home">

    <?php

        include 'config.php';

        $username = isset($_GET['username']) ? $_GET['username'] : '';

        $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user");
        $query->bindParam('user', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        echo '<div class="account_image">';
        echo "<img class='profile-image' src='./assets/" . $result['foto'] . "'>";
        echo '</div>';

        echo "<h1 class='profile-tekst'>" . $username . "'s Account</h1>";

    ?>

        <div class="log-in-structure">
            <form method="post" action="loguit.php">
                <input type="submit" value="Log Uit" class="log-uit-button" name="loguit">
            </form>
        </div>
    
</body>
</html>