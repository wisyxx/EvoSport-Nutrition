<?php

namespace Controllers;

use Models\Basket;
use Models\User;
use MVC\Router;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AccountController
{
    public static function index(Router $router)
    {
        session_start();

        $user = User::find($_SESSION['id']);

        if (empty($_SESSION)) {
            header('Location: /');
        }
        // TO-DO: Add functionality to load shopping basket products
        $shoppingBasket = new Basket;
        $query = "SELECT usersproducts.id, products.name, products.image, products.price, ";
        $query .= "products.id as 'productId' FROM products ";
        $query .= "LEFT OUTER JOIN usersproducts ON usersproducts.productId = products.id ";
        $query .= "WHERE usersproducts.userId = " . $_SESSION['id'];

        $basketProducts = $shoppingBasket->SQL($query);

        $router->render('account/index', [
            'user' => $user,
            'basketProducts' => $basketProducts
        ]);
    }
    public static function editProfile(Router $router)
    {
        session_start();

        $user = User::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->validateEditProfile();

            if ($_FILES['profile-img']['tmp_name']) {
                $imageName = md5($_FILES['profile-img']['tmp_name']);
                
                $user->deleteUserImage(); // remove last image from file system
                
                // create new manager instance with desired driver
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($_FILES['profile-img']['tmp_name']); // reading image
                $image->toWebp()->save("build/img/users/$imageName.webp"); // saving file

                // Assign name to user property
                $user->profileImage = $imageName . '.webp';
            }

            if (empty($alerts)) {
                $user->save(); // save new user information
                $user::setAlert('succeed', 'Profile updated!');
            }
        }

        $alerts = User::getAlerts();
        $router->render('account/edit-profile', [
            'user' => $user,
            'alerts' => $alerts
        ]);
    }
}
