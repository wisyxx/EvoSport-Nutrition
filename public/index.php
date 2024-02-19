<?php

include_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\LandingPageController;
use Controllers\LoginController;
use Controllers\ProductsController;
use Models\Products;
use MVC\Router;

$router = new Router();

/*======> LANDIG PAGE <======*/
$router->get('/', [LandingPageController::class, 'index']);

/*======> PRODUCTS <======*/
$router->get('/products', [ProductsController::class, 'index']);
$router->get('/product', [ProductsController::class, 'product']);

/*======> LOGIN <======*/
$router->get('/login', [LoginController::class, 'login']);

/*======> API <======*/
$router->get('/api/ad-images', [APIController::class, 'imagesAPI']);
$router->get('/api/popular-products', [APIController::class, 'popularProductsAPI']);
$router->get('/api/products', [APIController::class, 'productsAPI']);

$router->checkRoutes();