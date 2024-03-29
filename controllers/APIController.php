<?php

namespace Controllers;

use Models\UsersProducts;
use Models\Products;
use Models\User;

class APIController
{
    protected static $headerJSON = 'Content-Type: application/json; charset=utf-8';

    public static function imagesAPI()
    {
        header(self::$headerJSON);
        $imagesDir = './build/img/ads/';
        $imagesFiles = glob($imagesDir . "*.{webp}", GLOB_BRACE);
        $imageData = [];

        foreach ($imagesFiles as $img) {
            $imageName = basename($img);
            $imageData[] = [
                'name' => $imageName
            ];
        }

        echo json_encode($imageData);
    }

    public static function popularProductsAPI()
    {
        header(self::$headerJSON);
        $result = Products::get(10);
        echo json_encode($result);
    }

    public static function productsAPI()
    {
        header(self::$headerJSON);
        $page = $_GET['page'] ?? null;
        $result = Products::all();
        $products = array_chunk($result, 10);
        echo json_encode(['products' => $products[$page - 1], 'productsCount' => count($result)]);
    }
    public static function loadShoppingBasket()
    {
        header(self::$headerJSON);

        session_start();

        $usersProducts = new UsersProducts($_POST);
        $usersProducts->userId = $_SESSION['id'];
        $result = $usersProducts->save();

        echo json_encode($result);
    }
    public static function deleteProductFromBasket()
    {
        header(self::$headerJSON);

        $product = new UsersProducts;
        $id = $_POST['id'];

        // Deletes the usersproducts (basket) entry so it is no loger in the user basket
        $result = $product->delete($id);

        echo json_encode($result);
    }
    public static function deleteUserPfp()
    {
        header(static::$headerJSON);
        session_start();

        $user = User::find($_SESSION['id']);

        $result = $user->deleteImage('profileImage', 'build/img/users');

        json_encode($result);
    }
    public static function deleteUser()
    {
        header(static::$headerJSON);
        session_start();

        $id = $_POST['id'];
        $user = User::find($id);
        $user->deleteImage('profileImage', 'build/img/users');
        $result = $user->delete($id);

        echo json_encode(['result' => $result]);
    }
    public static function setAdmin()
    {
        header(static::$headerJSON);

        session_start();

        $id = $_POST['id'];
        $user = User::find($id);

        if ($user->admin === '0') {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }

        $result = $user->save();
        echo json_encode(['result' => $result]);
    }
    public static function deleteProduct()
    {
        header(static::$headerJSON);

        session_start();

        $id = $_POST['id'];
        $product = Products::find($id);
        $product->deleteImage('image', 'build/img/products');
        $result = $product->delete($id);

        echo json_encode(['result' => $result]);
    }
}
