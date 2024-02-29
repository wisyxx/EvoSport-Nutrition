<?php

namespace Controllers;

use Models\ActiveRecord;
use MVC\Router;
use Models\User;

class LandingPageController extends ActiveRecord
{
    public static function index(Router $router)
    {
        session_start();

        $user = createUserReference();

        $router->render('home/index', [
            'user' => $user
        ]);
    }
    public static function contact(Router $router)
    {
        session_start();

        $user = createUserReference();

        $router->render('home/contact-form', [
            'user' => $user
        ]);
    }
}
