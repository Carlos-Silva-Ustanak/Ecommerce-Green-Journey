<?php

namespace App\Providers;

use App\Models\Brand;
use Livewire\Livewire;
use App\Models\Product;
use App\Models\Category;
use App\Observers\BrandObserver;
use App\Http\Livewire\ThemeToggle;
use App\Observers\ProductObserver;
use App\Observers\CategoryObserver;
use App\Services\GridFSImageService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Category::observe(CategoryObserver::class);
        Brand::observe(BrandObserver::class);
        Product::observe(ProductObserver::class);
    }
}
