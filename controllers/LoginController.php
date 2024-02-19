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
            $auth = new User($_POST);

            $alerts = $auth->validate();


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
            'alerts' => $alerts
        ]);
    }
}
