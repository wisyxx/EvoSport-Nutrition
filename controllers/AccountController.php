<?php

namespace Controllers;

use MVC\Router;

class AccountController
{
    public static function index(Router $router)
    {
        session_start();
        
        $router->render('account/index', []);
    }
}
