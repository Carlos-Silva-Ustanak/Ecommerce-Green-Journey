<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function uploadImage($file)
    {
        $path = $file->store('products', 's3');
        return Storage::disk('s3')->url($path);
    }

    public function deleteImage($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $path = ltrim($path, '/');
        Storage::disk('s3')->delete($path);
    }
}
