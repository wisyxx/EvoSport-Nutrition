<?php

namespace Controllers;

use Models\User;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alerts = [];
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new User($_POST);

            $user->sync($_POST); // Sync $_POST data so the user dont have to rewrite all

            $alerts = $auth->validateLogin();

            if (empty($alerts)) {
                $user = User::where('email', $auth->email);
                if ($user) {
                    if ($auth->validatePassword($user->password)) {
                        session_start();
                        $_SESSION['id'] = $user->id;
                        $_SESSION['name'] = $user->name;
                        $_SESSION['email'] = $user->email;
                        header('Location: /');
                    }
                } else {
                    User::setAlert('error', 'User doesn\'t exists');
                }
            }
        }
                
        $alerts = User::getAlerts();
        $router->render('auth/login', [
            'user' => $user,
            'alerts' => $alerts
        ]);
    }
    public static function register(Router $router)
    {
        $alerts = [];
        $user = new User($_POST);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST); // Sync $_POST data so the user dont have to rewrite all

            $alerts = $user->validateRegistration();

            if (empty($alerts)) {
                $user->sync($_POST);
            }
        }

        $alerts = User::getAlerts();
        $router->render('auth/create-account', [
            'user' => $user,
            'alerts' => $alerts
        ]);
    }
}
