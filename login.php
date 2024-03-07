<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="body-login">

    <div class="form-structure">
        <div class="form">

            <h1 class="form-h1">inloggen</h1>
        
            <form method="post" class="form-main">
                <label class="form-label">Username:</label>
                <br>
                <input type="text" name="username" placeholder="Username" class="input-size" required>

                <br>

                <label class="form-label">Password:</label>
                <br>
                <input type="password" name="password" placeholder="Password" class="input-size" required>

                <br>

                <input type="submit" name="inloggen" value="Inloggen" class="button-size">

                <br>

                <?php
                    include 'config.php';

                        if (isset($_POST['inloggen'])) {
                            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                            $password = $_POST['password'];
                            $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user");
                            $query->bindParam("user", $username);
                            $query->execute();

                            if ($query->rowCount() == 1) {
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if (password_verify($password, $result["password"])) {
                                    header("location: index.php?username=" . urldecode($username));
                                    exit;
                                }
                            } else {
                                echo "<p class='fail-inloggen'>Onjuiste gegevens!</p>";
                            }
                                echo "<br>";
                        }

                ?>
                
                <p class="sign-up-tekst">Klik hier om te <a class="sign-up-link" href="register.php">Sign Up</a></p>
            </form>

        </div>
    </div>

</body>
</html>