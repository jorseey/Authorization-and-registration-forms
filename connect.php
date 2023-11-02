<?php

require 'vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);

$dotenv -> load();

$dbHost = $_ENV['DB_HOST'];
$dbPort = $_ENV['DB_PORT'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PASS'];


$connection = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPass") or die('Database connection error');
