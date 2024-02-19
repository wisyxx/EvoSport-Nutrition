<?php

namespace Controllers;

use Models\ActiveRecord;
use MVC\Router;

class LandingPageController extends ActiveRecord
{
    public static function index(Router $router)
    {
        session_start();

        $router->render('home/index', []);
    }
}