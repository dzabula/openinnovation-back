<?php

require_once __DIR__ . '/Autoloader.php';

Autoloader::register();

use core\DependencyRegistry;
use controllers\UserController;
use core\Application;

$container = DependencyRegistry::registerServices();

$app = new Application($container);


$app->router->get('/user',[UserController::class,'get']);
$app->router->post('/user',[UserController::class,'post']);

$app->run();


