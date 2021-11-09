<?php

declare (strict_types = 1);

namespace App\Services\Contracts;

interface WatermarkService
{
    public function insert(string $sourceImages, string $pathWatermark, string $pathSave): void;
}
