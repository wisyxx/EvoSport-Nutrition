<?php

include_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\LandingPageController;
use MVC\Router;

$router = new Router();

$router->get('/', [LandingPageController::class, 'index']);

/*======> API <======*/
$router->get('/api/ad-images', [APIController::class, 'imagesAPI']);
$router->get('/api/products', [APIController::class, 'productsAPI']);

$router->checkRoutes();