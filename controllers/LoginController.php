<?php

namespace Controllers;

use Models\User;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alerts = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($_POST);

            $alerts = $user->validate();
        }

        $alerts = User::getAlerts();
        $router->render('auth/login', [
            'alerts' => $alerts
        ]);
    }
}