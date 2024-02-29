<?php

namespace Controllers;

use Models\Products;
use MVC\Router;
use Models\User;

class ProductsController
{
    public static function index(Router $router)
    {
        session_start();

        $user = User::find($_SESSION['id']);

        $router->render('products/index', [
            'user' => $user
        ]);
    }

    public static function product(Router $router)
    {
        session_start();

        $user = User::find($_SESSION['id']);

        $id = $_GET['id'];

        $product = Products::find($id);

        $router->render('products/product', [
            'user' => $user,
            'product' => $product
        ]);
    }    
}
