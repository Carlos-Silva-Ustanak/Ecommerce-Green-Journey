<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryObserver
{
    public function updating(Category $category)
    {
        // Check if the image is being updated
        if ($category->isDirty('image')) {
            // Get the old image path
            $oldImage = $category->getOriginal('image');
            
            // Delete the old image from the S3 bucket
            if ($oldImage) {
                Storage::disk('s3')->delete($oldImage);
            }
        }
    }

    public function deleting(Category $category)
    {
        // Check if there is an image associated with the category
        if ($category->image) {
            // Delete the image from the S3 bucket
            Storage::disk('s3')->delete($category->image);
        }
    }
}
