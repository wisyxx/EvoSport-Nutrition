<?php

namespace Controllers;

use Models\ActiveRecord;
use MVC\Router;

class LandingPageController extends ActiveRecord
{
    public static function index(Router $router)
    {
        $router->render('home/index', []);
    }
}