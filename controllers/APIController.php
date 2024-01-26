<?php

namespace Controllers;

use MVC\Router;

class APIController
{
    public static function imagesAPI(Router $router)
    {
        $imagesDir = './build/img/';
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
}
