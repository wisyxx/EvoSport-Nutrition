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
        $query = "SELECT products.name, products.image, products.price, "; 
        $query .= "products.id as 'productId' FROM products ";
        $query .= "LEFT OUTER JOIN usersproducts ON usersproducts.productId = products.id ";
        $query .= "WHERE usersproducts.userId = " . $_SESSION['id'];

        $basketProducts = $shoppingBasket->SQL($query);
        
        $router->render('account/index', [
            'basketProducts' => $basketProducts
        ]);
    }
}
