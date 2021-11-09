<?php

declare (strict_types = 1);

namespace App\Services;

use App\Services\Contracts\DominantColorService as IDominantColorService;
use ColorThief\ColorThief;

/**
 * @see https://github.com/ksubileau/color-thief-php
 */
class ColorThiefService implements IDominantColorService
{
    private $colorName = ['red', 'green', 'blue'];

    public function getDominantColor(string $sourceImage): array
    {
        return ColorThief::getColor($sourceImage);
    }

    public function getColorName(string $sourceImage): string
    {
        $rgb = $this->getDominantColor($sourceImage);
        $max = max($rgb);
        $rgb = array_flip($rgb);
        return $this->colorName[$rgb[$max]];
    }

}