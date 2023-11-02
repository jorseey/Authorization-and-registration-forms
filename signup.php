<?php
session_start();
// Connect to db
require_once('./connect.php');


require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);

$dotenv->load();

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $verify_token = md5(rand());

    // Recaptcha settings
    $recaptcha_secret = $_ENV['RECP_SECRET'];
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {

        $_SESSION['message'] = "Please complete the CAPTCHA.";
        header("Location: ./registration-page.php");
        exit();
    }

    // Login exists or not
    $checkLogin = "SELECT * FROM users WHERE login = '$login'";
    $checkLoginResult = pg_query($connection, $checkLogin);

    if (pg_num_rows($checkLoginResult) > 0) {
        $_SESSION['message'] = "User with the same login  already exists.";
        header("Location: ./registration-page.php");
        exit();
    }

    // Email exists or not
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = pg_query($connection, $checkEmail);

    if (pg_num_rows($checkEmailResult) > 0) {
        $_SESSION['message'] = "User with the same email already exists.";
        header("Location: ./registration-page.php");
        exit();
    }

    // Main registration settings
    if ($password === $password_confirm) {
        $password = md5($password);
        $query = "INSERT INTO users (login, email, password, verify_token) VALUES ('$login', '$email', '$password', '$verify_token')";
        pg_query($connection, $query);

        $_SESSION['message'] = "Registration successful!";
        header("Location: ./authorization-page.php");
        exit();
    } else {
        $_SESSION['message'] = "Password mismatch!";
        header("Location: ./registration-page.php");
        exit();
    }
}
