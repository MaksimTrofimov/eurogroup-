<?php

declare (strict_types = 1);

namespace App\Services\Contracts;

interface DominantColorService
{
    public function getColorName(string $sourceImage): string;
}
