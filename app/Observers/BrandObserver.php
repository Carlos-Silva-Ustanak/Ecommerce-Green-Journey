<?php
namespace App\Observers;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandObserver
{
    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }
    }
}
