<?php

namespace Controllers;

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
}
