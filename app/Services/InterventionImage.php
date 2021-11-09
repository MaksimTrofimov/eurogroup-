<?php

declare (strict_types = 1);

namespace App\Services;

use App\Services\Contracts\WatermarkService as IWatermarkService;
use Image;

/**
 * @see https://github.com/Intervention/image
 */
class InterventionImage implements IWatermarkService
{
    public function insert($sourceImages, $pathWatermark, $pathSave): void
    {
        $watermark = Image::make($pathWatermark)->encode('png')->opacity(80);
        $img = Image::make($sourceImages);
        $img->insert($watermark);
        $fileName = substr($sourceImages , strrpos($sourceImages, '/') + 1);
        $img->save($pathSave . $fileName);
    }
}
