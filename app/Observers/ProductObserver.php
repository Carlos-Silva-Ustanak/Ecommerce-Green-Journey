<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleting" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleting(Product $product)
    {
        // Check if the product has an image associated
        if ($product->image) {
            // Delete the image from S3
            Storage::disk('s3')->delete($product->image);
        }
    }
    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
