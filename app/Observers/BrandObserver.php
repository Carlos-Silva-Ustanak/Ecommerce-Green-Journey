<?php
namespace App\Observers;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandObserver
{
    public function updating(Brand $brand)
    {
        // Check if the image is being updated
        if ($brand->isDirty('image')) {
            // Get the old image path
            $oldImage = $brand->getOriginal('image');
            
            // Delete the old image from the S3 bucket
            if ($oldImage) {
                Storage::disk('s3')->delete($oldImage);
            }
        }
    }

    public function deleting(Brand $brand)
    {
        // Check if there is an image associated with the brand
        if ($brand->image) {
            // Delete the image from the S3 bucket
            Storage::disk('s3')->delete($brand->image);
        }
    }
}
