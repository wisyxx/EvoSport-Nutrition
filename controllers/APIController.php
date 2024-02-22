<?php

namespace Controllers;

use Models\UsersProducts;
use Models\Products;

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
    public static function shoppingBasket()
    {
        header(self::$headerJSON);

        session_start();

        $result = '';
        $usersProducts = new UsersProducts($_POST);
        $usersProducts->userId = $_SESSION['id'];
        $result = $usersProducts->save();


        echo json_encode($result);
    }
}
