<?php

namespace Controllers;

use Models\Products;
use MVC\Router;
use Models\User;

class AdminController
{
    public static function index(Router $router)
    {
        session_start();

        $users = User::all();
        $products = Products::all();
        
        $router->render('admin/index', [
            'users' => $users,
            'products' => $products
        ]);
    }
}