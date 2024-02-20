<?php

namespace Controllers;

use Models\Products;
use MVC\Router;

class ProductsController
{
    public static function index(Router $router)
    {
        session_start();

        $router->render('products/index', []);
    }

    public static function product(Router $router)
    {
        session_start();

        if (!is_numeric($_GET['id'])) {
            // TO-DO: Create 404 page
        }

        $id = $_GET['id'];

        $product = Products::find($id);

        $router->render('products/product', [
            'product' => $product
        ]);
    }
}
