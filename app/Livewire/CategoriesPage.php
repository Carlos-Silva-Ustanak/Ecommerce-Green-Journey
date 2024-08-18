<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

#[Title('Categories Page - Ecommerce')]
class CategoriesPage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
         // Fetch the S3 base URL
         $s3Url = config('filesystems.disks.s3.url'); // Use the base URL

         return view('livewire.categories-page', [
            'categories' => $categories->map(function ($category) use ($s3Url) {
                // Ensure image URL is properly formed
                $category->image = $category->image ? $s3Url . '/' . $category->image : null;
                return $category;
             })
         ]);

    }
}
