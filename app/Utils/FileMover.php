<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileMover
{
    /**
     * Moves a file from the temporary directory to the final destination.
     *
     * @param string $path The current file path in the temporary directory.
     * @param string $folder The target folder where the file should be moved.
     * @return string|null The final file path or null if the file doesn't exist.
     */
    public static function moveFromTempToFinal($path, $folder)
    {
        $filename = basename($path);
        $finalPath = $folder . '/' . Str::random(40) . '-' . $filename;

        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->move($path, $finalPath);
            return $finalPath;
        }

        return null;
    }
}
