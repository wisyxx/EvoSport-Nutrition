<?php

include_once __DIR__ . '/../includes/app.php';

use Controllers\LandingPageController;
use MVC\Router;

$router = new Router();

$router->get('/', [LandingPageController::class, 'index']);

$router->checkRoutes();