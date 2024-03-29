<?php

include_once __DIR__ . '/../includes/app.php';

use Controllers\AccountController;
use Controllers\AdminController;
use Controllers\APIController;
use Controllers\LandingPageController;
use Controllers\LoginController;
use Controllers\ProductsController;
use MVC\Router;

$router = new Router();

/*======> LANDIG PAGE <======*/
$router->get('/', [LandingPageController::class, 'index']);
$router->get('/contact', [LandingPageController::class, 'contact']);

/*======> PRODUCTS <======*/
$router->get('/products', [ProductsController::class, 'index']);
$router->get('/product', [ProductsController::class, 'product']);

/*======> ACCOUNTS <======*/
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/create-account', [LoginController::class, 'register']);
$router->post('/create-account', [LoginController::class, 'register']);
$router->get('/message', [LoginController::class, 'message']);
$router->get('/logout', [LoginController::class, 'logout']);
/* Account page */
$router->get('/account', [AccountController::class, 'index']);
$router->get('/edit-profile', [AccountController::class, 'editProfile']);
$router->post('/edit-profile', [AccountController::class, 'editProfile']);

/*======> ADMIN PANEL <======*/
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/products/update', [AdminController::class, 'updateProduct']);
$router->post('/admin/products/update', [AdminController::class, 'updateProduct']);
$router->get('/admin/products/create', [AdminController::class, 'createProduct']);
$router->post('/admin/products/create', [AdminController::class, 'createProduct']);

/*======> API <======*/
$router->get('/api/ad-images', [APIController::class, 'imagesAPI']);
$router->get('/api/popular-products', [APIController::class, 'popularProductsAPI']);
$router->get('/api/products', [APIController::class, 'productsAPI']);
$router->post('/api/basket', [APIController::class, 'loadShoppingBasket']);
$router->post('/api/basket/delete', [APIController::class, 'deleteProductFromBasket']);
$router->post('/api/images/delete-pfp', [APIController::class, 'deleteUserPfp']);
$router->post('/api/users/delete', [APIController::class, 'deleteUser']);
$router->post('/api/users/set-admin', [APIController::class, 'setAdmin']);
$router->post('/api/products/delete', [APIController::class, 'deleteProduct']);

$router->checkRoutes();