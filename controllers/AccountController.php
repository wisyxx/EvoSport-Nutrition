<?php

namespace Controllers;

use Models\Basket;
use MVC\Router;

class AccountController
{
    public static function index(Router $router)
    {
        session_start();

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
            'basketProducts' => $basketProducts
        ]);
    }
    public static function editProfile(Router $router)
    {
        session_start();    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $router->render('account/edit-profile', []);
    }
}
