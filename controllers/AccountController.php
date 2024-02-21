<?php

namespace Controllers;

use MVC\Router;

class AccountController
{
    public static function index(Router $router)
    {
        session_start();
        // TO-DO: Add functionality to load shopping basket products
        $router->render('account/index', []);
    }
}
