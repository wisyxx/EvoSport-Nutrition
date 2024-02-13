<?php

namespace Controllers;

use Models\Products;
use MVC\Router;

class ProductsController
{
    public static function index(Router $router)
    {
        $router->render('products/index', []);
    }

    public static function product(Router $router)
    {
        if(!is_numeric($_GET['id'])) {
            
        }

        $id = $_GET['id'];

        $product = Products::find($id);

        $router->render('products/product', [
            'product' => $product
        ]);   
    }
}
