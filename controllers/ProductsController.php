<?php

namespace Controllers;

use MVC\Router;

class ProductsController
{
    public static function index(Router $router)
    {
        $router->render('products/index', []);
    }
}
