<?php

namespace Controllers;

use Models\Products;

class APIController
{
    public static function imagesAPI()
    {
        $imagesDir = './build/img/ads/';
        $imagesFiles = glob($imagesDir . "*.{webp}", GLOB_BRACE);
        $imageData = [];

        foreach($imagesFiles as $img)
        {
            $imageName = basename($img);
            $imageData[] = [
                'name' => $imageName
            ];
        }

        echo json_encode($imageData);
    }
    public static function productsAPI ()
    {
        $result = Products::get(10);
        echo json_encode($result);
    }
}
