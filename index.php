<?php
session_start();
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/src/Config/Routes.php');

$router = new Router();
$router->dispatch();
