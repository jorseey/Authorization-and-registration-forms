<?php

session_start();
require_once('./connect.php');


require 'vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);

$dotenv -> load();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
$login_email = $_POST['login_email'];
$password = md5($_POST['password']);

// Recaptcha settings
$recaptcha_secret = $_ENV['RECP_SECRET'];
$recaptcha_response = $_POST['g-recaptcha-response'];

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
$responseKeys = json_decode($response, true);

if (intval($responseKeys["success"]) !== 1) {

    $_SESSION['message'] = "Please complete the CAPTCHA.";
    header("Location: ./authorization-page.php");
    exit();
}

$checkUserResult = pg_query($connection, "SELECT * FROM users WHERE (login = '$login_email' OR email = '$login_email') AND password = '$password'" );


if (pg_num_rows($checkUserResult) > 0) {

    $user= pg_fetch_assoc($checkUserResult);


    $_SESSION['user'] = [
        "login" => $user['login'],
        "email" => $user['email']
    ];

    header("Location: ../profile-page.php");
    exit();
}else{
    $_SESSION['message'] = "Invalid login or password!";
    header("Location: ../authorization-page.php");
    exit();
}
}

?> 