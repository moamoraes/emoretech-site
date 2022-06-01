<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/system/config.php";

$app = new \Slim\App();

$app->get('/', '\DEV\Controllers\HomeController:login');
$app->get('/feed', '\DEV\Controllers\HomeController:feed');
$app->get('/feed/{usuario:[a-zA-Z0-9-_]+}', '\DEV\Controllers\HomeController:feed_usuario');
$app->run();


?>
