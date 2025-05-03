<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class SiteHelper
{
    public static function getUrlImage($image)
    {
        $url = Storage::disk('r2')->temporaryUrl(
            $image,
            now()->addMinutes(10) // link valid 10 menit
        );

        return $url;
    }
}
