<?php

declare (strict_types = 1);

namespace App\Services\Contracts;

use App\Services\Contracts\DominantColorService as iDominantColorService;
use App\Services\Contracts\WatermarkService as IWatermarkService;

interface MakeWatermarkService
{

    public function __construct(
        iDominantColorService $dominantColor,
        IWatermarkService $watermark
    );

    public function run(string $sourceImages);
}
