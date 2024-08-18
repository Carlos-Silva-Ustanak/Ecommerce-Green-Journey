<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

#[Title('Ecommerce')]
class HomePage extends Component
{
    public function render()
    {
        // Fetch active categories, brands, and products
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();
        $products = Product::where('is_active', 1)->get();

        // Fetch the S3 base URL
        $s3Url = config('filesystems.disks.s3.url'); // Ensure this is correctly set in your config

        // Transform the data for the view
        return view('livewire.home-page', [
            'brands' => $brands->map(function ($brand) use ($s3Url) {
                // Ensure image URL is properly formed
                $brand->image = $brand->image ? $s3Url . '/' . str_replace('\\', '/', $brand->image) : null;
                return $brand;
            }),
            'categories' => $categories->map(function ($category) use ($s3Url) {
                // Ensure image URL is properly formed
                $category->image = $category->image ? $s3Url . '/' . str_replace('\\', '/', $category->image) : null;
                return $category;
            }),
            'products' => $products->transform(function ($product) use ($s3Url) {
                // Ensure the images field is an array
                $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                
                // Process image paths
                $product->images = array_map(function ($image) use ($s3Url) {
                    return $s3Url . '/' . str_replace('\\', '/', $image); // Replace backslashes with forward slashes
                }, $images);

                return $product;
            })
        ]);
    }
}
