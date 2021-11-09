<?php

declare (strict_types = 1);

namespace App\Services;

use App\Services\Contracts\MakeWatermarkService as IMakeWatermarkService;
use App\Services\Contracts\DominantColorService as iDominantColorService;
use App\Services\Contracts\WatermarkService as IWatermarkService;
use Exception;

class MakeWatermarkService implements IMakeWatermarkService
{
    private $dominantColorService;

    private $pathSave = 'images/watermarked/';

    private $watermarks = [
        'red'   => 'images/watermarks/black.jpeg',
        'green' => 'images/watermarks/red.jpeg',
        'blue' => 'images/watermarks/yellow.jpeg',
    ];

    public function __construct(
        iDominantColorService $dominantColor,
        IWatermarkService $watermark
    ) {
        $this->dominantColorService = $dominantColor;
        $this->watermark = $watermark;
    }

    public function run(string $sourceImages)
    {
        $colorName = $this->dominantColorService->getColorName($sourceImages);
        $this->isSetWatermark($colorName);
        $pathWatermark = $this->watermarks[$colorName];
        $this->watermark->insert($sourceImages, $pathWatermark, $this->pathSave);
    }

    private function isSetWatermark(string $colorName): void
    {
        if (!array_key_exists($colorName, $this->watermarks)) {
            throw New Exception('There is no watermark for this color!');
        }
    }

}

