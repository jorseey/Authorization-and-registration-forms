<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="./assets/js/scipt.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization</title>
</head>

<body>
    <header>

        <nav class="navigation">
            <a href="./index.php">JORSEEY</a>
            <a href="./index.php">JORSEEY</a>
        </nav>
    </header>
    <!-- Header  end-->
    <div class="wrapper">


        <form action="./signin.php" method="post">
            <label>Login/email</label>
            <input type="text" name="login_email" placeholder="Input login/email" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Input password" required>
            <button type="submit">Sign in</button>
            <div class="g-recaptcha" data-sitekey="6LelBeEoAAAAAMqvYQriXKxOcqRSFusWw2XtsnR5"></div>

            <p>
                Don't have an account? <a href="./registration-page.php" class="link">Сreate it!</a>
            </p>

            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);

            ?>

        </form>
    </div>

    <div id='preloader'>
        <script src="./assets/js/preloader.js"></script>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>