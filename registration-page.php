<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="./assets/js/scipt.js"></script>
    <meta charset="UTF-8">
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
        <form action="./signup.php" method="post">
            <label>Login</label>
            <input type="text" name="login" placeholder="Input login" required>
            <label>Email</label>
            <input type="email" name="email" placeholder="Input email" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Input password" required>
            <label>Confirm the password</label>
            <input type="password" name="password_confirm" placeholder="Confirm the password" required>
            <button>Sign up</button>
            <div class="g-recaptcha" data-sitekey="6LelBeEoAAAAAMqvYQriXKxOcqRSFusWw2XtsnR5"></div>
            <p>
                Already have an account? <a href="./authorization-page.php" class="link">Login to account!</a>
            </p>

            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);

            ?>
            </p>


        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id='preloader'>
        <script src="./assets/js/preloader.js"></script>
    </div>
</body>

</html>