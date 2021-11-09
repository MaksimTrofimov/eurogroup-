<?php

declare (strict_types = 1);

namespace App\Http\Controllers;

use App\Services\ColorThiefService;
use App\Services\InterventionImage;
use App\Services\MakeWatermarkService;

class WatermarkController extends Controller
{
    public function index()
    {
        $sourceImages = [
            'red'   => 'images/ceb71ce19db034d-500x500.jpeg',
            'green' => 'images/_зеленый-500x500.png',
            'blue'  => 'images/col-chi-145-blue_4.jpeg',
        ];

        $dominantColor = new ColorThiefService();
        $watermark = new InterventionImage();
        $makeWatermarkService = new MakeWatermarkService($dominantColor, $watermark);

        foreach ($sourceImages as $img) {
            $makeWatermarkService->run($img);
        }
    }
}
