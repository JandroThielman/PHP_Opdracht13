<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body class="body-register">

    <div class="form-structure">
        <div class="form">

            <h1 class="form-h1">Sign-Up</h1>
        
            <form method="post" class="form-main">
                <label class="form-label">Username:</label>
                <br>
                <input type="text" name="username" placeholder="Username" class="input-size" required>

                <br>

                <label class="form-label">Password:</label>
                <br>
                <input type="password" name="password" placeholder="Password" class="input-size" required>

                <br>

                <input type="submit" name="sign-up" value="Sign Up" class="button-size">

                <br>

                <?php
                    include 'config.php';

                    $randomNumber = rand(1, 5);

                    if (isset($_POST['sign-up'])) {

                        $foto;

                        if ($randomNumber === 1) {
                            $foto = 'account-image1.webp';
                        } else if ($randomNumber === 2) {
                            $foto = 'account-image2.webp';
                        } else if ($randomNumber === 3) {
                            $foto = 'account-image3.webp';
                        } else if ($randomNumber === 4) {
                            $foto = 'account-image4.webp';
                        } else if ($randomNumber === 5) {
                            $foto = 'account-image5.webp';
                        }

                        $username = $_POST['username'];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $query = $db->prepare("INSERT INTO gebruikers(username, password, foto) VALUES(:username, :password, :foto)");
                        $query->bindParam(':username', $username);
                        $query->bindParam(':password', $password);
                        $query->bindParam(':foto', $foto);
                        $query->execute();

                        header("location: login.php");
                        exit;
                        
                    }
                    
                ?>

                <p class="sign-up-tekst">Klik hier om te <a class="sign-up-link" href="login.php">Login</a></p>

            </form>

        </div>
    </div>

</body>
</html>