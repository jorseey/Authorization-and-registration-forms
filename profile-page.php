<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
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

    <form>
        <label><?= $_SESSION['user']['login'] ?></label>
        <label><?= $_SESSION['user']['email'] ?></label>
        <a href="./logout.php" class = "logout">Exit</a>
    </form>
    





</body>

</html>