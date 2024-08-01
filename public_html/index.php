<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use MixedMessages2\Authentication;
use MixedMessages2\Router;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if ((new Authentication())->isAuthenticated()) {
    new Router();
} else {
    header('Location: login.html');
    exit();
}
