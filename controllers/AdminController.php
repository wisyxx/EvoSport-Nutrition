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

        if ($_SESSION['admin'] === 0 || empty($_SESSION['admin'])) {
            header('Location: /');
        }

        $user = User::find($_SESSION['id']);
        $users = User::all();
        $products = Products::all();

        $router->render('admin/index', [
            'users' => $users,
            'products' => $products,
            'user' => $user
        ]);
    }
}
