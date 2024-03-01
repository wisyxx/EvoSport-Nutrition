<?php

namespace Controllers;

use Models\Products;
use MVC\Router;
use Models\User;

class AdminController
{
    public static function index(Router $router)
    {
        session_start();

        if ($_SESSION['admin'] === 0 || empty($_SESSION['admin'])) {
            header('Location: /');
        }

        // $user = User::find($_SESSION['id']);
        $users = User::all();
        $products = Products::all();

        $router->render('admin/index', [
            'users' => $users,
            'products' => $products,
            // 'user' => $user
        ]);
    }
    public static function updateProduct(Router $router)
    {
        $id = $_GET['id'];
        $product = Products::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product->sync($_POST);

            $alerts = $product->validateProduct();

            if ($_FILES['image']['tmp_name']) {
                $imageName = md5($product->image);
                $product->deleteImage('image', 'build/img/products');
                $product->saveImage('build/img/products', $imageName, 'image', 'image');
            }

            $result = '';
            if (empty($alerts)) {
                $result = $product->save();
            }

            if ($result) {
                header('Location: /admin');
            }
        }

        $alerts = Products::getAlerts();
        $router->render('admin/update-product', [
            'product' => $product,
            'alerts' => $alerts
        ]);
    }
    public static function createProduct(Router $router)
    {
        $product = new Products();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product->sync($_POST);

            $alerts = $product->validateNewProduct();
            
            $result = '';
            if (empty($alerts)) {
                if ($_FILES['image']['tmp_name']) {
                    $imageName = md5($product->name);
                    $product->saveImage('build/img/products', $imageName, 'image', 'image');
                }
                $result = $product->save();
            }

            if ($result) {
                header('Location: /admin');
            }
        }

        $alerts = Products::getAlerts();
        $router->render('admin/create-product', [
            'product' => $product,
            'alerts' => $alerts
        ]);
    }
}
