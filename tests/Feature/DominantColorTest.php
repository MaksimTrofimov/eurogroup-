<?php

declare(strict_types=1);

namespace Tests\Feature;

use PhpParser\Builder\Declaration;

use Tests\TestCase;
use App\Services\ColorThiefService;

class DominantColor extends TestCase
{

    public function watermarkDataProvider()
    {
        return [
            [
                'red',
                'public/images/ceb71ce19db034d-500x500.jpeg'
            ],
            [
                'green',
                'public/images/_зеленый-500x500.png'
            ],
            [
                'blue',
                'public/images/col-chi-145-blue_4.jpeg'
            ],
        ];
    }

    /**
     * @dataProvider watermarkDataProvider
     */
    public function testDominantColor($color, $sourceImage)
    {
        $dominantColor = new ColorThiefService();
        $dominantColor->getColorName($sourceImage);
        $this->assertEquals($color, $dominantColor->getColorName($sourceImage));
    }
}
